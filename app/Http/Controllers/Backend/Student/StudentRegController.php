<?php

namespace App\Http\Controllers\Backend\Student;

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

class StudentRegController extends Controller
{
     public function view(){

    	
    	$data['years'] = Year::orderBy('id','DESC')->get();
    	$data['classes'] = StudentClass::all();
    	$data['year_id'] = Year::orderBy('id','DESC')->first()->id;
    	$data['class_id'] = StudentClass::orderBy('id','asc')->first()->id;
    	$data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();

    	return view('backend.student.student_reg.view-student',$data);
    }

public function yearClassWise(Request $request){
$data['years'] = Year::orderBy('id','DESC')->get();
    	$data['classes'] = StudentClass::all();
    	$data['year_id'] = $request->year_id;
    	$data['class_id'] = $request->class_id;
    	$data['allData'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();

    	return view('backend.student.student_reg.view-student',$data);

}


    public function add(){

    	$data['subjects'] = Subject::all();
    	$data['classes'] = StudentClass::all();
    	
    	$data['years'] = Year::orderBy('id','DESC')->get();
    	$data['classes'] = StudentClass::all();
    	$data['groups'] = StudentGroup::all();
    	$data['shifts'] = StudentShift::all();

	return view('backend.student.student_reg.add-student',$data);

    }

    public function store(Request $request){
    	DB::transaction(function() use($request){

    	$checkYear = Year::find($request->year_id)->name;
    	$student = User::where('usertype','student')->orderBy('id','DESC')->first();
    	if($student == null){
    		$firstReg = 0;
    		$studentId = $firstReg+1;
    		if($studentId<10){
    			$id_no = '000'.$studentId;
    		}elseif ($studentId <100) {

    			$id_no = '00' .$studentId;
    		}elseif ($studentId <1000) {
    			$id_no = '0' .$studentId;
    		}
    	}else{
    		$student = User::where('usertype','student')->orderBy('id','DESC')->first()->id;
    		$studentId = $student+1;
    		if($studentId <10){
    			$id_no = '000'.$studentId;
    		}elseif ($studentId <100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId <1000) {
    			$id_no = '0'.$studentId;
    		}
    	}

    	$final_id_no = $checkYear.$id_no;
    	$user = new User();
    	$code = rand(0000,9999);
    	$user->id_no = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->code = $code;
    	$user->usertype = 'student';
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')){
			$file = $request->file('image');
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/student_images'), $filename);
			$user['image']= $filename;
			}


    	$user->save();

    	$Assign_Student = new AssignStudent();
    	$Assign_Student->student_id = $user->id;

    	$Assign_Student->year_id = $request->year_id;
    	$Assign_Student->class_id = $request->class_id;
    	$Assign_Student->group_id = $request->group_id;
    	$Assign_Student->shift_id = $request->shift_id;
    	$Assign_Student->save();

    	$discount_student = new DiscountStudent();
    	$discount_student->Assign_Student_id = $Assign_Student->id;
    	$discount_student->fee_category_id = '1';
    	$discount_student->discount = $request->discount;
    	$discount_student->save();
    	});
    	

	return redirect()->route('students.registration.view')->with('success','Student add Successfully');
	 }



	 public function edit($student_id){
	 	$data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
    	$data['subjects'] = Subject::all();
    	$data['classes'] = StudentClass::all();
    	$data['years'] = Year::orderBy('id','DESC')->get();
    	$data['classes'] = StudentClass::all();
    	$data['groups'] = StudentGroup::all();
    	$data['shifts'] = StudentShift::all();

	return view('backend.student.student_reg.add-student',$data);


	 }

	 public function update(Request $request,$student_id){
	 	DB::transaction(function() use($request,$student_id){
    	$user = User::where('id',$student_id)->first();
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')){
    		$file = $request->file('image');
    		@unlink(public_path('upload/student_images/'.$user->image));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/student_images'), $filename);
			$user['image']= $filename;
			}

    	$user->save();


    	
    	

    	$Assign_Student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
    	$Assign_Student->year_id = $request->year_id;
    	$Assign_Student->class_id = $request->class_id;
    	$Assign_Student->group_id = $request->group_id;
    	$Assign_Student->shift_id = $request->shift_id;
    	$Assign_Student->save();

    	$discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();
    	
    	$discount_student->discount = $request->discount;
    	$discount_student->save();
    	});
    	

	return redirect()->route('students.registration.view')->with('success','Data Updated Successfully');
	 }



        public function promotion($student_id){
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

    return view('backend.student.student_reg.promotion-student',$data);


     }

        public function promotionStore(Request $request,$student_id){
        DB::transaction(function() use($request,$student_id){
        $user = User::where('id',$student_id)->first();
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->dob = date('Y-m-d',strtotime($request->dob));

        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/student_images/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'), $filename);
            $user['image']= $filename;
            }

        $user->save();


        
        

        $Assign_Student = new AssignStudent();
        $Assign_Student->student_id = $student_id;
        $Assign_Student->year_id = $request->year_id;
        $Assign_Student->class_id = $request->class_id;
        $Assign_Student->group_id = $request->group_id;
        $Assign_Student->shift_id = $request->shift_id;
        $Assign_Student->save();

        $discount_student = new DiscountStudent();
        $discount_student->assign_student_id = $Assign_Student->id;
        $discount_student->fee_category_id ='1';
        $discount_student->discount = $request->discount;
        $discount_student->save();
        });
        

    return redirect()->route('students.registration.view')->with('success','Data Promotion Successfully');
     }

     public function details($student_id){

        $data ['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();


            $pdf = PDF::loadView('backend.student.student_reg.student-details-pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');

        }



	 }

	 

