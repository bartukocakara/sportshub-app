<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseFormRequest;

class RequestMatchTeamPlayerRequest extends BaseFormRequest
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
            'match_id' => 'uuid',
            'status' => 'in:1,2,3',
            'position_id' => 'exists:positions,id',
            'requested_user_id' => 'uuid',
            'type' => 'in:invite,join'
        ];

        // If request method is "POST", include validation rule for 'match_team_id'
        if ($this->isMethod('post')) {
            unset($rules['status']);

            $rules['match_team_id'] = 'required|uuid|exists:match_teams,id';
        } else {
            // If request method is not "POST", remove validation rule for 'match_team_id'
            unset($rules['type']);
            unset($rules['requested_user_id']);
        }

        return $rules;
    }
}
