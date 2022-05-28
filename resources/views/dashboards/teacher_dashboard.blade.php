@include('layouts.header')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            @include('layouts.sidebar')

            @include('layouts.menu')

            <!-- page content -->
            <div class="right_col min-vh-100" role="main">
                <!-- top tiles -->
                
                <div class="row" >
                  <div class="tile_count" style="width: 100% !important">
                    <div class="col-md-2 col-sm-4  tile_stats_count">
                      <span class="count_top"><i class="fa fa-solid fa-book"></i> My Total Subjects</span>
                      <div class="count">{{ $teacher_subjects_count }}</div>
                    </div>
                  </div>
                </div>
                  <!-- /top tiles -->
            </div>
            <!-- /page content -->


            @include('layouts.footer')

</body>

</html>
