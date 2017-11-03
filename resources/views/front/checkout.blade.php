@extends('front.layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered table-stripped">
        <thead>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
            <th>#</th>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @foreach($cart as $key => $value)
                <tr>
                    <td>{{ $key+1 }}.</td>
                    <td>{{ $value->nama_produk }}</td>
                    <td>{{ $value->qty }}</td>
                    <td align="right">{{ number_format($value->harga) }}</td>
                    <td align="right">{{ number_format($value->harga * $value->qty) }}</td>
                    <td>
                        <a href="removeCart/{{ $value->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php $total += $value->harga * $value->qty; ?>
            @endforeach
            <tr>
                <td colspan="4" align="right" style="background-color:#9cd29c"><b>TOTAL</b></td>
                <td align="right" colspan="1">{{ number_format($total) }}</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ url('process/cart') }}" class="Btn btn-success btn-block btn-lg text-center">Menuju ke Pembayaran</a>
</div>
@endsection
