<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Slider;

class SliderController extends Controller
{
    public function view(){
    	$data['allData'] = Slider::orderBy('id','desc')->get();
    	return view('backend.website.slider.view-slider',$data);
    }

    public function add(){
    	return view('backend.website.slider.add-slider');
    }

    public function store(Request $request){
        $data = new Slider();
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
		    $file = $request->file('image');
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/slider_images'), $filename);
		    $data['image']= $filename;
		}
        $data->save();
        return redirect()->route('web-site.slider.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Slider::find($id);
        return view('backend.website.slider.add-slider',$data);
    }

    public function update(Request $request,$id){
        $data = Slider::find($id);
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
		    $file = $request->file('image');
		    @unlink(public_path('upload/slider_images/'.$data->image));
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/slider_images'), $filename);
		    $data['image']= $filename;
		}
        $data->save();
        return redirect()->route('web-site.slider.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Slider::find($request->id);
        if (file_exists('public/upload/slider_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/slider_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('web-site.slider.view')->with('success','Data Deleted successfully');
    }
}
