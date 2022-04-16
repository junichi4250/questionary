<?php

namespace App\Services\Shop;

use App\Models\Shop;
use Illuminate\Support\Collection;

interface ShopServiceInterface
{
    /**
     * お店一覧を取得
     */
    public function getAllShops(): Collection;

    /**
     * 選択したお店を取得
     */
    public function getShop(int $id): Shop;
}
