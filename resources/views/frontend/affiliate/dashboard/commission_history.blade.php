@extends('frontend.layout')

@section('pageHeading')
  {{ $pageHeading ?? __('Commission History') }}
@endsection

@php
  $metaKeys = "affiliate commissions, kazi resort earnings, payment history";
  $metaDesc = "Track your commission earnings and payment history from the Kazi Resort Affiliate Program.";
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
                <h4>{{ __('Commission History') }}</h4>
              </div>
              <div class="main-info">
                @if($commissions->isEmpty())
                  <p>{{ __('No commission records found yet.') }}</p>
                @else
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>{{ __('Date') }}</th>
                          <th>{{ __('Guest Name') }}</th>
                          <th>{{ __('Booking Value') }}</th>
                          <th>{{ __('Commission Rate') }}</th>
                          <th>{{ __('Commission Amount') }}</th>
                          <th>{{ __('Status') }}</th>
                          <th>{{ __('Paid At') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($commissions as $commission)
                          <tr>
                            <td>{{ $commission->created_at->format('d M, Y') }}</td>
                            <td>{{ $commission->guest_name }}</td>
                            <td>
                                {{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}
                                {{ number_format($commission->booking_value, 2) }}
                                {{ $currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : '' }}
                            </td>
                            <td>{{ number_format($commission->commission_rate, 2) }}%</td>
                            <td>
                                {{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}
                                {{ number_format($commission->commission_amount, 2) }}
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
                            <td>{{ $commission->paid_at ? $commission->paid_at->format('d M, Y') : '-' }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="pagination-wrapper">
                    {{ $commissions->links() }}
                  </div>
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
