@extends('layouts.app')

@section('content')
<br>
<br>
<div id="base">
    <div id="content">
        <section>
        <div class="row">
            <div class=" col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Gambar</div>
                    <div class="panel-body">
                        <form id="img" class="dropzone">
                        </form>
                    </div>
                </div>
            </div>
            <div class=" col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Produk</div>
                    <div class="panel-body">
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ url('produk') }}" class="form-horizontal" method="POST" id="mainForm">
                            {{ csrf_field() }}
                            <input type="hidden" name="gambar" id="gambar">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="merk_id">Merk</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="merk_id">
                                        <option>Select</option>
                                        @foreach($merks as $merk)
                                            <option value="{{ $merk->id }}">{{ $merk->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nama">Nama</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nama">Harga</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="harga" id="harga">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nama">Spesifikasi</label>
                                <div class="col-md-offset-4 col-md-6">
                                    <textarea class="form-control" name="spesifikasi" id="spesifikasi"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>
    </div>
@endsection
@section('script')
<script>
    Dropzone.autoDiscover = false;
    let imgList = [];
    var dz = new Dropzone("#img", {
        url : "{{ url('api/produk/img') }}",
        addRemoveLinks: true,
        success : response => {
            let img = response.xhr.responseText;
            imgList.push(img);
        }
    });

    dz.on('removedfile', (file) => {
        let index = 0;
        for (var i = imgList.length - 1; i >= 0; i--) {
            if(imgList[i] == file.name){
                imgList.splice(i,1);
            }
            index++;
        }
        return true;
    });

    $('#mainForm').on('submit', () => {
        $('#gambar').val(JSON.stringify(imgList));
    });

    $('#spesifikasi').focusin( () => {
        $("#spesifikasi").ckeditor();
    });
</script>
@endsection
