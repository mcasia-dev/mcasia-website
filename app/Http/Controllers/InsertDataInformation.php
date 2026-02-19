<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Mail\PartnerShipMail;
use Mail;

class InsertDataInformation extends Controller
{
    
        public function submit_partnership_form(Request $request)
        {
        // VALIDATION
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'blk_no'            => 'nullable|string|max:255',
            'street'            => 'required|string|max:255',
            'barangay'          => 'required|string|max:255',
            'subdivision'       => 'nullable|string|max:255',
            'country'           => 'required|string|max:255',
            'zip_code'          => 'required|string|max:20',
            'mobile_number'     => 'required|string|max:50',
            'landline_number'   => 'nullable|string|max:50',
            'business_name'     => 'nullable|string|max:255',
            'business_address'  => 'nullable|string|max:255',
            'business_number'   => 'nullable|string|max:50',
            'business_website'  => 'nullable|string|max:255',
            'business_email'    => 'nullable|string|max:255',
        ]);




        Mail::to('richmond.baltazar@mcasiafoodtrade.ph')->send(new PartnerShipMail($request));


        // SAVE TO DATABASE
        $partner = Partner::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Partnership info submitted.',
            'data' => $partner
        ]);




        }


}
