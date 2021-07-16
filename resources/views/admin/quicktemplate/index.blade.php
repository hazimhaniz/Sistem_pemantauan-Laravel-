@extends('layouts.app')
@include('plugins.datatables')
@include('plugins.dropify')
@include('plugins.wizard')

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            {{ Breadcrumbs::render('admin.quicktemplate') }}
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Pengurusan Quick Template</h3>
                            <p class="small hint-text m-t-5">
                                Pengurusan quick template boleh dilakukan melalui jadual di bawah.
                                <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> PDF</button>
                                <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> Excel</button>
                                <button class="btn btn-default btn-sm pull-right"><i class="fa fa-print m-r-5"></i> Cetak</button> -->
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
                <button onclick="add()" class="btn btn-success btn-cons"><i class="fa fa-plus m-r-5"></i> Notifikasi</button>
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
                        <th>Nama Sistem</th>
                        <th>Logo</th>
                        <th>Copyright</th>
                        <th>Color Theme</th>
                        <th>Keterangan</th>
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
                <h5 class="modal-title" id="addModalTitle">Tambah <span class="bold">Quick Template</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                 <form id='form-add' role="form" method="post" action="{{ route('admin.quicktemplate') }}">

                   
                    @include('components.input', [
                        'name' => 'system_name',
                        'label' => 'Nama Sistem',
                        'mode' => 'required',
                    ]) 

                    @include('components.input', [
                        'name' => 'copyright',
                        'label' => 'Hak Milik Terpelihara',
                        'mode' => 'required',
                    ])

                    @include('components.textarea', [
                        'name' => 'description',
                        'label' => 'Keterangan',
                        'mode' => 'required',
                    ])

                    <div class="form-group form-group-default required">
                        <label>
                            <span id="label_color_theme">Tema Color</span>
                        </label>
                        <div class="radio radio-primary">
                            <input name="color_theme" value="blue" id="color_theme_01_1" type="radio" class="hidden" required>
                            <label for="color_theme_01_1">BIRU</label>
                            <input name="color_theme" value="yellow" id="color_theme_02_1" type="radio" class="hidden" required>
                            <label for="color_theme_02_1">KUNING</label>
                            <input name="color_theme" value="green" id="color_theme_03_1" type="radio" class="hidden" required>
                            <label for="color_theme_03_1">HIJAU</label>
                        </div>
                    </div>

                  <!--   <div class="form-group form-group-default required">
                        <label>
                            <span id="label_default">Set Default</span>
                        </label>
                        <div class="radio radio-primary">
                            <input name="default" value=1 id="default_01_1" type="radio" class="hidden" required>
                            <label for="default_01_1">YA</label>
                            <input name="default" value=0 id="default_02_1" type="radio" class="hidden" required>
                            <label for="default_02_1">TIDAK</label>
                        </div>
                    </div> -->


                    {{--@include('components.radio', [
                        'name' => 'default',
                        'label' => 'Set Default',
                        'mode' => 'required',
                        'data' => [1=>'YA',0=>'TIDAK'],
                    ])--}}

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label id="label_copyright" for="copyright" class="col-md-12 control-label">Logo Sistem <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" class="dropify" name="logo_header" data-default-file="" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M" data-show-remove="false"/>
                        </div>            
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label id="label_copyright" for="copyright" class="col-md-12 control-label">Background Paparan Log Masuk <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" class="dropify" name="background_login_page" data-default-file="" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M" data-show-remove="false"/>
                        </div>            
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label id="label_copyright" for="copyright" class="col-md-12 control-label">Favicon <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" class="dropify" name="favicon" data-default-file="" data-allowed-file-extensions="jpg png gif jpeg ico" data-max-file-size="5M" data-show-remove="false"/>
                        </div>            
                    </div>

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
        { data: "system_name", name: "system_name", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "logo_header", name: "logo_header", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "copyright", name: "copyright", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "color_theme", name: "color_theme", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "description", name: "description", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 5 ] }
    ],
    "sDom": "B<t><'row'<p i>>",
    "buttons": [
        {
            text: '<i class="fa fa-plus m-r-5"></i> Template Segera',
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
    $("#modal-div").load("{{ route('admin.quicktemplate') }}/"+id);
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
                url: '{{ route('admin.quicktemplate') }}/'+id,
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

function setdefault(id) {
    swal({
        title: "Jadikan Template Default ?",
        text: "",
        icon: "warning",
        buttons: ["Batal", { text: "Teruskan", closeModal: false }],
        dangerMode: false,
    })
    .then((confirm) => {
        if (confirm) {
            $.ajax({
                url: '{{ route('admin.quicktemplate') }}/setdefault/'+id,
                method: 'post',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal(data.title, data.message, data.status);
                    // table.api().ajax.reload(null, false);
                    location.reload();
                }
            });
        }
    });
}


$('.dropify').dropify();
$("#form-edit").validate();
function handOver() {
    $("#modal-handover").modal("show");
    $("#form-handover").validate();
    $("#form-handover").trigger("reset");
}

</script>
@endpush
