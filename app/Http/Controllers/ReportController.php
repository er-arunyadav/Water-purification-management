<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Customer;
use App\Purchase;
use App\Product;
class ReportController extends Controller
{

	public function customer(){

		$data['title'] = 'Report';
		$customers = Customer::all();
		return view('reports.customer.index',[
			'data' => $data,
			'customers' => $customers 
		]);
	}

   public function findcustomer(Request $request)
   {
   	$id = $request->customer_id;
   	$status = $request->status;

   	$name = getCustomer($id)->name;

   	$purchases = Purchase::where('customer_id',$id)->where('status',$status)->get();

   		$data['title'] = 'Result Found For '.$name.'';
		$customers = Customer::all();
		return view('reports.customer.filter',[
			'data' => $data,
			'purchases' => $purchases 
		]);
   }


   public function product(){

		$data['title'] = 'Report';
		$products = Product::all();
		return view('reports.product.index',[
			'data' => $data,
			'products' => $products 
		]);
	}

   public function findproduct(Request $request)
   {
   	$id = $request->product_id;
    $status = $request->status;
   	$name = getProduct($id)->name;

   	$purchases = Purchase::where('product_id',$id)->where('status',$status)->get();
   	
   		$data['title'] = 'Result Found For '.$name.'';
		$customers = Customer::all();
		return view('reports.product.filter',[
			'data' => $data,
			'purchases' => $purchases 
		]);
   }

    public function datewise(){

		$data['title'] = 'Report';
		return view('reports.date.index',[
			'data' => $data,
			
		]);
	}

   public function datewisefind(Request $request)
   {
  
   	$date_to = $request->date_to;
   	$date_from = $request->date_from;
    $status = $request->status;

    $data['title'] = 'Result Found For '.$date_to.' to '.$date_from.' ';

   	$purchases = Purchase::whereBetween('purchase_date',[$date_to, $date_from])
   					->where('status',$status)->get();
 
		$customers = Customer::all();
		return view('reports.product.filter',[
			'data' => $data,
			'purchases' => $purchases 
		]);
   }




}
