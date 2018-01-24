@extends('front.layouts.app')

@section('style')
<style>
.batal {
    background-color:gray;
}
.batal td {
    color:white;
}
</style>
@endsection

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
                <td>{!! $value->statusText !!}</td>
                <td>
                    @if($value->tanggal_approve == NULL && $value->batal == 0)
                    <button class="btn btn-danger" onclick="batalOrder({{$value->id}})"><i class="fa fa-close"></i></button>
                    @endif
                    <button onclick="showDetail({{ $value->id }})" class="btn btn-warning"><i class="fa fa-eye"></i></button>
                    <a href="{{ url('print/invoice/'.$value->id) }}" class="btn btn-success"><i class="fa fa-print"></i></a>
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

    function batalOrder(id) {
        let action = "{{ url('pembatalanOrder') }}/";
        $('#formBatalOrder').attr('action', action + id);
        $('#modalBatalOrder').modal('show');
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

<div class="modal fade" id="modalBatalOrder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">
                    Form Pembatalan Order
                </div>
                <form method="POST" action="{{ url('pembatalanOrder') }}/" id="formBatalOrder">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Alasan</label>
                        <textarea class="form-control" name="alasan"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="Btn btn-success">Batalkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
