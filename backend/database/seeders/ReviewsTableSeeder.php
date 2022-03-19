<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            Review::create([
                'shop_id' => 1,
                'name' => 'テスト'.$i,
                'gender' => 1,
                'age_id' => 2,
                'email' => 'jj@jj.jj',
                'is_send_email' => 1,
                'score' => '3',
                'feedback' => 'テキストテキストテキストテキスト',
            ]);
        }
    }
}
