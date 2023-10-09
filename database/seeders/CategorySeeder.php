<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateTime = Carbon::now(); // Replace this with your own DateTime object or value

        $datetime = $dateTime->format('Y-m-d H:i:s');
        DB::table('categories')->insert([
            'title' => 'Podcast',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('categories')->insert([
            'title' => 'Top 20',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('categories')->insert([
            'title' => 'Music',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('categories')->insert([
            'title' => 'Loved Ones',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
