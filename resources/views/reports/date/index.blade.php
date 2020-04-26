@extends('layouts.main')

@section('content')
    
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
             <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Date Wise Report</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('report.datewisefind')}}">
                <div class="card-body">
                  @csrf
                  <div class="form-group">
                    <label for="date_to">Date To *</label>
                    <input type="text" name="date_to" class="form-control datepicker" id="date_to">
                  </div>

                  <div class="form-group">
                    <label for="date_from">Date From *</label>
                    <input type="text" name="date_from" class="form-control datepicker" id="date_from">
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