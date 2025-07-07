@extends('frontend.layout')

@section('styles')
  {{-- Basic Bootstrap for structure and core styles --}}
  <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/bootstrap.min.css') }}">
  {{-- You might need to add your main site CSS if bootstrap alone is not enough --}}
  {{-- e.g., <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/main.css') }}"> --}}
@endsection

@section('pageHeading')
  {{ __('Verify OTP') }}
@endsection

@section('content')
<main>
  <section class="user-dashboard" style="padding-top: 80px; padding-bottom: 80px;"> {{-- Added some padding for visibility --}}
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="store-user-from" style="padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;"> {{-- Basic styling --}}
            <div class="title text-center mb-4"> {{-- Added margin --}}
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

              <div class="form-group"> {{-- Changed from form_group to form-group for Bootstrap --}}
                <label for="otp">{{ __('Enter OTP') }} <span>*</span></label>
                <input type="text" id="otp" class="form-control" name="otp" value="{{ old('otp') }}" required placeholder="xxxxxx" maxlength="6">
                @error('otp')
                  <p class="text-danger mt-1">{{ $message }}</p> {{-- Added mt-1 --}}
                @enderror
              </div>

              <div class="form-group mt-3"> {{-- Added mt-3 --}}
                <button type="submit" class="btn btn-primary btn-block">{{ __('Verify & Login') }}</button> {{-- Changed to btn-primary for bootstrap --}}
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
