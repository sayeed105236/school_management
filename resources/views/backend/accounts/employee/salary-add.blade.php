


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
            <h1 class="m-0 text-dark">Manage Employee Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Salary</li>
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
              Add/Edit Employee Salary

                <a class="btn btn-success float-right btn-sm" href="{{route('accounts.salary.view')}}"><i class="fa fa-list"></i>Employee Salary List</a>

               </h3>

              </div><!-- /.card-header -->


<div class="card-body">


                <div class="form-row">


                <div class="form-group col-md-4">
                  <label class="control-label">Date</label>
                  <input type="text" name="date" id="date" class="form-control form-control-sm singledatepicker " autocomplete="off" placeholder="date" >
                </div>

                <div class="form-group col-md-2">
                 <a class="btn btn-sm btn-success" id="search" style="margin-top: 30px; color: white">Search</a>
                </div>
              </div>
</div>
          













             
              </div>



              <div class="card-body" >

              
                <div id="DocumentResults"></div>

  <script id="document-template" type="text/x-handlebars-template">

    <form action="{{route('accounts.salary.store')}}" method="post">

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


   <table style="width: 100%">

   </table>



<button type="submit" class="btn btn-primary btn-sm" style="margin-top:10px;"> Submit </button>
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

    var date = $('#date').val();
    $('.notifyjs-corner').html('');
    
    if (date =='') {

      $.notify("Date Required", {globalPosition: 'top right',className: 'error'});
      return false;
    }

    $.ajax({
      url: "{{route('accounts.salary.get-employee')}}",
      type: "get",
      data: {'date':date},
      beforeSend: function(){
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();


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