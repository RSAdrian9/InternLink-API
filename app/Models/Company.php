<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'internship')
                    ->withPivot('id', 'student_id', 'company_id', 'tutor_assigner_id', 'start_date', 'end_date', 'status')
                    ->withTimestamps();
    }

    public function internship(): HasMany
    {
        return $this->hasMany(InternshipAssignment::class);
    }
}
