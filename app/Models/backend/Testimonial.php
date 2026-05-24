<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;

    protected $table = 'testimonials'; // Ensure this matches your database table name

    protected $fillable = [
        'name',
        'designation',
        'company',
        'services',
        'country',
        'review',
        'image',
        'type',
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

    /**
     * Published testimonials for frontend (ordered).
     */
    public static function forFrontend(): \Illuminate\Support\Collection
    {
        return static::query()
            ->active()
            ->orderBy('ordering')
            ->orderByDesc('id')
            ->get();
    }

    public function imageUrl(): string
    {
        if (filled($this->image)) {
            return asset('assets/images/testimonials/' . ltrim($this->image, '/'));
        }

        return imageNotFound();
    }

    /**
     * Shape for frontend.components.testimonials card.
     *
     * @return array{quote: string, name: string, meta: string, image: string}
     */
    public function toFrontendCard(): array
    {
        $metaParts = array_values(array_filter([
            filled($this->services) ? trim((string) $this->services) : null,
            filled($this->country) ? trim((string) $this->country) : null,
        ]));

        if ($metaParts === []) {
            $metaParts = array_values(array_filter([
                filled($this->designation) ? trim((string) $this->designation) : null,
                filled($this->company) ? trim((string) $this->company) : null,
            ]));
        }

        return [
            'quote'  => (string) $this->review,
            'name'   => (string) $this->name,
            'meta'   => implode(' · ', $metaParts),
            'image'  => $this->imageUrl(),
        ];
    }
}
