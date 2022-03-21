<?php

namespace Database\Seeders;

use App\Models\Age;
use App\Models\Shop;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Review::truncate();
        // Age::truncate();
        // Shop::truncate();

        $this->call([
            AgesTableSeeder::class,
            ShopsTableSeeder::class,
            ReviewsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
