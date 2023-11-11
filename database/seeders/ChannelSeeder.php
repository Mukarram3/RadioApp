<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateTime = Carbon::now(); // Replace this with your own DateTime object or value

$datetime = $dateTime->format('Y-m-d H:i:s');

        DB::table('channels')->insert([
            'title' => 'CH1 Reggage',
            'type' => 'free',
            'image' => 'editor/654290e1e63a6.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('channels')->insert([
            'title' => 'CH2 Dance',
            'type' => 'paid',
            'image' => 'editor/20231101_175710_923007675362_status_4c965aac272d479782368e56f6d0a173.jpg',
            'plan_id' => '1',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('channels')->insert([
            'title' => 'CH3 Party',
            'type' => 'free',
            'image' => 'editor/20231009_181654_923007675362_status_4c965aac272d479782368e56f6d0a173.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('channels')->insert([
            'title' => 'CH4 Romance',
            'type' => 'paid',
            'image' => 'editor/20231101_175727_923073588239_status_4e07e963620f4a1ead87ae1cd11f6237.jpg',
            'plan_id' => '3',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
