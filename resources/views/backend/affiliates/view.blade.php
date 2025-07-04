@extends('backend.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('View Affiliate Application') }}</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{ route('admin.dashboard') }}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.affiliates.index') }}">{{ __('Affiliate Applications') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('View Application') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            {{ __('Application Details for') }} "{{ $affiliate->name }}"
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <table class="table table-striped table-bordered">
                <tbody>
                  <tr>
                    <th style="width: 200px;">{{ __('Name') }}</th>
                    <td>{{ $affiliate->name }}</td>
                  </tr>
                  <tr>
                    <th>{{ __('Mobile Number') }}</th>
                    <td>{{ $affiliate->mobile }}</td>
                  </tr>
                  <tr>
                    <th>{{ __('Email Address') }}</th>
                    <td>{{ $affiliate->email ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>{{ __('Occupation') }}</th>
                    <td>{{ $affiliate->occupation ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>{{ __('About Yourself') }}</th>
                    <td>{{ $affiliate->about_me ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>{{ __('Why Join Affiliate Program') }}</th>
                    <td>{{ $affiliate->why_join ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>{{ __('Application Date') }}</th>
                    <td>{{ $affiliate->created_at->format('F d, Y h:i A') }}</td>
                  </tr>
                  <tr>
                    <th>{{ __('Current Status') }}</th>
                    <td>
                      @if ($affiliate->status == 'pending')
                        <span class="badge badge-warning">{{ ucfirst($affiliate->status) }}</span>
                      @elseif ($affiliate->status == 'approved')
                        <span class="badge badge-success">{{ ucfirst($affiliate->status) }}</span>
                      @elseif ($affiliate->status == 'rejected')
                        <span class="badge badge-danger">{{ ucfirst($affiliate->status) }}</span>
                      @endif
                    </td>
                  </tr>
                  @if ($affiliate->status == 'approved')
                    <tr>
                      <th>{{ __('Affiliate Code') }}</th>
                      <td><strong>{{ $affiliate->affiliate_code }}</strong></td>
                    </tr>
                    <tr>
                      <th>{{ __('Affiliate URL') }}</th>
                      <td><a href="{{ url('/book-now?ref=' . $affiliate->affiliate_code) }}" target="_blank">{{ url('/book-now?ref=' . $affiliate->affiliate_code) }}</a></td>
                    </tr>
                    <tr>
                      <th>{{ __('Approved On') }}</th>
                      <td>{{ $affiliate->approved_at ? $affiliate->approved_at->format('F d, Y h:i A') : '-' }}</td>
                    </tr>
                     <tr>
                      <th>{{ __('Associated User ID') }}</th>
                      <td>{{ $affiliate->user_id ?? 'Not linked' }}</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          @if ($affiliate->status == 'pending')
            <form action="{{ route('admin.affiliates.approve', $affiliate->id) }}" method="POST" class="d-inline-block mr-2">
              @csrf
              <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to approve this affiliate?');">
                <i class="fas fa-check"></i> {{ __('Approve Application') }}
              </button>
            </form>
            <form action="{{ route('admin.affiliates.reject', $affiliate->id) }}" method="POST" class="d-inline-block">
              @csrf
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to reject this affiliate?');">
                <i class="fas fa-times"></i> {{ __('Reject Application') }}
              </button>
            </form>
          @elseif ($affiliate->status == 'approved')
            <form action="{{ route('admin.affiliates.reject', $affiliate->id) }}" method="POST" class="d-inline-block">
                @csrf
                <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to mark this affiliate as rejected? This will revoke their code.');">
                <i class="fas fa-ban"></i> {{ __('Mark as Rejected') }}
                </button>
            </form>
          @elseif ($affiliate->status == 'rejected')
            <form action="{{ route('admin.affiliates.approve', $affiliate->id) }}" method="POST" class="d-inline-block mr-2">
                @csrf
                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to re-approve this affiliate?');">
                <i class="fas fa-check"></i> {{ __('Re-Approve Application') }}
                </button>
            </form>
          @endif
          <a href="{{ route('admin.affiliates.index', ['status' => $affiliate->status]) }}" class="btn btn-secondary">{{ __('Back to List') }}</a>
        </div>
      </div>
    </div>
  </div>
@endsection
