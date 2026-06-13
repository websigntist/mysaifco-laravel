<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use SoftDeletes;

    protected $table = 'tours'; // Ensure this matches your database table name
    //protected $dates = ['deleted_at']; // optional in newer Laravel versions

    protected $fillable = [
        'title',
        'friendly_url',
        'tour_duration',
        'tour_location',
        'max_persons',
        'min_age',
        'tour_type',
        'red_tag_id',
        'extra_options',
        'description',
        'itinerary',
        'price',
        'status',
        'image',
        'image_alt',
        'image_title',
        'ordering',
        'created_by',
        'deleted_at',
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * FAQs assigned to this tour (many-to-many).
     */
    public function faqs()
    {
        return $this->belongsToMany(Faq::class, 'tour_faq');
    }

    public function galleries()
    {
        return $this->belongsToMany(Gallery::class, 'tour_gallery');
    }

    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'tour_review');
    }

    public function redTag()
    {
        return $this->belongsTo(RedTag::class, 'red_tag_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Match tours whose tour_type CSV contains the given tour type title.
     */
    public function scopeForTourTypeTitle($query, string $typeTitle)
    {
        $typeTitle = trim($typeTitle);

        if ($typeTitle === '') {
            return $query->whereRaw('1 = 0');
        }

        return $query->where(function ($q) use ($typeTitle) {
            $q->where('tour_type', $typeTitle)
                ->orWhere('tour_type', 'like', $typeTitle . ',%')
                ->orWhere('tour_type', 'like', '%, ' . $typeTitle . ',%')
                ->orWhere('tour_type', 'like', '%,' . $typeTitle . ',%')
                ->orWhere('tour_type', 'like', '%, ' . $typeTitle)
                ->orWhere('tour_type', 'like', '%,' . $typeTitle);
        });
    }

    public function imageUrl(): string
    {
        if (filled($this->image)) {
            return asset('assets/images/tours/' . ltrim($this->image, '/'));
        }

        return imageNotFound();
    }

    public function frontendUrl(): string
    {
        return filled($this->friendly_url) ? url('/' . $this->friendly_url) : '#';
    }

    /**
     * Active tour types with a limited list of tours each (for all-categories page).
     *
     * @return array<int, array{tourType: \App\Models\backend\TourType, tours: \Illuminate\Support\Collection<int, self>}>
     */
    public static function publishedForTourType(string $typeTitle, ?int $limit = null)
    {
        $query = static::query()
            ->published()
            ->forTourTypeTitle($typeTitle)
            ->with('redTag')
            ->orderBy('ordering')
            ->orderBy('title');

        if ($limit !== null) {
            $query->limit(max(1, (int) $limit));
        }

        return $query->get();
    }

    public static function groupedByTourType(int $limitPerType = 3): array
    {
        $limitPerType = max(1, min($limitPerType, 12));

        $sections = [];

        foreach (TourType::activeListForAllCategories() as $tourType) {
            $tours = static::query()
                ->published()
                ->forTourTypeTitle($tourType->title)
                ->with('redTag')
                ->orderBy('ordering')
                ->orderBy('title')
                ->limit($limitPerType)
                ->get();

            if ($tours->isNotEmpty()) {
                $sections[] = [
                    'tourType' => $tourType,
                    'tours'    => $tours,
                ];
            }
        }

        return $sections;
    }
}
