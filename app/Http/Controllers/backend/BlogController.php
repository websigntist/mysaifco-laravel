<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Module;
use App\Models\backend\Blog;
use App\Models\backend\BlogCategory;
use App\Models\backend\BlogTag;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Response;

class BlogController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = Blog::class;
        $this->module = 'blogs';
        $this->notify_title = 'Blogs';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::with([
            'blogCategories',
            'blogTags',
            'creator'
        ])->latest()->get();

        $columns = [
            'image',
            'title',
            'status',
            'categories',
            'tags',
            'ordering',
            'created_by',
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'menu_title',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $blogCategories = BlogCategory::where('status', 'Active')->orderBy('title')->get();
        $blogTags = BlogTag::where('status', 'Active')->orderBy('title')->get();

        $getStatus = getEnumValues($this->module, 'status');
        $getShowinmenu = getEnumValues($this->module, 'show_in_menu');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'blogCategories'   => $blogCategories,
            'blogTags'         => $blogTags,
            'getStatus'        => $getStatus,
            'getShowinmenu'    => $getShowinmenu,
            'meta_title'       => "Create New Blog | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            Log::info('Request data:', $request->all());

            // Validate input
            $validated = $request->validate([
                'title'        => 'required|string|max:255',
                'friendly_url' => 'required|string|unique:blogs,friendly_url|max:255',
                'description'  => 'required|string',
                'meta_title'   => 'required|string|max:255',
                //'blog_categories' => 'required|array',
                //'blog_tags' => 'required|array',
            ]);

            $uploadImage = imageHandling($request, null, 'image', $this->module);

            // Insert into Blogs table
            $dataToStore = [
                'title'            => $request->title,
                'show_title'       => (int)($request->show_title ?? 0),
                'friendly_url'     => $request->friendly_url,
                'description'      => $request->description,
                'status'           => $request->status,
                'show_in_menu'     => $request->show_in_menu,
                'ordering'         => $request->ordering ?? 0,
                'meta_title'       => $request->meta_title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'created_by'       => currentUserId(),
                'image'            => $uploadImage,
            ];

            $blog = ($this->table)::create($dataToStore);

            if ($blog) {
                // Sync only if arrays exist (avoid sync(null) error)
                if ($request->has('blog_categories')) {
                    $blog->blogCategories()->sync($request->blog_categories);
                }

                if ($request->has('blog_tags')) {
                    $blog->blogTags()->sync($request->blog_tags);
                }

                if ($action === 'save_new') {
                    return to_route($this->module . '.create')->with('success', $this->notify_title . ' created successfully.');
                } elseif ($action === 'save_stay') {
                    return to_route($this->module . '.edit', $blog->id)->with('success', $this->notify_title . ' created successfully.');
                } else {
                    return redirect()->route($this->module)->with('success', $this->notify_title . ' created successfully.');
                }
            }

            Log::error('Failed to create', $dataToStore);
            return back()->with('error', 'Failed to create.');
        }

        return back()->with('error', 'Invalid request method.');
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->with([
            'blogCategories',
            'blogTags',
        ])->findOrFail($id);

        $baseUrl = $source->friendly_url ?: 'blog';
        $candidateUrl = '';
        for ($i = 0; $i < 50; $i++) {
            $candidateUrl = $baseUrl . '-copy-' . Str::lower(Str::random(6));
            if (strlen($candidateUrl) > 255) {
                $candidateUrl = Str::limit($baseUrl, 220, '') . '-' . Str::lower(Str::random(6));
            }
            if (!($this->table)::where('friendly_url', $candidateUrl)->exists()) {
                break;
            }
        }

        if (($this->table)::where('friendly_url', $candidateUrl)->exists()) {
            return redirect()->route($this->module)->with('error', 'Could not generate a unique URL for the duplicate.');
        }

        $newImage = null;
        if (!empty($source->image)) {
            $dir = public_path('assets/images/' . $this->module);
            $srcPath = $dir . DIRECTORY_SEPARATOR . $source->image;
            if (File::exists($srcPath)) {
                $ext = pathinfo($source->image, PATHINFO_EXTENSION);
                $newImage = uniqid('dup_', true) . ($ext !== '' ? '.' . $ext : '');
                File::copy($srcPath, $dir . DIRECTORY_SEPARATOR . $newImage);
            }
        }

        $blog = ($this->table)::create([
            'title'            => $source->title . ' (Copy)',
            'show_title'       => (int) $source->show_title,
            'friendly_url'     => $candidateUrl,
            'description'      => $source->description,
            'status'           => $source->status,
            'show_in_menu'     => $source->show_in_menu,
            'ordering'         => $source->ordering,
            'meta_title'       => $source->meta_title,
            'meta_keywords'    => $source->meta_keywords,
            'meta_description' => $source->meta_description,
            'created_by'       => currentUserId(),
            'image'            => $newImage,
        ]);

        $blog->blogCategories()->sync($source->blogCategories->pluck('id')->all());
        $blog->blogTags()->sync($source->blogTags->pluck('id')->all());

        return redirect()
            ->route($this->module . '.edit', $blog->id)
            ->with('success', $this->notify_title . ' duplicated. Adjust title or URL if needed.');
    }

    // store data in database.
    public function editForm(Request $request, $id)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);

        // Load both relationships in one query
        $blog = ($this->table)::with([
            'blogCategories',
            'blogTags'
        ])->findOrFail($id);

        // Load all categories and tags for the form
        $categories = BlogCategory::all();
        $tags = BlogTag::all();

        $getStatus = getEnumValues($this->module, 'status');
        $getShowinmenu = getEnumValues($this->module, 'show_in_menu');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $blog,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'categories'       => $categories,
            'tags'             => $tags,
            'getStatus'        => $getStatus,
            'getShowinmenu'    => $getShowinmenu,
            'meta_title'       => "Edit Blog | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    // update data in database
    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;
        // Validate input
        $request->validate([
            'title'           => 'required|string|max:255',
            'friendly_url'    => 'required|string|max:255|unique:blogs,friendly_url,' . $id,
            'description'     => 'required|string',
            'meta_title'      => 'required|string|max:255',
            'blog_categories' => 'required|array',
            'blog_tags'       => 'required|array',
            'image'           => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
        ]);

        try {
            // Find the blog
            $blog = ($this->table)::findOrFail($id);

            // Initialize data to update
            $dataToUpdate = [
                'title'            => $request->title,
                'show_title'       => (int)($request->show_title ?? 0),
                'friendly_url'     => $request->friendly_url,
                'description'      => $request->description,
                'status'           => $request->status,
                'show_in_menu'     => (int)($request->show_in_menu ?? 0),
                'ordering'         => $request->ordering ?? 0,
                'meta_title'       => $request->meta_title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'created_by'       => currentUserId(),
            ];

            // Handle image if uploaded
            $dataToUpdate['image'] = imageHandling($request, $blog, 'image', $this->module);

            // Update blog
            $blog->update($dataToUpdate);

            if ($blog) {
                if ($request->has('blog_categories')) {
                    $blog->blogCategories()->sync($request->blog_categories);
                }
                if ($request->has('blog_tags')) {
                    $blog->blogTags()->sync($request->blog_tags);
                }
            }

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' updated successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $blog->id)->with('success', $this->notify_title . ' updated successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully.');
            }

        } catch (\Exception $e) {
            Log::error('Blog update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        $blog = ($this->table)::findOrFail($id);

        // Toggle status
        $newStatus = $blog->status === 'published' ? 'unpublish' : 'published';

        $blog->update(['status' => $newStatus]);

        return redirect()->route($this->module)->with('success', $this->notify_title . ' status updated to ' . ucfirst($newStatus) . '.');
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $blog = ($this->table)::findOrFail($id);

        // Toggle or set status
        $newStatus = $request->status === 'published' ? 'unpublish' : 'published';
        $blog->status = $newStatus;
        $blog->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title .  " Status Updated to {$newStatus}"
        ]);
    }

    public function updateTitleAjax(Request $request)
    {
        $request->validate([
            'id'    => 'required|string|exists:Blogs,id',
            'title' => 'required|string|min:0',
        ]);

        $blog = ($this->table)::findOrFail($request->id);
        $blog->title = $request->title;
        $blog->save();

        return response()->json([
            'success' => true,
            'message' => $this->notify_title . ' title updated successfully',
            'id'      => $blog->id,
            'title'   => $blog->title,
        ]);
    }

    public function updateOrderingAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer|exists:blogs,id',
            'ordering' => 'required|integer|min:0',
        ]);

        $blog = ($this->table)::findOrFail($request->id);
        $blog->ordering = $request->ordering;
        $blog->save();

        return response()->json([
            'success'  => true,
            'message'  => $this->notify_title . ' ordering updated successfully',
            'id'       => $blog->id,
            'ordering' => $blog->ordering,
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $blog = ($this->table)::findOrFail($id);
            $blog->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title . ' failed to delete: ' . $e->getMessage()
            ], 500);
        }
    }

    public function modalView($id)
    {
        $blog = ($this->table)::with([
            'blogCategories',
            'blogTags',
            'creator'
        ])->find($id);

        return response()->json([
            'id'              => $blog->id,
            'title'           => $blog->title,
            'friendly_url'    => $blog->friendly_url,
            'categories'      => $blog->blogCategories->pluck('title')->toArray(),
            'tags'            => $blog->blogTags->pluck('title')->toArray(),
            'description'     => $blog->description,
            'status'          => ucfirst($blog->status),
            'image'           => $blog->image ?? null,
            'ordering'        => $blog->ordering,
            'show_in_menu'    => $blog->show_in_menu,
            'created_at'      => $blog->created_at ? $blog->created_at->format('M d, Y') : null,
            // show categories
            'created_by_name' => $blog->creator?->first_name . ' ' . $blog->creator?->last_name,
        ]);
    }

    public function view(int $id)
    {
        try {
            // Fetch blog with categories
            $blog = ($this->table)::with('blogCategories')->findOrFail($id);

            return view('backend.' . $this->module . '.view', [
                'blog'             => $blog,
                'meta_title'       => "View Detail | Admin Panel",
                'meta_keywords'    => '',
                'meta_description' => '',
            ]);
        } catch (\Exception $e) {
            \Log::error('Blog view failed for ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route($this->module)->with('error', $this->notify_title . ' not found.');
        }
    }

    public function delete($id)
    {
        try {
            $blog = ($this->table)::findOrFail($id);      // Find the blog
            $blog->delete();                              // Delete it

            return redirect()->route($this->module)->with('success', $this->notify_title . ' deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids; // array of IDs

        if (is_array($selectedIds) && count($selectedIds)) {

            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $request->ids)->forceDelete();
                return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', $this->notify_title . ' not selected.');
    }

    public function export()
    {
        $fileName = 'blogs_export_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
            'Cache-Control'       => 'no-cache, no-store, must-revalidate',
            'Pragma'              => 'no-cache',
            'Expires'             => '0',
        ];

        $columns = [
            'ID',
            'Blog Title',
            'Show Title',
            'Friendly URL',
            'Description',
            'Status',
            'Ordering',
            'Created By',
            'Categories',
            // Added column
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
            'Created At',
            'Updated At',
        ];

        $callback = function () use ($columns) {
            $handle = fopen('php://output', 'w');

            // Add header row
            fputcsv($handle, $columns);

            // Chunk blogs with categories + creator
            ($this->table)::with([
                'creator',
                'blogCategories'
            ])->chunk(200, function ($blogs) use ($handle) {
                foreach ($blogs as $blog) {
                    // Get categories as comma-separated string
                    $categories = $blog->blogCategories->pluck('title')->implode(', ');

                    fputcsv($handle, [
                        $blog->id,
                        $blog->title,
                        $blog->show_title,
                        $blog->friendly_url,
                        str_replace([
                            "\r",
                            "\n"
                        ], ' ', $blog->description),
                        // Clean desc
                        ucfirst($blog->status),
                        $blog->ordering,
                        $blog->creator ? $blog->creator->first_name . ' ' . $blog->creator->last_name : 'N/A',
                        $categories ?: 'N/A',
                        // Show categories
                        $blog->meta_title,
                        $blog->meta_keywords,
                        $blog->meta_description,
                        $blog->created_at ? $blog->created_at->format('Y-m-d H:i:s') : '',
                        $blog->updated_at ? $blog->updated_at->format('Y-m-d H:i:s') : '',
                    ]);
                }
            });

            fclose($handle);
        };

        return response()->streamDownload($callback, $fileName, $headers);
    }

    public function importForm(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);

        return view('backend.' . $this->module . '.import', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'meta_title'       => "Import CSV List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if (($handle = fopen($request->file('csv_file')->getRealPath(), 'r')) !== false) {
            $header = fgetcsv($handle, 1000, ','); // read header row

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $data = array_combine($header, $row);

                // Create or update blog
                $blog = ($this->table)::updateOrCreate(['friendly_url' => $data['friendly_url']], // unique field
                    [
                        'title'            => $data['title'] ?? '',
                        'show_title'       => $data['show_title'] ?? '',
                        'description'      => $data['description'] ?? '',
                        'status'           => $data['status'] ?? 'unpublish',
                        'image'            => $data['image'] ?? null,
                        'show_in_menu'     => $data['show_in_menu'] ?? '',
                        'ordering'         => $data['ordering'] ?? 0,
                        'created_by'       => auth()->id(),
                        // Always logged-in user
                        'meta_title'       => $data['meta_title'] ?? '',
                        'meta_keywords'    => $data['meta_keywords'] ?? '',
                        'meta_description' => $data['meta_description'] ?? '',
                        'created_at'       => now(),
                        // Current import timestamp
                        'updated_at'       => now(),
                        // Current import timestamp
                    ]);

                // Handle categories
                if (!empty($data['categories'])) {
                    $categoryNames = array_map('trim', explode(',', $data['categories']));
                    $categoryIds = [];

                    foreach ($categoryNames as $catName) {
                        if (!empty($catName)) {
                            $category = BlogCategory::firstOrCreate(['title' => $catName]);
                            $categoryIds[] = $category->id;
                        }
                    }

                    // Sync categories
                    $blog->blogCategories()->sync($categoryIds);
                }
            }

            fclose($handle);
        }

        return redirect()->route($this->module)->with('success', $this->notify_title . ' imported successfully.');
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular($trashed);
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = ($this->table)::with([
            'blogCategories',
            'blogTags',
            'creator'
        ])->onlyTrashed()->latest()->get();

        $columns = [
            'image',
            'title',
            'status',
            'categories',
            'tags',
            'ordering',
            'created_by',
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'menu_title',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Trashed List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function restore($id)
    {
        $restore = ($this->table)::withTrashed()->findOrFail($id);
        $restore->restore();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' restored successfully!');
    }

    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' permanently deleted!');
    }

}
