<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UmrahAirPackage extends Model
{
    use SoftDeletes;

    protected $table = 'umrah_air_packages';

    protected $fillable = [
        'tour_type_id',
        'tour_type',
        'title',
        'price',
        'currency',
        'min_people',
        'image',
        'image_alt',
        'image_title',
        'makkah_nights_title',
        'makkah_hotel',
        'makkah_rating',
        'makkah_reviews',
        'makkah_image',
        'madinah_nights_title',
        'madinah_hotel',
        'madinah_rating',
        'madinah_reviews',
        'madinah_image',
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

    public function scopePublished($query)
    {
        return $query->where('status', 'Active');
    }

    public function imageUrl(): string
    {
        if (filled($this->image)) {
            return asset('assets/images/umrah-air-packages/' . ltrim($this->image, '/'));
        }

        return imageNotFound();
    }

    public function makkahImageUrl(): string
    {
        if (filled($this->makkah_image)) {
            return asset('assets/images/umrah-air-packages/' . ltrim($this->makkah_image, '/'));
        }

        return imageNotFound();
    }

    public function madinahImageUrl(): string
    {
        if (filled($this->madinah_image)) {
            return asset('assets/images/umrah-air-packages/' . ltrim($this->madinah_image, '/'));
        }

        return imageNotFound();
    }
}
