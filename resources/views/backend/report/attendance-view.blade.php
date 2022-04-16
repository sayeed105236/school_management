



@extends('backend.layouts.master')

@section('content')

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Attendence Report </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendence Report </li>
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
               
               <h3> Attendence Report 
                

               </h3>

              </div><!-- /.card-header -->

              <div class="card-body">
                <form method="GET" action="{{route('reports.attendance.get')}}" id="myForm" target="_blank">
                  <div class="form-row">

                    <div class="form-group col-sm-3">
                      <label for="employee_id">Employee Name</label>
                      <select name="employee_id" id="employee_id" class="form-control">
                        <option value="">Select Employee Name</option>
                        @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                      </select>
                    </div>





                    <div class="form-group col-sm-3">
                      <label>Date</label>
                    <input type="text" name="date" class="singledatepicker form-control" placeholder="DD-MM-YYYY" readonly>
                    </div>




                    <div class="form-group col-sm-3" style="padding-top: 30px;">
                     <button type="submit" class="btn btn-primary" name="search">Search</button>
                    </div>
                  </div>
                </form>








                 </div><!-- /.card-body -->

              </div><!-- /.form-row -->
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



<script type="text/javascript">
$(document).ready(function () {


  $('#myForm').validate({
    rules: {

      employee_id: {
        required: true,
        
      },

      date: {
        required: true,
       
      },

      exam_type_id: {
        required: true,
       
      },
      
      id_no: {
        required: true,
        
      },
    },
    messages: {

    

    
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

   





<script>
        $('.singledatepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>



  








  @endsection