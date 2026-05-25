<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Explore extends Model
{
    use SoftDeletes;

    protected $table = 'explores';

    protected $fillable = [
        'title',
        'description',
        'tour_type_id',
        'status',
        'ordering',
        'created_by',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function tourType()
    {
        return $this->belongsTo(TourType::class, 'tour_type_id');
    }
}
