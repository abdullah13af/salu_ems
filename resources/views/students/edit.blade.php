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
                            <h3>Students </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 class="text-center">Add New Student</h2>
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

                                    <form action="/students/{{ $student->id }}" method="POST" id="demo-form2" data-parsley-validate
                                        novalidate class="needs-validation form-horizontal form-label-left">
                                        @csrf
                                        @method('PUT')
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 " for="name">Student Name
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" id="name" name="name" value="{{ $student->user->name }}"
                                                    placeholder="Student Name" required
                                                    class="form-control @error('name') is-invalid @enderror">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 " for="name">Student's Email
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" id="email" name="email" value="{{ $student->user->email }}"
                                                    placeholder="Student's Email" required
                                                    class="form-control @error('email') is-invalid @enderror">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 " for="name">Student's
                                                Password <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="password" id="password" name="password"
                                                    value="{{ $student->user->password }}" placeholder="Student's Password"
                                                    required
                                                    class="form-control @error('password') is-invalid @enderror">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 " for="name">Select
                                                Department <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select id="department_id" name="department_id"
                                                    class="form-control @error('department_id') is-invalid @enderror">
                                                    <option value="">Selete Department</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}"
                                                            {{ $student->department_id == $department->id ? 'selected' : '' }}>
                                                            {{ $department->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 " for="name">Select
                                                Batch <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select id="batch_id" name="batch_id"
                                                    class="form-control @error('batch_id') is-invalid @enderror">
                                                    <option value="">Selete Department</option>
                                                    @foreach ($batches as $batch)
                                                        <option value="{{ $batch->id }}"
                                                            {{ $student->batch_id == $batch->id ? 'selected' : '' }}>
                                                            {{ $batch->name }}</option>
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
