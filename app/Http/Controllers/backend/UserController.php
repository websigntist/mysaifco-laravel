<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Country;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\backend\User;
use App\Models\backend\UserType;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    /** Physical DB table for enums, queries, and image uploads (always users for User model). */
    protected string $dbTable = 'users';

    /** Blade subfolder for login / forgot / reset / profile (always users). */
    protected string $authBladeModule = 'users';

    /**
     * When non-null, only these user_types.id appear in listings and forms (e.g. Customers module).
     */
    protected ?array $restrictToUserTypeIds = null;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->userId = currentUserId(); // or auth()->id()
            return $next($request);
        });
        $this->table = User::class;
        $this->module = 'users';
        $this->notify_title = 'User';
    }

    /**
     * Merge keys required by listing/edit views (image paths stay under users/ for all admin modules using User).
     */
    protected function withShared(array $data): array
    {
        $data['imageFolder'] = $this->dbTable;

        return $data;
    }

    protected function applyUserTypeScope($query)
    {
        if ($this->restrictToUserTypeIds === null) {
            return $query;
        }

        if ($this->restrictToUserTypeIds === []) {
            return $query->whereRaw('1 = 0');
        }

        return $query->whereIn('user_type_id', $this->restrictToUserTypeIds);
    }

    protected function userBelongsToRestrictedTypes($user): bool
    {
        if ($this->restrictToUserTypeIds === null) {
            return true;
        }

        if ($this->restrictToUserTypeIds === []) {
            return false;
        }

        return in_array((int) $user->user_type_id, $this->restrictToUserTypeIds, true);
    }

    protected function abortIfUserOutOfScope($user): void
    {
        if (! $this->userBelongsToRestrictedTypes($user)) {
            abort(404);
        }
    }

    protected function userTypeIdValidationRules(): array
    {
        $rules = ['required', 'integer', Rule::exists('user_types', 'id')->where('status', 'Active')];

        if ($this->restrictToUserTypeIds !== null) {
            if ($this->restrictToUserTypeIds === []) {
                $rules[] = Rule::in([]);

                return $rules;
            }
            $rules[] = Rule::in($this->restrictToUserTypeIds);
        }

        return $rules;
    }

    protected function activeUserTypesForForm()
    {
        $q = UserType::query()->where('status', 'Active')->orderBy('user_type');
        if ($this->restrictToUserTypeIds !== null) {
            if ($this->restrictToUserTypeIds === []) {
                return collect();
            }
            $q->whereIn('id', $this->restrictToUserTypeIds);
        }

        return $q->get(['id', 'user_type']);
    }

    protected function activeLoginTypesForForm()
    {
        $q = UserType::query()->where('status', 'Active');
        if ($this->restrictToUserTypeIds !== null) {
            if ($this->restrictToUserTypeIds === []) {
                return collect();
            }
            $q->whereIn('id', $this->restrictToUserTypeIds);
        }

        return $q->get(['id', 'login_type']);
    }

    protected function userTypesPluckForEdit()
    {
        $q = UserType::query()->orderBy('user_type');
        if ($this->restrictToUserTypeIds !== null) {
            if ($this->restrictToUserTypeIds === []) {
                return collect();
            }
            $q->whereIn('id', $this->restrictToUserTypeIds);
        }

        return $q->pluck('user_type', 'id');
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = $this->applyUserTypeScope(($this->table)::with('userType')->latest())->get();
        $columns = [
            'image',
            'first_name',
            'mobile_no',
            'landline_no',
            'user_type',
            'status',
            'ordering',
            'created_at',
            'created_by'
        ];

        // columns to hide
        $hiddenColumns = [
            'landline_no',
            'first_name',
            'ordering',
            'created_by'
        ];

        return view('backend.' . $this->module . '.listing', $this->withShared([
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]));
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $countries = Country::orderBy('name')->pluck('name')->toArray();
        $userTypes = $this->activeUserTypesForForm();
        $loginTypes = $this->activeLoginTypesForForm();

        $getStatus = getEnumValues($this->dbTable, 'status');
        $getGenders = getEnumValues($this->dbTable, 'gender');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'countries'        => $countries,
            'userTypes'        => $userTypes,
            'loginTypes'       => $loginTypes,
            'getStatus'        => $getStatus,
            'getGenders'        => $getGenders,
            'meta_title'       => "Create New | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function store222(Request $request)
    {
        $action = $request->submitBtn;

        // Validate form input
        $request->validate([
            'first_name'   => 'required|string',
            'last_name'    => 'required|string',
            'mobile_no'    => 'required',
            'landline_no'  => 'required',
            'address'      => 'required|string',
            'email'        => 'required|email|unique:users|max:255',
            'password'     => 'required|min:6',
            'status'       => 'required',
            'user_type_id' => 'required',
        ]);

        // Handle image upload
        $uploadImage = imageHandling($request, null, 'image', $this->dbTable);

        $pwd = $request->password;
        // Prepare data
        $dataToStore = [
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'mobile_no'    => $request->mobile_no,
            'landline_no'  => $request->landline_no,
            'dob'          => $request->dob,
            'address'      => $request->address,
            'country'      => $request->country,
            'image'        => $uploadImage ?? null,
            'password'     => Hash::make($pwd),
            'ordering'     => $request->ordering,
            'gender'       => $request->gender,
            'status'       => $request->status,
            'user_type_id' => $request->user_type_id,
            'created_by'   => auth()->id(),
        ];

        // Insert into DB
        $user = ($this->table)::create($dataToStore);

        // email template start ================================

        // Prepare dynamic email placeholders
        $emailData = [
            '[first_name]' => $request->first_name ?? '',
            '[last_name]'  => $request->last_name ?? '',
            '[email]'      => $request->email,
            '[password]'   => $pwd,
            '[login_link]' => url('/admin/login'),
        ];

        // Fetch email template by slug
        $template = get_email_template('new-user-registration', $emailData);

        if (!$template) {
            return back()->with('error', 'Email template not found.');
        }

        if ($template && $template->status === 'Active') {
                Mail::send([], [], function ($message) use ($user, $template) {
                    $message->to($request->email)
                            ->cc('support@websigntist.com') // optional CC
                            ->bcc('admin@websigntist.com') // optional BCC
                            ->subject($template->title)
                            ->html($template->description)
                            ->attach(getPublicAssetPath('assets/documents/' . $template->document));
                });
            }


        // Replace placeholders
       /* $subject = strtr($template->title, $emailData);
        $messageBody = strtr($template->description, $emailData);

        try {
            Mail::send([], [], function ($message) use ($user, $subject, $messageBody, $template) {
                $message->from('websigntist@gmail.com', 'WebSigntist')
                    ->to($dataToStore->email)
                    ->cc(['cc@gmail.com']) // optional
                    ->bcc(['bcc@gmail.com'])  // optional
                    ->subject($subject)->html($messageBody); // correct method for raw HTML body

                // Optional attachment
                if (!empty($template->document)) {
                    $attachmentPath = getPublicAssetPath('assets/documents/' . $template->document);
                    if (file_exists($attachmentPath)) {
                        $message->attach($attachmentPath);
                    }
                }
            });

            return back()->with('success', 'New user email has been sent successfully.');
        } catch (\Exception $e) {
            \Log::error('New user registration mail error: ' . $e->getMessage());
            return back()->with('error', 'Email sending failed: ' . $e->getMessage());
        }*/
        // email template end ================================

        if (!$user) {
            Log::error('Failed to create user', $dataToStore);
            return back()->with('error', 'Failed to create profile.');
        } elseif ($action === 'save_new') {
            return to_route($this->module.'.create')->with('success', $this->notify_title . 'Saved! Ready to add another.');
        } elseif ($action === 'save_stay') {
            return to_route($this->module.'.edit', $user->id)->with('success', $this->notify_title . 'Saved! You can continue editing.');
        } else {
            return redirect()->route($this->module)->with('success', $this->notify_title . 'Successfully Registered.');
        }

    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        // Validate form input
        $request->validate([
            'first_name'   => 'required|string',
            'last_name'    => 'required|string',
            'mobile_no'    => 'required',
            'landline_no'  => 'required',
            'address'      => 'required|string',
            'email'        => 'required|email|unique:users|max:255',
            'password'     => 'required|min:6',
            'status'       => 'required',
            'user_type_id' => $this->userTypeIdValidationRules(),
        ]);

        // Handle image upload
        $uploadImage = imageHandling($request, null, 'image', $this->dbTable);

        $plainPassword = $request->password;
        // Prepare data
        $dataToStore = [
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'mobile_no'    => $request->mobile_no,
            'landline_no'  => $request->landline_no,
            'dob'          => $request->dob,
            'address'      => $request->address,
            'country'      => $request->country,
            'image'        => $uploadImage ?? null,
            'password'     => Hash::make($plainPassword),
            'ordering'     => $request->ordering,
            'gender'       => $request->gender,
            'status'       => $request->status,
            'user_type_id' => $request->user_type_id,
            'created_by'   => auth()->id(),
        ];

        // Insert into DB
        $user = ($this->table)::create($dataToStore);

        if (!$user) {
            Log::error('Failed to create' . $this->notify_title, $dataToStore);
            return back()->with('error', 'Failed to create profile.');
        }

        // =============== Email template logic start
        try {
            $emailData = [
                '[first_name]' => $user->first_name ?? '',
                '[last_name]'  => $user->last_name ?? '',
                '[username]'   => $user->email,
                '[password]'   => $plainPassword,
                '[login_link]' => url('/admin/login'),
                '[site_title]' => get_setting('site_title') ?? config('app.name'),
                '[site_url]'   => url('/'),
            ];

            // Get email template by slug
            $template = DB::table('email_templates')->where('slug', 'new-user-registration')->first();

            if (!$template) {
                return back()->with('error', 'Email template not found.');
            }

            // Replace placeholders
            $subject = strtr($template->title, $emailData);
            $body = strtr($template->description, $emailData);

            Mail::send([], [], function ($message) use ($user, $subject, $body, $template) {
                $message->to($user->email)
                    //->cc('support@websigntist.com') // optional
                    //->bcc('admin@websigntist.com')  // optional
                    ->subject($subject)->html($body);

                // Add attachment if exists
                if (!empty($template->document)) {
                    $attachmentPath = getPublicAssetPath('assets/documents/' . $template->document);
                    if (file_exists($attachmentPath)) {
                        $message->attach($attachmentPath);
                    }
                }
            });

        } catch (\Exception $e) {
            Log::error('New'.$this->notify_title.'registration mail error: ' . $e->getMessage());
            return back()->with('error', 'Email sending failed: ' . $e->getMessage());
        }

        // =============== Email template logic start

        // Redirect logic
        if ($action === 'save_new') {
            return to_route($this->module . '.create')->with('success', $this->notify_title . 'Saved! Ready to add another.');
        } elseif ($action === 'save_stay') {
            return to_route($this->module . '.edit', $user->id)->with('success', $this->notify_title . 'Saved! You can continue editing.');
        } else {
            return redirect()->route($this->module)->with('success', $this->notify_title . 'Successfully Registered and Email Sent.');
        }
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);
        $this->abortIfUserOutOfScope($source);

        $local = str_contains($source->email, '@') ? Str::before($source->email, '@') : 'user';
        $domain = str_contains($source->email, '@') ? Str::after($source->email, '@') : 'invalid.local';

        $candidate = '';
        for ($i = 0; $i < 50; $i++) {
            $candidate = $local . '+copy.' . Str::lower(Str::random(6)) . '@' . $domain;
            if (strlen($candidate) > 255) {
                $candidate = Str::limit($local, 120, '') . '+c.' . Str::lower(Str::random(8)) . '@' . $domain;
            }
            if (!($this->table)::where('email', $candidate)->exists()) {
                break;
            }
        }

        if (($this->table)::where('email', $candidate)->exists()) {
            return redirect()->route($this->module)->with('error', 'Could not generate a unique email for the duplicate.');
        }

        $newImage = null;
        if (!empty($source->image)) {
            $dir = public_path('assets/images/' . $this->dbTable);
            $srcPath = $dir . DIRECTORY_SEPARATOR . $source->image;
            if (File::exists($srcPath)) {
                $ext = pathinfo($source->image, PATHINFO_EXTENSION);
                $newImage = uniqid('dup_', true) . ($ext !== '' ? '.' . $ext : '');
                File::copy($srcPath, $dir . DIRECTORY_SEPARATOR . $newImage);
            }
        }

        $plainPassword = Str::password(16);

        $newUser = ($this->table)::create([
            'first_name'   => $source->first_name,
            'last_name'    => $source->last_name,
            'email'        => $candidate,
            'mobile_no'    => $source->mobile_no,
            'landline_no'  => $source->landline_no,
            'city'         => $source->city,
            'zipcode'      => $source->zipcode,
            'state'        => $source->state,
            'address'      => $source->address,
            'dob'          => $source->dob,
            'country'      => $source->country,
            'image'        => $newImage,
            'password'     => $plainPassword,
            'ordering'     => $source->ordering,
            'gender'       => $source->gender,
            'status'       => $source->status,
            'user_type_id' => $source->user_type_id,
            'created_by'   => auth()->id(),
        ]);

        return redirect()
            ->route($this->module . '.edit', $newUser->id)
            ->with('success', $this->notify_title . ' duplicated. Update email or password if needed.');
    }

    public function editForm(Request $request, $id)
    {
        $user = ($this->table)::findOrFail($id);
        $this->abortIfUserOutOfScope($user);
        // Get all user types for dropdown: [id => user_type]
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $userTypes = $this->userTypesPluckForEdit();
        $countries = Country::orderBy('name')->pluck('name')->toArray();
        $getStatus = getEnumValues($this->dbTable, 'status');
        $getGender = getEnumValues($this->dbTable, 'gender');

        return view('backend.' . $this->module . '.edit', $this->withShared([
            'user'             => $user,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'userTypes'        => $userTypes,
            'countries'        => $countries,
            'getStatus'        => $getStatus,
            'getGender'        => $getGender,
            'meta_title'       => "Edit | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]));
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'mobile_no'    => 'required',
            'landline_no'  => 'required',
            'address'      => 'required|string|max:255',
            'status'       => 'required',
            'user_type_id' => $this->userTypeIdValidationRules(),
        ]);

        try {
            $user = ($this->table)::findOrFail($id);
            $this->abortIfUserOutOfScope($user);

            // Initialize data to update
            $dataToUpdate = [
                'first_name'  => $request->first_name,
                'last_name'   => $request->last_name,
                'email'       => $request->email,
                'mobile_no'   => $request->mobile_no,
                'landline_no' => $request->landline_no,
                'dob'         => $request->dob,
                'city'        => $request->city,
                'zipcode'     => $request->zipcode,
                'state'       => $request->state,
                'country'     => $request->country,
                'ordering'    => $request->ordering,
                'gender'       => $request->gender,
                'status'       => $request->status,
                'user_type_id' => $request->user_type_id,
            ];

            // Only allow "admin" or "super_admin" to update email
            if (in_array(auth()->user()->user_type, [
                'admin',
                'super_admin'
            ])) {
                $dataToUpdate['email'] = $request->email;
            }

            // Add password if it's provided
            if ($request->filled('password')) {
                $dataToUpdate['password'] = Hash::make($request->password); // Don't forget to hash passwords!
            }

            $dataToUpdate['image'] = imageHandling($request, $user, 'image', $this->dbTable);

            // Update page
            $user->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route($this->module.'.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module.'.edit', $user->id)->with('success', $this->notify_title . ' Updated! You can continue editing.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' Updated Successfully.');
            }

        } catch (\Exception $e) {
            Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        $user = ($this->table)::findOrFail($id);

        // Toggle status
        $newStatus = $user->status === 'Active' ? 'Inactive' : 'Active';

        $user->update(['status' => $newStatus]);

        return redirect()->route($this->module)->with('success', $this->notify_title . ' status updated to ' . ucfirst($newStatus) . '.');
    }

    public function login(Request $request)
    {
        // Check if the request is POST (for login attempt)
        if ($request->isMethod('post')) {
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            // First, check if the user exists
            //$user = \App\Models\backend\User::where('email', $request->email)->first();
            $tableClass = $this->table;
            $user = $tableClass::where('email', $request->email)->first();

            if ($user) {
                // Check if user status is Active
                if ($user->status !== 'Active') {
                    return redirect()->route('login')->with('error', 'Your account is not active.');
                }

                // Attempt to log in
                $remember = $request->has('remember') && $request->remember == '1';
                if (Auth::attempt([
                    'email'    => $request->email,
                    'password' => $request->password,
                ], $remember)) {
                    // Redirect to dashboard with success message
                    return redirect()->route('dashboard')->with('success', $this->notify_title . ' logged in successfully');
                } else {
                    // Redirect back to login page with error message
                    return redirect()->route('login')->with('error', 'Invalid login details');
                }
            } else {
                return redirect()->route('login')->with('error', 'No account found with this email.');
            }
        }

        // Check if the user is already logged in
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('backend.' . $this->authBladeModule . '.login', [
            'meta_title'       => "Login | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login')->with('success', $this->notify_title . ' successfully logged out');
    }

    public function forgotPassword2222(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('backend.' . $this->authBladeModule . '.forgotPassword', [
                'meta_title'       => "Forgot Password | Admin Panel",
                'meta_keywords'    => '',
                'meta_description' => ''
            ]);
        }

        if ($request->isMethod('post')) {
            // Validate email format first
            $request->validate([
                'email' => 'required|email',
            ]);

            // Check if the email exists manually
            $user = DB::table($this->dbTable)->where('email', $request->email)->first();

            if (!$user) {
                // Email not found, show notification
                return back()->with('error', 'This email address does not exist in our database.');
            }

            // Generate token
            $token = Str::random(64);

            // Delete any previous reset tokens for this email
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();

            // Insert new token
            DB::table('password_reset_tokens')->insert([
                'email'      => $request->email,
                'token'      => $token,
                'created_at' => Carbon::now(),
            ]);

            // Send password reset email
            try {
                Mail::send('backend.' . $this->authBladeModule . '.userEmail', ['token' => $token], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Reset Password');
                });
            } catch (\Exception $e) {
                return back()->with('error', 'There was an error sending the email. Please try again later.');
            }

            return back()->with('success', 'Password reset email has been sent successfully.');
        }

        return view('backend.' . $this->authBladeModule . '.forgotPassword', [
            'meta_title'       => "Forgot Password | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('backend.' . $this->authBladeModule . '.forgotPassword', [
                'meta_title'       => "Forgot Password | Admin Panel",
                'meta_keywords'    => '',
                'meta_description' => ''
            ]);
        }

        if ($request->isMethod('post')) {
            // Validate email format
            $request->validate([
                'email' => 'required|email',
            ]);

            // Check if email exists
            $user = DB::table($this->dbTable)->where('email', $request->email)->first();

            if (!$user) {
                return back()->with('error', 'This email address does not exist in our database.');
            }

            // Generate token
            $token = Str::random(64);

            // Delete old tokens
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();

            // Insert new token
            DB::table('password_reset_tokens')->insert([
                'email'      => $request->email,
                'token'      => $token,
                'created_at' => Carbon::now(),
            ]);

            // Build reset & login links start ================================
            $resetLink = url('/admin/reset-password?email=' . urlencode($user->email) . '&token=' . $token);
            $loginLink = url('/admin/login');

            // Prepare dynamic email placeholders
            $emailData = [
                '[first_name]' => $user->first_name ?? '',
                '[last_name]'  => $user->last_name ?? '',
                '[email]'      => $user->email,
                '[login_link]' => $loginLink,
                '[reset_link]' => $resetLink,
                '[site_url]'   => url('/'),
                '[site_title]' => get_setting('site_title') ?? config('app.name'),
            ];

            // Fetch email template by slug
            $template = DB::table('email_templates')->where('slug', 'reset-password')->first();

            if (!$template) {
                return back()->with('error', 'Email template not found.');
            }

            // Replace placeholders
            $subject = strtr($template->title, $emailData);
            $messageBody = strtr($template->description, $emailData);

            try {
                Mail::send([], [], function ($message) use ($user, $subject, $messageBody, $template) {
                    $message->to($user->email)
                        //->cc(['cc@gmail.com']) // optional
                        //->bcc(['bcc@gmail.com'])  // optional
                        ->subject($subject)->html($messageBody); // correct method for raw HTML body

                    // Optional attachment
                    if (!empty($template->document)) {
                        $attachmentPath = getPublicAssetPath('assets/documents/' . $template->document);
                        if (file_exists($attachmentPath)) {
                            $message->attach($attachmentPath);
                        }
                    }
                });

                return back()->with('success', 'Password reset email has been sent successfully.');
            } catch (\Exception $e) {
                \Log::error('Forgot password mail error: ' . $e->getMessage());
                return back()->with('error', 'Email sending failed: ' . $e->getMessage());
            }
            // Build reset & login links end ================================
        }

        // Default fallback
        return view('backend.' . $this->authBladeModule . '.forgotPassword', [
            'meta_title'       => "Forgot Password | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function resetForm($token)
    {
        return view('backend.' . $this->authBladeModule . '.resetForm', [
            'token'            => $token,
            'meta_title'       => "Reset Password | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $tokenData = DB::table('password_reset_tokens')->where('email', $request->email)->where('token', $request->token)->first();

        if (!$tokenData) {
            return back()->with('error', 'Invalid or expired token.');
        }

        ($this->table)::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Password has been reset successfully.');
    }

    public function updateProfile(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'first_name'  => 'required|string|max:255',
                'last_name'   => 'required|string|max:255',
                'mobile_no'   => 'required',
                'landline_no' => 'required',
                'address'     => 'required|string|max:255',
            ]);

            $id = auth()->user()->id;

            // Find the page
            $user = ($this->table)::findOrFail($id);

            // Initialize data to update
            $dataToUpdate = [
                'first_name'  => $request->first_name,
                'last_name'   => $request->last_name,
                'mobile_no'   => $request->mobile_no,
                'landline_no' => $request->landline_no,
                'address'     => $request->address,
            ];

            $dataToUpdate['image'] = updateImage($request, 'image', $this->dbTable, $user->image);

            // Update page
            $user->update($dataToUpdate);
            return redirect()->route('profile')->with('success', $this->notify_title . ' profile successfully updated');
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('backend.' . $this->authBladeModule . '.profile', [
            'meta_title'       => "Update Profile | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function view($id)
    {
        \Log::info('View user ID: ' . $id);
        $user = ($this->table)::findOrFail($id);
        $this->abortIfUserOutOfScope($user);

        return view('backend.' . $this->module . '.view', $this->withShared([
            'user'             => $user,
            'module'           => request()->segment(2) ?? $this->module,
            'meta_title'       => "View Detail | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => '',
        ]));
    }

    public function delete($id)
    {
        try {
            $user = ($this->table)::findOrFail($id);
            $this->abortIfUserOutOfScope($user);
            $user->delete();

            return redirect()->route($this->module)->with('success', $this->notify_title . ' deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids; // array of IDs
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {
            $scoped = $this->applyUserTypeScope(($this->table)::query());
            $allowedIds = $scoped->whereIn('id', $selectedIds)->pluck('id')->toArray();

            if ($allowedIds === []) {
                return redirect()->route($this->module)->with('error', 'No matching ' . $this->notify_title . 's were selected.');
            }

            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $allowedIds)->forceDelete();
                return redirect()->route($this->module)->with('success', 'Selected ' .$this->notify_title . 's permanently deleted!');
            }

            ($this->table)::whereIn('id', $allowedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' .$this->notify_title . 's deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', $this->notify_title . ' not selected.');
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $user = ($this->table)::findOrFail($id);
        if (! $this->userBelongsToRestrictedTypes($user)) {
            return response()->json(['success' => false, 'message' => 'Not found.'], 404);
        }

        // Toggle or set status
        $newStatus = $request->status === 'Active' ? 'Inactive' : 'Active';
        $user->status = $newStatus;
        $user->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " Status updated to {$newStatus}"
        ]);
    }

    public function modalView($id)
    {
        $user = ($this->table)::with('creator')->findOrFail($id);
        if (! $this->userBelongsToRestrictedTypes($user)) {
            return response()->json(['success' => false, 'message' => 'Not found.'], 404);
        }

        return response()->json([
            'id'              => $user->id,
            'first_name'      => $user->first_name,
            'last_name'       => $user->last_name,
            'email'           => $user->email,
            'mobile_no'       => $user->mobile_no,
            'landline_no'     => $user->landline_no,
            'gender'          => $user->gender,
            'city'            => $user->city ?? null,
            'state'           => $user->state ?? null,
            'zipcode'         => $user->zipcode ?? null,
            'address'         => $user->address ?? null,
            'status'          => $user->status,
            'image'           => $user->image ?? null,
            'created_at'      => $user->created_at ? $user->created_at->format('M d, Y') : null,
            'created_by_name' => $user->creator?->first_name . ' ' . $user->creator?->last_name,

        ]);
    }

    public function updateOrderingAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer|exists:users,id',
            'ordering' => 'required|integer|min:0',
        ]);

        $user = ($this->table)::findOrFail($request->id);
        if (! $this->userBelongsToRestrictedTypes($user)) {
            return response()->json(['success' => false, 'message' => 'Not found.'], 404);
        }
        $user->ordering = $request->ordering;
        $user->save();

        return response()->json([
            'success'  => true,
            'message'  => 'Ordering updated successfully',
            'id'       => $user->id,
            'ordering' => $user->ordering,
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $user = ($this->table)::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => $this->notify_title . ' not found.',
                ], 404);
            }

            if (! $this->userBelongsToRestrictedTypes($user)) {
                return response()->json([
                    'success' => false,
                    'message' => $this->notify_title . ' not found.',
                ], 404);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' deleted successfully.',
            ]);

        } catch (\Throwable $e) {
            \Log::error('Delete error: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred while deleting.',
            ], 500);
        }
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular($trashed);
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = $this->applyUserTypeScope(($this->table)::with('userType')->onlyTrashed()->latest())->get();
        $columns = [
            'image',
            'first_name',
            'mobile_no',
            'landline_no',
            'user_type',
            'status',
            'ordering',
            'created_at',
            'created_by'
        ];

        $hiddenColumns = [
            'first_name',
            'ordering',
            'created_by'
        ];

        return view('backend.' . $this->module . '.listing', $this->withShared([
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Trashed List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]));
    }

    public function restore($id)
    {
        $restore = ($this->table)::withTrashed()->findOrFail($id);
        $this->abortIfUserOutOfScope($restore);
        $restore->restore();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' restored successfully!');
    }

    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $this->abortIfUserOutOfScope($forcedelete);
        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' permanently deleted!');
    }
}
