<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;

class MaintenanceMode extends Model
{
    protected $table = 'maintenance_modes'; // Ensure this matches your database table name

    protected $fillable = [
        'page_id',
        'maintenance_title',
        'mode',
        'maintenance_image'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'id');
    }
}
