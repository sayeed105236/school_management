@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Notice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Notice</li>
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
               
               <h3> Notice List
                <a class="btn btn-success float-right btn-sm" href="{{route('web-site.notice.add')}}"><i class="fa fa-plus-circle"></i>Add Notice</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="6%">SL.</th>
                    <th>Notice Title</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th width="13%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $value)
                  <tr class="{{$value->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{$value->title}}</td>
                    <td>{{date('d-m-Y',strtotime($value->date))}}</td>
                    <td>{{$value->description}}</td>
                    <td>
                      <a title="Edit" class="btn btn-sm btn-primary" href="{{route('web-site.notice.edit',$value->id)}}"><i class="fa fa-edit"></i></a> 

                      <a title="Delete" class="delete btn btn-sm btn-danger" href="{{route('web-site.notice.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                   @endforeach
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