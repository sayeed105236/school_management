


<!DOCTYPE html>
<html>
<head>
	<title>Employee Attendence Report</title>
	
	<style type="text/css">
		table {
			border-collapse: collapse;
		}

		h2 h3{

			margin: 0;
			padding: 0;
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


	

		<div class="row">
			<div class="col-md-12"></div>

				
				<table width="80%" border="">
					<tr>
						<td width="33%" class="text-center">
							<img src="{{url('public/upload/logo.png')}}" style="width: 100px; height: 100px"></td>

						<td class="text-center" width="63%">
							<h4><strong>Razbari HIGH SCHOOL</strong></h4>

							<h5><strong>Mithapukur, Rangpur</strong></h5>
							<h4><strong>E-mail</strong></h4>
						</td>

						<td> <img src="{{url('public/upload/employee_images/'.$allData['0']['user']['image'])}}" style="width: 100px; height: 100px"></td>
					</tr>
				</table>
		</div>

		<div class="col-md-12">
			<h5 class="text-center" style="font-weight: bold; padding-top:-25px"> Employee Attendence Report </h5>
		</div>

		<div class="col-md-12">

			<strong>Employee Name :</strong> {{$allData['0']['user']['name']}}, <strong>ID No :</strong> {{$allData['0']['user']['id_no']}}, <strong>Month :</strong> {{$month}}

			

			<table  width="100%" class="table-bordered">

				<thead>
					<tr>
						<th>Date</th>
						<th>Attendence Status</th>
					</tr>
				</thead>
				
				<tbody>
					@foreach($allData as $value)
					<tr>
						<td style="width: 50%">{{date('d-m-Y',strtotime($value->date))}}</td>
						<td style="width: 50%">{{$value->attend_status}}</td>
						
					</tr>
					@endforeach

					<tr>
						<td colspan="2">
							<strong>Total Absent :</strong> {{$absents}}, <strong>Total Leave :</strong> {{$leaves}}
						</td>
						

					</tr>


				</tbody>
			</table>
			<i style="font-size: 10px; float:right;" >Print Date: {{date('d M Y')}} </i>
		</div>

<div class="col-md-12">
	<table border="0" width="100%">
		<tbody>
			<tr>
				<td style="30%"></td>
				<td style="30%"></td>
				<td style="40%; text-align: right; ">
					<hr style="border: dashed 1px; width: 25%; color: #000; margin-bottom: 0px; text-align: right;">
					<p style="text-align: right; ">Principal/Headmaster</p>
				</td>
			</tr>
		</tbody>
	</table>

	</div>
</div>
</body>
</html>

