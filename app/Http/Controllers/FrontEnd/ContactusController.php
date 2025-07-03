<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Mail\ContactusEmail;
use App\Models\GalleryManagement\Gallery;
use App\Models\GalleryManagement\GalleryCategory;
use App\Traits\MiscellaneousTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactusController extends Controller
{
    use MiscellaneousTrait;

    public function contactUs(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'email' => 'nullable|email',
                'subject' => 'required',
                'message' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->all();
            $data['mail_subject'] = 'New Client Inquiry - Please Contact ASAP';

            $recipients = [
                'reservation@kaziresort.com',
                'sales@kaziresort.com',
                'support@kaziresort.com',
            ];

            Mail::to($recipients)->send(new ContactusEmail($data));

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

        return view('frontend.contact_us', $queryResult);
    }
}
