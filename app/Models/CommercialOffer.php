<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class CommercialOffer extends Model

{
    //
    protected $fillable = [ 'customer_id',
        'offer_number','offer_date','enquiry_number','enquiry_date',
        'validity', 'payment_terms','gst_terms','delivery_terms','discount',
        'pricebasis_terms','guarantee_terms','other_terms',
       
       
    ];
     public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class,'customer_id' );
    }
}
