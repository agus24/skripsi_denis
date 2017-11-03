@extends('front.layouts.app')

@section('content')
<div class="container">
    @foreach($products as $key => $product)
    <li class="product masonry-item product-no-border style-2 col-md-3 col-sm-6">
        <div class="product-container">
            <figure>
                <div class="product-wrap">
                    <div class="product-images">
                        <div class="shop-loop-thumbnail shop-loop-front-thumbnail">
                            <a href="{{ url('/produk/'.$product->id) }}"><img width="450" height="450" src="{{ asset("storage/images/".$product->gambar) }}" alt=""/></a>
                        </div>
                        <div class="shop-loop-thumbnail shop-loop-back-thumbnail">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
                <figcaption>
                    <div class="shop-loop-product-info">
                        <div class="info-meta clearfix">
                        </div>
                        <div class="info-content-wrap">
                            <h3 class="product_title">
                                <a href="{{ url('produk/'.$product->id) }}">{{ $product->nama_merk. " " .$product->nama }}</a>
                            </h3>
                            <div class="info-price">
                                <span class="price">
                                    <span class="amount">Rp. {{ number_format($product->harga) }}</span>
                                </span>
                            </div>
                            <div class="loop-action">
                                <div class="loop-add-to-cart">
                                    <a href="{{ url('addCart/'.$product->id) }}" class="btn btn-default">
                                        Add to cart
                                    </a>
                                    <a href="{{ url('compare/'.$product->id) }}" class="btn btn-success">
                                        Compare
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </li>
    @endforeach
</div>
<Br>
@endsection
