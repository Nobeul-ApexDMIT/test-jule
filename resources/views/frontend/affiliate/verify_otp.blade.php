@extends('frontend.layout')

@section('styles')
  {{-- Content copied from resources/views/frontend/theme_one_two/include/styles.blade.php --}}
  {{-- bootstrap css --}}
  <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/bootstrap.min.css') }}">

  {{-- jQuery-ui css --}}
  <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/jquery-ui.min.css') }}">

  {{-- plugins css --}}
  <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/plugins.min.css') }}">

  {{-- default css --}}
  <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/default.css') }}">

  {{-- main css --}}
  <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/main.css') }}">

  {{-- responsive css --}}
  <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/responsive.css') }}">

  {{-- right-to-left css --}}
  @if ($currentLanguageInfo->direction == 1)
    <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/rtl-responsive.css') }}">
    <style>
      .header-area.header-1::before {
        right: 0;
      }
      .footer-area .footer-widget .footer-links a::before {
        right: 0;
      }
    </style>
  @endif

  {{-- These additional theme checks might be relevant if the site can switch themes dynamically --}}
  @if (isset($websiteInfo) && ($websiteInfo->theme_version == 'theme_three' || $websiteInfo->theme_version == 'theme_four'))
    <link rel="stylesheet" href="{{ asset('front/theme_three/assets/css/vendors/bootstrap.min.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('front/theme_three/assets/css/style.css') }}">
  @endif
  @if (isset($websiteInfo) && $websiteInfo->theme_version == 'theme_five')
   <link rel="stylesheet" href="{{ asset('front/theme_five/assets/css/vendors/bootstrap.min.css') }}">
    <!-- Main Style CSS -->
   <link rel="stylesheet" href="{{ asset('front/theme_five/assets/css/style.css') }}">
  @endif
@endsection

@section('pageHeading')
  {{ __('Verify OTP') }}
@endsection

@section('content')
<main>
  <section class="user-dashboard" style="padding-top: 80px; padding-bottom: 80px;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="store-user-from" style="padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
            <div class="title text-center mb-4">
              <h1>{{ __('Verify OTP') }}</h1>
              <p>{{ __('An OTP has been sent to your mobile number:') }} <strong>{{ $mobile ?? session('otp_mobile') }}</strong></p>
            </div>

            @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('info'))
              <div class="alert alert-info">{{ session('info') }}</div>
            @endif

            <form action="{{ route('affiliate.otp.verify') }}" method="POST" class="mt-4">
              @csrf
              <input type="hidden" name="mobile" value="{{ $mobile ?? session('otp_mobile') }}">

              <div class="form-group">
                <label for="otp">{{ __('Enter OTP') }} <span>*</span></label>
                <input type="text" id="otp" class="form-control" name="otp" value="{{ old('otp') }}" required placeholder="xxxxxx" maxlength="6">
                @error('otp')
                  <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Verify & Login') }}</button>
              </div>
            </form>
            <div class="mt-3 text-center">
                <a href="{{ route('affiliate.login.form') }}">{{ __('Try with a different mobile number?') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
