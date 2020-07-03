<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Brand::truncate();
        
		$faker = \Faker\Factory::create();

		// 工厂模式批量插入
		for ($i=0; $i <5 ; $i++) { 
			Brand::create([
				'cname' => $faker->name, 
				'ename' => $faker->name,
				'symbol' => $faker->name,
				'describtion' => $faker->paragraph,
				'active' => 1,
			]);
		}


    }
}
