<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'unit_id' => 'required|exists:product_units,id',
            'product_name' => 'required|string|max:100',
            'short_description' => 'required|string|max:255',
            'long_description' => 'nullable|string',
            'regular_price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'discount_type' => 'nullable|in:flat,percent',
            'stock_quantity' => 'required|integer|min:0',
            'is_featured' => 'required|in:0,1',
            'is_active' => 'required|in:0,1',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];
    }
}
