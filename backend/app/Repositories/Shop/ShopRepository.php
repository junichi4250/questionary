<?php

namespace App\Repositories\Shop;

use App\Models\Shop;
use Illuminate\Support\Collection;
use App\Repositories\Shop\ShopRepositoryInterface;

class ShopRepository implements ShopRepositoryInterface
{
    private Shop $shop;

    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

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
    public function getShop(int $shop_id): Shop
    {
        $shop = Shop::where('shop_id', $shop_id)->first();

        return $shop;
    }
}
