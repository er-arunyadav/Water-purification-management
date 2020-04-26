@extends('layouts.main')

@section('content')
   <style type="text/css">
      .statusRadio {
        padding-right: 5%;
       }
   </style>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-12">
             <div class="card">
             	<div class="card-body">
             		<table class="table table-bordered table-hover dataTableShow">
             			<thead>
             				<tr>
             					<th>Purchase date</th>
             					<th>Product name</th>
                                <th>Customer name</th>
                                <th>Alert Date</th>
                                <th>Service Date</th>
                                <th>Status</th>
                                <th>Action</th>
             				</tr>
             			</thead>
             			<tbody>
             				@foreach($purchases as $purchase)
             				<tr>
             					<td>
             						{{$purchase->purchase_date}}
             					</td>
             					<td>
             						{{getProduct($purchase->product_id)->name}}
             					</td>
             					<td>
                                    {{getCustomer($purchase->customer_id)->name}}
                                </td>
                                <td>
                                    {{$purchase->alert_date}}
                                </td>
                                <td>
                                    {{$purchase->service_date}}
                                </td>
                                <td>
                                    <span data-toggle="modal" data-target="#myModal" class="text-primary statusSpan" data-status="{{$purchase->status}}" data-id="{{$purchase->id}}" data-note="{{$purchase->note}}">
                                        {{alertStatus($purchase->status)}}
                                    </span>
                                </td>
             					<td>
             						<a href="{{route('purchase.edit',['id'=>$purchase->id])}}"><i class="fa fa-edit text-primary"></i></a>
             						<a href="{{route('purchase.destroy',['id'=>$purchase->id])}}"><i class="fa fa-trash text-danger"></i></a>
             					</td>
             				</tr>
             				@endforeach
             			</tbody>
             		</table>
             	</div>
             </div>
             

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

    <!-- /.content -->
	
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
              <h4 class="modal-title text-primary">Change Service Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
        </div>
        <div class="modal-body">
                <input type="hidden" id="status_id">
                <input type="hidden" id="status_val">
                <label class="radio-inline statusRadio">
                    <input type="radio" name="status" value="1" id="completed">Completed</label>
                <label class="radio-inline statusRadio">
                    <input type="radio" value="2" name="status" id="onhold">On Hold</label>
                <label class="radio-inline statusRadio">
                <input type="radio" value="0" name="status" id="pending">Pending</label> 
                <hr>
                <div class="form-group">
                    <label>Note</label>
                    <textarea cols="5" rows="5" name="note" id="noteStatus" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" id="statusButton">Submit</button>
                </div>
        </div>
      </div>
      
    </div>
  </div>
	@endsection