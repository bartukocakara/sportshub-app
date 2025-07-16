<?php

namespace App\Http\Requests\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RequestReservationUpdateRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->request_private_chat;
        $validator = $this->validateDatabase($id);

        return $validator->errors()->all() ? $this->failedValidation($validator) : [
            'status' => 'required'
        ];
    }

    private function validateDatabase($id)
    {
        $validator = Validator::make([], []);
        $existingRequestReservation = DB::table('request_reservations')
                                        ->join('reservations', 'request_reservations.reservation_id', '=', 'reservations.id')
                                        ->where('id', $id)->first();
        if($existingRequestReservation){
            if($existingRequestReservation->status == RequestStatusEnum::ACCEPTED->value){
                $validator->errors()->add('already_approved', 'This request already approved');
            }
            if ($existingRequestReservation->reservation_id != auth()->user()->id) {
                $validator->errors()->add('owner', 'You are not the owner of this request');
            }
            if($existingRequestReservation->expiring_date < now()) {
                $validator->errors()->add('expiring_date', 'Request has been expired.');
            }
        }
        else {
            $validator->errors()->add('exists', 'Request doesnt exists.');
        }

        return $validator;
    }
}
