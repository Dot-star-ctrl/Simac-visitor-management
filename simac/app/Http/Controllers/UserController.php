<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;

class UserController extends Controller
{
    public function store(Request $request)
    {
        error_log($request);
        $request -> validate([
            'email'       => 'required',
            'password'    => 'required',
        ]);

        $user = User::create($request ->all());

        return new GeneralResource($user);
    }
}
