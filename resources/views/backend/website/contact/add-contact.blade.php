@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
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
                Edit Contact
                @else
                Add Contact
                @endif
                <a class="btn btn-success float-right btn-sm" href="{{route('web-site.contact.view')}}"><i class="fa fa-list"></i> Contact List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{(@$editData)?route('web-site.contact.update',$editData->id):route('web-site.contact.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>School Name</label>
                      <input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Mobile</label>
                      <input type="text" name="mobile" value="{{@$editData->mobile}}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Email</label>
                      <input type="email" name="email" value="{{@$editData->email}}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Address</label>
                      <input type="text" name="address" value="{{@$editData->address}}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Facebook</label>
                      <input type="text" name="facebook" value="{{@$editData->facebook}}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Twitter</label>
                      <input type="text" name="twitter" value="{{@$editData->twitter}}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Youtube</label>
                      <input type="text" name="youtube" value="{{@$editData->youtube}}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Google Plus</label>
                      <input type="text" name="google_plus" value="{{@$editData->google_plus}}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="image">Logo </label>
                      <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group col-md-2">
                      <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/contact_images/'.$editData->image):url('public/backend/default.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
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
          name: {
            required: true,
          },
          mobile: {
            required: true,
          },
          email: {
            email: true,
            required: true,
          },
          address: {
            required: true,
          },
          facebook: {
            required: true,
          },
          twitter: {
            required: true,
          },
          youtube: {
            required: true,
          },
          google_plus: {
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