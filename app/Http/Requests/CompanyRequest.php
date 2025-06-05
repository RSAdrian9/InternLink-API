<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules() : array
    {
        $companyId = $this->route('id');
        return [
            'name' => 'required|string|max:255',
            'nif' => [
                'required',
                'string',
                'max:20',
                Rule::unique('companies', 'nif')->ignore($companyId),
            ],
            'address' => 'required|string|max:255',
            'phone' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('companies', 'phone')->ignore($companyId),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('companies', 'email')->ignore($companyId),
            ],
            'website' => [
                'nullable',
                'url',
                Rule::unique('companies', 'website')->ignore($companyId),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'nif.required' => 'The NIF field is required.',
            'nif.unique' => 'The NIF has already been taken.',
            'address.required' => 'The address field is required.',
            'phone.unique' => 'The phone has already been taken.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'website.url' => 'The website must be a valid URL.',
            'website.unique' => 'The website has already been taken.',
        ];
    }
}