<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailTemplates extends Model
{
    use SoftDeletes;

    protected $table = 'email_templates'; // Ensure this matches your database table name

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'document',
        'created_by',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
