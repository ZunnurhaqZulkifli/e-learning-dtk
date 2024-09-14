<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'create courses',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'edit courses',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'delete courses',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'create subjects',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'edit subjects',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'delete subjects',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'view students',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'create students',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'edit students',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'delete students',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'create teachers',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'edit teachers',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'delete teachers',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
