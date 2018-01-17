@extends('layouts.app')

@section('content')
<div id="base">
<div id="content">
    <section>
        <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="form-group col-md-2 col-md-offset-10">
                                <input type="Text" name="search" class="form-control" placeholder="search" style="border-bottom:1px solid black" value="{{ $_GET['search'] ?? "" }}">
                            </div>
                        </form>
                        <br/>
                        <br/>
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>No. Invoice</th>
                                    <th>Tanggal Order</th>
                                    <th>Tanggal Approval</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Batal</th>
                                    <th width="20%">#</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}.</td>
                                    <td>{{ $item->no_invoice }}</td>
                                    <td>{{ $item->tanggal_order }}</td>
                                    <td>{!! $item->tanggal_approve ?? "<span style='color:#ea1c0d'>Belum di Approve</span>" !!}</td>
                                    <td>{!! $item->tanggal_kirim ?? "<span style='color:#ea1c0d'>Belum di Kirim</span>" !!}</td>
                                    <td>{{ $item->nama_customer }}</td>
                                    <td align="right">{{ number_format($item->grand_total) }}</td>
                                    <td>{!! $item->batal == 1 ? "<a href='".url('admin/order/'.$item->id."/reject")."' class='btn btn-warning btn-xs'>Dibatalkan</a>" : "" !!}</td>
                                    <td>
                                        <a href="{{ url('admin/order/'. $item->id) }}" class="btn btn-default btn-xs"><i class="fa fa-search"></i> Detail</a>
                                        <a href="{{ url('print/invoice/'. $item->id) }}" class="btn btn-success btn-xs"><i class="fa fa-print"></i> Print Invoice</a>
                                        @if($item->tanggal_approve == NULL)
                                        <a href="{{ url('admin/order/' . $item->id . '/approve') }}" title="Edit Brand"><button class="btn btn-primary btn-xs"><i class="md-check" aria-hidden="true"></i> Approve</button></a>
                                        @elseif($item->tanggal_kirim == NULL)
                                        <a href="{{ url('admin/order/' . $item->id . '/kirim') }}" title="Edit Brand"><button class="btn btn-success btn-xs"><i class="md-check" aria-hidden="true"></i> Kirim</button></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $data->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
</div>
@endsection
