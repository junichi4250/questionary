<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class AdminController extends Controller
{
    public function index() {
        $reviews = Review::Join('ages', 'reviews.age_id', '=', 'ages.age_id')
        ->Join('shops', 'reviews.shop_id', '=', 'shops.shop_id')
        ->select('*')
        ->get();

        return view('admin.index', [
            'reviews' => $reviews,
        ]);
    }

    public function search(Request $request) {
        // リクエスト情報
        $shop = $request->shop;
        $age = $request->age;
        $gender = $request->gender;
        $created_start_date = $request->created_start_date;
        $created_end_date = $request->created_end_date;
        $is_send_email = $request->is_send_email;
        $keyword = $request->keyword;

        if(!empty($shop) | !empty($age) | !empty($gender) | !empty($created_start_date) | !empty($created_end_date) | !empty($is_send_email) | !empty($keyword)) {
            // $reviews = review::shopE
        }
        $reviews = Review::Join('ages', 'reviews.age_id', '=', 'ages.age_id')
        ->select('*')
        ->get();
        
        return view('admin.index', [
            'reviews' => $reviews,
        ]);
    }

    public function show(int $id) {

        $review = Review::Join('shops', 'reviews.shop_id', '=', 'shops.shop_id')
        ->where('id', $id)->first();

        return view('admin.show', [
            'review' => $review,
        ]);
    }

    public function delete(Request $request, int $id) {
        // 一覧に戻るボタンが押されたとき
        if ($request->has("back")) {
            return redirect()->action([AdminController::class, 'index']);
        }

        return DB::transaction(function () use ($id) {
            $review = Review::where('id', $id)->first();
            $result = $review->delete();

            return redirect()->action([AdminController::class, 'index']);
        });
    }

}
