<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'phone'=>'9812345678',
                'password'=>Hash::make('password'),
                'isRole'=>0
            ]
        );

        DB::table('users')->insert(
            [
                'name'=>'User',
                'phone'=>'9812345679',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('password'),
                'isRole'=>1,
                'created_at'=>today()
            ]
        );
    }
}
