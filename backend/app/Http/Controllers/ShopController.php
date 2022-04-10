<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index() {
        $shops = Shop::all();
        return view('shop.index', [
            'shops' => $shops
        ]);
    }

    public function show(int $id) {
        $shop = Shop::where('shop_id', $id)->first();
        return view('shop.show', [
            'shop' => $shop
        ]);
    }
}
