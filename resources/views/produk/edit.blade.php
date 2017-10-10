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
                        <form action="{{ url('produk/'.$data->id) }}" class="form-horizontal" method="POST" id="mainForm">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="gambar" id="gambar">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="merk_id">Merk</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="merk_id">
                                        <option>Select</option>
                                        @foreach($merks as $merk)
                                            @if($merk->id == $data->merk_id)
                                            <option selected value="{{ $merk->id }}">{{ $merk->nama }}</option>
                                            @else
                                            <option value="{{ $merk->id }}">{{ $merk->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nama">Nama</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nama" id="nama" value="{{ $data->nama }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nama">Harga</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="harga" id="harga" value="{{ $data->harga }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nama">Spesifikasi</label>
                                <div class="col-md-offset-4 col-md-6">
                                    <textarea class="form-control" name="spesifikasi" id="spesifikasi">{{ $data->spesifikasi }}</textarea>
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
    let imgList = {!! $data->gambar !!};
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

    initDropzone();
    function initDropzone() {
        let gambar = {!! $data->gambar !!};
        for (let i = 0; i < gambar.length; i++) {
            let mockFile = {
                name: gambar[i],
                size: 1,
                type: 'image/jpeg',
                status: Dropzone.ADDED,
                url: "{{ asset('storage/images/') }}"+gambar[i]
            };
            dz.emit("addedfile", mockFile);
            dz.emit("thumbnail", mockFile, "{{ asset('storage/images/') }}/"+gambar[i]);
            dz.files.push(mockFile);
        }
    }

    function findJson(json,index,val) {
        for (var i = json.length - 1; i >= 0; i--) {
            if(json[i]['index'] == val){
                return i;
            }
        }
        return -1;
    }

    $('#mainForm').on('submit', () => {
        $('#gambar').val(JSON.stringify(imgList));
    });

    $('#spesifikasi').focusin( () => {
        $("#spesifikasi").ckeditor();
    });
</script>
@endsection

@section('style')

@endsection
