<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules() : array
    {
        $schoolId = $this->route('id');
        return [
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
            'zipcode' => 'required|string',
            'phone' => [
                'nullable',
                'string',
                Rule::unique('schools', 'phone')->ignore($schoolId),
            ],
            'email' => [
                'nullable',
                'string',
                'email',
                Rule::unique('schools', 'email')->ignore($schoolId),
            ],
            'website' => [
                'nullable',
                'url',
                Rule::unique('schools', 'website')->ignore($schoolId),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'city.required' => 'The city field is required.',
            'address.required' => 'The address field is required.',
            'zipcode.required' => 'The zipcode field is required.',
            'phone.unique' => 'The phone number has already been taken.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'website.url' => 'The website must be a valid URL.',
            'website.unique' => 'The website has already been taken.',
        ];
    }
}