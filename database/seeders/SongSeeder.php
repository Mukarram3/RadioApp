<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateTime = Carbon::now(); // Replace this with your own DateTime object or value

        $datetime = $dateTime->format('Y-m-d H:i:s');

        DB::table('songs')->insert([
            'title' => 'Heartbeat FM',
            'artist_id' => '1',
            'stream_type' => 'music',
            'stream_url' => 'http://listen.42fm.ru:8000/stealkill-5.0.ogg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('songs')->insert([
            'stream_type' => 'music',
            'artist_id' => '2',
            'stream_url' => 'https://cdn.flowplayer.com/a30bd6bc-f98b-47bc-abf5-97633d4faea0/hls/de3f6ca7-2db3-4689-8160-0f574a5996ad/playlist.m3u8',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('songs')->insert([
            'title' => 'Heartbeat FM',
            'artist_id' => '3',
            'stream_type' => 'radio station',
            'stream_url' => 'http://listen.42fm.ru:8000/stealkill-5.0.ogg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('songs')->insert([
            'stream_type' => 'live dj',
            'stream_url' => 'https://cdn.flowplayer.com/a30bd6bc-f98b-47bc-abf5-97633d4faea0/hls/de3f6ca7-2db3-4689-8160-0f574a5996ad/playlist.m3u8',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('songs')->insert([
            'stream_type' => 'live dj',
            'stream_url' => 'https://cdn.flowplayer.com/a30bd6bc-f98b-47bc-abf5-97633d4faea0/hls/de3f6ca7-2db3-4689-8160-0f574a5996ad/playlist.m3u8',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('songs')->insert([
            'artist_id' => '3',
            'title' => 'ANCE PARTY',
            'stream_type' => 'radio station',
            'stream_url' => 'https://cdn.flowplayer.com/a30bd6bc-f98b-47bc-abf5-97633d4faea0/hls/de3f6ca7-2db3-4689-8160-0f574a5996ad/playlist.m3u8',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('songs')->insert([
            'title' => 'The Talk Box',
            'artist_id' => '4',
            'stream_type' => 'radio station',
            'stream_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-14.mp3',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('songs')->insert([
            'title' => '90s & 2000s Bollywood',
            'artist_id' => '4',
            'category_id' => '2',
            'stream_type' => 'radio station',
            'stream_url' => 'http://streaming504.radionomy.com/radio-monaco-nightmood-aac',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('songs')->insert([
            'title' => '90s & 2000s Bollywood',
            'artist_id' => '5',
            'channel_id' => '1',
            'type' => 'free',
            'stream_type' => 'video',
            'stream_url' => 'https://djsboxapp.djsbox.fun/storage/songs/Garry Sandhu - Banda Ban Ja - Official Video 2014 - Shortcut.mp4',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('songs')->insert([
            'title' => '90s & 2000s Bollywood',
            'artist_id' => '6',
            'channel_id' => '2',
            'plan_id' => '2',
            'type' => 'paid',
            'stream_type' => 'video',
            'stream_url' => 'https://djsboxapp.djsbox.fun/storage/songs/Garry Sandhu - Banda Ban Ja - Official Video 2014 - Shortcut.mp4',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('songs')->insert([
            'title' => '90s & 2000s Bollywood',
            'artist_id' => '7',
            'stream_type' => 'music',
            'category_id' => '3',
            'stream_url' => 'https://djsboxapp.djsbox.fun/storage/songs/Do Pal Ka.mp3',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('songs')->insert([
            'title' => '90s & 2000s Bollywood',
            'artist_id' => '8',
            'category_id' => '3',
            'stream_type' => 'music',
            'stream_url' => 'https://djsboxapp.djsbox.fun/storage/songs/Do Pal Ka.mp3',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
