<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Purchase;
use App\Customer;
use App\Product;
class DashboardController extends Controller
{
    public function index(){
    	$data['title'] = 'Dashoboard';
    	$alerts  = $this->alert();
    	// dd($alerts);
    	
    	return view('dashboard.index',[
    		'data' => $data,
    		'alerts' =>$alerts
    	]);
    }

    public function alert(){
    	$purchases = Purchase::where('status','!=','1')->get();
        
    	$data = array();
    
    	// $date = date('d-m-Y');
    	$date = '27-04-2020';
    	foreach($purchases as $purchase){

    			$service_date = $purchase->service_date;

    			$alert_date =$purchase->alert_date;

    		if( ($service_date >= $date and $alert_date <= $date) AND $alert_date <= $service_date){
    			
    			$data[] = array(
                    'id' => $purchase->id,
    				'purchase_date' => $purchase->purchase_date,
    				'product_id' => $purchase->product_id,
    				'customer_id' => $purchase->customer_id,
    				'alert_date' => $purchase->alert_date,
    				'service_date' => $purchase->service_date,
    				'note' => $purchase->note,
    				'status' => $purchase->status
    			);		
    			
    		}	
    	}
    	return $data;
    }

    public function datewisefind(Request $request)
   {
    
    $date_to = $request->date_to;
    $date_from = $request->date_from;
    $status = $request->status;

    $data['title'] = 'Result Found For '.$date_to.' to '.$date_from.' ';

    $alerts = Purchase::whereBetween('purchase_date',[$date_to, $date_from])
                    ->where('status',$status)->get();
 
        $customers = Customer::all();
        return view('dashboard.index',[
            'data' => $data,
            'alerts' => $alerts 
        ]);
   }

}
