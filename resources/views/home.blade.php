@extends('layouts.app')
@section('content')
<!-- BEGIN HEADER-->

<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">

                    <!-- BEGIN ALERT - REVENUE -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body no-padding">
                                <a href="{{ url('/laporan/penjualan') }}">
                                    <div class="alert alert-callout alert-info no-margin">
                                        <strong class="text-xl">Laporan Penjualan</strong><br/>
                                    </div>
                                </a>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ALERT - REVENUE -->

                    <!-- BEGIN ALERT - TIME ON SITE -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body no-padding">
                                <a href="{{ url('/laporan/user') }}">
                                    <div class="alert alert-callout alert-success no-margin">
                                        <strong class="text-xl">Laporan User</strong><br/>
                                    </div>
                                </a>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ALERT - TIME ON SITE -->

                </div><!--end .row -->
            </div><!--end .section-body -->
        </section>
    </div><!--end #content-->

</div><!--end #base-->
<!-- END BASE -->
@endsection
