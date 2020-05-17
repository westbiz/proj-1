<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        Type::create([
	        'name' => $faker->name,
	        'parent_id' => 0,
	        'description' => $faker->paragraph,
        ]);

    }
}
