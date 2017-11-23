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
}
