<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSubjectSeeder extends Seeder
{
    public function run()
    {
        $studentSubjects = [
            [
                'student_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
            ],
            [
                'student_id' => 2,
                'subject_id' => 1,
                'created_at' => now(),
            ],
        ];

        foreach ($studentSubjects as $studentSubject) {
            Subject::find($studentSubject['subject_id'])->students()->attach($studentSubject['student_id'], ['created_at' => $studentSubject['created_at']]);
        }
    }
}
