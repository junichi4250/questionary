<?php

namespace App\Services\Age;

use App\Models\Age;
use Illuminate\Support\Collection;
use App\Repositories\Age\AgeRepositoryInterface;
use App\Services\Age\AgeServiceInterface;

class AgeService implements AgeServiceInterface
{
    private AgeRepositoryInterface $ageRepository;

    public function __construct(AgeRepositoryInterface $ageRepository)
    {
        $this->ageRepository = $ageRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function getAges(): Collection
    {
        $ages = $this->ageRepository->getAges();

        return $ages;
    }
}
