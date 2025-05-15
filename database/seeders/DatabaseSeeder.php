<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Student;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SchoolSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            InternshipAssignmentSeeder::class,
        ]);
    }
}

