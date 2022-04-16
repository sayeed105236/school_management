<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Razbari High School</title>
    <!-- Favicons Icon -->
    <link rel="icon" href="{{asset('public/frontend')}}/images/school_logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend')}}/images/wmo-logo-fevicon.png" />
    <!-- End style -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/milumax.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/style.min.css">
    <!-- Revolution Slider Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/plugins/revolution/revolution/css/settings.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/plugins/revolution/revolution/css/navigation.min.css">
    <!-- Slick Slider Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/plugins/slick/slick.css"/>
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- old js -->
    <script src="{{asset('public/frontend')}}/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('public/frontend')}}/js/bootstrap.min.js"></script>
    <style type="text/css">
        #custom-search-input {
            margin:0;
            margin-top: 30px;
            padding: 0;
        }
        #custom-search-input .search-query {
            padding-right: 3px;
            padding-right: 4px \9;
            padding-left: 3px;
            padding-left: 4px \9;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */
            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        #custom-search-input button {
            border: 0;
            background: none;
            /** belows styles are working good */
            padding: 2px 5px;
            margin-top: 2px;
            position: relative;
            left: -28px;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */
            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            color:#D9230F;
        }
        .search-query:focus + button {
            z-index: 3;   
        }
        .bg-primary {
            color: #fff;
            background-color: #0CB3EA;
        }
        .about {
            height: 75px;
            background: url(public/frontend/images/icon-our.png) no-repeat center center;
        }
        .about-us {
            background: rgba(0, 0, 0, 0.04) url(../public/frontend/images/banner.jpg) top left repeat;
            background-size: cover;
            height: 160px;
            background-position: center center;
            background-repeat: no-repeat;
            position: relative;
        }
        .home_link{
            color: #000;
        }
        .abc li a{

        }
        .desk_top_menu {
            padding-right: 15px;
            padding-left: 21%;
            margin-right: auto;
            margin-left: auto;
        }
        .logo_img{
            border: 1px solid #ddd;
            padding: 6px;
        }
        .abc_link li{
            display: block;
        }
        .principal_msg{
            width: 130px;
            margin: 2px 13px 2px 0px;
            padding: 3px;
            border: 1px solid #ddd;
            float: left;
        }
        @media only screen and (min-width:320px) and (max-width:768px) {
            .desk_top_menu {
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }
        }  
    </style>
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/engine1/style.css" />
</head>
<body id="bg" class="boxed">
    <div class="page-wraper">
        @include('frontend.layouts.header')
        <!-- Content -->
        <div class="page-content ">
        @yield('content')
        </div>
        @include('frontend.layouts.footer')
        <!-- scroll top button -->
        <button class="scroltop fa fa-caret-up" ></button>
    </div>
    <!-- <div id="loading-area"></div> -->

    <script type="text/javascript" src="{{asset('public/frontend')}}/plugins/slick/slick.js"></script>
    <script type="text/javascript" src="{{asset('public/frontend')}}/engine1/wowslider.js"></script>
    <script type="text/javascript" src="{{asset('public/frontend')}}/engine1/script.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            'use strict';
            dz_rev_slider_1();
        }); /*ready*/
    </script>
    <!-- jquery-validation -->
    <script src="{{asset('public/backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{asset('public/backend')}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
        });
      });
    </script>
    <script type="text/javascript">
        $(function() {
            $('.singledatepicker').daterangepicker({
              singleDatePicker: true,
              showDropdowns: true,
              autoUpdateInput: false,
                // drops: "up",
                autoApply:true,
                locale: {
                  format: 'DD-MM-YYYY',
                  daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                  firstDay: 0
                },
                minDate: '01/01/1930',
              },
              function(start) {
                this.element.val(start.format('DD-MM-YYYY'));
                this.element.parent().parent().removeClass('has-error');
              },
              function(chosen_date) {
                this.element.val(chosen_date.format('DD-MM-YYYY'));
              });
            
            $('.singledatepicker').on('apply.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('DD-MM-YYYY'));
              $(this).trigger('change');
            });
        });
    </script>
</body>
</html>