<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRatioTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_user_ratio()
    {
        $user = User::factory()->create();

        $response = $this->getJson(route('user.ratio', [
            'user' => $user->hash,
        ]));

        $response->assertStatus(200);
    }
}
