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
            'name' => 'required',
            'city' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'city.required' => 'The city field is required.'
        ];
    }
}