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

@section('meta-alt-description', "Join our Affiliate Program—just fill out a short form and start earning by promoting Gazipur's best eco resort: Kazi Resort.")
@section('meta-alt-keywords', "affiliate contact resort, partnership inquiry gazipur, business collaboration bangladesh, affiliate application form, partnership contact dhaka, business inquiry resort")

@section('content')
<main>
  <style>

    .header {
      margin-top: 16px;
      padding: 50px;
      background-image: url("/assets/img/affiliate-program/affiliate-program-header-bg.png");
      background-repeat: no-repeat;
      background-position: center;
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 56px;

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

  </style>

  <header class="header container">
    <div class="img-wrapper">
      <img src="/assets/img/affiliate-program/header-logo.png" alt="header-logo">
    </div>
    <div style="display: flex; flex-direction: column; gap:8px;">
      <span style="font-weight: 600 !important; font-size: 32px !important; line-height: 32px !important; color: white !important; font-family: Montserrat, sans-serif !important;">Kazi Resort</span>
      <h1 style="font-weight: 700 !important; font-size: 44px !important; line-height: 44px !important; color: white !important; margin: 0 !important;">Affiliate Program</h1>
    </div>
  </header>

  <div class="form-head container-fluid" style="background-color: #610C21; padding-block: 24px;">
    <h2 style="font-weight: 600; font-size: 25px; line-height: 25px; text-align: center; color:white">Kazi Resort  Affiliate Program Form</h2>
  </div>
  
  <section style="background-color: #f5f5f5; padding-block: 24px; margin-top: 15px; margin-bottom: 45px;">
    <div style="max-width: 900px; margin-inline: auto; padding-inline: 15px;">
    <form action="{{ url('affiliate-program-contact-form') }}" class="d-flex flex-column" method="post">
      @csrf
      <div class="row" style="row-gap: 12px; margin-bottom: 20px;">
        <div class="col-12 col-md-6 col-xl-6">
          <label style="color: #353535; font-size: 15px; font-weight: 700; line-height: 22.5px; margin-bottom: 12px;" for="name">Name <sup style="color: #274eb1;">*</sup></label>
          <input style="height: 48px; border: 1px solid #dddddd; background: white; border-radius: 0;" type="text" id="name" name="name" value="{{ old('name') }}">
          @error('name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-12 col-md-6 col-xl-6">
          <label style="color: #353535; font-size: 15px; font-weight: 700; line-height: 22.5px; margin-bottom: 12px;" for="contact_number">Contact Number <sup style="color: #274eb1;">*</sup></label>
          <input style="height: 48px; border: 1px solid #dddddd; background: white; border-radius: 0;" type="text" id="contact_number" name="contact_number" value="{{ old('contact_number') }}">
          @error('contact_number')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="row" style="row-gap: 12px; margin-bottom: 20px;">
        <div class="col-12 col-md-6">
          <label style="color: #353535; font-size: 15px; font-weight: 700; line-height: 22.5px; margin-bottom: 12px;" for="email">Email</label>
          <input style="height: 48px; border: 1px solid #dddddd; background: white; border-radius: 0;" type="email" id="email" name="email" value="{{ old('email') }}">
          @error('email')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-12 col-md-6">
          <label style="color: #353535; font-size: 15px; font-weight: 700; line-height: 22.5px; margin-bottom: 12px;" for="occupation">Occupation <sup style="color: #274eb1;">*</sup></label>
          <input style="height: 48px; border: 1px solid #dddddd; background: white; border-radius: 0;" type="text" id="occupation" name="occupation" value="{{ old('occupation') }}">
          @error('occupation')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="row" style="row-gap: 12px; margin-bottom: 20px;">
        <div class="col-12">
          <label style="color: #353535; font-size: 15px; font-weight: 700; line-height: 22.5px; margin-bottom: 12px;" for="yourself">Write About Yourself?</label>
          <textarea style="border: 1px solid #dddddd; background: white; border-radius: 0; height: 75px;" name="yourself" id="yourself" rows="1">{{ old('yourself') }}</textarea>
          @error('yourself')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="row" style="row-gap: 12px; margin-bottom: 20px;">
        <div class="col-12">
          <label style="color: #353535; font-size: 15px; font-weight: 700; line-height: 22.5px; margin-bottom: 12px;" for="why_affiliate">Why do you want to join our Affiliate Programme?</label>
          <textarea style="border: 1px solid #dddddd; background: white; border-radius: 0;height: 75px;" name="why_affiliate" id="why_affiliate" placeholder="" rows="1">{{ old('why_affiliate') }}</textarea>
          @error('why_affiliate')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div style="display: flex; align-items: center; justify-content: flex-end;">
        <button style="display: flex; align-items: center; justify-content: center; gap: 5px; font-size: 14px; line-height: 16px; font-weight: 600; border: none; outline: none; padding-inline: 27px; padding-block: 18px; color: white; background-color: #610C21;" type="submit"><img src="/assets/img/affiliate-program/submit-btn.svg" alt="submit-btn"> SUBMIT</button>
      </div>
    </form>
    </div>
  </section>
</main>
@endsection

@section('theme_scripts')
@include('frontend.theme_one_two.include.scripts')
@endsection