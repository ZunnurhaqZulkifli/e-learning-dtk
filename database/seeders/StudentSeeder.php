<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => User::find(3)->name,
                'user_id' => User::find(3)->id,
                'student_id' => 'STD-0001',
                'created_at' => now(),
                'courses' => [1],
            ],

            [
                'name' => User::find(4)->name,
                'user_id' => User::find(4)->id,
                'student_id' => 'STD-0002',
                'created_at' => now(),
                'courses' => [1, 2],
            ],
        ];

        foreach ($students as $studentData) {
            $student = Student::create([
                'name' => $studentData['name'],
                'user_id' => $studentData['user_id'],
                'student_id' => $studentData['student_id'],
                'created_at' => $studentData['created_at'],
            ]);

            $student->courses()->attach($studentData['courses']);
        }
    }
}
