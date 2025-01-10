<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutPaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'card_number' => 'required|digits:16',
            'expiry_month' => 'required|numeric|between:01,12',
            'expiry_year' => 'required|numeric|digits:4|after_or_equal:' . date('Y'),
            'cvv' => 'required|digits:3',
        ];
    }

}
