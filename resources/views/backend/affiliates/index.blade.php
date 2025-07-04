@extends('backend.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('Affiliate Applications') }}</h4>
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
        <a href="#">{{ __('Affiliate Management') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('Applications') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-6">
              <div class="card-title">{{ __('All Affiliate Applications') }}</div>
            </div>
            <div class="col-lg-6">
              <form action="{{ route('admin.affiliates.index') }}" method="GET" class="form-inline float-right">
                <label class="mr-2">{{ __('Filter by Status:') }}</label>
                <select name="status" class="form-control form-control-sm mr-2" onchange="this.form.submit()">
                  <option value="">{{ __('All') }}</option>
                  <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('Pending') }}</option>
                  <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>{{ __('Approved') }}</option>
                  <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>{{ __('Rejected') }}</option>
                </select>
              </form>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($affiliates) == 0)
                <h3 class="text-center mt-2">{{ __('NO APPLICATIONS FOUND') }}</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Mobile') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        <th scope="col">{{ __('Applied On') }}</th>
                        <th scope="col">{{ __('Affiliate Code') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($affiliates as $affiliate)
                        <tr>
                          <td>{{ $affiliate->name }}</td>
                          <td>{{ $affiliate->mobile }}</td>
                          <td>{{ $affiliate->email ?? '-' }}</td>
                          <td>
                            @if ($affiliate->status == 'pending')
                              <span class="badge badge-warning">{{ ucfirst($affiliate->status) }}</span>
                            @elseif ($affiliate->status == 'approved')
                              <span class="badge badge-success">{{ ucfirst($affiliate->status) }}</span>
                            @elseif ($affiliate->status == 'rejected')
                              <span class="badge badge-danger">{{ ucfirst($affiliate->status) }}</span>
                            @endif
                          </td>
                          <td>{{ $affiliate->created_at->format('d M, Y') }}</td>
                          <td>{{ $affiliate->affiliate_code ?? '-' }}</td>
                          <td>
                            <a href="{{ route('admin.affiliates.view', $affiliate->id) }}" class="btn btn-info btn-sm">
                              <i class="fas fa-eye"></i> {{ __('View') }}
                            </a>
                            @if ($affiliate->status == 'pending')
                              <form action="{{ route('admin.affiliates.approve', $affiliate->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to approve this affiliate?');">
                                  <i class="fas fa-check"></i> {{ __('Approve') }}
                                </button>
                              </form>
                              <form action="{{ route('admin.affiliates.reject', $affiliate->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to reject this affiliate?');">
                                  <i class="fas fa-times"></i> {{ __('Reject') }}
                                </button>
                              </form>
                            @elseif ($affiliate->status == 'approved')
                                <form action="{{ route('admin.affiliates.reject', $affiliate->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to move this affiliate to rejected? This will revoke their code.');">
                                    <i class="fas fa-ban"></i> {{ __('Mark Rejected') }}
                                    </button>
                                </form>
                            @elseif ($affiliate->status == 'rejected')
                                <form action="{{ route('admin.affiliates.approve', $affiliate->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to approve this (previously rejected) affiliate?');">
                                    <i class="fas fa-check"></i> {{ __('Re-Approve') }}
                                    </button>
                                </form>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="card-footer">
          {{ $affiliates->appends(['status' => request('status')])->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
