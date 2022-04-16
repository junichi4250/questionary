<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Collection;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function getLoginUser(): User
    {
        $user = $this->userRepository->getLoginUser();

        return $user;
    }
}
