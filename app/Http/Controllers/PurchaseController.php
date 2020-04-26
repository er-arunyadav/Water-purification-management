<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Purchase;
use App\Customer;
use App\Product;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        $data['title'] = 'View Purchase';
        return view('purchase.index',[
            'data' => $data,
            'purchases' => $purchases
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Product';
        $customers = Customer::all();
        $products = Product::all();
        return view('purchase.add',[
            'data' => $data,
            'customers' => $customers,
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'purchase_date' => 'required',
            'product_id' => 'required',
            'customer_id' => 'required',
            'alert_date' => 'required',
            'service_date' => 'required',
        ]);

        $customer = Purchase::create([
            'purchase_date' => $request->purchase_date,
            'product_id' => $request->product_id,
            'customer_id' => $request->customer_id,
            'alert_date' => $request->alert_date,
            'service_date' => $request->service_date,
            'status' => '0',
        ]);
        Session::flash('success','Purchase added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::all();
        $products = Product::all();
        $purchase = Purchase::find($id);
        $data['title'] = 'Purchase';
        return view('purchase.view',[
            'data' => $data,
            'products'=>$products,
            'customers'=>$customers,
            'purchase' => $purchase
        ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'purchase_date' => 'required',
            'product_id' => 'required',
            'customer_id' => 'required',
            'alert_date' => 'required',
            'service_date' => 'required',
        ]);
        $purchase = Purchase::find($id);
        $purchase->purchase_date = $request->purchase_date;
        $purchase->product_id = $request->product_id;
        $purchase->customer_id = $request->customer_id;
        $purchase->alert_date = $request->alert_date;
        $purchase->service_date = $request->service_date;
        $purchase->status = $request->status;
        $purchase->save();
       
        Session::flash('success','Purchase Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $purchase = Purchase::find($id);
         $purchase->delete();
         Session::flash('success','Purchase deleted Successfully');
         return redirect()->back();
    }

     public function status(Request $request)
    {
         $id = $request->id;
         $status =$request->status;
         $note =$request->note;
         $purchase = Purchase::find($id);
         $purchase->status = $status;
         $purchase->note = $note;
         $purchase->save();
         echo 'success';
    }
}
