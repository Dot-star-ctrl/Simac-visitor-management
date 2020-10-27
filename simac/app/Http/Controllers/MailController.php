<?php

namespace App\Http\Controllers;

use App\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function store(Request $request)
    {
        if($request->note == ''){
            $request->note = 'No meeting purpose provided';
        }

        $details = [
            'title' => 'Mail from Simac',
            'body' => 'The request has been sent to the host.',
            'companyName' => 'Company: ' . $request->companyName . '.',
            'departmentName' => 'Department: ' . $request->departmentName . '.',
            'note' => 'Purpose of meeting: '. $request->note . '.',
            'proposed_start_dateTime' => 'Meeting start time: ' . $request->proposed_start_dateTime . '.',
            'proposed_end_dateTime' => 'Meeting end time: ' . $request->proposed_end_dateTime . '.'
        ];

        Mail::to($request->email)->send(new Mailer($details));
        return "Email Sent";
    }
}
