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
                'name' => 'Web Development',
                'code' => 'WEBD-101',
                'description' => 'Learn how to build a website.',
                'created_at' => now(),
                'teacher_id' => 1,
            ],
            [
                'name' => 'Mobile Development',
                'code' => 'MBD-101',
                'description' => 'Learn how to build a mobile.',
                'created_at' => now(),
                'teacher_id' => 1,
            ],
            [
                'name' => 'Machine Learning',
                'code' => 'MLM-101',
                'description' => 'Learn how to build a destructive robot.',
                'created_at' => now(),
                'teacher_id' => 1,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
