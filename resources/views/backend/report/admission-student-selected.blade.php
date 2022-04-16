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
               
               <h3> Select Criteria
                <a class="btn btn-success float-right btn-sm" href="{{route('reports.student.admission.view')}}"><i class="fa fa-list"></i> Admission Student List</a>
               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="GET" action="{{route('reports.student.admission.all-student.get.pdf')}}" role="form" id="MyForm" target="_blank">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="class">Class</label>
                    <select name="class" class="form-control select2bs4" required="">
                        <option value="">Select Class</option>
                        <option value="Six">Six</option>
                        <option value="Seven">Seven</option>
                        <option value="Eight">Eight</option>
                        <option value="Nine">Nine</option>
                        <option value="Ten">Ten</option>
                    </select>     
                  </div>
                  <div class="form-group col-md-4" style="padding-top: 30px;">
                    <button type="submit" class="btn btn-success btn-block">Search</button>
                  </div>
                </div>
            </form>
               
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
    $('#MyForm').validate({
        errorClass:'text-danger',
        validClass:'text-success',
      rules:{
        class:{
          required:true
        }
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