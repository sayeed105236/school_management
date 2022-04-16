



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
            <h1 class="m-0 text-dark">Manage Marksheet Generator </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Marksheet Generator</li>
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
               
               <h3> Marksheet Generator
                

               </h3>

              </div><!-- /.card-header -->

              <div class="card-body">
                <form method="GET" action="{{route('reports.marksheet.get')}}" id="myForm" target="_blank">
                  <div class="form-row">

                    <div class="form-group col-sm-3">
                      <label for="year_id">Year</label>
                      <select name="year_id" id="year_id" class="form-control">
                        <option value="">Select Year</option>
                        @foreach($years as $year)
                        <option value="{{$year->id}}">{{$year->name}}</option>
                        @endforeach
                      </select>
                    </div>



                    <div class="form-group col-sm-3">
                      <label for="year_id">Class</label>
                      <select name="class_id" id="class_id" class="form-control">
                        <option value="">Select Class</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                      </select>
                    </div>


                     <div class="form-group col-sm-3">
                      <label for="exam_type_id">Exam</label>
                      <select name="exam_type_id" id="exam_type_id" class="form-control">
                        <option value="">Select Exam Type</option>
                        @foreach($exam_types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                      </select>
                    </div>


                    <div class="form-group col-sm-3">
                      <label for="exam_type_id">ID No</label>
                      <input type="text" name="id_no" class="form-control" id="id_no">
                    </div>


                    <div class="form-group col-sm-3">
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

      year_id: {
        required: true,
        
      },

      class_id: {
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

   









  








  @endsection