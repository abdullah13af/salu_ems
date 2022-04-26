<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('images/user.svg') }}" alt="">{{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="javascript:;"><i class="fa-solid fa-user mr-2"></i> Profile</a>
              <a class="dropdown-item"  href="javascript:;">
                <span> <i class="fa-solid fa-gear mr-2"></i> Settings</span>
              </a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();" href="login.html"><i class="fa fa-sign-out pull-right mr-2"></i>Log Out</a>
              </form>
          </div>
        </li>

        
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->