<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UmrahBusSchedule extends Model
{
    use SoftDeletes;

    protected $table = 'umrah_bus_schedules';

    protected $fillable = [
        'tour_type_id',
        'departure_date',
        'sharing_4_5_beds',
        'sharing_3_beds',
        'sharing_2_beds',
        'status',
        'ordering',
        'created_by',
    ];

    public function tourType()
    {
        return $this->belongsTo(TourType::class, 'tour_type_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
