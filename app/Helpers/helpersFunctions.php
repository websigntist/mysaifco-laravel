<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\backend\User;
use App\Models\backend\Module;
use App\Models\backend\StaticBlocks;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Models\backend\EmailTemplates;
use Illuminate\Support\Facades\Mail;

//siteUrl();              // https://yourdomain.com
//siteUrl('admin');      // https://yourdomain.com/admin
if (!function_exists('siteUrl')) {
    function siteUrl($path = '')
    {
        return URL::to('/'.$path);
    }
}

/**
 * Get the correct public path for assets.
 * Detects if assets folder is in root (production) or in public folder (local).
 *
 * @param string $path Path relative to public folder (e.g., 'assets/images')
 * @return string Full path to the asset directory
 */
if (!function_exists('getPublicAssetPath')) {
    function getPublicAssetPath($path = '')
    {
        // Check if assets folder exists in root directory (production setup)
        $rootAssetsPath = base_path('assets');
        $publicAssetsPath = public_path('assets');

        // If assets exists in root, use base_path (production)
        if (file_exists($rootAssetsPath) && is_dir($rootAssetsPath)) {
            return base_path($path);
        }

        // Otherwise, use public_path (local development)
        return public_path($path);
    }
}

/* GET CURRENT LOGIN USER ID */
if (!function_exists('currentUserId')) {
    function currentUserId()
    {
        return Auth::id(); // returns logged-in user ID or null
    }
}

/* GET LOGIN USER EMAIL ADDRESS */
if (!function_exists('currentUserEmail')) {
    function currentUserEmail()
    {
        return Auth::user()?->email;
    }
}

if (!function_exists('currentUserimage')) {
    function currentUserimage()
    {
        return Auth::user()?->image;
    }
}

if (!function_exists('currentUserName')) {
    function currentUserName()
    {
        return Auth::user()?->first_name . ' ' . Auth::user()?->last_name;
    }
}

if (!function_exists('currentUserFirstName')) {
    function currentUserFirstName()
    {
        return Auth::user()?->first_name;
    }
}

if (!function_exists('currentUserType')) {
    function currentUserType()
    {
        $user = Auth::user();
        return $user?->userType?->user_type ?? null;
    }
}


/* GET ALL ENUMBER VALUSES */
if (!function_exists('getEnumValues')) {
    /**
     * Get ENUM values for a given table and column
     *
     * @param string $table
     * @param string $column
     * @return array
     */
    function getEnumValues(string $table, string $column): array
    {
        $result = DB::select("SHOW COLUMNS FROM {$table} WHERE Field = '{$column}'");

        if (empty($result)) {
            return [];
        }

        $type = $result[0]->Type; // e.g. enum('admin','editor','viewer')

        preg_match("/^enum\('(.*)'\)$/", $type, $matches);

        return isset($matches[1]) ? explode("','", $matches[1]) : [];
    }
}

// IMAGE UPLOADING
// $variable = uploadImage($request, 'columnName', 'dbTableName');
if (!function_exists('uploadImage')) {
    /**
     * Upload image to public/assets/{table_name}
     *
     * @param \Illuminate\Http\Request $request
     * @param string $columnName (e.g. 'icon', 'banner', 'avatar')
     * @param string $tableName (database table name, e.g. 'modules')
     * @return string|null  File name or null on failure
     */
    function uploadImage($request, $columnName, $tableName)
    {
        if ($request->hasFile($columnName) && $request->file($columnName)->isValid()) {
            $file = $request->file($columnName);

            // Allowed extensions
            $allowedExtensions = [
                'jpg',
                'jpeg',
                'png',
                'webp',
                'gif',
                'svg',
                'avif'
            ];
            $extension = strtolower($file->getClientOriginalExtension());

            if (!in_array($extension, $allowedExtensions)) {
                Log::error("Invalid file type uploaded for {$columnName}: .$extension");
                return null;
            }

            // File size check (1 MB = 1024 * 1024 bytes)
            if ($file->getSize() > 1024 * 1024) {
                Log::error("File too large for {$columnName}. Max allowed is 1MB.");
                return null;
            }

            // Create filename
            $fileName = time() . "_{$columnName}." . $extension;
            $folder = getPublicAssetPath("assets/images/{$tableName}");

            // Create folder if not exists
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0777, true, true);
            }

            // Move file
            if (!$file->move($folder, $fileName)) {
                Log::error("Failed to move {$columnName} file into {$tableName}");
                return null;
            }

            return $fileName;
        }

        return null;
    }
}

// currently using this function on store and update
if (!function_exists('imageHandling_disabled')) {
    /**
     * Handle image upload, replacement, and deletion (works for create & update).
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Database\Eloquent\Model|null $model Existing model (optional for create)
     * @param string $columnName Column name in DB (e.g. 'image')
     * @param string $folderName Folder inside /public/assets/images/
     * @return string|null  New image filename or null
     */
    function imageHandling_disabled($request, $model = null, $columnName = 'image', $folderName = 'uploads')
    {
        $basePath = getPublicAssetPath("assets/images/{$folderName}");
        $oldImage = $model?->$columnName ?? null; // Safe check if model is null

        // 🔹 Handle delete image request
        if (isset($request->delete_img[$columnName]) && $request->delete_img[$columnName] == '1') {
            if (!empty($oldImage) && file_exists("{$basePath}/{$oldImage}")) {
                unlink("{$basePath}/{$oldImage}");
            }
            return null;
        }

        // 🔹 Handle new image upload
        if ($request->hasFile($columnName) && $request->file($columnName)->isValid()) {
            $file = $request->file($columnName);

            // Validate extension
            $allowedExtensions = [
                'jpg',
                'jpeg',
                'png',
                'webp',
                'gif',
                'svg',
                'avif'
            ];
            $extension = strtolower($file->getClientOriginalExtension());

            if (!in_array($extension, $allowedExtensions)) {
                \Log::error("Invalid file type uploaded for {$columnName}: .$extension");
                return $oldImage;
            }

            // Validate size (max 1MB)
            if ($file->getSize() > 1024 * 1024) {
                \Log::error("File too large for {$columnName}. Max allowed is 1MB.");
                return $oldImage;
            }

            // Create folder if not exists
            if (!File::exists($basePath)) {
                File::makeDirectory($basePath, 0777, true, true);
            }

            // Delete old file if exists
            if (!empty($oldImage) && file_exists("{$basePath}/{$oldImage}")) {
                unlink("{$basePath}/{$oldImage}");
            }

            // Save new file
            $fileName = time() . "_{$columnName}." . $extension;
            if ($file->move($basePath, $fileName)) {
                return $fileName;
            }

            \Log::error("Failed to move uploaded file for {$columnName} into {$folderName}");
        }

        return $oldImage;
    }
}

// work on store and update
if (!function_exists('imageHandling')) {
    /**
     * Handle image upload, replacement, deletion, and optional WebP conversion.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Database\Eloquent\Model|null $model Existing model (optional for create)
     * @param string $columnName Column name in DB (e.g. 'image')
     * @param string $folderName Folder inside /public/assets/images/
     * @return string|null  New image filename or null
     */
    function imageHandling($request, $model = null, $columnName = 'image', $folderName = '')
    {
        $basePath = getPublicAssetPath("assets/images/{$folderName}");
        $oldImage = $model?->$columnName ?? null;
        $enableWebpConversion = true; // Toggle this to false to disable WebP conversion

        // Delete image manually
        if (isset($request->delete_img[$columnName]) && $request->delete_img[$columnName] == '1') {
            if (!empty($oldImage) && file_exists("{$basePath}/{$oldImage}")) {
                unlink("{$basePath}/{$oldImage}");
            }
            return null;
        }

        // Handle new upload
        if ($request->hasFile($columnName) && $request->file($columnName)->isValid()) {
            $file = $request->file($columnName);
            $extension = strtolower($file->getClientOriginalExtension());
            $allowedExtensions = [
                'jpg',
                'jpeg',
                'png',
                'webp',
                'gif',
                'svg',
                'avif'
            ];

            if (!in_array($extension, $allowedExtensions)) {
                \Log::error("Invalid file type uploaded for {$columnName}: .$extension");
                return $oldImage;
            }

            // Size limit (1MB)
            $maxSize = 2 * 1024 * 1024; // 2MB

            if ($file->getSize() > $maxSize) {
                \Log::error("File too large for {$columnName}. Max allowed is 2MB.");
                return $oldImage;
            }

            // Create folder if not exists
            if (!File::exists($basePath)) {
                File::makeDirectory($basePath, 0777, true, true);
            }

            // Delete old image
            if (!empty($oldImage) && file_exists("{$basePath}/{$oldImage}")) {
                unlink("{$basePath}/{$oldImage}");
            }

            // Convert image into webP (optional)
            if ($enableWebpConversion && in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                $imageData = file_get_contents($file->getRealPath());
                $image = imagecreatefromstring($imageData);
                $fileName = time() . '_' . uniqid() . "_{$columnName}.webp";
                $webpPath = "{$basePath}/{$fileName}";

                if ($image) {
                    // Ensure truecolor (fixes "Palette image not supported" issue)
                    if (!imageistruecolor($image)) {
                        $trueColor = imagecreatetruecolor(imagesx($image), imagesy($image));
                        imagecopy($trueColor, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
                        imagedestroy($image);
                        $image = $trueColor;
                    }

                    if (imagewebp($image, $webpPath, 90)) {
                        imagedestroy($image);
                        return $fileName;
                    } else {
                        \Log::error("Failed to convert image to WebP for {$columnName}");
                    }
                }
            }

            // Normal file move (if WebP disabled or not convertible)
            $fileName = time() . '_' . uniqid() . "_{$columnName}." . $extension;
            if ($file->move($basePath, $fileName)) {
                return $fileName;
            }

            \Log::error("Failed to move uploaded file for {$columnName} into {$folderName}");
        }

        return $oldImage;
    }
}

// update image
// $dataToUpdate['image'] = updateImage($request, 'image', 'pages', $page->image);
if (!function_exists('updateImage')) {
    /**
     * Update (replace/delete) image in public/assets/{tableName}
     *
     * @param \Illuminate\Http\Request $request
     * @param string $columnName e.g. 'image'
     * @param string $tableName e.g. 'pages'
     * @param string|null $oldFile Existing file name from DB
     * @return string|null
     */
    function updateImage($request, $columnName, $tableName, $oldFile = null)
    {
        $folder = getPublicAssetPath("assets/images/{$tableName}");

        // Ensure folder exists
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0777, true, true);
        }

        // Handle deletion request
        if ($request->input("delete_img.$columnName") == '1') {
            if ($oldFile && $oldFile !== '0' && file_exists($folder . '/' . $oldFile)) {
                unlink($folder . '/' . $oldFile);
            }
            return '0'; // Set to "0" as requested
        }

        // Handle new file upload
        if ($request->hasFile($columnName) && $request->file($columnName)->isValid()) {
            // Delete old file first
            if ($oldFile && $oldFile !== '0' && file_exists($folder . '/' . $oldFile)) {
                unlink($folder . '/' . $oldFile);
            }

            $file = $request->file($columnName);

            // Allowed extensions
            $allowedExtensions = [
                'jpg',
                'jpeg',
                'png',
                'webp',
                'gif',
                'svg',
                'avif'
            ];
            $extension = strtolower($file->getClientOriginalExtension());

            if (!in_array($extension, $allowedExtensions)) {
                Log::error("Invalid file type uploaded for {$columnName}: .$extension");
                return $oldFile;
            }

            // Max file size (1 MB)
            if ($file->getSize() > 1024 * 1024) {
                Log::error("File too large for {$columnName}. Max allowed is 1MB.");
                return $oldFile;
            }

            $fileName = time() . "_{$columnName}_" . Str::random(10) . '.' . $extension;

            if (!$file->move($folder, $fileName)) {
                Log::error("Failed to move {$columnName} file into {$tableName}");
                return $oldFile;
            }

            return $fileName;
        }

        return $oldFile; // Return old file if no change
    }
}

// get created by
// use directly in blade.php file {{ getUserFullName($variable->created_by) }}
if (!function_exists('getUserFullName')) {
    /**
     * Get full name (first_name + last_name) of a user by ID
     *
     * @param int|null $userId
     * @param string $separator
     * @return string
     */
    function getCreatedBy($userId, $separator = ' ')
    {
        if (!$userId) {
            return '';
        }

        $user = User::find($userId);

        if ($user) {
            return trim($user->first_name . $separator . $user->last_name);
        }

        return '';
    }
}

// image not found
if (!function_exists('imageNotFound')) {
    function imageNotFound()
    {
        return asset('assets/backend/images/noimg.jpg');
    }
}

// user permission module function
/*if (!function_exists('buildModuleCheckBox')) {
    function buildModuleCheckBox($parent, $menu, $assignedModules, $selectedActions)
    {
        $html = '';

        if (isset($menu['parents'][$parent])) {
            $html .= '<ul>';

            foreach ($menu['parents'][$parent] as $itemId) {
                $item = $menu['items'][$itemId];
                $isChecked = in_array($itemId, $assignedModules) ? 'checked' : '';

                // Parent module
                $html .= "<li id='node-{$itemId}' data-jstree='{\"type\":\"default\"}'>";
                $html .= "<input type='checkbox' class='jstree-checkbox' name='modules[]' value='{$itemId}' {$isChecked}> ";
                $html .= "<label for='node-{$itemId}'>" . e($item['module_title']) . "</label>";

                // Actions list
                if (!empty($item['actions'])) {
                    $actions = preg_split('/[|,]/', $item['actions']);
                    $html .= '<ul>';

                    foreach ($actions as $act) {
                        $act = trim($act);
                        if ($act === '') continue;

                        // Convert to slug for input value (e.g. "Delete All" → "delete-all")
                        $slug = strtolower(preg_replace('/\s+/', '-', $act));

                        // Check if already selected
                        $isActChecked = (
                            !empty($selectedActions[$itemId]) &&
                            in_array($slug, array_map(fn($a) => strtolower(preg_replace('/\s+/', '-', $a)), $selectedActions[$itemId]))
                        ) ? 'checked' : '';

                        $html .= "<li id='node-{$itemId}-{$slug}' data-jstree='{\"type\":\"css\"}'>";
                        $html .= "<input type='checkbox' class='jstree-checkbox' name='actions[{$itemId}][]' value='{$slug}' {$isActChecked}> ";
                        $html .= "<label for='node-{$itemId}-{$slug}'>" . ucfirst($act) . "</label>";
                        $html .= "</li>";
                    }

                    $html .= '</ul>';
                }

                // Recursive children
                if (isset($menu['parents'][$itemId])) {
                    $html .= buildModuleCheckBox($itemId, $menu, $assignedModules, $selectedActions);
                }

                $html .= '</li>';
            }

            $html .= '</ul>';
        }

        return $html;
    }
}*/

if (!function_exists('buildModuleCheckBox')) {
    function buildModuleCheckBox($parent, $menu, $assignedModules, $selectedActions)
    {
        $html = '';

        // Define SVG icons for each action
        $icons = [
            'add'        => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5v14m-7 -7h14" /></svg>',
            'edit'       => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"> <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" /> <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" /> </g> </svg>',
            'delete'     => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7h16M10 11v6m4 -6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7V4h6v3" /></svg>',
            'delete-all' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7h16M10 11v6m4 -6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7V4h6v3" /></svg>',
            'import'     => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>',
            'export'     => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>',
            'view'       => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c0 0 -4 -7 -10 -7s-10 7 -10 7s4 7 10 7s10 -7 10 -7" /></svg>',
            'status'       => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"> <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 11A8.1 8.1 0 0 0 4.5 9M4 5v4h4m-4 4a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /> </svg>',
            'more'       => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"> <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0-2 0m0 7a1 1 0 1 0 2 0a1 1 0 1 0-2 0m0-14a1 1 0 1 0 2 0a1 1 0 1 0-2 0" /> </svg>',
            'trashed'    => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"> <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <path d="M5 18a2 2 0 1 0 4 0a2 2 0 1 0-4 0M5 6a2 2 0 1 0 4 0a2 2 0 1 0-4 0m2 2v8m2 2h6a2 2 0 0 0 2-2v-5" /> <path d="m14 14l3-3l3 3M15 4l4 4m-4 0l4-4" /> </g> </svg>',
            'duplicate'  => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M7 9.667A2.667 2.667 0 0 1 9.667 7h8.666A2.667 2.667 0 0 1 21 9.667v8.666A2.667 2.667 0 0 1 18.333 21H9.667A2.667 2.667 0 0 1 7 18.333z"/><path d="M4.012 16.737A2 2 0 0 1 3 15V5c0-1.1.9-2 2-2h10c.75 0 1.158.385 1.5 1"/></g></svg>',
        ];

        if (isset($menu['parents'][$parent])) {
            $html .= '<ul>';

            foreach ($menu['parents'][$parent] as $itemId) {
                $item = $menu['items'][$itemId];
                $isChecked = in_array($itemId, $assignedModules) ? 'checked' : '';

                // Parent module
                $html .= "<li id='node-{$itemId}' data-jstree='{\"type\":\"default\"}'>";
                $html .= "<input type='checkbox' class='jstree-checkbox' name='modules[]' value='{$itemId}' {$isChecked}> ";
                $html .= "<label for='node-{$itemId}' class='-fw-bold text-dark'>" . e($item['module_title']) . "</label>";

                // Actions
                if (!empty($item['actions'])) {
                    $actions = preg_split('/[|,]/', $item['actions']);
                    $html .= '<ul>';

                    foreach ($actions as $act) {
                        $act = trim($act);
                        if ($act === '' || strtolower($act) === 'nil') continue;

                        // Convert to slug (e.g. "Delete All" → "delete-all")
                        $slug = strtolower(preg_replace('/\s+/', '-', $act));

                        // Check if already selected
                        $isActChecked = (
                            !empty($selectedActions[$itemId]) &&
                            in_array($slug, array_map(fn($a) => strtolower(preg_replace('/\s+/', '-', $a)), $selectedActions[$itemId]))
                        ) ? 'checked' : '';

                        // Pick an icon
                        $iconSvg = $icons[$slug] ?? '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dot" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1" /></svg>';

                        $html .= "<li id='node-{$itemId}-{$slug}' data-jstree='{\"type\":\"css\"}'>";
                        $html .= "<input type='checkbox' class='jstree-checkbox' name='actions[{$itemId}][]' value='{$slug}' {$isActChecked}> ";
                        $html .= "<label for='node-{$itemId}-{$slug}' class='d-inline-flex align-items-center gap-1 ms-1'>"
                            . $iconSvg . ' ' . ucfirst($act) . "</label>";
                        $html .= "</li>";
                    }

                    $html .= '</ul>';
                }

                // Recursively handle children
                if (isset($menu['parents'][$itemId])) {
                    $html .= buildModuleCheckBox($itemId, $menu, $assignedModules, $selectedActions);
                }

                $html .= '</li>';
            }

            $html .= '</ul>';
        }

        return $html;
    }
}

// apply permission on buttons method #1
// use
// @if(hasPermission('pages', 'edit')) define button code  @endif
if (!function_exists('hasPermission')) {
    function hasPermission($moduleSlug, $action)
    {
        $user = Auth::user();
        if (!$user) {
            return false;
        }

        // only 'admin', 'super admin', 'administrator' allow full access
        $adminRoles = [
            'admin',
            'super admin',
            'administrator'
        ];
        $userType = strtolower(optional($user->userType)->user_type);

        if (in_array($userType, $adminRoles)) {
            $content = $label ?? ucfirst($action);
            return '<a href="' . $url . '" class="' . $class . '">' . $content . '</a>';
        }
        // only 'admin', 'super admin', 'administrator' allow full access

        // get user_type_id
        $userTypeId = $user->user_type_id;

        // get module_id by slug
        $module = DB::table('modules')->where('module_slug', $moduleSlug)->first();
        if (!$module) {
            return false;
        }

        // get permissions
        $record = DB::table('user_type_modules_rel')->where('user_type_id', $userTypeId)->where('module_id', $module->id)->first();

        if (!$record || empty($record->actions)) {
            return false;
        }

        $allowedActions = array_map('trim', explode('|', $record->actions));

        return in_array(strtolower($action), array_map('strtolower', $allowedActions));
    }
}

// apply permission on buttons method #2
// use
// {!! hasUserPermission('pages', 'edit', route('pages.edit', $page->id), 'Edit') !!}
/*if (!function_exists('hasUserPermission')) {
    function hasUserPermission($moduleSlug, $action, $url = '#', $label = null, $class = 'font-medium text-blue-600 hover:underline text-white')
    {
        $user = Auth::user();
        if (!$user) {
            return '';
        }

        // only 'admin', 'super admin', 'administrator' allow full access
        $adminRoles = ['admin', 'super admin', 'administrator'];
        $userType = strtolower(optional($user->userType)->user_type);

        if (in_array($userType, $adminRoles)) {
            $content = $label ?? ucfirst($action);
            return '<a href="' . $url . '" class="' . $class . '">' . $content . '</a>';
        }
        // only 'admin', 'super admin', 'administrator' allow full access

        // Normal permission check
        $userTypeId = $user->user_type_id;

        $module = DB::table('modules')
            ->where('module_slug', $moduleSlug)
            ->first();

        if (!$module) {
            return '';
        }

        $record = DB::table('user_type_modules_rel')
            ->where('user_type_id', $userTypeId)
            ->where('module_id', $module->id)
            ->first();

        if (!$record || empty($record->actions)) {
            return '';
        }

        $allowedActions = array_map('trim', explode('|', $record->actions));

        if (in_array(strtolower($action), array_map('strtolower', $allowedActions))) {
            $content = $label ?? ucfirst($action);
            return '<a href="' . $url . '" class="' . $class . '">' . $content . '</a>';
        }

        return '';
    }
}*/
    if (!function_exists('hasUserPermission')) {
    function hasUserPermission($moduleSlug, $action, $url = '#', $label = null, $class = 'font-medium text-blue-600 hover:underline text-white')
    {
        $user = Auth::user();
        if (!$user) {
            return '';
        }

        // Get role name from related user_types table
        $userType = strtolower(optional($user->userType)->user_type);

        $adminRoles = [
            'admin',
            'super admin',
            'administrator'
        ];

        // Full access for admins
        if (in_array($userType, $adminRoles)) {
            $content = $label ?? ucfirst($action);
            return '<a href="' . $url . '" class="' . $class . '">' . $content . '</a>';
        }

        // Normal permission check
        $userTypeId = $user->user_type_id;

        $module = DB::table('modules')->where('module_slug', $moduleSlug)->first();

        if (!$module) {
            return '';
        }

        $record = DB::table('user_type_modules_rel')->where('user_type_id', $userTypeId)->where('module_id', $module->id)->first();

        if (!$record || empty($record->actions)) {
            return '';
        }

        $allowedActions = array_map('trim', explode('|', $record->actions));

        if (in_array(strtolower($action), array_map('strtolower', $allowedActions))) {
            $content = $label ?? ucfirst($action);
            return '<a href="' . $url . '" class="' . $class . '">' . $content . '</a>';
        }

        return '';
    }
}

if (!function_exists('form_action_buttons')) {
    function form_action_buttons($default = 'Submit Now', $save_new = 'Save & New', $save_stay = 'Save & Stay')
    {
        $html = <<<HTML
        <div class="d-flex justify-content-center">
            <div class="btn-group me-1">
                <button type="submit" class="btn btn-primary waves-effect waves-light" name="submitBtn" value="default">
                    <span class="icon-xs icon-base ti tabler-database-plus me-2"></span> {$default}
                </button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button type="submit" class="dropdown-item waves-effect" name="submitBtn" value="save_new">
                            <i class="icon-base ti tabler-arrow-ramp-right me-1"></i> {$save_new}
                        </button>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item waves-effect" name="submitBtn" value="save_stay">
                            <i class="icon-base ti tabler-arrow-ramp-left me-1"></i> {$save_stay}
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        HTML;

        return $html;
    }
}

if (!function_exists('list_action_buttons')) {
    function list_action_buttons($addNewRoute = '', $deleteAllRoute = '', $importRoute = '', $exportRoute = '')
    {
        $html = '<div class="card-header-elements ms-auto">
                       <a href="' . $addNewRoute . '" class="btn btn-sm btn-primary waves-effect d-lg-block d-none"
                          data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Add New Record">
                          <span class="icon-xs icon-base ti tabler-plus me-2"></span>Add New</a>

                       <button type="submit" class="btn btn-sm btn-danger waves-effect d-lg-block d-none"
                          data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Selected Items">
                          <span class="icon-xs icon-base ti tabler-trash me-2"></span>Delete All</button>

                       <a href="' . $addNewRoute . '" class="btn btn-sm btn-icon btn-primary waves-effect d-lg-none d-sm-block"
                          data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Add New Record">
                          <span class="icon-base ti tabler-plus icon-22px"></span></a>

                       <a href="' . $deleteAllRoute . '" class="btn btn-sm btn-icon btn-danger waves-effect d-lg-none d-sm-block"
                          data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Selected Items">
                          <span class="icon-base ti tabler-trash icon-22px"></span></a>

                       <a href="' . $importRoute . '" class="btn btn-sm btn-icon btn-success waves-effect"
                          data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Import CSV">
                          <span class="icon-base ti tabler-upload icon-22px"></span></a>

                       <a href="' . $exportRoute . '" class="btn btn-sm btn-icon btn-dark waves-effect"
                          data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Export CSV">
                          <span class="icon-base ti tabler-download icon-22px"></span></a>
                    </div>';
        return $html;
    }
}

if (!function_exists('data_action_buttons')) {
    function data_action_buttons($deleteRoute = '', $viewRoute = '', $editRoute = '', $statusRoute = '')
    {
        $html = '<div style="display: flex !important;">
                  <div class="d-flex align-items-center">
                   <a href="' . $deleteRoute . '" class="btn btn-text-secondary rounded-pill waves-effect btn-icon delete-record"
                      data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Item">
                      <i class="icon-base ti tabler-trash icon-22px"></i> </a>

                   <a href="' . $viewRoute . '" class="btn btn-text-secondary rounded-pill waves-effect btn-icon"
                      data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View Details">
                      <i class="icon-base ti tabler-eye icon-22px"></i> </a>

                   <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="icon-base ti tabler-dots-vertical"></i>
                      </button>
                      <div class="dropdown-menu" style="">
                         <a class="dropdown-item waves-effect" href="' . $editRoute . '"><i class="icon-base ti tabler-pencil me-1"></i> Edit</a>
                         <a class="dropdown-item waves-effect" href="' . $statusRoute . '"><i class="icon-base ti tabler-status-change me-1"></i> Status</a>
                      </div>
                   </div>
                </div>
                </div>';

        return $html;
    }
}

if (!function_exists('goBack')) {
    function goBack($goBack_url = '', $submitLabel = 'Submit')
    {
        $html = '<div style="display: flex !important;">
               <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light d-lg-block d-none d-flex me-2" name="submitBtn" value="default">
                  <span class="icon-base ti tabler-database-plus icon-20px me-2"></span>'.$submitLabel.'</button>

                   <button type="button" class="btn btn-icon btn-primary waves-effect waves-light d-lg-none d-sm-block d-flex me-2" name="submitBtn" value="default">
                    <span class="icon-base ti tabler-database-plus icon-20px"></span>
                  </button>

               <a href="' . route($goBack_url) . '" class="btn btn-sm btn-dark waves-effect waves-light d-lg-block d-none d-flex"
                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go Back">
                  <span class="icon-base ti tabler-arrow-back-up-double icon-22px me-2"></span>Back</a>

                  <a href="' . route($goBack_url) . '" class="btn btn-icon btn-dark waves-effect d-flex d-lg-none d-sm-block d-flex"
                   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go Back">
                      <span class="icon-base ti tabler-arrow-back-up-double icon-22px"></span>
                  </a>
                  </div>
                  ';

        return $html;
    }
}

// for bootstrape
if (!function_exists('actionButton')) {
    /**
     * Generate permission-based action buttons or form buttons
     *
     * @param string $moduleSlug   The module slug (used for permission check)
     * @param string $action       The action type (add, edit, delete, etc.)
     * @param string|null $url     The target URL (for anchor links)
     * @param string|null $label   The button label (visible text)
     * @param string|null $icon    The icon class (optional)
     * @param string|null $tooltip The tooltip text (optional)
     * @param string|null $class   Custom button class (optional)
     * @return string
     */
    function actionButton($moduleSlug, $action, $url = '#', $label = null, $icon = null, $tooltip = null, $class = null)
    {
        $user = Auth::user();
        if (!$user) return '';

        // Default icons
        $defaultIcons = [
            'add'        => 'tabler-plus',
            'delete'     => 'tabler-trash',
            'add_mob'    => 'tabler-plus',
            'delete_mob' => 'tabler-trash',
            'import'     => 'tabler-upload',
            'export'     => 'tabler-download',
        ];
        $icon = $icon ?? ($defaultIcons[$action] ?? 'tabler-dots');

        // Default button classes
        $defaultClasses = [
            'add'        => 'btn btn-sm btn-primary waves-effect d-lg-block d-none d-flex',
            'delete'     => 'btn btn-sm btn-danger waves-effect d-lg-block d-none d-flex confirm_all',
            'add_mob'    => 'btn btn-sm btn-icon btn-primary waves-effect d-lg-none d-sm-block d-flex',
            'delete_mob' => 'btn btn-sm btn-icon btn-danger waves-effect d-lg-none d-sm-block d-flex confirm_all',
            'import'     => 'btn btn-sm btn-icon btn-success waves-effect d-flex',
            'export'     => 'btn btn-sm btn-icon btn-dark waves-effect d-flex',
        ];
        $class = $class ?? ($defaultClasses[$action] ?? 'btn btn-sm btn-light waves-effect');

        // Tooltip (fallback to label or action name)
        $tooltipText = $tooltip ?? ucfirst($label ?? str_replace('_', ' ', $action));

        // Permission check
        $userType = strtolower(optional($user->userType)->user_type);
        $adminRoles = ['admin', 'super admin', 'administrator'];
        $hasPermission = false;

        if (in_array($userType, $adminRoles)) {
            $hasPermission = true;
        } else {
            $userTypeId = $user->user_type_id;
            $module = DB::table('modules')->where('module_slug', $moduleSlug)->first();

            if ($module) {
                $record = DB::table('user_type_modules_rel')
                    ->where('user_type_id', $userTypeId)
                    ->where('module_id', $module->id)
                    ->first();

                if ($record && !empty($record->actions)) {
                    $allowedActions = array_map('trim', explode('|', strtolower($record->actions)));
                    $hasPermission = in_array(strtolower($action), $allowedActions);
                }
            }
        }

        if (!$hasPermission) return '';

        // 🟥 DELETE button (Desktop)
        if ($action === 'delete') {
            return sprintf(
                '<button type="button" class="%s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s">
                    <span class="icon-xs icon-base ti %s me-2 topicon"></span>%s
                </button>',
                e($class),
                e($tooltipText),
                e($icon),
                e($label ?? '')
            );
        }

        // 🟥 DELETE_MOB (Mobile)
        if ($action === 'delete_mob') {
            return sprintf(
                '<button type="button" class="%s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s">
                    <span class="icon-base ti %s icon-22px"></span>
                </button>',
                e($class),
                e($tooltipText),
                e($icon)
            );
        }

        // 🟩 MOBILE Buttons (Add, Import, Export)
        if (in_array($action, ['add_mob', 'import', 'export'])) {
            return sprintf(
                '<a href="%s" class="%s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s">
                    <span class="icon-base ti %s icon-22px"></span>
                </a>',
                e($url),
                e($class),
                e($tooltipText),
                e($icon)
            );
        }

        // 🟦 DEFAULT (Desktop) Buttons
        return sprintf(
            '<a href="%s" class="%s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s">
                <span class="icon-xs icon-base ti %s me-2 topicon"></span>%s
            </a>',
            e($url),
            e($class),
            e($tooltipText),
            e($icon),
            e($label ?? '')
        );
    }
}

if (!function_exists('actionButton2')) {
    /**
     * Generate Bootstrap 5 + Tooltip + Dropdown styled action buttons
     * Supports: view (modal), delete, edit, status, and more (dropdown)
     *
     * @param string $moduleSlug
     * @param string $action
     * @param string|null $url
     * @param string|null $label
     * @param int|string|null $id
     * @param string|null $tooltip
     * @param string|null $icon
     * @param string|null $class
     * @return string
     */
    function actionButton2($moduleSlug, $action, $url = '#', $label = null, $id = null, $tooltip = null, $icon = null, $class = null)
    {
        $user = Auth::user();
        if (!$user) return '';

        // 🔹 Default icons
        $defaultIcons = [
            'view'      => 'tabler-drag-drop',
            'delete'    => 'tabler-trash',
            'edit'      => 'tabler-edit',
            'duplicate' => 'tabler-copy',
            'status'    => 'tabler-refresh',
            'more'      => 'tabler-dots-vertical',
        ];
        $icon = $icon ?? ($defaultIcons[$action] ?? 'tabler-dots');

        // 🔹 Default classes
        $defaultClasses = [
            'view'      => 'btn btn-text-secondary rounded-pill waves-effect btn-icon viewBtn',
            'delete'    => 'btn btn-text-secondary rounded-pill waves-effect btn-icon delete-record deleteBtn',
            'edit'      => 'dropdown-item waves-effect',
            'duplicate' => 'dropdown-item waves-effect',
            'status'    => 'dropdown-item waves-effect toggleStatusBtn',
            'more'      => 'btn p-0 dropdown-toggle hide-arrow',
        ];
        $class = $class ?? ($defaultClasses[$action] ?? 'btn btn-text-secondary rounded-pill waves-effect btn-icon');

        // 🔹 Tooltip text
        $tooltipText = $tooltip ?? ucfirst($label ?? str_replace('_', ' ', $action));

        // 🔹 Permission check
        $userType = strtolower(optional($user->userType)->user_type);
        $adminRoles = ['admin', 'super admin', 'administrator'];
        $hasPermission = false;

        if (in_array($userType, $adminRoles)) {
            $hasPermission = true;
        } else {
            $userTypeId = $user->user_type_id;
            $module = DB::table('modules')->where('module_slug', $moduleSlug)->first();

            if ($module) {
                $record = DB::table('user_type_modules_rel')
                    ->where('user_type_id', $userTypeId)
                    ->where('module_id', $module->id)
                    ->first();

                if ($record && !empty($record->actions)) {
                    $allowedActions = array_map('trim', explode('|', strtolower($record->actions)));
                    $hasPermission = in_array(strtolower($action), $allowedActions);
                }
            }
        }

        if (!$hasPermission) return '';

        // 🔸 DELETE (dropdown item with icon + label)
        if ($action === 'delete' && str_contains($class, 'dropdown-item')) {
            return sprintf(
                '<button type="button" class="%s" data-id="%s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s">
                    <i class="icon-base ti %s me-1"></i> %s
                </button>',
                e($class),
                e($id ?? ''),
                e($tooltipText),
                e($icon),
                e($label ?? 'Delete')
            );
        }

        // 🔸 DELETE BUTTON
        if ($action === 'delete') {
            return sprintf(
                '<button type="button" class="%s" data-id="%s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s">
                    <i class="icon-base ti %s icon-22px"></i>
                </button>',
                e($class),
                e($id ?? ''),
                e($tooltipText),
                e($icon)
            );
        }

        // 🔸 VIEW BUTTON (with modal + data-id) — wrapper: modal + tooltip cannot share one element
        if ($action === 'view') {
            return sprintf(
                '<span class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="%s">
                    <a href="javascript:void(0);" data-id="%s" data-bs-toggle="modal" data-bs-target="%s" class="%s">
                        <i class="icon-base ti %s icon-22px"></i>
                    </a>
                </span>',
                e($tooltipText),
                e($id ?? ''),
                e($url),
                e($class),
                e($icon)
            );
        }

        // 🔸 EDIT (row icon — same permission as edit)
        if ($action === 'edit' && str_contains($class, 'btn-icon')) {
            return sprintf(
                '<a href="%s" class="%s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s"><i class="icon-base ti %s icon-22px"></i></a>',
                e($url),
                e($class),
                e($tooltipText),
                e($icon)
            );
        }

        // 🔸 EDIT (dropdown items)
        if ($action === 'edit') {
            return sprintf(
                '<a href="%s" class="%s">
                    <i class="icon-base ti %s me-1"></i> %s
                </a>',
                e($url),
                e($class),
                e($icon),
                e($label ?? ucfirst($action))
            );
        }

        // 🔸 DUPLICATE (dropdown link)
        if ($action === 'duplicate') {
            return sprintf(
                '<a href="%s" class="%s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s">
                    <i class="icon-base ti %s me-1"></i> %s
                </a>',
                e($url),
                e($class),
                e($tooltipText),
                e($icon),
                e($label ?? 'Duplicate')
            );
        }

        // 🔸 STATUS (dropdown item → button)
        if ($action === 'status') {
            return sprintf(
                '<button type="button" class="%s" data-id="%s" data-current-status="%s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s">
                    <i class="icon-base ti %s me-1"></i> %s
                </button>',
                e($class),
                e($id ?? ''),
                e($label ?? ''), // label holds current status
                e($tooltipText),
                e($icon),
                e(ucfirst($action))
            );
        }

        // 🔸 MORE (dropdown trigger) — tooltip on inner <i> only so .dropdown > [data-bs-toggle=dropdown] stays valid
        if ($action === 'more') {
            $moreTitle = $tooltip ?? __('More Actions');

            return sprintf(
                '<button type="button" class="%s" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon-base ti %s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s"></i>
                </button>',
                e($class),
                e($icon),
                e($moreTitle)
            );
        }

        // 🔸 Fallback (generic button)
        return sprintf(
            '<a href="%s" class="%s" data-bs-toggle="tooltip" data-bs-placement="top" title="%s">
                <i class="icon-base ti %s icon-22px"></i>
            </a>',
            e($url),
            e($class),
            e($tooltipText),
            e($icon)
        );
    }
}

// call dynamic menu
if (!function_exists('buildMenuHtml')) {
    function buildMenuHtml($parent, $menu, $isRoot = false)
    {
        $html = '';

        if (isset($menu['parents'][$parent])) {
            // Root wrapper
            if ($isRoot) {
                $html .= '<ul class="menu-inner py-1">';
            } else {
                $html .= '<ul class="menu-sub">';
            }

            foreach ($menu['parents'][$parent] as $moduleId) {
                $item = $menu['items'][$moduleId];
                $hasChildren = isset($menu['parents'][$moduleId]);

                // ✅ If module is a header (non-clickable section title)
                if (!empty($item['is_header']) && $item['is_header']) {
                    $html .= '<li class="menu-header small">
                                <span class="menu-header-text">' . e($item['module_title']) . '</span>
                              </li>';
                    continue;
                }

                // Build icon
                $iconHtml = !empty($item['icon'])
                    ? '<i class="menu-icon icon-base ti tabler-' . e($item['icon']) . '"></i>'
                    : '<i class="menu-icon icon-base ti tabler-dots"></i>';

                if ($hasChildren) {
                    $html .= '
                    <li class="menu-item menuid-'.$item['id'].' '. $item['module_slug'].'">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            ' . $iconHtml . '
                            <div data-i18n="' . e($item['module_title']) . '">' . e($item['module_title']) . '</div>
                        </a>
                        ' . buildMenuHtml($moduleId, $menu, false) . '
                    </li>';
                } else {
                    // Resolve route safely
                    $url = '#';
                    if (!empty($item['module_slug'])) {
                        try {
                            $url = route($item['module_slug']);
                        } catch (\Exception $e) {
                            // Route doesn’t exist → skip gracefully
                        }
                    }

                    $html .= '
                    <li class="menu-item menuid-'.$item['id'].' '. $item['module_slug'].'">
                        <a href="' . $url . '" class="menu-link">'
                            . $iconHtml . '
                            <div data-i18n="' . e($item['module_title']) . '">' . e($item['module_title']) . '</div>
                        </a>
                    </li>';
                }
            }

            $html .= '</ul>';
        }

        return $html;
    }
}

if (!function_exists('getUserMenus')) {
    function getUserMenus()
    {
        $user = Auth::user();
        if (!$user) {
            return [];
        }

        $alwaysAllowed = [
            'admin',
            'super admin',
            'administrator'
        ];

        // If super role → get ALL modules
        if (in_array(strtolower($user->userType->user_type ?? ''), $alwaysAllowed)) {
            $modules = Module::where('status', 'Active')->orderBy('ordering')->get();
        } else {
            // Normal role → only assigned modules
            $allowedModules = DB::table('user_type_modules_rel')->where('user_type_id', $user->user_type_id)->pluck('module_id')->toArray();

            $modules = Module::whereIn('id', $allowedModules)->where('status', 'Active')->orderBy('ordering')->get();
        }

        $menu = [
            'items'   => $modules->keyBy('id')->toArray(),
            'parents' => [],
        ];

        foreach ($modules as $item) {
            $menu['parents'][$item->parent_id][] = $item->id;
        }

        return $menu;
    }
}

if (!function_exists('getUserDashboardModules')) {
    function getUserDashboardModules()
    {
        $user = Auth::user();
        if (!$user) {
            return collect();
        }

        // Get all active modules
        $modules = DB::table('modules')->where('status', 'Active')->orderBy('ordering')->get();

        // Admins always see all modules
        $adminTypes = [
            'admin',
            'super admin',
            'administrator'
        ];
        if (in_array(strtolower($user->user_type), $adminTypes)) {
            return $modules;
        }

        // Otherwise filter by assigned modules
        $userModules = DB::table('user_type_modules_rel')->where('user_type_id', $user->user_type_id)->pluck('module_id')->toArray();

        return $modules->filter(fn($m) => in_array($m->id, $userModules));
    }
}

// get all setting values
if (!function_exists('get_setting')) {
    function get_setting($setting_name, $key = null)
    {
        // Fetch all options once and cache them for the request lifecycle
        static $_setting = null;

        if ($_setting === null) {
            $_setting = DB::table('settings')->pluck('setting_value', 'setting_name')->toArray();
        }

        return $_setting[$setting_name] ?? null;
    }
}

// get static block
//
if (!function_exists('get_block')) {
    /**
     * Retrieve a static block by its identifier.
     *
     * @param string $identifier
     * @param bool $get_all Whether to return full object or just description
     * @return mixed
     */
    function get_block($identifier, $get_all = false)
    {
        $block = DB::table('static_blocks')
            ->where('status', 'Active')
            ->where('identifier', $identifier)
            ->first();

        if (!$block) {
            return false;
        }

        // Optional: Replace URLs if helper exists
        if (function_exists('replace_urls')) {
            $block->description = replace_urls($block->description);
        }

        // Optional: Run through shortcodes
        if (function_exists('do_shortcode')) {
            $block->description = do_shortcode($block->description);
        }

        // ✅ Always return the full object (safer and cleaner)
        return $get_all ? $block : $block->description;
    }
}

/* =========== new functions start ============*/
// {!! card_action_element('User Form') !!}

if (!function_exists('card_action_element')) {
    function card_action_element($formTitle = '')
    {
        $html = '
        <div class="card-action-element">
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <a href="javascript:void(0);" class="card-collapsible">
                        <i class="icon-base ti tabler-chevron-up icon-sm"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript:void(0);" class="card-reload">
                        <i class="icon-base ti tabler-rotate-clockwise-2 scaleX-n1-rtl icon-sm"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript:void(0);" class="card-expand">
                        <i class="icon-base ti tabler-arrows-maximize me-2 icon-sm"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript:void(0);" class="card-close">
                        <i class="icon-base ti tabler-x icon-sm"></i>
                    </a>
                </li>
            </ul>
        </div>';

        return $html;
    }
}

/*if (!function_exists('form_action_buttons')) {
    function form_action_buttons($save_new = '', $save_stay = '')
    {
        $html = ' <div class="d-flex justify-content-center">
               <div class="btn-group me-1">
                  <button type="submit" class="btn btn-primary waves-effect waves-light">
                     <span class="icon-xs icon-base ti tabler-database-plus me-2"></span> Submit Now
                  </button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                     <span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                     <li><button type="submit" class="dropdown-item waves-effect">
                     <i class="icon-base ti tabler-arrow-ramp-right me-1"></i> Save & New
                     </button> </li>
                     <li><button type="submit" class="dropdown-item waves-effect">
                     <i class="icon-base ti tabler-arrow-ramp-left me-1"></i>Save & Stay</button>
                     </li>
                  </ul>
               </div>
            </div>';
        return $html;
    }
}*/

if (!function_exists('heading_breadcrumbs')) {
    function heading_breadcrumbs($heading = '', $breadcrumbs = '')
    {
        $breadcrumbText = $breadcrumbs ? $breadcrumbs : $heading;

        $html = '<div class="d-flex align-items-center formcard mt-1">
            <h5 class="mb-1 text-capitalize fw-medium me-1">' . htmlspecialchars($heading) . '</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom-icon mb-0">
                    <li class="me-1">
                        <i class="text-gray icon-base ti tabler-arrow-bar-to-right icon-xs me-1 ms-1"></i>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Home</a>
                        <i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
                    </li>
                    <li class="breadcrumb-item active text-capitalize">' . htmlspecialchars($breadcrumbText) . '</li>
                </ol>
            </nav>
        </div>';

        return $html;

    }
}

if (!function_exists('error_label')) {
    function error_label($error_label)
    {
        $html = '<div class="invalid-feedback">Please enter ' . _label($error_label) . '.</div>';
        return $html;
    }
}

if (!function_exists('error_message')) {
    function error_message($error_label)
    {
        // Access the global error bag
        $errors = session('errors');

        if ($errors && $errors->has($error_label)) {
            return '<div class="invalid-feedback">' . e($errors->first($error_label)) . '</div>';
        }

        return ''; // no error
    }
}

if (!function_exists('_label')) {
    function _label($label = '')
    {
        return str_replace('_', ' ', $label.': ');
    }
}

if (!function_exists('notify')) {
    function notify($type, $message)
    {
        session()->flash($type, $message);
    }
}

if (!function_exists('image_input_option')) {
    function image_input_option($image_path = '', $name = 'image', $width = '', $alt = 'image not found',  $title = 'image title', $file_ext = 'webp, jpg, png, svg, jpeg (max size 2mb)')
    {
        $html = <<<HTML
        <input class="form-control"
               name="{$name}"
               type="file"
               id="image">
        <div class="light-gallery text-center">
            <a href="{$image_path}">
                <img class="rounded mt-2 img-fluid border"
                src="{$image_path}"
                width="{$width}"
                alt="{$alt}"
                title="{$title}">
            </a>
        </div>
        <div class="text-center my-3">
            <small class="text-danger">{$file_ext}</small>
        </div>

        <input type="hidden" name="delete_img[image]" value="0" class="delete_img">

            <div class="d-flex justify-content-center fImg">
                <button type="button" value="Delete"
                    class="del_img btn btn-sm btn-danger waves-effect waves-light mt-2">
                    Remove Image
                </button>
            </div>
        HTML;

        return $html;
    }
}

if (!function_exists('setting_image')) {
    function setting_image($label = '', $image_name = '')
    {
        // Get setting value (from database or config)
        $imageFile = get_setting($image_name);
        $imageUrl = $imageFile ? asset('assets/images/settings/' . $imageFile) : imageNotFound();

        // Return HTML
        $html = <<<HTML
        <div class="row align-items-start image-row mb-3">
            <div class="col-md-8">
                <label class="form-label text-capitalize" for="{$image_name}">{$label}</label>
                <input class="form-control" type="file" name="settings[{$image_name}]" id="{$image_name}">
            </div>

            <div class="col-md-2">
                <div class="avatar avatar-lg light-gallery">
                    <a href="{$imageUrl}" target="_blank">
                        <img src="{$imageUrl}" class="rounded mt-3 img-fluid border" width="75" alt="no image">
                    </a>
                </div>
            </div>

            <div class="col-md-2">
                <input type="hidden" name="delete_img[{$image_name}]" value="0" class="setting_delete_img">
                <div class="d-flex justify-content-center mt-5 sfImg">
                    <button type="button" class="setting_del_img btn btn-sm btn-danger waves-effect waves-light mt-2">
                        <span class="icon-sm icon-base ti tabler-trash iconmrgn me-1"></span>
                    </button>
                </div>
            </div>
        </div>

        HTML;

        return $html;
    }
}

/**
 * Safely load assets (converted from Vite to direct asset loading)
 *
 * @param string|array $assets Asset path(s) to load
 * @return string HTML output or empty string if asset not found
 */
if (!function_exists('vite_safe')) {
    function vite_safe($assets)
    {
        try {
            // Convert Vite asset paths to direct asset paths
            $assets = is_array($assets) ? $assets : [$assets];
            $html = '';

            foreach ($assets as $asset) {
                // Remove 'resources/assets/' prefix and convert to public asset path
                $assetPath = str_replace('resources/assets/', 'assets/', $asset);

                // Determine if it's CSS or JS based on file extension
                $extension = pathinfo($assetPath, PATHINFO_EXTENSION);

                if ($extension === 'css') {
                    $html .= '<link rel="stylesheet" href="' . asset($assetPath) . '">' . "\n";
                } elseif ($extension === 'js') {
                    $html .= '<script src="' . asset($assetPath) . '"></script>' . "\n";
                } else {
                    // Default to script for unknown extensions
                    $html .= '<script src="' . asset($assetPath) . '"></script>' . "\n";
                }
            }

            return $html;
        } catch (\Exception $e) {
            Log::error('Asset loading error: ' . $e->getMessage());
            return '';
        }
    }
}

