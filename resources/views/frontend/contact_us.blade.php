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


@section('content')
<main>
  <style>
    .responsive-heading {
      font-size: 1.5rem !important;
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
  </style>
  <section class="container">
    <h1 class="text-center responsive-heading">Contact Us</h1>
  </section>
  <section class="bg-light p-4">
    <div class="container d-flex align-items-stretch">
      <div class="row">
        <div class="col-12 col-md-4 col-lg-3 d-flex flex-column align-items-center border-right p-4">
          <div>
            <img src="/assets/img/contact_us/contact-map-icon.png" alt="contact-map-icon">
          </div>
          <h2 class="font-weight-normal text-center m-2" style="font-size: 24px; line-height: normal;">Resort Address</h2>
          <p class="text-center">Kazi Resort Rajabari, Rajendrapur, Sreepur, Gazipur, Dhaka, Bangladesh</p>
        </div>
        <div class="col-12 col-md-4 col-lg-3 d-flex flex-column align-items-center border-right p-4">
          <div>
            <img src="/assets/img/contact_us/contact-map-icon.png" alt="contact-map-icon">
          </div>
          <h2 class="font-weight-normal text-center m-2" style="font-size: 24px; line-height: normal;">Corporate Office</h2>
          <p class="text-center">Catharsis Tower, (6th Floor) Road #12, Banani, Dhaka</p>
        </div>
        <div class="col-12 col-md-4 col-lg-3 d-flex flex-column align-items-center border-right p-4">
          <div>
            <img src="/assets/img/contact_us/contact-phone-icon.png" alt="contact-phone-icon">
          </div>
          <h2 class="font-weight-normal text-center m-2" style="font-size: 24px; line-height: normal;">Reservation Hotline</h2>
          <p class="text-center">
            <a class="font-weight-bold d-block" style="color:#7e2940; font-size: 1.10rem;" href="tel:+8801894803511">+8801894803511</a>
            <a class="font-weight-bold d-block" style="color:#7e2940; font-size: 1.10rem;" href="mailto:reservation@kaziresort.com">reservation@kaziresort.com</a>
          </p>
        </div>
        <div class="col-12 col-md-4 col-lg-3 d-flex flex-column align-items-center p-4">
          <div>
            <img src="/assets/img/contact_us/contact-phone-icon.png" alt="contact-phone-icon">
          </div>
          <h2 class="font-weight-normal text-center m-2" style="font-size: 24px; line-height: normal;">Corporate Booking</h2>
          <p class="text-center">
            <a class="font-weight-bold d-block" style="color:#7e2940; font-size: 1.10rem;" href="tel:+8801894814754">+8801894814754</a>
            <a class="font-weight-bold d-block" style="color:#7e2940; font-size: 1.10rem;" href="mailto:sales@kaziresort.com">sales@kaziresort.com</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="container p-5">
    <p class="font-weight-normal text-center p-5 responsive-heading-p" style="line-height: normal;">Dear valued guest, please complete the following fields and we will contact you soon.</p>
    <form action="{{ url('contact-us') }}" class="d-flex flex-column" style="gap:12px" method="post">
      @csrf
      <div class="row" style="row-gap: 12px;">
        <div class="col-12 col-md-6">
          <input type="text" class="form-control" placeholder="First name" name="first_name" value="{{ old('first_name') }}">
          @error('first_name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-12 col-md-6">
          <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{ old('last_name') }}">
          @error('first_name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="row" style="row-gap: 12px;">
        <div class="col-12 col-md-6">
          <input type="tel" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}">
          @error('phone')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-12 col-md-6">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
          @error('email')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="row" style="row-gap: 12px;">
        <div class="col-12">
          <input type="text" class="form-control" placeholder="Subject" name="subject" value="{{ old('subject') }}">
          @error('subject')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="row" style="row-gap: 12px;">
        <div class="col-12">
          <textarea class="form-control p-4" name="message" id="" placeholder="Message" rows="6">{{ old('message') }}</textarea>
          @error('message')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <button class="btn filled-btn p-3 rounded-sm" style="background-color: #7e2940;" type="submit">Submit form</button>

    </form>
  </section>
  <section class="pt-4 pb-4">
    <iframe style="width: 100vw;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3642.187396240773!2d90.51781729999999!3d24.094904500000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755d7002765d3c1%3A0x976553befb769a4e!2sKazi%20Resort%20%26%20Hotel!5e0!3m2!1sen!2sbd!4v1738910175782!5m2!1sen!2sbd" width="100vw" height="450" style="border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>
</main>
@endsection

@section('theme_scripts')
@include('frontend.theme_one_two.include.scripts')
@endsection