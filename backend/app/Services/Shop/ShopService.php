<?php

namespace App\Services\Shop;

use App\Models\Shop;
use Illuminate\Support\Collection;
use App\Repositories\Shop\ShopRepositoryInterface;
use App\Services\Shop\ShopServiceInterface;

class ShopService implements ShopServiceInterface
{
    private ShopRepositoryInterface $shopRepository;

    public function __construct(ShopRepositoryInterface $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function getAllShops(): Collection
    {
        $shops = $this->shopRepository->getAllShops();

        return $shops;
    }

    /**
     * {@inheritDoc}
     */
    public function getShop(int $shop_id): Shop
    {
        $shop = $this->shopRepository->getShop($shop_id);

        return $shop;
    }
}
