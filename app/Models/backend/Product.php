<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'friendly_url',
        'quantity',
        'stock_status',
        'product_types',
        'brand_id',
        'discount',
        'style_no',
        'product_tag',
        'video_link',
        'sku',
        'isbn',
        'weight',
        'length',
        'width',
        'height',
        'short_description',
        'full_description',
        'product_features',
        'product_specifications',
        'regular_price',
        'sale_price',
        'sale_start',
        'sale_end',
        'main_image',
        'image_alt',
        'image_title',
        'status',
        'visibility',
        'ordering',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'product_types' => 'array',
            'sale_start'    => 'date',
            'sale_end'      => 'date',
            'quantity'      => 'integer',
            'ordering'      => 'integer',
        ];
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'category_product', 'product_id', 'product_category_id');
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('ordering');
    }

    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class)->orderBy('ordering');
    }

    public function productSizes(): HasMany
    {
        return $this->hasMany(ProductSize::class)->orderBy('ordering');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
