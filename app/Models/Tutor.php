<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'school_id'];

    /**
     * Relación: Un tutor está asociado a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación: Un tutor pertenece a un instituto.
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Relación: Un tutor puede tener varios estudiantes.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function assignments()
    {
        return $this->hasMany(InternshipAssignment::class);
    }
}
