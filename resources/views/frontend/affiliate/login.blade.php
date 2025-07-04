@extends('frontend.layout')

@section('pageHeading')
  {{ __('Affiliate Login') }}
@endsection

@section('content')
<main>
  <section class="user-dashboard">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="store-user-from">
            <div class="title text-center">
              <h1>{{ __('Affiliate Login') }}</h1>
              <p>{{ __('Login using your registered mobile number and OTP.') }}</p>
            </div>

            @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('info'))
              <div class="alert alert-info">{{ session('info') }}</div>
            @endif
            @if (session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('affiliate.login.send_otp') }}" method="POST" class="mt-4">
              @csrf
              <div class="form_group">
                <label>{{ __('Registered Mobile Number') }} <span>*</span></label>
                <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required placeholder="e.g., 01xxxxxxxxx">
                @error('mobile')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="form_group">
                <button type="submit" class="btn filled-btn btn-block">{{ __('Send OTP') }}</button>
              </div>
            </form>
            <div class="mt-4 text-center">
                <p>{{ __("Don't have an affiliate account?") }} <a href="{{ url('/affiliate-program') }}">{{ __('Apply Here') }}</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
