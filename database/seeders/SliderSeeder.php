<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->insert([
            'image' => asset('storage/images/stock-photo-portrait-of-a-young-girl-listening-to-music-at-home-2344492497.jpg'),
        ]);

        DB::table('sliders')->insert([
            'image' => asset('storage/images/stock-photo-portrait-of-a-young-girl-listening-to-music-at-home-2344492497.jpg'),
        ]);

        DB::table('sliders')->insert([
            'image' => asset('storage/images/stock-photo-portrait-of-a-young-girl-listening-to-music-at-home-2344492497.jpg'),
        ]);
    }
}
