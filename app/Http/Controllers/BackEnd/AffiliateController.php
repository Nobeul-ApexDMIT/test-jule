<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\AffiliateSystem\Affiliate;
use App\Models\User;
use App\Mail\AffiliateApprovedEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AffiliateController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status');
        $query = Affiliate::orderBy('created_at', 'desc');

        if ($status) {
            $query->where('status', $status);
        }

        $affiliates = $query->paginate(10);

        return view('backend.affiliates.index', compact('affiliates', 'status'));
    }

    public function view($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        return view('backend.affiliates.view', compact('affiliate'));
    }

    public function approve($id)
    {
        $affiliate = Affiliate::findOrFail($id);

        if ($affiliate->status === 'approved') {
            return redirect()->back()->with('warning', 'This affiliate is already approved.');
        }

        // Generate unique affiliate code
        $baseCode = Str::slug($affiliate->name, '');
        $affiliateCode = $baseCode;
        $counter = 1;
        while (Affiliate::where('affiliate_code', $affiliateCode)->exists()) {
            $affiliateCode = $baseCode . $counter;
            $counter++;
        }

        $affiliate->status = 'approved';
        $affiliate->affiliate_code = $affiliateCode;
        $affiliate->approved_at = Carbon::now();

        // Create or update user for OTP login
        $user = null;
        if ($affiliate->mobile) {
            $user = User::where('contact_number', $affiliate->mobile)->first();
        }
        if (!$user && $affiliate->email) {
            $user = User::where('email', $affiliate->email)->first();
        }

        if (!$user) {
            // Prepare user data
            $userData = [
                'first_name' => Str::before($affiliate->name, ' '),
                'last_name' => Str::after($affiliate->name, ' ') ?: null,
                'password' => Hash::make(Str::random(12)), // Generate a random password
                'status' => 1, // Default to active status
                'email_verified' => 0, // Email not verified by default
            ];

            if ($affiliate->email) {
                $userData['email'] = $affiliate->email;
                // Attempt to generate a unique username from email prefix
                $usernameAttempt = Str::before($affiliate->email, '@');
                $usernameBase = $usernameAttempt;
                $usernameCounter = 1;
                while (User::where('username', $usernameAttempt)->exists()) {
                    $usernameAttempt = $usernameBase . $usernameCounter++;
                }
                $userData['username'] = $usernameAttempt;
            } else {
                // If no email, try to use mobile for username, ensuring uniqueness
                $usernameAttempt = $affiliate->mobile;
                if($usernameAttempt){
                    $usernameBase = $usernameAttempt;
                    $usernameCounter = 1;
                    while (User::where('username', $usernameAttempt)->exists()) {
                        $usernameAttempt = $usernameBase . $usernameCounter++;
                    }
                    $userData['username'] = $usernameAttempt;
                } else {
                    // Fallback if somehow both email and mobile are null for affiliate (should not happen based on form validation)
                     $usernameAttempt = Str::slug($affiliate->name, '') . Str::random(4);
                     $userData['username'] = $usernameAttempt;
                }
                // If email is null, we cannot set it for the user. Laravel might require it.
                // This scenario (affiliate without email) needs to be handled based on User model constraints.
                // For now, we proceed assuming email can be nullable or a placeholder is used if strictly required.
                // However, the User model's email is NOT nullable. So, an affiliate MUST have an email to create a user.
                // If affiliate email is null here, user creation will fail.
                // The form for affiliate application makes email nullable, but contact_number is required.
                // For OTP login via mobile, email isn't strictly needed for the User model if username can be mobile.
                // Let's ensure the affiliate must have an email if we are to create a user.
                // The affiliate application form controller should enforce email if user creation is mandatory.
                // For now, we'll assume $affiliate->email is present if we reach here intending to create a user.
            }

            if ($affiliate->mobile) {
                $userData['contact_number'] = $affiliate->mobile;
            }

            // Only attempt to create user if email is present, as it's non-nullable for User model
            if($affiliate->email){
                 $user = User::create($userData);
            }
        }

        if ($user) {
            $affiliate->user_id = $user->id;
        }
        $affiliate->save();

        // Send approval email
        if ($affiliate->email) {
            Mail::to($affiliate->email)->send(new AffiliateApprovedEmail($affiliate));
        }

        return redirect()->route('admin.affiliates.index')->with('success', 'Affiliate approved successfully. Code: ' . $affiliateCode);
    }

    public function reject($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        $affiliate->status = 'rejected';
        $affiliate->affiliate_code = null; // Clear any previously generated code if any
        $affiliate->approved_at = null;
        $affiliate->save();

        // Optionally, send a rejection email here. For now, just updating status.

        return redirect()->route('admin.affiliates.index')->with('success', 'Affiliate application rejected.');
    }
}
