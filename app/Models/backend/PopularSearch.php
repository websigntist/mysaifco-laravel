<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PopularSearch extends Model
{
    use SoftDeletes;

    protected $table = 'popular_searches';

    protected $fillable = [
        'title',
        'tour_type_id',
        'search_items',
        'created_by',
        'deleted_at',
    ];

    protected $casts = [
        'search_items' => 'array',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function tourType()
    {
        return $this->belongsTo(TourType::class, 'tour_type_id');
    }

    public function searchItemsCount(): int
    {
        return count($this->search_items ?? []);
    }
}
