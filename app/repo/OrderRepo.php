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

    public static function getForReport($date)
    {
        $order = new Order;
        return $order->join('customers','orders.customer_id','customers.id')
                    ->select('orders.*','customers.nama as nama_customer','customers.alamat as alamat_customer','customers.telp as telp_customer')
                    ->whereBetween('tanggal_order', $date)
                    ->orderBy('tanggal_order', 'desc')
                    ->get();
    }

    public static function getEachMonth()
    {
        $order = new Order;
        $order = $order->groupBy(DB::raw('month(tanggal_order), year(tanggal_order)'))
                    ->selectRaw('sum(grand_total) as total, month(tanggal_order) as bulan, year(tanggal_order) as tahun')
                    ->orderBy('tanggal_order','asc')
                    ->where('batal', "<>",1)
                    ->get();
        return $order;
    }

    public static function productEachMonth()
    {
        $barang = DB::table('v_barang_jual_perbulan')->groupBy('bulan')->select('nama','bulan',DB::raw('max(total) as jumlah'))->orderByRaw('left(bulan,4) asc, right(bulan,2)')->get();
        return $barang;
    }

    public static function withSearch($query, $order)
    {
        return $order->join('customers','orders.customer_id','customers.id')
            ->select('orders.*','customers.nama as nama_customer')
            ->orWhere("no_invoice", "like", "%".$query."%")
            ->orWhere("tanggal_order", "like", "%".$query."%")
            ->orWhere('tanggal_approve', "like", "%".$query."%")
            ->orWhere("tanggal_kirim", "like", "%".$query."%")
            ->orWhere("customers.nama", "like", "%".$query."%")
            ->orWhere("grand_total", "like", "%".$query."%")
            ->paginate(15);
    }
}
