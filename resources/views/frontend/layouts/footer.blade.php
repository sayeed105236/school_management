<!-- Footer -->
<footer class="site-footer" >
    <div class="footer-artwork" id="footer-artwork">&nbsp;</div>
        <div class="row" style="margin: 0px 50px;">
            <!-- Contact Us -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
                <div class="footer-item">
                    <div class="main-title-2">
                        <h1>Contact Us</h1>
                    </div>
                    <ul class="personal-info" style="text-align: left;margin-left: 31%;">
                        <span>
                            <i class="fa fa-map-marker"></i>
                            Address: {{@$contact->address}},
                        </span><br/>
                        <span>
                            <i class="fa fa-envelope"></i>
                            Email: <a href="">{{@$contact->email}}</a>
                        </span><br/>
                        <span>
                            <i class="fa fa-phone"></i>
                            Phone: <a href=""> {{@$contact->mobile}}</a>
                        </span>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
                <div class="footer-item newsletter">
                    <div class="main-title-2">
                        <h1>Important Links</h1>
                    </div>
                    <ul class="personal-info" style="text-align: left;margin-left: 31%;">
                        @foreach($important_links as $link)
                        <li>
                            <a href="{{$link->url}}" target="_blank"><i class="fa fa-chevron-right"></i> {{$link->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-wrapper">
            <div class="col-md-12 col-sm-12" style="background: #0E385D;">
                <p class=" text-center m-t10 m-b0" style="color: #fff"><strong style="color: #fff">Copyright</strong> © RHS # Designed & Developed by <a href="http://popularsoftbd.com" style="color: #DD7" target="_blank"><i>Popularsoft</i></a>
                </p>
            </div>
            <!-- /footer -->
        </div>
</footer>
<!-- Footer END-->