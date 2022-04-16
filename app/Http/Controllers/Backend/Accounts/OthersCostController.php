<?php

namespace App\Http\Controllers\Backend\Accounts;

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


class OthersCostController extends Controller
{
    public function view(){
    	$data['allData'] = AccountsOtherCost::orderBy('id','desc')->get();
    	return view('backend.accounts.cost.other-cost-view',$data);

    }

    public function add(){
return view('backend.accounts.cost.other-cost-add');

    }


    public function store(Request $request){
    	$cost = new AccountsOtherCost();
    	$cost->date = date('Y-m-d',strtotime($request->date));
    	$cost->amount = $request->amount;
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/cost_images'), $filename);
    		$cost['image']= $filename;
    		# code...
    	}

    	$cost->description = $request->description;
    	$cost->save();

    	return redirect()->route('accounts.cost.view')->with('success', 'Data Saved Successfully');


    }

    public function edit($id){
    	$data['editData'] = AccountsOtherCost::find($id);
    	return view('backend.accounts.cost.other-cost-add',$data);

    }


    public function update(Request $request, $id){
    	$cost = AccountsOtherCost::find($id);
    	$cost->date = date('Y-m-d',strtotime($request->date));
    	$cost->amount = $request->amount;
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/cost_images/'.$data->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/cost_images'), $filename);
    		$cost['image']= $filename;

    		# code...
    	}

    	$cost->description =  $request->description;
    	$cost->save();
    	return redirect()->route('accounts.cost.view')->with('success', 'Data Updated Successfully');


    }
}
