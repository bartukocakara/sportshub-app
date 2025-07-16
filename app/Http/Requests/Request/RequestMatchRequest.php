<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseFormRequest;

class RequestMatchRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'match_id' => 'string|exists:matches,id',
            'title' => 'string',
            'request_match_status_id' => 'integer|exists:request_match_statuses,id',
            'expiring_date' => ''
        ];
        if ($this->isMethod('post')) {
            // For "POST" requests, make all rules "required"
            foreach ($rules as $field => $rule) {
                $rules[$field] = 'required|' . $rule;
            }
        }
        return $rules;
    }
}
