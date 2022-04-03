<?php

namespace App\Repositories\Review;

use App\Models\Review;

interface ReviewRepositoryInterface
{
    /**
     * ユーザーの新規投稿と、投稿のタグをDBに保存
     *
     * @param array $review
     * @return void
     */
    public function create(Review $reviewRecord): Review;
}
