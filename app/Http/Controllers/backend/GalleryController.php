<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Gallery;
use App\Models\backend\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GalleryController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = Gallery::class;
        $this->module = 'galleries';
        $this->notify_title = 'Gallery';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::withCount('images')->latest()->get();
        $columns = [
            'cover_image',
            'title',
            'images_count',
            'ordering',
            'status',
            'created_at',
        ];

        $hiddenColumns = ['ordering'];

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

        $getStatus = getEnumValues($this->module, 'status');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'meta_title'       => "Create New | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            $coverImage = imageHandling($request, null, 'cover_image', $this->module);

            $gallery = ($this->table)::create([
                'title'        => $request->title,
                'cover_image'  => $coverImage,
                'status'       => $request->status ?? 'active',
                'ordering'     => (int)($request->ordering ?? 0),
                'created_by'   => $this->userId,
            ]);

            if (!$gallery) {
                return back()->with('error', 'Failed to create gallery.');
            }

            // Handle multiple images
            $this->syncGalleryImages($request, $gallery, null);

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' Created Successfully.');
            }
            if ($action === 'save_stay') {
                return to_route($this->module . '.edit', $gallery->id)->with('success', $this->notify_title . ' Created successfully.');
            }
            return redirect()->route($this->module)->with('success', $this->notify_title . ' Created successfully.');
        }

        return back()->with('error', 'Invalid request method.');
    }

    public function editForm($id, Request $request)
    {
        $gallery = ($this->table)::with('images')->findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $getStatus = getEnumValues($this->module, 'status');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $gallery,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'meta_title'       => "Edit | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {
            $gallery = ($this->table)::findOrFail($id);

            $dataToUpdate = [
                'title'      => $request->title,
                'status'     => $request->status ?? 'active',
                'ordering'   => (int)($request->ordering ?? 0),
                'created_by' => $this->userId,
            ];

            $dataToUpdate['cover_image'] = imageHandling($request, $gallery, 'cover_image', $this->module);
            $gallery->update($dataToUpdate);

            $this->syncGalleryImages($request, $gallery, $id);

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            }
            if ($action === 'save_stay') {
                return to_route($this->module . '.edit', $gallery->id)->with('success', $this->notify_title . ' Updated! You can continue editing.');
            }
            return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully.');
        } catch (\Exception $e) {
            Log::error('Gallery update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    protected function syncGalleryImages(Request $request, Gallery $gallery, $galleryId)
    {
        $folder = 'galleries/images';
        $coverImageId = $request->cover_image_id ? (int) $request->cover_image_id : null;

        // Update existing images (ordering, alt, title, set as cover)
        if ($request->has('image_id') && is_array($request->image_id)) {
            foreach ($request->image_id as $index => $imgId) {
                $image = GalleryImage::where('gallery_id', $gallery->id)->find($imgId);
                if ($image) {
                    $image->ordering = (int)($request->image_ordering[$index] ?? $index);
                    $image->image_alt = $request->image_alt[$index] ?? null;
                    $image->image_title = $request->image_title[$index] ?? null;
                    $image->save();
                }
            }
        }

        // Set gallery cover from selected image (file lives in galleries/images/)
        if ($coverImageId) {
            $coverImg = GalleryImage::where('gallery_id', $gallery->id)->find($coverImageId);
            if ($coverImg && $coverImg->image) {
                $gallery->update(['cover_image' => 'images/' . $coverImg->image]);
            }
        }

        // New uploads: images[]
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $file) {
                if (!$file->isValid()) continue;
                $req = new Request();
                $req->files->set('image', $file);
                $uploaded = imageHandling($req, null, 'image', $folder);
                if ($uploaded) {
                    $imageExt = strtolower(pathinfo($uploaded, PATHINFO_EXTENSION));
                    GalleryImage::create([
                        'gallery_id'   => $gallery->id,
                        'image'        => $uploaded,
                        'image_ext'    => $imageExt,
                        'image_alt'    => $request->new_image_alt[$i] ?? null,
                        'image_title'  => $request->new_image_title[$i] ?? null,
                        'ordering'     => (int)($request->new_image_ordering[$i] ?? 999),
                        'status'       => 'active',
                    ]);
                }
            }
        }

        // Remove images
        if ($request->has('remove_image_ids') && is_array($request->remove_image_ids)) {
            GalleryImage::where('gallery_id', $gallery->id)->whereIn('id', $request->remove_image_ids)->delete();
        }
    }

    public function view($id)
    {
        $gallery = ($this->table)::with('images')->findOrFail($id);
        return view('backend.' . $this->module . '.view', [
            'data'             => $gallery,
            'title'            => 'Gallery',
            'module'           => $this->module,
            'meta_title'       => "View | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function delete($id)
    {
        try {
            $gallery = ($this->table)::findOrFail($id);
            $gallery->delete();
            return redirect()->route($this->module)->with('success', $this->notify_title . ' deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids;
        $trashed = $request->trashed;

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

    public function updateStatusAjax(Request $request, $id)
    {
        $gallery = ($this->table)::findOrFail($id);
        $newStatus = $gallery->status === 'active' ? 'inactive' : 'active';
        $gallery->update(['status' => $newStatus]);

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " Status Updated to " . ucfirst($newStatus)
        ]);
    }

    public function updateTitleAjax(Request $request)
    {
        $request->validate([
            'id'    => 'required|exists:galleries,id',
            'title' => 'required|string|max:255',
        ]);

        $gallery = ($this->table)::findOrFail($request->id);
        $gallery->title = $request->title;
        $gallery->save();

        return response()->json([
            'success' => true,
            'message' => $this->notify_title . ' title updated successfully',
            'id'      => $gallery->id,
            'title'   => $gallery->title,
        ]);
    }

    public function updateOrderingAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer|exists:galleries,id',
            'ordering' => 'required|integer|min:0',
        ]);

        $gallery = ($this->table)::findOrFail($request->id);
        $gallery->ordering = $request->ordering;
        $gallery->save();

        return response()->json([
            'success'  => true,
            'message'  => $this->notify_title . ' ordering updated successfully',
            'id'       => $gallery->id,
            'ordering' => $gallery->ordering,
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $gallery = ($this->table)::findOrFail($id);
            $gallery->delete();
            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' deleted successfully.'
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
        $gallery = ($this->table)::with(['creator', 'images'])->findOrFail($id);
        return response()->json([
            'id'           => $gallery->id,
            'title'        => $gallery->title,
            'cover_image'  => $gallery->cover_image,
            'status'       => $gallery->status,
            'ordering'     => $gallery->ordering,
            'images_count' => $gallery->images->count(),
            'created_at'   => $gallery->created_at ? $gallery->created_at->format('M d, Y') : null,
            'created_by_name' => trim(($gallery->creator->first_name ?? '') . ' ' . ($gallery->creator->last_name ?? '')),
        ]);
    }

    // ---------- Gallery Images (individual gallery images list) ----------

    public function imagesIndex($id)
    {
        $gallery = ($this->table)::findOrFail($id);
        $images = GalleryImage::where('gallery_id', $id)->orderBy('ordering')->get();

        $segments = request()->segments();
        $moduleName = $this->module;
        $moduleTitle = 'Gallery Image';

        return view('backend.galleries.images-listing', [
            'gallery'          => $gallery,
            'getData'         => $images,
            'title'           => $moduleTitle,
            'module'         => $moduleName,
            'meta_title'      => "Gallery Images | Admin Panel",
            'meta_keywords'   => '',
            'meta_description' => ''
        ]);
    }

    public function updateImageTitleAjax(Request $request)
    {
        $request->validate([
            'id'    => 'required|exists:gallery_images,id',
            'image_title' => 'nullable|string|max:255',
        ]);
        $img = GalleryImage::findOrFail($request->id);
        $img->image_title = $request->image_title;
        $img->save();
        return response()->json([
            'success' => true,
            'message' => 'Image title updated.',
            'id'      => $img->id,
            'image_title' => $img->image_title,
        ]);
    }

    public function updateImageAltAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|exists:gallery_images,id',
            'image_alt' => 'nullable|string|max:255',
        ]);
        $img = GalleryImage::findOrFail($request->id);
        $img->image_alt = $request->image_alt;
        $img->save();
        return response()->json([
            'success'   => true,
            'message'   => 'Image alt updated.',
            'id'        => $img->id,
            'image_alt' => $img->image_alt,
        ]);
    }

    public function updateImageOrderingAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer|exists:gallery_images,id',
            'ordering' => 'required|integer|min:0',
        ]);
        $img = GalleryImage::findOrFail($request->id);
        $img->ordering = $request->ordering;
        $img->save();
        return response()->json([
            'success'  => true,
            'message'  => 'Image ordering updated.',
            'id'       => $img->id,
            'ordering' => $img->ordering,
        ]);
    }

    public function deleteImageAjax($id)
    {
        try {
            $img = GalleryImage::findOrFail($id);
            $img->delete();
            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateImageStatusAjax(Request $request, $id)
    {
        $img = GalleryImage::findOrFail($id);
        $newStatus = $img->status === 'active' ? 'inactive' : 'active';
        $img->update(['status' => $newStatus]);
        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => 'Image status updated.'
        ]);
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $this->module;
        $moduleTitle = 'Trashed';

        $getData = ($this->table)::withCount('images')->onlyTrashed()->latest()->get();
        $columns = [
            'cover_image',
            'title',
            'images_count',
            'status',
            'ordering',
            'created_at',
        ];
        $hiddenColumns = ['ordering'];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => 'trashed',
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Trashed list | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function restore($id)
    {
        $item = ($this->table)::withTrashed()->findOrFail($id);
        $item->restore();
        return redirect()->route($this->module)->with('success', $this->notify_title . ' restored successfully!');
    }

    public function forceDelete($id)
    {
        $item = ($this->table)::withTrashed()->findOrFail($id);
        $item->forceDelete();
        return redirect()->route($this->module)->with('success', $this->notify_title . ' permanently deleted!');
    }
}
