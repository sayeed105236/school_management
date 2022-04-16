<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Year;
use DB;
use App\Model\ExamType;

class ExamTypeController extends Controller
{
    public function view(){


    	$allData = ExamType::all();
    	return view('backend.setup.exam_type.view-exam-type',compact('allData'));
    }

    public function add(){
	return view('backend.setup.exam_type.add-exam_type');

    }

    public function store(Request $request){
    	$this->validate($request,['name'=>'required|unique:exam_types,name'

 	]);


	$data = new ExamType();
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.exam.type.view')->with('success','Exam Type add Successfully');
	 }



	 public function edit($id){
	 	$editData = ExamType::find($id);
	 	return view('backend.setup.exam_type.edit-exam-type',compact('editData'));


	 }

	 public function update(Request $request,$id){


	 	$data = ExamType::find($id);
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.exam.type.view')->with('success','Exam Type Updated Successfully');

	 }

	 public function delete($id){

$data = ExamType::find($id);
$data->delete();
return redirect()->route('setups.year.view')->with('success','Exam Type Deleted Successfully');
	 }
}
