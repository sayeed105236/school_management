<div class="section-full bg-white content-inner" style="margin-top: 20px;">
    <div class="container">
        <div class="section-content">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="icon-bx-wraper bx-style-2 m-b30 p-a20" style="min-height: 210px;">
                        <div class="icon-content p-r40">
                            <div class="about">
                                <h1 style="margin-bottom: 0px;font-family: 'Playfair Display', serif;font-weight: 600;text-align: center;">Principal Message</h1>
                            </div>
                            <img class="principal_msg" src="{{asset('public/upload/principal_images/'.$principal->image)}}">
                            <p>{{$principal->short_description}} <a href="{{route('frontend.principal.msg.details',$principal->slug)}}" style="color: blue;">Read More..</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- login-->
<div class="section-full bg-white content-inner" style="margin-top: 20px;">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="icon-bx-wraper bx-style-2 m-b30 p-a20" style="min-height: 210px;">
                        <div class="icon-content p-r40">
                            <div class="about">
                                <h1 style="margin-bottom: 0px;font-family: 'Playfair Display', serif;font-weight: 600;text-align: center;">About Us</h1>
                            </div>
                            <p>{{$about->short_description}} <a href="{{route('frontend.about.details',$about->slug)}}" style="color: blue;">Read More..</a></p>
                        </div>
                    </div>
                    <div class="icon-bx-wraper bx-style-2 m-b30 p-a20" style="min-height: 231px;">
                        <div class="icon-content p-r40">
                            <div class="about">
                                <h1 style="margin-bottom: 0px;font-family: 'Playfair Display', serif;font-weight: 600;text-align: center;">Notice Board</h1>
                            </div>
                            <ul>
                                @foreach($notices as $notice)
                                <li><a class="home_link" href="{{route('frontend.notice.pdf',$notice->slug)}}"> <i class="fa fa-check-square-o" aria-hidden="true"></i> {{$notice->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="icon-bx-wraper bx-style-2 m-b10 p-a20 left m-l50" style="min-height: 210px;">
                        <div class="icon-content p-l40">
                            <div class="about">
                                <h1 style="margin-bottom: 0px;font-family: 'Playfair Display', serif;font-weight: 600;text-align: center;">Student Registration</h1>
                            </div>
                            <p class="text-center"><a class="btn btn-primary btn-sm" href="{{route('frontend.students.registration')}}">Student Registration here..</a></p>
                        </div>
                    </div>
                    <div class="icon-bx-wraper bx-style-2 m-b30 p-a20 left m-l50">
                        <div class="icon-content p-l40">
                            <div class="about">
                                <h1 style="margin-bottom: 0px;font-family: 'Playfair Display', serif;font-weight: 600;text-align: center;">Admission Result</h1>
                            </div>
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
    </div>
</div>
<!-- login End -->