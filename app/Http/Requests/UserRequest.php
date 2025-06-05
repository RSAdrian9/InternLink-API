<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules() : array
    {
        $userId = $this->route('id');
        return [
            'name' => 'required|string|max:255',
            'dni' => [
                'nullable',
                'string',
                'max:9',
                Rule::unique('users', 'dni')->ignore($userId),
            ],
            'phone' => 'nullable|string|max:20',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'password' => $this->isMethod('post') ? 'required|string|min:6|confirmed' : 'nullable|string|min:6|confirmed',
            'role' => 'required|in:Student,Tutor',
            'school_id' => 'nullable|exists:schools,id',
            'birthdate' => 'nullable|date',
            'degree' => 'nullable|string|in:1ºSMR,2ºSMR,1ºDAM,2ºDAM,2ºDAW',
            'city' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'dni.max' => 'The dni may not be greater than 9 characters.',
            'dni.unique' => 'The dni has already been taken.',
            'phone.string' => 'The phone must be a string.',
            'phone.max' => 'The phone may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'role.required' => 'The role field is required.',
            'role.in' => 'The selected role is invalid.',
            'school_id.exists' => 'The selected school is invalid.',
            'birthdate.date' => 'The birthdate must be a valid date.',
            'degree.string' => 'The degree must be a string.',
            'degree.in' => 'The selected degree is invalid. Valid options are: 1ºSMR, 2ºSMR, 1ºDAM, 2ºDAM, 2ºDAW.',
            'city.string' => 'The city must be a string.',
            'city.max' => 'The city may not be greater than 255 characters.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than 255 characters.',
            'zipcode.string' => 'The zipcode must be a string.',
            'zipcode.max' => 'The zipcode may not be greater than 10 characters.',
        ];
    }
}