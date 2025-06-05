<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\InternshipAssignment;
use Illuminate\Database\Seeder;

class InternshipAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InternshipAssignment::create([
            'student_id' => 2,
            'company_id' => 1,
            'tutor_id' => 1,
            'start_date' => '2025-05-01',
            'end_date' => '2025-06-30',
            'status' => 'Approved',
            "evaluation" => "Not Evaluated"
        ]);
    }
}
