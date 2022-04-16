<!DOCTYPE html>
<html>
<head>
	<title>Student Payslip</title>
	
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

						<td> <img src="{{url('public/upload/student_images/'.$details['student']['image'])}}" style="width: 100px; height: 100px"></td>
					</tr>
				</table>
		</div>

		<div class="col-md-12">
			<h5 class="text-center" style="font-weight: bold; padding-top:-25px"> Student Exam Fee</h5>
		</div>

		<div class="col-md-12">

			@php
				$registrationfee=
				App\Model\FeeCategoryAmount::where('fee_category_id','3')->where('class_id',$details->class_id)->first();
				$originalfee = $registrationfee->amount;
				$discount = $details['discount']['discount'];
				$discountablefee = $discount/100*$originalfee;
				$finalfee = (int)$originalfee-(int)$discountablefee;
			@endphp

			

			<table  width="100%" class="table-bordered">
				<tbody>


					<tr>
						<td style="width: 50px"> ID No. </td>
						<td>{{$details['student']['id_no']}} </td>
					</tr>

					<tr>
						<td style="width: 50px"> Roll No. </td>
						<td>{{$details->roll}} </td>
					</tr>


					<tr>
						<td style="width: 40%"> Student Name </td>
						<td>{{$details['student']['name']}} </td>
					</tr>

					<tr>
						<td style="width: 50px"> Father's Name</td>
						<td>{{$details['student']['fname']}}</td>
					</tr>

					
					<tr>
						<td style="width: 50px"> Session </td>
						<td>{{$details['year']['name']}} </td>
					</tr>

					<tr>
						<td style="width: 50px"> Class </td>
						<td>{{$details['student_class']['name']}} </td>
					</tr>

					<tr>
						<td style="width: 50px"> Mobile No. </td>
						<td>{{$details['student']['mobile']}} </td>
					</tr>

					
					
					
					<tr>
						<td style="width: 50px"> Monthly Fee </td>
						<td>{{$originalfee}} TK </td>
					</tr>

					<tr>
						<td style="width: 50px"> Discount </td>
						<td>{{$discount}}% </td>
					</tr>

					<tr>
						<td style="width: 50px"> Fee (This Student) of {{$exam_name}} </td>
						<td>{{$finalfee}} TK </td>
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
	<hr style="border: dashed 1px; width: 96%; color: #ddd; margin-bottom: 0px;"><br><br>

	<table width="80%" border="">
					<tr>
						<td width="33%" class="text-center">
							<img src="{{url('public/upload/logo.png')}}" style="width: 100px; height: 100px"></td>

						<td class="text-center" width="63%">
							<h4><strong>Razbari HIGH SCHOOL</strong></h4>

							<h5><strong>Mithapukur, Rangpur</strong></h5>
							<h4><strong>E-mail</strong></h4>
						</td>

						<td> <img src="{{url('public/upload/student_images/'.$details['student']['image'])}}" style="width: 100px; height: 100px"></td>
					</tr>
				</table>
		</div>

		<div class="col-md-12">
			<h5 class="text-center" style="font-weight: bold; padding-top:-25px"> Student Monthly Fee</h5>
		</div>

		<div class="col-md-12">

			@php
				$registrationfee=
				App\Model\FeeCategoryAmount::where('fee_category_id','3')->where('class_id',$details->class_id)->first();
				$originalfee = $registrationfee->amount;
				$discount = $details['discount']['discount'];
				$discountablefee = $discount/100*$originalfee;
				$finalfee = (int)$originalfee-(int)$discountablefee;
			@endphp

			

			<table  width="100%" class="table-bordered">
				<tbody>


					<tr>
						<td style="width: 50px"> ID No. </td>
						<td>{{$details['student']['id_no']}} </td>
					</tr>

					<tr>
						<td style="width: 50px"> Roll No. </td>
						<td>{{$details->roll}} </td>
					</tr>


					<tr>
						<td style="width: 40%"> Student Name </td>
						<td>{{$details['student']['name']}} </td>
					</tr>

					<tr>
						<td style="width: 50px"> Father's Name</td>
						<td>{{$details['student']['fname']}}</td>
					</tr>

					
					<tr>
						<td style="width: 50px"> Session </td>
						<td>{{$details['year']['name']}} </td>
					</tr>

					<tr>
						<td style="width: 50px"> Class </td>
						<td>{{$details['student_class']['name']}} </td>
					</tr>

					<tr>
						<td style="width: 50px"> Mobile No. </td>
						<td>{{$details['student']['mobile']}} </td>
					</tr>
					
					<tr>
						<td style="width: 50px"> Monthly Fee </td>
						<td>{{$originalfee}} TK </td>
					</tr>

					<tr>
						<td style="width: 50px"> Discount </td>
						<td>{{$discount}}% </td>
					</tr>

					<tr>
						<td style="width: 50px"> Fee (This Student) of {{$exam_name}} </td>
						<td>{{$finalfee}} TK </td>
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
</body>
</html>

