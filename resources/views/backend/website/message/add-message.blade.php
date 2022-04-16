@extends('backend.layouts.master')
@section('content')
<style type="text/css">
  #Iframe-Master-CC-and-Rs {
    max-width: 100%;
    max-height: 1200px; 
    overflow: hidden;
  }

  /* inner wrapper: make responsive */
  .responsive-wrapper {
    position: relative;
    height: 0;    /* gets height from padding-bottom */ 
  }

  .responsive-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    margin: 0;
    padding: 0;
    border: none;
  }

  /* padding-bottom = h/w as % -- sets aspect ratio */
  /* YouTube video aspect ratio */
  .responsive-wrapper-wxh-572x612 {
    padding-bottom: 107%;
  }

  /* general styles */
  /* ============== */
  .set-border {
    border: 5px inset #4f4f4f;
  }
  .set-box-shadow { 
    -webkit-box-shadow: 4px 4px 14px #4f4f4f;
    -moz-box-shadow: 4px 4px 14px #4f4f4f;
    box-shadow: 4px 4px 14px #4f4f4f;
  }
  .set-padding {
    padding: 40px;
  }
  .set-margin {
    margin: 30px;
  }
  .center-block-horiz {
    margin-left: auto !important;
    margin-right: auto !important;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Principal Message</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Principal Message</li>
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
                Edit Principal Message
                @else
                Add Principal Message
                @endif
                <a class="btn btn-success float-right btn-sm" href="{{route('web-site.principal.message.view')}}"><i class="fa fa-list"></i> Principal Message List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{(@$editData)?route('web-site.principal.message.update',$editData->id):route('web-site.principal.message.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="image">Image </label>
                      <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group col-md-4">
                      <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/principal_images/'.$editData->image):url('public/backend/default.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="title">Short Title</label>
                      <textarea name="short_description" class="form-control" rows="5">{{@$editData->short_description}}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="description">Long Title</label>
                      <textarea name="description" class="form-control" rows="8">{{@$editData->description}}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
                    </div>
                  </div>
                </form>
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
    $(document).ready(function(){
      var a1 = CKEDITOR.replace('description');
        CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('description').each(function(){
              $(this).val($(this).val().trim());
          }
      );

      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          short_description: {
            required: true,
          },
          description: {
            required: true,
          }
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