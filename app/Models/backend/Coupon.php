<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;

    protected $table = 'coupons'; // Ensure this matches your database table name

    protected $fillable = [
        'coupon_title',
        'coupon_code',
        'discount_value',
        'discount_type',
        'start_date',
        'end_date',
        'usage_limit',
        'min_order_value',
        'status',
        'ordering',
        'created_by',
        'deleted_at',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date'   => 'date',
        ];
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
