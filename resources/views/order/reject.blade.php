@extends('layouts.app')

@section('content')
<br>
<br>
<div id="base">
    <div id="content">
        <section>
        <div class="row">
            <div class=" col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ url()->previous() }}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <h5>Tanggal Batal <b>{{ $reject->tanggal_batal }}</b><br></h5>
                        <h4>Alasan :</h4> <br>
                        {{ $reject->alasan }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>
    </div>
@endsection
