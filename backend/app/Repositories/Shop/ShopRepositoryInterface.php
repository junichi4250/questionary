<?php

namespace App\Repositories\Shop;

use App\Models\Shop;
use Illuminate\Support\Collection;

interface ShopRepositoryInterface
{
    /**
     * お店一覧を取得
     */
    public function getAllShops(): Collection;

    /**
     * 選択したお店を取得
     */
    public function getShop(int $shop_id): Shop;
}
