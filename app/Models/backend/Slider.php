<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;

    protected $table = 'sliders'; // Ensure this matches your database table name

    protected $fillable = [
        'title',
        'heading',
        'sub_heading',
        'description',
        'link',
        'button_text',
        'image',
        'status',
        'type',
        'ordering',
        'created_by',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
