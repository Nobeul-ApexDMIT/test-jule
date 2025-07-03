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



                
                <!-- {{-- two column --}} -->
                <div class="one-col column-block clearfix " style="">
                    <!-- {{-- data-masonry='{"percentPosition": true }' --}} -->
                    <div style="padding:0px;margin:0px;" class="full-screen two-col grid"  data-masonry='{ "itemSelector": ".grid-item" }' >


        
                        <!--Mosque -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide grid-item" >

                            <div class="element-inner">

                                <div id="trekking"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/facilities/mosque.jpg" alt="">


                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Mosque</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Mosque</span>

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Our resort offers beautifully designed prayer rooms that cater to the spiritual needs of our guests, providing a peaceful environment for prayer and reflection. With easy access to the mosque facilities, guests can enjoy a serene and fulfilling stay while observing their religious practices.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Rent2 -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide grid-item">

                            <div class="element-inner">

                                <div id="trekking"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/facilities/rent.jpg" alt="">


                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Rent A Car</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Rent A Car</span>

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">At our resort, we offer convenient "Rent a Car" services, whether you're looking to hire a vehicle to get here or to explore the local attractions at your own pace. With a variety of options to choose from, your journey can be comfortable and hassle-free from start to finish.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>    
                        <!-- Ballroom -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide grid-item" >

                            <div class="element-inner">

                                <div id="trekking"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/facilities/ballroom.png" alt="">


                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Ballroom</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Ballroom</span>

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Our elegant ballroom offers a sophisticated setting for your most memorable events, featuring state-of-the-art lighting, customizable décor, and ample space for large gatherings. Whether hosting a wedding, corporate event, or gala, our ballroom promises a luxurious atmosphere that will leave a lasting impression on your guests.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Parking -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide grid-item">

                            <div class="element-inner">

                                <div id="trekking"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/facilities/parking.jpg" alt="">


                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Parking</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Parking</span>

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Our resort offers ample parking facilities, ensuring convenience and security for all guests. With 24/7 surveillance and easy access to the main entrance, your vehicle will be well-protected during your stay.</p>

                                                </div>
                                              

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
