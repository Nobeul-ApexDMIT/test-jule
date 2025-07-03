<footer class="px-lg-5 px-3" style="background-color: #610C21;">
  <div class="container-fluid">
    @if ($sections?->top_footer_section == 1)
    <div class="footer-top">
      <div class="row">
        <div class="col-lg-6 col-xl-4 col-md-6">
          <div class="widget footer-widget">
            @if (!is_null($websiteInfo->footer_logo))
            <div class="footer-logo">
              <img class="lazy" data-src="{{ asset('assets/img/' . $websiteInfo->footer_logo) }}" alt="footer logo">
            </div>
            @endif

            @if (!is_null($footerInfo))
            <p class="w-75">{{ $footerInfo->about_company }}</p>
            @endif

            @if (count($socialLinkInfos) > 0)
            <ul class="social-icons d-flex justify-content-center justify-content-lg-start">
              @foreach ($socialLinkInfos as $socialLinkInfo)
              <li>
                <a target="_blank" href="{{ $socialLinkInfo->url }}" style="color: white; border-color:white;"><i class="{{ $socialLinkInfo->icon }}"></i></a>
              </li>
              @endforeach
            </ul>
            @endif

            {{-- @if (count($socialLinkInfos) > 0)
              <ul class="social-icons">
                @foreach ($socialLinkInfos as $socialLinkInfo)
                  <li>
                    <a  href="{{ $socialLinkInfo->url }}" style="background-color: white"><i class="{{ $socialLinkInfo->icon }}"></i></a>
            </li>
            @endforeach
            </ul>
            @endif --}}
          </div>
        </div>

        <div class="col-lg-6 col-xl-4 col-md-6">
          <div class="widget footer-widget ps-3">
            <h4 class="widget-title">{{ __('Quick Links') }}</h4>
            @if (count($quickLinkInfos) == 0)
            <h5 class="text-white">{{ __('No Quick Link Found!') }}</h5>
            @else
            <ul class="nav-widget clearfix">
              @foreach ($quickLinkInfos as $quickLinkInfo)
              <li><a href="{{ $quickLinkInfo->url }}">{{ $quickLinkInfo->title }}</a></li>
              @endforeach
            </ul>
            @endif
          </div>
        </div>

        <div class="col-lg-12 col-xl-4 col-md-12">
          <div class="widget footer-widget">
            <h4 class="widget-title" style="display:none">{{ __('Recent Blogs') }}</h4>
            @if (count($footerBlogInfos) == 0)
            <h5 class="text-white" style="display:none">{{ __('No Recent Blog Found!') }}</h5>
            @else
            <ul class="recent-post" style="display:none">
              @foreach ($footerBlogInfos as $footerBlogInfo)
              <li>
                <h6>
                  <a href="{{ route('blog_details', ['id' => $footerBlogInfo->blog_id, 'slug' => $footerBlogInfo->slug]) }}">
                    {{ strlen($footerBlogInfo->title) > 40 ? mb_substr($footerBlogInfo->title, 0, 40, 'UTF-8') . '...' : $footerBlogInfo->title }}
                  </a>
                </h6>
                <span class="recent-post-date">{{ date_format($footerBlogInfo->blog->created_at, 'F d, Y') }}</span>
              </li>
              @endforeach
            </ul>
            @endif

            @if ($sections?->copyright_section == 1)
            <div class="pt-2">
              <div class="row ">

                <div class="col-md-12">
                  <!-- @if (!is_null($footerInfo)) -->
                  <p class="copy-right text-center text-lg-right pt-3">
                    <!-- {!! replaceBaseUrl($footerInfo->copyright_text, 'summernote') !!} -->
                  <p style="text-align:right;">
                    <strong>Contact Resort:</strong> <br>Surjonarayanpur, Kapasia Pabur Daibari Road
                  </p>
                  <p style="text-align:right;">Gazipur, Dhaka 1730
                  <p style="display: flex;align-items: center;justify-content: flex-end; gap: 3px; flex-wrap: wrap;">
                    <i class="far fa-phone" style="rotate: 90deg;"></i>
                    <a href="tel:01894803511" class="d-flex align-items-center justify-content-end gap-2" style="text-align:right; gap: 8px;">
                      <a href="tel:+8801894803511">+8801894803511</a>|
                      <a href="tel:+8801894814765">+8801894814765</a>|
                      <a href="tel:+8801894814761">+8801894814761</a>
                    </a>
                  </p>
                  </p>
                  </p>
                  <p class="copy-right text-center text-lg-right pt-3">
                    <!-- {!! replaceBaseUrl($footerInfo->copyright_text, 'summernote') !!} -->
                  <p style="text-align:right;"> <strong>Corporate Address:</strong> <br> Catharsis Tower, (6th Floor)</p>
                  <p style="text-align:right;">Road #12, Banani, Dhaka

                    <a href="tel:01894814754" class="d-flex align-items-center justify-content-end gap-2" style="text-align:right; gap: 8px;">
                      <i class="far fa-phone" style="rotate: 90deg;"></i>
                      +8801894814754
                    </a>

                  </p>
                  </p>


                  <!-- @endif -->
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endif

    @if ($sections?->copyright_section == 1)
    <div class="footer-bottom">
      <div class="row text-center">

        <div class="col-md-12">
          @if (!is_null($footerInfo))
          <p class="copy-right text-center">
            {!! replaceBaseUrl($footerInfo->copyright_text, 'summernote') !!}
          </p>
          @endif
        </div>
      </div>
    </div>
    @endif
  </div>
</footer>