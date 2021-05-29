<?php

namespace App\DTO;

use Illuminate\Http\Request;

class WidgetParams
{
    public function __construct(
        private int $width,
        private int $height,
        private string $background,
        private string $color,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self($request->width, $request->height, $request->background, $request->color);
    }

    public function width(): int
    {
        return $this->width;
    }

    public function height(): int
    {
        return $this->height;
    }

    public function background(): string
    {
        return "#$this->background";
    }

    public function color(): string
    {
        return "#$this->color";
    }
}
