<?php

use Illuminate\Database\Seeder;
use App\Models\Sight;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sight = Sight::findOrFail(1);
        $faker = \Faker\Factory::create();

        $image = new Image();
        $image->title = $faker->sentence;
        $image->url = $faker->url;
        $sight->images()->save($image);
    }
}
