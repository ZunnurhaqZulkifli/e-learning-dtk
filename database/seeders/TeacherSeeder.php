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
                'user_id' => User::find(2)->id,
                'code' => 'TCH-0001',
                'created_at' => now(),
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create([
                'name' => $teacher['name'],
                'user_id' => $teacher['user_id'],
                'code' => $teacher['code'],
                'created_at' => $teacher['created_at'],
            ]);
        }
    }
}
