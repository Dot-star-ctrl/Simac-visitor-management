<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;

class HostController extends Controller
{
    public function show(Host $host){
        return $host;
    }
}
