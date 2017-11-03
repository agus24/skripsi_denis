<div class="minicart-side">
    <div class="minicart-side-title">
        <h4>Shopping Cart</h4>
    </div>
    <div class="minicart-side-content">
        <div class="minicart">
            <div class="minicart-header no-items show">
                <table class="table table-responsive">
                    <thead>
                        <th width="5%">No.</th>
                        <th width="">Nama Produk</th>
                        <th width="40%">Qty</th>
                        <th width="15%">#</th>
                    </thead>
                    <tbody>
                    @foreach($cart as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->nama_produk }}</td>
                        <td>
                            <form action="{{ url('modifyCart/'.$value->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="number" value="{{ $value->qty }}" name="qty" class="form-control cart-qty">
                                <button class="btn btn-xs btn-success" style="float:left"><i class="fa fa-check"></i></button>
                            </form>
                        </td>
                        <td><a href="{{ url('removeCart/'.$value->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="minicart-footer">
                <div class="minicart-actions clearfix">
                    <a class="button no-item-button" href="{{ url("checkout") }}">
                        <span class="text">Checkout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
