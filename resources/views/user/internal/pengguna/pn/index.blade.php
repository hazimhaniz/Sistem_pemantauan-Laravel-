@extends('layouts.app')
@include('plugins.datatables')

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            {{ Breadcrumbs::render('admin.user.internal.pn') }}
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Pengurusan Pengguna Dalaman Pengarah Negeri</h3>
                            <p class="small hint-text m-t-5">
                                Pengurusan pengguna dalaman boleh dilakukan melalui jadual di bawah.
                            </p>
                            <!-- <div class="p-t-10" id="form-project" role="form" autocomplete="off" novalidate> -->
                            <form class="p-t-10" id="form-project" role="form" autocomplete="off" method="post" action="{{ route('user.internal.pn') }}" novalidate>
                                <div class="form-group-attached">
                                    <div class="row clearfix">

                                        <div class="col-md-4">
                                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                                <label><span>Peranan</span></label>
                                                <select id="role_id" name="role_id" class="full-width autoscroll" data-init-plugin="select2" required="">
                                                    <option value="-1" selected="" >Pilih satu..</option>
                                                    @foreach($roles as $index => $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                                <label><span>Status</span></label>
                                                <select id="status_id" name="status_id" class="full-width autoscroll" data-init-plugin="select2" required="">
                                                    <option value="-1" selected="">Pilih satu..</option>
                                                    @foreach($all_status as $index => $status)
                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- </div> -->
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
                <button onclick="add()" class="btn btn-success btn-cons"><i class="fa fa-plus m-r-5"></i> Pengguna Dalaman</button>
                <button id="" class="btn btn-default btn-sm" type="button">
                    <i class="fa fa-print m-r-5"></i> Cetak
                </button>
                <button id="" class="btn btn-default btn-sm" type="button">
                    <i class="fa fa-download m-r-5"></i> Excel
                </button>
                <button id="" class="btn btn-default btn-sm" type="button">
                    <i class="fa fa-download m-r-5"></i> PDF
                </button>
            </div> -->
            <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian...">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="card-block">
            <table class="table table-responsive table-hover" style="width:100%" id="table">
                <thead>
                    <tr>
                        <th class="fit">Bil.</th>
                        <th>Nama</th>
                        <th>ID Pengguna</th>

                        <!-- <th>Tarikh Daftar</th> -->
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Tambah <span class="bold">Pengguna</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id='form-add' role="form" method="post" action="{{ route('user.internal.pn') }}">
                    @include('components.input', [
                        'label' => 'Nama Penuh',
                        'mode' => 'required',
                        'name' => 'name',
                    ])

                    @include('components.input', [
                        'label' => 'ID Pengguna',
                        'mode' => 'required',
                        'name' => 'username',
                    ])

                    @include('components.input', [
                        'label' => 'Alamat Emel',
                        'mode' => 'required',
                        'name' => 'email',
                        'type' => 'email',
                    ])

                    <div class="form-group-attached m-b-10">
                        <div class="row">
                            <div class="col-md-6">
                                @include('components.input', [
                                    'label' => 'Kata Laluan',
                                    'mode' => 'required',
                                    'name' => 'password',
                                    'type' => 'password',
                                    'options' => 'minlength=8',
                                    'placeholder' => 'Minimum 8 aksara',
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.input', [
                                    'label' => 'Pengesahan Kata Laluan',
                                    'mode' => 'required',
                                    'name' => 'password_confirmation',
                                    'type' => 'password',
                                    'options' => 'minlength=8',
                                    'placeholder' => 'Minimum 8 aksara',
                                ])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                <label><span>Status</span></label>
                                <select id="user_status_id" name="user_status_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                    <option value="" selected="" disabled="">Pilih satu..</option>
                                    @foreach($all_status as $index => $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                <label><span>Peranan</span></label>
                                <select id="roles[]" name="roles[]" class="full-width autoscroll state" data-init-plugin="select2" required="" multiple="">
                                    @foreach($roles as $index => $role)
                                    <option value="{{ $role->name }}">{{ $role->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>




                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info" onclick="submitForm('form-add')"> Simpan</button>
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
    // "serverSide": true,
    "deferRender": true,
    "ajax": "{{ fullUrl() }}",
    "columns": [
        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "username", name: "username", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        // { data: "created_at", name: "created_at", defaultContent: "-" },

        { data: "entity_staff.role.name", name: "entity_staff.role.name", defaultContent: "-" },

        { data: "status.name", name: "status.name", defaultContent: "-",render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 7 ] }
    ],
    "sDom": "B<t><'row'<p i>>",
    "buttons": [
        {
            text: '<i class="fa fa-plus m-r-5"></i> Pengguna Dalaman',
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
    "iDisplayLength": 10
};

table.dataTable(settings);

$("select, input").on('change', function() {

    var form = $("#form-project");

    var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": form.attr('action')+"?"+form.serialize(),
        "columns": [
            { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "username", name: "username", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            // { data: "created_at", name: "created_at", defaultContent: "-" },

            { data: "entity_staff.role.name", name: "entity_staff.role.name", defaultContent: "-" },

            { data: "status.name", name: "status.name", defaultContent: "-",render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "action", name: "action", orderable: false, searchable: false},
        ],
        "columnDefs": [
            { className: "nowrap", "targets": [ 7 ] }
        ],
        "sDom": "B<t><'row'<p i>>",
        "buttons": [
            {
                text: '<i class="fa fa-plus m-r-5"></i> Pengguna Dalaman',
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
        "iDisplayLength": 10
    };

    table.dataTable(settings);
});

// search box for table
$('#search-table').keyup(function() {
    table.fnFilter($(this).val());
});

function passwordUser(id) {
    $("#modal-div").load("{{ route('user.internal.pn') }}/password/"+id);
}

function edit(id) {
    $("#modal-div").load("{{ route('user.internal.pn') }}/"+id);
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
            swal(data.title, data.message);
            $("#modal-add").modal("hide");
            table.api().ajax.reload(null, false);
        }
    });
});



function remove(id) {

swal({
    title: "",
    text: "Adakah anda pasti ?",
    type: "",
    showCancelButton: true,
    confirmButtonClass: "btn-outline green-meadow",
    cancelButtonClass: "btn-danger",
    confirmButtonText: "Tidak",
    cancelButtonText: "Ya",
    closeOnConfirm: true,
    closeOnCancel: false,
},
function(isConfirm) {
    if (isConfirm) {
        
    } else {
        $.ajax({
            url: '{{ route('user.internal.pn') }}/'+id,
            method: 'delete',
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                swal(data.title, data.message);
                table.api().ajax.reload(null, false);
                $('.cancel').removeClass('btn-default');
            }
        });
    }
});
}


</script>
@endpush
