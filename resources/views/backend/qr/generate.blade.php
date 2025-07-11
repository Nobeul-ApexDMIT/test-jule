@extends('backend.layout')

@section('styles')
  <style>
    @font-face {
      font-family: "Lato-Regular";
      src: url({{ asset('assets/fonts/Lato-Regular.ttf') }});
    }
  </style>
@endsection

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('QR Code Builder') }}</h4>
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
        <a href="#">{{ __('QR Code Builder') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-lg-7">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ __('Qr Code Generator') }}</h4>
        </div>
        <div class="card-body">
          <form id="qrGeneratorForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  @php
                    $qrUrl = !empty($abs->qr_url) ? $abs->qr_url : url('/');
                  @endphp

                  <label for="">{{ __('URL') }} **</label>
                  <input type="text" class="form-control" name="url" value="{{ $qrUrl }}" onchange="generateQr()">
                  <p class="text-warning mb-0">{{ __('QR Code will be generated for this URL') }}</p>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="">{{ __('Color') }}</label>

                  @php
                    if (empty($abs->qr_color)) {
                      $qrColor = '000000';
                    } else {
                      $qrColor = $abs->qr_color;
                    }
                  @endphp

                  <input type="text" class="form-control jscolor" name="color" value="{{ $qrColor }}" onchange="generateQr()">
                  <p class="mb-0 text-warning">
                    {{ __('If the QR Code cannnot be scanned, then choose a darker color') }}
                  </p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="">{{ __('Size') }}</label>
                  <input class="form-control p-0 range-slider" name="size" type="range" min="200" max="350" value="{{ $abs->qr_size }}" onchange="generateQr()">
                  <span class="text-dark size-text float-right">{{ $abs->qr_size }}</span>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="">{{ __('White Space') }}</label>
                  <input class="form-control p-0 range-slider" name="margin" type="range" min="0" max="5" value="{{ $abs->qr_margin }}" onchange="generateQr()">
                  <span class="text-dark size-text float-right">{{ $abs->qr_margin }}</span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="">{{ __('Style') }}</label>
                  <select name="style" class="form-control" onchange="generateQr()">
                    <option value="square" {{ $abs->qr_style == 'square' ? 'selected' : '' }}>
                      Square
                    </option>
                    <option value="round" {{ $abs->qr_style == 'round' ? 'selected' : '' }}>
                      Round
                    </option>
                  </select>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="">{{ __('Eye Style') }}</label>
                  <select name="eye_style" class="form-control" onchange="generateQr()">
                    <option value="square" {{ $abs->qr_eye_style == 'square' ? 'selected' : '' }}>
                      {{ __('Square') }}
                    </option>
                    <option value="circle" {{ $abs->qr_eye_style == 'circle' ? 'selected' : '' }}>
                      {{ __('Circle') }}
                    </option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="">{{ __('Type') }}</label>
              <select name="type" class="form-control" onchange="generateQr()">
                <option value="default" {{ $abs->qr_type == 'default' ? 'selected' : '' }}>
                  {{ __('Default') }}
                </option>
                <option value="image" {{ $abs->qr_type == 'image' ? 'selected' : '' }}>
                  {{ __('Image') }}
                </option>
                <option value="text" {{ $abs->qr_type == 'text' ? 'selected' : '' }}>
                  {{ __('Text') }}
                </option>
              </select>
            </div>

            <div id="type-image" class="types">
              <div class="form-group">
                <div class="col-12 mb-2">
                  <label for="image"><strong> {{ __('Image') }}</strong></label>
                </div>
                <div class="col-md-12 showImage mb-3">
                  <img src="{{ $abs->qr_inserted_image ? asset('assets/img/qr/' . $abs->qr_inserted_image) : asset('assets/img/noimage.jpg') }}" alt="..." class="img-thumbnail qr">
                </div>
                <input type="file" name="image" id="image" class="form-control" onchange="generateQr()">
              </div>

              <div class="form-group">
                <label for="">{{ __('Image Size') }}</label>
                <input class="form-control p-0 range-slider" name="image_size" type="range" min="1" max="20" value="{{ $abs->qr_inserted_image_size }}" onchange="generateQr()">
                <span class="text-dark size-text float-right d-block">{{ $abs->qr_inserted_image_size }}</span>
                <p class="mb-0 text-warning">{{ __('If the QR Code cannnot be scanned, then reduce this size') }}</p>
              </div>

              <div class="form-group">
                <label for="">{{ __('Image Horizontal Poistion') }}</label>
                <input class="form-control p-0 range-slider" name="image_x" type="range" min="0" max="100" value="{{ $abs->qr_inserted_image_x }}" onchange="generateQr()">
                <span class="text-dark size-text float-right">{{ $abs->qr_inserted_image_x }}</span>
              </div>

              <div class="form-group">
                <label for="">{{ __('Image Vertical Position') }}</label>
                <input class="form-control p-0 range-slider" name="image_y" type="range" min="0" max="100" value="{{ $abs->qr_inserted_image_y }}" onchange="generateQr()">
                <span class="text-dark size-text float-right">{{ $abs->qr_inserted_image_y }}</span>
              </div>
            </div>

            <div id="type-text" class="types">
              <div class="form-group">
                <label>{{ __('Text') }}</label>
                <input type="text" name="text" value="{{ $abs->qr_text }}" class="form-control" onchange="generateQr()">
              </div>

              <div class="form-group">
                <label>{{ __('Text Color') }}</label>

                @php
                  if (empty($abs->qr_text_color)) {
                    $qrTextColor = '000000';
                  } else {
                    $qrTextColor = $abs->qr_text_color;
                  }
                @endphp

                <input type="text" name="text_color" value="{{ $qrTextColor }}" class="form-control jscolor" onchange="generateQr()">
              </div>

              <div class="form-group">
                <label for="">{{ __('Text Size') }}</label>
                <input class="form-control p-0 range-slider" name="text_size" type="range" min="1" max="15" value="{{ $abs->qr_text_size }}" onchange="generateQr()">
                <span class="text-dark size-text float-right d-block">{{ $abs->qr_text_size }}</span>
                <p class="mb-0 text-warning">{{ __('If the QR Code cannnot be scanned, then reduce this size') }}</p>
              </div>

              <div class="form-group">
                <label for="">{{ __('Text Horizontal Poistion') }}</label>
                <input class="form-control p-0 range-slider" name="text_x" type="range" min="0" max="100" value="{{ $abs->qr_text_x }}" onchange="generateQr()">
                <span class="text-dark size-text float-right">{{ $abs->qr_text_x }}</span>
              </div>

              <div class="form-group">
                <label for="">{{ __('Text Vertical Position') }}</label>
                <input class="form-control p-0 range-slider" name="text_y" type="range" min="0" max="100" value="{{ $abs->qr_text_y }}" onchange="generateQr()">
                <span class="text-dark size-text float-right">{{ $abs->qr_text_y }}</span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card bg-white">
        <div class="card-header border-bottom">
          <h4 class="card-title d-inline-block text-dark">{{ __('Preview') }}</h4>
          <button class="btn btn-success float-right" data-toggle="modal" data-target="#saveModal">
            {{ __('Save') }}
          </button>
          <form action="{{ route('admin.qrcode.clear') }}" class="d-inline-block float-right mr-2">
            <button class="btn btn-danger" type="submit">{{ __('Clear') }}</button>
          </form>
        </div>

        <div class="card-body text-center py-5">
          <div class="p-3 border-rounded d-inline-block border bg-light">
            <img id="preview" src="{{ asset('assets/img/qr/' . $abs->qr_image) }}" alt="">
          </div>
        </div>

        <div class="card-footer text-center border-top">
          <a id="downloadBtn" class="btn btn-success" download="qr-image.png" href="{{ asset('assets/img/qr/' . $abs->qr_image) }}">
            {{ __('Download Image') }}
          </a>
        </div>
      </div>
      <span id="text-size" class="invisible">{{ $abs->text }}</span>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="saveModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Save QR Code') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="{{ route('admin.qrcode.save') }}" method="POST" id="qrSaveForm">
            @csrf
            <label for="">{{ __('Name') }} **</label>
            <input name="name" type="text" class="form-control" required>
            <p class="text-warning mb-0">
              {{ __('This name will be used to identify this specific QR Code from the QR Codes List') }}
            </p>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            {{ __('Close') }}
          </button>
          <button type="submit" form="qrSaveForm" class="btn btn-success">
            {{ __('Save') }}
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    "use strict";
    var qrGenUrl = "{{ route('admin.qrcode.generate') }}";
  </script>

  <script src="{{ asset('assets/js/qr.js') }}"></script>
@endsection
