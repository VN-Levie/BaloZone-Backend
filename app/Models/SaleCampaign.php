<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class SaleCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'banner_image',
        'start_date',
        'end_date',
        'status',
        'is_featured',
        'priority',
        'metadata',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
        'metadata' => 'array',
    ];

    /**
     * Get the sale products for the campaign.
     */
    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class);
    }

    /**
     * Get the products in this campaign.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_products')
            ->withPivot([
                'original_price',
                'sale_price',
                'discount_percentage',
                'discount_amount',
                'discount_type',
                'start_date',
                'end_date',
                'max_quantity',
                'sold_quantity',
                'is_active'
            ])
            ->withTimestamps();
    }

    /**
     * Scope to get active campaigns.
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }

    /**
     * Scope to get featured campaigns.
     */
    public function scopeFeatured(Builder $query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Check if campaign is currently active.
     */
    public function isActive(): bool
    {
        return $this->status === 'active'
            && $this->start_date <= now()
            && $this->end_date >= now();
    }

    /**
     * Check if campaign is upcoming.
     */
    public function isUpcoming(): bool
    {
        return $this->status === 'active' && $this->start_date > now();
    }

    /**
     * Check if campaign is expired.
     */
    public function isExpired(): bool
    {
        return $this->end_date < now();
    }

    /**
     * Get campaign duration in days.
     */
    public function getDurationAttribute(): int
    {
        return $this->start_date->diffInDays($this->end_date);
    }

    /**
     * Get remaining days.
     */
    public function getRemainingDaysAttribute(): int
    {
        if ($this->isExpired()) {
            return 0;
        }

        return now()->diffInDays($this->end_date);
    }
}
