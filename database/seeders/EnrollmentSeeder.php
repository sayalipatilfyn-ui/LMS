<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Courses;
use App\Models\Enrollment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         if (User::count() === 0) {
            User::factory()->count(10)->create();
        }

        // Create courses if table is empty
        if (Courses::count() === 0) {
            Courses::factory()->count(5)->create();
        }

        // Create enrollments
        Enrollment::factory()->count(20)->create();
    }
}
