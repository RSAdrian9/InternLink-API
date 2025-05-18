<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'email' => $this->email,
            'role' => $this->role,
            'school_id' => $this->school_id,
            'birthdate' => $this->birthdate,
            'degree' => $this->degree,
            'city' => $this->city,
            'address' => $this->address,
            'zipcode' => $this->zipcode,
        ];
    }
}
