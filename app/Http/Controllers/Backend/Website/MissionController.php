<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\MissionVision;

class MissionController extends Controller
{
    public function view(){
    	$data['countMission'] = MissionVision::count();
    	$data['allData'] = MissionVision::all();
    	return view('backend.website.mission.view-message',$data);
    }

    public function add(){
    	return view('backend.website.mission.add-message');
    }

    public function store(Request $request){
        $data = new MissionVision();
    	$data->slug = 'mission-vision';
        $data->description = $request->description;
    	$data->created_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('web-site.mission-vision.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = MissionVision::find($id);
        return view('backend.website.mission.add-message',$data);
    }

    public function update(Request $request,$id){
        $data = MissionVision::find($id);
    	$data->slug = 'mission-vision';
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('web-site.mission-vision.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = MissionVision::find($request->id);
        $data->delete();
        return redirect()->route('web-site.mission-vision.view')->with('success','Data Deleted successfully');
    }
}
