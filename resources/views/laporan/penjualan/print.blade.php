<!DOCTYPE html>
<html>
<head>
    <title>
        Penjualan
    </title>
<style>
    .container {
        text-align : center;
    }

    .tbl {
        width:100%;
    }
    .tbl th{
        border-bottom : 1px solid black;
    }
</style>
</head>
<center><img src="{{ asset('storage/LOGO%20KTI3.jpg') }}" width="500px"></center><hr>
<body>
    <div class="container">
        <h1>Penjualan</h1>
        <table class="tbl" border=1>
            <thead>
                <th>No.</th>
                <th>Tanggal Order</th>
                <th>Tanggal Approve</th>
                <th>Tanggal Kirim</th>
                <th>Customer</th>
                <th>Grand Total</th>
            </thead>
            <tbody>
                @foreach($order as $key => $value)
                <Tr>
                    <Td>{{ $key+1 }}</Td>
                    <td>{{ $value->tanggal_order}}</td>
                    <td>{{ $value->tanggal_approve}}</td>
                    <td>{{ $value->tanggal_kirim}}</td>
                    <td>{{ $value->nama_customer}}</td>
                    <td>{{ number_format($value->grand_total) }}</td>
                </Tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
