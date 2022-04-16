<?php

namespace App\Repositories\Age;

use App\Models\Age;
use Illuminate\Support\Collection;
use App\Repositories\Age\AgeRepositoryInterface;

class AgeRepository implements AgeRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAges(): Collection
    {
        $ages = Age::all();

        return $ages;
    }
}
