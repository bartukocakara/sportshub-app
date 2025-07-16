<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RequestCreateCourtBusinessRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'tax_no' => 'required|string|size:10',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:court_businesses,email',
            'address' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
            'postal_code' => 'required|string|max:20',
            'longitude' => 'required|max:15',
            'latitude' => 'required|max:15',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i',
            'social_media_links' => 'nullable|array',
            'social_media_links.instagram' => 'nullable|string|url',
            'social_media_links.facebook' => 'nullable|string|url',
            'files' => 'nullable|array',
            'files.*.court_business_document_type_id' => 'nullable|integer|exists:court_business_document_types,id',
            'files.*.file' => 'nullable|file',
        ];

        if ($this->isMethod('put')) {
            // Make all parameters nullable for PUT requests
            foreach ($rules as  &$rule) {
                $rule = str_replace('required', 'nullable', $rule);
            }
            // Add specific rule for PUT requests
            $rules['status'] = 'nullable|in:2,3';
        }

        return $rules;
    }
}
