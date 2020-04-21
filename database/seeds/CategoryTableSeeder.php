<?php

use Illuminate\Database\Seeder;

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
        DB::table('tx_categories')->insert([
            'name' => Str::random(10),
            'describtion' => Str::random(10).'@gmail.com',
        ]);

    }
}
