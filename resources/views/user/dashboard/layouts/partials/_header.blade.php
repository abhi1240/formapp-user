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
                {{-- <li class="nav-message">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="mail"></span></a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Messages <span
                                    class="badge-circle badge-success ml-1">2</span></h2>
                            <ul>
                              <li class="author-offline">
                                    <div class="user-avater">
                                        <img src="{{ asset('img/team-1.png') }}" alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum dolor amet cosec Lorem ipsum</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <a href="" class="dropdown-wrapper__more">See All Message</a>
                        </div>
                    </div>
                </li>
                <!-- ends: nav-message -->
                <li class="nav-notification">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="bell"></span></a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Notifications <span
                                    class="badge-circle badge-warning ml-1">4</span></h2>
                            <ul>
                                <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--danger">
                                        <span data-feather="heart"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <a href="" class="dropdown-wrapper__more">See all incoming activity</a>
                        </div>
                    </div>
                </li> --}}
                <!-- ends: .nav-notification -->
                <!-- ends: .nav-settings -->
                <!-- ends: .nav-support -->
                <!-- ends: .nav-flag-select -->
                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('img/author-nav.jpg') }}"
                                                                            alt="" class="rounded-circle"></a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="{{ asset('img/author-nav.jpg') }}" alt="" class="rounded-circle">
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
