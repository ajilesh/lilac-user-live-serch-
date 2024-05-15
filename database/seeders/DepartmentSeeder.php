<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = [[
            'name' => 'Application development'
        ],
        [
            'name' => 'Sales & Marketing '
        ],
        [
            'name' => 'Web development'
        ]];
        foreach ($department as $departments) {
            Department::create($departments);
        }
    }
}
