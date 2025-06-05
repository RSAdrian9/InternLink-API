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
            'name' => 'Juan',
            'email' => 'tutor@itc.edu',
            'password' => Hash::make('password'),
            'role' => 'Tutor',
            'dni' => '11111111B',
            'phone' => '600000001',
            'school_id' => 1,
        ]);

        // Estudiante
        User::create([
            'name' => 'Laura',
            'email' => 'laura@student.itc.edu',
            'password' => Hash::make('password'),
            'role' => 'Student',
            'dni' => '22222222C',
            'phone' => '600000002',
            'school_id' => 1,
            'birthdate' => '2000-12-01',
            'degree' => '2ºDAW',
            'city' => 'Córdoba',
            'address' => 'Calle de la Tecnología 123',
            'zipcode' => '14520'
        ]);
    }
}
