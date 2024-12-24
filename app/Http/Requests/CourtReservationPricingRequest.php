<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Enums\DayEnum;
use Illuminate\Foundation\Http\FormRequest;

class CourtReservationPricingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'day_of_week' => [
                Rule::in(array_column(DayEnum::cases(), 'value')) // Validate using DayEnum values
            ],
            'hours' => 'array|required',
            'hours.*.from_hour' => 'required|date_format:H:i',
            'hours.*.to_hour' => 'required|date_format:H:i',
            'hours.*.price' => 'required|numeric',
        ];

        if ($this->isMethod('post')) {
            $rules['day_of_week'][] = 'required';
            $rules['hours'] = 'array|required';
            $rules['hours.*.from_hour'] = 'required|date_format:H:i';
            $rules['hours.*.to_hour'] = 'required|date_format:H:i';
            $rules['hours.*.price'] = 'required|numeric';
        }

        return $rules;
    }
}
