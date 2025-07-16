<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseFormRequest;

class RequestMultiplePlayerTeamRequest extends BaseFormRequest
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
            'requested_user_ids' => 'required|array',
            'match_teams.*' => 'required|uuid|distinct',
        ];
    }
}
