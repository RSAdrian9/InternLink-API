<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\CompanyResource;

class InternshipAssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'company_id' => $this->company_id,
            'tutor_id' => $this->tutor_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'evaluation' => $this->evaluation,

            'student' => UserResource::make($this->whenLoaded('student')),
            'company' => CompanyResource::make($this->whenLoaded('company')),
            'tutor' => UserResource::make($this->whenLoaded('tutor')),
        ];
    }
}
