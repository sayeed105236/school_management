<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Year;
use DB;
use App\Model\Subject;

class SubjectController extends Controller
{
    public function view(){


    	$allData = Subject::all();
    	return view('backend.setup.subject.view-subject',compact('allData'));
    }

    public function add(){
	return view('backend.setup.subject.add-subject');

    }

    public function store(Request $request){
    	$this->validate($request,['name'=>'required|unique:years,name'

 	]);


	$data = new Subject();
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.subject.view')->with('success','Subject add Successfully');
	 }



	 public function edit($id){
	 	$editData = Subject::find($id);
	 	return view('backend.setup.subject.edit-subject',compact('editData'));


	 }

	 public function update(Request $request,$id){


	 	$data = Subject::find($id);
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.subject.view')->with('success','Subject Updated Successfully');

	 }

	 public function delete($id){

$data = Subject::find($id);
$data->delete();
return redirect()->route('setups.subject.view')->with('success','Year Deleted Successfully');
	 }
}
