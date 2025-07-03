@extends('frontend.updated_layout')
@section('styles')
@include('frontend.theme_one_two.include.styles')
@endsection
@section('pageHeading')
  Events & Meetings
@endsection

@php
$metaKeys = !empty($seo->meta_keyword_contact_us) ? $seo->meta_keyword_contact_us : '';
$metaDesc = !empty($seo->meta_description_contact_us) ? $seo->meta_description_contact_us : '';
@endphp

@section('meta-keywords', "$metaKeys")
@section('meta-description', "$metaDesc")

@section('meta-alt-description', "Plan your dream event at Kazi Resort in Gazipur. Ideal for weddings, retreats & celebrations with eco charm, scenic views & top facilities.")
@section('meta-alt-keywords', "corporate events venue gazipur, meeting rooms gazipur, conference hall dhaka, business events bangladesh, team building venue gazipur, corporate retreat gazipur, seminar hall bangladesh, workshop venue dhaka")


@section('content')
<main>
  <header class="tw-container tw-py-8 tw-pb-16 tw-flex tw-items-center tw-justify-center tw-flex-col">
    <h1 class="tw-text-[40px] tw-leading-[40px] tw-text-[#610c21] tw-flex tw-items-start tw-flex-col tw-gap-3 tw-max-w-[400px]">
      <span class="tw-text-center tw-font-bold">Events & Meetings</span>
      <span class="tw-ml-[2px] tw-w-16 tw-h-[2px] tw-bg-[#610c21]"></span>
    </h1>
    <p class="tw-text-black tw-text-lg tw-font-medium tw-text-center">Kazi Resort offers versatile event facilities for conferences, workshops, training, anniversaries, and birthdays. With three modern halls and a spacious outdoor area accommodating up to 1500 guests, it's the ideal venue for large gatherings in Gazipur. Our boardroom is also perfect for business meetings and private events.</p>
  </header>
  <section class="tw-bg-[#610c21] tw-py-8">
    <div class="tw-container tw-grid tw-grid-cols-3 max-lg:tw-grid-cols-4 max-lg:tw-grid-rows-2 max-lg:tw-gap-y-4">
      <div class="tw-col-span-1 max-lg:tw-col-span-2 max-lg:tw-row-start-1 max-lg:tw-row-end-2 tw-flex tw-items-center tw-justify-center tw-flex-col tw-border-r-2 tw-border-r-white tw-gap-3">
        <p class="tw-font-normal tw-text-white tw-text-base tw-leading-4">No. of Event Spaces</p>
        <h2 class="tw-text-white tw-font-bold tw-text-3xl">03</h2>
      </div>
      <div class="tw-col-span-1 max-lg:tw-col-span-2 max-lg:tw-row-start-1 max-lg:tw-row-end-2 tw-flex tw-items-center tw-justify-center tw-flex-col lg:tw-border-r-2 tw-border-r-white tw-gap-3">
        <p class="tw-font-normal tw-text-white tw-text-base tw-leading-4">Total Capacity</p>
        <h2 class="tw-text-white tw-font-bold tw-text-3xl">500+</h2>
      </div>
      <div class="tw-col-span-1 max-lg:tw-col-span-4 max-lg:tw-row-start-2 max-lg:tw-row-end-3 tw-flex tw-items-center tw-justify-center tw-flex-col tw-gap-3">
        <p class="tw-font-normal tw-text-white tw-text-base tw-leading-4">Book Your Event</p>
        <h2 class="tw-text-white tw-font-bold tw-text-3xl">
          <a href="tel:+8801894803511">+880 1894 803511</a>
        </h2>
      </div>
    </div>
  </section>
  <section class="tw-container tw-py-16 tw-flex tw-flex-col tw-gap-16">

      <!-- meeting-event-1 -->
      <article class="tw-flex tw-flex-col lg:tw-grid tw-grid-cols-5 tw-grid-rows-1 max-lg:tw-grid-rows-2 tw-shadow-xl tw-rounded-lg tw-overflow-hidden xl:tw-aspect-[2.99/1]">
        <div class="tw-col-span-5 tw-row-span-1 lg:tw-col-span-3 tw-overflow-hidden tw-flex tw-items-center tw-justify-center">
          <img class="tw-w-full tw-block lg:tw-hidden" src="{{ asset('assets/img/events-and-loyalty/meeting-img-1-sm.png') }}">
          <img class="tw-w-full tw-hidden lg:tw-block" src="{{ asset('assets/img/events-and-loyalty/meeting-img-1.png') }}">
        </div>
        <div class="tw-col-span-5 tw-row-span-1 lg:tw-col-span-2 tw-py-8 tw-px-10 tw-flex tw-items-start tw-justify-center tw-flex-col tw-bg-gradient-to-r tw-from-gray-50 tw-to-white">
          <p class="tw-text-[#DCA900] tw-font-semibold tw-text-sm tw-mb-1">PREMIUM</p>
          <h2 class="tw-text-[#610c21] tw-font-bold tw-text-[26px] tw-leading-[26px] tw-mb-5">Conference Hall</h2>
          <p class="tw-text-[#444444] tw-font-semibold tw-text-base tw-mb-5">
            Our conference hall offers the perfect setting for corporate meetings, seminars, workshops, and exclusive private events.
          </p>
          <ul style="list-style: inside;" class="tw-text-base tw-mb-5">
            <li>50 pax <strong>(Square Table - Without Stage)</strong></li>
            <li>60 pax <strong>(Theater Setup)</strong></li>
            <li>25 pax <strong>(U-Shape Setup)</strong></li>
            <li>24 pax <strong>(Classroom Setup)</strong></li>
          </ul>
          <a class="tw-w-full tw-text-center tw-bg-[#610c21] tw-text-white tw-text-base tw-font-bold tw-py-3 tw-rounded-lg" href="{{url('book-now' . '#queries')}}" target="_blank" rel="noopener noreferrer">Book Now</a>
        </div>
      </article>

      <!-- meeting-event-2 -->
      <article class="tw-flex tw-flex-col-reverse lg:tw-grid tw-grid-cols-5 tw-grid-rows-2 lg:tw-grid-rows-1 tw-shadow-xl tw-rounded-lg tw-overflow-hidden xl:tw-aspect-[2.99/1]">
        <div class="tw-col-span-5 max-md:tw-row-start-2 max-md:tw-row-end-3 lg:tw-col-span-2 tw-py-8 tw-px-10 tw-flex tw-items-start tw-justify-center tw-flex-col tw-bg-gradient-to-r tw-from-gray-50 tw-to-white">
          <p class="tw-text-[#DCA900] tw-font-semibold tw-text-sm tw-mb-1">PREMIUM</p>
          <h2 class="tw-text-[#610c21] tw-font-bold tw-text-[26px] tw-leading-[26px] tw-mb-5">Hall Room</h2>
          <p class="tw-text-[#444444] tw-font-semibold tw-text-base tw-mb-5">
            Our modern indoor hall room, located beside the wave pool, is perfect for corporate meetings & events.
          </p>
          <ul style="list-style: inside;" class="tw-text-base tw-mb-5">
            <li>Hall room space - 2,714 ft²</li>
            <li>452 people <strong>(Theater Style)</strong></li>
            <li>271 people <strong>(Banquet Style)</strong></li>
            <li>181 people <strong>(Classroom Style)</strong></li>
            <li>Meeting amenities-water, pad, pen/pencil</li>
          </ul>
          <a class="tw-w-full tw-text-center tw-bg-[#610c21] tw-text-white tw-text-base tw-font-bold tw-py-3 tw-rounded-lg" href="{{url('book-now' . '#queries')}}" target="_blank" rel="noopener noreferrer">Book Now</a>
        </div>

        <div class="tw-col-span-5 tw-row-span-1 lg:tw-col-span-3 tw-overflow-hidden tw-flex tw-items-center tw-justify-center">
          <img class="tw-w-full tw-block lg:tw-hidden" src="{{ asset('assets/img/events-and-loyalty/meeting-img-2-sm.png') }}">
          <img class="tw-w-full tw-hidden lg:tw-block" src="{{ asset('assets/img/events-and-loyalty/meeting-img-2.png') }}">
        </div>
      </article>
      <!-- meeting-event-3 -->
      <article class="tw-flex tw-flex-col lg:tw-grid tw-grid-cols-5 tw-grid-rows-2 lg:tw-grid-rows-1 tw-shadow-xl tw-rounded-lg tw-overflow-hidden xl:tw-aspect-[2.99/1]">
        <div class="tw-col-span-5 tw-row-span-1 lg:tw-col-span-3 tw-overflow-hidden tw-flex tw-items-center tw-justify-center">
          <img class="tw-w-full tw-block lg:tw-hidden" src="{{ asset('assets/img/events-and-loyalty/meeting-img-3-sm.png') }}">
          <img class="tw-w-full tw-hidden lg:tw-block" src="{{ asset('assets/img/events-and-loyalty/meeting-img-3.png') }}">
        </div>
        <div class="tw-col-span-5 lg:tw-col-span-2 tw-py-8 tw-px-10 tw-flex tw-items-start tw-justify-center tw-flex-col tw-bg-gradient-to-r tw-from-gray-50 tw-to-white">
          <p class="tw-text-[#DCA900] tw-font-semibold tw-text-sm tw-mb-1">PREMIUM</p>
          <h2 class="tw-text-[#610c21] tw-font-bold tw-text-[26px] tw-leading-[26px] tw-mb-5">Meeting Room</h2>
          <p class="tw-text-[#444444] tw-font-semibold tw-text-base tw-mb-5">
            Our meeting  room is perfectly suited for business meetings, and private functions.
          </p>
          <ul style="list-style: inside;" class="tw-text-base tw-mb-5">
            <li>Board style 40 seating</li>
            <li>Length - 40' | Width - 22' </li>
            <li>Hi-resolution built-in projector and screen</li>
            <li>Desktop Microphone, Audio-visual</li>
            <li>Meeting amenities-water, pad, pen/pencil</li>
          </ul>
          <a class="tw-w-full tw-text-center tw-bg-[#610c21] tw-text-white tw-text-base tw-font-bold tw-py-3 tw-rounded-lg" href="{{url('book-now' . '#queries')}}" target="_blank" rel="noopener noreferrer">Book Now</a>
        </div>
      </article>
  </section>
</main>
@endsection

@section('theme_scripts')
@include('frontend.theme_one_two.include.scripts')
@endsection