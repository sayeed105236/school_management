<!-- header -->
<header class="site-header header-style-4">
    <!-- top bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="dez-topbar-left">
                    <ul style="list-style: none; line-height: 45px; height: 45px; line-height: 45px; padding: 0 15px; min-width: 45px;">
                        <li class="maxmilu"><a style="color: #fff;"><i class="fa fa-phone"></i> <span> {{@$contact->mobile}} | <i class="fa fa-envelope"></i> {{@$contact->email}}</span></a></li>
                    </ul>
                </div>
                <div class="dez-topbar-right">
                    <ul class="social-line text-center pull-right">
                        <li><a href="{{@$contact->facebook}}" class="fa fa-facebook" target="_blank"></a></li>
                        <li><a href="{{@$contact->twitter}}" class="fa fa-twitter" target="_blank"></a></li>
                        <li><a href="{{@$contact->youtube}}" class="fa fa-youtube" target="_blank"></a></li>
                        <li><a href="{{@$contact->google_plus}}" class="fa fa-google-plus" target="_blank"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- top bar END-->

    <div class="bg-white">
        <div class="container header-contant-block">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div class="logo-header text-center"><a href="{{url('')}}"><img src="{{asset('public/upload/contact_images/'.$contact->image)}}" alt=""></a></div>
                    </div>
                    <div class="col-md-5">

                    <div class=" text-center" style="padding-top: 22px;">
                        <h2 class="milumax text-uppercase">{{@$contact->name}}</h2>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="  search-query form-control" placeholder="Search" />
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button">
                                    <span class=" glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
               </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <marquee direction="left" onMouseOver="this.stop()" onMouseOut="this.start()">
                        @foreach($notices as $notice)
                        <a href="{{route('frontend.notice.pdf',$notice->slug)}}">{{$notice->title}},</a>
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <!-- main header -->
    <div class="sticky-header main-bar-wraper">
        <div class="main-bar clearfix ">
            <div class="slide-up">
                <div class="container clearfix bg-primary desk_top_menu">
                    <!-- website logo -->
                    <div class="logo-header mostion"><a href="{{url('')}}"><img src="{{asset('public/upload/contact_images/'.$contact->image)}}"></a>
                    </div>
                    <!-- nav toggle button -->
                    <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse">
                        <ul class=" nav navbar-nav">
                            <li class="milu2"> <a href="{{url('')}}">Home </a>
                            <li class="milu2"> <a href="#">About Us
                                </a>
                                <ul class="sub-menu milu22">
                                    <li><a href="{{route('frontend.about.details',$about->slug)}}">About Us</a></li>
                                    <li><a href="{{route('frontend.mission.vision')}}">Mission & Vision</a></li>
                                </ul>
                            </li>
                            <li class="milu2"> <a href="#"> Admissions</a>
                                <ul class="sub-menu milu22">
                                    <li><a href="{{route('frontend.students.registration')}}">Student Registration</a></li>
                                    <li><a href="{{route('frontend.student.result')}}">Student Result</a></li>
                                </ul>
                            </li>
                            <li class="milu2"> <a href="#"> Our Slogans</a>
                                <ul class="sub-menu milu22">
                                    @foreach($slogans as $slogan)
                                    <li><a href="{{route('frontend.slogan.details',$slogan->slug)}}">{{$slogan->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li  class="milu2"> <a href="{{route('frontend.notice.board')}}">Notice Board</a></li>
                            <li  class="milu2"> <a href="{{route('frontend.contact.us')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>
<!-- header END -->