<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Shop;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Storage;
use App\Services\Review\ReviewService;
use App\Services\Age\AgeService;
use App\Services\Shop\ShopService;
use App\Consts\Consts;

class ReviewController extends Controller
{
    private ReviewService $reviewService;
    private AgeService $ageService;
    private ShopService $shopService;

    private $formItems = [
        "shop_id",
        "name",
        "gender",
        "age_id",
        "email",
        "is_send_email",
        "score",
        "feedback",
        "photo_url"
    ];

    public function __construct(
        ReviewService $reviewService,
        AgeService $ageService,
        ShopService $shopService,
    ) {
        $this->reviewService = $reviewService;
        $this->ageService = $ageService;
        $this->shopService = $shopService;
    }

    public function index(int $shop_id)
    {
        $ages = $this->ageService->getAges();
        $shop = $this->shopService->getShop($shop_id);

        return view('review.index', [
            'ages' => $ages,
            'shop' => $shop,
        ]);
    }

    // 確認ボタンを押した時
    public function post(ReviewRequest $request)
    {
        $request->merge([
            'is_send_email' => $request->boolean('is_send_email') ? 1 : 0,
        ]);

        $file = $request->image;
        // ファイルを一時保存
        if ($file) {
            $this->storeTmpPhoto($file, $request);
        }

        $input = $request->only($this->formItems);

        // sessionへ入力情報を保存
        session("form_input", $input);

        return redirect()->action([ReviewController::class, 'confirm']);
    }

    public function confirm(Request $request)
    {
        $input = session("form_input");
        $this->checkSessionEmpty($input);

        return view("review.confirm", ["input" => $input]);
    }

    // レビュー送信
    public function send(Request $request, Review $review)
    {
        $input = session("form_input");
        $this->checkEnableSendReview($input, $request);

        // レビュー保存
        $this->reviewService->create($review, $input);

        // 写真があれば保存
        $file = session("form_input.photo_url");
        $this->storePhoto($file);

        // sessionを空にする
        $request->session()->forget("form_input");

        return redirect()->action([ReviewController::class, 'complete']);
    }

    // トップページへ戻る
    public function complete()
    {
        return view("review.complete");
    }

    private function checkEnableSendReview(array $input, Request $request)
    {
        $this->checkSessionEmpty($input);

        $shop_id = session("form_input.shop_id");

        // 戻るボタンが押されたとき
        if ($request->has("back")) {
            return redirect()->action([ReviewController::class, 'index'], ['shop_id' => $shop_id])
                ->withInput($input);
        }
    }

    private function checkSessionEmpty(array $input)
    {
        // sessionが空ならお店一覧を表示
        if (!$input) {
            return redirect()->action([ShopController::class, 'index']);
        }
    }

    private function storeTmpPhoto(string $file, ReviewRequest $request)
    {
        $fileUrl = Storage::disk('s3')->putFile('/tmp', $file);
        $url = Storage::disk('s3')->url($fileUrl);
        $photoUrl = str_replace(Consts::S3_URL, '', $url);

        $request->merge([
            'photo_url' => $photoUrl,
        ]);
    }

    private function storePhoto(string $file)
    {
        if ($file) {
            Storage::disk('s3')->move('tmp/'.$file, 'uploads/'.$file);
        }
    }
}
