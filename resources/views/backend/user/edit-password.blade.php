


@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">password</li>
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
               
               <h3> Edit Password
               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">


              

			<form method="post" action="{{route('profile.password.update')}}" id="myForm">

					<!-- {{csrf_field()}} -->

					@csrf

					<div class="form-row">


					<div class="form-group col-md-4">
					  <label for="password">Current Password</label>
					  <input type="password" name="current_password" id="current_password" class="form-control">
					</div>

					<div class="form-group col-md-4">
					  <label for="password">New Password</label>
					 <input type="password" name="new_password" id="new_password" class="form-control">
					</div>



					<div class="form-group col-md-4">
					  <label for="password">Again New Password</label>
					  <input type="password" name="again_new_password" class="form-control">
					</div>


					<div class="form-group col-md-6">
					  <input type="submit" value="Confirm" class="btn btn-primary">
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

 current_password: {
        required: true,
        minlength: 6
      },


      
      new_password: {
        required: true,
        minlength: 6
      },

      again_new_password: {
        required: true,
        equalTo: '#new_password'
      },
    },
    messages: {
    	current_password: {
        required: 'Please Inter Current password',
       
      },

      new_password: {
        required: 'Please Inter New password',
        minlength: 'Paeeword will be minimum 6 characters or number'
      },

again_new_password : {
 required: 'Please enter again new Paeeword',
        equalTo: 'Again new Password does not match'

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