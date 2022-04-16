
@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
               
               <h3> Edit Profile
                <a class="btn btn-success float-right btn-sm" href="{{route('profile.view')}}"><i class="fa fa-list"></i>Your Profile</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">


              

              <form method="post" action="{{route('profile.update')}}" id="myForm" enctype="multipart/form-data">

<!-- {{csrf_field()}} -->

@csrf

<div class="form-row">

<div class="form-group col-md-4">
  <label for="name">Name</label>
  <input type="text" name="name" value="{{$editData->name}}" class="form-control">
</div>


<div class="form-group col-md-4">
  <label for="email">E-mail</label>
  <input type="text" name="email" value="{{$editData->email}}"  class="form-control" >
</div>



<div class="form-group col-md-4">
  <label for="mobile">Mobile No.</label>
  <input type="text" name="mobile" value="{{$editData->mobile}}"  class="form-control" >
</div>


<div class="form-group col-md-4">
  <label for="address">Address</label>
  <input type="text" name="address" value="{{$editData->address}}"  class="form-control" >
</div>


  <div class="form-group col-md-4">
    <label for=gender> Gender</label>

    <select name="gender" id="gender" class="form-control">
		<option value=""> Select Gender</option>
		<option value="Male" {{($editData->gender=="Male")?"selected":""}}>Male</option>
		<option value="Female" {{($editData->gender=="Female")?"selected":""}} >Female</option>
		</select>

  </div>

		<div class="form-group col-md4">
			<label for="Image">Image</label>
			<input type="file" name="image" value=""  class="form-control" id="image">
		</div>


		<div class="form-group col-md4">
					
			<img id="showImage" src="{{(!empty($editData->image))?url('public/upload/user_images/'.$editData->image):url('public/upload/1.jpg')}}"
       		alt="User profile picture" style="width: 170px; height: 160px; border: 1px solid #000;">		
		</div>


		<div class="form-group col-md6" style="padding-top: 30px">
		  	<input type="submit" value="Update User" class="btn btn-primary">
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

    usertype: {
        required: true,
      },



 name: {
        required: true,

      },


      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6
      },

      password2: {
        required: true,
        equalTo: '#password'
      },
    },
    messages: {

    usertype: {
        required: 'Please Select User Role',
        
      },

    name: {
        required: 'Please enter your Name',
        name: 'Please enter your Name'
      },


      email: {
        required: 'Please enter a email address',
        email: 'Please enter a <em>vaild</em> email address'
      },
      password: {
        required: 'Please Inter password',
        minlength: 'Paeeword will be minimum 6 characters or number'
      },

password2 : {
 required: 'Please enter Confirm Paeeword',
        equalTo: 'Confirm Paeeword does not match'

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