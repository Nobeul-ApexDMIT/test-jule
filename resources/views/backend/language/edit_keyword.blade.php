@extends('backend.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('backend.partials.rtl_style')

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('Edit Keyword') }}</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('Language Management') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('Edit Keyword') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">
            {{ $language->name . ' ' . __('Language\'s Keywords') }}
          </div>
          <a
            class="btn btn-info btn-sm float-right d-inline-block"
            href="{{ route('admin.languages') }}"
          >
            <span class="btn-label">
              <i class="fas fa-backward" style="font-size: 12px;"></i>
            </span>
            {{ __('Back') }}
          </a>
        </div>

        <div class="card-body pt-5 pb-5">
          <div class="row">
            <div class="col-lg-12">
              <form
                id="languageKeywordForm"
                action="{{ route('admin.languages.update_keyword', ['id' => $language->id]) }}"
                method="post"
              >
                @csrf
                <div class="row">
                  @foreach ($keywords as $keyword => $value)
                    <div class="col-md-4 mt-2">
                      <div class="form-group">
                        <label class="control-label" style="white-space: normal;">
                          {{ $loop->iteration . '. ' . $keyword }}
                        </label>

                        <div class="input-group">
                          {{-- here 'keyValues[]' used to take input's name with white space --}}
                          <input
                            class="form-control form-control-lg"
                            type="text"
                            name="keyValues[{{ $keyword }}]"
                            value="{{ $value }}"
                          >
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="form">
            <div class="row">
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-success" form="languageKeywordForm">
                  {{ __('Update') }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
