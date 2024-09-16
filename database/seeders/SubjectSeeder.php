<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'name'        => 'HTML ENGINEERING',
                'code'        => 'HTML-101',
                'description' => 'LEARN HOW TO BUILD A WEBSITE USING HTML.',
                'teacher_id'  => User::find(2)->id,
                'course_id'   => Course::find(1)->id,
                'created_at'  => now(),
            ],
            [
                'name'        => 'CSS MASTER',
                'code'        => 'CSS-404',
                'description' => 'LEARN HOW TO BUILD A WEBSITE USING CSS.',
                'teacher_id'  => User::find(2)->id,
                'course_id'   => Course::find(1)->id,
                'created_at'  => now(),
            ],
            [
                'name'        => 'DATABASE MANAGEMENT',
                'code'        => 'DBM-404',
                'description' => 'LEARN HOW TO MANAGE DATABASE.',
                'teacher_id'  => User::find(2)->id,
                'course_id'   => Course::find(1)->id,
                'created_at'  => now(),
            ],
            [
                'teacher_id'  => User::find(2)->id,
                'course_id'   => Course::find(2)->id,
                'name'        => 'JAVA ENGINEERING',
                'code'        => 'JAVA-M-101',
                'description' => 'LEARN HOW TO BUILD A MOBILE APPLICATION USING JAVA.',
                'created_at'  => now(),
            ],
            [
                'teacher_id'  => User::find(2)->id,
                'course_id'   => Course::find(2)->id,
                'name'        => 'ALGORITHM BASICS',
                'code'        => 'ALGM-101',
                'description' => 'LEARN HOW TO BUILD A MOBILE APPLICATION USING ALGORITHM.',
                'created_at'  => now(),
            ],
            [
                'teacher_id'  => User::find(2)->id,
                'course_id'   => Course::find(3)->id,
                'name'        => 'STATISTICS',
                'code'        => 'STS-101',
                'description' => 'LEARN HOW TO BUILD A MOBILE APPLICATION USING STATISTICS.',
                'created_at'  => now(),
            ],
            [
                'teacher_id'  => User::find(2)->id,
                'course_id'   => Course::find(3)->id,
                'name'        => 'DATA ANALYSIS',
                'code'        => 'DTA-101',
                'description' => 'LEARN HOW TO BUILD A MOBILE APPLICATION USING DATA.',
                'created_at'  => now(),
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
