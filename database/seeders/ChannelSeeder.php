<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('channels')->insert([
            'title' => 'CH1 Reggage',
            'type' => 'free',
            'image' => asset('storage/images/stock-photo-portrait-of-a-young-girl-listening-to-music-at-home-2344492497.jpg'),
            'artist_name' => 'artist_name',
        ]);
        DB::table('channels')->insert([
            'title' => 'CH2 Dance',
            'type' => 'paid',
            'image' => asset('storage/images/stock-photo-portrait-of-a-young-girl-listening-to-music-at-home-2344492497.jpg'),
            'artist_name' => 'artist_name',
        ]);
        DB::table('channels')->insert([
            'title' => 'CH3 Party',
            'type' => 'free',
            'image' => asset('storage/images/stock-photo-portrait-of-a-young-girl-listening-to-music-at-home-2344492497.jpg'),
            'artist_name' => 'artist_name',
        ]);
        DB::table('channels')->insert([
            'title' => 'CH4 Romance',
            'type' => 'paid',
            'image' => asset('storage/images/stock-photo-portrait-of-a-young-girl-listening-to-music-at-home-2344492497.jpg'),
            'artist_name' => 'artist_name',
        ]);
    }
}
