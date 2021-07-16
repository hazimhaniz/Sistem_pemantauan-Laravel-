@extends('layouts.app')
@include('plugins.dropzone')
@section('content')

<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Pendaftaran Kumpulan</a></li>
                <li class="breadcrumb-item active">Penggerak Projek (PP)</li>
            </ol>
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Penggerak Projek (PP)</h3>
                            <p class="small hint-text m-t-5">
                                <p class="hint-text">Pengurusan pendaftaran sub Penggerak Projek perlu dilaksanakan di ruangan bawah ini.</p>
                                <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> PDF</button> -->
                                <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> Excel</button> -->
                                <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-print m-r-5"></i> Cetak</button> -->
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
        <div class="card-header px-0">
            <div class="card-title">
                <button onclick="addData()" class="btn btn-success btn-cons"><i class="fa fa-plus m-r-5"></i>Pendaftaran Baharu PP</button>
            </div>
            <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian...">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="card-block table-responsive">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                        <th class="bold">No.</th>
                        <th class="bold">Nama</th>
                        <th class="bold">No Kad Pengenalan <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="No kad pengenalan akan digunakan sebagai ID untuk log masuk ke dalam sistem"></i></th>
                        <th class="bold">E-Mel</th>
                        <th class="bold">Status</th>
                        <th class="bold">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td style="text-align: center">Tew Kok Heng</td>
                        <td>889098909876</td>
                        <td>E-Mel: tew@email.com</td>
                        <td><span class="badge badge-success">Baru</span></td>
                        <td>
                            <!-- <a href="javascript:;" class="btn btn-default btn-xs mb-1" onclick="passwordData(1)"><i class="fa fa-key mr-1"></i> Tukar Katalaluan</a><br> -->
                            <a href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a><br>
                            <a href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END card -->
</div>
<!-- END CONTAINER FLUID -->


<!-- START Modal Add Data-->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Pendaftaran Baharu <span class="bold">Penggerak Projek</span></h5>
                <small class="text-muted m-b-20">Sila isi ruangan di bawah bagi sub Penggerak Projek.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

               @include('components.input', [
                'label' => 'Penggerak Projek',
                'mode' => 'required',
                'name' => 'name',
                'id' => 'name'
                ])

                @include('components.input', [
                'label' => 'No Kad Pengenalan',
                'info' => 'Pastikan no kad pengenalan yang dimasukkan adalah milik pemaju projek. No Kad Pengenalan ini akan digunakan sebagai ID untuk log masuk ke dalam sistem',
                'mode' => 'required',
                'name' => 'username',
                'id' => 'username'
                ])

               @include('components.input', [
                'label' => 'E-Mel',
                'mode' => 'required',
                'name' => 'email',
                'id' => 'email'
                ])

                @include('components.input', [
                    'label' => 'Kata Laluan',
                    'id' => 'password',
                    'info' => 'Kata laluan ini perlulah sekurang-kurangnya sepanjang 8 aksara dan mengandungi kombinasi angka, huruf, aksara khas (!@#$%^&*)',
                    'mode' => 'required',
                    'name' => 'password',
                    'type' => 'password',
                    'options' => 'minlength=8',
                    'placeholder' => 'Minima 8 aksara',
                ])

                @include('components.input', [
                    'label' => 'Pengesahan Kata Laluan',
                    'info' => 'Masukkan kata laluan yang sama',
                    'mode' => 'required',
                    'name' => 'password_confirmation',
                    'id' => 'password_confirmation',
                    'type' => 'password',
                    'options' => 'minlength=8',
                    'placeholder' => 'Minima 8 aksara',
                ])

                    <div class="modal-footer">
                        <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check" type="button">
                            <span>Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal Add Data-->

        @endsection