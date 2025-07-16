<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class RequestReservationMatchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'request_reservation_id' => 'required|exists:request_reservation_matches,request_reservation_id',
            'match_ids' => 'required|array',
            'match_ids.*' => 'required|exists:matches,id',

        ];
    }
}
