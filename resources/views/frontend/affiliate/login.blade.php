@extends('frontend.layout')

@section('styles')
  {{-- Basic Bootstrap for structure and core styles --}}
  <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/bootstrap.min.css') }}">
  {{-- You might need to add your main site CSS if bootstrap alone is not enough --}}
  {{-- e.g., <link rel="stylesheet" href="{{ asset('front/theme_one_two/assets/css/main.css') }}"> --}}
@endsection

@section('pageHeading')
  {{ __('Affiliate Login') }}
@endsection

@section('content')
<main>
  {{-- This container class might be from your main.css or a theme specific css --}}
  {{-- Re-evaluate if styling is still off after this change. --}}
  <section class="user-dashboard" style="padding-top: 80px; padding-bottom: 80px;"> {{-- Added some padding for visibility --}}
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          {{-- This class might also be from your main.css or theme specific --}}
          <div class="store-user-from" style="padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;"> {{-- Basic styling --}}
            <div class="title text-center mb-4"> {{-- Added margin --}}
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
              <div class="form-group"> {{-- Changed from form_group to form-group for Bootstrap --}}
                <label for="mobile">{{ __('Registered Mobile Number') }} <span>*</span></label>
                <input type="text" id="mobile" class="form-control" name="mobile" value="{{ old('mobile') }}" required placeholder="e.g., 01xxxxxxxxx">
                @error('mobile')
                  <p class="text-danger mt-1">{{ $message }}</p> {{-- Added mt-1 --}}
                @enderror
              </div>

              <div class="form-group mt-3"> {{-- Added mt-3 --}}
                <button type="submit" class="btn btn-primary btn-block">{{ __('Send OTP') }}</button> {{-- Changed to btn-primary for bootstrap --}}
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
