@extends('layouts.app')

@section('login')
<br>
<br>
<section class="section-account">
    <div class="card contain-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <br/>
                    <span class="text-lg text-bold text-primary"> Login</span>
                    <br/><br/>
                    <form class="form floating-label" action="{{ route('login') }}" accept-charset="utf-8" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <label for="password">Password</label>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <button class="btn btn-primary btn-raised" type="submit">Login</button>
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </form>
                </div><!--end .col -->
            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>
@endsection
