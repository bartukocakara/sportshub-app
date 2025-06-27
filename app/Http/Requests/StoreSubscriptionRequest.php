<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'plan_id' => ['required', 'exists:subscription_plans,id'],
            'promotion_code' => ['nullable', 'string', 'max:255'],
            // Add payment token validation if you handle payment details directly in this request
            // 'payment_method_id' => ['required', 'string'],
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'plan_id.required' => 'A subscription plan is required.',
            'plan_id.exists' => 'The selected subscription plan does not exist.',
        ];
    }
}
