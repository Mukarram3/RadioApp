<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FavouritesongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateTime = Carbon::now(); // Replace this with your own DateTime object or value

        $datetime = $dateTime->format('Y-m-d H:i:s');
        DB::table('favouritesongs')->insert([
            'user_id' => 1,
            'song_id' => 2,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('favouritesongs')->insert([
            'user_id' => 1,
            'song_id' => 3,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('favouritesongs')->insert([
            'user_id' => 2,
            'song_id' => 2,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
