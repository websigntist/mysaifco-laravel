<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = 'invoice_items';

    protected $fillable = [
        'invoice_id',
        'item_name',
        'description',
        'quantity',
        'discount',
        'discount_type',
        'unit_price',
        'amount',
    ];

    public function invoice()
    {
        return $this->belongsTo(CustomerInvoice::class, 'invoice_id');
    }
}


