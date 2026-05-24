<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RedTag extends Model
{
    use SoftDeletes;

    protected $table = 'red_tags';

    protected $fillable = [
        'title',
        'icon',
        'status',
        'ordering',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function displayName(): string
    {
        return trim((string) ($this->title ?? ''));
    }

    public static function activeList()
    {
        return static::where('status', 'Active')
            ->orderBy('ordering')
            ->orderBy('title')
            ->get();
    }
}
