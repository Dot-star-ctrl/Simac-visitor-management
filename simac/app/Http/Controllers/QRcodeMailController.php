<?php

namespace App\Http\Controllers;

use App\Mail\QRcodeMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QRcodeMailController extends Controller
{
    public function store(Request $request)
    {
        $details = [
            'title' => 'Mail from Simac',
            'body' => 'Your QR code is generated.',
            'qr_code_id' => $request->QRcodeId . '.',
        ];

        Mail::to($request->email)->send(new QRcodeMailer($details));
        return "Email Sent";
    }
}
