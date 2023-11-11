<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateTime = Carbon::now(); // Replace this with your own DateTime object or value

        $datetime = $dateTime->format('Y-m-d H:i:s');
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/654290e1e63a6.jpg',
            'is_scheduled' => true,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/20231101_175710_923007675362_status_4c965aac272d479782368e56f6d0a173.jpg',
            'is_scheduled' => true,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/20231101_175727_923073588239_status_4e07e963620f4a1ead87ae1cd11f6237.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/20231101_175738_923073588239_status_2d02620c6b23437cabaf0cc9ea9ad617.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/654290e1e63a6.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/20231101_175710_923007675362_status_4c965aac272d479782368e56f6d0a173.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/20231101_175727_923073588239_status_4e07e963620f4a1ead87ae1cd11f6237.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/20231101_175738_923073588239_status_2d02620c6b23437cabaf0cc9ea9ad617.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
