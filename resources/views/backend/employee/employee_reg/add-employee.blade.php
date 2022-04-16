


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
            <h1 class="m-0 text-dark">Manage Employee Registration</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Registration</li>
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
               
               <h3>
                  @if(isset($editData))
                  Edit Employee Registration
                  @else
                  Add Employee Registration
                  @endif

                <a class="btn btn-success float-right btn-sm" href="{{route('employees.reg.view')}}"><i class="fa fa-list"></i>Employee Registration List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">


              

              <form method="post" action="{{(@$editData)?route('employees.reg.update',$editData->id):route('employees.reg.store')}}" id="myForm" enctype="multipart/form-data">


                @csrf



                <div class="form-row">
                  

                <div class="form-group col-md-4">
                  <label for="name">Employee Name <font style="color: red">*</font></label>
                  <input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm" >
                  <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                </div>


                <div class="form-group col-md-4">
                  <label for="name">Father's Name <font style="color: red">*</font></label>
                  <input type="text" name="fname" value="{{@$editData->fname}}" class="form-control form-control-sm" >
                  <font style="color: red">{{($errors->has('fname'))?($errors->first('fname')):''}}</font>
                </div>



                <div class="form-group col-md-4">
                  <label for="name">Mother's Name <font style="color: red">*</font></label>
                  <input type="text" name="mname" value="{{@$editData->mname}}" class="form-control form-control-sm" >
                  <font style="color: red">{{($errors->has('mname'))?($errors->first('mname')):''}}</font>
                </div>



                <div class="form-group col-md-4">
                  <label for="name">mobile Number <font style="color: red">*</font></label>
                  <input type="text" name="mobile" value="{{@$editData->mobile}}" class="form-control form-control-sm" >
                  <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                </div>



                <div class="form-group col-md-4">
                  <label for="name">Address <font style="color: red">*</font></label>
                  <input type="text" name="address" value="{{@$editData->address}}" class="form-control form-control-sm" >
                  <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                </div>



                <div class="form-group col-md-4">
                  <label for="gender">Gender <font style="color: red">*</font></label>
                <select name="gender" class="form-control form-control-sm">
                <option value="">Select Gender</option>
                <option value="Male" {{(@$editData->gender=='Male')?'selected':''}}>Male</option>
                <option value="Female" {{(@$editData->gender=='Female')?'selected':''}}>Female</option>
                <option value="Other" {{(@$editData->gender=='Other')?'selected':''}} >Other</option>
                </select>
                  <font style="color: red">{{($errors->has('gender'))?($errors->first('gender')):''}}</font>
                </div>



                <div class="form-group col-md-4">
                  <label for="religion">Religion <font style="color: red">*</font></label>
                <select name="religion" class="form-control form-control-sm">
                <option value="">Select Religion</option>
                <option value="Islam" {{(@$editData->religion=='Islam')?'selected':''}}>Islam</option>
                <option value="Hindu" {{(@$editData->religion=='Hindu')?'selected':''}}>Hindu</option>
                <option value="Other" {{(@$editData->religion=='Other')?'selected':''}}>Other</option>
                </select>
                  <font style="color: red">{{($errors->has('religion'))?($errors->first('religion')):''}}</font>
                </div>



                <div class="form-group col-md-4">
                  <label for="name">Date Of Birth <font style="color: red">*</font></label>
                  <input type="text" name="dob" value="{{@$editData->dob}}" class="form-control form-control-sm singledatepicker" id="datepicker" autocomplete="off" >
                  <font style="color: red">{{($errors->has('dob'))?($errors->first('dob')):''}}</font>
                </div>




                <div class="form-group col-md-4">
                  <label for="salary">Salary  <font style="color: red">*</font></label>
                  <input type="text" name="salary" value="{{@$editData->salary}}" class="form-control form-control-sm">
                  <font style="color: red">{{($errors->has('salary'))?($errors->first('salary')):''}}</font>
                </div>




                <div class="form-group col-md-3">
                  <label>Designation <font style="color: red">*</font></label>
                <select name="designation_id" class="form-control form-control-sm">
                <option value="">Select Designation</option>

                @foreach($designations as $designation)
                <option value="{{$designation->id}}" {{(@$editData->designation_id==$designation->id)?'selected':''}} >{{$designation->name}}</option>
                @endforeach

                </select>
                </div>


                <div class="form-group col-md-3">
                  <label for="join_date">Join Date <font style="color: red">*</font></label>
                  <input type="text" name="join_date" value="{{@$editData->join_date}}" class="form-control form-control-sm singledatepicker" id="join_date" autocomplete="off" >
                  <font style="color: red">{{($errors->has('join_date'))?($errors->first('join_date')):''}}</font>
                </div>



                <div class="form-group col-md3">
                      <label for="Image">Image <font style="color: red">*</font></label>
                      <input type="file" name="image" value=""  class="form-control" id="image">
                    </div>


                    <div class="form-group col-md3">
                          
                      <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/employee_images/'.$editData->image):url('public/upload/1.jpg')}}"
                          alt="User profile picture" style="width: 100px; height: 110px; border: 1px solid #000;">    
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">{{(@$editData)?'Update':'submit'}}</button>

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

      fname: {
        required: true,
        name: true,
      },

      mname: {
        required: true,
        name: true,
      },

      
      mobile: {
        required: true,
        minlength: 11
      },

      gender: {
        required: true,
        
      },


      address: {
        required: true,
        
      },


       religion: {
        required: true,
        
      },


      dob: {
        required: true,
        
      },

      salary: {
        required: true,
        
      },

       designation_id: {
        required: true,
        
      },


       join_date: {
        required: true,
        
      },


      image: {
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
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#join_date').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>



  @endsection