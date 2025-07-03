<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

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
