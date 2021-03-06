@extends('front.layouts.app')

@section('content')
<div class="container">
    <div class="col-md-2 col-md-offset-8">
        <select class="form-control" onchange="filter(this)">
            <option value="">Filter</option>
            <option value="2" {{ isset($_GET['filter']) && $_GET['filter'] == 2 ? "selected" : "" }}>Tube</option>
            <option value="1" {{ isset($_GET['filter']) && $_GET['filter'] == 1 ? "selected" : "" }}>Tubeless</option>
        </select>
    </div>
    <div class="col-md-2">
        <a href="javascript:showSearchModal()"><i class="fa fa-search"></i> Search</a>
    </div>
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
                                <a href="{{ url('produk/'.$product->id) }}">{{ $product->nama }}</a>
                            </h3>
                            @if(!Auth::guard('customer')->guest())
                            <div class="info-price">
                                <span class="price">
                                    <span class="amount">Rp. {{ number_format($product->harga) }}</span>
                                </span>
                            </div>
                            @endif
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

@section('modal')
<div id="searchModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
            <form action="" method="get" class="form-horizontal" id="searchForm">
                <div class="col-md-10">
                    <input type="hidden" name="filter" id="filter" value="{{ $_GET['filter'] ?? "" }}">
                    <input type="text" name="search" id="searchBox" class="form-control" placeholder="search" value="{{ $_GET['search'] ?? "" }}">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@section('script')
<Script>
    window.$ = jQuery;
    function showSearchModal() {
        $('#searchModal').modal('show');
    }

    function filter(el) {
        let filter = el.value;
        $('#filter').val(filter);
        $('#searchForm').submit();
    }
</Script>
@endsection
