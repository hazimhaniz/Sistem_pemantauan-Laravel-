@extends('layouts.app')
@include('plugins.datatables')

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            {{ Breadcrumbs::render('admin.menu') }}
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Pengurusan Menu</h3>
                            <p class="small hint-text m-t-5">
                                Pengurusan Menu boleh dilakukan melalui jadual di bawah.
                            </p>
                            <form class="p-t-10" id="form-project" role="form" autocomplete="off" method="post" action="{{ route('admin.menu') }}" novalidate>
                                <div class="form-group-attached">
                                    <div class="row clearfix">
                                         
                                    </div>
                                </div>
                            </form>
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
        <div class="card-header px-0 search-on-button">
            <!-- <div class="card-title">
                <button onclick="add()" class="btn btn-success btn-cons"><i class="fa fa-plus m-r-5"></i> Flow</button>
            </div> -->
            <!-- <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian...">
                </div>
            </div>
            <div class="clearfix"></div> -->
        </div>
        <div class="card-block">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                        <th>Aturan</th>
                        <th>Nama</th>
                        <th>Parent</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<5;$i++): ?>

                <?php endfor ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END card -->
</div>
<!-- END CONTAINER FLUID -->
@endsection
@push('modal')
<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Tambah <span class="bold">Menu</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                 <form id='form-add' role="form" method="post" action="{{ route('admin.menu') }}">

                    @include('components.input', [
                        'name' => 'name',
                        'label' => 'Nama',
                        'mode' => 'required',
                    ])

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Parent</span> <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_parent " data-html="true" data-toggle="tooltip" title="Jika SubMenu"></i></label>
                                <select id="parent_insert" name="parent" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    @foreach($menu_list as $index => $menuparent)
                                    <option value="{{ $menuparent->id }}">{{ $menuparent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Link</span></label>
                                <select id="link_insert" name="link" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    @foreach($link_list as $index => $link)
                                    <option value="{{ $link }}" >{{ $link }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Symbol</span></label>
                                <select id="symbol_insert" name="symbol" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    @foreach($symbol_list as $index => $symbol)
                                    <option value="{{ $symbol }}" >{{ $symbol }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                <label><span>Icon</span></label>
                                <select name="symbol" class="full-width p-t-10 p-b-10">
                                    <option value="" selected="">Pilih.</option>
                                    <@foreach($symbol_list as $index => $symbol)
                                    <option value="{{ $symbol }}"> {{ mb_convert_encoding($unicode[$index], 'UTF-8', 'HTML-ENTITIES') }} {{ $symbol }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="text" name="created_by_user_id" hidden="" value="{{ auth()->user()->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info" onclick="submitForm('form-add')"><i class="fa fa-check m-r-5"></i> Hantar</button>
            </div>
        </div>
    </div>
</div>
@endpush

@push('css')
<style>

    select {
      font-family: fontAwesome
    }

</style>

@endpush

@push('js')

@endpush
