


@extends('backend.layouts.master')

@section('content')



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Grade Point</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Grade Point</li>
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
                  Edit Grade Point
                  @else
                  Add Grade Point
                  @endif

                <a class="btn btn-success float-right btn-sm" href="{{route('marks.grade.view')}}"><i class="fa fa-list"></i>Grade Point List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">


             <form method="post" action="{{(@$editData)?route('marks.grade.update',$editData->id):route('marks.grade.store')}}" id="myForm">

              @csrf

              <div class="card-body">

                <div class="form-row">
                  <div class="form-group col-sm-4">
                    <label>Grade Name</label>
                    <input type="text" name="grade_name" value="{{@$editData->grade_name}}" class="form-control">
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Grade Point</label>
                    <input type="text" name="grade_point" value="{{@$editData->grade_point}}" class="form-control">
                  </div>

                   <div class="form-group col-sm-4">
                    <label>Start Marks</label>
                    <input type="text" name="start_marks" value="{{@$editData->start_marks}}" class="form-control">
                  </div>

                   <div class="form-group col-sm-4">
                    <label>End Marks</label>
                    <input type="text" name="end_marks" value="{{@$editData->end_marks}}" class="form-control">
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Start Point</label>
                    <input type="text" name="start_point" value="{{@$editData->start_point}}" class="form-control">
                  </div>


                  <div class="form-group col-sm-4">
                    <label>End Point</label>
                    <input type="text" name="end_point" value="{{@$editData->end_point}}" class="form-control">
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Remarks</label>
                    <input type="text" name="remarks" value="{{@$editData->remarks}}" class="form-control">
                  </div>

                  <div class="form-group col-sm-4" style="padding-top: 30px;">
                    <button type="submit" class="btn btn-success">{{(@$editData) ? 'Update' : 'Submit'}}</button>
                  </div>
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


  


  
  <!-- /.Validation -->

<script type="text/javascript">
$(document).ready(function () {


  $('#myForm').validate({
    rules: {

      grade_name: {
        required: true,
        grade_name: true,
      },


      
      mobile_no: {
        required: true,
        minlength: 11
      },

      grade_point: {
        required: true,
      },

      start_marks: {
        required: true,
      },

      end_marks: {
        required: true,
      },

      start_point: {
        required: true,
      },

      end_point: {
        required: true,
      },

      remarks: {
        required: true,
      },



    },
    messages: {

    

    date: {
        required: 'Please Input Your Attdendance Date',
        date: ' Please Input Your Attdendance Date'
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





  @endsection