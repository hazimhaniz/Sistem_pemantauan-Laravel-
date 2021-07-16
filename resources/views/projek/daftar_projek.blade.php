@extends('layouts.app')
@include('plugins.chartjs')
@include('plugins.wizard')
@include('plugins.dropify')
@include('plugins.dropzone')
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
            <?php setlocale(LC_TIME, "ms", "my_MS", "ms_MY"); ?>
            
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

<div class=" container-fluid container-fixed-lg bg-white m-t-20">
    <div class="modal-body m-t-20">
        <ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist">
            <li class="nav-item ml-md-3">
                <a class="active" data-toggle="tab" href="#" data-target="#tab1" role="tab" onclick=""><span>(1) MAKLUMAT PROJEK</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tab2" role="tab" onclick=""><span>(2) EMP & LDP2M2</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tab3" role="tab" onclick=""><span>(3) AUDIT ALAM SEKELILING</span></a>
            </li>    
        </ul>
        
        <div class="tab-content">
            <form id='projek' role="form" method="post" action="{{ route('addProjek') }}" enctype="multipart/form-data">
                <div class="tab-content">
                    <div class="tab-pane active slide-right" id="tab1">
                        @include('projek.tab1')
                    </div>

                    <div class="tab-pane slide-right" id="tab2">
                        @include('projek.tab2')
                    </div>

                    <div class="tab-pane slide-right" id="tab3">
                        @include('projek.tab3')

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- 
<div class="alert alert-success" id="autosave" style="display:none; width:15%; text-align:center; position:fixed; z-index:9999; left:0; right:0; top:18px; margin:auto;">
    <a class="close"></a>Berjaya Disimpan
</div>  -->
<!-- END CONTAINER FLUID -->
@endsection
    @include('projek.daftar_fasa_modal')

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


        .nav-tabs-blue.nav-tabs-fillup > li > a:after {
            background: none repeat scroll 0 0 #006c80;
            border: 1px solid #006c80;
        }


        .tableSummaryStatus > thead > tr > th {
            
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

        .tableSummaryStatus > tbody > tr > td {
            
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

        .tableSummaryFRP > thead > tr > th {
            
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

        .tableSummaryFRP > tbody > tr > td {
            
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


        .tableSummaryAppStatus > thead > tr > th {
            
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

        .tableSummaryAppStatus > tbody > tr > td {
            
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
            border-collapse:separate;
            border:solid #DDDDDD 1px;
            border-radius:6px;
            -moz-border-radius:6px;
        }

        td:first-child, th:first-child {
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
    </style>
    @endpush


    @push('js')
    <script type="text/javascript">

        function checkdateemp(){
            var form = $('#EMP');
            var data = new FormData(form[0]);
            var tarikh = new Date(data.get("tarikh_kelulusan"));
            var today = new Date();

            if(tarikh.getTime() >= today.getTime()){
                $('#datecheckemperror').show();
            // $('#datekomerror').show();
            var sijilkom = document.getElementById("datekom");
            sijilkom.classList.add("has-error");
        }else{
            $('#datecheckemperror').hide();
            var sijilkom = document.getElementById("datekom");
            sijilkom.classList.remove("has-error");
            // alert('Given date is not greater than the current date.');
        }
    }

    function checkdateldp(){
        // console.log('ldp sini');
        var form = $('#LDP2M2');
        var data = new FormData(form[0]);
        var tarikh = new Date(data.get("tarikh_kelulusan"));
        var today = new Date();

        if(tarikh.getTime() >= today.getTime()){
            $('#datecheckldperror').show();
                // $('#datekomerror').show();
                var sijilkom = document.getElementById("datekomldp");
                sijilkom.classList.add("has-error");
            }else{
                $('#datecheckldperror').hide();
                var sijilkom = document.getElementById("datekomldp");
                sijilkom.classList.remove("has-error");
                // alert('Given date is not greater than the current date.');
            }
        }
    // $('body').on('blur', 'input.projek, textarea.projek', function() {
    //     $('form#projek').submit();
    // });

    // $("#pakej_negeri").on('change', function() {
    //         $('form#projek').submit();
    //     });

    // $('body').on('change', 'input:radio[class=projek], select.projek', function() {
    //     $('form#projek').submit();
    // });

    // $('body').on('blur', 'input.projek1', function() {
    //     console.log('hai');
    //     $('button#savetab1').submit();
    // });

    $("input.projek1").on('change', function() {
        savetab1();
    });

    $("select.projek1").on('change', function() {
        savetab1();
    });

    // $('button.savetab1').on('submit', 'form#projek', function() {
        function savetab1(){
        // console.log('sini1');
        var form = $('#projek');
        tarikh_mula = $('#tarikh_mula').val();
        tarikh_akhir = $('#tarikh_akhir').val();
        if (tarikh_mula && tarikh_akhir) {
            if (tarikh_mula >= tarikh_akhir) {
                return false;
            }
        }
        console.log('save sini');
        // var formData = new FormData(form[0]);
        // console.log(formData.get('tarikh_mula') + ' tarikh mula test');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: new FormData(form[0]),
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response.jenis);
                if (response.status == 'ok') {
                    $('#autosave').fadeIn("fast", function() {
                        $(this).delay(2000).fadeOut("slow");
                    });
                    if (response.jenis != 0) {
                        if (response.jenis == 2) {
                            console.log('sini');
                            $('#tablePakej').DataTable().draw();
                        } else if (response.jenis == 1){
                            console.log('sini1');
                            $('#tabletidakPakej').DataTable().draw();
                        }
                    }
                    tableAudit.api().ajax.reload(null, false);
                    // tableFasa.api().ajax.reload(null, false);
                    // tableFasa.api().ajax.reload(null, false);
                    // location.reload();
                }
                if (response.status == 'error') {
                    swal("", "Sila lengkapkan borang di bahagian yang berwarna merah.");
                }
            }
        });
        return false;
    }

    $('body').on('click', '.simpanProjek', function(event) {

        location.href = '{{ route('projek.senarai') }}';

            // swal({
            //     title: "",
            //     text: "Adakah anda pasti ?",
            //     type: "",
            //     showCancelButton: true,
            //     confirmButtonClass: "btn-outline green-meadow",
            //     cancelButtonClass: "btn-danger",
            //     confirmButtonText: "Tidak",
            //     cancelButtonText: "Ya",
            //     // closeOnConfirm: true,
            //     // closeOnCancel: true,
            // },
            // function(isConfirm) {
            //     if (isConfirm) {
            //         swal.close()
            //     }else{
            //         location.href = '{{ route('projek.senarai') }}';
            //     }
            // });
        });

    $('body').on('click', '.submitProjek', function(event) {
        event.preventDefault();
        error = false;
        if ($("input[name='jenis_projek']:checked").val() == 1) {
            if ($('#kontraktor').val() == "") {
                $('#kontraktor').parents('div.form-group').addClass('has-error');
                error = true;
            }

            if ($('#alamat').val() == "") {
                $('#alamat').parents('div.form-group').addClass('has-error');
                error = true;
            }

            console.log($('#kontraktor').val());
            console.log($('#alamat').val());
            console.log($("#pakej_negeri1 option:selected").val());
            if($("#pakej_negeri1 option:selected").val() == "" ) {
                $('#pakej_negeri1').addClass('has-error');
                $('.selection').parents('div#pakej_negeri1').addClass('has-error');
                error = true;
            }
            console.log($('#tarikh_akhir').val());
            if ($('#tarikh_mula').val() == "") {
                $('#tarikh_mula').parents('div.form-group').addClass('has-error');
                error = true;
            }

            if ($('#tarikh_akhir').val() == "") {
                $('#tarikh_akhir').parents('div.form-group').addClass('has-error');
                error = true;
            }
        }
        // if ($('input[name=laporaneia]:checked').length == 0) {
        //     // console.log('eia');
        //     $('.laporaneiaVal').addClass('has-error');
        //     $('.aktivitiVal').addClass('has-error');
        //     error = true;
        // }

        if($("#laporaneia option:selected").val() == "" ) {
            // console.log('akt');
            $('.laporaneiaVal').addClass('has-error');
             $('#laporaneia').parents('div.form-group').addClass('has-error');
            error = true;
        }

        // if ($('select[name=aktiviti]:checked').length == 0) {
        //     $('.aktivitiVal').addClass('has-error');
        //     error = true;
        // }
        // if($("#aktiviti option:selected").val() == "" ) {
        //     // console.log('akt');
        //     $('.aktivitiVal').addClass('has-error');
        //      $('#aktiviti').parents('div.form-group').addClass('has-error');
        //     error = true;

        // }

        if ($('input[name=jenis_projek]:checked').length == 0) {
            $('.jenisprojekVal').addClass('has-error');
            error = true;
        }

        if ($("input[name='jenis_projek']:checked").val() == 2) {
            if ($('#tablePakej > tbody > tr > .dataTables_empty').length) {
                $(".disclaimerPakej").html("<b>Sila Isi Ruangan Ini!</b>");
                error = true;
            }
        }
        // if ($('#lokasi').val() == "") {
        //     console.log('lok');
        //     $('#lokasi').parents('div.form-group').saddClass('has-error');
        //     error = true;
        // }

        // if ($('#negeri').val() == "") {
        //     $('#negeri').parents('div.form-group').addClass('has-error');
        //     error = true;
        // }

        // if ($('#daerah').val() == "") {
        //     $('#daerah').parents('div.form-group').addClass('has-error');
        //     error = true;
        // }

        // if ($('#bandar').val() == "") {
        //     $('#bandar').parents('div.form-group').addClass('has-error');
        //     error = true;
        // }

        // if ($('#poskod').val() == "") {
        //     $('#poskod').parents('div.form-group').addClass('has-error');
        //     error = true;
        // }

        if ($('#alamat_surat').val() == "") {
            $('#alamat_surat').parents('div.form-group').addClass('has-error');
            error = true;
        }

        if ($("#surat_negeri option:selected").val() == "") {
        // console.log('srt_n');
            $('#surat_negeri').parents('div.form-group').addClass('has-error');
            $('.jenisN').addClass('has-error');
            error = true;
        }

        if ($("#surat_daerah option:selected").val() == "") {
             // console.log('srt_d');
            $('#surat_daerah').parents('div.form-group').addClass('has-error');
            error = true;
        }

        if ($('#surat_bandar').val() == "") {
            $('#surat_bandar').parents('div.form-group').addClass('has-error');
            error = true;
        }

        if ($('#surat_poskod').val() == "") {
            // console.log('pos');
            $('#surat_poskod').parents('div.form-group').addClass('has-error');
            error = true;
        }

        // if ($('#eo').val() == "") {
        //     $('#eo').parents('div.form-group').addClass('has-error');
        //     error = true;
        // }

        // if ($('#emc').val() == "") {
        //     $('#emc').parents('div.form-group').addClass('has-error');
        //     error = true;
        // }

// console.log($("#tableEMP > tbody > tr > .dataTables_empty").length);
        if ($('#tableEMP > tbody > tr > .dataTables_empty').length) {
            $(".disclaimerEmp").html("<b>Sila Isi Ruangan Ini!</b>");
            error = true;
        }

        if ($('#tableLDP2M2 > tbody > tr > .dataTables_empty').length) {
            $(".disclaimerLdp").html("<b>Sila Isi Ruangan Ini!</b>");
            error = true;
        }

        if ($('#tableAudit > tbody > tr > .dataTables_empty').length) {
            $(".disclaimerAudit").html("<b>Sila Isi Ruangan Ini!</b>");
            error = true;
        }

        if ($('input[name=\'jenis_pengawasan_id[]\'][value=1]').prop('checked')==true) {
            if( $('#errorSg').val()==0){
                $(".disclaimerSungai").html("<b>Sila Isi Ruangan Ini!</b>");
                error = true;
            }
        }

        if ($('input[name=\'jenis_pengawasan_id[]\'][value=2]').prop('checked')==true) {
            if( $('#errorMarin').val()==0){
                $(".disclaimerMarin").html("<b>Sila Isi Ruangan Ini!</b>");
                error = true;
            }
        }

        if ($('input[name=\'jenis_pengawasan_id[]\'][value=3]').prop('checked')==true) {
            if( $('#errorTasik').val()==0){
                $(".disclaimerTasik").html("<b>Sila Isi Ruangan Ini!</b>");
                error = true;
            }
        }

        if ($('input[name=\'jenis_pengawasan_id[]\'][value=4]').prop('checked')==true) {
            if( $('#errorTanah').val()==0){
                $(".disclaimerTanah").html("<b>Sila Isi Ruangan Ini!</b>");
                error = true;
            }
        }

        if ($('input[name=\'jenis_pengawasan_id[]\'][value=5]').prop('checked')==true) {
            if( $('#errorAir').val()==0){
                $(".disclaimerAir").html("<b>Sila Isi Ruangan Ini!</b>");
                error = true;
            }
        }

        if ($('input[name=\'jenis_pengawasan_id[]\'][value=6]').prop('checked')==true) {
            if( $('#errorUdara').val()==0){
                $(".disclaimerUdara").html("<b>Sila Isi Ruangan Ini!</b>");
                error = true;
            }
        }

        if ($('input[name=\'jenis_pengawasan_id[]\'][value=7]').prop('checked')==true) {
            if( $('#errorBunyi').val()==0){
                $(".disclaimerBunyi").html("<b>Sila Isi Ruangan Ini!</b>");
                error = true;
            }
        }

        if ($('input[name=\'jenis_pengawasan_id[]\'][value=8]').prop('checked')==true) {
            if( $('#errorGetaran').val()==0){
                $(".disclaimerGetaran").html("<b>Sila Isi Ruangan Ini!</b>");
                error = true;
            }
        }


        // if ($('input[name=peringkat_audit]:checked').length == 0) {
        //     // console.log('peringkat_audit');
        //     $('.peringkatAudit').addClass('has-error');
        //     error = true;
        // }

         if($("#peringkat_audit option:selected").val() == "" ) {
            // console.log('akt');
            $('.peringkatAudit').addClass('has-error');
             $('#peringkat_audit').parents('div.form-group').addClass('has-error');
            error = true;

        }

        if ($('input[name=jenis]:checked').length == 0) {
            // console.log('jenis');
            $('.tempohAudit').addClass('has-error');
            error = true;
        }

        // if (error) {
        //     alert("Sila lengkapkan borang di bahagian yang berwarna merah.");
        // } else {
            // var url = this.value;

            $.ajax({
                url: '{{ route("submitProjek", $Projek->id) }}',
                type: 'POST',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status1 == 'ok') {
                        // alert({
                                // title: "",
                                // text: "Maklumat projek telah disimpan.",
                                // text: 
                                // "Maklumat projek telah dihantar. Pegawai JAS Negeri akan membuat semakan"
                                // "Maklumat telah dihantar kepada Pegawai JAS Negeri untuk pengesahan. Sila semak status pengesahan pada menu Status Pendaftaran Projek",
                                
                                // showConfirmButton: true,
                                // confirmButtonText: "OK",
                            // },
                            // function() {
                                location.href = '{{ route('projek.senarai') }}';
                            // });
                        } else {
                            alert("response.title, response.message, response.status");
                        }
                    }
                });
        // }
    });

</script>
@endpush

