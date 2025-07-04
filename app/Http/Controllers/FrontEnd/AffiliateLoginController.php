<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AffiliateSystem\Affiliate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log; // For logging OTP if SMS gateway isn't real
use Illuminate\Support\Str;

class AffiliateLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.affiliate.login');
    }

    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|numeric|digits_between:10,15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mobile = $request->input('mobile');

        // Find an approved affiliate by their mobile number
        // This assumes the affiliate's mobile is stored in the 'mobile' column of the 'affiliates' table.
        $affiliate = Affiliate::where('mobile', $mobile)->where('status', 'approved')->first();

        if (!$affiliate || !$affiliate->user_id) {
             // Also check if a user exists with this contact_number and has an affiliate profile
            $user = User::where('contact_number', $mobile)->first();
            if ($user) {
                $affiliate = Affiliate::where('user_id', $user->id)->where('status', 'approved')->first();
            }
        }


        if (!$affiliate) {
            return redirect()->back()->with('error', 'No approved affiliate account found for this mobile number or not linked to a user.')->withInput();
        }

        if (!$affiliate->user_id) {
             return redirect()->back()->with('error', 'Affiliate account is not properly linked to a user for login. Please contact support.')->withInput();
        }


        $otp = Str::random(6); // Generate a 6-digit OTP
        if (config('app.env') !== 'production' || true) { // TODO: Remove '|| true' for production
             $otp = '123456'; // Fixed OTP for non-production environments or testing
        }


        // Store OTP in cache for 5 minutes
        Cache::put('otp_for_' . $mobile, $otp, now()->addMinutes(5));
        $request->session()->put('otp_mobile', $mobile); // Store mobile in session to verify against

        // TODO: Implement actual SMS sending here
        // For now, we'll log it or show it in a flash message for testing
        Log::info("OTP for affiliate login (mobile: {$mobile}): {$otp}");
        session()->flash('info', 'An OTP has been sent to your mobile (For testing, OTP is: ' . $otp . ')');


        return redirect()->route('affiliate.otp.form');
    }

    public function showOtpForm(Request $request)
    {
        if (!$request->session()->has('otp_mobile')) {
            return redirect()->route('affiliate.login.form')->with('error', 'Please enter your mobile number first.');
        }
        $mobile = $request->session()->get('otp_mobile');
        return view('frontend.affiliate.verify_otp', ['mobile' => $mobile]);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|numeric',
            'otp' => 'required|numeric|digits:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mobile = $request->input('mobile');
        $otp = $request->input('otp');
        $sessionMobile = $request->session()->get('otp_mobile');

        if ($mobile != $sessionMobile) {
            return redirect()->back()->with('error', 'Mobile number mismatch. Please try again.')->withInput();
        }

        $cachedOtp = Cache::get('otp_for_' . $mobile);

        if (!$cachedOtp) {
            return redirect()->back()->with('error', 'OTP has expired. Please request a new one.')->withInput();
        }

        if ($cachedOtp != $otp) {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.')->withInput();
        }

        // OTP is correct, find the affiliate and log them in
        $affiliate = Affiliate::where('mobile', $mobile)->where('status', 'approved')->first();

        if (!$affiliate && $sessionMobile) { // Fallback check if mobile was primary identifier
            $user = User::where('contact_number', $sessionMobile)->first();
            if ($user) {
                 $affiliate = Affiliate::where('user_id', $user->id)->where('status', 'approved')->first();
            }
        }


        if (!$affiliate || !$affiliate->user) {
            return redirect()->route('affiliate.login.form')->with('error', 'Could not find an approved and linked affiliate account.');
        }

        Auth::guard('web')->login($affiliate->user); // Log in the associated User

        // Clear OTP data
        Cache::forget('otp_for_' . $mobile);
        $request->session()->forget('otp_mobile');
        $request->session()->regenerate();

        // Redirect to affiliate dashboard (to be created)
        return redirect()->route('affiliate.dashboard')->with('success', 'Logged in successfully!');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('affiliate.login.form')->with('success', 'You have been logged out.');
    }
}
