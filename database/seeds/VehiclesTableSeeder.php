<?php

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Vehicle::truncate();
        
		$faker = \Faker\Factory::create();

		// 工厂模式批量插入
		for ($i=0; $i <5 ; $i++) { 
			Vehicle::create([
				'name' => $faker->name, 
				'symbol' => $faker->name,
				'remark' => $faker->sentence,
				'active' => 0,
			]);
		}
    }
}
