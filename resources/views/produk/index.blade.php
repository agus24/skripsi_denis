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
                        <a href="{{ url('admin/produk/create') }}" class="btn btn-success btn-sm" title="Add New Brand">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Baru
                        </a>
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
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th width="30%">Spesifikasi</th>
                                    <th width="20%">#</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}.</td>
                                    <?php $gambar = json_decode($item->gambar, true); ?>
                                    <?php $tampil = count($gambar) != 0 ? $gambar[0] : ""; ?>
                                    <td><img src="{{ asset("storage/images/".$tampil) }}" width="75px"></td>
                                    <td>{{ $item->nama }}</td>
                                    <td align="right">{{ number_format($item->harga) }}</td>
                                    <td>{!! $item->spesifikasi !!}</td>
                                    <td>
                                        <a href="{{ url('admin/produk/' . $item->id . '/edit') }}" title="Edit Brand"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                                        <form action="{{ url('admin/produk/'.$item->id) }}" method="POST" style="display:inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger btn-xs" title="Delete Brand"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm("Confirm delete?")"></i> Hapus</button>
                                        </form>
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
