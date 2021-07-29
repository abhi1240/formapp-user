@extends('home-layouts.app')
@section('content')

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
                <span>Change Password</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- End Breadcrumbs -->

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
                    <li class="list-inline-item align-middle g-mx-7">
                      <a class="u-icon-v1 u-icon-size--md g-color-white" href="#">
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
              <!-- End History -->

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

            <div id="nav-1-1-default-hor-left-underline" class="tab-content">
              <!-- Edit Profile -->
              <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--1" role="tabpanel">
                @if ($errors->any())
                   <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                   </div><br />
                 @endif
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

                <form class="" action="{{route('reset-password')}}" method="post" >
                  @csrf
                  <input type="hidden" name="id" value="{{Session::get('users')['id']}}">
                  <!-- Current Password -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Current password</label>
                    <div class="col-sm-9">
                      <div class="input-group g-brd-primary--focus">
                        <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="password" placeholder="Current password" name="current_password">
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="icon-lock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Current Password -->

                  <!-- New Password -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">New password</label>
                    <div class="col-sm-9">
                      <div class="input-group g-brd-primary--focus">
                        <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" name="password" type="password" placeholder="New password">
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="icon-lock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End New Password -->

                  <!-- Verify Password -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Verify password</label>
                    <div class="col-sm-9">
                      <div class="input-group g-brd-primary--focus">
                        <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" name="password_confirmation"  type="password" placeholder="Verify password">
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="icon-lock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Verify Password -->

                  <!-- Login Verification -->
                  {{-- <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Login verification</label>
                    <div class="col-sm-9">
                      <label class="form-check-inline u-check g-pl-25">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                        <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                          <i class="fa" ></i>
                        </div>
                        Verify login requests
                      </label>
                      <small class="d-block text-muted">You need to add a phone to your profile account to enable this feature.</small>
                    </div>
                  </div>
                  <!-- End Login Verification -->


                  <!-- Save Password -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Save password</label>
                    <div class="col-sm-9">
                      <label class="form-check-inline u-check mx-0">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="savePassword" type="checkbox">
                        <div class="u-check-icon-radio-v7">
                          <i class="d-inline-block"></i>
                        </div>
                      </label>
                      <small class="d-block text-muted">When you check this box, you will be saved automatically login to your profile account. Also, you will be always logged in all our services.</small>
                    </div>
                  </div> --}}
                  <!-- End Save Password -->

                  <hr class="g-brd-gray-light-v4 g-my-25">

                  <div class="text-sm-right">
                    <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#">Cancel</a>
                    <button type="submit" class="btn u-btn-primary rounded-0 g-py-12 g-px-25" >Save Changes</button>
                  </div>
                </form>
              </div>
              <!-- End Edit Profile -->


            <!-- End Tab panes -->
          </div>
          <!-- End Profle Content -->
        </div>
      </div>
    </section>
@endsection
