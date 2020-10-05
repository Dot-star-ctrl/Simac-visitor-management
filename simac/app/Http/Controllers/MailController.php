<?php

namespace App\Http\Controllers;

use App\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function store(Request $request)
    {
        $details = [
            'title' => 'Mail from Simac',
            'body' => 'The request has been sent to the host.',
            'companyName' => 'Company: ' . $request->companyName . '.',
            'departmentName' => 'Department: ' . $request->departmentName . '.',
            'dateTime' => 'Meeting time proposed by you: ' . $request->dateTime . '.'
        ];

        Mail::to($request->email)->send(new Mailer($details));
        return "Email Sent";
    }
}
