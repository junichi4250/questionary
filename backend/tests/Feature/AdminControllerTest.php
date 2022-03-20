<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testGuestLogin()
    {
        $response = $this->get(route('admin.index'));

        $response->assertRedirect(route('login'));
    }

    public function testAuthLogin()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)
            ->get(route('admin.index'));

        $response->assertStatus(200);
    }
}
