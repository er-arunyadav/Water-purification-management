@extends('layouts.main')

@section('content')
    
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
             <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Wise Report</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('report.productfind')}}">
                <div class="card-body">
                  @csrf
                  <div class="form-group">
                    <label for="product_id">Product name *</label>
                    <select class="form-control select2" name="product_id">
                      @foreach($products as $product)
                      <option value="{{$product->id}}">{{$product->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status">
                      <option value="1" selected>Completed</option>
                      <option value="2" >On Hold</option>
                      <option value="0" >Pending</option>
                    </select>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Find</button>
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