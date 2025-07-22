<?php

namespace App\Http\Requests;

use App\Models\Definition;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnnouncementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $subjectType = $this->input('subject_type'); // Formdan gelen değer
        $groupKey = match ($subjectType) {
            'Court'         => 'court_announcement_type',
            'Team'          => 'team_announcement_type',
            'Matches'       => 'match_announcement_type',
            'Reservation'   => 'reservation_announcement_type',
            'User'          => 'user_announcement_type',
            default       => null,
        };

        $typeValues = $groupKey
            ? Definition::where('group_key', $groupKey)->pluck('value')->toArray()
            : [];

        return [
            'sport_type_id'   => ['required', 'exists:sport_types,id'],
            'type'            => ['required', 'string', Rule::in($typeValues)],
            'subject_type'    => ['required', 'string', 'in:Team,Matches,Reservation,Court,User'],
            'subject_id'      => ['required', 'uuid'],
            'title'           => ['required', 'string', 'max:255'],
            'message'         => ['required', 'string', 'max:5000'],
        ];
    }
}
