<?php

namespace Tests\Feature;

use App\Services\Widget;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRatioTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Проверка возвращаемого изображения.
     */
    public function test_get_user_ratio()
    {
        $user = User::factory()->create();

        $response = $this->getJson(route('user.ratio', [
            'user' => $user->hash,
            'width' => 110,
            'height' => 101,
            'background' => '000',
            'color' => 'fff',
        ]));

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'image/' . Widget::EXTENSION);
    }

    /**
     * Проверка возвращения ошибки валидации при обращении без необходимых параметров.
     */
    public function test_validation_get_user_ratio()
    {
        $user = User::factory()->create();

        $response = $this->getJson(route('user.ratio', [
            'user' => $user->hash,
        ]));

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors' => ['width', 'height', 'background', 'color']]);
    }

    /**
     * Проверка возвращения ошибки 404, при запросе за не активным пользователем.
     */
    public function test_404_error_with_inactive_user_on_get_user_ratio()
    {
        $user = User::factory()->create(['status' => User::STATUS_INACTIVE]);

        $response = $this->getJson(route('user.ratio', [
            'user' => $user->hash,
            'width' => 110,
            'height' => 101,
            'background' => '000',
            'color' => 'fff',
        ]));

        $response->assertStatus(404);
    }

    /**
     * Проверка возвращения ошибки 404, при запросе за не существующим пользователем.
     */
    public function test_404_error_with_wrong_user_on_get_user_ratio()
    {
        $response = $this->getJson(route('user.ratio', [
            'user' => '000',
        ]));

        $response->assertStatus(404);
    }
}
