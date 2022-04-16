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
							
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Selected Student List of Class {{$allData['0']->class}}</h5>
			</div>
			<div class="col-md-12">
				<table border="1" width="100%">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Image</th>
                      <th> Name</th>
                      <th> Father's Name</th>
                      <th> Mother's Name</th>
                      <th> Mobile No</th>
                      <th> Address</th>
                      <th> Gender</th>
                      <th> Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>
                      	<img src="{{(!empty($value->image))?url('public/assets/backend/upload/admission_images/'.$value->image):url('public/backend/default.png')}}" style="width: 40px; height: 50px;">
                      </td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->fname}}</td>
                      <td>{{$value->mname}}</td>
                      <td>{{$value->mobile}}</td>
                      <td>{{$value->address}}</td>
                      <td>{{$value->gender}}</td>
                      <td>Selected</td>
                    </tr>
                    @endforeach
                  </tbody>
               </table>
				<br>
				<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y") }}</i>
			</div>
		</div>		
	</div>
</body>
</html>