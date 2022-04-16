<?php

namespace App\Repositories\Review;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Repositories\Review\ReviewRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewRepository implements ReviewRepositoryInterface
{
    private Review $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * {@inheritDoc}
     */
    public function getAllReviews(): LengthAwarePaginator
    {
        $reviews = Review::Join('ages', 'reviews.age_id', '=', 'ages.age_id')
            ->Join('shops', 'reviews.shop_id', '=', 'shops.shop_id')
            ->paginate(10);

        return $reviews;
    }

    /**
     * {@inheritDoc}
     */
    public function getReviewsByShop(int $role): LengthAwarePaginator
    {
        $reviews = Review::Join('ages', 'reviews.age_id', '=', 'ages.age_id')
            ->Join('shops', 'reviews.shop_id', '=', 'shops.shop_id')
            ->LeftJoin('users', 'shops.shop_id', '=', 'users.shop_id')
            ->where('users.role', '=', $user->role)
            ->paginate(10);

        return $reviews;
    }

    /**
     * {@inheritDoc}
     */
    public function getReview(int $review_id): Review
    {
        $review = Review::Join('shops', 'reviews.shop_id', '=', 'shops.shop_id')
            ->where('id', $review_id)->first();

        return $review;
    }

    /**
     * {@inheritDoc}
     */
    public function searchReviews(Request $input): LengthAwarePaginator
    {
        $reviews = Review::Join('shops', 'reviews.shop_id', '=', 'shops.shop_id')
            ->Join('ages', 'reviews.age_id', '=', 'ages.age_id')
            ->shopEqual($input->shop_name)
            ->ageEqual($input->age)
            ->genderEqual($input->gender)
            ->createdStartDate($input->created_start_date)
            ->createdEndDate($input->created_end_date)
            ->isSendEmailEqual($input->is_send_email)
            ->keywordEqual($input->keyword)
            ->paginate(10);

        return $reviews;
    }

    /**
     * {@inheritDoc}
     */
    public function create(Review $review, array $input): Void
    {
        $review->fill($input);
        $review->save();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): Void
    {
        $review = Review::where('id', $id)->first();

        $review->delete();          
    }
}
