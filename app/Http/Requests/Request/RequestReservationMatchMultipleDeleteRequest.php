<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class RequestReservationMatchMultipleDeleteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'items' => 'array',
            'items.*.request_reservation_id' => 'uuid|distinct|exists:request_reservations,id',
            'items.*.match_ids' => 'array',
            'items.*.match_ids.*' => 'uuid|distinct|exists:matches,id',
        ];
    }
}
