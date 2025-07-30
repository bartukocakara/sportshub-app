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
        return [
            'title' => 'nullable|string|max:255',
            'match_id' => 'required|uuid|exists:matches,id',
            'match_team_id' => 'nullable|uuid|exists:match_teams,id',
            'type' => 'in:invite,join'
        ];
    }
}
