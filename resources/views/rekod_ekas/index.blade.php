@extends('layouts.app')
@include('plugins.chartjs')
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

    /****************** Card Standard Size ******************/
    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter i {
        font-size: 4em;
        opacity: 0.2;
    }

    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 28px;
        display: block;
    }

    .card-counter .count-name {
        position: absolute;
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 12px;
    }

    .smallcard-sng.card-counter.active {
        background-color: #1f3953;
        color: #FFF;
    }

    .smallcard-sng.card-counter.unactive {
        background-color: #b9d3e8;
        color: #FFF;
    }

    /****************** End Card Standard Size ******************/

    /****************** Card Small Size ******************/
    .card-counter-small {
        box-shadow: 2px 2px 10px #DADADA;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter-small:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter-small i {
        font-size: 1.5em;
        opacity: 0.2;
    }

    .card-counter-small .count-numbers-small {
        position: absolute;
        right: 30px;
        top: 15px;
        font-size: 20px;
        display: block;
    }

    .card-counter-small .count-name-small {
        position: absolute;
        right: 35px;
        top: 55px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 12px;
    }

    .smallcard-sng.card-counter-small.active {
        background-color: #1f3953;
        color: #FFF;
    }

    .smallcard-sng.card-counter-small.unactive {
        background-color: #b9d3e8;
        color: #FFF;
    }

    /****************** End Card Small Size ******************/

    .grafico {
        min-width: 310px;
        max-width: 400px;
        height: 280px;
        margin: 0 auto
    }

    .grafico1 {
        min-width: 310px;
        max-width: 400px;
        width: 500px;
        height: 280px;
        margin: 0 auto
    }

    .main-header {
        font-size: x-large;
        color: #888;
        font-family: Verdana;
        margin-bottom: 20px;
    }

    .destaque {
        color: #f88;
        font-weight: bolder;
    }

    .highcharts-tooltip h3 {
        margin: 0.3em 0;
    }


    .nav-tabs-blue.nav-tabs-fillup>li>a:after {
        background: none repeat scroll 0 0 #006c80;
        border: 1px solid #006c80;
    }

    table {
        border-collapse: separate;
        border: solid #DDDDDD 1px;
        border-radius: 6px;
        -moz-border-radius: 6px;
    }

    td:first-child,
    th:first-child {
        border-left: none;
    }


    .FRPprofile {

        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
    }

    .FRPprofilebtn {

        font-family: 'Montserrat' !important;
        font-size: 9.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
    }



    .text-info {
        color: #ab70a6 !important;
    }

    .modal-lg {
        max-width: 60% !important;
        width: 60% !important;
        margin: 0 auto !important;
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

        color: #000 !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        padding: 4px;
        text-align:center; 
    }
    .ow {
        overflow-wrap: break-word !important;
        word-wrap: break-word !important;
        hyphens: auto !important;
        text-align: left;

    }
    td .ow{
        text-align: left;
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
            <!-- END BREADCRUMB -->
        </div>
        <div class="row p-b-30">


            <div class="col-md-12">
                <div class="card card-transparent">
                    <div class="card-block">
                        <h3>Selamat Datang, <span class="semi-bold">{{ auth()->user()->name }}</span></h3>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END JUMBOTRON -->

<!-- START CONTAINER FLUID -->

<!-- START card -->
<!-- <div class="card card-transparent"> -->
<div class=" container-fluid container-fixed-lg bg-white m-t-20">
    <h5><span><b class="text-page">REKOD EKAS</b></span></h5>
    @if(Request::get('status')=='')
    <h5><span><b class="text-dark">SENARAI REKOD EKAS</b></span></h5>
    @elseif(Request::get('status')=='belum_diagih')
    <h5><span><b class="text-dark">SENARAI REKOD YANG BELUM DIAGIH</b></span></h5>
    @elseif(Request::get('status')=='telah_diagih')
    <h5><span><b class="text-dark">SENARAI REKOD EKAS YANG TELAH DIAGIH</b></span></h5>
    @endif
    <br>
    <div id="table_wrapper" class="dataTables_wrapper no-footer">
    <div class="card card-transparent">
        <table class="table" id="EkasTable" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
            <thead>
                <tr role="row">
                    <th bgcolor="#adadad" class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Bil.</th>
                    <th bgcolor="#adadad" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">No Fail Jas</th>
                    <th bgcolor="#adadad" class="align-top text-center" style="width:30%; vertical-align:top; color:#fff">Nama Projek </th>
                    <th bgcolor="#adadad" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Negeri</th>
                    <th bgcolor="#adadad" class="align-top text-center" style="width:15%; vertical-align:top; color:#fff">Pengawai Jas</th>
                    <th bgcolor="#adadad" class="align-top text-center" style="width:15%; vertical-align:top; color:#fff">Tindakan</th>
                </tr>
            </thead>
        </table>
        <br>
        <br>
    </div>
    </div>
</div>

@endsection

@push('js')
<script type="text/javascript">

    function edit(id) {
        $("#modal-div").load("../rekodEkas/edit/"+id);
        $('.modal form').trigger("reset");
        $('.modal form').validate();
    }

    var table = $('#EkasTable');

    var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": "{{ fullUrl() }}",
        "columns": [
        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: "nofail", name: "nofail", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "name", name: "name",  defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "negeri", name: "negeri",  defaultContent: "-",render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "assign", name: "assign", defaultContent: "-",render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "action", name: "action", orderable: false, searchable: false},
        ],
        "columnDefs": [
        { className: "nowrap", "targets": [ 5 ] }
        ],
		"sDom": "<'pull-right p-b-10 m-r-15'B> <'pull-left m-t-20 m-l-10'f> <t> <'row'<p i>>",
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
                // all page
                "action": newexportaction
                // current page

				// exportOptions: {
				// 	columns: ':visible:not(.nowrap)'
				// }
			},
			// {
			// 	text: '<i class="fas fa-file-pdf text-danger"></i>',
			// 	extend: 'pdfHtml5',
			// 	className: 'btn btn-default btn-sm',
			// 	exportOptions: {
			// 		columns: ':visible:not(.nowrap)'
			// 	}
			// },
		],
        "destroy": true,
        "scrollCollapse": true,
        "oLanguage": {
            "sSearchPlaceholder": "Carian...",
            "sEmptyTable":      "Tiada data",
            "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
            "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
            "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
            "sInfoPostFix":     "",
            "sInfoThousands":   ",",
            "sLengthMenu":      "Papar _MENU_ rekod",
            "sLoadingRecords":  "Diproses...",
            "sProcessing":      "Sedang diproses...",
            "sSearch":          "",
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

   $('#search-table').keyup(function() {
    table.fnFilter($(this).val());
});

function newexportaction(e, dt, button, config) {
    var self = this;
    var oldStart = dt.settings()[0]._iDisplayStart;
    dt.one('preXhr', function (e, s, data) {
        // Just this once, load all data from the server...
        data.start = 0;
        data.length = 2147483647;
        dt.one('preDraw', function (e, settings) {
            // Call the original action function
            if (button[0].className.indexOf('buttons-copy') >= 0) {
                $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-print') >= 0) {
                $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
            }
            dt.one('preXhr', function (e, s, data) {
                // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                // Set the property to what it was before exporting.
                settings._iDisplayStart = oldStart;
                data.start = oldStart;
            });
            // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
            setTimeout(dt.ajax.reload, 0);
            // Prevent rendering of the full data to the DOM
            return false;
        });
    });
    // Requery the server with the new one-time export settings
    dt.ajax.reload();
};
//For Export Buttons available inside jquery-datatable "server side processing" - End

</script>
@endpush
