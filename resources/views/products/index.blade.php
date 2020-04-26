@extends('layouts.main')

@section('content')
    
        <div class="row">
          <div class="col-12 col-sm-6 col-md-12">
             <div class="card">
             	<div class="card-body">
             		<table class="table table-bordered table-hover dataTableShow">
             			<thead>
             				<tr>
             					<th>Product Id</th>
             					<th>Product name</th>
                                <th class="noExport">Action</th>
             				</tr>
             			</thead>
             			<tbody>
             				@foreach($products as $product)
             				<tr>
             					<td>
             						{{$product->id}}
             					</td>
             					<td>
             						{{$product->name}}
             					</td>
             					
             					<td>
             						<a href="{{route('product.edit',['id'=>$product->id])}}"><i class="fa fa-edit text-primary"></i></a>
             						<a href="{{route('product.destroy',['id'=>$product->id])}}"><i class="fa fa-trash text-danger"></i></a>
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