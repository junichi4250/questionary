<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * ログインユーザーを取得
     */
    public function getLoginUser(): User;
}
