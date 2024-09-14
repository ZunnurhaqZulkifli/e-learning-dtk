<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_has_permissions = [
            [
                'role_id' => 1,
                'permissions' => Permission::all()->pluck('id')->toArray(),
            ],
            [
                'role_id' => 2,
                'permissions' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13],
            ],
        ];

        $datas = [];

        foreach ($role_has_permissions as $role) {
            foreach ($role['permissions'] as $permission) {
                $datas[] = [
                    'role_id' => $role['role_id'],
                    'permission_id' => $permission,
                ];
            }
        }

        if (!empty($datas)) {
            try {
                DB::beginTransaction();
                DB::table('role_has_permissions')->insert($datas);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
    }
}
