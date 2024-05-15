<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designation = [[
            'name' => 'Mobile Dev'
        ],
        [
            'name' => 'Marketing Manager'
        ],
        [
            'name' => 'Web Dev'
        ]];
        foreach ($designation as $designations) {
            Designation::create($designations);
        }
        
    }
}
