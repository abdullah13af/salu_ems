@include('layouts.header')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            @include('layouts.sidebar')

            @include('layouts.menu')

            <!-- page content -->
            <div class="right_col min-vh-100" role="main">
              Hi {{ Auth::user()->name }}, Your dashboard will be available soon...
            </div>
            <!-- /page content -->


            @include('layouts.footer')

</body>

</html>
