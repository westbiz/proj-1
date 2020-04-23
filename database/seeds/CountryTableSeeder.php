<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tx_countries')->insert([
            'continent_id'=> 1,
            'name'=> Str::random(10),
            'lower_name'=> Str::random(10),
            'country_code'=> Str::random(10),
            'full_name'=> Str::random(10),
            'cname'=> Str::random(10),
            'full_cname'=> Str::random(10),
            'remark'=> Str::random(10),
        ]);
    }
}
