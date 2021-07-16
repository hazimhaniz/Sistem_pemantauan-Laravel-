@extends('layouts.app')
@include('plugins.datatables')
@section('content')
    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                    <li class="breadcrumb-item active">Projek Yang Telah Disahkan</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 ">
                        <div class="card card-transparent">
                            <div class="card-block p-t-0">
                                <h3 class='m-t-0'>Projek Yang Telah Disahkan</h3>
                                <!-- <p class="hint-text m-t-5">Senarai pendaftaran projek yang telah dilaksanakan oleh Penggerak Projek dan telah disahkan.</p> -->
                                <!-- <p class="small hint-text m-t-5">
                                    <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> PDF</button> -->
                                    <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> Excel</button> -->
                                    <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-print m-r-5"></i> Cetak</button> -->
                                 <!-- </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" container-fluid container-fixed-lg bg-white">
        <div class="card card-transparent">
            <div class="card-header px-0">
                <!-- <div class="row"> -->
                   <!--  <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <select class="full-width autoscroll state" data-init-plugin="select2">
                            <option value="0">Semua</option>
                            <option value="jan">Januari</option>
                            <option value="feb">Februari</option>
                            <option value="mac">Mac</option>
                            <option value="apr">April</option>
                            <option value="mei">Mei</option>
                            <option value="jun">Jun</option>
                            <option value="jul">Julai</option>
                            <option value="og">Ogos</option>
                            <option value="sep">September</option>
                            <option value="okt">Oktober</option>
                            <option value="nov">November</option>
                            <option value="dis">Disember</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="full-width autoscroll state" data-init-plugin="select2">
                            <option value="2019" selected>2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div> -->
                    <div class="col-md-3 pull-right">
                        <input type="text" id="search-table" class="form-control" autocomplete="off" placeholder="Carian...">
                    </div>
                <!-- </div> -->
                <div class="clearfix"></div>
            </div>
            <div class="card-block">
                <table class="table table-hover" style="width: 100%" id="table" border="1px">
                    <thead>
                    <tr>
                        <th class="fit bold">Bil.</th>
                        <th class="bold" width="10%">No Fail JAS</th>
                        <th class="bold" width="40%">Nama Projek</th>
                        <th class="bold" >Status</th>
                        <th class="bold" >Tarikh Hantar</th>
                        <th class="bold" >Tarikh Sah</th>
                        <th class="bold" width="10%">Tindakan</th>
                    </tr>
                    </thead>
                    <!-- <tbody>
                    <tr>
                        <td>1.</td>
                        <td>AS(PN)50/013/911/070</td>
                        <td>Projek Mass Rapid Transit Lembah Kelang: Jajaran Sungai Buloh-Kajang (Construction And Completion Of Pasar Seni Paid Link And Other Associated Works Between Existing Pasar Seni LRT Station And Kuala Lumpur KTM Station)</td>
                        <td>05/03/2019</td>
                        <td><span class="badge badge-success">Telah Disahkan</span></td>
                        <td>
                            <a class="btn btn-default btn-xs mb-1" href="{{ route('projek.daftar_projek') }}"><i class="fa fa-search mr-1"></i> Lihat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>AS(PN)50/013/911/070</td>
                        <td>Projek Tapak Pelupusan Sisa Pepejal Sanitari Mukim Tg. Dua Belas, Kuala Langat, Selangor Darul Ehsan</td>
                        <td>05/03/2019</td>
                        <td><span class="badge badge-success">Telah Disahkan</span></td>
                        <td>
                            <a class="btn btn-default btn-xs mb-1" href="{{ route('projek.daftar_projek') }}"><i class="fa fa-search mr-1"></i> Lihat</a>
                        </td>
                    </tr>
                    </tbody> -->
                </table>
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
            { data: "no_fail_jas", name: "no_fail_jas", orderable: false, defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "nama_projek", name: "nama_projek", orderable: false, defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},

            { data: "status", name: "status", orderable: false, defaultContent: "-",render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},

            { data: "updated_at", name: "updated_at", searchable: false, defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "tarikh_sah", name: "tarikh_sah", searchable: false, defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            
            { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
            { className: "nowrap", "targets": [ 4 ] }
            ],
            "sDom": "B<t><'row'<p i>>",
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
        console.log('search');
        table.fnFilter($(this).val());
    });

    </script>
@endpush
