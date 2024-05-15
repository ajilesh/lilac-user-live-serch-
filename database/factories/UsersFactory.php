<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Users;
use App\Models\Department;
use App\Models\Designation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Users::class;
    public function definition(): array
    {
        $department = Department::all();
        $designation = Designation::all();
        return [
            'name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'department_id' => $department->random()->id,
            'designation_id' => $designation->random()->id
        ];
        
    }
}
