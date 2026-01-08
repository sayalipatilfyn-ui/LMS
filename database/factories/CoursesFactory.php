<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courses>
 */
class CoursesFactory extends Factory
{
    protected $model = \App\Models\Courses::class;

    public function definition()
    {
        return [
            'title'       => fake()->sentence(3),
            'description' => fake()->paragraph(4),
            'category'    => fake()->randomElement([
                'Web Development',
                'UI/UX',
                'Data Science'
            ]),
            'price'       =>fake()->randomFloat(2, 0, 9999),
        ];
    }
}