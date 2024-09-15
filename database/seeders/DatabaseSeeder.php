<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->command->call('migrate:refresh');

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            RoleHasPermissionsSeeder::class,
            UsersSeeder::class,
            TeacherSeeder::class,
            CourseSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
            // AttachRoleToUserSeeder::class,
        ]);
    }
}