<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          \DB::table('users')->delete();
        \DB::table('users')->insert(array (
            0 => 
            array (
                //'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role_id' => 0,  //admin
                'referral_id' => null,
                'referral_code' => null,
                'points'        => 0,
                'email_verified_at'=>NULL,
                'password' => '$2y$10$jbofjyySQjrE9d1eISnLw..MfRgA3xvKp.v20p5VFCJKUCn6QSxAi',
                'remember_token' => null,
                'created_at' => "2023-03-24 20:27:16",
                'updated_at' => "2023-03-24 20:27:16",
            )
        ));
    }
}
