<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Modalidades;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'school_id' => 'required|exists:schools,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'school_id.required' => 'The school field is required.',
            'school_id.exists' => 'The selected school is invalid.'
        ];
    }
}