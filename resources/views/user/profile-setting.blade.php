@extends('home-layouts.app')
@section('content')
  <style media="screen">
    input{
      border:none;
      width: 72%;

    }
  </style>
<section class=" g-py-50" style="background: url(/theme/assets/img/banner1.jpg);">
      <div class="container">
        <div class="d-sm-flex text-center">
          <div class="align-self-center">
            <h2 class="h3 g-font-weight-600 w-100 g-mb-10 g-mb-0--md g-color-primary"><span>Welcome!</span>   <span class="text-success"></span></h2>
          </div>

          <div class="align-self-center ml-auto">
            <ul class="u-list-inline">
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-primary g-color-primary--hover" href="#">Home</a>
                <i class="g-color-gray-light-v2 g-ml-5">/</i>
              </li>
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-primary g-color-primary--hover" href="#">Form Filling</a>
                <i class="g-color-gray-light-v2 g-ml-5">/</i>
              </li>
              <li class="list-inline-item g-color-primary">
                <span>Profile Setting</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="g-mb-100">
      <div class="work-panel-des container">
        <div class="row">
          <!-- Profile Sidebar -->
          <div class="col-lg-3 g-mb-50 g-mb-0--lg">
            <!-- User Image -->
            <div class="u-block-hover g-pos-rel">
              <figure>
                @if (Session::has('users.profile_pic_url'))
                  <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="{{Session::get('users')['profile_pic_url']}}" alt="Image Description">
                @else
                  <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="{{asset('/theme/assets/images/dunmmy-profile.jpg')}}" alt="Image Description">
                @endif

              </figure>

              <!-- Figure Caption -->
              <figcaption class="u-block-hover__additional--fade g-bg-black-opacity-0_5 g-pa-30">
                <div class="u-block-hover__additional--fade u-block-hover__additional--fade-up g-flex-middle">
                  <!-- Figure Social Icons -->
                  <ul class="list-inline text-center g-flex-middle-item--bottom g-mb-20">
                    <li class="list-inline-item align-middle g-mx-7 upload_profile_pic" id="upload_profile_pic">
                      <a class="u-icon-v1 u-icon-size--md g-color-white" >
                        <i class="icon-note u-line-icon-pro"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-middle g-mx-7">
                      <a class="u-icon-v1 u-icon-size--md g-color-white" href="#">
                        <i class="icon-notebook u-line-icon-pro"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-middle g-mx-7">
                      <a class="u-icon-v1 u-icon-size--md g-color-white" href="#">
                        <i class="icon-settings u-line-icon-pro"></i>
                      </a>
                    </li>
                  </ul>
                  <!-- End Figure Social Icons -->
                </div>
              </figcaption>
              <!-- End Figure Caption -->

              <!-- User Info -->
              <span class="g-pos-abs g-top-20 g-left-0">
                  <a class="btn btn-sm u-btn-primary rounded-0" href="#"></a>

                </span>
              <!-- End User Info -->
            </div>
            <!-- User Image -->

            <!-- Sidebar Navigation -->
            <div class="list-group list-group-border-0 g-mb-40">

              <form class="" action="{{route('upload.profile.photo')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{Session::get('users')['id']}}">
                <a  class="list-group-item list-group-item-action justify-content-between" id="profile-tab"  style="display:none">
                  <div id="yourBtn" onclick="getFile()"><i class="icon-cloud-upload"></i> Click to upload an image</div>
                    <div style='height: 0px;width: 0px; overflow:hidden;'>
                    <input id="upfile" name="profile_pic" type="file" value="" onchange="sub(this)" />
                    </div>
                    <button type="submit" class="btn u-btn-primary rounded-0 g-py-12 g-px-25 btn-block" name="button">Upload</button>
                </a>
              </form>

              <!-- Profile -->
              <a href="{{route('image-update')}}" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-cursor g-pos-rel g-top-1 g-mr-8"></i> Update Image</span>
              </a>
              <!-- End Profile -->

              <!-- Users Contacts -->
              <a href="{{route('profile-setting')}}" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-note g-pos-rel g-top-1 g-mr-8"></i> Profile Setting</span>
              </a>
              <!-- End Users Contacts -->

              <!-- My Projects -->
              <a href="{{route('change-password')}}" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-pencil g-pos-rel g-top-1 g-mr-8"></i> Change Password</span>
              </a>
              <!-- Settings -->
              <a href="{{route('user.dashboard')}}" class="list-group-item justify-content-between active">
                <span><i class="icon-home g-pos-rel g-top-1 g-mr-8"></i> Dashboard</span>
              </a>
              <!-- End Settings -->
            </div>
            <!-- End Sidebar Navigation -->

          </div>
          <!-- End Profile Sidebar -->

          <!-- Profle Content -->
          <div class="col-lg-9">
            <!-- Nav tabs -->
            <ul class="nav nav-justified u-nav-v1-1 u-nav-primary g-brd-bottom--md g-brd-bottom-2 g-brd-primary g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left-underline" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">

            </ul>
            <!-- End Nav tabs -->

            <!-- Tab panes -->
            <div id="nav-1-1-default-hor-left-underline" class="tab-content">
              <!-- Edit Profile -->

              <form class="" action="{{route('update.user-info')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{Session::get('users')['id']}}">
              <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--1" role="tabpanel">
                @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session()->get('success') }}
                        </div>
                          @endif
                          <!-- info -->
                          @if(session()->has('info'))
                       <div class="alert alert-info alert-dismissable">
                         <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
                           {{ session()->get('info') }}
                       </div>
                         @endif
                          <!-- warning -->
                          @if(session()->has('warning'))
                       <div class="alert alert-warning alert-dismissable">
                         <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
                           {{ session()->get('warning') }}
                       </div>
                         @endif
                          <!-- danger -->
                          @if(session()->has('danger'))
                       <div class="alert alert-danger alert-dismissable">
                         <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
                           {{ session()->get('danger') }}
                       </div>
                         @endif
                <h2 class="h4 g-font-weight-300">Manage your Name, ID and Email Addresses</h2>
                <p>Below are name, email addresse, contacts and more on file for your account.</p>

                <ul class="list-unstyled g-mb-30">
                  <!-- Name -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10 col-md-12">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Name</strong>
                      <span class=""><input type="text" class="align-top" name="name" @if(Session::has('users.name')) value="{{Session::get('users')['name']}} @endif"></span>
                        <span>
                            <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          </span>
                    </div>
                    {{-- <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span> --}}
                  </li>
                  <!-- End Name -->

                  <!-- Your ID -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10 col-md-12">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Your ID</strong>
                      <span class="align-top font-weight-bold"> @if(Session::has('users.seeder_id')){{Session::get('users')['seeder_id']}} @endif</span>

                    </div>
                    {{-- <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span> --}}
                  </li>
                  <!-- End Your ID -->

                  <!-- Company Name -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10 col-md-12">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Company name</strong>
                      <span class="align-top"><input type="text" class="align-top" name="company_name" @if(Session::has('users.company_name')) value="{{Session::get('users')['company_name']}}" @endif></span>
                        <span>
                            <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          </span>
                    </div>
                    {{-- <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span> --}}
                  </li>
                  <!-- End Company Name -->

                  <!-- Position -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10 col-md-12">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Position</strong>
                      <span class="align-top"><input type="text" class="align-top" name="position" @if(Session::has('users.position')) value="{{Session::get('users')['position']}}" @endif></span>
                        <span>
                            <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          </span>
                    </div>
                    {{-- <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span> --}}
                  </li>
                  <!-- End Position -->

                  <!-- Primary Email Address -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10 col-md-12">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Primary email address</strong>
                      <span class="align-top"><input type="text" class="align-top" name="email" @if(Session::has('users.email')) value="{{Session::get('users')['email'] }}" @endif></span>
                        <span>
                            <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          </span>
                    </div>
                    {{-- <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span> --}}
                  </li>
                  <!-- End Primary Email Address -->

                  <!-- Linked Account -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10 col-md-12">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Linked account</strong>
                      <span class="align-top"><input type="text" class="align-top" name="linked_account" @if(Session::has('users.linked_account')) value="{{Session::get('users')['linked_account']}}" @endif></span>
                        <span>
                            <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          </span>
                    </div>
                    {{-- <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span> --}}
                  </li>
                  <!-- End Linked Account -->

                  <!-- Website -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10 col-md-12">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Website</strong>
                      <span class="align-top"><input type="text" class="align-top" name="website" @if(Session::has('users.website')) value="{{Session::get('users')['website']}}" @endif></span>
                        <span>
                            <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          </span>
                    </div>
                    {{-- <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span> --}}
                  </li>
                  <!-- End Website -->

                  <!-- Phone Number -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10 col-md-12">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Phone number</strong>
                      <span class="align-top"><input type="text" class="align-top" name="phone_num" @if(Session::has('users.phone_num')) value="{{Session::get('users')['phone_num']}}" @endif></span>
                        <span>
                            <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          </span>
                    </div>
                    {{-- <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span> --}}
                  </li>
                  <!-- End Phone Number -->

                  <!-- Office Number -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10 col-md-12">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Office number</strong>
                      <span class="align-top"><input type="text" class="align-top" name="office_num" @if(Session::has('users.office_num')) value="{{Session::get('users')['office_num']}}" @endif></span>
                        <span>
                            <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          </span>
                    </div>
                    {{-- <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span> --}}
                  </li>
                  <!-- End Office Number -->

                  <!-- Address -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10 col-md-12">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Address</strong>
                      <span class="align-top"><input type="text" class="align-top" name="address" @if(Session::has('users.address')) value="{{Session::get('users')['address']}}" @endif></span>
                        <span>
                            <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          </span>
                    </div>
                    {{-- <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span> --}}
                  </li>
                  <!-- End Address -->
                </ul>

                <div class="text-sm-right">
                  <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#">Cancel</a>
                  <button type="submit" class="btn u-btn-primary rounded-0 g-py-12 g-px-25" href="#">Save Changes</button>
                </div>
              </div>
              </form>
              <!-- End Edit Profile -->


            <!-- End Tab panes -->
          </div>
          <!-- End Profle Content -->
        </div>
      </div>
    </section>
<script src="{{ asset('theme/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
    $('.upload_profile_pic').click(function () {
      $('#profile-tab').show();
    });
    </script>
@endsection
