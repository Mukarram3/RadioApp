<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table=new User();
        $table->fname='admin';
        $table->lname = 'admin';
        $table->email = 'admin@gmail.com';
        $table->password = Hash::make('adminadmin');
        $table->phone = '1213456789';
        $table->gender = 'male';
        $table->type = 'Admin';
        $table->save();

        $table->assignRole(['Admin']);

        $table=new User();
        $table->fname='user';
        $table->lname = 'user';
        $table->email = 'user@gmail.com';
        $table->password = Hash::make('useruser');
        $table->phone = '1213456789';
        $table->gender = 'male';
        $table->type = 'User';
        $table->save();

        $table->assignRole(['User']);
    }
}
