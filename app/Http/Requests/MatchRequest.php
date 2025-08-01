<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MatchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'             => 'nullable|string|max:255',
            'description'       => 'nullable|string|max:1000',
            'price'             => 'nullable|numeric|min:0|max:99999999',
            'gender'            => ['nullable', Rule::in(['male', 'female', 'mixed'])],
            'min_team'          => 'nullable|integer|min:2',
            'max_team'          => 'nullable|integer|min:2',
            'type'              => 'nullable',
            'min_player'        => 'nullable|integer|min:2',
            'max_player'        => 'nullable|integer|min:2|max:20',
            'sport_type_id'     => 'nullable|uuid|exists:sport_types,id',
            'match_status'      => ['nullable', Rule::in(['pending', 'confirmed', 'completed', 'canceled'])],
            'from_hour'         => 'nullable|date_format:H:i',
            'to_hour'           => 'nullable|date_format:H:i|after:from_hour',
            'start_date'        => 'nullable|date|after_or_equal:today',
            'expiring_date'     => 'nullable|date|after_or_equal:start_date',
            'play_date'         => 'nullable|date|after_or_equal:start_date',
            'court_id'          => 'nullable|uuid|exists:courts,id',
            'is_court_private'  => 'nullable|boolean',
        ];
    }
}
