<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::create([
            'name' => 'Instituto Tecnológico Central',
            'city' => 'Madrid',
            'address' => 'Calle Falsa 123',
            'zipcode' => '28080',
            'phone' => '910000000',
            'email' => 'contacto@itc.edu',
            'website' => 'https://itc.edu'
        ]);
    }
}
