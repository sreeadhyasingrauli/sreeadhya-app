<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'part_number' => 'required|string|max:250|unique:products,product_id' ,
            'alt_part_number' => 'nullable|string|max:250',
            'part_description' => 'required|string|max:250',
            'make' => 'required|string|max:250',
            'price' => 'required',
            'uom' => 'required|string|max:250',
            'hsn_code' => 'required',
            'gst_rate' => 'required',
            'current_stock' => 'required',
            'alert_level' => 'required',
            
        ];
    }
}