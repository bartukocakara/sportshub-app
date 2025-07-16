<?php

namespace App\Http\Requests\Request;

use App\Enums\StatusEnums\Reservation\ReservationStatusEnum;
use App\Http\Requests\BaseFormRequest;
use App\Models\Reservation;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class RequestReservationRequest extends BaseFormRequest
{
    public function rules()
    {
        $isPost = $this->isMethod('post');
        $rules = [
            'title' => 'max:255',
        ];

        if ($isPost) {
            $rules['court_id'] = 'required|exists:courts,id';
            $rules['sport_type_id'] = 'required|exists:sport_types,id';
            $rules['date'] = 'required_without:items|date';
            $rules['from_hour'] = 'required_without:items|date_format:H:i';
            $rules['to_hour'] = 'required_without:items|date_format:H:i';
            $rules['match_ids'] = 'nullable|array';
            $rules['match_ids.*'] = 'nullable|exists:matches,id';

            $rules['items'] = 'required_without_all:date,from_hour,to_hour|array';
            $rules['items.*.from_hour'] = 'required_with:items|date_format:H:i';
            $rules['items.*.to_hour'] = 'required_with:items|date_format:H:i';
            $rules['items.*.match_ids'] = 'nullable|array';
            $rules['items.*.match_ids.*'] = 'uuid|distinct|exists:matches,id';
        }

        if ($this->isMethod('put')) {
            unset($rules['sport_type_id']);
            $rules['status'] = 'required|in:2,3';
        }

        return $rules;
    }

    protected function prepareForValidation()
    {
        $items = $this->input('items', []);
        $singleReservation = [];

        if ($this->has('date') && $this->has('from_hour') && $this->has('to_hour')) {
            $singleReservation = [
                'date' => $this->input('date'),
                'from_hour' => $this->input('from_hour'),
                'to_hour' => $this->input('to_hour'),
                'match_ids' => $this->input('match_ids', []),
            ];
        }

        if (!empty($singleReservation)) {
            $items[$singleReservation['date']] = $singleReservation;
        }

        $this->merge(['items' => $items]);
    }

    public function validateResolved()
    {
        parent::validateResolved();
        $this->validateNoOverlappingReservations();
    }

    protected function validateNoOverlappingReservations()
    {
        $courtId = $this->input('court_id');
        $items = $this->input('items', []);

        foreach ($items as $key => $item) {
            if (empty($item)) continue;
            $fromHour = Carbon::parse($item['from_hour'])->format('H:i:s');
            $toHour = Carbon::parse($item['to_hour'])->format('H:i:s');

            $exists = Reservation::where('court_id', $courtId)
                                    ->where('reservation_status_id', ReservationStatusEnum::APPROVED->value)
                                    ->whereDate('date', Carbon::parse($key)->format('Y-m-d'))
                                    ->where(function ($query) use ($fromHour, $toHour) {
                                        $query->where('from_hour', '<', $toHour)
                                              ->where('to_hour', '>', $fromHour);
                                    })
                                    ->exists();

            if ($exists) {
                throw ValidationException::withMessages([
                    'items' => ['There is already a reservation for the selected court and time range.'],
                ]);
            }
        }
    }
}
