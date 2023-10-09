<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dateTime = Carbon::now(); // Replace this with your own DateTime object or value

        $datetime = $dateTime->format('Y-m-d H:i:s');
        $role1 = Role::create([
            'name' => 'Admin',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
        $role2 = Role::create([
            'name' => 'User',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
}
