<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id', // Assuming city_id is a UUID and exists in 'cities' table
            'gender' => ['required', Rule::in(['male', 'female', 'mixed'])],
            'min_player' => 'required|integer|min:2', // Enforce minimum 2 players
            'max_player' => 'required|integer|min:2|max:20', // Enforce maximum 20 players
            'sport_type_id' => 'required|uuid|exists:sport_types,id', // Assuming sport_type_id is a UUID and exists
            'user_ids' => 'nullable|array', // Allow null for create or update if no players are selected
            'user_ids.*' => 'uuid|exists:users,id', // Ensure each user ID is a UUID and exists in 'users' table
            'team_status' => ['nullable', Rule::in(['active', 'inactive', 'banned'])], // For update modal
        ];
    }
}
