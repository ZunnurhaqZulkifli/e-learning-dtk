<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'path' => 'images/banner_01.png',
                'image_type_id' => 1,
                'name' => 'Banner 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'path' => 'images/banner_02.png',
                'image_type_id' => 1,
                'name' => 'Banner 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'path' => 'images/banner_03.png',
                'image_type_id' => 1,
                'name' => 'banner 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'path' => 'images/server_managemenr.png',
                'image_type_id' => 2,
                'name' => 'course 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'path' => 'images/network_security.png',
                'image_type_id' => 2,
                'name' => 'course 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'path' => 'images/database_design.png',
                'image_type_id' => 2,
                'name' => 'course 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'path' => 'images/web_development.png',
                'image_type_id' => 2,
                'name' => 'course 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($images as $image) {
            Image::create($image);
        }
    }
}
