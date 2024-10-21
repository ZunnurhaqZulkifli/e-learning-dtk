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
                'name' => 'Banner 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'path' => 'images/banner_02.png',
                'name' => 'Banner 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'path' => 'images/banner_03.png',
                'name' => 'banner 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($images as $image) {
            Image::create($image);
        }
    }
}
