<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourtRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'court_business_id' => 'uuid|exists:court_businesses,id',
            'title' => 'string|min:2|max:30|unique:courts,title',
            'sport_type_id' => 'string|exists:sport_types,id',
            'images' => 'array',
            'images.*.order' => 'integer',
            'images.*.file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
