<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="{{ url('index') }}" class="site_title"><img src="{{ asset('images/logo-white-outline.png') }}" alt="SALU EMS Logo"></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{ asset('images/user.svg') }}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{ Auth::user()->name }}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li>
            <a href="{{ url('dashboard') }}"><i class="fa fa-solid fa-gauge-high"></i> Dashboard</a>
          </li>
          @if (Auth::user()->teacher == null && Auth::user()->student == null)
            <li><a><i class="fa fa-solid fa-person-chalkboard"></i> Teachers <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ url('teachers/create') }}">Add New Teacher</a></li>
                <li><a href="{{ url('teachers') }}">All Teachers</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-solid fa-chalkboard-user"></i> Students <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ url('students/create') }}">Add New Student</a></li>
                <li><a href="{{ url('students') }}">All Students</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-solid fa-layer-group"></i> Batches <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ url('batches/create') }}">Add New Batche</a></li>
                <li><a href="{{ url('batches') }}">All Batches</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-solid fa-building-columns"></i> Departments <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ url('departments/create') }}">Add New Department</a></li>
                <li><a href="{{ url('departments') }}">All Departments</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-solid fa-book"></i> Subjects <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ url('subjects/create') }}">Add New Subject</a></li>
                <li><a href="{{ url('subjects') }}">All Subjects</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-solid fa-person-chalkboard"></i> Teachers Subjects <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ url('teachers_subjects/create') }}">Assign Subject to Teacher</a></li>
                <li><a href="{{ url('teachers_subjects') }}">All Teachers Subjects</a></li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
      
    </div>
    <!-- /sidebar menu -->
    
    
  </div>
</div>