<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'                  => 'Muhammad Administrator',
                'username'              => 'admin',
                // 'identification_number' => '9999999999999',
                'phone_number'          => '0134065518',
                'email'                 => 'admin@gmail.com',
                'email_verified_at'     => now(),
                'password'              => Hash::make('password'),
                'created_at'            => now(),
                'updated_at'            => now(),
            ],

            [
                'name'                  => 'Cikgu Ali',
                'username'              => 'ali',
                // 'identification_number' => '999999999999',
                'phone_number'          => '01444044404',
                'email'                 => 'ali@gmail.com',
                'email_verified_at'     => now(),
                'password'              => Hash::make('password'),
                'created_at'            => now(),
                'updated_at'            => now(),
            ],

            // student #1 
            [
                'name'                  => 'Akiff Hakimi',
                'username'              => 'akif',
                // 'identification_number' => '010512354323',
                'phone_number'          => '0193381232',
                'email'                 => 'akif@gmail.com',
                'email_verified_at'     => now(),
                'password'              => Hash::make('password'),
                'created_at'            => now(),
                'updated_at'            => now(),
            ],

            // student #2
            [
                'name'                  => 'Hasiff Osman',
                'username'              => 'hasiff',
                // 'identification_number' => '18237172731',
                'phone_number'          => '0129838123',
                'email'                 => 'hasiff@gmail.com',
                'email_verified_at'     => now(),
                'password'              => Hash::make('password'),
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $all_users = User::all();

        foreach ($all_users as $key => $user) {
            if($key + 1 == 4) {
                $user->assignRole(Role::find(3));
            } else {
                $user->assignRole(Role::find($key + 1));
            }
        }

        User::factory()->count(40)->create();
    }
}
