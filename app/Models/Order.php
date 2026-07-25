<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    //
     protected $primaryKey = 'order_id';
    protected $fillable = ['customer_id', 'order_number', 'order_date', 'valid_until', 'sub_total', 'gst_amount', 'total_value',  
    'payment_terms', 'gst_terms', 'delivery_terms', 'pf_terms', 'pricebasis_terms', 'guarantee_terms', 'ld_terms', 'other_terms', 'order_status',  ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
