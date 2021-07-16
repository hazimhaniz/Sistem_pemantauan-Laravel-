@extends('layouts.app')
@include('plugins.wizard')
@include('plugins.dropzone')
@include('plugins.datatables')
@include('plugins.dropify')

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron m-b-0" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Pengesahan Projek</a></li>
                <li class="breadcrumb-item active">Projek</li>
            </ol>
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Pendaftaran Projek</h3>
                            <p class="hint-text m-t-5">Pendaftaran Projek-Projek Yang Tertakluk Kepada EIA</p>
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
            <a class="active p-l-40" data-toggle="tab" href="#tab1" data-target="#tab1" role="tab"><span>Maklumat Projek</span></a>
        </li>
        <li class="nav-item ml-md-3">
            <a class="" data-toggle="tab" href="#tab2" data-target="#tab2" role="tab">EMP</a>
        </li>
        <li class="nav-item ml-md-3">
            <a class="" data-toggle="tab" href="#tab3" data-target="#tab3" role="tab">LDP2M2</a>
        </li>
        <li class="nav-item ml-md-3">
            <a class="" data-toggle="tab" href="#tab4" data-target="#tab4" role="tab">Pendaftaran Syarat EIA</a>
        </li>
        <li class="nav-item ml-md-3">
            <a class="" data-toggle="tab" href="#tab4" data-target="#tab5" role="tab">Audit Alam Sekeliling</a>
        </li>
            <!-- <li class="nav-item ml-md-3">
                <a class="" data-toggle="tab" href="#tab5" data-target="#tab5" role="tab">Maklumat Pengawasan</a>
            </li> -->
        </ul>

        <div class="tab-content">
            <!-- START CONTAINER FLUID TAB1 -->
            <div class="tab-pane active slide-right" id="tab1">
                @include('pengesahanprojek.projek.maklumatprojek')
            </div>
            <!-- END CONTAINER FLUID TAB1 -->

            <!-- START CONTAINER FLUID TAB2 -->
            <div class="tab-pane slide-right" id="tab2">
                @include('pengesahanprojek.projek.emp')
            </div>
            <!-- END CONTAINER FLUID TAB2 -->

            <!-- START CONTAINER FLUID TAB3 -->
            <div class="tab-pane slide-right" id="tab3">
                @include('pengesahanprojek.projek.ldp2m2')
            </div>
            <!-- END CONTAINER FLUID TAB3 -->

            <!-- START CONTAINER FLUID TAB4 -->
            <div class="tab-pane slide-right" id="tab4">
                @include('pengesahanprojek.projek.audit')
            </div>
            <!-- END CONTAINER FLUID TAB4 -->

            <!-- START CONTAINER FLUID TAB5 -->
            <div class="tab-pane slide-right" id="tab5">
                @include('pengesahanprojek.projek.pengawasan')
            </div>
            <!-- END CONTAINER FLUID TAB5 -->

        </div>

    </div>

    <!-- START MODAL -->
    <!-- END MODAL -->

    @endsection

    @push('js')
    <script type="text/javascript">
        $('#submit').click(function(){
            swal("", "Pendaftaran projek berjaya dilakukan.")
        });
    </script>
    @endpush