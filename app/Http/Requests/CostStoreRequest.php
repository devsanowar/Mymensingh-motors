<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostStoreRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'category_id' => ['required', 'integer', 'exists:cost_categories,id'],
            'field_id' => ['required', 'integer', 'exists:field_of_costs,id'],
            'description' => ['required', 'string', 'min:5'],
            'amount' => ['required', 'numeric', 'min:0'],
            'spend_by' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => 'The expense date is required.',
            'date.date' => 'Please provide a valid date.',

            'category_id.required' => 'Please select a category.',
            'category_id.integer' => 'The category ID must be in correct format.',
            'category_id.exists' => 'The selected category does not exist.',

            'field_id.required' => 'Please select a cost field.',
            'field_id.integer' => 'The field ID must be in correct format.',
            'field_id.exists' => 'The selected cost field does not exist.',

            'description.required' => 'Please enter a description for the expense.',
            'description.string' => 'The description must be a text.',
            'description.min' => 'The description must be at least 5 characters long.',

            'amount.required' => 'Please enter the expense amount.',
            'amount.numeric' => 'The amount must be a valid number.',
            'amount.min' => 'The amount must be zero or greater.',

            'spend_by.required' => 'Please enter who spent the amount.',
            'spend_by.string' => 'The spender name must be text.',
            'spend_by.max' => 'The spender name may not be greater than 255 characters.',
        ];
    }
}
