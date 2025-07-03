<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\AffiliateProgramEmail;
use Illuminate\Support\Facades\Mail;


class EventsAndLoyaltyController extends Controller
{
    public function events()
    {
        return view('frontend.events_and_meetings');
    }

    public function loyalty()
    {
        return view('frontend.loyalty_program');
    }
}
