@extends('frontend.layout')
@section('styles')
@include('frontend.theme_one_two.include.styles')
@endsection
@section('pageHeading')
@if (!is_null($pageHeading))
{{ $pageHeading->contact_us_title }}
@endif
@endsection

@php
$metaKeys = !empty($seo->meta_keyword_contact_us) ? $seo->meta_keyword_contact_us : '';
$metaDesc = !empty($seo->meta_description_contact_us) ? $seo->meta_description_contact_us : '';
@endphp

@section('meta-keywords', "$metaKeys")
@section('meta-description', "$metaDesc")

@section('meta-alt-description', "Escape to Kazi Resort in Gazipur for family fun, romantic stays, or peaceful retreats. Book your nature getaway at our premier eco resort.")
@section('meta-alt-keywords', "book resort gazipur online, hotel reservation dhaka, gazipur resort booking, online booking bangladesh, reserve rooms gazipur, instant booking resort, hotel rates gazipur, accommodation booking dhaka")

@section('content')
<main>
  <!-- <style>
    .responsive-heading {
      font-size: 1.5rem;
      /* base fluid size */
      line-height: 1.2;
      font-weight: 700;
    }

    /* For tablets and above (>= 768px) */
    @media (min-width: 768px) {
      .responsive-heading {
        font-size: 2rem !important;
      }
    }

    /* For desktops and above (>= 992px) */
    @media (min-width: 992px) {
      .responsive-heading {
        font-size: 3rem !important;
      }
    }

    .responsive-heading-p {
      font-size: 1rem !important;
      /* base fluid size */
      line-height: 1.2;
      font-weight: 700;
    }

    /* For tablets and above (>= 768px) */
    @media (min-width: 768px) {
      .responsive-heading-p {
        font-size: 1.4rem !important;
      }
    }

    /* For desktops and above (>= 992px) */
    @media (min-width: 992px) {
      .responsive-heading-p {
        font-size: 1.75rem !important;
      }
    }
  </style> -->
  <section class="container" style="margin-top: 25px; margin-bottom: 25px;">
    <h1 style="margin-bottom: 21px !important; font-weight: 700 !important; font-size: 40px !important; line-height: 40px !important; text-align: center !important; color: #610C21 !important;">Book Now</h1>
    <p style="margin-inline: auto !important; max-width: 773px !important; font-size: 18px !important; font-weight: 500 !important; line-height: 25px !important; text-align: center !important;">We would like to welcome you to Kazi Resort. Please fill in the following booking form and send it to us. We will get back to you with confirmation as soon as possible.</p>
  </section>
  <section id="pricing-cards" class="container" style="padding-block: 30px;">
    <div class="row" style="row-gap: 40px;">

      <style>
        /* Container for each package card */
        .package-card {
          border-radius: 10px;
          box-shadow: 0px 0px 6px -2px rgba(66, 68, 90, 1);
          padding-inline: 0;
          position: relative;
          width: calc(100% - 18px);
          height: 100%;
        }

        /* Image container styling */
        .package-img-container {
          padding-top: 24px;
          padding-inline: 24px;
          width: 100%;
          margin-bottom: 16px;
          overflow: hidden;
          border-radius: 7px;
        }

        .package-img-container img {
          width: 100%;
          height: auto;
        }

        /* Title styling */
        .package-title {
          padding-inline: 24px;
          font-weight: 700;
          font-size: 17px;
          line-height: 100%;
          color: #610C21;
          margin-bottom: 34px;
          text-align: center;
        }

        /* Features list styling */
        .package-features {
          list-style-type: circle;
          padding-left: 44px;
          padding-right: 24px;
          font-weight: 500;
          font-size: 14px;
          line-height: 100%;
          color: hsla(0, 0%, 40%, 1);
          margin-bottom: 96px;

          li {
            font-size: 14px;
            font-weight: 500;
            line-height: 18px;
            letter-spacing: 0%;
          }
        }

        /* Price styling */
        .package-price {
          background-color: #610C21;
          color: white;
          font-size: 24px;
          font-weight: 800;
          line-height: 100%;
          text-align: center;
          padding-top: 6px;
          padding-bottom: 8px;
          margin-bottom: 17px;
          position: absolute;
          bottom: 20px;
          width: 100%;
        }

        .package-price sup {
          font-size: 12px;
        }
      </style>

      <!-- Package Cards -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="package-card">
          <div class="package-img-container">
            <img src="/assets/img/contact_us/day-long.png" alt="day-long-img">
          </div>
          <h2 class="package-title">Daylong Without Activity Package Per Person</h2>
          <ul class="package-features">
            <li>Includes food and services</li>
          </ul>
          <p class="package-price">
            <sup>BDT</sup> 2777/-
          </p>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="package-card">
          <div class="package-img-container">
            <img src="/assets/img/contact_us/day-long-activity.png" alt="day-long-activity">
          </div>
          <h2 class="package-title">Night stay without activity package per person</h2>
          <ul class="package-features">
            <li>Includes food, twin-share tent accommodation, and services</li>
          </ul>
          <p class="package-price">
            <sup>BDT</sup> 2997/-
          </p>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="package-card">
          <div class="package-img-container">
            <img src="/assets/img/contact_us/night-stay.png" alt="night-stay">
          </div>
          <h2 class="package-title">Daylong activity package per person</h2>
          <ul class="package-features">
            <li>Includes food, activities, and services</li>
          </ul>
          <p class="package-price">
            <sup>BDT</sup> 3777/-
          </p>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="package-card">
          <div class="package-img-container">
            <img src="/assets/img/contact_us/night-stay-activity.png" alt="Night Stay Activity">
          </div>
          <h2 class="package-title">Night stay activity package per person</h2>
          <ul class="package-features">
            <li>Includes food, activities, accommodation, and services</li>
          </ul>
          <p class="package-price">
            <sup>BDT</sup> 4997/-
          </p>
        </div>
      </div>

    </div>
  </section>
  <section id="queries" class="container-fluid" style="background-color: #610C21; padding-block: 32px;">
    <h2 style="text-align: center; font-weight: 700; font-size: 20px; line-height: 25px; color: white; margin-bottom: 12px;">You Can Also Customize Your Packages (2 Days 1 Night | 3 Days 2 Nights)</h2>
    <p style="text-align: center; font-weight: 400; font-size: 16px; line-height: 34px; color: white;">
      <i>For Inquiries, Bookings, And Pricing Details, Contact Us At</i>
    </p>
    <p style="text-align: center; font-weight: 700; font-size: 20px; line-height: 25px; color: white;">
      <a href="tel:+8801894803511" style="color: white;">+8801894803511</a>,
      <a href="tel:+8801894814765" style="color: white;">+8801894814765</a>,
      <a href="tel:+8801894814761" style="color: white;">+8801894814761</a>
    </p>
  </section>
  <section class="container-fluid bg-light p-5">
    <form action="{{ url('book-now') }}" class="d-flex flex-column container" style="gap:12px" method="post">
      @csrf
      <div class="row">
        <fieldset class="col-12 col-sm-6">
          <label for="check_in_date">Check-In Date <span>*</span></label>
          <input style="height: 60px; padding-inline:20px;" id="check_in_date" type="date" class="form-control" placeholder="" name="checkin_date" value="{{ old('checkin_date') }}" onchange="updateCheckoutDate()">
          @error('checkin_date')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
        <fieldset class="col-12 col-sm-6">
          <label for="check_out_date">Check-Out Date <span>*</span></label>
          <input style="height: 60px; padding-inline:20px;" id="check_out_date" type="date" class="form-control" placeholder="" name="checkout_date" value="{{ old('checkout_date') }}">
          @error('checkout_date')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>

        <script>
          function updateCheckoutDate() {
            var checkInDate = document.getElementById('check_in_date').value;
            document.getElementById('check_out_date').setAttribute('min', checkInDate);
          }
        </script>
      </div>
      <div class="row">
        <fieldset class="col-12 col-sm-6">
          <label for="room_or_suite">Room/Suite Type <span>*</span></label>
          <select style="height: 60px; padding-inline:20px;" name="room_type" id="room_type">
            <option value="">- Select -</option>
            <option value="Pool Side Family Suite" {{ old('room_type') == 'Pool Side Family Suite' ? 'selected' : '' }}>Pool Side Family Suite</option>
            <option value="Premium Room With Balcony" {{ old('room_type') == 'Premium Room With Balcony' ? 'selected' : '' }}>Premium Room With Balcony</option>
            <option value="Deluxe" {{ old('room_type') == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
            <option value="Super Deluxe" {{ old('room_type') == 'Super Deluxe' ? 'selected' : '' }}>Super Deluxe</option>
            <option value="Mud House" {{ old('room_type') == 'Mud House' ? 'selected' : '' }}>Mud House</option>
          </select>
          @error('room_type')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
        <fieldset class="col-12 col-sm-6">
          <label for="no_of_room">No. of Room <span>*</span></label>
          <select style="height: 60px; padding-inline:20px;" name="no_of_room" id="no_of_room">
            <option value="">- Select -</option>
            <option value="1" {{ old('no_of_room') == 1 ? 'selected' : '' }}>1</option>
            <option value="2" {{ old('no_of_room') == 2 ? 'selected' : '' }}>2</option>
            <option value="3" {{ old('no_of_room') == 3 ? 'selected' : '' }}>3</option>
            <option value="4" {{ old('no_of_room') == 4 ? 'selected' : '' }}>4</option>
            <option value="5" {{ old('no_of_room') == 5 ? 'selected' : '' }}>5</option>
            <option value="6" {{ old('no_of_room') == 6 ? 'selected' : '' }}>6</option>
            <option value="7" {{ old('no_of_room') == 7 ? 'selected' : '' }}>7</option>
            <option value="8" {{ old('no_of_room') == 8 ? 'selected' : '' }}>8</option>
            <option value="9" {{ old('no_of_room') == 9 ? 'selected' : '' }}>9</option>
            <option value="10" {{ old('no_of_room') == 10 ? 'selected' : '' }}>10</option>
          </select>
          @error('no_of_room')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
      </div>
      <div class="row">
        <fieldset class="col-12 col-sm-6">
          <label for="no_of_adults">No. of Adults <span>*</span></label>
          <select style="height: 60px; padding-inline:20px;" name="no_of_adult" id="no_of_adults">
            <option value="">- Select -</option>
            <option value="1" {{ old('no_of_adult') == 1 ? 'selected' : '' }}>1</option>
            <option value="2" {{ old('no_of_adult') == 2 ? 'selected' : '' }}>2</option>
            <option value="3" {{ old('no_of_adult') == 3 ? 'selected' : '' }}>3</option>
            <option value="4" {{ old('no_of_adult') == 4 ? 'selected' : '' }}>4</option>
            <option value="5" {{ old('no_of_adult') == 5 ? 'selected' : '' }}>5</option>
            <option value="6" {{ old('no_of_adult') == 6 ? 'selected' : '' }}>6</option>
            <option value="7" {{ old('no_of_adult') == 7 ? 'selected' : '' }}>7</option>
            <option value="8" {{ old('no_of_adult') == 8 ? 'selected' : '' }}>8</option>
            <option value="9" {{ old('no_of_adult') == 9 ? 'selected' : '' }}>9</option>
            <option value="10" {{ old('no_of_adult') == 10 ? 'selected' : '' }}>10</option>
          </select>
          @error('no_of_adult')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
        <fieldset class="col-12 col-sm-6">
          <label for="no_of_children">No. of Children</label>
          <select style="height: 60px; padding-inline:20px;" name="no_of_children" id="no_of_children">
            <option value="">- Select -</option>
            <option value="1" {{ old('no_of_children') == 1 ? 'selected' : '' }}>1</option>
            <option value="2" {{ old('no_of_children') == 2 ? 'selected' : '' }}>2</option>
            <option value="3" {{ old('no_of_children') == 3 ? 'selected' : '' }}>3</option>
            <option value="4" {{ old('no_of_children') == 4 ? 'selected' : '' }}>4</option>
            <option value="5" {{ old('no_of_children') == 5 ? 'selected' : '' }}>5</option>
            <option value="6" {{ old('no_of_children') == 6 ? 'selected' : '' }}>6</option>
            <option value="7" {{ old('no_of_children') == 7 ? 'selected' : '' }}>7</option>
            <option value="8" {{ old('no_of_children') == 8 ? 'selected' : '' }}>8</option>
            <option value="9" {{ old('no_of_children') == 9 ? 'selected' : '' }}>9</option>
            <option value="10" {{ old('no_of_children') == 10 ? 'selected' : '' }}>10</option>
          </select>
          @error('no_of_children')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
      </div>
      <div class="row">
        <fieldset class="col-12 col-sm-6">
          <label for="first_name">First Name <span>*</span></label>
          <input style="height: 60px; padding-inline:20px;" id="first_name" type="text" class="form-control" placeholder="" name="first_name" value="{{ old('first_name') }}">
          @error('first_name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
        <fieldset class="col-12 col-sm-6">
          <label for="last_name">Last Name</label>
          <input style="height: 60px; padding-inline:20px;" id="last_name" type="text" class="form-control" placeholder="" name="last_name" value="{{ old('last_name') }}">
          @error('last_name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
      </div>
      <div class="row">
        <fieldset class="col-12">
          <label for="address">Address <span>*</span></label>
          <textarea rows="3" name="address" id="address" class="form-control" placeholder="" value="{{ old('address') }}"></textarea>
          @error('address')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
      </div>
      <div class="row">
        <fieldset class="col-12 col-sm-6 col-md-6">
          <label for="email">Your Email</label>
          <input style="height: 60px; padding-inline:20px;" id="email" type="email" class="form-control form-control-sm" placeholder="" name="email" value="{{ old('email') }}">
          @error('email')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
        <fieldset class="col-12 col-sm-6 col-md-6">
          <label for="mobile">Your Mobile <span>*</span></label>
          <input style="height: 60px; padding-inline:20px;" id="mobile" type="tel" class="form-control form-control-sm" placeholder="" name="mobile" value="{{ old('mobile') }}">
          @error('mobile')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
        <!-- <fieldset class="col-12 col-sm-6 col-md-4">
          <label for="phone">Your Phone</label>
          <input style="height: 60px; padding-inline:20px;" id="phone" type="tel" class="form-control form-control-sm" placeholder="" name="phone" value="{{ old('phone') }}">
          @error('phone')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset> -->
      </div>
      {{-- Affiliate Code Input --}}
      <div class="row">
        <fieldset class="col-12">
            <label for="affiliate_code_input">{{ __('Affiliate Code (Optional)') }}</label>
            <input style="height: 60px; padding-inline:20px;" id="affiliate_code_input" type="text" class="form-control" name="affiliate_code_input" value="{{ old('affiliate_code_input', session()->get('affiliate_code')) }}">
        </fieldset>
      </div>
      <div class="row">
        <fieldset class="col-12">
          <label for="special_requirements">Special Requirements</label>
          <textarea rows="3" name="special_requirement" id="special_requirements" class="form-control" placeholder="" value="{{ old('special_requirements') }}"></textarea>
          @error('special_requirement')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </fieldset>
      </div>
      <div class="d-flex align-items-center justify-content-end">
        <button class="btn filled-btn p-3 rounded-sm" style="background-color: #610C21;" type="submit">BOOK NOW</button>
      </div>
    </form>
  </section>
  <section class="bg-light p-4 mt-2 mb-4">
    <div class="row container-fluid d-flex align-items-stretch justify-content-center">
      <div class="col-12 col-md-4 col-lg-3 d-flex flex-column align-items-center border-right p-4">
        <div>
          <img src="/assets/img/contact_us/contact-map-icon.png" alt="contact-map-icon">
        </div>
        <h2 class="font-weight-normal text-center m-2" style="font-size: 24px; line-height: normal; color: #610C21;">Resort Address</h2>
        <p class="text-center">Kazi Resort Rajabari, Rajendrapur, Sreepur, Gazipur, Dhaka, Bangladesh</p>
      </div>
      <div class="col-12 col-md-4 col-lg-3 d-flex flex-column align-items-center border-right p-4">
        <div>
          <img src="/assets/img/contact_us/contact-map-icon.png" alt="contact-map-icon">
        </div>
        <h2 class="font-weight-normal text-center m-2" style="font-size: 24px; line-height: normal; color: #610C21;">Corporate Office</h2>
        <p class="text-center">Catharsis Tower, (6th Floor) Road #12, Banani, Dhaka</p>
      </div>
      <div class="col-12 col-md-4 col-lg-3 d-flex flex-column align-items-center border-right p-4">
        <div>
          <img src="/assets/img/contact_us/contact-phone-icon.png" alt="contact-phone-icon">
        </div>
        <h2 class="font-weight-normal text-center m-2" style="font-size: 24px; line-height: normal; color: #610C21;">Reservation Hotline</h2>
        <p class="text-center">
          <a class="font-weight-bold d-block" style="color:#610C21; font-size: 1.10rem;" href="tel:+8801894803511">+8801894803511</a>
          <a class="font-weight-bold d-block" style="color:#610C21; font-size: 1.10rem;" href="mailto:reservation@kaziresort.com">reservation@kaziresort.com</a>
        </p>
      </div>
      <div class="col-12 col-md-4 col-lg-3 d-flex flex-column align-items-center p-4">
        <div>
          <img src="/assets/img/contact_us/contact-phone-icon.png" alt="contact-phone-icon">
        </div>
        <h2 class="font-weight-normal text-center m-2" style="font-size: 24px; line-height: normal; color: #610C21;">Corporate Booking</h2>
        <p class="text-center">
          <a class="font-weight-bold d-block" style="color:#610C21; font-size: 1.10rem;" href="tel:+8801894814754">+8801894814754</a>
          <a class="font-weight-bold d-block" style="color:#610C21; font-size: 1.10rem;" href="mailto:sales@kaziresort.com">sales@kaziresort.com</a>
        </p>
      </div>
    </div>
  </section>
</main>
@endsection

@section('theme_scripts')
@include('frontend.theme_one_two.include.scripts')
@endsection