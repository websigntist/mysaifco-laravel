<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $table = 'page_sections';

    protected $fillable = [
        'page_id',
        'section_heading',
        'section_sub_heading',
        'section_description',
        'button_status',
        'button_title',
        'button_url',
        'section_image',
        'ordering',
    ];

    protected $casts = [
        'button_status' => 'boolean',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
