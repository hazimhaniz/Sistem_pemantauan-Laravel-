@extends('layouts.app')
@include('plugins.wizard')
@include('plugins.dropzone')

@section('content')
    <!-- START JUMBOTRON -->
    <div class="jumbotron m-b-0" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Pengurusan Pengguna</a></li>
                    <li class="breadcrumb-item active">Environmental Officer</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 ">
                        <!-- START card -->
                        <div class="card card-transparent">
                            <div class="card-block p-t-0">
                                <h3 class='m-t-0'>Pengurusan Pengguna: Environmental Officer</h3>
                            </div>
                        </div>
                        <!-- END card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="rootwizard">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist">
            <li class="nav-item ml-md-3">
                <a class="active p-l-40" data-toggle="tab" href="#tab1" data-target="#tab1" role="tab"><span>Perlu Pengesahan</span></a>
            </li>
            <li class="nav-item ml-md-3">
                <a class="" data-toggle="tab" href="#tab2" data-target="#tab2" role="tab">Sudah Disahkan</a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- START CONTAINER FLUID TAB1 -->
            <div class="tab-pane active slide-right" id="tab1">
                @include('pegawai.pengguna.eo.belum')
            </div>
            <!-- END CONTAINER FLUID TAB1 -->

            <!-- START CONTAINER FLUID TAB2 -->
            <div class="tab-pane slide-right" id="tab2">
                @include('pegawai.pengguna.eo.dah')
            </div>
            <!-- END CONTAINER FLUID TAB2 -->
        </div>

    </div>

@endsection

@push('js')
    <script type="text/javascript">

    </script>
@endpush