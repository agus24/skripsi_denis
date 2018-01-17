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
                        {{-- <a href="{{ url('admin/customer/create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Baru
                        </a> --}}
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>Alamat</th>
                                    <th width="10%">Status</th>
                                    <th width="20%">#</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}.</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->telp }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td align="center">
                                        @if($item->status == 0)
                                        <span style="color:#f22314">Tidak Aktif</span>
                                        @else
                                        <span style="color:#3d8b40">Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/customer/' . $item->id . '/edit') }}" title="Edit Brand"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                                        <form action="{{ url('admin/customer/'.$item->id) }}" method="POST" style="display:inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger btn-xs" title="Delete Brand"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm("Confirm delete?")"></i> Ubah Status</button>
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
