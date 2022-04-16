@extends('frontend.layouts.master')
@section('content')
<div class="section-full  bg-img-fix bg-white choose-us">
    <!-- Sub banner start -->
<div class="overview-bgi">
  <img src="{{asset('public/frontend/images/banner.jpg')}}" style="width: 100%">
</div>
<!-- Sub Banner end -->
    <div class="content-area">
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h3>অভিনন্দন, আপনার রেজিস্ট্রেশন প্রক্রিয়াটি সফলভাবে কমপ্লিট হয়েছে ।</h3>
                <p>আপনার এডমিশন কোড হচ্ছে : <strong>{{Session::get('code')}}</strong>, দয়াকরে এই কোডটি সংরক্ষন করে রাখুন । </p>
                <p>আপনার পেইমেন্ট আমরা পেয়েছি কিনা তা এসএমএস এর মাধ্যমে জানানো হবে এবং আপনি নির্বাচিত হয়েছেন কিনা তা নোটিশ বোর্ড অথবা আমাদের ওয়েবসাইটের রেজাল্ট অপশনে দেয়া হবে ।</p>
              </div>
              <div class="col-md-6" style="margin-top: 41px;">
                <a class="btn btn-success btn-sm" href="{{route('frontend.students.result.get.pdf',Session::get('code'))}}" target="_blank"> <i class="fa fa-download"></i> Download PDF</a>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection