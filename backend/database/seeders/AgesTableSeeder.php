<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ages = [
            ['age' => '10代以下'],
            ['age' => '20代'],
            ['age' => '30代'],
            ['age' => '40代'],
            ['age' => '50代'],
            ['age' => '60代以上'],
        ];
        DB::table('ages')->insert($ages);
    }
}
