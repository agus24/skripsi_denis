@extends('front.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $produk->gambar[0] }}" width="400px" height="400px">
        </div>
        <div class="col-md-8">
            <p><b>Nama Produk :</b> {{ $produk->nama }}</p>
            <p><b>Harga Produk :</b> {{ number_format($produk->harga) }}</p>
            <p><b>Spesifikasi :</b> <br>{!! $produk->spesifikasi !!}</p>
            <a href="{{ url('addCart/'.$produk->id) }}" class="btn btn-warning">Add To Cart</a>
            <a href="{{ url('compare/'.$produk->id) }}" class="btn btn-success">Compare</a>
        </div>
    </div>
</div>
@endsection
