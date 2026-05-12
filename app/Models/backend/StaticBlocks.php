<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticBlocks extends Model
{
    use SoftDeletes;

    protected $table = 'static_blocks'; // Ensure this matches your database table name

    protected $fillable = [
        'title',
        'sub_title',
        'identifier',
        'image',
        'status',
        'description',
        'created_by',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
