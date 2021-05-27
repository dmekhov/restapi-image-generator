<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Ratio;
use App\DTO\RatioConfig;
use App\Http\Requests\RatioRequest;

class UserRatioController extends Controller
{
    public function show(RatioRequest $request, User $user, Ratio $ratio)
    {
        $params = RatioConfig::fromRequest($request);
        $img = $ratio->image('69%', $params); // todo передавать рейтинг пользователя

        return $img->response(Ratio::EXTENSION);
    }
}
