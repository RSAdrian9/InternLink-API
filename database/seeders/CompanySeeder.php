<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Empresa Tech',
            'nif' => 'B12345678',
            'address' => 'Av. de la Innovación 789',
            'phone' => '911234567',
            'email' => 'empresa@tech.com',
            'website' => 'https://empresatech.com'
        ]);
    }
}
