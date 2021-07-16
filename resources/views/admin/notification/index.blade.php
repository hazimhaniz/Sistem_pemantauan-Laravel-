@extends('layouts.app')
@include('plugins.datatables')

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            {{ Breadcrumbs::render('admin.notification') }}
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Pengurusan Notifikasi</h3>
                            <p class="small hint-text m-t-5">
                                Pengurusan notifikasi boleh dilakukan melalui jadual di bawah. Notifikasi sistem akan dihantar ke Menu Inbox Notifikasi pengguna emel yang berdaftar, Notifikasi emel boleh dikawal dari jadual di bawah.
                            </p>
                        </div>
                    </div>
                    <!-- END card -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->

<!-- START CONTAINER FLUID -->
<div class=" container-fluid container-fixed-lg bg-white">
<div class="col-md-12">
    <span class="float-right">
        <button type="button" data-action="{{ route('admin.notification.create') }}" class="btn btn-default btn-xs" onClick="getModalContent(this)">
            <span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
                <i class="fa fa-plus text-success"></i> &nbsp; <span style="color:blue;">NOTIFIKASI BAHARU</span>
            </span>
        </button>
    </span>
</div>
    <!-- START card -->
    <div class="card card-transparent">
        <div class="card-block">
            @include('admin.notification.datatable')
        </div>
    </div>
    <!-- END card -->
</div>
<!-- END CONTAINER FLUID -->
@endsection