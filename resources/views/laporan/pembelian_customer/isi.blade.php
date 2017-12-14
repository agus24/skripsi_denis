<!DOCTYPE html>
<html>
<head>
    <title>Pembelian Customer</title>
</head>
<body>
    <center>
        <img src="{{ asset('storage/LOGO%20KTI3.jpg') }}" width="500px">
        <hr>
        <h1>Laporan Pembelian Customer</h1>
        <h2> Periode {{ $data['periode'][0] }} Sampai {{ $data['periode'][1] }}</h2>
    </center>

    <center>
        <table border="1" width="50%">
            <thead style="background-color:#dbdbdb">
                <th width="5%">No.</th>
                <th>Nama Customer</th>
                <th>Total Pembelian</th>
                <th>Barang Terbanyak</th>
                <th>Jumlah Barang</th>
            </thead>
            <tbody>
                @foreach($data['data'] as $key => $value)
                    <tr>
                        <td align="center">{{ $key+1 }}.</td>
                        <td>{{ $value->nama_customer }}</td>
                        <td align="right">{{ number_format($value->total_beli) }}</td>
                        <td align="">&nbsp;&nbsp;{{ $value->barangTerbanyak->nama_produk }}</td>
                        <td align="right">{{ number_format($value->barangTerbanyak->jumlah_beli) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</body>
</html>
