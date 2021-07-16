@extends('layouts.app')
@include('plugins.datatables')

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            {{ Breadcrumbs::render('admin.form') }}
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Pengurusan Borang</h3>
                            <p class="small hint-text m-t-5">
                                Pengurusan Borang boleh dilakukan melalui jadual di bawah.
                            </p>
                            <form class="p-t-10" id="form-project" role="form" autocomplete="off" method="post" action="{{ route('admin.form') }}" novalidate>
                                <div class="form-group-attached">
                                    <div class="row clearfix">
                                        <div class="col-md-9">
                                            <div class="form-group form-group-default required form-group-default-select2 form-group-default-custom required">
                                                <label>Jenis Modul</label>
                                                <select  id="filter_module_id" name="filter_module_id" class="full-width autoscroll select-modal" data-init-plugin="select2" required >
                                                    <!-- <option disabled hidden selected>Pilih satu</option> -->
                                                    @foreach($all_module as $module)
                                                        <option module_name="{{ $module->name }}" value="{{ $module->id }}"
                                                            >{{ $module->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <div class="form-group form-group-default form-group-default-select2">
                                                <label>Proses</label>
                                                <select name="process" class="full-width" data-init-plugin="select2">
                                                    <option value="">-- Semua Proses --</option>
                                                    <option value=1>Dalam Proses</option>
                                                    <option value=2>Lulus</option>
                                                    <option value=3>Tidak Lulus</option>
                                                </select>
                                            </div>
                                        </div> -->
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
                        <th>Bil</th>
                        <th>Nama Pemohon</th>
                        <th>Tarikh Pendaftaran</th>
                        <th>Status</th>
                        <th>No Rujukan</th>
                        <th>Surat / Laporan</th>
                        <th>Holder</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END card -->
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
                    @if(auth()->user()->hasRole('pphq'))
                    <!-- Need to change to affidavit.report and add affidavit->id -->
                    <a href="{{ route('affidavit') }}" class="btn btn-primary mt-4"><i class="fa fa-edit mr-1 text-capitalize"></i> Laporan</a>
                    @endif
                    @if(auth()->user()->hasRole('pthq'))
                    <button onclick="statusData(1)" class="btn btn-primary mt-4"><i class="fa fa-spinner mr-1"></i> Kemaskini Status</button>
                    @endif
                    @if(auth()->user()->hasRole('pkpp'))
                    <button onclick="queryData(1)" class="btn btn-warning mt-4"><i class="fa fa-question mr-1"></i> Kuiri</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endpush
@push('js')
<script type="text/javascript">
var table = $('#table');

var settings = {
    "processing": true,
    "serverSide": true,
    "deferRender": true,
    "ajax": "{{ fullUrl() }}",
    "columns": [
        { data: 'index', defaultContent: '', "width": "5%", orderable: false, searchable: false, render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: "applicant", name: "applicant", "width": "5%", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "applied_at", name: "applied_at", "width": "5%", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "status", name: "status", "width": "5%", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "reference_no", name: "reference_no", "width": "5%", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "letter", name: "letter", "width": "5%", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "holder", name: "holder", "width": "5%", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 3 ] }
    ],
    "sDom": "B<t><'row'<p i>>",
    "buttons": [
        {
				text: '<i class="fa fa-print text-info"></i>',
				extend: 'print',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-excel text-success"></i>',
				extend: 'excelHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-pdf text-danger"></i>',
				extend: 'pdfHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
    ],
    "destroy": true,
    "scrollCollapse": true,
    "oLanguage": {
        "sEmptyTable":      "Tiada data",
        "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
        "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
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
    "iDisplayLength": -1
};

table.dataTable(settings);

$('#module_id').val($('select#filter_module_id').val());
$('#module_name').text($('select#filter_module_id#filter_module_id option:selected').attr('module_name'));

$("select#filter_module_id").on('change', function() {
    var form = $("#form-project");

    $('#module_id').val($(this).val());
    $('#module_name').text($('select#filter_module_id option:selected').attr('module_name'));

    settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": form.attr('action')+"?"+form.serialize(),
        "columns": [
            { data: 'index', defaultContent: '', "width": "5%", orderable: false, searchable: false, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            { data: "applicant", name: "applicant", "width": "5%", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "applied_at", name: "applied_at", "width": "5%", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "status", name: "status", "width": "5%", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "reference_no", name: "reference_no", "width": "5%", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "letter", name: "letter", "width": "5%", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "holder", name: "holder", "width": "5%", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "action", name: "action", orderable: false, searchable: false},
        ],
        "columnDefs": [
            { className: "nowrap", "targets": [ 3 ] }
        ],
        "sDom": "B<t><'row'<p i>>",
        "buttons": [
            {
				text: '<i class="fa fa-print text-info"></i>',
				extend: 'print',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-excel text-success"></i>',
				extend: 'excelHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-pdf text-danger"></i>',
				extend: 'pdfHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
        ],
        "destroy": true,
        "scrollCollapse": true,
        "oLanguage": {
            "sEmptyTable":      "Tiada data",
            "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
            "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
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

// search box for table
$('#search-table').keyup(function() {
    table.fnFilter($(this).val());
});

function edit(id) {
    $("#modal-div").load("{{ route('admin.flow') }}/"+id);
}

function add() {
    $('#modal-add').modal('show');
    $('.modal form').trigger("reset");
    $('.modal form').validate();
}

$("#form-add").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid())
       return;

    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: new FormData(form[0]),
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
            swal(data.title, data.message, data.status);
            $("#modal-add").modal("hide");
            table.api().ajax.reload(null, false);
        }
    });
});

function remove(id) {
    swal({
        title: "Padam Data",
        text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
        icon: "warning",
        buttons: ["Batal", { text: "Padam", closeModal: false }],
        dangerMode: true,
    })
    .then((confirm) => {
        if (confirm) {
            $.ajax({
                url: '{{ route('admin.flow') }}/'+id,
                method: 'delete',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal(data.title, data.message, data.status);
                    table.api().ajax.reload(null, false);
                }
            });
        }
    });
}

function viewData(id) {
    $("#modal-view").modal("show");
}

function viewFlow(filing_type, filing_id) {
    var data = $.param({
        filing_type: filing_type,
        filing_id: filing_id
    }, true);

    $("#modal-div").load("{{ route('general.getFlowDetails') }}?" + data);
}


</script>
@endpush
