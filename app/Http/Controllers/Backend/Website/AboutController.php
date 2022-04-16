<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\About;

class AboutController extends Controller
{
    public function view(){
    	$data['countAbout'] = About::count();
    	$data['allData'] = About::all();
    	return view('backend.website.about.view-about',$data);
    }

    public function add(){
    	return view('backend.website.about.add-about');
    }

    public function store(Request $request){
        $data = new About();
    	$data->slug = 'about-us-details';
        $data->short_description = $request->short_description;
        $data->description = $request->description;
    	$data->created_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('web-site.about.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = About::find($id);
        return view('backend.website.about.add-about',$data);
    }

    public function update(Request $request,$id){
        $data = About::find($id);
    	$data->slug = 'about-us-details';
        $data->short_description = $request->short_description;
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('web-site.about.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $about = About::find($request->id);
        $about->delete();
        return redirect()->route('web-site.about.view')->with('success','Data Deleted successfully');
    }
}
