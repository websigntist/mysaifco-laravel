<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DropzoneController
{
    /**
     * Stores an uploaded image for the product gallery under public assets.
     * Returns JSON { "path": "filename" } for hidden inputs on product save.
     */
    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'file' => [
                'required',
                'file',
                'max:5120',
                'mimetypes:image/jpeg,image/png,image/gif,image/webp,image/pjpeg,image/x-png',
            ],
        ]);

        $folder = 'products/gallery';
        $basePath = getPublicAssetPath('assets/images/'.$folder);

        if (! File::isDirectory($basePath)) {
            File::makeDirectory($basePath, 0777, true, true);
        }

        $ext = strtolower($request->file('file')->getClientOriginalExtension() ?: 'jpg');
        $ext = in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'], true) ? $ext : 'jpg';
        $fileName = time().'_'.Str::random(8).'_gallery.'.$ext;

        $request->file('file')->move($basePath, $fileName);

        return response()->json(['path' => $fileName]);
    }
}
