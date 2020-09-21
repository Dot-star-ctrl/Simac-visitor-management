<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;

class VisitorController extends Controller
{
    public function show(Visitor $visitor){
        return $visitor;
    }
}
