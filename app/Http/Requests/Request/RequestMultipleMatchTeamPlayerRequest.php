<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseFormRequest;

class RequestMultipleMatchTeamPlayerRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => $this->isMethod('post') ? 'required|max:255' : 'max:255',
            'match_teams' => 'required|array',
            'match_teams.*.id' => 'required|uuid|distinct',
            'match_teams.*.requested_user_ids.*' => 'required|uuid|distinct',
        ];
    }
}
