<?php

namespace App\Repositories\Review;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ReviewRepositoryInterface
{
    /**
     * 全てのレビュー情報を取得
     *
     * @return LengthAwarePaginator
     */
    public function getAllReviews(): LengthAwarePaginator;

    /**
     * お店ごとのレビュー情報を取得
     *
     * @return LengthAwarePaginator
     */
    public function getReviewsByShop(int $role): LengthAwarePaginator;

    /**
     * 選択したレビュー情報を取得
     *
     * @param int $id
     * @return Review
     */
    public function getReview(int $id): Review;

    /**
     * レビュー情報を検索
     *
     * @param array $input
     * @return LengthAwarePaginator
     */
    public function searchReviews(Request $input): LengthAwarePaginator;

    /**
     * ユーザーの新規投稿と、投稿のタグをDBに保存
     *
     * @param array $input
     * @return void
     */
    public function create(Review $review, array $input): Void;

    /**
     * レビュー情報の削除
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): Void;
}
