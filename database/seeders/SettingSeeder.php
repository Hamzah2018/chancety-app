<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['key' => 'current_session', 'value' => '2022-2023'],
            ['key' => 'website_title', 'value' => 'Electronic Shop'],
            ['key' => 'website_name', 'value' => 'International Shop'],
            ['key' => 'Banner', 'value' => 'No Losing Time'],
            ['key' => 'Slogan', 'value' => 'We Bring It at Time'],
            ['key' => 'phone', 'value' => '777344333'],
            ['key' => 'address', 'value' => 'صنعاء'],
            ['key' => 'business_email', 'value' => 'info@sky.com'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];

        DB::table('settings')->insert($data);
    }
}
