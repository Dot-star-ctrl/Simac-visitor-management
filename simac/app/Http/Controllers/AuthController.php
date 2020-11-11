<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return $user;
    }
}
