<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => "md",
            'lname' => "jhon",
            'gender' => "male",
            'phone' => "01458752365",
            'image' => 'backend/vertical/assets/images/uploads/default.png',
            'role' => 1,
            'active' => 1,
            'email' => "admin@gmail.com",
            'password' => Hash::make('admin@gmail.com'),
        ]);
    }
}


