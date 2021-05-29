<?php

namespace App\Services;

use App\DTO\WidgetParams;
use Intervention\Image\Image;
use Intervention\Image\Facades\Image as ImageLibrary;

class Widget
{
    public const EXTENSION = 'gif';
    private const FONT_PATH =  'fonts/OpenSans-Regular.ttf';

    public function image($text, WidgetParams $params): Image
    {
        $img = ImageLibrary::canvas($params->width(), $params->height(), $params->background());
        $img->text($text, $params->width() / 2, $params->height() / 2, function ($font) use ($params) {
            $font->file(resource_path(self::FONT_PATH));
            $font->size($params->width() / 3);
            $font->color($params->color());
            $font->align('center');
            $font->valign('center');
        });

        return $img;
    }
}
