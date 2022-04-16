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
              <div class="col-md-12">
                <h3>Notice Board :</h3>
              </div>
              <div class="col-md-12">
                <ul>
                    @foreach($notices as $notice)
                    <li><a class="home_link" href="{{route('frontend.notice.pdf',$notice->slug)}}"> <i class="fa fa-check-square-o" aria-hidden="true"></i> {{$notice->title}}</a></li>
                    @endforeach
                </ul>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection