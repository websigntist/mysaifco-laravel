<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RamadanPackage extends Model
{
    use SoftDeletes;

    protected $table = 'ramadan_packages';

    protected $fillable = [
        'tour_type_id',
        'month',
        'departure_day',
        'departure_dates',
        'arrival_day',
        'arrival_dates',
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

    /**
     * Get departure dates as trimmed array
     */
    public function getDepartureDatesListAttribute(): array
    {
        if (empty($this->departure_dates)) {
            return [];
        }
        if (is_array($this->departure_dates)) {
            return $this->departure_dates;
        }
        $lines = preg_split('/\r\n|\r|\n/', $this->departure_dates);
        return array_values(array_filter(array_map('trim', $lines)));
    }

    /**
     * Get arrival dates as trimmed array
     */
    public function getArrivalDatesListAttribute(): array
    {
        if (empty($this->arrival_dates)) {
            return [];
        }
        if (is_array($this->arrival_dates)) {
            return $this->arrival_dates;
        }
        $lines = preg_split('/\r\n|\r|\n/', $this->arrival_dates);
        return array_values(array_filter(array_map('trim', $lines)));
    }
}
