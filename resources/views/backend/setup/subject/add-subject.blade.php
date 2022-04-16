


@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subject</li>
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
               
               <h3> Add Subject
                <a class="btn btn-success float-right btn-sm" href="{{route('setups.subject.view')}}"><i class="fa fa-list"></i>Subject List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">


              

              <form method="post" action="{{route('setups.subject.store')}}" id="myForm">

<!-- {{csrf_field()}} -->

@csrf

<div class="form-row">
  

<div class="form-group col-md-6">
  <label for="name">Subject</label>
  <input type="text" name="name" class="form-control">
</div>



<div class="form-group col-md-6" style="padding-top: 30px " >
  <input type="submit" value="Add Subject" class="btn btn-primary">
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


  $('#myForm').validate({
    rules: {

      name: {
        required: true,
        name: true,
      },


      
      mobile_no: {
        required: true,
        minlength: 11
      },

      address: {
        required: true,
        
      },
    },
    messages: {

    

    name: {
        required: 'Please enter Class Name',
        name: 'Please enter Class Name'
      },


      
      mobile_no: {
        required: 'Please enter a Supplier Mobile no',
        minlength: 'Mobile will be minimum 11 number'
      },

address: {
 required: 'Please enter a Supplier Address',
 address: 'Please enter a Supplier Address'
        

},
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