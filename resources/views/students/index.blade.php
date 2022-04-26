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
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>All Students</h2>
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
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Batch</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($students as $student)
                        <tr>
                          <td>{{ $student->user->name }}</td>
                          <td>{{ $student->user->email }}</td>
                          <td>{{ $student->department->name }}</td>
                          <td>{{ $student->batch->name }}</td>
                          <td style="width: 50px">

                            <div class="d-flex">
                              <a href="students/{{ $student->id }}/edit" class="mx-2" data-toggle="tooltip" data-placement="top" title="Edit Student">
                                <i class="fa fa-pencil text-primary"></i>
                              </a>                             
                              <button style="border: none; background-color: transparent" class="mx-2" data-toggle="modal" data-target="#delete{{ $student->id }}">
                                <i class="fa fa-trash text-danger" data-toggle="tooltip" data-placement="top" title="Delete Student"></i></th>
                              </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="delete{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $student->id }}Title" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Student?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure to delete this student? You can't undo this action.
                                  </div>
                                  <div class="modal-footer">
                                    <form action="students/{{ $student->id }}" method="POST">
                                      @csrf
                                      @method('delete')
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

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
