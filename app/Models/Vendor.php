<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vendor extends Model
{
    //
    protected $primaryKey = 'vendor_id';
    protected $fillable = [
         
        'vendor_name','country','state','city','pin_code',
        'address_line1', 'address_line2', 
        'gst_number',
    ];
    
}
