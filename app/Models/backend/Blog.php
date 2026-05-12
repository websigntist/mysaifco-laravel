<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blogs'; // Ensure this matches your database table name

    protected $fillable = [
        'title',
        'show_title',
        'friendly_url',
        'description',
        'show_in_menu',
        'status',
        'ordering',
        'created_by',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'deleted_at',
        'image',
    ];


    public function blogCategories()
    {
        return $this->belongsToMany(BlogCategory::class,     // related model
            'blog_category_rel',                             // pivot table name
            'blog_id',                                       // foreign key for this model
            'blog_category_id'                               // foreign key for related model
        );
    }

    public function blogTags()
    {
        return $this->belongsToMany(BlogTag::class,     // related model
            'blog_tag_rel',                             // pivot table name
            'blog_id',                                       // foreign key for this model
            'blog_tag_id'                               // foreign key for related model
        );
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
