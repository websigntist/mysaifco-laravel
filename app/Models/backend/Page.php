<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'pages'; // Ensure this matches your database table name
    //protected $dates = ['deleted_at']; // optional in newer Laravel versions

    protected $fillable = [
        'menu_title',
        'page_title',
        'show_title',
        'sub_title',
        'friendly_url',
        'description',
        'status',
        'image',
        'image_alt',
        'image_title',
        'parent_id',
        'container_layout',
        'show_in_menu',
        'ordering',
        'created_by',
        'deleted_at',
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];

    public function maintenanceMode()
    {
        return $this->hasOne(MaintenanceMode::class, 'page_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function parentPage()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

}
