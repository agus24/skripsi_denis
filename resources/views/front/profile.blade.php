@extends('front.layouts.app')

@section('content')
<div class="container">
    @if(!$edit)
    <table class="table table-responsive">
        <tr>
            <td>Nama</td>
            <td>{{ $user->nama }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>{{ $user->alamat }}</td>
        </tr>
        <tr>
            <td>Telp</td>
            <td>{{ $user->telp }}</td>
        </tr>
    </table>
    <a href="{{ url('user/profile/edit') }}" class="btn btn-success btn-block">Edit</a>
    @else
        <form action="{{ url('user/profile') }}" method="POST">
            {{ csrf_field() }}
                <div class="form-group {{ $errors->has('email')? 'has-error' :'' }}">
                    <label>Email</label>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" readonly style="color:white">
                </div>
                <div class="form-group {{ $errors->has('password')? 'has-error' :'' }}">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('password_confirmation')? 'has-error' :'' }}">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('nama')? 'has-error' :'' }}">
                    <label>Nama</label>
                    <input type="text" value="{{ $user->nama }}" name="nama" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('alamat')? 'has-error' :'' }}">
                    <label>Alamat</label>
                    <input type="text" value="{{ $user->alamat }}" name="alamat" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('telp')? 'has-error' :'' }}">
                    <label>Telp</label>
                    <input type="text" value="{{ $user->telp }}" name="telp" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block">Submit</button>
                </div>
        </form>
        <br>
    @endif
</div>
@endsection
