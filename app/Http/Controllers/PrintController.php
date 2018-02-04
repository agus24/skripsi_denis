<?php

namespace App\Http\Controllers;

use App\Order;
use App\Repo\OrderRepo;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function invoice($id)
    {
        $order = OrderRepo::getWithDetail($id);
        return view('print.invoice', compact('order'));
    }
}
