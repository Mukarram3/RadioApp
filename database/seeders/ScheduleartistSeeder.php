<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleartistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateTime = Carbon::now(); // Replace this with your own DateTime object or value

        $datetime = $dateTime->format('Y-m-d H:i:s');
        DB::table('scheduleartists')->insert([
            'artist_id' => '1',
            'date' => '2023-12-19T19:30:22.022671Z',
            'start_time' => '2023-11-19 18:00:21',
            'end_time' => '2023-11-19 22:00:21',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('scheduleartists')->insert([
            'artist_id' => '2',
            'date' => '2023-12-18T19:30:22.022671Z',
            'start_time' => '2023-11-18 11:00:21',
            'end_time' => '2023-11-18 08:00:21',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
