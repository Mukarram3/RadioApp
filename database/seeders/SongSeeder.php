<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('songs')->insert([
            'artist_id' => '1',
            'type' => 'paid',
            'channel_id' => '1',
            'category_id' => '1',
            'stream_url' => asset('storage/songs/Garry Sandhu - Banda Ban Ja - Official Video 2014.mp4'),
        ]);

        DB::table('songs')->insert([
            'artist_id' => '3',
            'type' => 'paid',
            'channel_id' => '2',
            'category_id' => '4',
            'stream_url' => asset('storage/songs/Garry Sandhu - Banda Ban Ja - Official Video 2014.mp4'),
        ]);

        DB::table('songs')->insert([
            'artist_id' => '2',
            'type' => 'paid',
            'channel_id' => '3',
            'category_id' => '1',
            'stream_url' => asset('storage/songs/Do Pal Ka.mp3'),
        ]);

        DB::table('songs')->insert([
            'artist_id' => '4',
            'type' => 'paid',
            'channel_id' => '3',
            'category_id' => '1',
            'stream_url' => asset('storage/songs/Do Pal Ka.mp3'),
        ]);
    }
}
