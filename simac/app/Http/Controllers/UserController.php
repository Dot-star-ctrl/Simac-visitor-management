<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $man = new CreateNewUser();
        $man->create($request->all());
    }
}
