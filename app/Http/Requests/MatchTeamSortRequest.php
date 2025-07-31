<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchTeamSortRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'transfers_json' => 'required|string|json',

            'transfers_json_decoded' => 'array',

            'transfers_json_decoded.*.user_id' => [
                'required',
            ],
            'transfers_json_decoded.*.match_team_id' => [
                'required', 
            ],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('transfers_json')) {
            $this->merge([
                'transfers_json_decoded' => json_decode($this->input('transfers_json'), true),
            ]);
        }
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'transfers_json.required' => __('messages.transfers_required'),
            'transfers_json.json' => __('messages.invalid_transfers_format'),
            'transfers_json_decoded.*.user_id.required' => __('messages.player_id_required'),
            'transfers_json_decoded.*.user_id.integer' => __('messages.player_id_invalid'),
            'transfers_json_decoded.*.user_id.exists' => __('messages.player_not_found'),
            'transfers_json_decoded.*.match_team_id.required' => __('messages.team_id_required'),
            'transfers_json_decoded.*.match_team_id.integer' => __('messages.team_id_invalid'),
            'transfers_json_decoded.*.match_team_id.exists' => __('messages.team_not_found'),
        ];
    }
}