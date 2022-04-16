<?php

namespace App\Services\Age;

use App\Models\Age;
use Illuminate\Support\Collection;

interface AgeServiceInterface
{
    /**
     * 年齢一覧を取得
     */
    public function getAges(): Collection;
}
