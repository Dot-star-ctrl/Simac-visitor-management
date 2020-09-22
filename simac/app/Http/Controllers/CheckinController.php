<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkin;

class CheckinController extends Controller
{
    public function show(Checkin $checkin){
        return $checkin;
    }
}
