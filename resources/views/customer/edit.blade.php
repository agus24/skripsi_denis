@extends('layouts.app')

@section('content')
<br>
<br>
<div id="base">
    <div id="content">
        <section>
        <div class="row">
            <div class=" col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Ubah Customer</div>
                    <div class="panel-body">
                        <a href="{{ url('/customer') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ url('customer/'.$data->id) }}" class="form-horizontal" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label" label-for="name">Nama</label>
                                <div class="col-md-6">
                                    <input type="text" name="nama" class="form-control" readonly value="{{ $data->nama }}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label" for="name">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" readonly value="{{ $data->email }}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label" for="name">Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control">
                                    <p class="help-block">Kosongkan jika tidak ingin mengubah password</p>
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label" for="name">Alamat</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="alamat">{{ $data->alamat }}</textarea>
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('telp') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label" for="name">Telp</label>
                                <div class="col-md-6">
                                    <input type="text" name="telp" class="form-control" readonly value="{{ $data->telp }}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
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
