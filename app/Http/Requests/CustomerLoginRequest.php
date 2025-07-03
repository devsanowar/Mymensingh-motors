<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerLoginRequest extends FormRequest
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
            'phone' => 'required|regex:/^01[3-9][0-9]{8}$/',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'The phone number field is required.',
            'phone.regex' => 'Please enter a valid Bangladeshi mobile number (e.g. 017XXXXXXXX).',
            'password.required' => 'The password field is required.',
            'password.min' => 'Password must be at least 8 characters long.',
        ];
    }
}
