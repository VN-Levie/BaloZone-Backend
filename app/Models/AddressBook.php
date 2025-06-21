<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'province',
        'district',
        'ward',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    /**
     * Get the user that owns the address book.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the orders that use this address.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'address_id');
    }
}
