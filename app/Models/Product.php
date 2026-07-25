<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    //
     
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'part_number','alt_part_number',
        'part_description','make', 'price','uom','hsn_code','gst_rate','current_stock','alert_level'
       
    ];
    public function movements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
    public function transactions(): HasMany
    {
        return $this->hasMany(StockTransaction::class, 'product_id');
    }
    // Accessor to calculate real-time stock balance
    public function getCurrentStockAttribute(): int
    {
        $in = $this->transactions()->where('type', 'in')->sum('quantity');
        $out = $this->transactions()->where('type', 'out')->sum('quantity');
        
        return $in - $out;
    }
    protected function totalValue(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->current_stock * $this->price,
        );
    }
    public function mutations(): HasMany
    {
        return $this->hasMany(StockMutation::class);
    }
    // Dynamic Attribute to get current real-time stock
    
    // Check if item needs restocking
    public function isLowStock(): bool
    {
        return $this->current_stock <= $this->alert_level;
    }
    // Add inventory coming into the warehouse
    public function addStock(int $quantity): void
    {
        $this->increment('current_stock', $quantity);
    }

    // Remove inventory due to a customer order or loss
    public function removeStock(int $quantity): void
    {
        if ($this->current_stock < $quantity) {
            throw new Exception("Insufficient stock for item: {$this->name}");
        }

        $this->decrement('current_stock', $quantity);
    }
}
