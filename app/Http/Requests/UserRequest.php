<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'name' => 'required|string|max:255',
            'dni' => 'required|string|max:9|unique:users,dni,',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => $this->isMethod('post') ? 'required|string|min:6|confirmed' : 'nullable|string|min:6|confirmed',
            'role' => 'required|in:student,tutor',
            'school_id' => 'required|exists:schools,id',
            'birthdate' => 'required|date',
            'degree' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'zipcode' => 'required|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'dni.required' => 'The dni field is required.',
            'phone.required' => 'The phone field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'role.required' => 'The role field is required.',
            'role.in' => 'The selected role is invalid.',
            'school_id.required' => 'The school field is required.',
            'school_id.exists' => 'The selected school is invalid.',
            'birthdate.required' => 'The birthdate field is required.',
            'birthdate.date' => 'The birthdate must be a valid date.',
            'degree.required' => 'The degree field is required.',
            'degree.string' => 'The degree must be a string.',
            'degree.max' => 'The degree may not be greater than 255 characters.',
            'city.required' => 'The city field is required.',
            'city.string' => 'The city must be a string.',
            'city.max' => 'The city may not be greater than 255 characters.',
            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than 255 characters.',
            'zipcode.required' => 'The zipcode field is required.',
            'zipcode.string' => 'The zipcode must be a string.',
            'zipcode.max' => 'The zipcode may not be greater than 10 characters.',
        ];
    }
}