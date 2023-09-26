<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'title' => 'Podcast',
        ]);

        DB::table('categories')->insert([
            'title' => 'Top 20',
        ]);

        DB::table('categories')->insert([
            'title' => 'Music',
        ]);
        DB::table('categories')->insert([
            'title' => 'Loved Ones',
        ]);
    }
}
