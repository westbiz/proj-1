<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tx_cities')->insert([
            'country_id'=> 1,
            'parent_id'=> 0,
            'state'=> Str::random(10),
            'name'=> Str::random(10),
            'lower_name'=> Str::random(10),
            'cn_state'=> Str::random(10),
            'cn_name'=> Str::random(10),
            'state_code'=> Str::random(10),
            'city_code'=> Str::random(10),
            'remark'=> Str::random(10),
        ]);
    }
}
