<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InternshipAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'tutor_id',
        'company_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
