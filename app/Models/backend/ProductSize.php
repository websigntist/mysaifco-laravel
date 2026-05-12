<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSize extends Model
{
    protected $table = 'product_sizes';

    protected $fillable = [
        'product_id',
        'item_name',
        'value',
        'price',
        'description',
        'ordering',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
