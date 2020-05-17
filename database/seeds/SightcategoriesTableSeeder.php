<?php

use Illuminate\Database\Seeder;
use App\Models\Sightcategory;

class SightcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sightcategory::truncate();

		$faker = \Faker\Factory::create();

		for ($i=0; $i <10 ; $i++) { 
			Sightcategory::create([
				'name' => $faker->name,
				'parent_id' => 0,
				'path' => 0,
				'remark' => $faker->paragraph,
			]);
		}
    }
}
