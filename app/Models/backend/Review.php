<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $table = 'reviews'; // Ensure this matches your database table name

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'designation',
        'review',
        'rating',
        'type',
        'status',
        'created_by',
        'ordering',
        'created_by',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
