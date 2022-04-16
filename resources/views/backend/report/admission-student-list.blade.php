@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student Admission</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Admission</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
               
               <h3> Student Admission List
                <a class="btn btn-success float-right btn-sm" href="{{route('reports.student.admission.all-student.get')}}"><i class="fa fa-download"></i> All Student PDF</a>
               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th> Name</th>
                      <th> Mobile No</th>
                      <th> Address</th>
                      <th> Gender</th>
                      <th> Class</th>
                      <th> From No</th>
                      <th> Payment</th>
                      <th> Status</th>
                      <th width="18%"> Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->mobile}}</td>
                      <td>{{$value->address}}</td>
                      <td>{{$value->gender}}</td>
                      <td>{{$value->class}}</td>
                      <td>{{$value->bkash}}</td>
                      <td>{{$value->payment_method}} (Transaction No:{{$value->transaction_no}})</td>
                      <td>
                        @if($value->status=='0')
                        <span>Pending & Processing on going</span>
                        @elseif($value->status=='1')
                        <span>Paid & Processing on going</span>
                        @elseif($value->status=='2')
                        <span>Rejected</span>
                        @elseif($value->status=='3')
                        <span>Selected</span>
                        @endif
                      </td>
                      <td>
                        <a title="Details" target="_blank" class="btn btn-sm btn-success" href="{{route('reports.student.admission.pdf',$value->id)}}"><i class="fa fa-eye"></i></a>

                        <a title="Paid" id="activate" class="btn btn-sm btn-primary" href="{{route('reports.student.admission.approve')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-check"></i></a>
                        
                        <a title="Reject" id="reject" class="btn btn-sm btn-danger" href="{{route('reports.student.admission.reject')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-window-close"></i></a>

                        <a title="Select" id="select" class="btn btn-sm btn-info" href="{{route('reports.student.admission.select')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-thumbs-up"></i></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              

               
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

  <script>  
    $(document).ready(function () {
      $(document).on('click', '#activate', function () {
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
          title: "Are you sure?",
          type: "success",
          showCancelButton: true,
          confirmButtonClass: 'btn-primary',
          confirmButtonText: 'Yes',
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function (isConfirm) {
          if (isConfirm) {
            $.ajax({
              url:actionTo,
              type: 'post',
              data: {id:id, _token:token},
              success: function (data) {
                swal({
                  title: "Paid!",
                  type: "success"
                },
                function (isConfirm) {
                  if (isConfirm) {
                    location.reload();
                  }
                });
              }
            });
          } else {
            swal("Cancelled", "", "error");
          }
        });
        return false;
      });
    });
  </script>

  <script>  
    $(document).ready(function () {
      $(document).on('click', '#reject', function () {
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
          title: "Are you sure?",
          type: "success",
          showCancelButton: true,
          confirmButtonClass: 'btn-primary',
          confirmButtonText: 'Yes',
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function (isConfirm) {
          if (isConfirm) {
            $.ajax({
              url:actionTo,
              type: 'post',
              data: {id:id, _token:token},
              success: function (data) {
                swal({
                  title: "Rejected!",
                  type: "success"
                },
                function (isConfirm) {
                  if (isConfirm) {
                    location.reload();
                  }
                });
              }
            });
          } else {
            swal("Cancelled", "", "error");
          }
        });
        return false;
      });
    });
  </script>

  <script>  
    $(document).ready(function () {
      $(document).on('click', '#select', function () {
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
          title: "Are you sure?",
          type: "success",
          showCancelButton: true,
          confirmButtonClass: 'btn-primary',
          confirmButtonText: 'Yes',
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function (isConfirm) {
          if (isConfirm) {
            $.ajax({
              url:actionTo,
              type: 'post',
              data: {id:id, _token:token},
              success: function (data) {
                swal({
                  title: "Selected!",
                  type: "success"
                },
                function (isConfirm) {
                  if (isConfirm) {
                    location.reload();
                  }
                });
              }
            });
          } else {
            swal("Cancelled", "", "error");
          }
        });
        return false;
      });
    });
  </script>


  @endsection