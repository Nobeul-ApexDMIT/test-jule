@extends('backend.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Section Customization</h4>
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
        <a href="#">Home Page</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Section Customization</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{ route('admin.sections.update') }}" method="post">
          @csrf
          <div class="card-header">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-title">Customize Sections</div>
              </div>
            </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-8 offset-lg-2">
                @csrf
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Search Section **</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                          <input type="radio" name="search_section" value="1" class="selectgroup-input"
                            {{ $sections->search_section == 1 ? 'checked' : '' }}>
                          <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="search_section" value="0" class="selectgroup-input"
                            {{ $sections->search_section == 0 ? 'checked' : '' }}>
                          <span class="selectgroup-button">Deactive</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  @if (
                      $settings->theme_version == 'theme_five' ||
                          $settings->theme_version == 'multipurpose' ||
                          $settings->theme_version == 'multipurpose_two' ||
                          $settings->theme_version == 'theme_three' || $settings->theme_version == 'theme_four')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Introduction Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="intro_section" value="1" class="selectgroup-input"
                              {{ $sections->intro_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="intro_section" value="0" class="selectgroup-input"
                              {{ $sections->intro_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if (
                      $settings->theme_version == 'theme_five' ||
                          $settings->theme_version == 'multipurpose' ||
                          $settings->theme_version == 'multipurpose_two' ||
                          $settings->theme_version == 'theme_four')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Featured Rooms Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="featured_rooms_section" value="1" class="selectgroup-input"
                              {{ $sections->featured_rooms_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="featured_rooms_section" value="0" class="selectgroup-input"
                              {{ $sections->featured_rooms_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if ($settings->theme_version == 'theme_five')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Room Featured Category Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="room_feature_section" value="1" class="selectgroup-input"
                              {{ $sections->room_feature_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="room_feature_section" value="0" class="selectgroup-input"
                              {{ $sections->room_feature_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Latest Room Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="latest_room_section" value="1" class="selectgroup-input"
                              {{ $sections->latest_room_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="latest_room_section" value="0" class="selectgroup-input"
                              {{ $sections->latest_room_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if (
                      $settings->theme_version == 'theme_five' ||
                          $settings->theme_version == 'multipurpose' ||
                          $settings->theme_version == 'multipurpose_two')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Featured Services Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="featured_services_section" value="1"
                              class="selectgroup-input"
                              {{ $sections->featured_services_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="featured_services_section" value="0"
                              class="selectgroup-input"
                              {{ $sections->featured_services_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if ($settings->theme_version == 'multipurpose_two')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>FAQ Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="faq_section" value="1" class="selectgroup-input"
                              {{ $sections->faq_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="faq_section" value="0" class="selectgroup-input"
                              {{ $sections->faq_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif

                  @if ($settings->theme_version == 'multipurpose_two')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Statistics Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="statistics_section" value="1" class="selectgroup-input"
                              {{ $sections->statistics_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="statistics_section" value="0" class="selectgroup-input"
                              {{ $sections->statistics_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if (
                      $settings->theme_version == 'multipurpose' ||
                          $settings->theme_version == 'multipurpose_two' ||
                          $settings->theme_version == 'theme_five' ||
                          $settings->theme_version == 'theme_four' ||
                          $settings->theme_version == 'theme_three')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Video Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="video_section" value="1" class="selectgroup-input"
                              {{ $sections->video_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="video_section" value="0" class="selectgroup-input"
                              {{ $sections->video_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if (
                      $settings->theme_version == 'theme_three' ||
                          $settings->theme_version == 'multipurpose' ||
                          $settings->theme_version == 'multipurpose_two' ||
                          $settings->theme_version == 'theme_four')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Featured Packages Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="featured_package_section" value="1"
                              class="selectgroup-input" {{ $sections->featured_package_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="featured_package_section" value="0"
                              class="selectgroup-input" {{ $sections->featured_package_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if ($settings->theme_version == 'theme_three')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Package Featured Category Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="package_feature_setion" value="1"
                              class="selectgroup-input" {{ $sections->package_feature_setion == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="package_feature_setion" value="0"
                              class="selectgroup-input" {{ $sections->package_feature_setion == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Latest Package Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="latest_package_section" value="1"
                              class="selectgroup-input" {{ $sections->latest_package_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="latest_package_section" value="0"
                              class="selectgroup-input" {{ $sections->latest_package_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if (
                      $settings->theme_version == 'multipurpose' ||
                          $settings->theme_version == 'multipurpose_two' ||
                          $settings->theme_version == 'theme_five')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Testimonial Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="testimonials_section" value="1" class="selectgroup-input"
                              {{ $sections->testimonials_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="testimonials_section" value="0" class="selectgroup-input"
                              {{ $sections->testimonials_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if ($settings->theme_version == 'multipurpose' || $settings->theme_version == 'theme_four')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Facilities Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="facilities_section" value="1" class="selectgroup-input"
                              {{ $sections->facilities_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="facilities_section" value="0" class="selectgroup-input"
                              {{ $sections->facilities_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif

                  @if ($settings->theme_version == 'theme_three' || $settings->theme_version == 'multipurpose_two')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Blog Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="blogs_section" value="1" class="selectgroup-input"
                              {{ $sections->blogs_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="blogs_section" value="0" class="selectgroup-input"
                              {{ $sections->blogs_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if ($settings->theme_version == 'multipurpose' || $settings->theme_version == 'multipurpose_two' || $settings->theme_version == 'theme_four')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Brands Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="brand_section" value="1" class="selectgroup-input"
                              {{ $sections->brand_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="brand_section" value="0" class="selectgroup-input"
                              {{ $sections->brand_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Top Footer Section **</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                          <input type="radio" name="top_footer_section" value="1" class="selectgroup-input"
                            {{ $sections->top_footer_section == 1 ? 'checked' : '' }}>
                          <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="top_footer_section" value="0" class="selectgroup-input"
                            {{ $sections->top_footer_section == 0 ? 'checked' : '' }}>
                          <span class="selectgroup-button">Deactive</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Copyright Section **</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                          <input type="radio" name="copyright_section" value="1" class="selectgroup-input"
                            {{ $sections->copyright_section == 1 ? 'checked' : '' }}>
                          <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="copyright_section" value="0" class="selectgroup-input"
                            {{ $sections->copyright_section == 0 ? 'checked' : '' }}>
                          <span class="selectgroup-button">Deactive</span>
                        </label>
                      </div>
                    </div>
                  </div>

                  @if ($settings->theme_version == 'theme_one')
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Service Section **</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="service_section" value="1" class="selectgroup-input"
                              {{ $sections->service_section == 1 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="service_section" value="0" class="selectgroup-input"
                              {{ $sections->service_section == 0 ? 'checked' : '' }}>
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  @endif

                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" id="displayNotif" class="btn btn-success">Update</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
