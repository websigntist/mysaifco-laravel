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
        'max_persons',
        'min_age',
        'tour_type',
        'extra_options',
        'description',
        'itinerary',
        'price',
        'show_in_menu',
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

    protected $casts = [
        'tour_type' => 'array',
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


}
