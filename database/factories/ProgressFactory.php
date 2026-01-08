<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Courses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progress>
 */
class ProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'   => User::inRandomOrder()->first()->id,
            'course_id' => Courses::inRandomOrder()->first()->id,
            'percentage'=>fake()->numberBetween(0,100)
        ];
    }
}
