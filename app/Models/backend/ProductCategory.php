<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use SoftDeletes;

    protected $table = 'product_categories';

    protected $fillable = [
        'title',
        'parent_id',
        'friendly_url',
        'image',
        'description',
        'ordering',
        'status',
        'show_title',
        'show_in_menu',
        'created_by',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public function parentCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'product_category_id', 'product_id');
    }
}
