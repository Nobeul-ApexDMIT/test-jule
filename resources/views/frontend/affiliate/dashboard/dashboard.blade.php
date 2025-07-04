@extends('frontend.layout')

@section('pageHeading')
  {{ $pageHeading ?? __('Affiliate Dashboard') }}
@endsection

@php
  $metaKeys = "affiliate dashboard, kazi resort affiliate, earnings, referrals";
  $metaDesc = "View your Kazi Resort affiliate dashboard - track your earnings, referrals, and manage your account.";
@endphp

@section('meta-keywords', $metaKeys)
@section('meta-description', $metaDesc)

@section('content')
<main>
  <section class="user-dashboard">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          @include('frontend.affiliate.dashboard.partials.sidebar')
        </div>
        <div class="col-lg-9">
          <div class="user-profile-details">
            <div class="account-info">
              <div class="title">
                <h4>{{ __('Welcome, :name', ['name' => Auth::user()->first_name ?? Auth::user()->username]) }}</h4>
                <p>{{ __('Here is an overview of your affiliate activity.') }}</p>
              </div>
              <div class="main-info">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">{{ __('Your Affiliate Code') }}</h5>
                        <p class="card-text"><strong>{{ $activeAffiliate->affiliate_code }}</strong></p>
                        <p class="card-text"><small>{{ __('Share this code with your audience.') }}</small></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">{{ __('Your Affiliate URL') }}</h5>
                        @php
                            $affiliateUrl = route('index') . '?ref=' . $activeAffiliate->affiliate_code;
                        @endphp
                        <p class="card-text"><a href="{{ $affiliateUrl }}" target="_blank">{{ $affiliateUrl }}</a></p>
                        <p class="card-text"><small>{{ __('Share this link directly.') }}</small></p>
                      </div>
                    </div>
                  </div>
                </div>

                <hr>
                <h5>{{ __('Recent Referrals (Bookings)') }}</h5>
                @if($commissions->isEmpty())
                  <p>{{ __('No referred bookings found yet.') }}</p>
                @else
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>{{ __('Date') }}</th>
                          <th>{{ __('Guest Name') }}</th>
                          <th>{{ __('Booking Value') }}</th>
                          <th>{{ __('Commission Status') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($commissions->take(5) as $commission) {{-- Show recent 5 --}}
                          <tr>
                            <td>{{ $commission->created_at->format('d M, Y') }}</td>
                            <td>{{ $commission->guest_name }}</td>
                            <td>
                                {{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}
                                {{ number_format($commission->booking_value, 2) }}
                                {{ $currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : '' }}
                            </td>
                            <td>
                              @if ($commission->status == 'pending')
                                <span class="badge badge-warning">{{ ucfirst($commission->status) }}</span>
                              @elseif ($commission->status == 'paid')
                                <span class="badge badge-success">{{ ucfirst($commission->status) }}</span>
                              @elseif ($commission->status == 'cancelled')
                                <span class="badge badge-danger">{{ ucfirst($commission->status) }}</span>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  @if($commissions->count() > 5)
                    <div class="text-right mt-2">
                        <a href="{{ route('affiliate.commission.history') }}">{{ __('View All Commission History') }} &raquo;</a>
                    </div>
                  @endif
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
