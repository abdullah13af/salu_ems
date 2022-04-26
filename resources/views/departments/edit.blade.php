@include('layouts.header')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            @include('layouts.sidebar')

            @include('layouts.menu')

            <!-- page content -->
            <div class="right_col min-vh-100" role="main">
                <div class="">
                  <div class="page-title">
                      <div class="title_left">
                          <h3>Departments </h3>
                      </div>
                  </div>
                  <div class="clearfix"></div>
                  
                  <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 col-sm-12 ">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2 class="text-center">Update Department</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <br />

                            @error("name")
                              <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                @foreach ($errors->get('name') as $message)
                                  <strong>Whoops!</strong> {{ $message }}
                                @endforeach
                              </div>
                            @enderror

                          <form action="/departments/{{ $department->id }}" method="POST" id="demo-form2" data-parsley-validate novalidate class="needs-validation form-horizontal form-label-left">
                            @csrf
                            @method('PUT')
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 " for="name">Department Name <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="name" name="name" value="{{ $department->name }}" placeholder="Department Name" required class="form-control @error('name') is-invalid @enderror">
                              </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                              <div class="col-md-9 col-sm-9 offset-md-3 justify-content-between d-flex">
                                <button type="submit" class="btn btn-success">Update</button>
                              </div>
                            </div>
        
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>                    
                  
                </div>
            </div>
            <!-- /page content -->


            @include('layouts.footer')

</body>

</html>
