<?php

namespace App\Services\Review;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Repositories\Review\ReviewRepositoryInterface;
use App\Services\Review\ReviewServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewService implements ReviewServiceInterface
{
    private ReviewRepositoryInterface $reviewRepository;

    public function __construct(
        ReviewRepositoryInterface $reviewRepository
    ) {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function create(Review $reviewRecord): Review
    {
        $review = $this->reviewRepository->create($reviewRecord);

        return $review;
    }

    /**
     * {@inheritDoc}
     */
    public function getAllReviews(): LengthAwarePaginator
    {
        $reviews = $this->reviewRepository->getAllReviews();

        return $reviews;
    }

    /**
     * {@inheritDoc}
     */
    public function getReviewsByShop(int $role): LengthAwarePaginator
    {
        $reviews = $this->reviewRepository->getReviewsByShop($role);

        return $reviews;
    }

    /**
     * {@inheritDoc}
     */
    public function getReview(int $id): Review
    {
        $review = $this->reviewRepository->getReview($id);

        return $review;
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): Void
    {
        $review = $this->reviewRepository->delete($id);
    }
}
