<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $reviews = Review::Join('ages', 'reviews.age_id', '=', 'ages.age_id')
        ->Join('shops', 'reviews.shop_id', '=', 'shops.shop_id')
        ->paginate(10);

        return view('admin.index', [
            'reviews' => $reviews,
        ]);
    }

    public function search(Request $request) {
        // リセットボタンが押されたとき
        if ($request->has("reset")) {
            return redirect()->action([AdminController::class, 'index']);
        }

        // リクエスト情報
        $shop_name = $request->shop_name;
        $age = $request->age;
        $gender = $request->gender;
        $created_start_date = $request->created_start_date;
        $created_end_date = $request->created_end_date;
        $is_send_email = $request->is_send_email;
        $keyword = $request->keyword;

        if(!empty($shop_name) | !empty($age) | !empty($gender) | !empty($created_start_date) | !empty($created_end_date) | !empty($is_send_email) | !empty($keyword)) {
            $reviews = Review::Join('shops', 'reviews.shop_id', '=', 'shops.shop_id')
            ->Join('ages', 'reviews.age_id', '=', 'ages.age_id')
            ->shopEqual($shop_name)
            ->ageEqual($age)
            ->genderEqual($gender)
            ->createdStartDate($created_start_date)
            ->createdEndDate($created_end_date)
            ->isSendEmailEqual($is_send_email)
            ->keywordEqual($keyword)
            ->paginate(10);
        }
        
        return view('admin.index', [
            'reviews' => $reviews,
            'request' => $request,
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
