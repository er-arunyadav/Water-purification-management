@extends('layouts.main')

@section('content')
    
        <div class="row">
          <div class="col-12 col-sm-6 col-md-8">
             <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Purchase</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('purchase.store')}}">
                <div class="card-body">
                  @csrf
                  <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="purchase_date">Purchase date*</label>
                        <input type="text" class="form-control datepicker" id="customer_name"name="purchase_date" value="{{date('d-m-Y')}}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="product_name">Product name*</label>

                        <select class="form-control select2" name="product_id">
                          @if(count($products)>0)
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                          @else
                            <option>No Product Found</option>
                          @endif
                        </select>

                        </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="customer_name">Customer name*</label>
                        <select class="form-control select2" name="customer_id">
                          @if(count($customers)>0)
                            @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                          @else
                            <option>No Customer Found</option>
                          @endif
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="alert_date">Alert date*</label>
                        <input type="text" value="{{date('d-m-Y')}}" class="form-control datepicker" name="alert_date" >
                        </div>
                    </div>

                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                          <div class="form-group">
                          <label for="service_date">Service date*</label>
                          <input type="text" value="{{date('d-m-Y')}}" class="form-control datepicker" name="service_date">
                          </div>
                 
                    </div>
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