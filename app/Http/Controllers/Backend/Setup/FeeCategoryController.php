<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Year;
use DB;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\FeeCategory;


class FeeCategoryController extends Controller
{
    public function view(){


    	$allData = FeeCategory::all();
    	return view('backend.setup.fee_category.view-fee_category',compact('allData'));
    }

    public function add(){
	return view('backend.setup.fee_category.add-fee_category');

    }

    public function store(Request $request){
    	$this->validate($request,['name'=>'required|unique:years,name'

 	]);


	$data = new FeeCategory();
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.fee.category.view')->with('success','Fee Category add Successfully');
	 }



	 public function edit($id){
	 	$editData = FeeCategory::find($id);
	 	return view('backend.setup.fee_category.edit-fee_category',compact('editData'));


	 }

	 public function update(Request $request,$id){


	 	$data = FeeCategory::find($id);
	$data->name = $request->name;
	$data->save();
	return redirect()->route('setups.fee.category.view')->with('success','Fee Category Updated Successfully');

	 }

	 public function delete($id){

$data = FeeCategory::find($id);
$data->delete();
return redirect()->route('setups.fee.category.view')->with('success','Fee Category Deleted Successfully');
	 }
}
