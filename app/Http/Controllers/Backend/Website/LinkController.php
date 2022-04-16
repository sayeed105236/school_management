<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\ImportantLink;

class LinkController extends Controller
{
    public function view(){
    	$data['allData'] = ImportantLink::all();
    	return view('backend.website.link.view-link',$data);
    }

    public function add(){
    	return view('backend.website.link.add-link');
    }

    public function store(Request $request){
        $data = new ImportantLink();
        $data->title = $request->title;
        $data->url = $request->url;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.link.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = ImportantLink::find($id);
        return view('backend.website.link.add-link',$data);
    }

    public function update(Request $request,$id){
        $data = ImportantLink::find($id);
        $data->title = $request->title;
        $data->url = $request->url;
        $data->save();
        return redirect()->route('web-site.link.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = ImportantLink::find($request->id);
        $data->delete();
        return redirect()->route('web-site.link.view')->with('success','Data Deleted successfully');
    }
}
