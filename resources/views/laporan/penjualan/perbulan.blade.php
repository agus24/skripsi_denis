<!DOCTYPE html>
<html>
<head>
    <title>
        Penjualan Perbulan
    </title>
<style>
    table th{
        /*border-bottom : 1px solid black;*/
    }
    table {
        padding-right:15%;
        padding-left:15%;
    }
    h1 {
        text-align:center;
    }
    .strip {
        background-color: #cecece;
    }
</style>
</head>
<body>
<h1>Total Penjualan Perbulan</h1>
<table width="100%" border=1px>
    <thead>
        <th>Bulan</th>
        <th width="10%">Total</th>
    </thead>
    <tbody>
        <?php $oldYear = ""; ?>
        @foreach($order as $value)
        @if($oldYear != $value->tahun)
            <tr class="strip">
        @else
            <tr>
        @endif
            <td align="center">{{ $value->tahun }} - {{ sprintf("%02d", $value->bulan) }}</td>
            <td align="right">{{ number_format($value->total) }}</td>
        </tr>
        <?php $oldYear = $value->tahun; ?>
        @endforeach
    </tbody>
</table>
</body>
</html>
