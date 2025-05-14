<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'dni',
        'phone',
        'email',
        'password',
        'role',
        'school_id',
        'birthdate',
        'degree',
        'city',
        'address',
        'zipcode'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function schools(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'internship')
                    ->withPivot('id', 'student_id', 'company_id', 'tutor_assigner_id', 'start_date', 'end_date', 'status')
                    ->withTimestamps();
    }

    public function studentInternshipAssignments(): HasMany
    {
        return $this->hasMany(InternshipAssignment::class, 'student_id');
    }

    public function tutorInternshipAssignments(): HasMany
    {
        return $this->hasMany(InternshipAssignment::class, 'tutor_assigner_id');
    }
}
