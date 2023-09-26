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
            'image' => 'image path',
            'artist_name' => 'artist_name',
        ]);
        DB::table('channels')->insert([
            'title' => 'CH2 Dance',
            'type' => 'paid',
            'image' => 'image path',
            'artist_name' => 'artist_name',
        ]);
        DB::table('channels')->insert([
            'title' => 'CH3 Party',
            'type' => 'free',
            'image' => 'image path',
            'artist_name' => 'artist_name',
        ]);
        DB::table('channels')->insert([
            'title' => 'CH4 Romance',
            'type' => 'paid',
            'image' => 'image path',
            'artist_name' => 'artist_name',
        ]);
    }
}
