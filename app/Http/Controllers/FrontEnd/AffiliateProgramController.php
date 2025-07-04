<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\AffiliateProgramEmail;
use App\Mail\AffiliateApplicationThankYou; // New Mailable
use App\Models\AffiliateSystem\Affiliate; // New Affiliate Model
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str; // For potential future use (e.g. generating initial code)


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

            // Save to affiliates table
            $affiliate = Affiliate::create([
                'name' => $request->name,
                'mobile' => $request->contact_number,
                'email' => $request->email,
                'occupation' => $request->occupation,
                'about_me' => $request->yourself,
                'why_join' => $request->why_affiliate,
                'status' => 'pending',
            ]);

            // Prepare data for admin email
            $adminEmailData = $data; // Use original request data for admin email
            $adminEmailData['mail_subject'] = 'New Affiliate Application Received - ' . $request->name;

            $recipients = [
                'reservation@kaziresort.com',
                'sales@kaziresort.com',
                'support@kaziresort.com',
            ];

            // Send email to admin
            Mail::to($recipients)->send(new AffiliateProgramEmail($adminEmailData));

            // Send thank you email to applicant
            if ($affiliate->email) {
                Mail::to($affiliate->email)->send(new AffiliateApplicationThankYou($affiliate));
            }

            return redirect()->back()->with('success', 'Thank you for applying! We will review your application and get back to you shortly.');
        } else {
            return view('frontend.affiliate_program_contact_form');
        }
    }
}
