<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name' =>'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            ]);

            Admin::create([
            'name' =>'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('123456789'),
            ]);

            Admin::create([
            'name' =>'Ad',
            'email' => 'ad@gmail.com',
            'password' => Hash::make('123456789'),
            ]);

    }
}
