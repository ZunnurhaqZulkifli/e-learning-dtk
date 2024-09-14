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
                'name' => 'HTML ENGINEERING',
                'code' => 'HTML-101',
                'description' => 'LEARN HOW TO BUILD A WEBSITE USING HTML.',
                'teacher_id' => User::find(2)->id,
                'course_id' => Course::find(1)->id,
                'created_at' => now(),
            ],
            [
                'teacher_id' => User::find(2)->id,
                'course_id' => Course::find(2)->id,
                'name' => 'JAVA ENGINEERING',
                'code' => 'JAVA-M-101',
                'description' => 'LEARN HOW TO BUILD A MOBILE APPLICATION USING JAVA.',
                'created_at' => now(),
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
