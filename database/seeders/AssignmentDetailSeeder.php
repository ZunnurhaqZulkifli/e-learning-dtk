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
                'assignment_id' => Assignment::find(6)->id,
                'teacher_id'    => Teacher::find(1)->id,
                'name'          => Student::find(1)->name,
                'code'          => Assignment::find(6)->code,
                'description'   => 'ntah',
                'marks'         => '37',
                'start_date'    => '2024-09-01',
                'submitted_at'  => now(),
                'file'          => 'ee',
                'created_at'    => now(),
            ],
            [
                'assignment_id' => Assignment::find(6)->id,
                'teacher_id'    => Teacher::find(1)->id,
                'name'          => Student::find(1)->name,
                'code'          => Assignment::find(6)->code,
                'description'   => 'ntah 2',
                'marks'         => '53',
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
