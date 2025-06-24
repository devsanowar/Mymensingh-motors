<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitUpdateRequest extends FormRequest
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
        'product_unit_id' => 'required|exists:product_units,id',
        'fullname' => 'required|string|max:100',
        'short_name' => 'required|string|max:20',
        'description' => 'nullable|string',
        'is_active' => 'required|in:1,0',
        ];
    }

    
    
}
