<!DOCTYPE html>
<html>
<head>
    <title>Barang Terlaris</title>
<style>
    h1 {
        text-align : center;
    }
</style>
</head>
<body>
<h1>Barang Terlaris</h1>
<table width="100%" border="1">
    <thead>
        <th>Bulan</th>
        <th>Barang</th>
        <th>Jumlah Yang Terjual</th>
    </thead>
    <tbody>
        @foreach($barang as $key => $value)
        <Tr>
            <td>{{ $value->bulan }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->jumlah }}</td>
        </Tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
