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
            'image' => 'editor/20231009_181635_2daed29885944b1da2a93cc9d9421fd4.jpg',
            'artist_name' => 'artist_name',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('channels')->insert([
            'title' => 'CH2 Dance',
            'type' => 'paid',
            'image' => 'editor/20231009_181645_923007675362_status_3b74ab96fac044dea6d7297561564df9.jpg',
            'artist_name' => 'artist_name',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('channels')->insert([
            'title' => 'CH3 Party',
            'type' => 'free',
            'image' => 'editor/20231009_181654_923007675362_status_4c965aac272d479782368e56f6d0a173.jpg',
            'artist_name' => 'artist_name',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        DB::table('channels')->insert([
            'title' => 'CH4 Romance',
            'type' => 'paid',
            'image' => 'editor/20231009_181705_923073588239_status_2d02620c6b23437cabaf0cc9ea9ad617.jpg',
            'artist_name' => 'artist_name',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
