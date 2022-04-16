<!DOCTYPE html>
<html>
<head>
  <title> Student Id Card </title>

  <!-- Latest compiled and minified CSS -->

  
  <style type="text/css">
    table {
      border-collapse: collapse;
    }



    h2 h3{

      margin: 0;
      padding: 0;
    }


     p{

        text-align: center;
      
      
    }



    .table {

      width: 100%;
      margin-bottom: 1rem;
      background-color: transparent;
    }

    .table th,
    .table td {

      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;

    }

    .table thead th {

      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6; 
    }

    .table  tbody + tbody {
      border-top: 2px solid #dee2e6;
    }

    .table .table {

      background-color: #fff;
    }

    .table-bordered {
      border: 1px solid #dee2e6;

    }


    .table-bordered th,
    .table-bordered td {

      border: 1px solid #dee2e6 ;
    }


    .table-bordered thead th,
    .table-bordered thead td {

      border-bottom-width: 2px;
    }

    .text-center{

      text-align: center;
    }

    .text-right{

      text-align: right;
    }

    table tr td {
      padding: 5px;
    }

    .table-bordered thead th, .table-bordered td, .table-bordered th {
      border: 1px solid black !important;
    }

    .table-bordered thead th{
      background-color: #cacaca;
    }
  </style>
</head>
<body>

<div class="container">
  @foreach($allData as $data)

  <div class="row" style="margin-bottom: 20px;">

    <div class="col-md-12" style="border: 1px solid #000; margin: 0px 50px 0px 50px">
      <table border="0" width="100%">
        <tbody>





          <tr>
            <td width="10%" style="padding: 10px;">
              <img src="{{url('public/upload/logo.png')}}" style="height: 180px; width: 150px; border-radius: 5px;" >
            </td>

            <td width="80%" class="text-center">
              <p style="color: red; font-size: 30px;  margin-bottom: 5px !important;" ><strong> Razbari HIGH SCHOOL </strong></p>
              <p  style="padding: 1px; font-size: 25px; "> Mithapukur, Rangpur</p>
              <p style="padding: 1px; font-size: 30px; ">Helf Yearly Exam</p>
              <p class="btn btn-submit" style="padding: 1px; font-size: 40px; "> Admit Card</p>

            </td>


            <td width="10%" style="padding: 10px; " class="text-right">
              <img src="{{url('public/upload/student_images/'.$data['student']['image'])}}" style="height: 180px; width: 150px; border-radius: 5px;" >
            </td>
          </tr>


          <tr>
            <td width="80%" style="padding: 10px 3px 10px 5px"><p style="font-size: 30px"><strong>Name :</strong> {{$data['student']['name']}}</p></td>

            <td width="20%" style="padding: 10px 3px 10px 5px"><p style="font-size: 30px"><strong>ID No :</strong> {{$data['student']['id_no']}}</p></td>

            <td width="20%" style="padding: 10px 3px 10px 5px"><p style="font-size: 30px"><strong>Roll :</strong> {{$data->roll}}</p></td>



          </tr> 



          

          <tr>
             <td width="33%" style="padding: 10px 3px 10px 5px"><p style="font-size: 30px"><strong>Session :</strong> {{$data['year']['name']}}</p></td>

             <td width="33%" style="padding: 10px 3px 10px 5px"><p style="font-size: 30px"><strong>Class :</strong> {{$data['student_class']['name']}}</p></td>

              <td width="70%" style="padding: 10px 3px 10px 5px"><p style="font-size: 30px"><strong>Mobile No :</strong> {{$data['student']['mobile_no']}}</p></td>

          </tr>

          

          <tr><td></td><td></td><td > </td></tr>

          <tr><td></td><td></td><td > </td></tr>

          <tr><td></td><td></td><td > </td></tr>

          <tr><td></td><td></td><td > </td></tr>



          <tr>
          
            <td></td>
            <td></td>
            <td class="text-center" >
              <hr style="border: solid 1px; width: 100%; color: #000; margin-bottom: 0px; margin-left: 400px;"  ><p style="font-size: 30px; ">Headmaster</p>
            </td>

            
          </tr>


          

        </tbody>
      </table>
    </div>
  </div>

  @endforeach
  
</div>


</body>
</html>

