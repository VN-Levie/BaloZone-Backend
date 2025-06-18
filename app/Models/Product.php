<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'slug',
        'color',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the brand that owns the product.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the order details for the product.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Get the comments for the product.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the sale products for the product.
     */
    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class);
    }

    /**
     * Get the sale campaigns for the product.
     */
    public function saleCampaigns()
    {
        return $this->belongsToMany(SaleCampaign::class, 'sale_products')
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
     * Get current active sale for this product.
     */
    public function currentSale()
    {
        return $this->hasOne(SaleProduct::class)
            ->where('is_active', true)
            ->whereHas('saleCampaign', function($q) {
                $q->where('status', 'active')
                  ->where('start_date', '<=', now())
                  ->where('end_date', '>=', now());
            });
    }

    /**
     * Check if product is currently on sale.
     */
    public function isOnSale(): bool
    {
        return $this->currentSale()->exists();
    }

    /**
     * Get current sale price.
     */
    public function getCurrentSalePriceAttribute(): ?float
    {
        $currentSale = $this->currentSale;
        return $currentSale ? $currentSale->sale_price : null;
    }

    /**
     * Get effective price (sale price if on sale, otherwise regular price).
     */
    public function getEffectivePriceAttribute(): float
    {
        return $this->current_sale_price ?? $this->price;
    }

    /**
     * Get discount percentage if on sale.
     */
    public function getDiscountPercentageAttribute(): ?float
    {
        $currentSale = $this->currentSale;
        return $currentSale ? $currentSale->discount_percentage : null;
    }
}
