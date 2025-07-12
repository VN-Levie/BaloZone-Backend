<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'description',
        'discount_type',
        'discount_value',
        'min_order_value',
        'max_discount_amount',
        'usage_limit',
        'used_count',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'discount_value' => 'decimal:2',
        'min_order_value' => 'decimal:2',
        'max_discount_amount' => 'decimal:2',
        'usage_limit' => 'integer',
        'used_count' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Get the orders for the voucher.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Kiểm tra voucher có còn hiệu lực không
     */
    public function isValid()
    {
        if (!$this->is_active) {
            return false;
        }

        $now = now();
        if ($this->start_date > $now || $this->end_date < $now) {
            return false;
        }

        if ($this->usage_limit > 0 && $this->used_count >= $this->usage_limit) {
            return false;
        }

        return true;
    }

    /**
     * Kiểm tra voucher có áp dụng được cho đơn hàng không
     */
    public function canApplyToOrder($orderTotal)
    {
        if (!$this->isValid()) {
            return false;
        }

        return $orderTotal >= $this->min_order_value;
    }

    /**
     * Tính toán số tiền giảm
     */
    public function calculateDiscount($orderTotal)
    {
        if (!$this->canApplyToOrder($orderTotal)) {
            return 0;
        }

        $discountAmount = 0;

        if ($this->discount_type === 'percentage') {
            $discountAmount = $orderTotal * ($this->discount_value / 100);
        } else {
            $discountAmount = $this->discount_value;
        }

        // Áp dụng giới hạn số tiền giảm tối đa
        if ($this->max_discount_amount && $discountAmount > $this->max_discount_amount) {
            $discountAmount = $this->max_discount_amount;
        }

        return $discountAmount;
    }

    /**
     * Tăng số lần sử dụng voucher
     */
    public function incrementUsage()
    {
        $this->increment('used_count');
    }

    /**
     * Scope để lấy các voucher còn hiệu lực
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where('start_date', '<=', now())
                    ->where('end_date', '>=', now())
                    ->where(function ($q) {
                        $q->where('usage_limit', 0)
                          ->orWhereRaw('used_count < usage_limit');
                    });
    }
}
