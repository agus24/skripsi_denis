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
                    <div class="panel-heading">Tambah User</div>
                    <div class="panel-body">
                        <a href="{{ url('admin/user') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ url('admin/user/'.$data->id) }}" class="form-horizontal" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label" disabled label-for="username">Username</label>
                                <div class="col-md-6">
                                    <input type="text" name="username" class="form-control" value="{{ $data->username }}">
                                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label" label-for="password">Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control" >
                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label" label-for="password_confirmation">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="password_confirmation" class="form-control">
                                    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label" disabled label-for="email">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label" label-for="name">Nama</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" value="{{ $data->name }}">
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
