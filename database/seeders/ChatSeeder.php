<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateTime = Carbon::now(); // Replace this with your own DateTime object or value

        $datetime = $dateTime->format('Y-m-d H:i:s');
        DB::table('chats')->insert([
            'user_id' => '1',
            'message' => 'Hello Jack',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('chats')->insert([
            'user_id' => '2',
            'message' => 'Hey Jone',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('chats')->insert([
            'user_id' => '2',
            'message' => 'How are You!',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
