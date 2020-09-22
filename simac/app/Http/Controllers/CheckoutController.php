<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;

class CheckoutController extends Controller
{
    public function show(Checkout $checkout){
        return $checkout;
    }
}
