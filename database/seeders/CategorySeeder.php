<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
                'name' =>' هاتف ذكيه',
                'description' => 'ليدن جميع الانواع',
                'active' => 1,
            ]);

        Category::create([
                'name' =>'أجهزه اللكترونيه',
                'description' => 'جميع انواع الاجهزه',
                'active' => 1,
            ]);

            Category::create([
                'name' =>'ملابس ',
                'description' => ' افضل انواع الملابس',
                'active' => 1,
                ]);

            Category::create([
                'name' =>'ادوات منزليه',
                'description' => 'جميع انوع الملابس',
                'active' => 1,
            ]);
    }
}
