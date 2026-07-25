<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseOrder extends Model
{
    //
    protected $fillable = ['vendor_id', 'po_number', 'po_date', 'gst_terms','delivery_terms','pf_terms','transport','basic_value', 'gst_value','pf_value','total_value','status'];

    public function vendor(): BelongsTo 
    {
      return $this->belongsTo(Vendor::class);
    }

    public function items(): HasMany 
    {
       return $this->hasMany(PurchaseOrderItem::class,'purchase_order_id');
    }
    public function product(): BelongsTo
    {
        // Assumes your offers table has a 'product_id' foreign key
        return $this->belongsTo(Product::class);
    }
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'order_id');
    }
    public function attributes(): array
    {
            return [
                  'items.*.part_number' => 'item part_number',
                  'items.*.part_description' => 'item description',
                    'items.*.quantity' => 'item quantity',
                    'items.*.uom' => 'item uom',
                    'items.*.unit_price' => 'item unit price',
            ];
    }
}
