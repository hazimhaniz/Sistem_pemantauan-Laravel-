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