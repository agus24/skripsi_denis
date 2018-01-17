<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repo\OrderRepo;

class LaporanController extends Controller
{
    public function penjualan()
    {
        return view('laporan.penjualan.index');
    }

    public function penjualanPrint(Request $request)
    {
        $order = OrderRepo::getForReport([$request->dari, $request->sampai]);
        return view('laporan.penjualan.print', compact('order'));
    }

    public function penjualanPerbulan()
    {
        $order = OrderRepo::getEachMonth();
        return view('laporan.penjualan.perbulan', ['order' => $order]);
    }

    public function barangPerbulan()
    {
        $barang = OrderRepo::productEachMonth();
        return view('laporan.barang.terlaris', compact('barang'));
    }

    public function penjualanCustomer($id)
    {
        $order = OrderRepo::getAllCustomer($id);
        dd($order);
    }

    public function pembelianCustomer()
    {
        return view('laporan.pembelian_customer.index');
    }

    public function pembelianCustomerPrint(Request $request)
    {
        $periode = [$request->dari, $request->sampai];
        $data = [
                    "data" => OrderRepo::pembelianCustomer($periode),
                    "periode" => $periode
                ];
        // dd($data['data'][0]->barangTerbanyak);
        return view('laporan.pembelian_customer.isi', compact('data'));
    }

    public function orderBelumApprove()
    {
        $data = OrderRepo::orderBelumApprove();
        return view('laporan.order.belumApprove', compact('data'));
    }
}
