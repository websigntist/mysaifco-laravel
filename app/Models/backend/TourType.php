<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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
        'friendly_url',
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
     * Resolve tour type from frontend URL slug (e.g. desert-safari-tours).
     */
    public static function findActiveBySlug(string $slug): ?self
    {
        $slug = trim($slug);

        if ($slug === '') {
            return null;
        }

        $byFriendlyUrl = static::query()
            ->where('status', 'Active')
            ->where('friendly_url', $slug)
            ->first();

        if ($byFriendlyUrl) {
            return $byFriendlyUrl;
        }

        $types = static::where('status', 'Active')->get();

        foreach ($types as $type) {
            if (strcasecmp(trim((string) $type->title), $slug) === 0) {
                return $type;
            }
        }

        $candidates = array_values(array_unique(array_filter([
            $slug,
            (string) preg_replace('/-tours$/', '', $slug),
            (string) preg_replace('/-tours$/', '-tour', $slug),
        ])));

        foreach ($types as $type) {
            if (in_array(Str::slug((string) $type->title), $candidates, true)) {
                return $type;
            }
        }

        return null;
    }

    public function pageUrl(): string
    {
        $slug = filled($this->friendly_url)
            ? $this->friendly_url
            : Str::slug((string) $this->title);

        return url('/' . $slug);
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
