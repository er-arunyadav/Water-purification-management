@extends('layouts.main')

@section('content')
  <style type="text/css">
      .statusRadio {
        padding-right: 5%;
       }
   </style>

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1">
                <i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Customer</span>
                <span class="info-box-number">
                 {{countCustomer()}}
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1">
                <i class="fas fa-tree"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Products</span>
                <span class="info-box-number">{{countProduct()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Service Pending</span>
                <span class="info-box-number">{{servicePending(0)}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Service Completed</span>
                <span class="info-box-number">{{servicePending(1)}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      <div class="row">
        <div class="col-md-4">
           <button class="btn btn-info btn-xs filter" data-toggle="modal" data-target="#myFilterModal"><i class="fas fa-ribbon"></i> Filter</button>
        </div>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-bell text-danger"></i> Service Alerts</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered dataTableShow">
                  <thead>                  
                    <tr>
                      <th>Purchase date</th>
                      <th>Product name</th>
                      <th>Customer name</th>
                      <th>Alert date</th>
                      <th>Service date</th>
                      <th class="noExport">Status</th>
                      
                    </tr>
                  </thead>
                 <tbody>
                 @foreach($alerts as $alert)
                 <tr>
                   <td>
                     {{$alert['purchase_date']}}
                   </td>
                   <td>
                     {{getProduct($alert['product_id'])->name}}
                   </td>
                   <td>
                     {{getCustomer($alert['customer_id'])->name}}
                   </td>
                   <td>
                     {{$alert['alert_date']}}
                   </td>
                   <td>
                     {{$alert['service_date']}}
                   </td>
                   <td>
                     <span data-toggle="modal" data-target="#myDashboardModal" class="text-primary statusSpan" data-status="{{$alert['status']}}" data-id="{{$alert['id']}}" data-note="{{$alert['note']}}">
                         {{alertStatus($alert['status'])}}
                     </span>
                   </td>
                 </tr>
                 @endforeach
                 </tbody>
                </table>
              </div>
              
            </div>
        </div>
      </div>
    <!-- /.content -->
	@include('dashboard.filter')
  @include('dashboard.status')
	@endsection