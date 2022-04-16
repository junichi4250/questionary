<?php

namespace App\Services\Review;

use App\Models\Review;
use Illuminate\Pagination\LengthAwarePaginator;

interface ReviewServiceInterface
{
    /**
     * ユーザーの新規レビューをDBに保存する
     *
     * @param array $review
     * @return void
     */
    public function create(Review $reviewRecord): Review;

    /**
     * 全てのレビュー情報を取得
     */
    public function getAllReviews(): LengthAwarePaginator;

    /**
     * お店ごとのレビュー情報を取得
     */
    public function getReviewsByShop(int $role): LengthAwarePaginator;

    /**
     * 選択されたレビュー情報を取得
     */
    public function getReview(int $id): Review;

    /**
     * レビューの削除
     */
    public function delete(int $id): Void;
}
