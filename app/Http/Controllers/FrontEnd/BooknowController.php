<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Mail\BooknowEmail;
use App\Models\GalleryManagement\Gallery;
use App\Models\GalleryManagement\GalleryCategory;
use App\Traits\MiscellaneousTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BooknowController extends Controller
{
  use MiscellaneousTrait;

    public function bookNow(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'checkin_date' => 'required|date_format:Y-m-d',
                'checkout_date' => 'required|date_format:Y-m-d|after:checkin_date',
                'room_type' => 'required',
                'no_of_room' => 'required',
                'no_of_adult' => 'required',
                'first_name' => 'required',
                'address' => 'required',
                'email' => 'nullable|email',
                'mobile' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->all();
            $data['subject'] = 'New Booking Request - Kazi Resort';

            $recipients = [
                'reservation@kaziresort.com',
                'sales@kaziresort.com',
                'support@kaziresort.com',
            ];

            Mail::to($recipients)->send(new BooknowEmail($data));

            return redirect()->back()->with('success', 'Your message has been sent successfully.');
        }
        $queryResult['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();

        $language = MiscellaneousTrait::getLanguage();

        $queryResult['pageHeading'] = MiscellaneousTrait::getPageHeading($language);

        $queryResult['categories'] = GalleryCategory::where('language_id', $language->id)
          ->where('status', 1)
          ->orderBy('serial_number', 'asc')
          ->get();

        $queryResult['galleryInfos'] = Gallery::with('galleryCategory')
          ->where('language_id', $language->id)
          ->orderBy('serial_number', 'asc')
          ->get();

        return view('frontend.book_now', $queryResult);
    }
}
