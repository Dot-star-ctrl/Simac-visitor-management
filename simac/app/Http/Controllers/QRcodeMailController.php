<?php

namespace App\Http\Controllers;

use App\Mail\QRcodeMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QRcodeMailController extends Controller
{
    public function store(Request $request)
    {
        if($request->message == ''){
            $request->message = 'No meeting purpose provided';
        }

        $details = [
            'title' => 'Mail from Simac',
            'body' => 'Meeting invitation.',
            'message' => 'Purpose of meeting: '. $request->message.'.',
            'dateTime' => 'Meeting start time: ' . $request->dateTime . '.',
            'qr_code_id' => $request->QRcodeId,
            'schedule_id' => $request->schedule_id,
        ];

        Mail::to($request->email)->send(new QRcodeMailer($details));
        return "Email Sent";
    }
}
