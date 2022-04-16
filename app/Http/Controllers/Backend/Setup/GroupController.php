<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Year;
use DB;
use App\Model\StudentGroup;

class GroupController extends Controller
{
    public function view(){


    	$allData = StudentGroup::all();
    	return view('backend.setup.group.view-group',compact('allData'));
    }

    public function add(){
	return view('backend.setup.group.add-group');

    }

    public function store(Request $request){
    	$this->validate($request,['name'=>'required|unique:years,name'

 	]);


	$data = new StudentGroup();
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.group.view')->with('success','Group add Successfully');
	 }



	 public function edit($id){
	 	$editData = StudentGroup::find($id);
	 	return view('backend.setup.group.edit-group',compact('editData'));


	 }

	 public function update(Request $request,$id){


	 	$data = StudentGroup::find($id);
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.group.view')->with('success','Group Updated Successfully');

	 }

	 public function delete($id){

$data = StudentGroup::find($id);
$data->delete();
return redirect()->route('setups.group.view')->with('success','Year Deleted Successfully');
	 }
}
