<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
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
            'category' => 'required|exists:categories,id',
            'payer' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0.01',
        ];
    }

    public function messages(): array
    {
        return [
            'category.required' => 'Please select a category (Food, Rent, etc.).',
            'category.exists' => 'The selected category is invalid.',
            'payer.required' => 'You must specify who paid for this.',
            'payer.exists' => 'The selected payer is not a valid user.',
            'amount.required' => 'How much did it cost?',
            'amount.numeric' => 'Please enter a valid number for the amount.',
            'amount.min' => 'The amount must be at least 0.01.',
        ];
    }
}
