<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\School;
use App\Models\InternshipAssignment;

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
        'role', // 'student', 'tutor'
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

    public function schools()
    {
        return $this->belongsTo(School::class);
    }

    public function studentInternshipAssignments()
    {
        return $this->hasMany(InternshipAssignment::class, 'student_id');
    }

    public function tutorInternshipAssignments()
    {
        return $this->hasMany(InternshipAssignment::class, 'tutor_id');
    }
}
