<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Services\Shop\ShopService;
use App\Services\Review\ReviewService;

class ShopController extends Controller
{

    private ShopService $shopService;

    public function __construct(
        ShopService $shopService,
        ReviewService $reviewService,
    ) {
        $this->shopService = $shopService;
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        $shops = $this->shopService->getAllShops();

        return view('shop.index', [
            'shops' => $shops
        ]);
    }

    public function show(int $id)
    {
        $shop = $this->shopService->getShop($id);

        $reviews = $this->reviewService->getReviewsByShop($id);

        return view('shop.show', [
            'shop' => $shop,
            'reviews' => $reviews
        ]);
    }
}
