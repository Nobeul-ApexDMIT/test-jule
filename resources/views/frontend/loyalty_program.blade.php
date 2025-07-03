@extends('frontend.updated_layout')
@section('styles')
@include('frontend.theme_one_two.include.styles')
@endsection

@section('pageHeading')
  Privilege Program
@endsection

@php

$metaKeys = !empty($seo->meta_keyword_contact_us) ? $seo->meta_keyword_contact_us : '';
$metaDesc = !empty($seo->meta_description_contact_us) ? $seo->meta_description_contact_us : '';

@endphp

@section('meta-keywords', "$metaKeys")
@section('meta-description', "$metaDesc")

@section('meta-alt-description', "Join Kazi Resort Privilege Membership and enjoy exclusive discounts, priority bookings & special rewards at Gazipur's luxury eco resort.")
@section('meta-alt-keywords', "loyalty program resort, rewards program gazipur, hotel membership bangladesh, exclusive benefits resort, vip program resort gazipur, guest rewards dhaka, membership benefits bangladesh, loyalty rewards hotel")


@section('content')
<main>
  <header class="tw-container tw-rounded-[14px] tw-px-14 tw-py-9 tw-bg-[radial-gradient(50%_50%_at_50%_50%,_rgba(255,_255,_255,_1)_0%,_rgba(187,_132,_132,_0.1)_100%)] tw-mb-14 tw-shadow-lg tw-shadow-[#00000014]">
    <div class="tw-flex tw-relative tw-items-center tw-justify-between tw-flex-col-reverse tw-gap-y-5 lg:tw-flex-row tw-pt-24 lg:tw-pt-0">
      <div class="tw-flex tw-flex-col tw-mt-auto">
        <div class="tw-mb-20 tw-absolute tw-left-1/2 tw--translate-x-1/2 tw-top-0 lg:tw-left-0 lg:tw-translate-x-0">
          <img src="{{ asset('assets/img/events-and-loyalty/yearly-membership.png') }}" alt="yearly-membership">
        </div>
        <h1 class="tw-text-5xl tw-font-bold tw-text-[#610c21] tw-mb-2 tw-text-center lg:tw-text-left">Privilege Program</h1>
        <p class="tw-text-lg tw-leading-10 tw-font-semibold tw-tracking-[4px] tw-text-[#610c21] tw-mb-5 tw-text-center lg:tw-text-left">
          Your Trust, Our Exclusive Privileges
        </p>
        <p class="tw-flex tw-items-center tw-justify-start tw-gap-6 tw-text-center lg:tw-text-left tw-flex-wrap tw-mx-auto lg:tw-mx-0">
          <a class="tw-flex tw-text-lg tw-font-semibold tw-leading-10 tw-items-center tw-gap-2 tw-text-[#7E2940] tw-tracking-[2px]" href="mailto:reservation@kaziresort.com"><img class="tw-self-center" src="{{ asset('assets/img/events-and-loyalty/email-icon.png') }}" alt="email-icon">reservation@kaziresort.com</a>
          <a class="tw-flex tw-text-lg tw-font-semibold tw-leading-10 tw-items-center tw-gap-2 tw-text-[#7E2940] tw-tracking-[2px]" href="tel:+8801894803511"><img class="tw-self-center" src="{{ asset('assets/img/events-and-loyalty/phone-icon.png') }}" alt="email-icon">+8801894803511</a>
        </p>
      </div>
      <div>
        <img src="{{ asset('assets/img/events-and-loyalty/loyalty-program-card.png') }}" alt="loyalty-program-card">
      </div>
    </div>
  </header>
  <section class="tw-container tw-px-4 sm:tw-px-8 md:tw-px-12 lg:tw-px-16 xl:tw-px-4">
  <h2 class="tw-font-bold tw-text-[26px] tw-leading-6 tw-mb-9 tw-text-[#610c21]">Exclusive Membership Benefits & Rewards</h2>
    <div class="tw-mb-6">
      <h3 class="tw-text-[#610c21] tw-font-semibold tw-text-[22px] tw-leading-6 tw-mb-5">Complimentary Stays</h3>
      <p>
        <ul style="list-style: inside;">
          <li class="tw-text-black tw-text-lg tw-leading-10 tw-font-normal"><strong>8 complimentary weekday nights</strong> for two guests (excluding blackout dates & public holidays).</li>
          <li class="tw-text-black tw-text-lg tw-leading-10 tw-font-normal"><strong>2 complimentary weekend nights</strong> for two guests (excluding blackout dates & public holidays).</li>
          <li class="tw-text-black tw-text-lg tw-leading-10 tw-font-normal">Daylong access for <strong>10 guests including lunch</strong> on weekdays (excluding blackout dates & public holidays).</li>
        </ul>
      </p>
    </div>
    <div class="tw-mb-6">
      <h3 class="tw-text-[#610c21] tw-font-semibold tw-text-[22px] tw-leading-6 tw-mb-5">Special Discounts</h3>
      <p>
        <ul style="list-style: inside;">
          <li class="tw-text-black tw-text-lg tw-leading-10 tw-font-normal"><strong>25% off</strong> on weekend stays (excluding blackout dates & public holidays).</li>
        </ul>
      </p>
    </div>
    <div class="tw-mb-6">
      <h3 class="tw-text-[#610c21] tw-font-semibold tw-text-[22px] tw-leading-6 tw-mb-5">Dining Privileges</h3>
      <p>
        <ul style="list-style: inside;">
          <li class="tw-text-black tw-text-lg tw-leading-10 tw-font-normal"><strong>10% off</strong> buffet & à la carte dining for groups of up to <strong>10 guests.</strong></li>
          <li class="tw-text-black tw-text-lg tw-leading-10 tw-font-normal"><strong>10% off</strong> on all food & beverages for groups of up to <strong>10 guests.</strong></li>
        </ul>
      </p>
    </div>
    <div class="tw-mb-6">
      <h3 class="tw-text-[#610c21] tw-font-semibold tw-text-[22px] tw-leading-6 tw-mb-5">Exclusive Rewards</h3>
      <p>
        <ul style="list-style: inside;">
          <li class="tw-text-black tw-text-lg tw-leading-10 tw-font-normal">Spend <strong>BDT 3 lac</strong> within one year and receive 1 complimentary night stay for two at our luxurious Superior King/Twin Rooms.</li>
          <li class="tw-text-black tw-text-lg tw-leading-10 tw-font-normal">Spend <strong>BDT 5 lac</strong> within one year and enjoy 2 complimentary nights stay for two at our Superior King/Twin Rooms.</li>
        </ul>
      </p>
    </div>
    <div class="tw-mb-16">
      <h3 class="tw-text-[#610c21] tw-font-semibold tw-text-[22px] tw-leading-6 tw-mb-5">For Membership</h3>
      <p class="tw-text-black tw-text-lg tw-leading-10 tw-font-normal tw-flex tw-items-center tw-justify-start tw-flex-wrap tw-gap-3">
        <span>Hot line : <a class="tw-font-bold tw-text-[#610c21]" href="tel:+8801894803511">+8801894803511</a></span>
        <span>Email : <a class="tw-font-bold tw-text-[#610c21]" href="mailto:reservation@kaziresort.com">reservation@kaziresort.com</a></span>
      </p>
    </div>
  </section>
</main>
@endsection

@section('theme_scripts')
@include('frontend.theme_one_two.include.scripts')
@endsection