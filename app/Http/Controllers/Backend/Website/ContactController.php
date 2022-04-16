<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Contact;

class ContactController extends Controller
{
    public function view(){
        $data['countContact'] = Contact::count();
    	$data['allData'] = Contact::all();
    	return view('backend.website.contact.view-contact',$data);
    }

    public function add(){
    	return view('backend.website.contact.add-contact');
    }

    public function store(Request $request){
        $data = new Contact();
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
        $data->google_plus = $request->google_plus;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
		    $file = $request->file('image');
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/contact_images'), $filename);
		    $data['image']= $filename;
		}
        $data->save();
        return redirect()->route('web-site.contact.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Contact::find($id);
        return view('backend.website.contact.add-contact',$data);
    }

    public function update(Request $request,$id){
        $data = Contact::find($id);
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
        $data->google_plus = $request->google_plus;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
		    $file = $request->file('image');
		    @unlink(public_path('upload/contact_images/'.$data->image));
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/contact_images'), $filename);
		    $data['image']= $filename;
		}
        $data->save();
        return redirect()->route('web-site.contact.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Contact::find($request->id);
        if (file_exists('public/upload/contact_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/contact_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('web-site.contact.view')->with('success','Data Deleted successfully');
    }
}
