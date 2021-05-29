<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Widget;
use App\DTO\WidgetParams;
use App\Http\Requests\RatioRequest;

class UserRatioController extends Controller
{
    public function show(RatioRequest $request, User $user, Widget $widget)
    {
        if (!$user->isActive()) {
            abort(404);
        }

        $ratio = $user->ratio();

        $params = WidgetParams::fromRequest($request);
        $img = $widget->image("$ratio%", $params);

        return $img->response(Widget::EXTENSION);
    }
}
