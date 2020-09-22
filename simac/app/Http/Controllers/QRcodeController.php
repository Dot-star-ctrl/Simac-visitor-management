<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QRcode;

class QRcodeController extends Controller
{
    public function show(QRcode $qrCode){
        return $qrCode;
    }
}
