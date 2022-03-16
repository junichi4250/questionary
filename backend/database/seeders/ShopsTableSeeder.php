<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = [
            ['shop_name' => '和食'],
            ['shop_name' => '洋食'],
            ['shop_name' => '中華'],
        ];
        DB::table('shops')->insert($shops);
    }
}
