<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'display_name',
    ];

    /**
     * Get the orders for the payment method.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
