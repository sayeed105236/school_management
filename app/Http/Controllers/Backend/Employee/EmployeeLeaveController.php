<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\User;
use App\Model\StudentClass;
use App\Model\Year;
use DB;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\FeeCategory;
use App\Model\FeeCategoryAmount;
use App\Model\Subject;
use App\Model\AssignSubject;
use PDF;
use App\Model\EmployeSalaryLog;
use App\Model\Designation;
use App\Model\EmployeeLeave;
use App\Model\LeavePurpose;

class EmployeeLeaveController extends Controller
{
    public function view(){

    	$data['allData'] = EmployeeLeave::orderBy('id','desc')->get();

    	return view('backend.employee.employee_leave.view-leave',$data);
    }


    public function add(){

    	$data['employees'] = User::where('usertype','employee')->get();
    	$data['Leave_purpose'] = LeavePurpose::all();
	return view('backend.employee.employee_leave.add-leave',$data);

    }

    public function store(Request $request){
    	if($request->leave_purpose_id == "0"){
    		$leavepurpose = new LeavePurpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id;

    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;

    	}
    	
    	$employee_leave = new EmployeeLeave();
    	$employee_leave->employee_id = $request->employee_id;
    	$employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
    	$employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
    	$employee_leave->leave_purpose_id = $leave_purpose_id;
    	$employee_leave->save();

	return redirect()->route('employees.leave.view')->with('success','Employee Purpose add Successfully');
	 }



	 public function edit($id){
	 	$data['editData'] = EmployeeLeave::find($id);

    	$data['employees'] = User::where('usertype','employee')->get();
    	$data['Leave_purpose'] = LeavePurpose::all();
	return view('backend.employee.employee_leave.add-leave',$data);

	 }

	 public function update(Request $request,$id){

	 	if($request->leave_purpose_id == "0"){
    		$leavepurpose = new LeavePurpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id;

    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;

    	}
    	
    	$employee_leave = EmployeeLeave::find($id);
    	$employee_leave->employee_id = $request->employee_id;
    	$employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
    	$employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
    	$employee_leave->leave_purpose_id = $leave_purpose_id;
    	$employee_leave->save();

	return redirect()->route('employees.leave.view')->with('success','Employee Purpose Updated Successfully');
	 }
	 


     public function details($id){

        $data ['details'] = User::find($id);
            $pdf = PDF::loadView('backend.employee.employee_reg.employee-details-pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');

        }
}
