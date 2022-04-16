<?php

namespace App\Repositories\Age;

use App\Models\Age;
use Illuminate\Support\Collection;

interface AgeRepositoryInterface
{
    /**
     * 年齢一覧を取得
     */
    public function getAges(): Collection;
}
