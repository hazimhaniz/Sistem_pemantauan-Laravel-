@extends('layouts.app')
@include('plugins.datatables')

@section('content')
<!-- START BREADCRUMB -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                <li class="breadcrumb-item active"><a href="javascript:;">Senarai muat naik</a></li>
            </ol>
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Senarai No Fail JAS (excel)</h3>
                            <!-- <p class="small hint-text m-t-5">
                               Sila lengkapkan semua maklumat berikut mengikut turutan dan arahan yang dipaparkan.
                            </p> -->
                        </div>
                    </div>
                    <!-- END card -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END BREADCRUMB -->
<div class=" container-fluid container-fixed-lg bg-white">
    <!-- START card -->
    <div class="card card-transparent">
        <div class="card-header px-0 search-on-button">
        
            <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian...">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="card-block m-b-20">
            <table class="table table-responsive" id="table" border="0px" style="padding:10px;">
                <thead>
                    <tr>
                        <th class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Bil.</th>
                        <th>Nama</th>
                        <th>URL</th>
                        <th>Di muat naik pada</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection
@include('Nofilejas.review_nofile_upload')

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
        { data: "name", name: "name"},
        { data: "url", name: "url"},
        { data: "created_at", name: "created_at"},
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
        {
            text: 'Muat Naik Fail',
            className: 'btn btn-info btn-sm',
            action: function (e, dt, node, config)
            {
                //This will send the page to the location specified
                //window.location.href = '{{ route('admin.review.upload.nofile') }}';
                $('#test').modal('show');
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

// search box for table
$('#search-table').keyup(function() {
    table.fnFilter($(this).val());
});
</script>
@endpush