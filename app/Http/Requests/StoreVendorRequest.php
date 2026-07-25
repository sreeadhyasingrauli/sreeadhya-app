<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreVendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                 
            'vendor_name' => 'required|string|max:255',
            
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'pin_code' => 'nullable|string|max:10',
            'address_line1' => 'nullable|string|max:255',
             'address_line2' => 'nullable|string|max:255',
            'gst_number' => 'nullable|string|max:20',
             
        
        ];
    }
}
