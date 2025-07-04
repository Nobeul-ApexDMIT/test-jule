<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AffiliateSystem\Affiliate;
use App\Models\AffiliateSystem\AffiliateCommission;
use App\Models\RoomManagement\RoomBooking;
use App\Models\PackageManagement\PackageBooking;
use App\Traits\MiscellaneousTrait;


class AffiliateDashboardController extends Controller
{
    use MiscellaneousTrait;

    public function __construct()
    {
        // Ensure user is authenticated and is an affiliate
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                return redirect()->route('affiliate.login.form');
            }
            $user = Auth::user();
            $affiliate = Affiliate::where('user_id', $user->id)->where('status', 'approved')->first();
            if (!$affiliate) {
                Auth::logout(); // Log out if not a valid affiliate
                return redirect()->route('affiliate.login.form')->with('error', 'Access denied. Not an approved affiliate.');
            }
            // Share affiliate data with views
            view()->share('activeAffiliate', $affiliate);
            return $next($request);
        });
    }

    public function dashboard(Request $request)
    {
        $affiliate = $request->attributes->get('activeAffiliate') ?? Affiliate::where('user_id', Auth::id())->where('status', 'approved')->firstOrFail();

        $queryResult['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();
        $queryResult['pageHeading'] = __('Affiliate Dashboard'); // Static for now
        $queryResult['currencyInfo'] = MiscellaneousTrait::getCurrencyInfo();


        // Fetch bookings made through this affiliate's code
        // This requires joining AffiliateReferral with RoomBooking and PackageBooking
        // For simplicity, we'll fetch commissions as they link to bookings and affiliate.
        $commissions = AffiliateCommission::where('affiliate_id', $affiliate->id)
            ->with(['booking']) // 'booking' accessor in AffiliateCommission model handles polymorphic relation
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $queryResult['commissions'] = $commissions; // Using commissions as a proxy for referred bookings list

        return view('frontend.affiliate.dashboard.dashboard', $queryResult);
    }

    public function commissionHistory(Request $request)
    {
        $affiliate = $request->attributes->get('activeAffiliate') ?? Affiliate::where('user_id', Auth::id())->where('status', 'approved')->firstOrFail();

        $queryResult['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();
        $queryResult['pageHeading'] = __('Commission History'); // Static for now
        $queryResult['currencyInfo'] = MiscellaneousTrait::getCurrencyInfo();

        $commissions = AffiliateCommission::where('affiliate_id', $affiliate->id)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $queryResult['commissions'] = $commissions;

        return view('frontend.affiliate.dashboard.commission_history', $queryResult);
    }
}
