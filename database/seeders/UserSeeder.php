<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tutor
        User::create([
            'name' => 'Juan Tutor',
            'email' => 'tutor@itc.edu',
            'password' => Hash::make('password'),
            'role' => 'tutor',
            'dni' => '11111111B',
            'phone' => '600000001',
            'school_id' => 1
        ]);

        // Estudiante
        User::create([
            'name' => 'Laura Estudiante',
            'email' => 'laura@student.itc.edu',
            'password' => Hash::make('password'),
            'role' => 'student',
            'dni' => '22222222C',
            'phone' => '600000002',
            'school_id' => 1
        ]);
    }
}
