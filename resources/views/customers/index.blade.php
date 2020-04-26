@extends('layouts.main')

@section('content')
    
        <div class="row">
          <div class="col-12 col-sm-6 col-md-12">
             <div class="card">
             	<div class="card-body">
             		<table class="table table-bordered table-hover dataTableShow">
             			<thead>
             				<tr>
             					<th>Customer name</th>
             					<th>Company name</th>
             					<th>Mobile no.</th>
             					<th>Address</th>
             					<th>Action</th>
             				</tr>
             			</thead>
             			<tbody>
             				@foreach($customers as $customer)
             				<tr>
             					<td>
             						{{$customer->name}}
             					</td>
             					<td>
             						{{$customer->company_name}}
             					</td>
             					<td>
             						{{$customer->mobile}}
             					</td>
             					<td>
             						{{$customer->address}}
             					</td>
             					<td>
             						<a href="{{route('customer.edit',['id'=>$customer->id])}}"><i class="fa fa-edit text-primary"></i></a>
             						<a href="{{route('customer.destroy',['id'=>$customer->id])}}"><i class="fa fa-trash text-danger"></i></a>
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
	
	@endsection