<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class OrderItem extends Model
{
    //
   
    protected $fillable = ['order_id', 'product_id', 'part_number', 'part_description', 'hsn_code', 'uom',
        'order_quantity', 'unit_price', 'gst_rate', 'gst_amount', 'sub_total', 'total_amount'];
    

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    
}
