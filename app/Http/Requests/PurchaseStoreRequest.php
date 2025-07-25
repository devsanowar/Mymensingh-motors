<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseStoreRequest extends FormRequest
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
            'purchase_date'      => 'required|date',
            'supplier_id'        => 'required|exists:suppliers,id',
            'voucher_number'     => 'required|string',
            'total'              => 'required|numeric',
            'grand_total'        => 'required|numeric',
            'products'           => 'required|array|min:1',
            'products.*.id'      => 'required|exists:products,id',
            'products.*.qty'     => 'required|integer|min:1',
            'products.*.price'   => 'required|numeric|min:0',
        ];
    }
}
