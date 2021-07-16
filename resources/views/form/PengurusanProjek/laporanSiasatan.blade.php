@extends('layouts.app')
@include('plugins.chartjs')
@include('plugins.datatables')



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
    <br>
<div class="row">
    <div class="col-md-4">
        <h4><span><b class="text-page">LAPORAN SIASATAN</b></span></h4>
        @if(Request::get('status')=='')
        <h5><span><b class="text-dark">SENARAI LAPORAN SIASATAN</b></span></h5>
        @elseif(Request::get('status')=='belum_disemak')
        <h5><span><b class="text-dark">SENARAI LAPORAN SIASATAN YANG BELUM DISEMAK</b></span></h5>
        @elseif(Request::get('status')=='telah_disemak')
        <h5><span><b class="text-dark">SENARAI LAPORAN SIASATAN YANG TELAH DISEMAK</b></span></h5>
        @endif
     </div>
</div>
@include('form.petunjuk')
   

    <div id="table_wrapper" class="dataTables_wrapper no-footer">
        <div class="card card-transparent">
            <table class="table" id="laporanSiasatanList" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                <thead>
                    <tr role="row">
                        <th class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Bil.</th>
                        <th class="align-top text-center" style="width:20%; vertical-align:top; color:#fff">No. Fail JAS </th>
                        <th class="align-top text-center" style="width:30%; vertical-align:top; color:#fff">Nama Projek</th>
                        <th class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Bulan</th>
                        <th class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Tahun</th>
                        <th class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Status</th>
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

<div id="viewLaporanSiasatan"></div>

@endsection
@push('js')

<script src="{{ asset('sng-dashboard/highcharts.js') }}" type="text/javascript"></script>
<script src="{{ asset('sng-dashboard/highcharts-more.js') }}" type="text/javascript"></script>

<script type="text/javascript">

</script>
@endpush

@push('js')
<script>
    var table = $('#laporanSiasatanList');

    var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": "{{ fullurl() }}",
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
                data: "status",
                name: "status",
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },
            {
                data: "tindakan",
                name: "status",
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

    function viewLaporanSiasatan(laporanID) {
        console.log(laporanID);
        $("#viewLaporanSiasatan").load("{{ url('/pengurusan_projek/laporan/siasatan-view') }}/" + laporanID);
    }
</script>
@endpush