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
            'title' => 'required|string|max:255',
            'sport_type_id' => 'required|uuid|exists:sport_types,id',
            // Adres alanları
            'court_address.street_name' => 'nullable|string|max:255',
            'court_address.address_detail' => 'nullable|string|max:255',
            'court_address.district_id' => 'nullable|exists:districts,id',
            'court_address.longitude' => 'nullable|numeric',
            'court_address.latitude' => 'nullable|numeric',
            'court_address.neighborhood' => 'nullable|string|max:255',
            'court_address.building_number' => 'nullable|string|max:50',
            'court_address.city' => 'nullable|string|max:255',
            // Görseller
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ];
    }
}
