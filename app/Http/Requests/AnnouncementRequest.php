<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sport_type_id'   => ['required', 'exists:sport_types,id'],
            'type'            => ['required', 'string', 'in:general,info,urgent'], // adjust types as needed
            'subject_type'    => ['required', 'string', 'in:Team,Matches,Reservation,Court'], // adjust as needed
            'subject_id'      => ['required', 'integer'],
            'title'           => ['required', 'string', 'max:255'],
            'message'         => ['required', 'string', 'max:5000'],
        ];
    }
}
