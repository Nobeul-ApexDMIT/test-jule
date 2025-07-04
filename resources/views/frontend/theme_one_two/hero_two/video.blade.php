<section class="hero-section slider-two">
    <div id="hero-home-5" class="single-hero-slide bg-img-center d-flex align-items-center lazy" data-bg="{{ asset('assets/img/hero_static/' . $img) }}">
        <div id="bgndVideo" data-property="{videoURL:'{{$websiteInfo->hero_video_link}}',containment:'#hero-home-5', quality:'large', autoPlay:true, loop:true, mute:true, opacity:1}"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <div class="slider-text">
                        <h1 data-animation="fadeInDown" data-delay=".3s">
                        {{-- Luxury Hotel <br> & Room Service <br>Agency --}}
                        {{ convertUtf8($title) }}
                        </h1>
                        <p data-animation="fadeInLeft" data-delay=".5s">
                        {{ convertUtf8($subtitle) }}
                        </p>
                        <a class="btn filled-btn" style="background-color: #610c21 !important;" href="{{ $btnUrl }}" data-animation="fadeInUp" data-delay=".8s">
                        {{ convertUtf8($btnName) }} <i class="far fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
