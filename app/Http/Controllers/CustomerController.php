<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($_GET['search']) {
            $search = $_GET['search'];
            $data = Customer::where("nama", "like", "%".$search."%")
                            ->orWhere('email', "like", "%".$search."%")
                            ->orWhere('alamat', "like", "%".$search."%")
                            ->orWhere('telp', 'like', "%".$search."%")
                            ->orderBy('status', 'desc')
                            ->paginate(15);
        } else {
            $data = Customer::orderby('status','desc')->paginate(15);
        }
        return view('customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $data = $customer;
        return view('customer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            "nama" => "required",
            "email" => "required|email",
            "alamat" => "required",
            "telp" => "required",
        ]);

        $customer->nama = $request->nama;
        $customer->email = $request->email;
        if($request->password != "" || isset($request->password)) {
            $customer->password = bcrypt($request->password);
        }
        $customer->alamat = $request->alamat;
        $customer->telp = $request->telp;
        $customer->save();

        return redirect('admin/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if($customer->status == 1) {
            $customer->status = 0;
        }
        else {
            $customer->status = 1;
        }
        $customer->save();
        return redirect('admin/customer');
    }
}
