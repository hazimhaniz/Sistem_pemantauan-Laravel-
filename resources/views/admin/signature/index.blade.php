@extends('layouts.app')
@include('plugins.datatables')
@include('plugins.dropify')

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            {{ Breadcrumbs::render('admin.signature') }}
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Pengurusan Tandatangan </h3>
                            <p class="small hint-text m-t-5">
                                Pengurusan Tandatangan boleh dilakukan melalui jadual di bawah.
                            </p>
                            <form class="p-t-10" id="form-project" role="form" autocomplete="off" method="post" action="{{ route('admin.signature') }}" novalidate>
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
                        <th class="fit">Bil</th>
                        <th>Nama</th>
                        <th>Tandatangan</th>
                        <th>Peranan</th>
                        <th>Status</th>
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
<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Tambah <span class="bold"> Tandatangan</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id='form-add' role="form" method="post" action="{{ route('admin.signature') }}">

                    @include('components.bs.input', [
                        'name' => 'name',
                        'label' => 'Nama Di Tandatangan',
                        'mode' => 'required',
                    ])

                    @include('components.bs.input', [
                        'name' => 'role_bm',
                        'label' => 'Peranan Di Tandatangan',
                        'mode' => 'required',
                    ])

                    <div class="form-group row">
                        <label for="user_id" class="col-md-3 control-label">
                            Pemunya Tandatangan
                        </label>
                        <div class="col-md-9">
                            <select id="user_id_insert" name="user_id" data-placeholder="Pilihan" class="full-width autoscroll" data-init-plugin="select2" required>
                                <option selected>Pilih..</option>

                                @foreach($user as $index => $value)
                                <option value="{{ $value->user->id }}">{{ $value->user->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status_insert" class="col-md-3 control-label">
                            Status <span style="color:red;">*</span></label>
                        </label>
                        <div class="col-md-9">
                            <select id="status_insert" name="status" data-placeholder="Pilihan" class="full-width autoscroll" data-init-plugin="select2" required>
                                <option disabled hidden selected>Pilih..</option>
                                <option value=1>Aktif</option>
                                <option value=0>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label id="label_copyright" for="copyright" class="col-md-12 control-label">Gambar <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                                <input type="file" class="dropify" name="picture" data-default-file="" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M"/>
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

@push('js')
<script type="text/javascript">

$('.dropify').dropify();

var table = $('#table');

var settings = {
    "processing": true,
    "serverSide": true,
    "deferRender": true,
    "ajax": "{{ fullUrl() }}",
    "columns": [
        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: "name", name: "name", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "picture", name: "picture", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "role_bm", name: "role_bm", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        // { data: "role_bi", name: "role_bi", render: function(data, type, row){
        //     return $("<div/>").html(data).text();
        // }},
        { data: "status", name: "status", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 4 ] }
    ],
    "sDom": "B<t><'row'<p i>>",
    "buttons": [
        {
            text: '<i class="fa fa-plus m-r-5"></i> Tandatangan',
            className: 'btn btn-success btn-cons',
            action: function ( e, dt, node, config ) {
                add();
            }
        },
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

// search box for table
$('#search-table').keyup(function() {
    table.fnFilter($(this).val());
});

function edit(id) {
    $("#modal-div").load("{{ route('admin.signature') }}/"+id);
}

function add() {
    $('#modal-add').modal('show');
    $('.modal form').trigger("reset");
    $('.modal form').validate();
}

$("#form-add").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    $('#form-add').each(function () {
        if ($(this).data('validator'))
            $(this).data('validator').settings.ignore = ".note-editor *";
    });

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
                url: '{{ route('admin.signature') }}/'+id,
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
</script>
@endpush
