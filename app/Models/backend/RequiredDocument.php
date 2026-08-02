<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequiredDocument extends Model
{
    use SoftDeletes;

    protected $table = 'required_documents';

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'tour_type_ids',
        'document_items',
        'status',
        'ordering',
        'created_by',
        'deleted_at',
    ];

    protected $casts = [
        'tour_type_ids'  => 'array',
        'document_items' => 'array',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}
