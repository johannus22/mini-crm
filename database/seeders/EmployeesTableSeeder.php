<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'company_id' => 1,
            'email' => 'john.doe@qiagen.com',
            'phone' => '123-456-7890',
        ]);

        Employee::create([
            'firstname' => 'Jane',
            'lastname' => 'Smith',
            'company_id' => 2,
            'email' => 'jane.smith@accenture.com',
            'phone' => '098-765-4321',
        ]);
    }
}
