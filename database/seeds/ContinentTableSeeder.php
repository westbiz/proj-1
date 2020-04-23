<?php

use Illuminate\Database\Seeder;

class ContinentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tx_continents')->insert([
            'parent_id'=>0,
            'cn_name' => Str::random(10),
            'en_name' => Str::random(10).'@gmail.com',
        ]);
    }
}
