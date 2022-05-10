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
                            <h3>Subjects </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-8 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 class="text-center">Add New Subject</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />

                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible " role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Whoops!</strong>
                                        <ul>
                                            @foreach ($errors->all() as $message)
                                            <li>{{ $message }}</li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    @endif

                                    <form action="/subjects" method="POST" id="demo-form2" data-parsley-validate
                                        novalidate class="needs-validation form-horizontal form-label-left">
                                        @csrf
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 " for="name">Subject Name <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                                    placeholder="Subject Name" required
                                                    class="form-control @error('name') is-invalid @enderror">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3 " for="name">Credit Hours <span
                                                  class="required">*</span>
                                          </label>
                                          <div class="col-md-9 col-sm-9 ">
                                              <input type="number" step="0.1" min="0.1" id="credit_hours" name="credit_hours" value="{{ old('credit_hours') }}"
                                                  placeholder="Credit Hours" required
                                                  class="form-control @error('credit_hours') is-invalid @enderror">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3 " for="name">Select Semester <span
                                                  class="required">*</span>
                                          </label>
                                          <div class="col-md-9 col-sm-9 ">
                                              <select id="semester" name="semester" class="form-control @error('semester') is-invalid @enderror">
                                                <option value="">Select Semester</option>
                                                @for ($key=1; $key<9; $key++)
                                                    <option value="{{ $key }}" {{ (old("semester") == $key ? "selected":"") }}>{{ $key }}</option>
                                                @endfor
                                              </select>
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3 " for="name">Select Department <span
                                                  class="required">*</span>
                                          </label>
                                          <div class="col-md-9 col-sm-9 ">
                                              <select id="department_id" name="department_id" class="form-control @error('department_id') is-invalid @enderror">
                                                <option value="">Selete Department</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}" {{ (old("department_id") == $department->id ? "selected":"") }}>{{ $department->name }}</option>
                                                @endforeach
                                              </select>
                                          </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-9 col-sm-9 offset-md-3 justify-content-between d-flex">
                                                <button type="submit" class="btn btn-success">Submit</button>
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
