


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
            <h1 class="m-0 text-dark">Manage Student Fee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Fee</li>
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
              Add/Edit Student Fee

                <a class="btn btn-success float-right btn-sm" href="{{route('accounts.fee.view')}}"><i class="fa fa-list"></i>Student Fee List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">

                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="year_id">Year</label>
                    <select name="year_id" id="year_id" class="form-control select2bs4">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                    <option value="{{$year->id}}">{{$year->name}}</option>
                    @endforeach
                  </select>
                  </div>

                   <div class="form-group col-md-3">
                    <label for="class_id">Class</label>
                    <select name="class_id" id="class_id" class="form-control select2bs4">
                    <option value="">Select Class</option>
                    @foreach($classes as $class)
                    <option value="{{$class->id}}">{{$class->name}}</option>
                    @endforeach
                  </select>
                  </div>

                    <div class="form-group col-md-3">
                    <label for="fee_category_id">Fee Category</label>
                    <select name="fee_category_id" id="fee_category_id" class="form-control select2bs4">
                    <option value="">Select Fee Category</option>
                    @foreach($fee_categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                  </div>


                  <div class="form-group col-md-3">
                    <label>Date</label>
                    <input type="text" name="date" id="date" class="form-control singledatepicker" placeholder="MM-DD-YYYY">
                  </div>

                  <div class="form-group col-md-3">
                    <a id="search" class="btn btn-primary btn-sm" name="search">Search</a>
                  </div>
                </div>

<div class="card-body">

  <div id="DocumentResults"></div>

  <script id="document-template" type="text/x-handlebars-template">

    <form action="{{route('accounts.fee.store')}}" method="post">

    @csrf

    <table class="table-sm table-bordered table-striped" style="width: 100%">
      <thead>
        <tr>
          @{{{thsource}}}
        </tr>
      </thead>

      <tbody>
        @{{#each this}}

        <tr>
          @{{{tdsource}}}
        </tr>
        @{{/each}}
      </tbody>
    </table>


<button type="submit" class="btn btn-primary btn-sm" style="margin-top:10px; "> Submit </button>
</form>


  </script>
  


</div>







             
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



  <script type="text/javascript">
    $(document).on('click','#search',function(){

      var year_id = $('#year_id').val();
      var class_id = $('#class_id').val();
      var fee_category_id = $('#fee_category_id').val();
      var date = $('#date').val();
      $('.notifyjs-corner').html('');

      if (year_id =='') {

        $.notify('Year required', {golobalPosition: 'top right',className: 'error'});
        return false;
      }

      if (class_id =='') {

        $.notify('Class required', {golobalPosition: 'top right',className: 'error'});
        return false;
      }

       if (fee_category_id =='') {

        $.notify('Fee Category required', {golobalPosition: 'top right',className: 'error'});
        return false;
      }

      if (date =='') {

        $.notify('Date required', {golobalPosition: 'top right',className: 'error'});
        return false;
      }

      $.ajax({
        url: "{{route('accounts.fee.getstudent')}}",
        type: "get",
        data: {'year_id':year_id,'class_id':class_id,'fee_category_id':fee_category_id,'date':date},
        beforeSend: function() {

        },

        success: function (data){
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $('#DocumentResults').html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
      });
      });
  </script>








  


  
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


<script>
        $('#date').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>


  @endsection