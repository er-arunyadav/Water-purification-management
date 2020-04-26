<?php 
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use App\Customer;
use App\Product;
use App\Purchase;

function getProduct($id){
	$product = Product::find($id);
	return $product;
}

function getCustomer($id){
	$customer = Customer::find($id);
	return $customer;
}

function countCustomer(){
	$customer = Customer::count();
	return $customer;
}

function countProduct(){
	$product = Product::count();
	return $product;
}

function servicePending($status){
	$servicePending = Purchase::where('status','=',$status)->count();;
	return $servicePending;
}

function alertStatus($status){
	if($status == 1){
		echo '<b class="badge bg-success">Completed</b>';
	}elseif($status == 2){
		echo '<b class="badge bg-warning">On Hold</b>';
	}else{
		echo '<b class="badge bg-danger">Pending</b>';
	}
}

 ?>