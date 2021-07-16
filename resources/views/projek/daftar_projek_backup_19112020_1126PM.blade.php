@extends('layouts.app')
@include('plugins.wizard')
@include('plugins.dropify')
@include('plugins.dropzone')
@include('plugins.datatables')

@section('content')

<style type="text/css">
    .next:hover {

    opacity:1.0 !important;

    box-shadow:none !important;

    }
</style>
<div class="jumbotron m-b-0" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                <li class="breadcrumb-item">Projek</li>
                <li class="breadcrumb-item active">Pendaftaran Projek</li>
            </ol>
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Pendaftaran Projek</h3>
                            <p class="hint-text m-t-5">Pendaftaran Projek-Projek Yang Tertakluk Kepada EIA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="rootwizard">
    <ul class="nav nav-tabs nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist">
        <li class="nav-item ml-md-3">
            <a class="active p-l-40" data-toggle="tab" href="#tab1" data-target="#tab1" role="tab"><span>Maklumat Projek</span></a>
        </li>
        <li class="nav-item ml-md-3">
            <a class="" data-toggle="tab" href="#tab2" data-target="#tab2" role="tab">EMP</a>
        </li>
        <li class="nav-item ml-md-3">
            <a class="" data-toggle="tab" href="#tab3" data-target="#tab3" role="tab">LDP2M2</a>
        </li>
        <li class="nav-item ml-md-3">
            <a class="" data-toggle="tab" href="#tab4" data-target="#tab4" role="tab">Audit Alam Sekeliling</a>
        </li>
        <!-- <li class="nav-item ml-md-3">
            <a class="" data-toggle="tab" href="#tab5" data-target="#tab5" role="tab">Program Pengawasan</a>
        </li> -->
    </ul>

    <form id='projek' role="form" method="post" action="{{ route('addProjek') }}" enctype="multipart/form-data">
    <div class="tab-content">
        <div class="tab-pane active slide-right" id="tab1">
            @include('projek.tab1backup')
        </div>

        <div class="tab-pane slide-right" id="tab2">
            @include('projek.tab2backup')
        </div>

        <div class="tab-pane slide-right" id="tab3">
            @include('projek.tab3backup')
        </div>

        <div class="tab-pane slide-right" id="tab4">
            @include('projek.tab4backup')
        </div>
 </form>
        <div class="tab-pane slide-right" id="tab5">

            <div class="row">
                <div class="col-md-12">
                    <ul class="pager wizard no-style">
                        <li class="submit">
                            <button value="{{ route('submitProjek', ['projekId'=>$Projek->id]) }}" class="btn btn-info btn-cons from-left pull-right submitProjek" type="button">
                                <span>Simpan</span>
                            </button>
                        </li>
                        <li class="previous">
                            <button class="btn btn-default btn-cons from-left" type="button">
                                <span>Kembali</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="alert alert-success" id="autosave" style="display:none; width:15%; text-align:center; position:fixed; z-index:9999; left:0; right:0; top:18px; margin:auto;">
    <a class="close"></a>Berjaya Disimpan
</div>

@include('projek._modal')

@endsection

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
        console.log('ldp sini');
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
        //     $('#lokasi').parents('div.form-group').addClass('has-error');
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

        if (error) {
            swal("", "Sila lengkapkan borang di bahagian yang berwarna merah.");
        } else {
            // var url = this.value;

            $.ajax({
                url: '{{ route("submitProjek", $Projek->id) }}',
                type: 'POST',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status1 == 'ok') {
                        swal({
                                title: "",
                                // text: "Maklumat projek telah disimpan.",
                                text: 
                                // "Maklumat projek telah dihantar. Pegawai JAS Negeri akan membuat semakan"
                                "Maklumat telah dihantar kepada Pegawai JAS Negeri untuk pengesahan. Sila semak status pengesahan pada menu Status Pendaftaran Projek",
                                
                                showConfirmButton: true,
                                confirmButtonText: "OK",
                            },
                            function() {
                                location.href = '{{ route('projek.senarai') }}';
                            });
                    } else {
                        swal(response.title, response.message, response.status);
                    }
                }
            });
        }
    });

</script>
@endpush
