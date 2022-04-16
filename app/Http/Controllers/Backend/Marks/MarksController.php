<?php

namespace App\Http\Controllers\Backend\Marks;

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

class MarksController extends Controller
{
    public function add(){

    	$data['years'] = Year::orderBy('id','DESC')->get();
    	$data['classes'] = StudentClass::all();
    	$data['exam_types'] = ExamType::all();

	return view('backend.marks.marks-add',$data);

    }

    public function store(Request $request){

    $studentcount = $request->student_id;
    if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
    			$data = new StudentMarks();
    			$data->year_id = $request->year_id;
    			$data->class_id = $request->class_id;
    			$data->assign_subject_id = $request->assign_subject_id;
    			$data->exam_type_id = $request->exam_type_id;
    			$data->student_id = $request->student_id[$i];
    			$data->id_no = $request->id_no[$i];
    			$data->marks = $request->marks[$i];
    			$data->save();
		    	}
		    }
		    	return redirect()->back()->with('success','Marks Entry successfully');
    }

    public function edit(){
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

    return view('backend.marks.marks-edit',$data);


    }

    public function getMarks(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;
        $getStudent = StudentMarks::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();
        return response()->json($getStudent);

    }

    public function update(Request $request){
        StudentMarks::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->delete();
        $studentcount = $request->student_id;
        if ($studentcount) {

            for ($i=0; $i < count($request->student_id); $i++) { 
                $data = New StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->marks = $request->marks[$i];
                $data->save();



            }
        }

            return redirect()->back()->with('success','Marks Updated successfully');

    }
}
