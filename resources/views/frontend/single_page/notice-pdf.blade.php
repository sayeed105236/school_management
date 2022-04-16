@extends('frontend.layouts.master')
@section('content')
<style type="text/css">
  #Iframe-Master-CC-and-Rs {
    max-width: 100%;
    max-height: 1200px; 
    overflow: hidden;
  }

  /* inner wrapper: make responsive */
  .responsive-wrapper {
    position: relative;
    height: 0;    /* gets height from padding-bottom */ 
  }

  .responsive-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    margin: 0;
    padding: 0;
    border: none;
  }

  /* padding-bottom = h/w as % -- sets aspect ratio */
  /* YouTube video aspect ratio */
  .responsive-wrapper-wxh-572x612 {
    padding-bottom: 107%;
  }

  /* general styles */
  /* ============== */
  .set-border {
    border: 5px inset #4f4f4f;
  }
  .set-box-shadow { 
    -webkit-box-shadow: 4px 4px 14px #4f4f4f;
    -moz-box-shadow: 4px 4px 14px #4f4f4f;
    box-shadow: 4px 4px 14px #4f4f4f;
  }
  .set-padding {
    padding: 40px;
  }
  .set-margin {
    margin: 30px;
  }
  .center-block-horiz {
    margin-left: auto !important;
    margin-right: auto !important;
  }
</style>
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
                <h3>{{$notice->title}}</h3>
                <p>{{$notice->description}}</p>
              </div>
              <div class="col-md-12">
                <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
                  <div class="responsive-wrapper 
                  responsive-wrapper-wxh-572x612"
                  style="-webkit-overflow-scrolling: touch; overflow: auto;">
                  <iframe id="showImage" src="{{@$notice->image ? url('public/upload/notice_files/'.$notice->image) : url('public/backend/default.png')}}"> 
                  </iframe>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection