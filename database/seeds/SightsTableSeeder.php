<?php

use Illuminate\Database\Seeder;
use App\Models\Sight;
use App\Models\Type;

class SightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		Sight::truncate();
        // $cateory = Category::findOrFail(1);
		$faker = \Faker\Factory::create();

        // $sight = new sight();

		// $sight->parent_id = 0;
		// $sight->city_id = 1;
		// $sight->cn_name = $faker->name;
		// $sight->en_name = $faker->name;
		// $sight->full_cname = $faker->sentence;
		// $sight->phone = $faker->phoneNumber;
		// $sight->address = $faker->address;
		// $sight->zipcode = $faker->postcode;
        // $sight->describtion = $faker->paragraph;
		// $sight->active = 1;
		// $sight->category()->save($sight);

		// 工厂模式批量插入
		for ($i=0; $i <10 ; $i++) { 
			$type = Type::findOrFail(1);
			Sight::create([
				'type_id' => $type->id,
				'parent_id' => 0,
				'city_id' => 1,
				'cn_name' => $faker->name,
				'en_name' => $faker->name,
				'full_cname' => $faker->sentence(5, true),
				'phone' => $faker->phoneNumber,
				'address' => $faker->address,
				'zipcode' => $faker->postcode,
				'description' => $faker->paragraph,
				'active' => 1,
			]);
		}
    }
}
