<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\AffiliateProgramEmail;
use Illuminate\Support\Facades\Mail;


class AffiliateProgramController extends Controller
{
    public function index()
    {
        return view('frontend.affiliate_program');
    }

    public function contactForm(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'contact_number' => 'required',
                'email' => 'nullable|email',
                'occupation' => 'required',
                'yourself' => 'nullable',
                'why_affiliate' => 'nullable',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->all();
            $data['mail_subject'] = 'New Affiliate Application Received - ' . $request->name;

            $recipients = [
                'reservation@kaziresort.com',
                'sales@kaziresort.com',
                'support@kaziresort.com',
            ];

            Mail::to($recipients)->send(new AffiliateProgramEmail($data));

            return redirect()->back()->with('success', 'Your message has been sent successfully.');
        } else {
            return view('frontend.affiliate_program_contact_form');
        }
    }
}
