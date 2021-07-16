@extends('layouts.app')
@include('plugins.datatables')

<style>

table {
            border-collapse: separate !important;
            border: solid #DDDDDD 1px;
            border-radius: 6px;
            -moz-border-radius: 6px;
        }
        th {
    background-color: #ebe8ec;
    color: #000 !important;
    //border-top: none;
    font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
    letter-spacing: 0.06em !important;
    text-transform: uppercase !important;
    font-weight: 500 !important;
    //border-left: none !important;
    padding: 4px;
}
td {
    //background-color: #ebe8ec;
    color: #000 !important;
    //border-top: none !important;
    //border-bottom: none !important;
    //border-top: 1px solid #E7E7E7;
    //border-left: 1px solid #E7E7E7;
    //border-bottom: none !important;
    //border-left: none !important;
    //border-right: none !important;
    font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
    letter-spacing: 0.06em !important;
    text-transform: uppercase !important;
    //font-weight: 500 !important;
    padding: 4px;
    text-align:center !important; 
}

</style>

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            {{ Breadcrumbs::render('inbox') }}
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Inbox Notifikasi</h3>
                            <p class="small hint-text m-t-5">
                                Rujukan notifikasi boleh dibaca melalui inbox berikut.
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
<input type="hidden" name="inbox_limit" value="{{env('INBOX_LIMIT')}}">
<!-- START CONTAINER FLUID -->
<div class=" container-fluid container-fixed-lg bg-white">
    <!-- START card -->
    <div class="card card-transparent">
        <div class="card-header px-0 search-on-button">
            <div class="card-title">
               
            </div>
            <!-- <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian...">
                </div>
            </div> -->
            <div class="clearfix"></div>
        </div>
        <div id="table_wrapper" class="dataTables_wrapper no-footer">   

<div class="card card-transparent">
      
        <table class="table" id="table" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
					<thead>
               
                    <tr>
                       <th class="align-top text-center"
								style="width:2%; vertical-align:top;">Bil.</th>
                        <th class="align-top text-center"
								style="width:30%; vertical-align:top;">Subjek</th>
                        <th class="align-top text-center"
								style="width:10%; vertical-align:top;">Dihantar Oleh</th>
                        <th class="align-top text-center"
								style="width:10%; vertical-align:top;">Tarikh / Masa</th>
                        <th class="align-top text-center"
								style="width:15%; vertical-align:top;">Status</th>
                        <th class="align-top text-center"
								style="width:15%; vertical-align:top;">Tindakan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END card -->
</div>
</div>
<!-- END CONTAINER FLUID -->
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
        { data: "subject", name: "subject"}, 
        { data: "sender.name", name: "sender.name"},
        { data: "created_at", name: "created_at"}, 
        { data: "status.name", name: "status.name", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 5 ] }
    ],
    "sDom": "<t><'row'<p i>>",
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
    "iDisplayLength": $('input[name="inbox_limit"]').val()
};

table.dataTable(settings);

// search box for table
$('#search-table').keyup(function() {
    table.fnFilter($(this).val());
});

function view(id) {
    $("#modal-div").load("{{ route('inbox') }}/"+id);
    table.api().ajax.reload(null, false);
}



</script>
@endpush
