<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Shop;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Review\ReviewRepositoryInterface;
use App\Services\Age\AgeService;

class ReviewController extends Controller
{
    private ReviewRepositoryInterface $reviewRepository;
    private ReviewServiceInterface $reviewService;

    private AgeService $ageService;

    private $formItems = ["shop_id", "name", "gender", "age_id", "email", "is_send_email", "score", "feedback", "photo_url"];

    public function __construct(
        ReviewRepositoryInterface $reviewRepository,
        ReviewServiceInterface $reviewService,
        AgeService $ageService,
    ) {
        $this->reviewRepository = $reviewRepository;
        $this->reviewService = $reviewService;
        $this->ageService = $ageService;
    }

    public function index(int $shop_id) {
        $ages = $this->ageService->getAges();
        $shop = Shop::where('shop_id', $shop_id)->first();
        // $shop = Shop::where('shop_id', $shop_id)->first();
        return view('review.index', [
            'ages' => $ages,
            'shop' => $shop,
        ]);
    }

    // 確認ボタンを押した時
    public function post(ReviewRequest $request) {
        $request->merge([
            'is_send_email' => $request->boolean('is_send_email') ? 1 : 0,
        ]);

        $file = $request->image;
        // ファイルを一時保存
        if ($file) {
            $fileUrl = Storage::disk('s3')->putFile('/tmp', $file);
            $url = Storage::disk('s3')->url($fileUrl);
            $photoUrl = str_replace('https://laravels2bucket.s3.ap-northeast-1.amazonaws.com/tmp/', '', $url);
            $request->merge([
                'photo_url' => $photoUrl,
            ]);
        }
        $input = $request->only($this->formItems);

        $request->session()->put("form_input", $input);

        return redirect()->action([ReviewController::class, 'confirm']);
    }

    public function confirm(Request $request) {
        $input = $request->session()->get("form_input");

        // sessionが空ならお店一覧を表示
        if (!$input) {
            return redirect()->action([ShopController::class, 'index']);
        }

        return view("review.confirm", ["input" => $input]);
    }

    // レビュー送信
    public function send(Request $request, Review $review) {
        $input = $request->session()->get("form_input");
        $shop_id = $request->session()->get("form_input.shop_id");
        $file = $request->session()->get("form_input.photo_url");

        // 戻るボタンが押されたとき
        if ($request->has("back")) {
            return redirect()->action([ReviewController::class, 'index'], ['shop_id' => $shop_id])
                ->withInput($input);
        }

        // sessionが空ならお店一覧を表示
        if (!$input) {
            return redirect()->action([ShopController::class, 'index']);
        }

        $review->fill($input);
        $review->save();

        // 画像があれば保存
        if ($file) {
            Storage::disk('s3')->move('tmp/'.$file, 'uploads/'.$file);
        }

        $request->session()->forget("form_input");

        return redirect()->action([ReviewController::class, 'complete']);
    }

    // トップページへ戻る
    public function complete() {
        return view("review.complete");
    }
}
