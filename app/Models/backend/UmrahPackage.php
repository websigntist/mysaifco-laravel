<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UmrahPackage extends Model
{
    use SoftDeletes;

    protected $table = 'umrah_packages';

    protected $fillable = [
        'tour_type_id',
        'title',
        'subtitle',
        'price',
        'currency',
        'badge',
        'header_color',
        'features',
        'button_title',
        'button_url',
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
     * Get features as an array of trimmed lines.
     */
    public function getFeaturesListAttribute(): array
    {
        if (empty($this->features)) {
            return [];
        }

        if (is_array($this->features)) {
            return $this->features;
        }

        $lines = preg_split('/\r\n|\r|\n/', $this->features);
        return array_values(array_filter(array_map('trim', $lines)));
    }
}
