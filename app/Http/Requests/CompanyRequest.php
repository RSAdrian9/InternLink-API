<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'name' => 'required|string|max:255',
            'nif' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:companies,email,',
            'website' => 'nullable|url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'nif.required' => 'The NIF field is required.',
            'address.required' => 'The address field is required.',
            'phone.required' => 'The phone field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'website.url' => 'The website must be a valid URL.',
        ];
    }
}