<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Customer::create([
            'name' =>'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123456789'),
            ]);

            Customer::create([
            'name' =>'Customer2',
            'email' => 'customer2@gmail.com',
            'password' => Hash::make('123456789'),
            ]);
    }
}
