<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class RequestPlayerTeamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'nullable|max:255',
            'team_id' => 'required|exists:teams,id',
            'type' => 'required|in:invite,join'
        ];

        // If request method is "PUT", remove validation rule for 'type'
        if ($this->isMethod('put')) {
            unset($rules['type']);
            unset($rules['requested_user_id']);
            unset($rules['team_id']);
        }

        return $rules;
    }
}
