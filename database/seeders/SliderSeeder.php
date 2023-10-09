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
            'image' => 'editor/20231009_170406_01.jpg',
        ]);

        DB::table('sliders')->insert([
            'image' => 'editor/20231009_170504_2daed29885944b1da2a93cc9d9421fd4.jpg',
        ]);

        DB::table('sliders')->insert([
            'image' => 'editor/20231009_170514_923007675362_status_3b74ab96fac044dea6d7297561564df9.jpg',
        ]);
    }
}
