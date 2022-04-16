<?php

namespace App\Services\Review;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface ReviewServiceInterface
{
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
     * レビューの検索
     */
    public function searchReviews(Request $input): LengthAwarePaginator;

    /**
     * ユーザーの新規レビューをDBに保存する
     *
     * @param array $input
     * @return void
     */
    public function create(Review $review, array $input): Void;

    /**
     * レビューの削除
     */
    public function delete(int $id): Void;
}
