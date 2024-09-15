<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'name' => User::find(2)->name,
                'teacher_id' => 'TCH-0001',
                'created_at' => now(),
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create([
                'name' => $teacher['name'],
                'teacher_id' => $teacher['teacher_id'],
                'created_at' => $teacher['created_at'],
            ]);
        }
    }
}