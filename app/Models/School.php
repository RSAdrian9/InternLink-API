<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'city', 
        'address', 
        'zipcode', 
        'phone', 
        'email', 
        'website'
    ];

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }
    public function students()
    {
        return $this->hasMany(User::class)->where('role', 'student');
    }

    public function tutors()
    {
        return $this->hasMany(User::class)->where('role', 'tutor');
    }

}
