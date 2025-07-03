@extends('frontend.layout')
@section('styles')
@include('frontend.theme_one_two.include.styles')
@endsection


@php
$metaKeys = !empty($seo->meta_keyword_contact_us) ? $seo->meta_keyword_contact_us : '';
$metaDesc = !empty($seo->meta_description_contact_us) ? $seo->meta_description_contact_us : '';
@endphp

@section('meta-keywords', "$metaKeys")
@section('meta-description', "$metaDesc")

@section('meta-alt-description', "Promote Kazi Resort via our Affiliate Program and earn for every successful Gazipur referral. Share and get rewarded—start now!")
@section('meta-alt-keywords', "resort affiliate program, hotel partnership bangladesh, tourism affiliate gazipur, hospitality partnership dhaka, business partnership resort, affiliate marketing hotel, tourism business bangladesh, hospitality network gazipur")

@section('content')
<main>
  <style>
    .affiliate-blog-content {
      margin-bottom: 30px;

      section {
        margin-bottom: 16px;

        h2 {
          font-family: "Open Sans";
          color: #610C21;
          font-weight: 700;
          font-size: 22px;
          line-height: 25px;
          vertical-align: middle;
          margin-bottom: 20px;
        }

        p {
          color: black;
          font-weight: 400;
          font-size: 16px;
          line-height: 28px;
          margin-bottom: 34px;
        }

        ul {
          list-style: disc;
          padding-left: 28px;
          margin-bottom: 34px;

          li {
            color: black;
            font-weight: 400;
            font-size: 16px;
            line-height: 32px;
          }
        }
      }

    }

    .header {
      padding: 50px;
      background-image: url("/assets/img/affiliate-program/affiliate-program-header-bg.png");
      background-repeat: no-repeat;
      background-position: center;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 53px;

      .img-wrapper {
        width: fit-content;
        padding-right: 10px;
        margin-bottom: 32px;
        backdrop-filter: blur(1px);

        img {
          max-width: 80%;
        }
      }
    }

    .btn-wrapper {
      margin-top: 30px;
    }
  </style>
  <article>
    <div class="header container">
      <div class="img-wrapper">
        <img src="/assets/img/affiliate-program/header-logo.png" alt="header-logo">
      </div>
      <div style="display: flex; flex-direction: column; gap:8px;">
        <span style="font-weight: 600 !important; font-size: 32px !important; line-height: 32px !important; color: white !important; font-family: Montserrat, sans-serif !important;">Kazi Resort</span>
        <h1 style="font-weight: 700 !important; font-size: 44px !important; line-height: 44px !important; color: white !important; margin: 0 !important;">Affiliate Program</h1>
      </div>
    </div>

    <div class="content container affiliate-blog-content">
      <section>
        <h2>Why Join Us?</h2>
        <p>Becoming a Kazi Resort Affiliate means joining a network of like-minded individuals who share a love for nature, comfort, and extraordinary getaways. Together, we can inspire more people to explore and unwind!</p>
      </section>

      <section>
        <h2>What is The Kazi Resort Affiliate Program?</h2>

        <ul>
          <li>Through the Kazi Resort Affiliate Program, you can earn commissions by promoting Kazi Resort's exclusive experiences.</li>
          <li>We are excited to welcome you to our Affiliate Program! If you're passionate about adventure, relaxation, and making a positive impact while earning rewards, this is your chance to be part of our growing community.</li>
          <li>Affiliates can earn up to 10% commission on valid sales based on your referrals.</li>
        </ul>

      </section>

      <section>
        <h2>Benefits of the Kazi Resort Affiliate Program</h2>

        <ul>
          <li>Earn up to 10% commission on all valid sales</li>
          <li>Exclusive access to Kazi Resort's latest experiences, promotions, and events</li>
          <li>Be among the first to experience and share exciting new resort activities</li>
          <li>Recognition as an affiliate with a unique Identity Card and Badge from Kazi Resort</li>
          <li>Special promotional materials to enhance your marketing efforts</li>
          <li>24/7 support from our Sales Team</li>
          <li>Frequent updates on new offers and experiences</li>
          <li>Performance-based rewards for top affiliate sough the Kazi Resort Affiliate Program</li>
          <li>2 complimentary weekday nights for two guests <span style="font-style: italic;font-size: 13px;font-weight: bold;">(Excluding blackout dates & public holidays).</span> <span style="font-size: 10px;color: #610c21;font-weight:bold;">*T&C Apply</span></li>
          <li>Daylong access for 5 guests including lunch on weekdays <span style="font-style: italic;font-size: 13px;font-weight: bold;">(Excluding blackout dates & public holidays).</span> <span style="font-size: 10px;color: #610c21;font-weight:bold;">*T&C Apply</span></li>
        </ul>

      </section>

      <section>
        <h2>Ready to Join?</h2>
        <p style="font-weight: 700; font-size: 16px; line-height: 32px; letter-spacing: 0%;">Apply today and become a part of the Kazi Resort Affiliate Program to start earning while sharing your love for unforgettable experiences!</p>
      </section>

      <div class="btn-wrapper">
        <a style="display: inline-block; padding-inline: 27px; padding-block: 19px; background-color: #610C21; color: white; font-size: 14px; font-weight: 700; line-height: 16px;" href="{{ url('affiliate-program-contact-form') }}" target="__blank">Apply Now</a>
      </div>
    </div>
  </article>

</main>
@endsection

@section('theme_scripts')
@include('frontend.theme_one_two.include.scripts')
@endsection