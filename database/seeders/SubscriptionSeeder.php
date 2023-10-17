<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateTime = Carbon::now(); // Replace this with your own DateTime object or value

        $datetime = $dateTime->format('Y-m-d H:i:s');
        DB::table('subscriptions')->insert([
            'user_id' => 1,
            'plan_id' => 2,
            'expiration' => $dateTime->addMonths(4)->format('Y-m-d H:i:s'),
            'cost' => 50,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('subscriptions')->insert([
            'user_id' => 1,
            'plan_id' => 3,
            'expiration' => $dateTime->addMonths(5)->format('Y-m-d H:i:s'),
            'cost' => 100,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('subscriptions')->insert([
            'user_id' => 2,
            'plan_id' => 1,
            'expiration' => $dateTime->addMonths(4)->format('Y-m-d H:i:s'),
            'cost' => 20,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('subscriptions')->insert([
            'user_id' => 1,
            'plan_id' => 1,
            'expiration' => $dateTime->addMonths(3)->format('Y-m-d H:i:s'),
            'cost' => 20,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
