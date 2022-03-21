<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;

class AuthUserProvider extends EloquentUserProvider
{
    public function retrieveById($identifier) {
		$result = $this->createModel()->newQuery()
			->LeftJoin('shops', 'users.shop_id', '=', 'shops.shop_id')
			->select(['users.*', 'shops.shop_name as shop_name'])
			->find($identifier);
		return $result;
	}
}
