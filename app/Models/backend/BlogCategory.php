<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $table = 'blog_categories'; // Ensure this matches your database table name

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
        'deleted_at',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public function blogCategories()
    {
        return $this->belongsToMany(
            Blog::class,
            'blog_category_rel',
            'blog_category_id',
            'blog_id'
        );
    }

    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
