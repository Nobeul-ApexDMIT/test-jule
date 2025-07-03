<div class="header-top-area section-bg  d-none d-lg-block" style="background-color: #610C21;">
  <div class="container-fluid">
    <div class="row align-items-center">
      {{-- <div class="col-lg-7 d-lg-block d-none"> --}}
      <div class="col-lg-10 d-lg-flex d-none">
        <style>
          @media (min-width: 992px) and (max-width: 1350px) {
            .header-font-size{
              font-size:1.15vw;
            }
            .header-icon-size{
              font-size:1.20vw;
            }
          }
        </style>
        <ul class="top-contact-info list-inline d-flex">
          @if (!is_null($websiteInfo->address))
          <li class="header-font-size"><i class="far fa-map-marker-alt header-icon-size"></i>{{ $websiteInfo->address }}</li>
          @endif

          <!-- @if (!is_null($websiteInfo->support_contact))
          <li><i class="far fa-phone" style="rotate: 90deg;"></i>{{ $websiteInfo->support_contact }}</li>
          @endif -->
          @if (!is_null($websiteInfo->support_contact))
          <li class="header-font-size"><i class="far fa-phone header-icon-size" style="rotate:90deg;"></i><a href="tel:+8801894803511">+8801894803511</a> | <a href="tel:+8801894814765">+8801894814765</a> | <a href="tel:+8801894814761">+8801894814761</a></li>
          @endif
        </ul>
      </div>

      <div class="col-lg-2">
        <div class="top-right">
          <ul class="top-menu list-inline d-inline" style="display:none !important ">
            @guest('web')
            <li><a href="{{ route('user.login') }}"><i class="fas fa-sign-in-alt mr-1"></i> {{ __('Login') }}</a></li>
            <li><a href="{{ route('user.signup') }}"><i class="fas fa-user-plus mr-1"></i> {{ __('Signup') }}</a></li>
            @endguest

            @auth('web')
            <li><a href="{{ route('user.dashboard') }}"><i class="far fa-user mr-1"></i> {{ __('Dashboard') }}</a></li>
            <li><a href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt mr-1"></i> {{ __('Logout') }}</a></li>
            @endauth
          </ul>

          @if (count($socialLinkInfos) > 0)
          <ul class="top-social-icon list-inline d-lg-inline-block d-none">
            @foreach ($socialLinkInfos as $socialLinkInfo)
            <li>
              <a href="{{ $socialLinkInfo->url }}" target="_blank"><i class="{{ $socialLinkInfo->icon }}"></i></a>
            </li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>