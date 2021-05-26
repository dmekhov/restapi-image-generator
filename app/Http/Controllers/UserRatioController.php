<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RatioRequest;

class UserRatioController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(RatioRequest $request, User $user)
    {
        return $user;
    }
}
