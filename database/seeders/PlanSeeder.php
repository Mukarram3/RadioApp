<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateTime = Carbon::now(); // Replace this with your own DateTime object or value

        $datetime = $dateTime->format('Y-m-d H:i:s');
        DB::table('plans')->insert([
            'title' => 'plan 1',
            'features' => 'plan features',
            'cost' => '$20',
            'expiration' => 3,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('plans')->insert([
            'title' => 'plan 2',
            'features' => 'plan features',
            'cost' => '$50',
            'expiration' => 4,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('plans')->insert([
            'title' => 'plan 3',
            'features' => 'plan features',
            'cost' => '$100',
            'expiration' => 5,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
