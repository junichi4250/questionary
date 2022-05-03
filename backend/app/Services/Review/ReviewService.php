<?php

namespace App\Services\Review;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Repositories\Review\ReviewRepositoryInterface;
use App\Services\Review\ReviewServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use App\Consts\Consts;

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
        $review->fill($input);
        $review->save();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): Void
    {
        $review = $this->reviewRepository->delete($id);
    }

    /**
     * {@inheritDoc}
     */
    public function handleTmpUploadImage(string $file, ReviewRequest $request): Void
    {
        $fileUrl = Storage::disk('s3')->putFile('/tmp', $file);
        $url = Storage::disk('s3')->url($fileUrl);
        $photoUrl = str_replace(Consts::S3_URL, '', $url);

        $request->merge([
            'photo_url' => $photoUrl,
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function handleUploadImage(string $file): Void
    {
        Storage::disk('s3')->move('tmp/'.$file, 'uploads/'.$file);
    }
}
