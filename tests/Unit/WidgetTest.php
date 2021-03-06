<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\Widget;
use App\DTO\WidgetParams;
use Illuminate\Http\Request;

class WidgetTest extends TestCase
{

    /**
     * Проверка создания изображения с заданными размерами.
     */
    public function test_make_image()
    {
        $width = 110;
        $height = 101;

        $ratio = new Widget();
        $config = new WidgetParams($width, $height, '000', 'fff');

        $img = $ratio->image('text', $config);

        $this->assertEquals($width, $img->getWidth());
        $this->assertEquals($height, $img->getHeight());
    }

    /**
     * Проверка создания объекта конфигурации из Request.
     */
    public function test_make_config()
    {
        $width = 110;
        $height = 101;
        $background = '000';
        $color = 'fff';

        $request = new Request(compact('width', 'height', 'background', 'color'));

        $config = WidgetParams::fromRequest($request);

        $this->assertEquals($width, $config->width());
        $this->assertEquals($height, $config->height());
        $this->assertEquals("#$background", $config->background());
        $this->assertEquals("#$color", $config->color());
    }
}
