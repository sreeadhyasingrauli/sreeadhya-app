<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChallanItem extends Model
{
    //
   protected $fillable = [ 'challan_id','part_number', 'part_description',
               'quantity', 'uom', 'price', 
        
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function challan(): BelongsTo 
    {
         return $this->belongsTo(Challan::class);
    }
    public function order_items() 
    {
        return $this->belongsTo(OrderItem::class);
    }
}
