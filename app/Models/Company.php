<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\InternshipAssignment;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nif',
        'address',
        'phone',
        'email',
        'website',
    ];

    public function internshipAssignments()
    {
        return $this->hasMany(InternshipAssignment::class);
    }
}
