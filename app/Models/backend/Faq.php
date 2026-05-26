<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;

    protected $table = 'faqs'; // Ensure this matches your database table name

    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'type',
        'tour_type_id',
        'ordering',
        'created_by',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Tours this FAQ is assigned to (many-to-many).
     */
    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_faq')
            ->withPivot('ordering')
            ->withTimestamps();
    }

    public function tourType()
    {
        return $this->belongsTo(TourType::class, 'tour_type_id');
    }

    /**
     * Active FAQs for a tour-type packages page (e.g. Desert Safari Tour).
     */
    public static function activeForTourType(int $tourTypeId)
    {
        return static::query()
            ->where('status', 'Active')
            ->where('tour_type_id', $tourTypeId)
            ->orderBy('ordering')
            ->orderByDesc('id')
            ->get();
    }
}
