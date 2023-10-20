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
            'image' => 'editor/20231008_185238_923073588239_status_249c5ea761f54a2f8de4417457b733b3.jpg',
            'is_scheduled' => true,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/20231008_185228_923015967113_status_79990de39ee44362aa9b229aee69c471.jpg',
            'is_scheduled' => true,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/20231008_185217_2476e1165a8443c9bdb8e2707c589095.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'editor/20231008_185200_2daed29885944b1da2a93cc9d9421fd4.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
