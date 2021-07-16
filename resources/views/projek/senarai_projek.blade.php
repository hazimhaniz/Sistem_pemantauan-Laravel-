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
        border-collapse: separate !important;
        border: solid #DDDDDD 1px;
        border-radius: 6px;
        -moz-border-radius: 6px;
    }

    .table.dataTable.no-footer {
        border: solid #DDDDDD 1px;
        border-radius: 6px;
        -moz-border-radius: 6px;
    }



    table.dataTable{
        border-spacing: 2px;
        
        border: solid #DDDDDD 1px;
        border-radius: 6px;
        -moz-border-radius: 6px;
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
        <h4><span><b class="text-page">SENARAI PROJEK</b></span></h4>
        <br>
        @include('form.petunjuk')
        <br>
        <div id="table_wrapper" class="dataTables_wrapper no-footer">
            <br>
            <div class="card card-transparent">
                <table class="table" id="senarai_projek" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                    <thead>
                        <tr role="row">
                            <th bgcolor="#206575" class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Bil.</th>
                            <th bgcolor="#206575" class="align-top text-center" style="width:15%; vertical-align:top; color:#fff">Ahli Projek</th>
                            <th bgcolor="#206575" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">No Fail Jas</th>
                            <th bgcolor="#206575" class="align-top text-center" style="width:20%; vertical-align:top; color:#fff">Nama & Maklumat Projek </th>
                            <th bgcolor="#206575" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Status Laporan</th>
                            {{-- <th bgcolor="#206575" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Status Projek</th> --}}
                            <th bgcolor="#206575" class="align-top text-center" style="width:15%; vertical-align:top; color:#fff">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <br>
                
            </div>
            
        </div>
    </div>

    <!-- Modal Ahli Projek -->

    <!--- END MODAL AHLI PROJEK -->
    <!-- Modal Ahli Projek -->
    <div class="modal fade stick-up slide-right" id="ahliProjekModal" tabindex="-1" role="dialog" aria-labelledby="ahliProjekModalLabel" aria-hidden="true">
        <div class=" modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ahliProjekModalTitle"> Tambah  atau Tukar <b>Ahli Projek</b></h5>
                    <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="ahliProjekModalBody" class="modal-body m-t-20">
                    <ul id="tabs-sng-profil" class="nav nav-tabs nav-tabs blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist">
                        <li class="nav-item ml-md-3">
                            <a class="active" data-toggle="tab" href="#" data-target="#tab1" role="tab" onclick=""><span> SENARAI AHLI PROJEK</span></a>
                        </li>
                        <li class="nav-item hideec">
                            <a class="" data-toggle="tab" href="#" data-target="#tab2" role="tab" onclick=""><span> PENUKARAN EO</span></a>
                        </li>
                        <li class="nav-item hideec">
                            <a class="" data-toggle="tab" href="#" data-target="#tab3" role="tab" onclick=""><span>PENUKARAN EMC</span></a>
                        </li>
                        <li id="tabPendEO" class="nav-item">
                            <a class="" data-toggle="tab" href="#" data-target="#tab4" role="tab" onclick=""><span> PENDAFTARAN EO</span></a>
                        </li>
                        <li id="tabPendEMC" class="nav-item">
                            <a class="" data-toggle="tab" href="#" data-target="#tab5" role="tab" onclick=""><span> PENDAFTARAN EMC</span></a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div id="senaraiAhliProjekDiv"></div>
                        </div>
                        <div class="tab-pane disable" id="tab2">
                            <div id="penukaranEO"></div>
                        </div>
                        <div class="tab-pane disable" id="tab3">
                            <div id="penukaranEMC"></div>
                        </div>
                        <div class="tab-pane disable" id="tab4">
                            <div id="pendEO"></div>
                        </div>
                        <div class="tab-pane disable" id="tab5">
                            <div id="pendEMC"></div>
                        </div>
                    </div>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTAINER FLUID -->

    @endsection

    @push('js')

    <script src="{{ asset('sng-dashboard/highcharts.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('sng-dashboard/highcharts-more.js') }}" type="text/javascript"></script>

    @endpush

    @push('js')
    <script type="text/javascript">
     $(function() {

       $('#daftarProjek').validate({
        rules: {
            no_kp: {
                digits: true,
                minlength: 12,
                maxlength: 12
            },
        },
        messages: {
            no_kp: {
                digits: "Angka sahaja",
                minlength: "No Kad Pengenalan hendaklah 12 angka sahaja",
                maxlength: "No Kad Pengenalan hendaklah 12 angka sahaja"
            },
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
    })
   });
     var table = $('#senarai_projek');

     var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": "{{ fullUrl() }}",
        "columns": [
        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: "ahliProjek", name: "ahliProjek", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "no_fail_jas", name: "no_fail_jas", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},

        { data: "nama_projek", name: "nama_projek", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "status_laporan", name: "status_laporan", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        // { data: "status_projek", name: "status_projek", render: function(data, type, row){
        //     return $("<div/>").html(data).text();
        // }},
        { data: "action", name: "action", orderable: false, searchable: false},
        ],
        "columnDefs": [
        { className: "nowrap", "targets": [ 5 ] }
        ],
        "sDom": "<'pull-right p-b-10 m-r-25'B> <'pull-left m-t-20 m-l-20'f> <t> <'row'<p i>>",
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
"iDisplayLength": 50
};

table.dataTable(settings);

    // search box for table
    $('#search-table').keyup(function() {
        table.fnFilter($(this).val());
    });
    
    function ahliProjekModal(projekID, projekStatus, projekDetailStatus) {

        $("#senaraiAhliProjekDiv").load("{{ url('/projek/senarai_ahli') }}/" + projekID);
        $("#penukaranEO").load("{{ url('/projek/penukaranEO') }}/" + projekID);
        $("#penukaranEMC").load("{{ url('/projek/penukaranEMC') }}/" + projekID);

        $("#pendEO").load("{{ url('/projek/pendEO') }}/" + projekID);
        $("#pendEMC").load("{{ url('/projek/pendEMC') }}/" + projekID);
        
        $(".projekID").each(function(){
            $(this).val(projekID);
        });
        
        $("#ahliProjekModal").modal('show');

        $("#tabPendEO").show();
        $("#tabPendEMC").show();

        if(projekStatus == 200 || projekStatus == 209) {
            $(".hideec").hide();
        } else if(projekStatus == 302) {
            $("#tabPendEO").hide();
            $("#tabPendEMC").hide();
        } else if(projekDetailStatus == 211) {
            $("#tabPendEO").hide();
            $("#tabPendEMC").hide();
            $(".hideec").show();
        }  else if(projekDetailStatus == 500) {
            $(".hideec").show();
            $("#tabPendEO").hide();
            $("#tabPendEMC").hide();
        } else {
            $("#tabPendEO").hide();
            $("#tabPendEMC").hide();
            $(".hideec").hide();
        }

        if (projekStatus == 200 && projekDetailStatus == 500) {
            $("#tabPendEO").hide();
            $("#tabPendEMC").hide();
            $(".hideec").show();
        }
    }
    
    function checkUser2(projectId) {

        var username = $('#usernameeo').val();
        if (username == '') {
            $('#checkhideeot').css('display', 'none')
            return false;
        }
        $.ajax({
            url: "{{ url('checkuseremc') }}" + '/' + username + '/' + projectId,
            method: "GET",

            success: function(response) {

                if (response.success) {
                    $('#checkhideeot').css('display', 'block')
                    $('input[name="nama"]').val(response.data.name)
                } else {
                    $('#checkhideeot').css('display', 'none')
                    $('input[name="nama"]').val('')
                }
            },
            error: function(response) {
                console.log(response);
            }
        });

    }

    function checkkompotensi(projectId) {
        var username = $('#usernameeo').val();
        console.log(username)
        // if (username.length == 12) {
            var url = `{{ route('kompetensi.index') }}`;
            let data = {
                'username': username
            };
            // console.log(username);

            $.ajax({
                url: url,
                type: 'get',
                data: data,
                success: function(response) {
                    // console.log(response.result.data[0].no_sijil_kompetensi);
                    if(response.success){
                        if (response.result.recordsTotal >= 1) {
                        // $('#wujud').show();
                        $('#wujudbaru').show();
                        $('#tidakwujud').hide();
                        $('#hantar').hide();
                        $('input[name="nama"]').val(response.result.data[0].nama);
                        $('input[name="no_phone"]').val(response.result.data[0].no_phone);
                        $('input[name="emel"]').val(response.result.data[0].emel);

                        $('#kompetensi').show();
                        $('input[name="no_kompetensi"]').val(response.result.data[0].no_sijil_kompetensi).prop('disabled',true);
                        $('input[name="tarikh_sijil"]').val(response.result.data[0].tarikh_sijil).prop('disabled',true);

                        $("#kompeten").find("tr").remove(); 
                        for(var i = 0; i < response.result.data.length; i++) {
                            $('#kompeten').append('<tr><td>' + (i+1) + '</td><td>' + response.result.data[i].nama +'</td>'+
                                '<td>' + response.result.data[i].no_kp + '</td>' + 
                                '<td>' + response.result.data[i].no_phone + '</td>' + 
                                '<td>' + response.result.data[i].jenis_kompetensi + '</td><td>' + response.result.data[i].no_sijil_kompetensi +'</td>'+
                                '<td>' + response.result.data[i].tarikh_sijil + '</td></tr>');
                        }

                        $("#hidden-data").find("input").remove(); 
                        for(var i = 0; i < response.result.data.length; i++) {
                            $('#hidden-data').append('<input name="jenis_kompetensi[]" type="hidden" value="' +  response.result.data[i].jenis_kompetensi +'">'+'<input name="no_sijil_kompetensi[]" type="hidden" value="' +  response.result.data[i].no_sijil_kompetensi +'">'+
                                '<input name="alamat[]" type="hidden" value="' +  response.result.data[i].alamat +'">'+
                                '<input name="phone[]" type="hidden" value="' +  response.result.data[i].no_phone +'">'+
                                '<input name="emel[]" type="hidden" value="' +  response.result.data[i].emel +'">'+
                                '<input name="tarikh_sijil[]" type="hidden" value="' +  response.result.data[i].tarikh_sijil +'">');
                        }



                    }

                    if (response.result.recordsTotal == 0) {
                        swal.fire('Tidak Rekod','No kad pengenalan tiada di dalam rekod.','error');
                        $('#wujud').hide();
                        $('#wujudbaru').hide();
                        $('#tidakwujud').show();
                        // $('#form-add')[0].reset();
                        $('#hantar').hide();
                        $('#kompetensi').hide();
                        $('input[name="no_kompetensi"]').val().prop('disabled',false);
                        $('input[name="tarikh_sijil"]').val().prop('disabled',false);
                    }
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Sila masukkan kad pengenalan untuk semakan sijil kompetensi.',
                    showConfirmButton: true,
                });
              } 
          }
      });

}

function onlyNumberKey(evt) {       
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
      return false; 
  return true; 
}
</script>
@endpush
