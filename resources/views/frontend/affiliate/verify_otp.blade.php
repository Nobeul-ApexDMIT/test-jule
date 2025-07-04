@extends('frontend.layout')

@section('pageHeading')
  {{ __('Verify OTP') }}
@endsection

@section('content')
<main>
  <section class="user-dashboard">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="store-user-from">
            <div class="title text-center">
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

              <div class="form_group">
                <label>{{ __('Enter OTP') }} <span>*</span></label>
                <input type="text" class="form-control" name="otp" value="{{ old('otp') }}" required placeholder="xxxxxx" maxlength="6">
                @error('otp')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="form_group">
                <button type="submit" class="btn filled-btn btn-block">{{ __('Verify & Login') }}</button>
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
