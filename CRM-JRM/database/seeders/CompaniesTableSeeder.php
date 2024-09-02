<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'QIAGEN',
            'email' => 'contact@qiagen.com',
            'logo' => null,
            'website' => 'https://www.qiagen.com',
        ]);

        Company::create([
            'name' => 'Accenture',
            'email' => 'admin@accenture.com',
            'logo' => null,
            'website' => 'https://www.accenture.com',
        ]);
    }
}
