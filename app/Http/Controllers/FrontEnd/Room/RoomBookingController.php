<?php

namespace App\Http\Controllers\FrontEnd\Room;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontEnd\Room\FlutterwaveController;
use App\Http\Controllers\FrontEnd\Room\InstamojoController;
use App\Http\Controllers\FrontEnd\Room\MercadoPagoController;
use App\Http\Controllers\FrontEnd\Room\MollieController;
use App\Http\Controllers\FrontEnd\Room\PayPalController;
use App\Http\Controllers\FrontEnd\Room\PaystackController;
use App\Http\Controllers\FrontEnd\Room\PaytmController;
use App\Http\Controllers\FrontEnd\Room\RazorpayController;
use App\Http\Controllers\FrontEnd\Room\StripeController;
use App\Http\Requests\RoomBookingRequest;
use App\Models\BasicSettings\MailTemplate;
use App\Models\BasicSettings\Basic; // Added for commission rate
use App\Models\AffiliateSystem\Affiliate; // Added
use App\Models\AffiliateSystem\AffiliateReferral; // Added
use App\Models\AffiliateSystem\AffiliateCommission; // Added
use App\Models\RoomManagement\Coupon;
use App\Models\RoomManagement\Room;
use App\Models\RoomManagement\RoomAmenity;
use App\Models\RoomManagement\RoomBooking;
use App\Models\RoomManagement\RoomContent;
use App\Traits\MiscellaneousTrait;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class RoomBookingController extends Controller
{
  use MiscellaneousTrait;

  public function makeRoomBooking(RoomBookingRequest $request)
  {
    // check whether user is logged in or not (start)
    $status = DB::table('basic_settings')->select('room_guest_checkout_status')
      ->where('uniqid', '=', 12345)
      ->first();

    if (($status->room_guest_checkout_status == 0) && (Auth::guard('web')->check() == false)) {
      return redirect()->route('user.login', ['redirectPath' => 'room_details']);
    }
    // check whether user is logged in or not (end)

    if ($request->paymentType == 'none') {
      session()->flash('error', 'Please select a payment method.');

      return redirect()->back()->withInput();
    } else if ($request->paymentType == 'paypal') {
      $paypal = new PayPalController();

      return $paypal->bookingProcess($request);
    } else if ($request->paymentType == 'stripe') {
      $stripe = new StripeController();

      return $stripe->bookingProcess($request);
    } else if ($request->paymentType == 'paytm') {
      $paytm = new PaytmController();

      return $paytm->bookingProcess($request);
    } else if ($request->paymentType == 'instamojo') {
      $instamojo = new InstamojoController();

      return $instamojo->bookingProcess($request);
    } else if ($request->paymentType == 'paystack') {
      $paystack = new PaystackController();

      return $paystack->bookingProcess($request);
    } else if ($request->paymentType == 'flutterwave') {
      $flutterwave = new FlutterwaveController();

      return $flutterwave->bookingProcess($request);
    } else if ($request->paymentType == 'mollie') {
      $mollie = new MollieController();

      return $mollie->bookingProcess($request);
    } else if ($request->paymentType == 'razorpay') {
      $razorpay = new RazorpayController();

      return $razorpay->bookingProcess($request);
    } else if ($request->paymentType == 'mercadopago') {
      $mercadopago = new MercadoPagoController();

      return $mercadopago->bookingProcess($request);
    } else {
      $offline = new OfflineController();

      return $offline->bookingProcess($request);
    }
  }

  public function calculation(Request $request)
  {
    $roomInfo = Room::findOrFail($request->room_id);

    $subtotal = floatval($roomInfo->rent) * intval($request->nights);

    if (session()->has('couponCode')) {
      $coupon_code = session()->get('couponCode');

      $coupon = Coupon::where('code', $coupon_code)->first();

      if (!is_null($coupon)) {
        $couponVal = floatval($coupon->value);

        if ($coupon->type == 'fixed') {
          $total = $subtotal - $couponVal;

          $calculatedData = array(
            'subtotal' => $subtotal,
            'discount' => $couponVal,
            'total' => $total
          );
        } else {
          $discount = $subtotal * ($couponVal / 100);
          $total = $subtotal - $discount;

          $calculatedData = array(
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total
          );
        }
      } else {
        $calculatedData = array(
          'subtotal' => $subtotal,
          'discount' => 0.00,
          'total' => $subtotal
        );
      }
    } else {
      $calculatedData = array(
        'subtotal' => $subtotal,
        'discount' => 0.00,
        'total' => $subtotal
      );
    }

    session()->forget('couponCode');

    return $calculatedData;
  }

  public function storeData(Request $request, $information)
  {
    $dateArray = explode(' ', $request->dates);

    // Store basic booking details first
    $booking_details = new RoomBooking;
    $booking_details->booking_number = time();
    $booking_details->user_id = Auth::guard('web')->check() == true ? Auth::guard('web')->user()->id : null;
    $booking_details->customer_name = $request->customer_name;
    $booking_details->customer_email = $request->customer_email;
    $booking_details->customer_phone = $request->customer_phone;
    $booking_details->room_id = $request->room_id;
    $booking_details->arrival_date = $dateArray[0];
    $booking_details->departure_date = $dateArray[2];
    $booking_details->guests = $request->guests;
    $booking_details->subtotal = $information['subtotal'];
    $booking_details->discount = $information['discount'];
    $booking_details->grand_total = $information['total'];
    $booking_details->currency_symbol = $information['currency_symbol'];
    $booking_details->currency_symbol_position = $information['currency_symbol_position'];
    $booking_details->currency_text = $information['currency_text'];
    $booking_details->currency_text_position = $information['currency_text_position'];
    $booking_details->payment_method = $information['method'];
    $booking_details->gateway_type = $information['type'];
    $booking_details->attachment = $request->hasFile('attachment') ? $information['attachment'] : null;
    // $booking_details->payment_status will be updated by payment gateway controllers
    $booking_details->save();


    // Affiliate Tracking
    // Check session first, then form input (form input name: 'affiliate_code_input')
    $affiliateCode = $request->session()->get('affiliate_code', $request->input('affiliate_code_input'));

    if ($affiliateCode) {
        $affiliate = Affiliate::where('affiliate_code', $affiliateCode)->where('status', 'approved')->first();

        if ($affiliate) {
            $referral = AffiliateReferral::create([
                'affiliate_id' => $affiliate->id,
                'booking_id' => $booking_details->id,
                'booking_type' => 'room',
            ]);

            // Basic settings might store a global commission rate
            // For now, let's assume a fixed 10% or fetch from a config/setting
            // $settings = Basic::select('affiliate_commission_rate')->first();
            // $commissionRate = $settings && $settings->affiliate_commission_rate ? $settings->affiliate_commission_rate : 10.00;
            $commissionRate = 10.00; // Defaulting to 10% for now

            $commissionAmount = ($booking_details->grand_total * $commissionRate) / 100;

            AffiliateCommission::create([
                'affiliate_id' => $affiliate->id,
                'referral_id' => $referral->id,
                'booking_id' => $booking_details->id,
                'booking_type' => 'room',
                'guest_name' => $booking_details->customer_name,
                'booking_value' => $booking_details->grand_total,
                'commission_rate' => $commissionRate,
                'commission_amount' => $commissionAmount,
                'status' => 'pending', // Will be 'paid' after admin processes payment
            ]);
        }
        // Clear the affiliate code from session after processing
        $request->session()->forget('affiliate_code');
    }

    return $booking_details;
  }

  public function generateInvoice($bookingInfo)
  {
    $fileName = $bookingInfo->booking_number . '.pdf';
    $directory = config('dompdf.public_path') . 'rooms/';

    if (!file_exists($directory)) {
      mkdir($directory, 0777, true);
    }

    $fileLocated = $directory . $fileName;

    Pdf::loadView('frontend.pdf.room_booking', compact('bookingInfo'))->save($fileLocated);

    return $fileName;
  }

  public function sendMail($bookingInfo)
  {
    // first get the mail template information from db
    $mailTemplate = MailTemplate::where('mail_type', 'room_booking')->first();
    $mailSubject = $mailTemplate->mail_subject;
    $mailBody = replaceBaseUrl($mailTemplate->mail_body, 'summernote');

    // second get the website title & mail's smtp information from db
    $info = DB::table('basic_settings')
      ->select('website_title', 'smtp_status', 'smtp_host', 'smtp_port', 'encryption', 'smtp_username', 'smtp_password', 'from_mail', 'from_name')
      ->first();

    // get the difference of two dates, date should be in 'YYYY-MM-DD' format
    $date1 = new DateTime($bookingInfo->arrival_date);
    $date2 = new DateTime($bookingInfo->departure_date);
    $interval = $date1->diff($date2, true);

    // get the room category name according to language
    $language = MiscellaneousTrait::getLanguage();

    $roomContent = RoomContent::where('language_id', $language->id)
      ->where('room_id', $bookingInfo->room_id)
      ->first();

    $roomCategoryName = $roomContent->roomCategory->name;

    $roomRent = ($bookingInfo->currency_text_position == 'left' ? $bookingInfo->currency_text . ' ' : '') . $bookingInfo->grand_total . ($bookingInfo->currency_text_position == 'right' ? ' ' . $bookingInfo->currency_text : '');

    // get the amenities of booked room
    $amenityIds = json_decode($roomContent->amenities);

    $amenityArray = [];

    foreach ($amenityIds as $id) {
      $amenity = RoomAmenity::findOrFail($id);
      array_push($amenityArray, $amenity->name);
    }

    // now, convert amenity array into comma separated string
    $amenityString = implode(', ', $amenityArray);

    // replace template's curly-brace string with actual data
    $mailBody = str_replace('{customer_name}', $bookingInfo->customer_name, $mailBody);
    $mailBody = str_replace('{room_name}', $roomContent->title, $mailBody);
    $mailBody = str_replace('{room_rent}', $roomRent, $mailBody);
    $mailBody = str_replace('{booking_number}', $bookingInfo->booking_number, $mailBody);
    $mailBody = str_replace('{booking_date}', date_format($bookingInfo->created_at, 'F d, Y'), $mailBody);
    $mailBody = str_replace('{number_of_night}', $interval->days, $mailBody);
    $mailBody = str_replace('{website_title}', $info->website_title, $mailBody);
    $mailBody = str_replace('{check_in_date}', $bookingInfo->arrival_date, $mailBody);
    $mailBody = str_replace('{check_out_date}', $bookingInfo->departure_date, $mailBody);
    $mailBody = str_replace('{number_of_guests}', $bookingInfo->guests, $mailBody);
    $mailBody = str_replace('{room_type}', $roomCategoryName, $mailBody);
    $mailBody = str_replace('{room_amenities}', $amenityString, $mailBody);

    // initialize a new mail
    $mail = new PHPMailer(true);

    // if smtp status == 1, then set some value for PHPMailer
    if ($info->smtp_status == 1) {
      $mail->isSMTP();
      $mail->Host       = $info->smtp_host;
      $mail->SMTPAuth   = true;
      $mail->Username   = $info->smtp_username;
      $mail->Password   = $info->smtp_password;

      if ($info->encryption == 'TLS') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      }

      $mail->Port       = $info->smtp_port;
    }

    // finally add other informations and send the mail
    try {
      // Recipients
      $mail->setFrom($info->from_mail, $info->from_name);
      $mail->addAddress($bookingInfo->customer_email);

      // Attachments (Invoice)
      $mail->addAttachment(public_path('assets/invoices/rooms/') . $bookingInfo->invoice);

      // Content
      $mail->isHTML(true);
      $mail->Subject = $mailSubject;
      $mail->Body    = $mailBody;

      $mail->send();

      return;
    } catch (Exception $e) {
      return redirect('/rooms')->with('error', 'Mail could not be sent!');
    }
  }

  public function complete()
  {
    $queryResult['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();

    return view('frontend.partials.payment_success', $queryResult);
  }

  public function cancel()
  {
    return redirect('/rooms')->with('error', 'Sorry, an error has occured!');
  }
}
