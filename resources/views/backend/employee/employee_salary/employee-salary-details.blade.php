


@extends('backend.layouts.master')

@section('content')

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
               
               <h3>Employee Salary Details
                <a class="btn btn-success float-right btn-sm" href="{{route('employees.salary.view')}}"><i class="fa fa-list"></i> Employee List</a>

               </h3>

              </div><!-- /.card-header -->
              <div class="card-body">

<h5><strong>Employee Name </strong> {{$details->name}}<br></h5>

      <table id="example1" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>SL No.</th>
              <th>Previous Salary</th>
              <th>Increment Salary</th>
              <th>Present Salary</th>
              <th>Effected Date</th>

          </tr>
        </thead>

        @foreach($salary_log as $key => $value )

         <tbody>
          <tr>

            @if($key=="0")

            <td colspan="5" class="text-center"><strong>Joining Salary :</strong> {{$value->previous_salary}} </td>

            @else

            <td>{{$key+1}}</td>
            <td>{{$value->previous_salary}}</td>
            <td>{{$value->increment_salary}}</td>
            <td>{{$value->present_salary}}</td>
            <td>{{$value->effected_date}}</td>
            @endif
            
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