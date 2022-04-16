


@extends('backend.layouts.master')

@section('content')

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Others Cost</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Others Cost</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">

              <div class="card-header">
               
               <h3> 
                @if(isset($editData))
              Edit Others Cost
              @else
              Add Others Cost
              @endif

                <a class="btn btn-success float-right btn-sm" href="{{route('accounts.cost.view')}}"><i class="fa fa-list"></i>Others Cost List</a>

               </h3>

              </div><!-- /.card-header -->

              <div class="card-body"> 
                <form method="post" action="{{(@$editData)?route('accounts.cost.update',$editData->id):route('accounts.cost.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf

                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label>Date</label>
                      <input type="text" name="date" value="{{@$editData->date}}" class="form-control singledatepicker" placeholder="Date" id="date">
                      
                    </div>


                    <div class="form-group col-md-3">
                      <label>Amount</label>
                      <input type="text" name="amount" value="{{@$editData->amount}}" class="form-control singledatepicker" placeholder="Amount">
                      
                    </div>

                    <div class="form-group col-md-2">
                      <label>Image</label>
                      <input type="file" name="image"  class="form-control " id="image">
                      
                    </div>

                    <div class="form-group col-md-4">
                      <img id="showImage" src="{{(!empty(@$editData->image))?url('public/upload/cost_images/'.@$editData->image):url('public/upload/1.png')}}" style="width: 300px; height: 100px; border: 1px solid #000;"><br>
                    </div>

                     <div class="form-group col-md-12">
                      <label>Description</label>
                      <textarea name="description" class="form-control"  rows="4"> {{@$editData->description}} </textarea>
                      
                    </div>

                     </div>

                     <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-primary">{{(@$editData) ? "Update" : "Submit"}}</button>
                     
                    </div>




                    
                  </div>
                  


                </form>

              </div>












             
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



<script>
        $('#date').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

  @endsection