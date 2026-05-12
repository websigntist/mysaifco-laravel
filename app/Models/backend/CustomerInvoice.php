<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerInvoice extends Model
{
    use SoftDeletes;

    protected $table = 'customer_invoices';

    protected $fillable = [
        'invoice_number',
        'invoice_type',
        'client_name',
        'client_email',
        'client_phone',
        'client_address',
        'invoice_date',
        'due_date',
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
        'invoice_date' => 'date',
        'due_date' => 'date',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }

    public static function generateInvoiceNumber($type = 'sales')
    {
        $prefix = $type === 'purchase' ? 'PURCHAS-INV-' : 'SALES-INV-';
        $latest = static::withTrashed()
            ->where('invoice_type', $type)
            ->where('invoice_number', 'like', $prefix . '%')
            ->orderByDesc('id')
            ->first();

        if (!$latest) {
            return $prefix . '0001';
        }

        $lastNumber = (int) preg_replace('/\D/', '', (string) $latest->invoice_number);
        return $prefix . str_pad((string) ($lastNumber + 1), 4, '0', STR_PAD_LEFT);
    }
}

