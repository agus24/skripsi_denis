<?php

namespace App\Repo;

use App\Order;
use Illuminate\Support\Facades\DB;

class OrderRepo
{
    public static function get(Order $order)
    {
        return $order->join('customers','orders.customer_id','customers.id')
                    ->select('orders.*','customers.nama as nama_customer')
                    ->paginate(15);
    }

    public static function findReject($id)
    {
        return DB::table('order_cancels')->where('order_id',$id)->get()[0];
    }

    public static function getWithDetail($id)
    {
        $order = new Order;
        $data['head'] = $order->join('customers','orders.customer_id','customers.id')
                            ->select('orders.*','customers.nama as nama_customer','customers.alamat as alamat_customer','customers.telp as telp_customer')
                            ->where('orders.id',$id)
                            ->get()[0];
        $data['det'] = DB::table('order_details')
                    ->where('order_id',$id)
                    ->leftjoin('produks','produks.id','order_details.produk_id')
                    ->leftjoin('merks','produks.merk_id','merks.id')
                    ->select('order_details.*','produks.nama as nama_produk','merks.nama as nama_merk')
                    ->get();
        return $data;
    }
}
