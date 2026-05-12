<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings'; // Ensure this matches your database table name

    protected $fillable = [
        'setting_name',
        'setting_value'
    ];

}
