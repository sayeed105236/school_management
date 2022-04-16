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
            <form method="POST" action="{{route('frontend.students.registration.store')}}" role="form" enctype="multipart/form-data" id="MyForm">
                @csrf
                <div class="form-row">                   
                  <div class="form-group col-md-4">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Student Name" required="">        
                  </div>
                  <div class="form-group col-md-4">
                    <label for="fname">Father's Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="Enter Father's Name" required="">                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mname">Mother's Name</label>
                    <input type="text" name="mname" class="form-control" placeholder="Enter Mother's Name" required="">                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required="">                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address">                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" required="">                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control select2bs4" required="">
                      <option value="">Select Gender</option>
                      <option value="Fale">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                    </select>           
                  </div>
                  <div class="form-group col-md-4">
                    <label for="religion">Religion</label>
                    <select name="religion" class="form-control select2bs4" required="">
                      <option value="">Select Religion</option>
                      <option value="islam">Islam</option>
                      <option value="hindu">Hindu</option>
                      <option value="christian">Christian</option>
                      <option value="atheist">Atheist</option>
                      <option value="buddhist">Buddhist</option>
                    </select>            
                  </div>
                  <div class="form-group col-md-4">
                    <label for="dob">Date of Birth</label>
                    <input type="text" name="dob" class="form-control singledatepicker" placeholder="DD-MM-YYYY" readonly="">                 
                  </div>
                  <div class="form-group col-md-2">
                    <label for="class">Class</label>
                    <select name="class" class="form-control select2bs4" required="">
                        <option value="">Select Class</option>
                        <option value="Six">Six</option>
                        <option value="Seven">Seven</option>
                        <option value="Eight">Eight</option>
                        <option value="Nine">Nine</option>
                        <option value="Ten">Ten</option>
                    </select>     
                  </div>
                  <div class="form-group col-md-2">
                    <label for="group">Group</label>
                    <select name="group" class="form-control select2bs4" required="">
                        <option value="">Select Group</option>
                        <option value="Science">Science</option>
                        <option value="General">General</option>
                        <option value="Commerce">Commerce</option>
                    </select>             
                  </div>
                  <div class="form-group col-md-4">
                    <label for="payment_method">Payment Method <span style="color: red;font-weight: bold;">Bkash/Rocket No:01928511049</span></label>
                    <select id="payment_method" name="payment_method" class="form-control select2bs4" required="">
                        <option value="">Select Method</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Rocket">Rocket</option>
                    </select>             
                  </div>
                  <div class="form-group col-md-2">
                    <label for="transaction_no">Transaction No</label>
                    <input type="text" name="transaction_no" class="form-control" required="">
                    <font style="color: red">{{($errors->has('transaction_no'))?($errors->first('transaction_no')):''}}</font>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="bkash">From No <span style="color: red;font-weight: bold;">Bkash/Rocket</span></label>
                    <input type="text" name="bkash" class="form-control" required="">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">              
                  </div>
                  <div class="form-group col-md-2">
                    <img id="showImage" style="width: 80px; height: 80px; border: 1px solid #000;">            
                  </div>
                  <div class="form-group col-md-4" style="padding-top: 30px;">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#MyForm').validate({
        errorClass:'text-danger',
        validClass:'text-success',
      rules:{
        name:{
          required:true
        },
        fname:{
          required:true
        },
        mname:{
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
        gender:{
          required:true
        },
        religion:{
          required:true
        },
        dob:{
          required:true
        },
        class:{
          required:true
        },
        payment_method:{
          required:true
        },
        transaction_no:{
          required:true
        },
        bkash:{
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