<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'user_id' => 3,
            'school_id' => 1,
            'tutor_id' => 1,
            'birthdate' => '2002-03-12',
            'degree' => 'DAW',
            'city' => 'Madrid',
            'address' => 'Calle Real 456',
            'zipcode' => '28080'
        ]);
    }
}
