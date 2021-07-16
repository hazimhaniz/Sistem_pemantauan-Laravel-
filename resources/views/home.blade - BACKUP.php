@extends('layouts.app')
@include('plugins.datatables')

@push('css')
<style type="text/css">
    .widget-9 {
        height: unset !important;
        padding-bottom: 20px;
        padding-top: 20px;
    }

    .text-black {
        color: #000 !important;
    }

    x-small {
        font-size: medium !important;
    }

    .modal-open .select2-container {
        z-index: unset !important;
    }
</style>
@endpush

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <div class="row">
                <ol class="breadcrumb col-md-4 p-l-15">
                    <li class="breadcrumb-item active"><a>@lang('sidebar.home')</a></li>
                </ol>
                
            </div>
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->

<!-- START CONTAINER FLUID -->
<div class=" container-fluid container-fixed-lg">

    <?php
        setlocale(LC_TIME, "ms", "my_MS", "ms_MY");
    ?>

    <h3>@lang('general.welcome'), {{ auth()->user()->name }}</h3>
    @if(auth()->user()->last_login_date)
    <p>@lang('general.last_logged_at') {{ strftime("%e %B %Y %I:%M:%S %p", strtotime(auth()->user()->last_login_date)) }}.</p>
    @endif
    <div class="clearfix"></div>

    @if(!optional(auth()->user()->entity)->industry_type_id)
   <!--  <div class="alert alert-danger">
        <strong>Perhatian:</strong>
        Sila lengkapkan borang manual sebelum mengisi borang online
    </div> -->
    @endif

    <div class="row">
        <div class="col-md-12">

            <div class="widget-12 card no-border widget-loader-circle no-margin padding-30">
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>@lang('general.review') <span class="bold">@lang('general.application_status')</span></h4>
                                </div>
                                @if(auth()->user()->hasAnyRole(['union','federation']))
                                <div class="col-md-12">
                                    <div>
                                        <form class="p-t-10" id="form-project" role="form" autocomplete="off" method="post" action="{{ route('home.list') }}" novalidate>
                                            <div class="form-group-attached">
                                                <div class="row clearfix">
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-default form-group-default-select2" aria-required="true">
                                                            <label>Sesi</label>
                                                            <select id="tenure_id" name="tenure_id" class="full-width autoscroll" data-init-plugin="select2">
                                                                <option value="-1" selected>-- Semua Sesi --</option>
                                                                @foreach($tenures as $tenure)
                                                                <option value="{{ $tenure->id }}">{{ $tenure->start_year }} - {{ $tenure->end_year }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default form-group-default-select2" aria-required="true">
                                                            <label>Jenis Modul / Borang</label>
                                                            <select id="module_id" name="module_id" class="full-width autoscroll" data-init-plugin="select2">
                                                                <option value="-1" selected>-- Semua Jenis --</option>
                                                                @foreach($modules as $module)
                                                                <option value="{{ $module->id }}">{{ $module->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-default form-group-default-select2" aria-required="true">
                                                            <label>Status</label>
                                                            <select id="status_id" name="status_id" class="full-width autoscroll" data-init-plugin="select2">
                                                                <option value="-1" selected>-- Semua Status --</option>
                                                                @foreach($statuses as $status)
                                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-hover m-t-20" id="table-filings">
                                        <thead>
                                            <tr>
                                                <th class="fit">@lang('general.no').</.</th>
                                                <th>@lang('general.modules')</th>
                                                <th>@lang('general.form')</th>
                                                <!-- <th>Perlu Hantar Dalam Masa</th> -->
                                                <th>@lang('general.application_date')</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <hr class="d-sm-block d-md-none">
                            <div class="widget-12-search">
                                <h4 class="pull-left">@lang('general.display')
                                    <span class="bold">@lang('general.announcement')</span>
                                </h4>
                                <div class="clearfix"></div>
                            </div>
                            <div class="company-stat-boxes" style="max-height: 400px; overflow-y: auto;">
                                @forelse($announcements as $announcement)
                                <div data-index="0" class="company-stat-box m-t-15 active padding-20 bg-master-lightest">
                                    <div>
                                        <p class="company-name pull-left text-uppercase bold no-margin">
                                            {{ $announcement->title }}
                                        </p>
                                        <div class="clearfix"></div>
                                        <small class="hint-text">{{ $announcement->description }}</small>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="m-t-10">
                                        <p class="pull-left small hint-text no-margin p-t-5">{{ date('d/m/Y h:i A', strtotime($announcement->created_at)) }}</p>
                                        <div class="pull-right">
                                            <span class=" label label-{{ $announcement->type->label }} p-t-5 m-l-5 p-b-5 inline fs-12">{{ $announcement->type->name }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                @empty
                                <div data-index="0" class="company-stat-box m-t-15 active padding-20 bg-master-lightest">
                                    <span>@lang('general.no_announcement_has_been_made')</span>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END CONTAINER FLUID -->
@endsection
@push('modal')
<div class="modal fade slide-up show" id="modal-view" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left" style="background-color: #f3f3f3;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Maklumat <span class="semi-bold">Permohonan Kesatuan Sekerja</span></h5>
                    <p class="p-b-10">Semua maklumat berkenaan permohonan tersebut telah dipaparkan dalam bentuk kronologi dibawah</p>

                    <div class="pb-3">
                        Nama Kesatuan: <a onclick="openModalKS()" href="javascript:;" class="text-complete bold">Kesatuan Unijaya</a ></span><br>
                        Tarikh Penubuhan: <strong>19/01/2018</strong><br>
                        Nama Setiausaha: <strong>Adlan Arif Zakaria</strong>
                    </div>
                </div>
                <div class="modal-body pt-3">
                    @include('sample.timeline.b')
                </div>
                <div class="modal-footer" style="background-color: #f3f3f3;">
                    <button type="button" class="btn btn-secondary mt-4" data-dismiss="modal">Tutup</button>
                    @if(auth()->user()->hasAnyRole(['ptw','pthq']))
                    <button onclick="acceptData(1)" class="btn btn-info mt-4"><i class="fa fa-check mr-1"></i> Terima Dokumen Fizikal</button>
                    @endif
                    @if(auth()->user()->hasAnyRole(['ks','ppw','pphq']))
                    <a href="{{ route('formb') }}" class="btn btn-primary mt-4"><i class="fa fa-edit mr-1 text-capitalize"></i> Kemaskini Borang</a>
                    @endif
                    @if(auth()->user()->hasRole('pthq'))
                    <button onclick="categoryData(1)" class="btn btn-primary mt-4"><i class="fa fa-edit mr-1"></i> Kemaskini Kategori</button>
                    @endif
                    @if(auth()->user()->hasAnyRole(['ppw', 'pphq','pw', 'pkpg', 'kpks']))
                    <button onclick="queryData(1)" class="btn btn-warning mt-4"><i class="fa fa-question mr-1"></i> Kuiri</button>
                    @endif
                    @if(auth()->user()->hasAnyRole(['ppw','pw', 'pphq', 'pkpg']))
                    <button onclick="commentData(1)" class="btn btn-warning mt-4"><i class="fa fa-comment mr-1"></i> Ulasan/Syor</button>
                    @endif
                    @if(auth()->user()->hasRole('kpks'))
                    <button onclick="processData(1)" class="btn btn-success mt-4"><i class="fa fa-spinner mr-1"></i> Proses</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endpush
@push('js')
<script>

var table = $('#table-filings');

var settings = {
    "processing": true,
    "serverSide": true,
    "deferRender": true,
    "ajax" : "{{ route('home.list') }}",
    "columns": [
        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: "module", name: "module", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "form_id", name: "form_id", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "created_at", name: "created_at"},
        { data: "status", name: "status", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 3 ] }
    ],
    "sDom": "<t><'row'<p i>>",
    "destroy": true,
    "scrollCollapse": true,
    "oLanguage": {
        "sEmptyTable":      "{{trans('general.no_data')}}",
        "sInfo":            "{{ trans('general.showing') }} dari _START_ hingga _END_ dari _TOTAL_ rekod",
        "sInfoEmpty":       "{{ trans('general.showing') }} 0 {{ trans('general.to') }} 0 {{ trans('general.from') }} 0 {{ trans('general.record') }}",
        "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
        "sInfoPostFix":     "",
        "sInfoThousands":   ",",
        "sLengthMenu":      "{{ trans('general.showing') }} _MENU_ rekod",
        "sLoadingRecords":  "Diproses...",
        "sProcessing":      "Sedang diproses...",
        "sSearch":          "Carian:",
       "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
       "oPaginate": {
           "sFirst":        "Pertama",
           "sPrevious":     "Sebelum",
           "sNext":         "Seterusnya",
           "sLast":         "Akhir"
       },
       "oAria": {
           "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
           "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
       }
    },
    "iDisplayLength": 10
};

table.dataTable(settings);

$("select").on('change', function() {
    var form = $("#form-project");

    settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax" : form.attr('action')+"?"+form.serialize(),
        "columns": [
            { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            { data: "reference", name: "reference", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            // { data: "deadline", name: "deadline"},
            { data: "filing.created_at", name: "filing.created_at"},
            { data: "filing.status.name", name: "filing.status.name", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
        ],
        "columnDefs": [
            { className: "nowrap", "targets": [ 3 ] }
        ],
        "sDom": "<t><'row'<p i>>",
        "destroy": true,
        "scrollCollapse": true,
        "oLanguage": {
            "sEmptyTable":      "{{trans('general.no_data')}}",
            "sInfo":            "{{ trans('general.showing') }} dari _START_ hingga _END_ dari _TOTAL_ rekod",
            "sInfoEmpty":       "{{ trans('general.showing') }} 0 hingga 0 dari 0 rekod",
            "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
            "sInfoPostFix":     "",
            "sInfoThousands":   ",",
            "sLengthMenu":      "Papar _MENU_ rekod",
            "sLoadingRecords":  "Diproses...",
            "sProcessing":      "Sedang diproses...",
            "sSearch":          "Carian:",
           "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
           "oPaginate": {
               "sFirst":        "Pertama",
               "sPrevious":     "Sebelum",
               "sNext":         "Seterusnya",
               "sLast":         "Akhir"
           },
           "oAria": {
               "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
               "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
           }
        },
        "iDisplayLength": 10
    };

    table.dataTable(settings);
});

// function viewData(id) {
//     //super complex code here
// }

function viewData(id) {
    $("#modal-view").modal("show");
}
</script>
@endpush
