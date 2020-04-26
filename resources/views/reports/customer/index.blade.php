@extends('layouts.main')

@section('content')
    
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
             <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Customer Wise Report</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('report.customerfind')}}">
                <div class="card-body">
                  @csrf

                  <div class="form-group">
                    <label for="customer_id">Customer name *</label>
                    <select class="form-control select2" name="customer_id">
                      @foreach($customers as $customer)
                      <option value="{{$customer->id}}">{{$customer->name}}</option>
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