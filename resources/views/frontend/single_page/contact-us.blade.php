@extends('frontend.layouts.master')
@section('content')
<div class="section-full  bg-img-fix bg-white choose-us">
    <!-- Sub banner start -->
<div class="overview-bgi">
  <img src="{{asset('public/frontend/images/banner.jpg')}}" style="width: 100%">
</div>
<!-- Sub Banner end -->
    <div class="content-area">
      <div class="container" style="margin-bottom: 12px;">
          <div class="row">
            <div class="col-md-12">
              @if(Session::get('contactMsg'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thank you for your message, We will contact as soon as possible</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
            </div>
          </div>

          <div class="row">
              <!-- contact form -->
              <div class="col-md-8">
                <form method="POST" action="{{route('frontend.contact.store')}}" role="form" enctype="multipart/form-data" id="contactForm">
                  @csrf
                  <div class="form-row" style="margin-bottom: 20px !important;">
                    <div class="col-md-6">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Write your name" required="">
                      <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>
                    <div class="col-md-6">
                      <label>Mobile No</label>
                      <input type="text" name="mobile" class="form-control" placeholder="Write your mobile no" required="">
                    <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Write your email address" required="">
                      <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                    </div>
                    <div class="col-md-6">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" placeholder="Write your address" required="">
                      <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12">
                      <label>Subject</label>
                      <input type="text" name="subject" class="form-control" placeholder="Subject" required="">
                      <font style="color: red">{{($errors->has('subject'))?($errors->first('subject')):''}}</font>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12">
                      <label>Message</label>
                      <textarea name="msg" class="form-control" rows="4"></textarea>
                    </div>
                    <font style="color: red">{{($errors->has('msg'))?($errors->first('msg')):''}}</font>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- Section Titile -->
              <div class="col-md-4" style="margin-top: 27px;">
                <div class="row">
                  <div class="col-md-12">
                    <strong><i class="fa fa-map-marker"></i> Address :</strong>
                    {{@$contact->address}}
                  </div>
                  <div class="col-md-12">
                    <strong><i class="fa fa-envelope"></i> Email :</strong>
                    {{@$contact->email}}
                  </div>
                  <div class="col-md-12">
                    <strong><i class="fa fa-fa-phone"></i> Phone :</strong>
                    {{@$contact->mobile}}
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#contactForm').validate({
        errorClass:'text-danger',
        validClass:'text-success',
      rules:{
        name:{
          required:true
        },
        email:{
          email:true
        },
        mobile:{
          required:true
        },
        address:{
          required:true
        },
        subject:{
          required:true
        },
        msg:{
          required:true
        }
      },
      messages: {      
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>

@endsection