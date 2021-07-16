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


    .tableSummaryStatus>thead>tr>th {

        //background-color: #ebe8ec;
        background-color: #ffff;
        color: #000 !important;

        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        //border-bottom: none !important;

        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 4px !important;

        text-align: center !important;

    }

    .tableSummaryStatus>tbody>tr>td {

        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: none !important;

        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 0px !important;
        margin-left: 0px !important;
        margin-right: 0px !important;

        //text-align: center !important;

    }

    .tableSummaryFRP>thead>tr>th {

        //background-color: #ebe8ec;
        background-color: #ffff;
        color: #000 !important;

        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        //border-bottom: none !important;

        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 4px !important;

        text-align: center !important;

    }

    .tableSummaryFRP>tbody>tr>td {

        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: none !important;

        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 0px !important;
        margin-left: 0px !important;
        margin-right: 0px !important;

        //text-align: center !important;

    }


    .tableSummaryAppStatus>thead>tr>th {

        //background-color: #ebe8ec;
        //background-color: #ffff;
        //color: #000 !important;
        //color: #eeee !important;

        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        //border-bottom: none !important;

        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 4px !important;

        text-align: center !important;

    }

    .tableSummaryAppStatus>tbody>tr>td {

        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: none !important;

        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 0px !important;
        margin-right: 0px !important;

        //text-align: center !important;

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


    .label.label-darkblue-gradient-1 {
        color: #fff;
        background-color: #131c32;
        font-size: 8.5px !important;
    }

    .label.label-darkblue-gradient-2 {
        color: #fff;
        background-color: #041b3b;
        font-size: 8.5px !important;
    }

    .label.label-darkblue-gradient-3 {
        color: #fff;
        background-color: #303b58;
        font-size: 8.5px !important;
    }

    .label.label-darkblue-gradient-4 {
        color: #fff;
        background-color: #565d77;
        font-size: 8.5px !important;
    }

    .label.label-darkblue-gradient-5 {
        color: #fff;
        background-color: #7e8398;
        font-size: 8.5px !important;
    }

    .label.label-darkblue-gradient-6 {
        color: #fff;
        background-color: #a8abb9;
        font-size: 8.5px !important;
    }

    .label.label-darkblue-gradient-7 {
        color: #fff;
        background-color: #d3d4db;
        font-size: 8.5px !important;
    }

    .label.label-light-grey {
        color: #3F4254;
        background-color: #EBEDF3;
        font-size: 8.5px !important;
    }

    .label.label-light-blue {
        color: #3699FF;
        background-color: #E1F0FF;
        font-size: 8.5px !important;
    }

    .label.label-light-purple {
        color: #8950FC;
        background-color: #EEE5FF;
        font-size: 8.5px !important;
    }

    .label.label-light-warning {
        color: #FFA800;
        background-color: #FFF4DE;
        font-size: 8.5px !important;
    }

    .label.label-light-success {
        color: #1BC5BD;
        background-color: #C9F7F5;
        font-size: 8.5px !important;
    }

    .label.label-light-danger {
        color: #F64E60;
        background-color: #FFE2E5;
        font-size: 8.5px !important;
    }

    .label.label-invisible {
        color: #ffff;
        background-color: #ffff;
        font-size: 8.5px !important;
    }

    .label-status-count {
        font-size: 13px !important;
    }

    .label-status-count-invisible {
        font-size: 13px !important;
        color: #ffff !important;
    }

    .label-status-count-total {
        font-size: 22px !important;
        font-weight: 300 !important;
    }

    .text-info {
        color: #ab70a6 !important;
    }

    .modal-lg {
        max-width: 60% !important;
        width: 60% !important;
        margin: 0 auto !important;
    }

    .nav-tabs-blue.nav-tabs-fillup>li>a:after {
        background: none repeat scroll 0 0 #006c80;
        border: 1px solid #006c80;
    }

    .float-back {
        position: fixed;
        bottom: 180px;
        right: 40px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
    }

    .float-save {
        position: fixed;
        bottom: 130px;
        right: 40px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
    }

    .float-submit {
        position: fixed;
        bottom: 80px;
        right: 40px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
    }

    .float-catatan {
        position: fixed;
        bottom: 17px;
        right: 180px;
        text-align: center;
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
    <div class="row">
        <div class="col-md-8">
            <h4><span><b class="text-page">LAPORAN PEMARKAHAN</b></span></h4>
            <h5><span><b class="text-dark">SENARAI LAPORAN PEMARKAHAN</b></span></h5>
        </div>
        <div class="col-md-4">

            <table class="table" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                <tbody>
                    <th colspan="2">
                        <center>PETUNJUK</center>
                    </th>
                    <tr>
                        <td><span style="text-align:center;font-size:16px;" class="label label-lg label-light-danger label-inline ">MERAH</span></td>
                        <td>TIDAK PATUH (49% KEBAWAH)</td>
                    </tr>
                    <tr>
                        <td><span style="text-align:center;font-size:16px;" class="label label-lg label-light-warning label-inline ">KUNING</span></td>
                        <td>PATUH SEBAHAGIAN (50%-69%)</td>
                    </tr>
                    <tr>
                        <td><span style="text-align:center;font-size:16px;" class="label label-lg label-light-success label-inline">HIJAU</span></td>
                        <td>PATUH (70%-100%)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="table_wrapper" class="dataTables_wrapper no-footer">
        <br>
        <div class="card card-transparent">
            <table class="table" id="laporanBulananList" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                <thead>
                    <tr role="row">
                        <th class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Bil.</th>
                        <th class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">No Fail Jas</th>
                        <th class="align-top text-center" style="width:30%; vertical-align:top; color:#fff">Nama Projek</th>
                        <th class="align-top text-center" style="width:5%; vertical-align:top; color:#fff">Bulan </th>
                        <th class="align-top text-center" style="width:5%; vertical-align:top; color:#fff">Tahun</th>
                        <th class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Markah</th>
                        <th class="align-top text-center" style="width:15%; vertical-align:top; color:#fff">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <br>
            <br>
        </div>
    </div>
</div>

<div id="laporanPemarkahanView"></div>

@endsection
@push('js')

<script src="{{ asset('sng-dashboard/highcharts.js') }}" type="text/javascript"></script>
<script src="{{ asset('sng-dashboard/highcharts-more.js') }}" type="text/javascript"></script>

<script type="text/javascript">

</script>
@endpush

@push('js')
<script>
    var table = $('#laporanBulananList');

    var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": "{{ fullUrl() }}",
        "columns": [{
                data: 'index',
                defaultContent: '',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: "no_fail_jas",
                name: "no_fail_jas",
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },
            {
                data: "nama_projek",
                name: "nama_projek",
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },
            {
                data: "bulan",
                name: "bulan",
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },
            {
                data: "tahun",
                name: "tahun",
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },
            {
                data: "markah",
                name: "markah",
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },
            {
                data: "tindakan",
                name: "tindakan",
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            }
        ],
        "columnDefs": [{
            className: "nowrap",
            "targets": [3]
        }],
        "sDom": "<'pull-right p-b-10 m-r-20'B> <'pull-left m-t-20 m-l-15'f> <t> <'row'<p i>>",
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
        "pagingType": "full_numbers",
        "oLanguage": {
            "sSearchPlaceholder": "Carian...",
            "sEmptyTable": "Tiada data",
            "sInfo": "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
            "sInfoEmpty": "Paparan 0 hingga 0 dari 0 rekod",
            "sInfoFiltered": "(Ditapis dari jumlah _MAX_ rekod)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Papar _MENU_ rekod",
            "sLoadingRecords": "Diproses...",
            "sProcessing": "Sedang diproses...",
            "sSearch": "",
            "sZeroRecords": "Tiada padanan rekod yang dijumpai.",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelum",
                "sNext": "Seterusnya",
                "sLast": "Akhir"
            },
            "oAria": {
                "sSortAscending": ": diaktifkan kepada susunan lajur menaik",
                "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
            }
        },
        "iDisplayLength": 50
    };

    table.dataTable(settings);

    function viewLaporanPemarkahan(laporanID) {
        console.log(laporanID);
        $("#laporanPemarkahanView").load("{{ url('/pengurusan_projek/laporan/pemarkahan-view') }}/" + laporanID);
    }
</script>
@endpush