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
                'name' => 'Server Management',
                'code' => 'SRV-101',
                'description' => 'Learn how to manage and maintain servers.',
                'created_at' => now(),
                'teacher_id' => 1,
            ],
            [
                'name' => 'Network Security',
                'code' => 'NET-202',
                'description' => 'Understand the principles of network security and how to protect against threats.',
                'created_at' => now(),
                'teacher_id' => 2,
            ],
            [
                'name' => 'Database Design',
                'code' => 'DBD-303',
                'description' => 'Learn the fundamentals of database design and implementation.',
                'created_at' => now(),
                'teacher_id' => 3,
            ],
            [
                'name' => 'Web Development',
                'code' => 'WEB-404',
                'description' => 'Build and design modern web applications using various technologies.',
                'created_at' => now(),
                'teacher_id' => 4,
            ],
            [
                'name' => 'Cloud Computing',
                'code' => 'CLD-505',
                'description' => 'Explore cloud computing concepts and services.',
                'created_at' => now(),
                'teacher_id' => 5,
            ],
            [
                'name' => 'Machine Learning',
                'code' => 'ML-606',
                'description' => 'Introduction to machine learning algorithms and their applications.',
                'created_at' => now(),
                'teacher_id' => 6,
            ],
            [
                'name' => 'Cybersecurity',
                'code' => 'CYB-707',
                'description' => 'Learn about cybersecurity threats and how to defend against them.',
                'created_at' => now(),
                'teacher_id' => 7,
            ],
            [
                'name' => 'Mobile App Development',
                'code' => 'MOB-808',
                'description' => 'Develop mobile applications for Android and iOS platforms.',
                'created_at' => now(),
                'teacher_id' => 8,
            ],
            [
                'name' => 'Data Science',
                'code' => 'DS-909',
                'description' => 'Analyze and interpret complex data to make informed decisions.',
                'created_at' => now(),
                'teacher_id' => 9,
            ],
            [
                'name' => 'Artificial Intelligence',
                'code' => 'AI-010',
                'description' => 'Explore the concepts and applications of artificial intelligence.',
                'created_at' => now(),
                'teacher_id' => 10,
            ],
            [
                'name' => 'Software Engineering',
                'code' => 'SE-111',
                'description' => 'Learn the principles and practices of software engineering.',
                'created_at' => now(),
                'teacher_id' => 11,
            ],
            [
                'name' => 'DevOps',
                'code' => 'DEV-212',
                'description' => 'Understand the practices and tools used in DevOps.',
                'created_at' => now(),
                'teacher_id' => 12,
            ],
            [
                'name' => 'Data Analytics',
                'code' => 'DA-313',
                'description' => 'Learn how to analyze and interpret data to make informed decisions.',
                'created_at' => now(),
                'teacher_id' => 13,
            ],
            [
                'name' => 'Blockchain Technology',
                'code' => 'BLK-414',
                'description' => 'Explore the fundamentals and applications of blockchain technology.',
                'created_at' => now(),
                'teacher_id' => 14,
            ],
        ];

        // Course::factory(5)->create();

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
