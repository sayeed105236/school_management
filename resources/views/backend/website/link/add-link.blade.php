@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Important Link</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Important Link</li>
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
                Edit Important Link
                @else
                Add Important Link
                @endif
                <a class="btn btn-success float-right btn-sm" href="{{route('web-site.link.view')}}"><i class="fa fa-list"></i> Important Link List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{(@$editData)?route('web-site.link.update',$editData->id):route('web-site.link.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Link Title</label>
                      <input type="text" name="title" value="{{@$editData->title}}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Link URL</label>
                      <input type="text" name="url" value="{{@$editData->url}}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-primary btn-sm">{{(@$editData)?"Update":"Submit"}}</button>
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
        ignore : [],
        debug : false,
        rules: {
          title: {
            required: true,
          },
          url: {
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


  @endsection