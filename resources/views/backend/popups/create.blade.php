@extends('backend.layout')

@section('content')
<div class="page-header">
    <h4 class="page-title">Announcement Popup</h4>
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
            <a href="#">Basic Settings</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Announcement Popup</a>
        </li>
    </ul>
</div>
@php
    $type = request()->input('type');
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card-title">Add Popup (Type - {{$type}})</div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-5 pb-5">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">

                        <form id="ajaxForm" class="modal-form" action="{{route('admin.popup.store')}}" method="post">
                            @csrf

                            <input type="hidden" name="type" value="{{$type}}">

                            @if ($type == 1 || $type == 4 || $type == 5 || $type == 7)

                                {{-- Image Part --}}
                                <div class="form-group">
                                    <label for="">Image ** </label>
                                    <br>
                                    <div class="thumb-preview" id="thumbPreview1">
                                        <img src="{{asset('assets/img/noimage.jpg')}}" alt="Image">
                                    </div>
                                    <br>
                                    <br>


                                    <input id="fileInput1" type="hidden" name="image">
                                    <button id="chooseImage1" class="choose-image btn btn-primary" type="button" data-multiple="false" data-toggle="modal" data-target="#lfmModal1">Choose Image</button>


                                    <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                                    <p class="em text-danger mb-0" id="err_image"></p>

                                </div>
                            @endif

                            @if ($type == 2 || $type == 3 || $type == 6)
                            {{-- Background Image Part --}}
                            <div class="form-group">
                                <label for="">Background Image ** </label>
                                <br>
                                <div class="thumb-preview" id="thumbPreview2">
                                    <img src="{{asset('assets/img/noimage.jpg')}}" alt="Background Image">
                                </div>
                                <br>
                                <br>


                                <input id="fileInput2" type="hidden" name="background_image">
                                <button id="chooseImage2" class="choose-image btn btn-primary" type="button" data-multiple="false" data-toggle="modal" data-target="#lfmModal2">Choose Image</button>


                                <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                                <p class="em text-danger mb-0" id="err_background_image"></p>

                            </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Language **</label>
                                        <select name="language_id" class="form-control">
                                            <option value="" selected disabled>Select a language</option>
                                            @foreach ($langs as $lang)
                                            <option value="{{$lang->id}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                        <p id="err_language_id" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Popup Name **</label>
                                        <input type="text" class="form-control" name="name" value="" placeholder="Enter Name">
                                        <p class="text-warning mb-0">This will not be shown in the popup in Website, it will help you to indentify the popup in Admin Panel.</p>
                                        <p id="err_name" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                            </div>


                            @if ($type == 2 || $type == 3 || $type == 4 || $type == 5 || $type == 6 || $type == 7)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Title </label>
                                        <input type="text" class="form-control" name="title" value="" placeholder="Enter Title">
                                        <p id="err_title" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Text </label>
                                        <textarea class="form-control" name="text" cols="30" rows="3" placeholder="Enter Text"></textarea>
                                        <p id="err_text" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($type == 6 || $type == 7)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">End Date **</label>
                                        <input type="text" class="form-control ltr datepicker" name="end_date" value="" placeholder="Enter End Date" readonly autocomplete="off">
                                        <p id="err_end_date" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">End Time **</label>
                                        <input type="text" class="form-control ltr timepicker" name="end_time" value="" placeholder="Enter End Time" readonly autocomplete="off" data-start="10:00am" data-interval="30">
                                        <p id="err_end_time" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($type == 2 || $type == 3)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Background Color Code **</label>
                                        <input class="jscolor form-control ltr" name="background_color" value="451d53">
                                        <p class="em text-danger mb-0" id="err_background_color"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Background Color Opacity **</label>
                                        <input type="number" class="form-control ltr" name="background_opacity" value="" placeholder="Enter Opacity Value">
                                        <p id="err_background_opacity" class="mb-0 text-danger em"></p>
                                        <ul class="mb-0">
                                            <li class="text-warning mb-0">Value must be between 0 to 1</li>
                                            <li class="text-warning mb-0">The more the opacity value is, the less the trnsparency level will be.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($type == 7)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Background Color Code **</label>
                                        <input class="jscolor form-control ltr" name="background_color" value="451d53">
                                        <p class="em text-danger mb-0" id="err_background_color"></p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($type == 2 || $type == 3 || $type == 4 || $type == 5 || $type == 6 || $type == 7)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Button Text </label>
                                        <input type="text" class="form-control" name="button_text" value="" placeholder="Enter Button Text">
                                        <p id="err_button_text" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Button Color </label>
                                        <input type="text" class="form-control jscolor ltr" name="button_color" value="451d53" placeholder="Enter Button Color">
                                        <p id="err_button_color" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($type == 2 || $type == 4 || $type == 6 || $type == 7)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Button URL </label>
                                            <input type="text" class="form-control ltr" name="button_url" value="" placeholder="Enter Button URL">
                                            <p id="err_button_url" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="">Delay (miliseconds) **</label>
                                <input type="number" class="form-control ltr" name="delay" value="" placeholder="Enter Serial Number">
                                <p id="err_delay" class="mb-0 text-danger em"></p>
                                <p class="text-warning mb-0">This will decide the delay time to show the popup</p>
                            </div>
                            <div class="form-group">
                                <label for="">Serial Number **</label>
                                <input type="number" class="form-control ltr" name="serial_number" value="" placeholder="Enter Serial Number">
                                <p id="err_serial_number" class="mb-0 text-danger em"></p>
                                <ul>
                                    <li class="text-warning mb-0">If there are <strong class="text-info">Multiple Active Popups</strong>, then the popups will be shown in the website according to <strong class="text-info">Serial Number</strong></li>
                                    <li class="text-warning">The higher the serial number, the later the popups will be visible in Website</li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group from-show-notify row">
                    <div class="col-12 text-center">
                        <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image LFM Modal -->
<div class="modal fade lfm-modal" id="lfmModal1" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle" aria-hidden="true">
    <i class="fas fa-times-circle"></i>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <iframe src="{{url('laravel-filemanager')}}?serial=1" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
            </div>
        </div>
    </div>
</div><!-- Image LFM Modal -->
<div class="modal fade lfm-modal" id="lfmModal2" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle" aria-hidden="true">
    <i class="fas fa-times-circle"></i>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <iframe src="{{url('laravel-filemanager')}}?serial=2" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    "use strict";
    var rtlcheck = "{{url('/')}}/admin/rtlcheck/";
</script>
<script src="{{asset('assets/js/admin-popup.js')}}"></script>
@endsection
