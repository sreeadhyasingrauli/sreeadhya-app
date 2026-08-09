<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class ProformaInvoice extends Model
{
    protected $fillable = [ 'serial_series','serial_number',
        'invoice_number',
        'customer_id',
        'order_id',
        'invoice_date',
        'basic_amount',
        'gst_amount',
        'invoice_amount','received_amount','balance_amount',
        'payment_status',
        'invoice_status'
    ];

   
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function customers(): HasMany
    {
    return $this->hasMany(Customer::class);
    }
    //  CORRECT
    
    public function Order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    
    
    public function items(): HasMany
    {
        return $this->hasMany(ProformaInvoiceItem::class);
    }
    protected static function boot()
    {
        parent::boot();


        static::creating(function ($proformaInvoice) {
            // 1. Define your series prefix dynamically (e.g., based on the current year)
            $prefix = 'SAT/PI-' ;
            $proformaInvoice->serial_series = $prefix;


            // 2. Fetch the absolute highest existing serial number matching this exact series
            // Lock the row for update to securely prevent multiple processes reading identical values simultaneously
            $lastProformaInvoice = static::where('serial_series', $prefix)
                ->lockForUpdate()
                ->max('serial_number');


            // 3. Compute the incremental integer
            $nextNumber = $lastProformaInvoice ? $lastProformaInvoice + 1 : 1;
            $proformaInvoice->serial_number = $nextNumber;


            // 4. Concat fields into a padded template string (e.g., 1 becomes 0001)
            $proformaInvoice->invoice_number = $prefix . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
        });
    }

}
