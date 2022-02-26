<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Shop;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    private $formItems = ["shop_id", "name", "gender", "age_id", "email", "is_send_email", "score", "feedback"];

    public function index(int $shop_id) {
        $ages = Age::all();
        $shop = Shop::where('shop_id', $shop_id)->first();
        return view('review.index', [
            'ages' => $ages,
            'shop' => $shop,
        ]);
    }

    public function post(ReviewRequest $request) {
        $request->merge([
            'is_send_email' => $request->boolean('is_send_email') ? 1 : 0,
        ]);

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
    public function send(Request $request, review $review) {
        $input = $request->session()->get("form_input");
        $shop_id = $request->session()->get("form_input.shop_id");

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

        $request->session()->forget("form_input");

        return redirect()->action([ReviewController::class, 'complete']);
    }

    // トップページへ戻る
    public function complete() {
        return view("review.complete");
    }
}
