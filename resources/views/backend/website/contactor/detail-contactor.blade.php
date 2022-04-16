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
            <h1 class="m-0 text-dark">Manage Contactor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contactor</li>
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
                Details information
                <a class="btn btn-success float-right btn-sm" href="{{route('web-site.contactor.view')}}"><i class="fa fa-list"></i> Contactor List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td>Name</td>
                      <td>{{$detail->name}}</td>
                    </tr>
                    <tr>
                      <td>Mobile No</td>
                      <td>{{$detail->mobile}}</td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>{{$detail->email}}</td>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <td>{{$detail->address}}</td>
                    </tr>
                    <tr>
                      <td>Subject</td>
                      <td>{{$detail->subject}}</td>
                    </tr>
                    <tr>
                      <td>Message</td>
                      <td>{{$detail->msg}}</td>
                    </tr>
                  </tbody>
                </table>
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

  @endsection