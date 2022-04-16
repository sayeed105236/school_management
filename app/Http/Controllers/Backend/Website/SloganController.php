<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Slogan;

class SloganController extends Controller
{
    public function view(){
    	$data['allData'] = Slogan::all();
    	return view('backend.website.slogan.view-slogan',$data);
    }

    public function add(){
    	return view('backend.website.slogan.add-slogan');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'title' => 'required|unique:slogans,title'
    	]);
        $data = new Slogan();
    	$data->slug = str_slug($request->title);
        $data->title = $request->title;
        $data->description = $request->description;
    	$data->created_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('web-site.slogan.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Slogan::find($id);
        return view('backend.website.slogan.add-slogan',$data);
    }

    public function update(Request $request,$id){
        $data = Slogan::find($id);
        $this->validate($request,[
    		'title' => 'required|unique:slogans,title,'.$data->id
    	]);
    	$data->slug = str_slug($request->title);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('web-site.slogan.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Slogan::find($request->id);
        $data->delete();
        return redirect()->route('web-site.slogan.view')->with('success','Data Deleted successfully');
    }
}
