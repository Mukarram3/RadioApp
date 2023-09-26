<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'image path',
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'image path',
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'image path',
        ]);
        DB::table('artists')->insert([
            'name' => 'artist name',
            'image' => 'image path',
        ]);
    }
}
