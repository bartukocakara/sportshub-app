<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RequestReservationMatchMultipleUpdateRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // return [
        //     'items' => 'array',
        //     'items.*.request_reservation_id' => 'uuid|distinct|exists:request_reservations,id',
        //     'items.*.match_ids' => 'array',
        //     'items.*.match_ids.*' => 'uuid|distinct|exists:matches,id',
        // ];

        $validator = Validator::make([], []);

        $params = request()->all();
        $dataExists = [];
        // Request Reservation Matches duplicate oluyorsa engelle
        foreach ($params['items'] as $key => $value) {
            $dataExists[] = DB::table('request_reservation_matches')
                              ->whereIn('match_id', $value['match_ids'])
                              ->where('request_reservation_id', $value['request_reservation_id'])->exists();
        }
        if(in_array(true, $dataExists)){
            $validator->errors()->add('request_exists', 'Match already exists in request');
        }

        return $validator->errors()->all() ? $this->failedValidation($validator) : [
            'items' => 'array',
            'items.*.request_reservation_id' => 'uuid|distinct|exists:request_reservations,id',
            'items.*.match_ids' => 'array',
            'items.*.match_ids.*' => 'uuid|distinct|exists:matches,id',
        ];
    }
}
