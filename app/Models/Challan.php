<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Challan extends Model
{
    //
    
      protected $fillable = ['customer_id','challan_number',
         'challan_date', 'order_number','order_date','vehicle_number'   
    ];
    
    public function items()
    {
        return $this->hasMany(ChallanItem::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    
}
