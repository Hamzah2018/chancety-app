<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
              //
              User::create([
                'name' =>'User',
                'fname' =>'المستخدم ',
                'lname' =>'الاول',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456789'),
                ]);

                User::create([
                'name' =>'User2',
                'fname' =>'المستخدم ',
                'lname' =>'الثاني',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('123456789'),
                ]);
                User::create([
                'name' =>'us',
                'fname' =>'المستخدم ',
                'lname' =>'الثالث',
                'email' => 'us@gmail.com',
                'password' => Hash::make('123456789'),
                ]);
    }
}
