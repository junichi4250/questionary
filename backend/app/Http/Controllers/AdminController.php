<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\Review\ReviewService;
use App\Services\User\UserService;

class AdminController extends Controller
{
    private ReviewService $reviewService;

    public function __construct(
        ReviewService $reviewService,
        UserService $userService,
    ) {
        $this->reviewService = $reviewService;
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->getLoginUser();

        // ログインユーザーの権限
        if ($user->role == 1) {
            $reviews = $this->reviewService->getAllReviews();
        } else {
            $reviews = $this->reviewService->getReviewsByShop($user->role);
        }

        return view('admin.index', [
            'reviews' => $reviews,
            'user' => $user,
        ]);
    }

    public function search(Request $request)
    {
        // リセットボタンが押されたとき
        if ($request->has("reset")) {
            return redirect()->action([AdminController::class, 'index']);
        }

        // 検索処理
        if (!empty($request)) {
            $reviews = $this->reviewService->searchReviews($request);
        }

        $user = $this->userService->getLoginUser();
        
        return view('admin.index', [
            'reviews' => $reviews,
            'request' => $request,
            'user' => $user,
        ]);
    }

    public function show(int $id)
    {
        $review = $this->reviewService->getReview($id);

        return view('admin.show', [
            'review' => $review,
        ]);
    }

    public function delete(Request $request, int $id)
    {
        // 一覧に戻るボタンが押されたとき
        if ($request->has("back")) {
            return redirect()->action([AdminController::class, 'index']);
        }

        $this->reviewService->delete($id);

        return redirect()->action([AdminController::class, 'index']);
    }

}
