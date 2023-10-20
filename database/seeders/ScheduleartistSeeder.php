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
            'status' => 'inactive',
            'date' => '21 Oct Sat',
            'start_time' => '02:29pm',
            'end_time' => '05:29pm',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('scheduleartists')->insert([
            'artist_id' => '2',
            'status' => 'inactive',
            'date' => '20 Oct Fri',
            'start_time' => '12:43pm',
            'end_time' => '04:39pm',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
