@extends('front.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($data->count() > 0)
            <div class="col-md-6">
                <div class="col-md-4">
                    <img src="{{ $data->produk1_gambar }}" width="400px" height="400px">
                </div>
                <div class="col-md-8">
                    <p><b>Nama Produk :</b> {{ $data->produk1_nama }}</p>
                    <p><b>Harga Produk :</b> {{ number_format($data->produk1_harga) }}</p>
                    <p><b>Spesifikasi :</b> <br>{{ $data->produk1_spesifikasi }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-4">
                    <img src="{{ $data->produk2_gambar }}" width="400px" height="400px">
                </div>
                <div class="col-md-8">
                    <p><b>Nama Produk :</b> {{ $data->produk2_nama }}</p>
                    <p><b>Harga Produk :</b> {{ number_format($data->produk2_harga) }}</p>
                    <p><b>Spesifikasi :</b> <br>{{ $data->produk2_spesifikasi }}</p>
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{ url('/user/compare/clean') }}" class="btn btn-danger btn-block">Clear All</a>
            </div>
        @else
        <div class="col-md-12 text-center">
            <h1>Tidak Ada Produk Yang Ingin Dibandingkan</h1>
        </div>
        @endif
    </div>
</div>
@endsection
