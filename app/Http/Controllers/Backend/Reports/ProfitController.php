<?php

namespace App\Http\Controllers\Backend\Reports;

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
use App\Model\StudentMarks;
use App\Model\ExamType;
use App\Model\MarksGrade;
use App\Model\AccountsStudentFee;
use App\Model\AccountsOtherCost;
use App\Model\AccountsEmployeeSalary;
use App\Model\EmployeeAttendance;
use App\Model\StudentAdmission;


class ProfitController extends Controller
{
    public function view(){
    	return view('backend.report.profit-view');


    }

    public function profit(Request $request){
    	$start_date = date('Y-m',strtotime($request->start_date));
    	$end_date = date('Y-m',strtotime($request->end_date));
    	$sdate = date('Y-m-d',strtotime($request->start_date));
    	$edate = date('Y-m-d',strtotime($request->end_date));
    	$student_fee = AccountsStudentFee::whereBetween('date',[$start_date, $end_date])->sum('amount');
    	$other_cost = AccountsOtherCost::whereBetween('date',[$sdate, $edate])->sum('amount');
    	$emp_salary = AccountsEmployeeSalary::whereBetween('date',[$start_date, $end_date])->sum('amount');
    	$total_cost = $other_cost+$emp_salary;
    	$profit = $student_fee-$total_cost;
    	$html['thsource'] = '<th> Students Fee </th>';
    	$html['thsource'] .= '<th> Others Cost </th>';
    	$html['thsource'] .= '<th> Employee Salary </th>';
    	$html['thsource'] .= '<th> Total Cost </th>';
    	$html['thsource'] .= '<th> Profit </th>';
    	$html['thsource'] .= '<th> Action </th>';
    	$color = 'success';
    	$html['tdsource'] = '<td> '.$student_fee.' </td>';
    	$html['tdsource'] .= '<td> '.$other_cost.' </td>';
    	$html['tdsource'] .= '<td> '.$emp_salary.' </td>';
    	$html['tdsource'] .= '<td> '.$total_cost.' </td>';
    	$html['tdsource'] .= '<td> '.$profit.' </td>';
    	$html['tdsource'] .= '<td>';
    	$html['tdsource'] .= ' <a class="btb btn-sm btn-'.$color.'"  title="PDF" target="_blank" href="'.route("reports.profit.pdf").'?start_date='.$sdate.'&end_date='.$edate.'"><i class="fa fa-file"></i></a>'; 
    	$html['tdsource'] .='</td>';
    	return response()->json(@$html);

    } 

    public function pdf(Request $request){
$data['sdate'] = date('Y-m',strtotime($request->start_date));
$data['edate'] = date('Y-m',strtotime($request->end_date));
$data['start_date'] = date('Y-m-d',strtotime($request->start_date));
$data['end_date'] = date('Y-m-d',strtotime($request->end_date));
$pdf = PDF::loadView('backend.report.pdf.monthly-profit-pdf', $data);
$pdf->SetProtection(['copy','print'], '', 'pass');
return $pdf->stream('document.pdf');

    }

    public function markSheetView(){
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        return view('backend.report.marksheet-view',$data);



    }

    public function marksheetGet(Request $request){
$year_id = $request->year_id;
$class_id = $request->class_id;
$exam_type_id = $request->exam_type_id;
$id_no = $request->id_no;
$count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
$singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();
if ($singleStudent == true) {
    $allMarks = StudentMarks::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
    $allGreades = MarksGrade::all();
    return view('backend.report.pdf.marksheet-print-pdf', compact('allMarks','allGreades','count_fail'));
    # code...
}else{

    return redirect()->back()->with('error','Soryy! These Scarch Data Does not Match!');
}



    }


    public function attendanceView(){
        $data['employees'] = User::where('usertype','employee')->get();

        return view('backend.report.attendance-view',$data);

    }


     public function attendanceGet(Request $request){
        $employee_id = $request->employee_id;
        if ($employee_id !='') {
            $where[]= ['employee_id',$employee_id];
            # code...
        }

        $date = date('Y-m',strtotime($request->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }

        $singleAttendence = EmployeeAttendance::with(['user'])->where($where)->first();
        if ($singleAttendence == true) {
            $data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();
            $data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
            $data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();
            $data['month'] = date('M Y', strtotime($request->date));
            $pdf = PDF::loadView('backend.report.pdf.attendance-pdf',$data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');



        } else {

            return redirect()->back()->with('error','Soryy! These Scarch a does not match');

        }
    }



    //All Id Card


    public function idCardView(){
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();

        return view('backend.report.id-card-view',$data);

    }


     public function idCardGet(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $check_data = AssignStudent::where('year_id',$year_id)->where('class_id')->first();


        if ($check_data = true) {
            
            $data['allData'] = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
           
            
            $pdf = PDF::loadView('backend.report.pdf.id-card-pdf',$data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');



        } else {

            return redirect()->back()->with('error','Soryy! These Scarch a does not match');
            
        }
    }

    // Created By Asadullah
    public function admissionList(){
        $data['allData'] = StudentAdmission::orderBy('id','desc')->get();
        return view('backend.report.admission-student-list',$data);
    }

    public function admissionPdf($id){
        $data['student'] = StudentAdmission::find($id);
        $pdf = PDF::loadView('backend.report.pdf.admission-student-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function admissionApprove(Request $request){
        $data = StudentAdmission::find($request->id);
        $data->status='1';
        $data->save();
        return redirect()->route('reports.student.admission.view')->with('success','Data Paid successfully');
    }

    public function admissionReject(Request $request){
        $data = StudentAdmission::find($request->id);
        $data->status='2';
        $data->save();
        return redirect()->route('reports.student.admission.view')->with('success','Data Rejected successfully');
    }

    public function admissionSelect(Request $request){
        $data = StudentAdmission::find($request->id);
        $data->status='3';
        $data->save();
        return redirect()->route('reports.student.admission.view')->with('success','Data Selected successfully');
    }

    public function allStudentGet(){
        return view('backend.report.admission-student-selected');
    }

    public function allStudentGetPdf(Request $request){
        $data['allData'] = StudentAdmission::where('class',$request->class)->where('status','3')->get();
        // dd($data['allData']);
        $pdf = PDF::loadView('backend.report.pdf.admission-student-selected-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
