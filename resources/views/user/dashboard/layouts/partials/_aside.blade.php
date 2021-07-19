<aside class="sidebar">
   <div class="sidebar__menu-group">
      <ul class="sidebar_nav">
         <li class="menu-title">
            <span>Main menu </span>
         </li>
         {{-- form-filling --}}
         <li>
            <a href="{{ route('user.dashboard') }}" class="{{ Route::is('user.dashboard') ? 'active' : ''}}">
            <span data-feather="home" class="nav-icon"></span>
            <span class="menu-text">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="{{ route('user.explorer') }}" class="{{ Route::is('user.explorer') ? 'active' : ''}}">
            <span data-feather="folder" class="nav-icon"></span>
            <span class="menu-text">Explorer</span>
            </a>
         </li>
      </ul>
   </div>
</aside>
