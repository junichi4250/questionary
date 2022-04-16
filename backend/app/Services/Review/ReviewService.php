<?php

namespace App\Services\Review;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;
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
    public function searchReviews(Request $input): LengthAwarePaginator
    {
        $reviews = $this->reviewRepository->searchReviews($input);

        return $reviews;
    }

    /**
     * {@inheritDoc}
     */
    public function create(Review $review, array $input): Void
    {
        $review = $this->reviewRepository->create($review, $input);
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): Void
    {
        $review = $this->reviewRepository->delete($id);
    }
}
