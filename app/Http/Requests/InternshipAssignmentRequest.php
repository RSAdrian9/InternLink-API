<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InternshipAssignmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:companies,id',
            'tutor_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|string|in:Pending,Approved,Finished,Rejected',
            'evaluation' => 'nullable|string|in:Passed,Failed,Not Evaluated',
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required' => 'The student is required.',
            'student_id.exists' => 'The selected student does not exist.',
            'company_id.required' => 'The company is required.',
            'company_id.exists' => 'The selected company does not exist.',
            'tutor_id.required' => 'The tutor is required.',
            'tutor_id.exists' => 'The selected tutor does not exist.',
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
            'status.required' => 'The status is required.',
            'status.string' => 'The status must be a string.',
            'status.in' => 'The status must be one of: pending, approved, finished, rejected.',
            'evaluation.string' => 'The evaluation must be a string.',
            'evaluation.in' => 'The evaluation must be one of: passed, failed, not evaluated.',
        ];
    }
}
