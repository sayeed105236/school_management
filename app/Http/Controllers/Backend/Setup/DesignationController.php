<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Year;
use DB;
use App\Model\Designation;

class DesignationController extends Controller
{
     public function view(){
     	


    	$allData = Designation::all();
    	return view('backend.setup.designation.view-designation',compact('allData'));
    }

    public function add(){
	return view('backend.setup.designation.add-designation');

    }

    public function store(Request $request){
    	$this->validate($request,['name'=>'required|unique:designations,name'

 	]);


	$data = new Designation();
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.designation.view')->with('success','Designation add Successfully');
	 }



	 public function edit($id){
	 	$editData = Designation::find($id);
	 	return view('backend.setup.designation.add-designation',compact('editData'));


	 }

	 public function update(Request $request,$id){


	 	$data = Designation::find($id);
	 	$this->validate($request,['name'=>'required|unique:designations,name,'.$data->id]);
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.designation.view')->with('success','Designation Updated Successfully');

	 }

	 public function delete($id){

$data = Year::find($id);
$data->delete();
return redirect()->route('setups.year.view')->with('success','Year Deleted Successfully');
	 }
}
