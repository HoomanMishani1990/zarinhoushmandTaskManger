<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(['todo', 'in_progress', 'done']),
            'start_date' => $this->faker->date(),
            'deadline' => $this->faker->date(),
            'total_budget' => $this->faker->randomFloat(2, 1000, 10000),
            'spent_budget' => $this->faker->randomFloat(2, 0, 5000),
            'total_hours' => $this->faker->numberBetween(10, 100),
            'spent_hours' => $this->faker->numberBetween(0, 50),
            'progress_percentage' => $this->faker->numberBetween(0, 100),
        ];
    }
} 