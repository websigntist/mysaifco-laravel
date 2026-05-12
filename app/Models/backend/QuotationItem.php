<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    protected $table = 'quotation_items';

    protected $fillable = [
        'quotation_id',
        'item_name',
        'description',
        'quantity',
        'discount',
        'discount_type',
        'unit_price',
        'amount'
    ];

    public function quotation()
    {
        return $this->belongsTo(CustomerQuotation::class, 'quotation_id');
    }
}



