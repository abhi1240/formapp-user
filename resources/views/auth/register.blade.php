@extends('home-layouts.app')
@section('content')
  <style media="screen">
  .dzsparallaxer.height-is-based-on-content > div {
    position: absolute;
    }
    .alert{
      position:relative;
      top:25px;
      right: 2rem;
      width:300px;
    }
  </style>
<div class="">
  <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall" data-options="{direction: 'reverse', settings_mode_oneelement_max_offset: '150'}">
        <!-- Parallax Image -->
        <div class="divimage dzsparallaxer--target w-100 u-bg-overlay g-bg-size-cover g-bg-bluegray-opacity-0_3--after" style="height: 140%; background-image: url(theme/assets/img-temp/1920x1080/img35.jpg);"></div>
        
        @if(session()->has('errors_all'))
      <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
          @foreach (session()->get('errors_all') as $key => $value)
            @foreach ($value as $key1 => $value1)
                {{ $value1 }}
            @endforeach
          @endforeach
      </div>
        @endif

        @if(session()->has('success'))
      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session()->get('success') }}
      </div>
        @endif
        @if(session()->has('warning'))
      <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session()->get('warning') }}
      </div>
        @endif
          @if(session()->has('info'))
       <div class="alert alert-info alert-dismissable">
         <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
           {{ session()->get('info') }}
       </div>
         @endif
          @if(session()->has('danger'))
       <div class="alert alert-danger alert-dismissable">
         <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
           {{ session()->get('danger') }}
       </div>
         @endif
        <div class="container g-pt-100 g-pb-20">
          <div class="row justify-content-between">
            <div class="col-md-6 col-lg-5 flex-md-unordered align-self-center g-mb-80">
              <div class="g-bg-white rounded g-pa-50">
                <header class="text-center mb-4">
                  <h2 class="h2 g-color-black g-font-weight-600">Register</h2>
                </header>

                <!-- Form -->
                <p class="text-danger"></p>
                <form method="POST" action="{{ route('seeder.register') }}">
                  @csrf
                   <div class="mb-4">
                  <div class="input-group g-brd-primary--focus">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-primary">
                        <i class="icon-finance-067 u-line-icon-pro"></i>
                      </span>
                      <input id="name" type="text" class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter name">

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    <!-- <input class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15"  name="email" placeholder="Email" id="email" type="email"> -->
                  </div>
                </div>

                <div class="mb-4">
               <div class="input-group g-brd-primary--focus">
                 <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-primary">
                     <i class="icon-envelope u-line-icon-pro"></i>
                   </span>
                   <input id="email" type="email" class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">

                   @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 <!-- <input class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15"  name="email" placeholder="Email" id="email" type="email"> -->
               </div>
             </div>

             <div class="mb-4">
            <div class="input-group g-brd-primary--focus">
              <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-primary">
                  <i class="icon-phone u-line-icon-pro"></i>
                </span>
                <input id="phone_num" type="text" class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15 form-control @error('phone_num ') is-invalid @enderror" name="phone_num" value="{{ old('phone_num') }}" required autocomplete="phone_num" autofocus placeholder="Enter phone ">

                @error('phone_num')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <!-- <input class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15"  name="email" placeholder="Email" id="email" type="email"> -->
            </div>
          </div>

                <div class="mb-4">
                  <div class="input-group g-brd-primary--focus">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-primary">
                        <i class="icon-media-094 u-line-icon-pro"></i>
                      </span>
                      <input id="password" type="password" class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    <!-- <input class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15" type="password" name="password" placeholder="Password"> -->
                  </div>
                </div>
                <div class="mb-4">
                  <div class="input-group g-brd-primary--focus">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-primary">
                        <i class="icon-media-094 u-line-icon-pro"></i>
                      </span>
                      <input id="password-confirm" type="password" class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15 form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                    <!-- <input class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15" type="password" name="password" placeholder="Password"> -->
                  </div>
                </div>



                <div class="g-mb-50">
                <input name="submit" type="submit" class="btn btn-md btn-block u-btn-primary rounded text-uppercase g-py-13" value="Register"/>

                </div>

                </form>
                <!-- End Form -->

                <footer class="text-center">

                </footer>
              </div>
            </div>

            <div class="col-md-6 flex-md-first align-self-center g-mb-80">
              <div class="mb-5">
                <h1 class="h3 g-color-white g-font-weight-600 mb-3">Lorem ipsum dolor sit amet, <br>consectetur adipiscing elit!</h1>
                <p class="g-color-white-opacity-0_8 g-font-size-12 text-uppercase">sed do eiusmod tempor</p>
              </div>

              <div class="row">
                <div class="col-md-11 col-lg-9">
                  <!-- Icon Blocks -->
                  <div class="media mb-4">
                    <div class="d-flex mr-4">
                      <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                        <i class="icon-finance-168 u-line-icon-pro"></i>
                      </span>
                    </div>
                    <div class="media-body align-self-center">
                      <p class="g-color-white mb-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                  </div>
                  <!-- End Icon Blocks -->

                  <!-- Icon Blocks -->
                  <div class="media mb-5">
                    <div class="d-flex mr-4">
                      <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                        <i class="icon-finance-193 u-line-icon-pro"></i>
                      </span>
                    </div>
                    <div class="media-body align-self-center">
                      <p class="g-color-white mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    </div>
                  </div>
                  <!-- End Icon Blocks -->

                  <!-- Testimonials -->
                  <blockquote class="u-blockquote-v1 g-color-main rounded g-pl-60 g-pr-30 g-py-25 g-mb-40">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </blockquote>
                  <div class="media">

                    <div class="media-body align-self-center">
                      <h4 class="h6 g-color-primary g-font-weight-600 g-mb-0">xxxxx xxx</h4>
                      <em class="g-color-white g-font-style-normal g-font-size-12">Admin</em>
                    </div>
                  </div>
                  <!-- End Testimonials -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>


@endsection
