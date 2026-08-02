<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqCategory extends Model
{
    use SoftDeletes;

    protected $table = 'faq_categories';

    protected $fillable = [
        'title',
        'friendly_url',
        'image',
        'description',
        'ordering',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'created_by',
        'deleted_at',
    ];

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'faq_category_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}
