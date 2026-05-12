<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogTag extends Model
{
    use SoftDeletes;

    protected $table = 'blog_tags'; // Ensure this matches your database table name

    protected $fillable = [
        'title',
        'status',
        'ordering',
        'created_by',
        'deleted_at',
    ];

    public function blogTags()
    {
        return $this->belongsToMany(
            Blog::class,
            'blog_tag_rel',
            'blog_tag_id',
            'blog_id'
        );
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
