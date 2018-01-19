@extends('layouts.app')

@section('content')
<br>
<br>
<div id="base">
    <div id="content">
        <section>
        <div class="row">
            <div class=" col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <a href="{{ url()->previous() }}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <table class="table table-bordered">
                                <tr>
                                    <td>No Invoice</td>
                                    <td>{{ $data['head']->no_invoice }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Order</td>
                                    <td>{{ $data['head']->tanggal_order }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Approve</td>
                                    <td>{!! $data['head']->tanggal_approve ?? "<span style='color:#ea1c0d'>Belum di Approve</span>" !!}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kirim</td>
                                    <td>{!! $data['head']->tanggal_kirim ?? "<span style='color:#ea1c0d'>Belum di Kirim</span>" !!}</td>
                                </tr>
                                <tr>
                                    <td>Customer</td>
                                    <td>{{ $data['head']->nama_customer }}</td>
                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td>{{ number_format($data['head']->grand_total) }}</td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                </thead>
                                <tbody>
                                @foreach($data['det'] as $detail)
                                    <tr>
                                        <td>{{ $detail->nama_produk }}</td>
                                        <td align="right">{{ number_format($detail->harga) }}</td>
                                        <td align="right">{{ number_format($detail->qty) }}</td>
                                        <td align="right">{{ number_format($detail->harga * $detail->qty) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>
    </div>
@endsection
