<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Contactor;

class ContactorController extends Controller
{
    public function view(){
    	$data['allData'] = Contactor::orderBy('id','desc')->get();
    	return view('backend.website.contactor.view-contactor',$data);
    }

    public function detail($id){
    	$data['detail'] = Contactor::find($id);
    	return view('backend.website.contactor.detail-contactor',$data);
    }

    public function delete(Request $request){
        $data = Contactor::find($request->id);
        $data->delete();
        return redirect()->route('web-site.contactor.view')->with('success','Data Deleted successfully');
    }
}
