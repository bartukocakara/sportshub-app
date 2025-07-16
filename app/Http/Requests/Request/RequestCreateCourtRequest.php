<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseFormRequest;

class RequestCreateCourtRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'string|max:255',
            'is_private' => 'required|in:0,1',
            'address' => 'required_unless:is_private,1|array',
            'address.street_name' => 'required_unless:is_private,1|string|max:255',
            'address.district_id' => 'required_unless:is_private,1|exists:districts,id',
            'address.longitude' => 'required_unless:is_private,1|numeric',
            'address.latitude' => 'required_unless:is_private,1|numeric',
            'address.neighborhood' => 'required_unless:is_private,1|string|max:255',
            'address.building_number' => 'required_unless:is_private,1|string|max:50',
            'address.zip_code' => 'required_unless:is_private,1|string|max:20',
            'images' => 'required|array',
            'images.*.order' => 'required|numeric',
            'images.*.file' => 'required|file'
        ];

        // If request method is "PUT", remove validation rule for 'type'
        if ($this->isMethod('put')) {
            unset($rules);
            $rules['status'] = 'required|in:2,3';
        }

        return $rules;
    }
}
