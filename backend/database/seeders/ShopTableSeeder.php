<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = [
            ['name' => '和食'],
            ['name' => '洋食'],
            ['name' => '中華'],
        ];
        DB::table('shops')->insert($shops);
    }
}
