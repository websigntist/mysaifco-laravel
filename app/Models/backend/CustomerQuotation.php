<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerQuotation extends Model
{
    use SoftDeletes;

    protected $table = 'customer_quotations';

    protected $fillable = [
        'quotation_number',
        'invoice_type',
        'client_name',
        'client_email',
        'client_phone',
        'client_address',
        'quotation_date',
        'valid_until',
        'status',
        'payment_status',
        'currency',
        'subtotal',
        'tax_rate',
        'tax_amount',
        'vat_rate',
        'vat_amount',
        'discount',
        'total',
        'notes',
        'terms',
        'letterhead',
        'signature',
        'stamp',
        'show_discount',
        'show_tax',
        'show_vat',
        'created_by',
    ];

    protected $casts = [
        'quotation_date' => 'date',
        'valid_until' => 'date',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function items()
    {
        return $this->hasMany(QuotationItem::class, 'quotation_id');
    }

    public static function generateQuotationNumber($type = 'sales')
    {
        $prefix = $type === 'purchase' ? 'PURCHAS-QUO-' : 'SALES-QUO-';
        $latest = static::withTrashed()
            ->where('invoice_type', $type)
            ->where('quotation_number', 'like', $prefix . '%')
            ->orderByDesc('id')
            ->first();

        if (!$latest) {
            return $prefix . '0001';
        }

        $lastNumber = (int) preg_replace('/\D/', '', (string) $latest->quotation_number);
        return $prefix . str_pad((string) ($lastNumber + 1), 4, '0', STR_PAD_LEFT);
    }
}

