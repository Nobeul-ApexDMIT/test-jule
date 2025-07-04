<?php

namespace App\Http\Controllers\FrontEnd\Room;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontEnd\Room\RoomBookingController;
use App\Models\RoomManagement\RoomBooking;
use App\Traits\MiscellaneousTrait;
use Illuminate\Http\Request;

class PaytmController extends Controller
{
  use MiscellaneousTrait;

  public function bookingProcess(Request $request)
  {
    $roomBooking = new RoomBookingController();

    // do calculation
    $calculatedData = $roomBooking->calculation($request);

    $currencyInfo = MiscellaneousTrait::getCurrencyInfo();

    // checking whether the currency is set to 'INR' or not
    if ($currencyInfo->base_currency_text !== 'INR') {
      return redirect()->back()->with('error', 'Invalid currency for paytm payment.');
    }

    $information['subtotal'] = $calculatedData['subtotal'];
    $information['discount'] = $calculatedData['discount'];
    $information['total'] = $calculatedData['total'];
    $information['currency_symbol'] = $currencyInfo->base_currency_symbol;
    $information['currency_symbol_position'] = $currencyInfo->base_currency_symbol_position;
    $information['currency_text'] = $currencyInfo->base_currency_text;
    $information['currency_text_position'] = $currencyInfo->base_currency_text_position;
    $information['method'] = 'Paytm';
    $information['type'] = 'online';

    // store the room booking information in database
    $booking_details = $roomBooking->storeData($request, $information);

    $payment = PaytmWallet::with('receive');

    $payment->prepare([
      'order' => time(),
      'user' => uniqid(),
      'mobile_number' => $booking_details->customer_phone,
      'email' => $booking_details->customer_email,
      'amount' => $calculatedData['total'],
      'callback_url' => route('room_booking.paytm.notify')
    ]);

    // put some data in session before redirect to paytm url
    session()->put('bookingId', $booking_details->id);   // db row number

    return $payment->receive();
  }

  public function notify(Request $request)
  {
    // get the information from session
    $bookingId = session()->get('bookingId');

    $transaction = PaytmWallet::with('receive');

    // this response is needed to check the transaction status
    $response = $transaction->response();

    if ($transaction->isSuccessful()) {
      // update the payment status for room booking in database
      $bookingInfo = RoomBooking::findOrFail($bookingId);

      $bookingInfo->update(['payment_status' => 1]);

      $roomBooking = new RoomBookingController();

      // generate an invoice in pdf format
      $invoice = $roomBooking->generateInvoice($bookingInfo);

      // update the invoice field information in database
      $bookingInfo->update(['invoice' => $invoice]);

      // send a mail to the customer with an invoice
      $roomBooking->sendMail($bookingInfo);

      // remove all session data
      session()->forget('bookingId');

      return redirect()->route('room_booking.complete');
    } else if ($transaction->isFailed()) {
      return redirect()->route('room_booking.cancel');
    }
  }
}
