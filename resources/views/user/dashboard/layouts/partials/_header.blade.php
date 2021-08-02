<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
          <a href="" class="sidebar-toggle">
              <img class="svg" src="{{ asset('img/svg/bars.svg') }}" alt="img">
          </a>
            <a class="navbar-brand" href="#"><img class="svg dark" src="{{asset('theme/assets/images/logo-wide.png')}}" alt="">
                <img class="light" src="{{asset('theme/assets/images/logo-wide.png')}} " alt="">
            </a>

            <form action="/" class="search-form">
                <span data-feather="search"></span>
                <input class="form-control mr-sm-2 box-shadow-none" type="search" placeholder="Search..."
                       aria-label="Search">
            </form>
            @include('layouts.partials._top_menu')
        </div>
        <!-- ends: navbar-left -->
        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <li class="nav-search d-none">
                    <a href="#" class="search-toggle">
                        <i class="la la-search"></i>
                        <i class="la la-times"></i>
                    </a>
                    <form action="/" class="search-form-topMenu">
                        <span class="search-icon" data-feather="search"></span>
                        <input class="form-control mr-sm-2 box-shadow-none" type="search" placeholder="Search..."
                               aria-label="Search">
                    </form>
                </li>

                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">@if(Session::has('users.profile_pic_url'))
                          <img src="{{ Session::get('users')['profile_pic_url'] }}" alt="" class="rounded-circle">
                          @else
                            <img src="{{ asset('img/author-nav.jpg') }}" alt="" class="rounded-circle">
                        @endif</a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                  @if(Session::has('users.profile_pic_url'))
                                    <img src="{{ Session::get('users')['profile_pic_url'] }}" alt="" class="rounded-circle">
                                    @else
                                      <img src="{{ asset('img/author-nav.jpg') }}" alt="" class="rounded-circle">
                                  @endif
                                </div>
                                <div>
                                    <h6>{{Session::get('users')['name']}}</h6>
                                    <span>Image Seeder</span>
                                </div>
                            </div>
                            <div class="nav-author__options">
                                <ul>
                                    <li>
                                        <a href="{{route('profile-setting')}}">
                                            <span data-feather="user"></span> Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{route('change-password')}}">
                                            <span data-feather="bell"></span> Reset Password</a>
                                    </li>
                                </ul>
                                <a href="{{ route('logout') }}" class="nav-author__signout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span data-feather="log-out"></span> Sign Out</a>
                                    <form id="logout-form" action="{{ route('seeder.logout') }}" method="POST" class="d-none">
                                      <input type="hidden" name="id" value="{{Session::get('users')['id']}}">
                                      <input type="hidden" name="api_token" value="{{Session::get('users')['api_token']}}">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                        <!-- ends: .dropdown-wrapper -->
                    </div>
                </li>
                <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
                <a href="#" class="btn-search">
                    <span data-feather="search"></span>
                    <span data-feather="x"></span></a>
                <a href="#" class="btn-author-action">
                    <span data-feather="more-vertical"></span></a>
            </div>
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header>
