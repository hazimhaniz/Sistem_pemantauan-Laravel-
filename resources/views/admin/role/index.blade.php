@extends('layouts.app')
@include('plugins.datatables')
<style>
</style>
@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            {{ Breadcrumbs::render('admin.role') }}
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Pengurusan Peranan</h3>
                            <p class="small hint-text m-t-5">
                                Pengurusan peranan boleh dilakukan melalui jadual di bawah.
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
        <div class="card-header px-0 search-on-button">
            <!-- <div class="card-title">
                <button onclick="add()" class="btn btn-success btn-cons"><i class="fa fa-plus m-r-5"></i> Peranan</button>
            </div> -->
            <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian...">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="card-block">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                        <th class="fit">Bil.</th>
                        <th>Nama Peranan</th>
                        <th>Penerangan</th>
                        <th>Tarikh</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END card -->
</div>
<!-- END CONTAINER FLUID -->


<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Tambah <span class="bold">Peranan</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id='form-role-add' role="form" method="post" action="{{ route('admin.role') }}">
                    @include('components.input', [
                        'name' => 'name',
                        'label' => 'Nama Peranan',
                        'mode' => 'required',
                        'value' => ''
                    ])

                    @include('components.textarea', [
                        'name' => 'description',
                        'label' => 'Penerangan',
                        'mode' => 'required',
                        'value' => ''
                    ])

                    @component('components.label', [
                        'name' => 'permissions',
                        'label' => 'Tugasan',
                        'value' => ''
                    ])
                    <div class="checkbox check-primary">
                        <div class="row">
                            @foreach($permissions as $index => $permission)
                            <div class="col-md-6" style="padding-left: 7px">
                                <input name="permissions[]" value="{{ $permission->name }}" id="permission_{{ $permission->id }}" class="hidden" type="checkbox">
                                <label for="permission_{{ $permission->id }}">{{ $permission->description }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endcomponent

                    <div class="row">
                        <div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
                            <div class="input-group">
                                <input class="form-control search_a" data-target="available" placeholder="Carian Tugasan Belum Ditugaskan">
                                <span class="input-group-btn">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                </span>
                            </div>
                            <select multiple size="20" class="form-control list" data-target="available">
                            @foreach($permissions as $index => $permission)
                                <option value="{{ $permission->name }}">{{ $permission->description }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <br><br>
                            <a class="btn btn-success btn-assign" href="/staging/admin/route/assign" title="Assign" data-target="available">&gt;&gt; <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate" style="display: none;"></i></a>
                            <br><br>
                            <a class="btn btn-danger btn-assign" href="/staging/admin/route/remove" title="Remove" data-target="assigned">&lt;&lt; <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate" style="display: none;"></i></a>
                        </div>
                        <div class="col-sm-5">
                            <input class="form-control search_b" data-target="assigned" placeholder="Carian Tugasan Telah Ditugaskan">
                            <select multiple size="20" class="form-control list" data-target="assigned">
                            </select>
                        </div>
                    </div>


                    
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info" onclick="submitForm('form-role-add')"><i class="fa fa-check m-r-5"></i> Hantar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
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
        { data: "description", name: "description"},
        { data: "created_at", name: "created_at"},
        { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 4 ] }
    ],
    "sDom": "B<t><'row'<p i>>",
    "buttons": [
        {
            text: '<i class="fa fa-plus m-r-5"></i> Peranan',
            className: 'btn btn-success btn-cons',
            action: function ( e, dt, node, config ) {
                add();
            }
        },
        // {
        //     text: '<i class="fa fa-print m-r-5"></i> Cetak',
        //     extend: 'print',
        //     className: 'btn btn-default btn-sm',
        //     exportOptions: {
        //         columns: ':visible:not(.nowrap)'
        //     }
        // },
        // {
        //     text: '<i class="fa fa-download m-r-5"></i> Excel',
        //     extend: 'excelHtml5',
        //     className: 'btn btn-default btn-sm',
        //     exportOptions: {
        //         columns: ':visible:not(.nowrap)'
        //     }
        // },
        // {
        //     text: '<i class="fa fa-download m-r-5"></i> PDF',
        //     extend: 'pdfHtml5',
        //     className: 'btn btn-default btn-sm',
        //     exportOptions: {
        //         columns: ':visible:not(.nowrap)'
        //     }
        // },
        {
            text: '<i style="cursor: help; color: #48B0F7;" class="fa fa-info-circle"></i> Tindakan yang tidak kelihatan adalah kerana fungsian telah digunakan oleh pengguna dan data tidak boleh dipadam',
            className: 'btn btn-default btn-sm',
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

function add() {
    $('#modal-add').modal("show");
    $('.modal form').trigger("reset");
    $('.modal form').validate();
}

function edit(id) {
    $("#modal-div").load("{{ route('admin.role') }}/"+id);
}

$("#form-role-add").submit(function(e) {
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
                url: '{{ route('admin.role') }}/' + id,
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
