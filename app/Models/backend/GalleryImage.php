<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
    use SoftDeletes;

    protected $table = 'gallery_images';

    protected $fillable = [
        'gallery_id',
        'image',
        'image_alt',
        'image_title',
        'image_ext',
        'status',
        'ordering',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
