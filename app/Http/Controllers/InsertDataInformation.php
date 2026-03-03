<?php

namespace App\Http\Controllers;

use App\Mail\PartnershipMail;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InsertDataInformation extends Controller
{
    public function submit_partnership_form(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'blk_no' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'subdivision' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'mobile_number' => ['required', 'regex:/^(\+63|0)9\d{9}$/'],
            'landline_number' => 'nullable|string|max:50',
            'business_name' => 'required|string|max:255',
            'business_address' => 'required|string|max:255',
            'business_number' => 'nullable|string|max:50',
            'business_website' => 'nullable|string|max:255',
            'business_email' => 'required|email|max:255',
        ], [
            'mobile_number.regex' => 'Use +639XXXXXXXXX or 09XXXXXXXXX format.',
        ]);

        Mail::to('richmond.baltazar@mcasiafoodtrade.ph')->send(new PartnershipMail($validated));

        Partner::create($validated);

        return back()->with('success', 'Partnership information has been submitted successfully.');
    }
}
