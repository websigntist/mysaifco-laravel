<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VaccinationCenter extends Model
{
    use SoftDeletes;

    protected $table = 'vaccination_centers';

    protected $fillable = [
        'title',
        'center_location',
        'address',
        'phone',
        'map_url',
        'image',
        'status',
        'ordering',
        'created_by',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}
