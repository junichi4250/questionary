<?php

namespace App\Services\Review;

use App\Models\Review;

interface ReviewServiceInterface
{
    /**
     * ユーザーの新規レビューをDBに保存する
     *
     * @param array $review
     * @return void
     */
    public function create(Review $reviewRecord): Review;
}
