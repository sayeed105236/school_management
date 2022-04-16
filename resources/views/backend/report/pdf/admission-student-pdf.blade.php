<!DOCTYPE html>
<html>
<head>
	<title>Student Details Info</title>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
		h2 h3{
			margin: 0;
			padding: 0;
		}
		.table{
			width: 100%;
			margin-bottom: 1rem;
			background-color: transparent;
		}
		.table th,
		.table td{
			padding: 0.75rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}
		.table thead th{
			vertical-align: bottom;
			border-bottom: 2px solid #dee2e6;
		}
		.table tbody + tbody{
			border-top: 2px solid #dee2e6;
		}
		.table .table{
			background-color: #fff;
		}
		.table-bordered {
			border: 1px solid #dee2e6;
		}
		.table-bordered th,
		.table-bordered td{
			border: 1px solid #dee2e6;
		}
		.table-bordered thead th,
		.table-bordered thead td{
			border-bottom-width: 2px;
		}
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		table tr td{
			padding: 5px;
		}
		.table-bordered thead th,
		.table-bordered td,
		.table-bordered th{
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
			<div class="col-md-12">
				<table width="80%">
					<tr>
						<td width="33%" class="text-center">
							<img src="{{asset('public/frontend')}}/images/school_logo.png" style="width: 90px; height: 90px">
						</td>
						<td class="text-center" width="63%">
							<h4><strong>Razbari High School</strong></h4>
						</td>
						<td class="text-center">
							<img src="{{(!empty(@$student->image))?url('public/assets/backend/upload/admission_images/'.@$student->image):url('public/backend/default.png')}}" style="width: 90px; height: 90px;">
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Student Details Information</h5>
			</div>
			<div class="col-md-12">
				<table border="1" width="100%">
					<tbody>
						<tr>
							<td style="width: 50%">Student Name</td>
							<td>{{ $student->name }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Father's Name</td>
							<td>{{ $student->fname }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Mother's Name</td>
							<td>{{ $student->mname }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Class</td>
							<td>{{ $student->class }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Group</td>
							<td>{{ $student->group }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Mobile No</td>
							<td>{{ $student->mobile }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Email</td>
							<td>{{ $student->email }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Gender</td>
							<td>{{ $student->gender }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Religion</td>
							<td>{{ $student->religion }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Date of Birth</td>
							<td>{{ date('d-m-Y',strtotime($student->dob)) }}</td>
						</tr>
						<tr>
							<td style="width: 50%">From No</td>
							<td>{{ $student->bkash }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Payment Method</td>
							<td>{{ $student->payment_method }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Transaction No</td>
							<td>{{ $student->transaction_no }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Payment Status</td>
							<td>
								@if($student->status=='0')
								<span>Pending</span>
								@elseif($student->status=='1')
								<span>Paid</span>
								@endif
							</td>
						</tr>	
						<tr>
							<td style="width: 50%">Admission Status</td>
							<td>
								@if($student->status=='0')
								<span>Processing on Going</span>
								@elseif($student->status=='1')
								<span>Processing on Going</span>
								@elseif($student->status=='2')
								<span>Rejected</span>
								@elseif($student->status=='3')
								<span>Selected</span>
								@endif
							</td>
						</tr>						
					</tbody>
				</table><br>
				<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y") }}</i>
			</div>
		</div>		
	</div>
</body>
</html>