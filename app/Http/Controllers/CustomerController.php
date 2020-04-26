<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Customer;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $data['title'] = 'View Customer';
        return view('customers.index',[
            'data' => $data,
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Customer';
        return view('customers.add',[
            'data' => $data
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
            'customer_name' => 'required',
            'company_name' => 'required',
        ]);

        $customer = Customer::create([
            'name' => $request->customer_name,
            'company_name' => $request->company_name,
            'mobile' => $request->mobile_no,
            'address' => $request->address
        ]);
        Session::flash('success','Customer added successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $data['title'] = 'Customer';
        return view('customers.view',[
            'data' => $data,
            'customer' => $customer
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
            'customer_name' => 'required',
            'company_name' => 'required',
        ]);

        $customer = Customer::find($id);

        $customer->name =  $request->customer_name;
        $customer->company_name =  $request->company_name;
        $customer->mobile =  $request->mobile_no;
        $customer->address =  $request->address;
        $customer->save();
        Session::flash('success','Customer updated successfully');
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
         $customer = Customer::find($id);
         $customer->delete();
         Session::flash('success','Customer deleted Successfully');
         return redirect()->back();
    }
}
