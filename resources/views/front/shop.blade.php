<hr>
<div class="container-fluid">
    <div class="divider"><span>Shop</span></div>
    <div class="row">
        @foreach($produks as $produk)
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ $produk->nama }}</div>
                    <div class="panel-body">
                        <img src="{{ asset('storage/images/'.$produk->gambar) }}" width="100%">
                    </div>
                    <div class="panel-footer">
                        <span><b>Rp. {{ $produk->hargaText }}</b></span>
                        <br>
                        <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-warning"><i class="fa fa-refresh"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
