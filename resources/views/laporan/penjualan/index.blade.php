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
                        <br/>
                        <br/>
                        <div class="col-md-6">
                            <form action="{{ url('admin/laporan/penjualan') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Dari</label>
                                    <input class="form-control" type="date" name="dari" value="{{ Carbon\Carbon::now()->format('Y-m-01') }}">
                                </div>
                                <div class="form-group">
                                    <label>Sampai</label>
                                    <input class="form-control" type="date" name="sampai" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
</div>
@endsection
