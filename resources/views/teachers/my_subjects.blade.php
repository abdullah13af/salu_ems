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
                  <h3>My Subjects </h3>
              </div>
          </div>
          <div class="clearfix"></div>
          
          <div class="row justify-content-center align-items-center">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>My Subjects</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="card-box table-responsive">
                  <p class="text-muted font-13 m-b-30">
                  </p>
                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Subject Name</th>
                        <th>Department Name</th>
                        <th>Semester</th>
                        <th>Credit Hours</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($subjects as $subject)
                        <tr>
                          <td>{{ $subject->name }}</td>
                          <td>{{ $subject->department->name }}</td>
                          <td>{{ $subject->semester }}</td>
                          <td>{{ $subject->credit_hours }}</td>
                          <td>
                            <a href="/subjects_marks/{{ $subject->id }}" class="" data-toggle="tooltip" data-placement="top" title="Manage Students Marks">
                              <i class="fa fa-tasks" style="font-size: 20px" aria-hidden="true"></i>
                            </a>   
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('layouts.footer')
    
</body>
</html>
