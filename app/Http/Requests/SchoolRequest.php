<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Modalidades;

class SchoolRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
            'zipcode' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'website' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'city.required' => 'The city field is required.',
            'address.required' => 'The address field is required.',
            'zipcode.required' => 'The zipcode field is required.',
            'phone.required' => 'The phone field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'website.required' => 'The website field is required.',
            'website.url' => 'The website must be a valid URL.',
        ];
    }
}