<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RatioTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Проверка возвращения среднего значения рейтинга пользователя.
     * Все создаваемые значения = 10, среднее 10.
     */
    public function test_get_user_ratio()
    {
        $user = User::factory()->hasReviews(10, ['ratio' => 10])->create();

        $this->assertEquals(10, $user->ratio());
    }

    /**
     * Проверка возвращения среднего значения рейтинга пользователя.
     * Среднее между 10 и 5 = 7,5. Округляем до 8.
     */
    public function test_get_user_ratio_with_avg_value()
    {
        $user = User::factory()->create();
        $user->reviews()->createMany(
            [
                ['ratio' => 10, 'published' => true],
                ['ratio' => 5, 'published' => true],
            ]
        );

        $this->assertEquals(8, $user->ratio());
    }

    /**
     * Проверка что при отсутствии отзывов пользователя возвращается рейтинг 0.
     * todo уточнить у заказчика корректность такого сценария.
     */
    public function test_get_user_ratio_without_reviews()
    {
        $user = User::factory()->create();

        $this->assertEquals(0, $user->ratio());
    }

    /**
     * Проверка, что при отсутствии опубликованных отзывов возвращается рейтинг 0.
     * todo уточнить у заказчика корректность такого сценария.
     */
    public function test_get_user_ratio_without_published_reviews()
    {
        $user = User::factory()->hasReviews(10, ['published' => false])->create();

        $this->assertEquals(0, $user->ratio());
    }
}
