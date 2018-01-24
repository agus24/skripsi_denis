<?php

namespace App\Repo;

use App\Customer;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderRepo
{
    public static function get(Order $order)
    {
        return $order->join('customers','orders.customer_id','customers.id')
                    ->select('orders.*','customers.nama as nama_customer')
                    ->orderBy('tanggal_order', 'desc')
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
            ->orderBy('tanggal_order', 'desc')
            ->paginate(15);
    }

    public static function getAllCustomer($id)
    {
        $customer = new Customer;

        foreach($customer->all() as $key => $value)
        {
            $data[] = $customer->getPembelianTerbanyak($value->id);
        }

        $data = collect($data)->sortBy('jumlah_beli')->values();
        return $data;
    }

    public static function pembelianCustomer($periode)
    {
        $data = DB::table('orders')
                    ->join('customers','customers.id','orders.customer_id')
                    ->selectRaw('customer_id, sum(grand_total) as total_beli, customers.nama as nama_customer')
                    ->groupBy('customer_id')
                    ->where('batal','<>','1')
                    ->whereBetween('tanggal_order', $periode)
                    ->orderByRaw('sum(grand_total) desc')
                    ->get();
        $data = $data->map(function($value, $key) use($periode) {
            $value->barangTerbanyak = (new Customer)->getPembelianTerbanyak($value->customer_id, $periode);
            return $value;
        });
        return $data;
    }

    public static function orderBelumApprove()
    {
        $data = DB::table('orders')
                    ->join('customers','customers.id','orders.customer_id')
                    ->selectRaw('orders.* , customers.nama as nama_customer')
                    ->whereNull('tanggal_approve')
                    ->get();
        return $data;
    }

    public static function reject($id, $alasan)
    {
        DB::table('order_cancels')->insert(["order_id" => $id, "tanggal_batal" => Carbon::now(), "alasan" => $alasan]);
        DB::table('orders')->where('id', $id)->update(["batal" => 1]);
        return true;
    }
}
