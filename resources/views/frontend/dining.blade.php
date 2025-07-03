@extends('frontend.layout')
@section('styles')
@include('frontend.theme_one_two.include.styles')
@endsection
@section('pageHeading')
  {{$details->name}}
@endsection

@section('meta-keywords', "$details->meta_keywords")
@section('meta-description', "$details->meta_description")

@section('content')
  <main>  

    <!-- Breadcrumb Section Start -->
    <!-- <section
      class="breadcrumb-area d-flex align-items-center position-relative bg-img-center"
      style="background-image: url({{ asset('assets/img/' . $breadcrumbInfo->breadcrumb) }});"
    >
      <div class="container">
        <div class="breadcrumb-content text-center">
          <h1>{{ strlen($details->name) > 30 ? mb_substr($details->name, 0, 30) . '...' : $details->name }}</h1>

          <ul class="list-inline">
            <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
            <li><i class="far fa-angle-double-right"></i></li>
            <li>{{ strlen($details->name) > 30 ? mb_substr($details->name, 0, 30) . '...' : $details->name }}</li>
          </ul>
        </div>
      </div>
    </section> -->
    <!-- Breadcrumb Section End -->

   <!-- <section class="pt-0 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="custom-page-content">
                  {!! replaceBaseUrl($details->body, 'summernote') !!}
              </div>
          </div>

        </div>
      </div>
    </section>-->




    <!-- {{-- add the script --}} -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script> -->

    
    <div class="be-section clearfix" data-headerscheme="background--dark">

        <div class="be-section clearfix" style="padding-top:0px;padding-bottom:0px;">

            <div class="be-row ">      
                      
                <div class="element be-hoverlay slider videos vertical-portfolio not-wide " style="width: 100% !important;" >
                    <div class="element-inner">
                        <div id="water-zone"></div>
                        <div class="thumb-wrap  mfp-image" style="border: 0px solid white">
                            {{-- <img src="assets/dining/dining1.jpg" alt="" max-height="800px" width="100%">
                            <div class="thumb-special-title" style="background-color: gray">
                                <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                    <h3 style="text-align: center;"><span style="color: white">Dining</span></h3>
                                </div>
                            </div> --}}
                            <div class="thumb-overlay rollInLeft animated" >
                                <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">
                                    <div class="thumb-details" onmouseover="myfunction()">
                                        <span style="font-size:28px;color: white">Dining</span>

                                        <div id="div_details_top" style="border:solid 0px royalblue;margin-top: 2%;margin-bottom: 2%;overflow: hidden;">

                                            <p style="border:solid 0px rosybrown;margin-bottom: 5px; margin-top: 5px;">Dining at our restaurant offers a delightful fusion of flavors in a warm, inviting atmosphere. With carefully crafted dishes and exceptional service, each meal becomes a memorable experience.</p>
                                        </div>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
    
                <!-- {{-- two column --}} -->
              
                    <!-- {{-- data-masonry='{"percentPosition": true }' --}} -->
                    <div style="padding:0px;margin:0px;" class="custom-responsive">

                       

                       
                        <!-- Lobby Lounge -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide grid-item" >

                            <div class="element-inner">

                                <div id="trekking"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/dining/LobbyLounge1.jpg" alt="">


                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Lobby Lounge</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Lobby Lounge</span>

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">A sophisticated area offering light snacks, coffee, and cocktails, perfect for relaxing or informal meetings.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Outdoor BBQ  -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide grid-item">

                            <div class="element-inner">

                                <div id="trekking"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/dining/bbq.jpg" alt="">


                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Outdoor BBQ</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Outdoor BBQ</span>

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">A communal space where guests can gather for a self-cooked barbecue, often located in a scenic area of the resort.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>    
                        <!-- Private Dining -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide grid-item" >

                            <div class="element-inner">

                                <div id="trekking"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/dining/privatedining.jpg" alt="">


                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Private Dining</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Private Dining</span>

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">An exclusive service where guests can enjoy a personalized dining experience in a choosed location, such as near a pond or a garden pavilion.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--Themed Nights -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide grid-item">

                            <div class="element-inner">

                                <div id="trekking"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/dining/ThemedNights.jpg" alt="">


                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Themed Nights</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Themed Nights</span>

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Special evenings with themed menus and entertainment, such as seafood nights, traditional local cuisine, or international buffets.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>    

                       

                        
                    </div>

               

                <!-- {{-- 4 column --}} -->
                <!-- <div class="one-col column-block clearfix " style="">
                   
                    <div style="padding:0px;margin:0px;" class="full-screen four-col" data-action="get_ajax_full_screen_portfolio"data-category="brochures,mobile,videos" data-masonry="0" data-showposts="12" data-paged="2" data-col="two" data-gallery="0" data-filter="categories" data-show_filters="yes" data-thumbnail-bg-color="rgba(38,205,164,0.85)">
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide" >
                            <div class="element-inner">
                                <div class="element-inner">

                                    <img src="http://angonaresort.test/assets/img/rooms/1623648535.jpg" alt="">
    
                                    <div class="four-img-title" style="background-color:rgba(0,0,0,0.6); position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;">
                                        Resort Map
                                    </div>
    
                                </div>

                            </div>
                        </div>
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div class="element-inner">

                                    <img src="http://angonaresort.test/assets/img/rooms/1623648535.jpg" alt="">
    
                                    <div class="four-img-title" style="background-color:rgba(0,0,0,0.6); position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;">
                                        Gallery
                                    </div>
    
                                </div>

                            </div>
                        </div>
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <img src="http://angonaresort.test/assets/img/rooms/1623648535.jpg" alt="">

                                <div class="four-img-title" style="background-color:rgba(0,0,0,0.6); position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;">
                                    Contact Us & Directions
                                </div>

                            </div>
                        </div>
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <img src="http://angonaresort.test/assets/img/rooms/1623648535.jpg" alt="">

                                <div class="four-img-title" style="background-color:rgba(0,0,0,0.6); position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;">
                                    2024 Tripadvisor Travelers' Choice
                                </div>

                            </div>
                        </div>   
                    </div>

                </div> -->
            </div>

        </div>

    </div>

 
    
    
  </main>
@endsection

@section('theme_scripts')
@include('frontend.theme_one_two.include.scripts')
@endsection
