<?php

namespace App\Repositories\Shop;

use App\Models\Shop;
use Illuminate\Support\Collection;
use App\Repositories\Shop\ShopRepositoryInterface;

class ShopRepository implements ShopRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAllShops(): Collection
    {
        $shops = Shop::all();

        return $shops;
    }

    /**
     * {@inheritDoc}
     */
    public function getShop(int $id): Shop
    {
        $shop = Shop::where('shop_id', $id)->first();

        return $shop;
    }
}
