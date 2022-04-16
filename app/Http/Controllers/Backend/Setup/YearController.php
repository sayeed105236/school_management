<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Year;
use DB;

class YearController extends Controller
{
    public function view(){


    	$allData = Year::all();
    	return view('backend.setup.year.view-year',compact('allData'));
    }

    public function add(){
	return view('backend.setup.year.add-year');

    }

    public function store(Request $request){
    	$this->validate($request,['name'=>'required|unique:years,name'

 	]);


	$data = new Year();
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.year.view')->with('success','Year add Successfully');
	 }



	 public function edit($id){
	 	$editData = Year::find($id);
	 	return view('backend.setup.year.edit-year',compact('editData'));


	 }

	 public function update(Request $request,$id){


	 	$data = Year::find($id);
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.year.view')->with('success','Year Updated Successfully');

	 }

	 public function delete($id){

$data = Year::find($id);
$data->delete();
return redirect()->route('setups.year.view')->with('success','Year Deleted Successfully');
	 }
}
