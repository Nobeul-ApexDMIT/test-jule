@extends('backend.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('backend.partials.rtl_style')

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('Categories') }}</h4>
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
        <a href="#">{{ __('Packages Management') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('Categories') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title d-inline-block">{{ __('Package Categories') }}</div>
            </div>

            <div class="col-lg-3">
              @includeIf('backend.partials.languages')
            </div>

            <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
              <a
                href="#"
                data-toggle="modal"
                data-target="#createModal"
                class="btn btn-primary btn-sm float-lg-right float-left"
              ><i class="fas fa-plus"></i> {{ __('Add Category') }}</a>

              <button
                class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete"
                data-href="{{ route('admin.packages_management.bulk_delete_category') }}"
              ><i class="flaticon-interface-5"></i> {{ __('Delete') }}</button>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($packageCategories) == 0)
                <h3 class="text-center">{{ __('NO PACKAGE CATEGORY FOUND!') }}</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        @if($websiteInfo->theme_version == 'theme_three')
                        <th scope="col">{{ __('Featured') }}</th>
                        @endif
                        <th scope="col">{{ __('Serial Number') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($packageCategories as $packageCategory)
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="{{ $packageCategory->id }}">
                          </td>
                          <td>
                            {{ strlen($packageCategory->name) > 100 ? convertUtf8(substr($packageCategory->name, 0, 100)) . '...' : convertUtf8($packageCategory->name) }}
                          </td>
                          <td>
                            @if ($packageCategory->status == 1)
                              <h2 class="d-inline-block"><span class="badge badge-success">{{ __('Active') }}</span></h2>
                            @else
                              <h2 class="d-inline-block"><span class="badge badge-danger">{{ __('Deactive') }}</span></h2>
                            @endif
                          </td>
                          @if($websiteInfo->theme_version == 'theme_three')
                          <td>
                            <form id="featureForm{{ $packageCategory->id }}" class="d-inline-block" action="{{ route('admin.packages_management.update.feature.category.status') }}" method="post">
                             @csrf
                              <input type="hidden" name="category_id" value="{{ $packageCategory->id }}">

                              <select class="form-control {{ $packageCategory->is_featured == 1 ? 'bg-success' : 'bg-danger' }}  form-control-sm" name="is_featured" onchange="document.getElementById('featureForm{{ $packageCategory->id }}').submit();">
                                <option value="1" {{ $packageCategory->is_featured == 1 ? 'selected' : '' }}>
                                  Yes
                                </option>
                                <option value="0" {{ $packageCategory->is_featured == 0 ? 'selected' : '' }}>
                                  No
                                </option>
                              </select>
                            </form>
                          </td>
                          @endif
                          <td>{{ $packageCategory->serial_number }}</td>
                          <td>
                            <a
                              class="btn btn-secondary btn-sm mr-1 editBtn"
                              href="#"
                              data-toggle="modal"
                              data-target="#editModal"
                              data-id="{{ $packageCategory->id }}"
                              data-name="{{ $packageCategory->name }}"
                              data-status="{{ $packageCategory->status }}"
                              data-serial_number="{{ $packageCategory->serial_number }}"
                              data-featured_img="{{ asset('assets/img/packages/category/'.$packageCategory->featured_img) }}"
                            >
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              {{ __('Edit') }}
                            </a>

                            <form
                              class="deleteForm d-inline-block"
                              action="{{ route('admin.packages_management.delete_category') }}"
                              method="post"
                            >
                              @csrf
                              <input type="hidden" name="category_id" value="{{ $packageCategory->id }}">

                              <button type="submit" class="btn btn-danger btn-sm deleteBtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                                {{ __('Delete') }}
                              </button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="d-inline-block mx-auto">
              {{ $packageCategories->appends(['language' => request()->input('language')])->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- create modal --}}
  @include('backend.packages.create_category')

  {{-- edit modal --}}
  @include('backend.packages.edit_category')
@endsection
