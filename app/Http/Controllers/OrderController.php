<?php

namespace App\Http\Controllers;

use App\Order;
use App\Repo\OrderRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        if(isset($_GET['search'])) {
            $data = OrderRepo::withSearch($_GET['search'], $order);
        } else {
            $data = OrderRepo::get($order);
        }
        return view('order.index',compact('data'));
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $data = OrderRepo::getWithDetail($order->id);
        return view('order.detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function approve($id)
    {
        $order = Order::find($id);
        $order->tanggal_approve = Carbon::now()->format('Y-m-d');
        $order->save();
        return redirect('admin/order');
    }

    public function kirim($id)
    {
        $order = Order::find($id);
        $order->tanggal_kirim = Carbon::now()->format('Y-m-d');
        $order->save();
        return redirect('admin/order');
    }

    public function reject($id)
    {
        $reject = OrderRepo::findReject($id);

        return view('order.reject',compact('reject'));
    }

    public function batal($id)
    {
        return view('order.batal', compact('id'));
    }

    public function batalKan($id, Request $request)
    {
        $reject = OrderRepo::reject($id, $request->alasan);
        return redirect(url('admin/order/'));
    }
}
