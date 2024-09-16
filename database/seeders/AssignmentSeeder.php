<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assignments = [
            [
                'name' => 'Assignment 1',
                'subject_id' => 1,   
                'target_mark' => '40',
                'code' => 'ASS-' . Subject::find(1)->code,
                'description' => 'This is the first assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 2',
                'subject_id' => 1,   
                'target_mark' => '10',
                'code' => 'ASS-' . Subject::find(1)->code,
                'description' => 'This is the second assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 3',
                'subject_id' => 1,
                'target_mark' => '50',
                'code' => 'ASS-' . Subject::find(1)->code,
                'description' => 'This is the third assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 4',
                'subject_id' => 2,
                'target_mark' => '70',
                'code' => 'ASS-' . Subject::find(2)->code,
                'description' => 'This is the fourth assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 5',
                'subject_id' => 2,
                'target_mark' => '30',
                'code' => 'ASS-' . Subject::find(2)->code,
                'description' => 'This is the fifth assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 6',
                'subject_id' => 3,
                'target_mark' => '10',
                'code' => 'ASS-' . Subject::find(3)->code,
                'description' => 'This is the sixth assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 7',
                'subject_id' => 3,
                'target_mark' => '70',
                'code' => 'ASS-' . Subject::find(3)->code,
                'description' => 'This is the seventh assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 8',
                'subject_id' => 3,
                'target_mark' => '20',
                'code' => 'ASS-' . Subject::find(3)->code,
                'description' => 'This is the eighth assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 9',
                'subject_id' => 4,
                'target_mark' => '100',
                'code' => 'ASS-' . Subject::find(4)->code,
                'description' => 'This is the nineth assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 10',
                'subject_id' => 5,
                'target_mark' => '75',
                'code' => 'ASS-' . Subject::find(5)->code,
                'description' => 'This is the tenth assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 11',
                'subject_id' => 5,
                'target_mark' => '25',
                'code' => 'ASS-' . Subject::find(5)->code,
                'description' => 'This is the eleventh assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 12',
                'subject_id' => 6,
                'target_mark' => '100',
                'code' => 'ASS-' . Subject::find(6)->code,
                'description' => 'This is the twelveth assignment',
                'created_at' => now(),
            ],
            [
                'name' => 'Assignment 13',
                'subject_id' => 7,
                'target_mark' => '100',
                'code' => 'ASS-' . Subject::find(7)->code,
                'description' => 'This is the thirteenth assignment',
                'created_at' => now(),
            ],
        ];

        foreach ($assignments as $assignment) {
            Assignment::create($assignment);
        }
    }
}
