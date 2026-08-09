<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class ProformaInvoiceItem extends Model
{
    //
    protected $fillable = [ 'proforma_invoice_id','part_number','part_description',
               'inv_quantity', 'uom', 'unit_price', 'sub_total','gst_rate',  'gst_amount',
        
    ];
    public function invoice(): BelongsTo 
    {
         return $this->belongsTo(ProformaInvoice::class);
    }
    public function order_items() 
    {
        return $this->belongsTo(OrderItem::class);
    }
}
