<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InternshipAssignment extends Model
{
    use HasFactory;

    protected $table = 'internship_assignments';

    protected $fillable = [
        'student_id',
        'company_id',
        'tutor_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }
}
