<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'develop_user',
            'email' => 'my_email@gmail.com',
            'password' => Hash::make('my_secure_password'), // この場合、「my_secure_password」でログインできる
            'remember_token' => Str::random(10),
            'role' => 1,
        ]);
        User::create([
            'name' => 'shop1',
            'email' => 'shop1@example.com',
            'password' => Hash::make('shop1'),
            'remember_token' => Str::random(10),
            'role' => 3,
            'shop_id' => 1,
        ]);
    }
}
