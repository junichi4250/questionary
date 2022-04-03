<?php

namespace App\Repositories\Review;

use App\Models\Review;
use App\Repositories\Review\ReviewRepositoryInterface;

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
    public function create(Review $reviewRecord): Review
    {
        $review = $this->review
            ->save($reviewRecord);
        return $review;
    }
}
