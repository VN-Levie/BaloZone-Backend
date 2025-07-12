<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number',
        'status',
        'total_amount',
        'shipping_fee',
        'voucher_discount',
        'final_amount',
        'payment_method',
        'note',
        'address_id',
        'payment_method_id',
        'payment_status',
        'voucher_id',
        'user_id',
        'total_price', // backup field
        // Shipping address fields
        'shipping_recipient_name',
        'shipping_recipient_phone',
        'shipping_address',
        'shipping_ward',
        'shipping_district',
        'shipping_province',
        'shipping_postal_code',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'shipping_fee' => 'decimal:2',
        'voucher_discount' => 'decimal:2',
        'final_amount' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the address book for the order.
     */
    public function address()
    {
        return $this->belongsTo(AddressBook::class, 'address_id');
    }

    /**
     * Get the payment method for the order.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the voucher for the order.
     */
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    /**
     * Get the order details for the order.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
