<!DOCTYPE html>
<html @if ($currentLanguageInfo->direction == 1) dir="rtl" @endif>

<head>
  {{-- required meta tags --}}
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      prefix: 'tw-',
      important: true,
      theme: {
        container: {
          center: true,
          padding: {
            DEFAULT: '1rem',  
            sm: '2rem',       
            md: '3rem',       
            lg: '4rem',       
            xl: '5rem',      
          },
          screens: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
            '2xl': '1400px',
          },
        },
      }
    }
  </script>

  <meta name="description" content="@yield('meta-description')">
  <meta name="keywords" content="@yield('meta-keywords')">

  <meta name="description" content="@yield('meta-alt-description')">
  <meta name="keywords" content="@yield('meta-alt-keywords')">

  {{-- csrf-token for ajax request --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- title --}}
  <title>@yield('pageHeading') | {{ $websiteInfo->website_title }}</title>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
  {{-- fav icon --}}
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/' . $websiteInfo->favicon) }}">

  {{-- include styles --}}

  @yield('styles')

  {{-- include website color --}}
  @includeIf('frontend.partials.website-color')
    <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-KXHPSRRB');</script>
<!-- End Google Tag Manager -->
</head>

<body class="tw-antialiased">
  {{-- preloader start --}}
  @if ($websiteInfo->preloader_status == 1)
    <div class="loader" id="preLoader">
      <img class="lazy" data-src="{{ asset('assets/img/' . $websiteInfo->preloader) }}" alt="">
    </div>
  @endif
  {{-- preloader end --}}

  {{-- header start --}}
  <header
    class="
    @if ($websiteInfo->theme_version == 'multipurpose_two') home-two 
    @elseif($websiteInfo->theme_version == 'theme_three') header-area header-2
    @elseif($websiteInfo->theme_version == 'theme_four') header-area header-3 
    @elseif($websiteInfo->theme_version == 'theme_five') header-area header-1 
    @endif
    ">
    {{-- include header-nav --}}
    @if ($websiteInfo->theme_version == 'multipurpose')
      {{-- include header-top --}}
      @includeIf('frontend.theme_one_two.partials.header_top_one')
      @includeIf('frontend.theme_one_two.partials.header_nav_one')
    @elseif ($websiteInfo->theme_version == 'multipurpose_two')
      {{-- include header-top --}}
      @includeIf('frontend.theme_one_two.partials.header_top_two')
      @includeIf('frontend.theme_one_two.partials.header_nav_two')
    @elseif ($websiteInfo->theme_version == 'theme_three')
      {{-- include header-top --}}
      <div class="container">
        @includeIf('frontend.theme_three.partials.header_top')
        @includeIf('frontend.theme_three.partials.header_nav')
      </div>
    @elseif ($websiteInfo->theme_version == 'theme_four')
      {{-- include header-top --}}
      @includeIf('frontend.theme_four.partials.header_top')
      @includeIf('frontend.theme_four.partials.header_nav')
    @elseif ($websiteInfo->theme_version == 'theme_five')
      {{-- include header-top --}}
       <div class="container">
        <div class="row g-0">
          @includeIf('frontend.theme_five.partials.header_top')
          @includeIf('frontend.theme_five.partials.header_nav')
        </div>
       </div>
    @endif
  </header>
  {{-- header end --}}

  @yield('content')

  {{-- back to top start --}}
  <div class="back-top">
    <a href="#" class="back-to-top">
      <i class="far fa-angle-up"></i>
    </a>
  </div>
  {{-- back to top end --}}

  {{-- include footer --}}
  @if ($websiteInfo->theme_version == 'multipurpose')
    @includeIf('frontend.theme_one_two.partials.footer')
  @elseif ($websiteInfo->theme_version == 'multipurpose_two')
    @includeIf('frontend.theme_one_two.partials.footer')
  @elseif ($websiteInfo->theme_version == 'theme_three')
    @includeIf('frontend.theme_three.partials.footer')
  @elseif ($websiteInfo->theme_version == 'theme_four')
    @includeIf('frontend.theme_four.partials.footer')
    @elseif ($websiteInfo->theme_version == 'theme_five')
    @includeIf('frontend.theme_five.partials.footer')
  @endif

  {{-- Popups start --}}
  @includeIf('frontend.partials.popups')
  {{-- Popups end --}}

  {{-- WhatsApp Chat Button --}}
  <div id="WAButton"></div>

  {{-- Cookie alert dialog start --}}
  @if (!empty($cookie) && $cookie->cookie_alert_status == 1)
    <div class="cookie">
      @include('cookie-consent::index')
    </div>
  @endif
  {{-- Cookie alert dialog end --}}

  {{-- include scripts --}}
  @yield('theme_scripts')

  {{-- additional script --}}
  @yield('script')
<!-- Google Tag Manager (noscript) -->
<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KXHPSRRB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager (noscript) -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P69DMTCJ');</script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P69DMTCJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script type="text/javascript" id="lzdefsc" src="//livezilla.kaziresort.com/script.php?id=lzdefsc" defer></script>
</body>

</html>
