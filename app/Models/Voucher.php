<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'price',
        'end_at',
        'quantity',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'end_at' => 'datetime',
    ];

    /**
     * Get the orders for the voucher.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
