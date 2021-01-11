<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Visitor;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
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
