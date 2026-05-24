<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourType extends Model
{
    use SoftDeletes;

    protected $table = 'tour_types';

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image',
        'image_alt',
        'image_title',
        'status',
        'view_all_link',
        'ordering',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'created_by',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function displayName(): string
    {
        return trim((string) ($this->title ?? ''));
    }

    public static function activeList()
    {
        return static::where('status', 'Active')
            ->orderBy('ordering')
            ->orderBy('title')
            ->get();
    }
}
