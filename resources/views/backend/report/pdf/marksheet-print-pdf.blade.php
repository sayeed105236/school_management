



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
            <h1 class="m-0 text-dark">Manage Marksheet Generator </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Marksheet Generator</li>
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
               
               <h3> Marksheet </h3>

              </div><!-- /.card-header -->

              <div class="card-body">

              <div style="border: solid 5px; padding: 7px">

                <div class="row">
                  <div style="float: right;" class="col-md-2 text-center">

                    <img src="{{url('public/upload/1.png')}}" style="width: 120px; height: 120px; float: right;">

                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-6 text-center" style="float: left;">
                      <h5> <strong> Razbari HIGH SCHOOL </strong> </h5>
                      <h6> <strong> Mithapukur, RANGPUR </strong> </h6>
                      <H5><STRONG><U><I>Academic Transcript</I></U></STRONG></H5>
                      <h6><strong>{{$allMarks['0']['exam_type']['name']}}</strong></h6>

                    </div>
                  




<div class="col-md-12">
  
<hr style="border: solid 1px; width: 100%; color: #DDD; margin-bottom: 0px">

<p style="text-align: right;"><u><i>Print Date: </i> {{date("d M Y")}} </u></p>
</div>
                 </div>


<div class="row">
  <div class="col-md-6">
    <table border="1" width="100%" cellpadding="9" cellspacing="2">
      @php
      $assign_student = App\Model\AssignStudent::where('year_id',$allMarks['0']->year_id)->where('class_id',$allMarks['0']->class_id)->first();
      @endphp

      <tr>
        <td width="50%">Student ID</td>
        <td width="50%">{{$allMarks['0']['id_no']}}</td>
      </tr>

      <tr>
        <td width="50%">Roll No</td>
        <td width="50%">{{$assign_student->roll}}</td>
      </tr>

       <tr>
        <td width="50%">Name</td>
        <td width="50%">{{$allMarks['0']['student']['name']}}</td>
      </tr>


      <tr>
        <td width="50%">Name</td>
        <td width="50%">{{$allMarks['0']['student_class']['name']}}</td>
      </tr>

      <tr>
        <td width="50%">Session</td>
        <td width="50%">{{$allMarks['0']['year']['name']}}</td>
      </tr>
      


    </table>
    



  </div>




<div class="col-md-6">
    <table border="1" width="100%" cellpadding="1" cellspacing="1" class="text-center">
     
      <thead>
        <tr>
          <th>Letter Grade</th>
          <th>Marks Interval</th>
          <th>Grade Point</th>
        </tr>
      </thead>
      <tbody>
        @foreach($allGreades as $marks)
        <tr>
          <td>{{$marks->grade_name}}</td>
          <td>{{$marks->start_marks}}</td>
          <td>

            {{number_format((float)$marks->grade_point,2)}} - {{ ($marks->grade_point == 5)?(number_format((float)$marks->grade_point,2)):(number_format((float)$marks->grade_point+1,2) - (float)0.01)}}
          </td>
        </tr>
        @endforeach

      </tbody>


    </table>
    



  

</div>


</div>

                

                 </div>

                 </div><!-- /.card-body -->

              </div><!-- /.form-row -->
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