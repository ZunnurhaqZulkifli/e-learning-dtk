<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Computer System and Network',
                'code' => 'WEBD-101',
                'description' => 'Learn how to build a handle system and networking.',
                'created_at' => now(),
                'teacher_id' => 1,
            ],
            [
                'name' => 'ICT Maintainance Management',
                'code' => 'ICT-101',
                'description' => 'Learn how to manage and maintain system.',
                'created_at' => now(),
                'teacher_id' => 1,
            ],
            [
                'name' => 'Network Installation Management',
                'code' => 'MLM-101',
                'description' => 'Learn how to build setup networking and do installation.',
                'created_at' => now(),
                'teacher_id' => 1,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
