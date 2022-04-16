


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
            <h1 class="m-0 text-dark">Manage Employee Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Leave</li>
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
                  Edit Employee Leave
                  @else
                  Add Employee Leave
                  @endif

                <a class="btn btn-success float-right btn-sm" href="{{route('employees.leave.view')}}"><i class="fa fa-list"></i>Employee Leave List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">


              

             <form method="post" action="{{(@$editData)?route('employees.leave.update',$editData->id):route('employees.leave.store')}}" id="myForm" enctype="multipart/form-data">

@csrf

<div class="form-row">
  

<div class="form-group col-md-4">
  <label>Employee Name <font style="color: red">*</font></label>
  <select name="employee_id" class="form-control form-control-sm">
  <option value="">Select Employee</option>
  @foreach($employees as $employee)
  <option value="{{$employee->id}}" {{(@$editData->employee_id==$employee->id)?'selected':''}} >{{$employee->name}}</option>
  @endforeach

  </select>
</div>




<div class="form-group col-md-4">
  <label>Start Date <font style="color: red">*</font></label> 
  <input type="text" name="start_date" value="{{@$editData->start_date}}" class="form-control form-control-sm singledatepicker" id="datepicker" placeholder="Start Date">
</div>


<div class="form-group col-md-4">
  <label>End Date <font style="color: red">*</font></label> 
  <input type="text" name="end_date" value="{{@$editData->end_date}}" class="form-control form-control-sm singledatepicker" id="end_date" placeholder="End Date">
</div>



<div class="form-group col-md-4">
  <label>Leave Purpose <font style="color: red">*</font></label>
  <select name="leave_purpose_id" id="leave_purpose_id" class="form-control form-control-sm">
  <option value="">Select Purpose</option>
  @foreach($Leave_purpose as $purpose)
  <option value="{{$purpose->id}}" {{(@$editData->leave_purpose_id==$purpose->id)?'selected':''}}>{{$purpose->name}}</option>
  @endforeach

  <option value="0">New Purpose</option>
  </select>

  <input type="text" name="name" class="form-control form-control-sm" placeholder="Write Purpose" id="add_others" style="display: none;">


</div>



<div class="form-group col-md-4" style="padding-top: 30px " >
  <button type="submit" class="btn btn-primary btn-sm" >{{(@$editData)?'Update':'Submit'}}</button>
 
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

      employee_id: {
        required: true,
        employee_id: true,
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

    

    employee_id: {
        required: 'Please Select Employee',
        employee_id: 'Please Select Employee'
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


<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('change','#leave_purpose_id',function(){
      var leave_purpose_id = $(this).val();
      if(leave_purpose_id == '0'){
        $('#add_others').show();
      }else{

        $('#add_others').hide();
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
        $('#end_date').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>


  @endsection