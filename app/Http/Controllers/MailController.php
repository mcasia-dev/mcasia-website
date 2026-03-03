<?php
namespace App\Http\Controllers;

use App\Http\Requests\PartnershipRequest;
use App\Http\Requests\ReachUsRequest;
use App\Mail\PartnershipMail;
use App\Mail\ReachUsMail;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendReachUs(ReachUsRequest $request): RedirectResponse
    {

        $fullName = trim(implode(' ', array_filter([
            $request->first_name ?? '',
            $request->middle_name ?? '',
            $request->last_name ?? '',
        ])));

        $data = [
            'full_name' => $fullName,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'message'   => $request->message,
        ];

        Mail::to(config('mail.contact.reach_us'))->send(new ReachUsMail($data));

        return back()->with('success', 'Your concern has been sent successfully.');
    }

    public function sendPartnership(PartnershipRequest $request)
    {
        $data = [
            'name'             => $request->name,
            'blk_no'           => $request->blk_no,
            'street'           => $request->street,
            'barangay'         => $request->barangay,
            'subdivision'      => $request->subdivision,
            'country'          => $request->country,
            'zip_code'         => $request->zip_code,
            'mobile_number'    => $request->mobile_number,
            'landline_number'  => $request->landline_number,
            'business_name'    => $request->business_name,
            'business_address' => $request->business_address,
            'business_number'  => $request->business_number,
            'business_website' => $request->business_website,
            'business_email'   => $request->business_email,
        ];
        try {
            Mail::to(config('mail.contact.partnership'))->send(new PartnershipMail($data));

        } catch (Exception $e) {
            return back()->with('error', 'There was an error sending your request. Please try again later.');

        }

        return back()->with('success', 'Your request has been sent successfully.');
    }
}
