<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'path',
        'ordering',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
