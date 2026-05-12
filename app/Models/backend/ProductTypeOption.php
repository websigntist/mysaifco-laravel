<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;

class ProductTypeOption extends Model
{
    protected $table = 'product_type_options';

    protected $fillable = [
        'name',
        'ordering',
    ];
}
