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
    padding: 4px;
    text-align:center !important; 
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

                <?php
                // setlocale(LC_TIME, "ms", "my_MS", "ms_MY");
                $logins = auth()
                ->user()
                ->logs()
                ->where('activity_type_id', 7)
                ->orderBy('created_at', 'desc');
                $last_login = $logins->count() > 1 ? $logins->skip(1)->first() : null;
                ?>

                <div class="col-md-12">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Selamat Datang, <span class="semi-bold">{{ auth()->user()->name }}</span></h3>
                            @if ($last_login)
                                <p>Last login date is at {{ strftime('%e %B %Y', strtotime($last_login->created_at)) }}.</p>
                            @endif
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
        <h4><span><b class="text-page">PENGGUNA LUAR</b></span></h4>
        <h5><span><b class="text-dark">PENGURUSAN PENGGUNA LUAR PENGGERAK PROJEK</b></span></h5>
        <br>
        
        @include('form.petunjuk')
        <br>
        <div id="table_wrapper" class="dataTables_wrapper no-footer">

            <div class="card card-transparent">
                     <table class="table" id="UserppTable" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                    <thead>
                        <tr role="row">
                            <th bgcolor="#adadad" class="align-top text-center"
                                style="width:2%; vertical-align:top; color:#fff">Bil.</th>
                            <th bgcolor="#adadad" class="align-top text-center"
                                style="width:10%; vertical-align:top; color:#fff">No Fail Jas</th>
                            <th bgcolor="#adadad" class="align-top text-center"
                                style="width:30%; vertical-align:top; color:#fff">Nama Projek </th>
                            <th bgcolor="#adadad" class="align-top text-center"
                                style="width:10%; vertical-align:top; color:#fff">Nama Pengguna</th>
                            <th bgcolor="#adadad" class="align-top text-center"
                                style="width:15%; vertical-align:top; color:#fff">Peranan</th>
                            <th bgcolor="#adadad" class="align-top text-center"
                                style="width:10%; vertical-align:top; color:#fff">Status</th>
                            <th bgcolor="#adadad" class="align-top text-center"
                                style="width:15%; vertical-align:top; color:#fff">Tindakan</th>
                        </tr>
                    </thead>
                </table>
                <br>
               
            </div>

        </div>
    </div>
<div class="modal fade" id="adminTindakanModal" tabindex="-1" role="dialog" aria-labelledby="adminTindakanLabel" aria-hidden="true">
    <div id="adminTindakanModalContent" class=" modal-dialog modal-dialog-centered modal-lg" role="document">
    </div>
</div>

@endsection

@push('js')
<script type="text/javascript">
 var table = $('#UserppTable');

var settings = {
    "processing": true,
    "serverSide": true,
    "deferRender": true,
    "ajax": "{{ fullUrl() }}",
    "columns": [
        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: "fail_jas", name: "no_fail_jas", orderable: true, defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "nama_projek", name: "nama_projek", orderable: true, defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "name", name: "user.name", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        // { data: "username", name: "username", defaultContent: "-", render: function(data, type, row){
        //     return $("<div/>").html(data).text();
        // }},
        { data: "type.name", name: "master_filing_status.name", defaultContent: "-",render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "status.name", name: "master_filing_status.name", defaultContent: "-",render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 5 ] }
    ],
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

        function deactive(id) {

  $.ajax({
                  url: 'external/deactivate/'+id,
                  method: 'get',
                  dataType: 'json',
                  async: true,
                  contentType: false,
                  processData: false,
                  success: function(data) {
                      swal(data.title, data.message);
                      table.api().ajax.reload(null, false);
                  }
              });
  
  // swal({
  //       title: "",
  //       text: "Adakah anda pasti ?",
  //       type: "",
  //         showCancelButton: true,
  //         confirmButtonClass: "btn-outline green-meadow",
  //         cancelButtonClass: "btn-danger",
  //         confirmButtonText: "Ya",
  //         cancelButtonText: "Tidak",
  //         closeOnConfirm: true,
  //         closeOnCancel: true,
  //         showLoaderOnConfirm: true
  //     },
  //     function(isConfirm) {
  //         if (isConfirm) {
              
  //         }
  //     });
}

function active(id) {
  swal({
          title: "",
          text: "Anda pasti ingin aktifkan pengguna ini?",
          
          showCancelButton: true,
          confirmButtonClass: "btn-outline green-meadow",
          cancelButtonClass: "btn-danger",
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak",
          closeOnConfirm: true,
          closeOnCancel: true,
          showLoaderOnConfirm: true
      },
      function(isConfirm) {
          if (isConfirm) {
              $.ajax({
                  url: 'external/activate/'+id,
                  method: 'get',
                  dataType: 'json',
                  async: true,
                  contentType: false,
                  processData: false,
                  success: function(data) {
                      swal(data.title, data.message);
                      table.api().ajax.reload(null, false);
                  }
              });
          }
      });
}

function passwordUser(id) {
    $("#modal-div").load("{{ route('user.external') }}/password/"+id);
}

function handoverAccount(id) {
    console.log('handover');
    $("#modal-div").load("{{ route('user.external') }}/handover/"+id);
}

function edit(id, projekID) {
    $("#modal-div").load("{{ route('user.external') }}/"+id+"/"+projekID);
}

function edit2(id,projek) {
    $("#modal-div").load("{{ route('user.external') }}/pp/"+id+"/"+projek);
}

function editemc(id) {
    $("#modal-div").load("{{ route('user.external') }}/emc/"+id);
}

function editnyah(id) {
    $("#modal-div").load("{{ route('user.external') }}/"+id+"_nyah");
}
function editemcnyah(id) {
    $("#modal-div").load("{{ route('user.external') }}/emc/"+id+"_nyah");
}

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
            url: '{{ route('user.external') }}/'+id,
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