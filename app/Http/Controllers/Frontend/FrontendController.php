<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use DB;
use App\User;
use App\Model\StudentAdmission;
use App\Model\Notice;
use App\Model\Contact;
use App\Model\ImportantLink;
use App\Model\Slider;
use App\Model\PrincipalMessage;
use App\Model\MissionVision;
use App\Model\Slogan;
use App\Model\Contactor;
use App\Model\About;

class FrontendController extends Controller
{
    public function index(){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['sliders'] = Slider::all();
        $data['principal'] = PrincipalMessage::first();
        $data['about'] = About::first();
    	return view('frontend.layouts.home',$data);
    }

    public function sloganDetails($slug){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['slogan'] = Slogan::where('slug',$slug)->first();
        $data['about'] = About::first();
        return view('frontend.single_page.slogan-details',$data);
    }

    public function missionVision(){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['about'] = About::first();
        $data['mission'] = MissionVision::first();
        return view('frontend.single_page.mission-vision',$data);
    }

    public function contactUs(){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['about'] = About::first();
        $data['mission'] = MissionVision::first();
        return view('frontend.single_page.contact-us',$data);
    }

    public function contactStore(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
            'subject' => 'required',
            'msg' => 'required'
        ]);
        $data = new Contactor();
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->subject = $request->subject;
        $data->msg = $request->msg;
        $data->save();
        return redirect()->route('frontend.contact.get')->with('code','We received your message, We will contact you as soon as possible');
    }

    public function messageDetail($slug){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['principal'] = PrincipalMessage::where('slug',$slug)->first();
        $data['about'] = About::first();
        return view('frontend.single_page.principal-msg-details',$data);
    }

    public function contactGet(){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['about'] = About::first();
        return view('frontend.single_page.contact-get',$data);
    }

    public function noticeBoard(){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['about'] = About::first();
        return view('frontend.single_page.notice-board',$data);
    }

    public function aboutDetail($slug){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['about'] = About::where('slug',$slug)->first();
        return view('frontend.single_page.about-us',$data);
    }

    public function studentReg(){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['about'] = About::first();
    	return view('frontend.single_page.student-registration',$data);
    }

    public function studentResult(){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['about'] = About::first();
        return view('frontend.single_page.student-result',$data);
    }

    public function studentRegStore(Request $request){
    	$this->validate($request,[
    		'transaction_no' => 'required|unique:student_admissions,transaction_no'
    	]);
    	$student = new StudentAdmission();
    	$code = rand(0000,9999);
    	$student->code = date('YmdHi').$code;
    	$student->name = $request->name;
    	$student->fname = $request->fname;
    	$student->mname = $request->mname;
    	$student->mobile = $request->mobile;
    	$student->email = $request->email;
    	$student->address = $request->address;
    	$student->gender = $request->gender;
    	$student->religion = $request->religion;
    	$student->dob = date('Y-m-d',strtotime($request->dob));
    	$student->class = $request->class;
    	$student->group = $request->group;
    	$student->payment_method = $request->payment_method;
    	$student->transaction_no = $request->transaction_no;
        $student->bkash = $request->bkash;
    	$student->status = '0';
    	if ($request->file('image')){
			$file = $request->file('image');
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/admission_images'), $filename);
			$student['image']= $filename;
		}
    	$student->save();
    	$admision_code = $student->code;

    	return redirect()->route('frontend.students.result.get')->with('code',$admision_code);
    }

    public function studentResultGet(Request $request){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['about'] = About::first();
    	return view('frontend.single_page.student-get',$data);
    }

    public function studentResultPdf($code){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['about'] = About::first();
    	$data['student'] = StudentAdmission::where('code',$code)->first();
        $pdf = PDF::loadView('frontend.single_page.student-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function studentResultSearch(Request $request){
    	$this->validate($request,[
    		'class' => 'required',
    		'code' => 'required'
    	]);
    	$data['student'] = StudentAdmission::where('class',$request->class)->where('code',$request->code)->first();
    	if($data['student'] == true){
    		$data['student'] = StudentAdmission::where('class',$request->class)->where('code',$request->code)->first();
	        $pdf = PDF::loadView('frontend.single_page.student-pdf', $data);
	        $pdf->SetProtection(['copy', 'print'], '', 'pass');
	        return $pdf->stream('document.pdf');
    	}else{
    		return redirect()->back()->with('error','Sorry! Class or Admission code does not match');
    	}
    }

    public function noticePdf($slug){
        $data['contact'] = Contact::first();
        $data['slogans'] = Slogan::all();
        $data['mission'] = MissionVision::first();
        $data['notices'] = Notice::orderBy('id','desc')->get();
        $data['important_links'] = ImportantLink::all();
        $data['about'] = About::first();
        $data['notice'] = Notice::where('slug',$slug)->first();
        return view('frontend.single_page.notice-pdf',$data);
    }
}
