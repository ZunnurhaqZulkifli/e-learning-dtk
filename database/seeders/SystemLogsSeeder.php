<?php

namespace Database\Seeders;

use App\Models\SystemLogs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemLogs::create([
            'message' => 'Application Setup Started',
            'type' => 'info',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
