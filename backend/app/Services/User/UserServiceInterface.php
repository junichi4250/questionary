<?php

namespace App\Services\User;

use App\Models\User;

interface UserServiceInterface
{
    /**
     * ログインユーザーを取得
     */
    public function getLoginUser(): User;
}
