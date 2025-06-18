<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SaleProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_campaign_id',
        'product_id',
        'original_price',
        'sale_price',
        'discount_percentage',
        'discount_amount',
        'discount_type',
        'start_date',
        'end_date',
        'max_quantity',
        'sold_quantity',
        'is_active',
    ];

    protected $casts = [
        'original_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Get the sale campaign that owns the sale product.
     */
    public function saleCampaign()
    {
        return $this->belongsTo(SaleCampaign::class);
    }

    /**
     * Get the product that owns the sale product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Scope to get active sale products.
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true)
            ->whereHas('saleCampaign', function($q) {
                $q->where('status', 'active')
                  ->where('start_date', '<=', now())
                  ->where('end_date', '>=', now());
            });
    }

    /**
     * Scope to get available sale products (not sold out).
     */
    public function scopeAvailable(Builder $query)
    {
        return $query->where(function($q) {
            $q->whereNull('max_quantity')
              ->orWhereRaw('sold_quantity < max_quantity');
        });
    }

    /**
     * Check if sale is currently active.
     */
    public function isSaleActive(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        // Check campaign status
        if (!$this->saleCampaign || !$this->saleCampaign->isActive()) {
            return false;
        }

        // Check specific sale product dates if set
        if ($this->start_date && $this->start_date > now()) {
            return false;
        }

        if ($this->end_date && $this->end_date < now()) {
            return false;
        }

        return true;
    }

    /**
     * Check if sale product is sold out.
     */
    public function isSoldOut(): bool
    {
        return $this->max_quantity && $this->sold_quantity >= $this->max_quantity;
    }

    /**
     * Get remaining quantity for sale.
     */
    public function getRemainingQuantityAttribute(): ?int
    {
        if (!$this->max_quantity) {
            return null;
        }

        return max(0, $this->max_quantity - $this->sold_quantity);
    }

    /**
     * Calculate discount percentage.
     */
    public function calculateDiscountPercentage(): float
    {
        if ($this->original_price <= 0) {
            return 0;
        }

        return round(($this->original_price - $this->sale_price) / $this->original_price * 100, 2);
    }

    /**
     * Calculate discount amount.
     */
    public function calculateDiscountAmount(): float
    {
        return round($this->original_price - $this->sale_price, 2);
    }

    /**
     * Update sold quantity.
     */
    public function updateSoldQuantity(int $quantity): void
    {
        $this->increment('sold_quantity', $quantity);
    }
}
