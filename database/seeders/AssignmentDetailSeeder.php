<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\AssignmentDetail;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $details = [
            [
                'assignment_id' => Assignment::find(1)->id,
                'teacher_id'    => Teacher::find(1)->id,
                'name'          => Student::find(1)->name,
                'code'          => Assignment::find(1)->code,
                'description'   => 'ntah',
                'marks'         => '37',
                'start_date'    => '2024-09-01',
                'submitted_at'  => now(),
                'file'          => 'ee',
                'created_at'    => now(),
            ],
            [
                'assignment_id' => Assignment::find(2)->id,
                'teacher_id'    => Teacher::find(1)->id,
                'name'          => Student::find(1)->name,
                'code'          => Assignment::find(2)->code,
                'description'   => 'ntah 2',
                'marks'         => '3',
                'start_date'    => '2024-09-01',
                'submitted_at'  => now(),
                'file'          => 'ee',
                'created_at'    => now(),
            ],
            [
                'assignment_id' => Assignment::find(3)->id,
                'teacher_id'    => Teacher::find(1)->id,
                'name'          => Student::find(1)->name,
                'code'          => Assignment::find(3)->code,
                'description'   => 'ntah 2',
                'marks'         => '10',
                'start_date'    => '2024-09-01',
                'submitted_at'  => now(),
                'file'          => 'ee',
                'created_at'    => now(),
            ],

            [
                'assignment_id' => Assignment::find(1)->id,
                'teacher_id'    => Teacher::find(1)->id,
                'name'          => Student::find(2)->name,
                'code'          => Assignment::find(1)->code,
                'description'   => 'Assignment Hebat 1',
                'marks'         => '35',
                'start_date'    => '2024-09-01',
                'submitted_at'  => now(),
                'file'          => 'ee',
                'created_at'    => now(),
            ],

            [
                'assignment_id' => Assignment::find(2)->id,
                'teacher_id'    => Teacher::find(1)->id,
                'name'          => Student::find(2)->name,
                'code'          => Assignment::find(2)->code,
                'description'   => 'Assignment Hebat 2',
                'marks'         => '5',
                'start_date'    => '2024-09-01',
                'submitted_at'  => now(),
                'file'          => 'ee',
                'created_at'    => now(),
            ],

            [
                'assignment_id' => Assignment::find(3)->id,
                'teacher_id'    => Teacher::find(1)->id,
                'name'          => Student::find(2)->name,
                'code'          => Assignment::find(3)->code,
                'description'   => 'Assignment Hebat 3',
                'marks'         => '40',
                'start_date'    => '2024-09-01',
                'submitted_at'  => now(),
                'file'          => 'ee',
                'created_at'    => now(),
            ],

        ];

        foreach ($details as $detail) {
            $ad = AssignmentDetail::create($detail);
            $ad->students()->attach(Student::find(1), ['created_at' => now()]);
        }
    }
}
