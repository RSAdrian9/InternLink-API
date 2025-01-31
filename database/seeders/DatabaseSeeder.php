<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Student;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $school = School::create([
            'name' => 'Harvard University',
            'city' => 'Cambridge'
        ]);

        Student::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'school_id' => $school->id
        ]);
    }
}

