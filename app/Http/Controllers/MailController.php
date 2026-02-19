<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use App\Mail\PartnerShipMail;
use Mail;

class MailController extends Controller
{
    public function sendTestEmail(Request $request)
    {


        $data = $request->only('full_name', 'email', 'phone', 'message');

        Mail::to('richmond.baltazar@mcasiafoodtrade.ph')->send(new TestMail($data));

        return "Email Sent Successfully";


    }






}
