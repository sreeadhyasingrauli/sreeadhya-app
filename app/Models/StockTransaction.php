<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockTransaction extends Model
{
    //
    protected $fillable = ['product_id', 'type', 'quantity', 'reference'];
    public function product()
    {
    // Replace 'product_id' with the actual column name in your database
    return $this->belongsTo(Product::class, 'product_id'); 
    }
}
