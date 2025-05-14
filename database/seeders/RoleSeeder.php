<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Estudiante']);
        Role::create(['name' => 'Tutor']);

        // $estudiante = User::find(2); // Reemplaza 2 con el ID de un estudiante
        // $tutor = User::find(3);     // Reemplaza 3 con el ID de un tutor

        // $estudiante->assignRole('Estudiante');
        // $tutor->assignRole('Tutor');
    }
}