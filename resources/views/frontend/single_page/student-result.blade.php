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
            <div class="row" style="margin-bottom: 15px;">
              <div class="col-md-12 text-center">
                <h3>Student Result :</h3>
              </div>
              <div class="col-md-3">
              </div>
              <div class="col-md-6">
                @if(Session::get('error'))
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>{{Session::get('error')}}</strong>
                </div>
                @endif
                <form method="POST" action="{{route('frontend.students.result.search')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Class</label>
                            <select name="class" class="form-control" required="">
                                <option value="">Select Class</option>
                                <option value="Six">Six</option>
                                <option value="Seven">Seven</option>
                                <option value="Eight">Eight</option>
                                <option value="Nine">Nine</option>
                                <option value="Ten">Ten</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Admission Code</label>
                            <input type="text" name="code" class="form-control" required="">
                        </div>
                        <div class="col-md-6" style="padding-top: 10px;">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection