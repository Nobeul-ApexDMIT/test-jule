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

                <!-- {{-- single image --}} -->
<!-- 
                <div class="element be-hoverlay slider videos vertical-portfolio not-wide " style="width: 100% !important;" >
                    <div class="element-inner">
                        <div id="water-zone"></div>
                        <div class="thumb-wrap  mfp-image" style="border: 0px solid white">
                            <img src="assets/recreation/Water_Zone wave.jpg" alt="" max-height="800px" width="100%">
                            <div class="thumb-special-title" style="background-color: gray">
                                <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                    <h3 style="text-align: center;"><span style="color: white">Water Zone / Wave</span></h3>
                                </div>
                            </div>
                            <div class="thumb-overlay rollInLeft animated" >
                                <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">
                                    <div class="thumb-details" onmouseover="myfunction()">
                                        <span style="font-size:28px;color: white">Water Zone / Wave</span>

                                        <div id="div_details_top" style="border:solid 0px royalblue;margin-top: 2%;margin-bottom: 2%;overflow: hidden;">

                                            <p style="border:solid 0px rosybrown;margin-bottom: 5px; margin-top: 5px;">Experience the thrill of our Water Zone, featuring exhilarating wave pools and water slides. Perfect for both adventure seekers and families, our Water Zone offers fun and excitement for all ages. Dive into a world of splashy fun and create unforgettable memories. Bringing the essence of Cox's Bazar to the heart of Dhaka-Gazipur, our Water Zone is your ultimate destination for aquatic adventure and relaxation.</p>
                                        </div>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div> -->
           
                <div class="element be-hoverlay slider videos vertical-portfolio not-wide " style="width: 100% !important;" >
                    <div class="element-inner">
                        <div id="water-zone"></div>
                        <div class="thumb-wrap  mfp-image" style="border: 0px solid white">
                            <img src="assets/recreation/limits.png" alt="" max-height="800px" width="100%">
                            <div class="thumb-special-title" style="background-color: gray">
                                <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                    <h3 style="text-align: center;"><span style="color: white">Explore Beyond Limits</span></h3>
                                </div>
                            </div>
                            <div class="thumb-overlay rollInLeft animated" >
                                <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">
                                    <div class="thumb-details" onmouseover="myfunction()">
                                        <span style="font-size:28px;color: white">Explore Beyond Limits</span>

                                        <!-- <div id="div_details_top" style="border:solid 0px royalblue;margin-top: 2%;margin-bottom: 2%;overflow: hidden;">

                                            <p style="border:solid 0px rosybrown;margin-bottom: 5px; margin-top: 5px;">Experience the thrill of our Water Zone, featuring exhilarating wave pools and water slides. Perfect for both adventure seekers and families, our Water Zone offers fun and excitement for all ages. Dive into a world of splashy fun and create unforgettable memories. Bringing the essence of Cox's Bazar to the heart of Dhaka-Gazipur, our Water Zone is your ultimate destination for aquatic adventure and relaxation.</p>
                                        </div> -->


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
           
                <!-- {{-- two column --}} -->
           
                    <div style="padding:0px;margin:0px;" class="custom-responsive"  >

                       

                        <!-- TREKKING -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="trekking"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/TREKKING.jpg" alt="">


                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Trekking</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Trekking</span>

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Embark on a journey through nature at our Trekking Zone! Discover scenic trails and breathtaking views as you hike through lush landscapes and rugged terrain. Whether you're a seasoned trekker or a nature enthusiast, our trails promise adventure and tranquility in every step.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Cycling -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/CYCLING.jpg" alt="">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Cycling</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Cycling</span>
                                                <!--<h3 style="text-align: center;"><span style="color: white">Kids Zone</span></h3>-->

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Pedal through paradise at our Cycling Zone! Explore scenic trails and enjoy a refreshing ride, perfect for both leisurely outings and energetic adventures. Experience the freedom of the open road, right here at Kazi Resort & Hotel.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        

                        <!-- BOATING -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/BoatingKayaking.jpg" alt="Badminton">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Boating & Kayaking</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Boating & Kayaking</span>
                                                <!--<h3 style="text-align: center;"><span style="color: white">Kids Zone</span></h3>-->

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Set sail on adventure with our Boating and Kayaking activities! Glide across serene waters and embrace the tranquility of nature as you navigate in your own boat or kayak. Perfect for both relaxation and excitement, our water activities offer a refreshing escape and unforgettable experiences.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        

                        <!-- FISHING -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/Fishing.jpg" alt="">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Fishing</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Fishing</span>
                                                <!--<h3 style="text-align: center;"><span style="color: white">Kids Zone</span></h3>-->

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Cast your line and reel in the fun at our Fishing Zone! Enjoy a peaceful day by the water, where you can unwind and catch a variety of local fish. Whether you're a seasoned angler or a casual fisherman, our serene setting provides the perfect backdrop for a relaxing and rewarding fishing experience.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        

                        <!-- Badminton -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/BADMINTON.jpg" alt="">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Badminton</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Badminton</span>
                                                <!--<h3 style="text-align: center;"><span style="color: white">Kids Zone</span></h3>-->

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Smash your way to fun and fitness at our Badminton Zone! Whether you're a seasoned pro or a casual player, our top-tier courts offer the perfect setting for exciting matches and great workouts.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        

                       

                        <!-- Mini Zoo -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/MiniZoo.jpg" alt="">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Mini Zoo</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Mini Zoo</span>
                                                <!--<h3 style="text-align: center;"><span style="color: white">Kids Zone</span></h3>-->

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Meet our gentle and graceful deers at the Mini Zoo! Watch them roam and graze in their naturalistic habitat, and learn fascinating facts about these majestic animals. A perfect experience for nature enthusiasts and families alike, offering a serene and educational encounter with one of nature’s most elegant creatures.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        

                        <!-- KIDS ZONE -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/KIDSZONE.jpg" alt="">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Kids Zone</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Kids Zone</span>
                                                <!--<h3 style="text-align: center;"><span style="color: white">Kids Zone</span></h3>-->

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Let the little ones’ imaginations run wild in our Kids Zone! Packed with fun and safe activities, this vibrant area features exciting play structures, interactive games, and creative workshops. Designed for endless joy and adventure, our Kids Zone ensures a memorable experience for children and peace of mind for parents</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                         <!-- Basketball -->
                         <!-- <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/BASKETBALL.jpg" alt="">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Basketball</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Basketball</span>
                                                

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Shoot for the stars at our Basketball Court! Whether you're aiming for a three-pointer or enjoying a friendly game, our court is designed for all levels of play. Gather your team and bring your game to life in a dynamic and fun environment.</p>

                                                </div>
                                            

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div> -->
                        
                        <!--Cricket Zone -->
                        
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/CricketZone.jpg" alt="">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Sports Zone </span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Sports Zone </span>
                                                <!--<h3 style="text-align: center;"><span style="color: white">Kids Zone</span></h3>-->

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Hit a six and enjoy the thrill of the game at our Cricket Zone! Perfect for enthusiasts of all ages, our well-maintained pitch and facilities offer a fantastic setting for friendly matches and practice sessions. Gather your team and experience the excitement of cricket in a vibrant and engaging environment.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--Football Zone -->
                        
                        <!-- <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/FootballZone.jpg" alt="">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Football Zone</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Football Zone</span>
                                               

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Score big and feel the adrenaline at our Football Zone! With a spacious pitch and top-notch facilities, it’s the perfect place for lively matches and spirited practice sessions. Whether you're a casual player or a dedicated athlete, our Football Zone offers the excitement and camaraderie of the beautiful game.</p>

                                                </div>
                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div> -->

                         <!-- Swiming Pool -->
                        
                         <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/SwimmingPool.jpg" alt="">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Swimming Pool</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Swimming Pool</span>
                                                <!--<h3 style="text-align: center;"><span style="color: white">Kids Zone</span></h3>-->

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Dive into fun at our Swimming Zone! Enjoy crystal-clear waters, sun loungers, and a refreshing escape perfect for relaxation and recreation. Ideal for both leisurely swims and energetic splashes, our Swimming Zone offers a vibrant aquatic experience for guests of all ages.</p>

                                                </div>
                                            

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
            
                        <!--Indoor GAME ZONE -->
                        <div class="element be-hoverlay slider videos vertical-portfolio not-wide">

                            <div class="element-inner">

                                <div id="kids-zone"></div>

                                <div class="thumb-wrap  mfp-image" style="border: 0px solid white">

                                    <img src="assets/recreation/pool2.jpg" alt="">

                                    <div class="thumb-special-title" style="background-color: gray">
                                        <div style="position: absolute;bottom: 40%;padding-bottom: 2%;padding-top: 2%;vertical-align: middle;text-align: center;width: 100%; color: white;background-color:rgba(0,0,5,0.5)">
                                            <h3 style="text-align: center;"><span style="color: white">Indoor Game Zone</span></h3>
                                        </div>
                                    </div>

                                    <div class="thumb-overlay rollInLeft animated" >

                                        <div class="thumb-bg" style="background-color:rgba(0,0,5,0.6)">

                                            <div class="thumb-details" onmouseover="myfunction()">
                                                <span style="font-size:28px;color: white">Indoor Game Zone</span>
                                                <!--<h3 style="text-align: center;"><span style="color: white">Kids Zone</span></h3>-->

                                                <div id="div_details_top" style="margin-top: 2%;margin-bottom: 2%;overflow: hidden">

                                                    <p style="">Unleash your competitive spirit and have a blast at our Indoor Game Zone! Enjoy classic games like billiards, carom, and ludo in a relaxed and vibrant setting. Perfect for winding down or challenging friends, our game zone offers endless fun and entertainment for everyone. </p>

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
