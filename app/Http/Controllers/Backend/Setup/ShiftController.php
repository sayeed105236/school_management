<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Year;
use DB;
use App\Model\StudentGroup;
use App\Model\StudentShift;

class ShiftController extends Controller
{
     public function view(){


    	$allData = StudentShift::all();
    	return view('backend.setup.shift.view-shift',compact('allData'));
    }

    public function add(){
	return view('backend.setup.shift.add-shift');

    }

    public function store(Request $request){
    	$this->validate($request,['name'=>'required|unique:years,name'

 	]);


	$data = new StudentShift();
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.shift.view')->with('success','Shift add Successfully');
	 }



	 public function edit($id){
	 	$editData = StudentShift::find($id);
	 	return view('backend.setup.shift.edit-shift',compact('editData'));


	 }

	 public function update(Request $request,$id){


	 	$data = StudentShift::find($id);
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.shift.view')->with('success','Shift Updated Successfully');

	 }

	 public function delete($id){

$data = StudentShift::find($id);
$data->delete();
return redirect()->route('setups.shift.view')->with('success','Shift Deleted Successfully');
	 }
}
