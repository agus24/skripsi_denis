@extends('layouts.app')

@section('content')
<div id="base">
<div id="content">
    <section>
        <div class="section-body">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="card">
                    <div class="card-body">
                        <center><h3>Pilih Periode</h3></center>
                        <form action="{{ url('admin/laporan/pembelian/customer') }}" class="form-horizontal" method="POST" id="mainForm">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="merk_id">Dari</label>
                                <div class="col-md-6">
                                    <input type="date" name="dari" class="form-control" value="{{ date('Y-01-01') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nama">Sampai</label>
                                <div class="col-md-6">
                                    <input type="date" name="sampai" class="form-control" value="{{ date('Y-12-31') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
</div>
@endsection
