<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelatedService extends Model
{
    use SoftDeletes;

    protected $table = 'related_services';

    protected $fillable = [
        'tour_type_ids',
        'title',
        'description',
        'image',
        'page_link',
        'status',
        'ordering',
        'created_by',
        'deleted_at',
    ];

    protected $casts = [
        'tour_type_ids' => 'array',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
