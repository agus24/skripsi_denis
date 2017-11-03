@extends('front.layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered table-stripped">
        <thead>
            <th>No.</th>
            <th>No. Invoice</th>
            <th>Tanggal Order</th>
            <th>Tanggal Approve</th>
            <th>Tanggal Kirim</th>
            <th>Status</th>
            <th>#</th>
        </thead>
        <tbody>
            @foreach($order as $key => $value)
            @headerOrder($value->status)
                <td>{{ $key+1 }}.</td>
                <td>{{ $value->no_invoice }}</td>
                <td>{{ $value->tanggal_order }}</td>
                <td>{{ $value->tanggal_approve }}</td>
                <td>{{ $value->tanggal_kirim }}</td>
                <td>{{ $value->statusText }}</td>
                <td>
                    <button onclick="showDetail({{ $value->id }})"><i class="fa fa-eye"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
<Script>
    window.$ = tpj;
    function showDetail(id) {
        $.ajax({
            async :false,
            url : "{{ url('api/order/') }}/"+id,
            success : (result) => {
                $('#tableDetail >tbody').empty();
                $('#tableDetail >tbody').append(formatHtml(result));
                $('#orderDetail').modal('show');
            }
        });
    }

    function formatHtml(data) {
        let html = "";
        let i = 1;
        $.each(data, function(key, value) {
            html += `<tr>
                <td>`+i+`.</td>
                <td>`+value.nama+`</td>
                <td>`+value.harga+`</td>
                <td>`+value.qty+`</td>
                <td>`+value.sub_total+`</td>
            </tr>`;
            i++;
        });
        return html;
    }
</Script>
@endsection

@section('modal')
<div class="modal fade" id="orderDetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <table class="table table-bordered table-stripped" id="tableDetail">
                <thead>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Sub Total</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@endsection
