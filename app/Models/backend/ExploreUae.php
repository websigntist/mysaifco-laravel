<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExploreUae extends Model
{
    use SoftDeletes;

    protected $table = 'explore_uaes';

    protected $fillable = [
        'title',
        'description',
        'title1',
        'sub_title1',
        'title2',
        'sub_title2',
        'title3',
        'sub_title3',
        'title4',
        'sub_title4',
        'title5',
        'sub_title5',
        'status',
        'ordering',
        'created_by',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
