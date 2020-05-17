<?php

use Illuminate\Database\Seeder;
use App\Models\Sight;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
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

        // $category = new Category();
        // $category->name = $faker->name;
        // $category->describtion = $faker->paragraph;
        // $category->sights()->save($category);

        for ($i=0; $i <5 ; $i++) { 
            Category::create([
                'parent_id' => 0,
                'name' => $faker->name,
                'description' => $faker->paragraph,
                'active' => mt_rand(0, 1),
            ]);
        }

    }
}
