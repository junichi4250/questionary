<?php

namespace App\Services\Review;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Repositories\Review\ReviewRepositoryInterface;
use App\Services\Review\ReviewServiceInterface;

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
}
