<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Services\Shop\ShopService;

class ShopController extends Controller
{

    private ShopService $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
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

        return view('shop.show', [
            'shop' => $shop
        ]);
    }
}
