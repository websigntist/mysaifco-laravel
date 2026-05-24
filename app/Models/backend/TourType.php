<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourType extends Model
{
    use SoftDeletes;

    /**
     * Section order on the all-categories page.
     */
    public const ALL_CATEGORIES_DISPLAY_ORDER = [
        'Desert Safari',
        'Yacht Charter',
        'Dubai City Tour',
        'Abu Dhabi Tours',
        'Dubai Combo Tours',
        'Water Activities',
        'Theme Park Tickets',
    ];

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

    /**
     * Active tour types sorted for the all-categories page.
     */
    public static function activeListForAllCategories()
    {
        $orderMap = array_flip(self::ALL_CATEGORIES_DISPLAY_ORDER);

        return static::where('status', 'Active')
            ->get()
            ->sortBy(function (self $type) use ($orderMap) {
                $title = trim((string) $type->title);

                if (isset($orderMap[$title])) {
                    return $orderMap[$title];
                }

                return 100 + (int) $type->ordering;
            })
            ->values();
    }
}
