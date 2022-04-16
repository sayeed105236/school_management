
@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
               
               <h3> Add User
                <a class="btn btn-success float-right btn-sm" href="{{route('users.view')}}"><i class="fa fa-list"></i>User List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">


              

              <form method="post" action="{{route('users.store')}}" id="myForm">

<!-- {{csrf_field()}} -->

@csrf

<div class="form-row">
  <div class="form-group col-md4">
    <label for="role"> User Role</label>

    <select name="role" id="role" class="form-control">
    <option value=""> Select Role</option>
    <option value="Admin">Admin</option>
    <option value="Operator">Operator</option>
    </select>

  </div>

<div class="form-group col-md4">
  <label for="name">Name</label>
  <input type="text" name="name" class="form-control">
  <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
</div>



<div class="form-group col-md4">
  <label for="email">E-mail</label>
  <input type="text" name="email" class="form-control" >
  {{($errors->has('email'))?($errors->first('email')):''}}</font>
</div>


<!-- <div class="form-group col-md4">
  <label for="password">Password</label>
  <input type="password" name="password" id="password" class="form-control">
</div>



<div class="form-group col-md4">
  <label for="password">Confirm Password</label>
  <input type="password" name="password2" class="form-control">
</div> -->


<div class="form-group col-md6">
  <input type="submit" value="Add User" class="btn btn-primary">
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

    role: {
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

    role: {
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