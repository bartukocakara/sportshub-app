<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseFormRequest;

class RequestPlayerTeamRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => $this->isMethod('post') ? 'required|max:255' : 'max:255',
            'team_id' => 'required',
            'status' => 'in:1,2,3',
            'requested_user_id' => 'uuid',
            'position_id' => 'uuid|exists:positions,id',
            'type' => 'in:invite,join'
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
