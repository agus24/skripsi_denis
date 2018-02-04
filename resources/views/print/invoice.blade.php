<!DOCTYPE html>
<html>
<head>
    <title>Invoice {{ $order['head']->no_invoice }}</title>
<style>
    th {
        border-top : 1px dashed black;
        border-bottom : 1px dashed black;
    }

    .foot td{
        border-top : 1px dashed black;
        border-bottom : 1px dashed black;
    }
    .ttd {
        text-align:right;
        margin-right:2%;
        margin-top: 2%;
    }

    .detailTable {
        background-color: #c5c3c3;
        text-align: center;
        font-weight: bold;
    }
</style>
</head>
<body>
<center><img src="{{ asset('storage/LOGO%20KTI3.jpg') }}" width="500px"></center>
<Table width="100%" border="1px">
    <tr style="background-color:blue">
        <td colspan="3"></td>
    </tr>
    <tr>
        <td>No. Invoice</td>
        <td><b>{{ $order['head']->no_invoice }}</b></td>
    </tr>
    <tr>
        <td>Waktu Transaksi</td>
        <td><b>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order['head']->created_at)->formatLocalized('%d %B %Y %H.%M WIB') }}</b></td>
    </tr>
    <tr>
        <td>Pembeli</td>
        <td><b>{{ $order['head']->nama_customer }}</b></td>
    </tr>
    <tr>
        <td>Tujuan Pengiriman</td>
        <td><b>{{ $order['head']->nama_customer }}</b><br>
            {{ $order['head']->alamat_customer }}<br>
            {{ $order['head']->telp_customer }}
        </td>
    </tr>
    <tr style="background-color:blue">
        <td colspan="3"></td>
    </tr>
    <tr>
        <td colspan="2">
            <table width="100%" border=1>
                <tr class="detailTable">
                    <Td>Nama</Td>
                    <Td width="5%">Jumlah</Td>
                    <Td>Harga</Td>
                    <Td>Sub Total</Td>
                </tr>
                @foreach($order['det'] as $key => $ord)
                <tr>
                    <td><b>{{ $ord->nama_produk }}</b></td>
                    <td align="right">{{ number_format($ord->qty) }}</td>
                    <td align="right">{{ number_format($ord->harga) }}</td>
                    <td align="right">{{ number_format($ord->qty * $ord->harga) }}</td>
                </tr>
                @endforeach
                <tr class="detailTable">
                    <td colspan="3"><b>Total Pembayaran</b></td>
                    <Td align="right">{{ number_format($order['head']->grand_total) }}</Td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="background-color:blue">
        <td colspan="3"></td>
    </tr>
</Table>



{{-- <table width="100%">
    <tr style="background-color:#b6feda">
        <td><b>No. Invoice :</b> {{ $order['head']->no_invoice }}</td>
        <td><b>Customer :</b> {{ $order['head']->nama_customer }}</td>
        <td align="right"><b>Tanggal Order :</b> {{ $order['head']->tanggal_order }}</td>
    </tr>
</table>
<p><b>Kirim :</b>{{ $order['head']->alamat_customer }} {{ $order['head']->telp_customer }}</p>
<table width="100%">
    <thead>
        <th width="5%">No.</th>
        <th>Nama Barang</th>
        <th width="5%">Harga</th>
        <th width="3%">Qty</th>
        <th width="15%">Sub Total</th>
        <th width="10%">&nbsp;</th>
    </thead>
    <tbody>
        @foreach($order['det'] as $key => $ord)
        <tr>
            <td align="center">{{ $key+1 }}.</td>
            <td>{{ $ord->nama_produk }}</td>
            <td align="right">{{ number_format($ord->harga) }}</td>
            <td align="right">{{ number_format($ord->qty) }}</td>
            <td align="right">{{ number_format($ord->qty * $ord->harga) }}</td>
            <td>&nbsp;</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="foot">
            <Td colspan="2">&nbsp;</Td>
            <td colspan="2" align="center"><b>Grand Total</b></td>
            <Td align="right">{{ number_format($order['head']->grand_total) }}</Td>
            <td>&nbsp;</td>
        </tr>
    </tfoot>
</table>

<div class="ttd">
    Tangerang, {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}
</div> --}}
</body>
</html>
