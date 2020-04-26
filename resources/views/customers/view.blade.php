@extends('layouts.main')

@section('content')
    
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
             <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('customer.update',['id' => $customer->id])}}">
                <div class="card-body">
                  @csrf
                  <div class="form-group">
                    <label for="customer_name">Customer name *</label>
                    <input type="text" class="form-control" id="customer_name" value="{{$customer->name}}" name="customer_name">
                  </div>

                  <div class="form-group">
                    <label for="company_name">Company name*</label>
                    <input type="text" class="form-control" id="company_name" value="{{$customer->company_name}}" name="company_name">
                  </div>

                 <div class="form-group">
                    <label for="mobile_no">Mobile No.</label>
                    <input type="text" class="form-control" id="mobile_no" value="{{$customer->mobile}}" name="mobile_no" maxlength="10">
                  </div>

                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea cols="5" rows="5" class="form-control" name="address">
                      {{$customer->address}}
                    </textarea>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
         
        </div>
        <!-- /.row -->

    <!-- /.content -->
  
  @endsection