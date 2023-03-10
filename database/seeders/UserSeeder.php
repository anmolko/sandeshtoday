<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'दर्पण दैनिक',
            'slug' => 'दर्पण-दैनिक',
            'email' => 'admin@gmail.com',
            'user_type' => 'admin',
            'status' => 1,
            'password' => Hash::make('admin'),
        ]);
    }
}
