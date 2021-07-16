<style>
    .table>tbody>tr>td {
        padding: 6px;
        vertical-align: top !important;

        //font-size: 11px !important;
        //border: 1px solid #DDDDDD;
        color: #000 !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
    }

    .table thead tr th {
        padding: 4px;
        vertical-align: top !important;
        /* text-align: left !important; */
        font-size: 11px !important;
        //border: 1px solid #DDDDDD;
        color: #000 !important;
    }

    .checkbox-wrapper {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
    }
</style>

<div class="tab-content">
    <form method="POST" action="{{route('form.borangEF')}}" id="borangEF">

        <input type="hidden" name="current_tab" id="current_tab_5" value="3">
        @if($borangE)
        <input id="tot" type="hidden" class="form-control" value="{{date('d-m-Y',strtotime($borangE->projek->projekAudit->tarikh_audit))}}" autocomplete="off" readonly>
        <input class="form-control" type="hidden" name="borangE_id" value="{{ $borangE->id }}" autocomplete="off" readonly>
        <input class="form-control" type="hidden" name="projek_audit" value="{{ $borangE->projek->projekAudit->id }}" autocomplete="off" readonly>
        <input class="form-control" type="hidden" name="projek_id" value="{{ $borangE->projek_id }}" autocomplete="off" readonly>
        <input class="form-control" type="hidden" id="bulan" name="bulan" value="{{ $month }}" autocomplete="off" readonly>
        <input class="form-control" type="hidden" name="tahun" value="{{ $year }}" autocomplete="off" readonly>
        <input type="hidden" id="bulan_audit" value="{{date('m',strtotime($borangE->projek->projekAudit->tarikh_audit))}}">
        @endif
        <?php (int)$bulan = date('m', strtotime($borangE->projek->projekAudit->tarikh_audit));  ?>
        <div class="tab-pane active slide-right" id="tab3_view">
            <div class="m-t-20">
                <div class="card card-transparent">
                    <div class="card-block">
                    <div id="alertEF"></div>
                        <div class="alert alert-primary" style="font-size:14.5px; font-family: 'Montserrat'">
                            <label> LAPORAN BULANAN BAHAGIAN E (PERLAKSANAAN AUDIT) BAGI BULAN {{ $month }} TAHUN {{ $year }}.</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-attached m-b-10">
                                    <div class="form-check form-check-inline" style="margin-bottom:0px">
                                        <div class="radio radio-primary">
                                            <input name="jenis_audit" value="kemaskini_audit" id="kemaskini_audit" type="radio" class="hidden"  {{($borangE->status_id==602)?'disabled':''}} {{($borangE->type_of_audit==1)?'checked':''}} {{($bulan==$month)?'checked':''}}>
                                            <label for="kemaskini_audit">KEMASKINI AUDIT</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="jenis_audit" value="tidak_dijadualkan" id="tidak_dijadualkan" type="radio" class="hidden" {{($bulan!=$month)?'checked':''}}  {{($borangE->status_id==602)?'disabled':''}} {{($borangE->type_of_audit==2)?'checked':''}}>
                                            <label for="tidak_dijadualkan">TIDAK DIJADUALKAN</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">TARIKH CADANGAN AUDIT</b></span><i class="fa fa-calendar"></i>
                                                </label>
                                                <input class="form-control" name="tarikh_cadangan_audit" autocomplete="off" value="{{($bulan!=$month)?'':date('d/m/Y',strtotime($borangE->projek->projekAudit->tarikh_audit))}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">TARIKH AUDIT DIJALANKAN</b></span>
                                                    <i class="fa fa-calendar"></i><span style="color:red;">*</span>
                                                </label>
                                                <input class="form-control datepicker" name="tarikh_audit_dijalankan" autocomplete="off" required  value="{{($borangE->tarikh_perlaksanaan_audit)?date('d/m/Y',strtotime($borangE->tarikh_perlaksanaan_audit)):''}}" {{($borangE->status_id==602)?'disabled ':'class="form-control datepicker "'}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">AUDITOR</b></span>
                                            <span style="color:red;">*</span>
                                        </label>
                                        <input id="auditor" class="form-control form-control-lg" name="auditor" type="text" value="{{($borangE->audit)?$borangE->audit:''}}" {{($borangE->status_id==602)?'readonly':''}}>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ncr" id="susun" class="col-md-3 control-label">
                                        <b>&nbsp; ADA NCR :</b>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="form-check col-md-3 form-check-inline">
                                            <input class="form-check-input" name="ncr" type="radio" name="ncr" id="ncr_ya" value="yes"  @if($borangE->ncr_op == 'yes') checked @endif {{($borangE->status_id==602)?'disabled':''}}>
                                            <label>YA</label>
                                        </div>
                                        <div class="form-check col-md-3 form-check-inline">
                                            <input class="form-check-input" name="ncr" type="radio" name="ncr" id="ncr_tidak" value="no" @if($borangE->ncr_op == 'no') checked @endif {{($borangE->status_id==602)?'disabled':''}}>
                                            <label>TIDAK</label>
                                        </div>
                                    </div>

                                    <label for="ofi" id="susun" class="col-md-3 control-label">
                                        <b>ADA OFI :</b>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="form-check col-md-3 form-check-inline">
                                            <input class="form-check-input" type="radio" name="ofi" id="ofi_ya" name="ofi" value="yes"  @if($borangE->ofi_op == 'yes') checked @else @endif {{($borangE->status_id==602)?'disabled':''}}>
                                            <label>YA</label>
                                        </div>
                                        <div class="form-check col-md-3 form-check-inline">
                                            <input class="form-check-input" type="radio" name="ofi" id="ofi_tidak" name="ofi" value="no" @if($borangE->ofi_op == 'no') checked @else @endif {{($borangE->status_id==602)?'disabled':''}}>
                                            <label>TIDAK</label>
                                        </div>
                                    </div>
                                </div>


                                <label style="font-family: 'Montserrat'">DOKUMEN SOKONGAN</label>
                                @if(empty($borangE->path))
                                <div class="input-group file-caption-main">
                                    <div class="input-group-btn input-group-append">
                                        <div tabindex="500" class="btn btn-default">
                                            <input type="file" id="upload_file" name="files" {{($borangE->status_id==602)?'disabled':''}}>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="input-group file-caption-main">
                                    <div class="input-group-btn input-group-append">
                                        <div tabindex="500" class="btn btn-default">
                                            <a href="{{ Storage::url($borangE->path) }}" download> Dokumen </a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-attached m-b-10">
                                    <div class="form-check form-check-inline" style="">
                                        <div class="checkbox check-primary">
                                            <input name="tidak_dapat_melaksanakan_audit" value="1" id="tidak_dapat_melaksanakan_audit" type="checkbox" class="hidden" {{($borangE->status_id==602)?'readonly':''}} {{($borangE->sebab)?'checked':''}}>
                                            <label for="tidak_dapat_melaksanakan_audit">TIDAK DAPAT MELAKSANAKAN AUDIT</label>
                                        </div>
                                    </div>
                                </div>
                                <textarea class="form-control border border-default rounded" name="sebab_tidak_melaksanakan" id="sebab_tidak_melaksanakan" style="height: 220px;" disabled aria-invalid="false" {{($borangE->status_id==602)?'readonly':''}}>
                                    {{($borangE->sebab)?$borangE->sebab:''}}
                                </textarea>
                            </div>
                        </div>
                    </br>
                    <div class="alert alert-primary" style="font-size:14.5px; font-family: 'Montserrat'">
                        <label> LAPORAN BULANAN BAHAGIAN F (PERLAKSANAAN EMT) BAGI BULAN {{ $month }} TAHUN {{ $year }}</label>
                    </div>
                    <input class="form-control" type="hidden" name="borangF_id"  value="{{ $borangF->id }}" autocomplete="off" readonly>
                    <label style="font-family: 'Montserrat'"><b>STATUS PELAKSANAAN EMT BAGI BULAN JANUARI TAHUN 2020</b></label><br><br>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="ep" value="1" id="ep" type="checkbox" class="hidden" @if($borangF->ep == '1') checked @else @endif {{($borangF->status_id==602)?'disabled':''}}>
                            <label for="ep">Environmental Policy (EP)</label>
                        </div>
                    </div>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="eb" value="1" id="eb" type="checkbox" class="hidden" @if($borangF->eb == '1') checked @else @endif {{($borangF->status_id==602)?'disabled':''}}>
                            <label for="eb">Environmental Budgeting (EB)</label>
                        </div>
                    </div>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="ec" value="1" id="ec" type="checkbox" class="hidden" @if($borangF->ec == '1') checked @else @endif {{($borangF->status_id==602)?'disabled':''}}>
                            <label for="ec">Environmental Competency (EC)</label>
                        </div>
                    </div>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="ef" value="1" id="ef" type="checkbox" class="hidden" @if($borangF->ef == '1') checked @else @endif {{($borangF->status_id==602)?'disabled':''}}>
                            <label for="ef">Environmental Facility (EF)</label>
                        </div>
                    </div>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="emc" value="1" id="emc" type="checkbox" class="hidden" @if($borangF->emc == '1') checked @else @endif {{($borangF->status_id==602)?'disabled':''}}>
                            <label for="emc">Environmental Monitoring Committee (EMC)</label>
                        </div>
                    </div>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="erc" value="1" id="erc" type="checkbox" class="hidden" @if($borangF->erc == '1') checked @else @endif {{($borangF->status_id==602)?'disabled':''}}>
                            <label for="erc">Environmental Reporting and Communication (ERC)</label>
                        </div>
                    </div>
                    <div class="form-check form-check-inline"style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="et" value="1" id="et" type="checkbox" class="hidden" @if($borangF->et == '1') checked @else @endif {{($borangF->status_id==602)?'disabled':''}}>
                            <label for="et">Environmental Transparency (ET)</label>
                        </div>
                    </div>
                    <input name="borangFvalidate" value="" id="borangFvalidate" class="hidden">
                    <br><br>
                    <div class="form-group form-group-default  dim">
                        <label style="font-size:13px; font-family: 'Montserrat' ">
                            <span id="label_checkbox_declaration_in_modal">Perakuan</span>
                        </label>
                        <div class="checkbox check-primary ">
                            <input name="perakuan" value="2" id="perakuan" type="checkbox" @if($borangF->status_id==602) checked disabled @else @endif>
                            <label style="font-size:13px; font-family: 'Montserrat'" for="perakuan" >
                                DENGAN INI SAYA MENGAKU DAN MENGESAHKAN SEMUA KENYATAAN DAN BUTIR-BUTIR YANG DIKEMUKAKAN ADALAH BENAR.
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12 p-t-20" style="display: none;" id="show_simpan">
                        <ul class="pager wizard no-style">
                            <li>
                                <button onclick="submitFormEF('borangEF')" class="btn btn-info btn-cons from-left pull-right" id="simpan" type="button">
                                    <span>Simpan</span>
                                </button>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</form>
</div>

@push('js')

<script type="text/javascript">
    $(document).ready(function() {
        $('#current_tab').on('click', function() {
            console.log($('#current_tab').val());
            if (('#current_tab').attr('value') == 3) {
                if ($('#tidak_dijadualkan').is(':checked')) {
                    $('#sebab_tidak_melaksanakan').prop('disabled', true);
                    $('#tidak_dapat_melaksanakan_audit').prop('disabled', true);
                    $('#kemaskini_audit').prop('disabled', true);
                    $('input[name="tarikh_audit_dijalankan"]').prop('disabled', true);
                    $('input[name="tarikh_cadangan_audit"]').prop('disabled', true);
                    $('#auditor').prop('disabled', true);
                    $('#ncr_ya').prop('disabled', true);
                    $('#ncr_tidak').prop('disabled', true);
                    $('#ofi_ya').prop('disabled', true);
                    $('#ofi_tidak').prop('disabled', true);
                    $('#input-ke-salinan').prop('disabled', true);
                    $('#btn-muatnaik').prop('disabled', true);
                }
            }
        });
    });


    $('#perakuan').change(function() {
        if ($(this).is(':checked') == true) {
            $('#show_simpan').show();
        } else {
            $('#show_simpan').hide();
        }
    });

    $('#ep,#eb,#ec,#ef,#emc,#erc,#et').change(function() {
        if ($(this).is(':checked') == true) {
            $('#borangFvalidate').val(1);
        }
        if ($('#ep,#eb,#ec,#ef,#emc,#erc,#et').is(':checked') == false) {
                $('#borangFvalidate').val(null);
        }
    });
    function submitFormEF(form_id) {
        var form = $("#borangEF");
        Swal.fire({
            title: 'Adakah Anda Pasti?',
            text: 'Data akan disimpan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#038cfc',
            cancelButtonColor: '#999',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ route('form.borangEF') }}",
                    method: "POST",
                    data: new FormData(form[0]),
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success){
                            swal.fire(data.test, data.text, data.status);
                            location.reload();
                        }else if (!data.success && data.code == 422) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Sila Penuhkan Ruang Yang Diperlukan',
                                // text: data.message,
                                showConfirmButton: true,
                            });
                            
                            let html = ``;
                            html += `<div class="alert alert-danger alert-dismissible fade show" id="alertEF">`;
                            html += `<button type="button" class="close" data-dismiss="alert"></button>`;
                            $.each(data.message, (key, value) => {
                                html += `<strong>&bull; ${value}</strong><br />`;
                            });
                            html += `</div>`;
                            $(`#alertEF`).empty().append(html);
                        }else{
                            swal.fire(data.test, data.text, data.status);
                            location.reload();
                        }
                    },
                    fail: (data) => {
                        Swal.fire(
                            'Ralat!',
                            'Berlaku ralat, kami mohon maaf atas kesulitan.',
                            'danger'
                        )
                    }
                })
            }
        })
    }

    var tarikh_cadangan_audit = $('#tot').val();
    $('#kemaskini_audit').change(function() {
        if ($(this).is(':checked')) {
            $('input[name="tarikh_cadangan_audit"]').val(tarikh_cadangan_audit);
        }
    })


    $('#tidak_dapat_melaksanakan_audit').change(function() {
        var tempBulanAudit = $('#bulan_audit').val();
        var tempBulanSkrg = $('#bulan').val();
        // alert(tempBulanAudit + tempBulanSkrg);
        if ($(this).is(':checked')) {
            $('#sebab_tidak_melaksanakan').prop('disabled', false);
            $('#kemaskini_audit').prop('disabled', true);
            $('#tidak_dijadualkan').prop('disabled', true);
            $('input[name="tarikh_audit_dijalankan"]').prop('disabled', true);
            $('input[name="tarikh_cadangan_audit"]').prop('disabled', true);
            $('#auditor').prop('disabled', true);
            $('#ncr_ya').prop('disabled', true);
            $('#ncr_tidak').prop('disabled', true);
            $('#ofi_ya').prop('disabled', true);
            $('#ofi_tidak').prop('disabled', true);
            $('#input-ke-salinan').prop('disabled', true);
            $('#btn-muatnaik').prop('disabled', true);
            $('#upload_file').prop('disabled', true);

        } else {
            $('#sebab_tidak_melaksanakan').prop('disabled', true);
            $('#kemaskini_audit').prop('disabled', false);
            if (tempBulanAudit == tempBulanSkrg){
                $('#tidak_dijadualkan').prop('disabled', true);
            }else{
                $('#tidak_dijadualkan').prop('disabled', false);
            }
            $('input[name="tarikh_cadangan_audit"]').prop('disabled', false);
            $('input[name="tarikh_audit_dijalankan"]').prop('disabled', false);
            $('#auditor').prop('disabled', false);
            $('#ncr_ya').prop('disabled', false);
            $('#ncr_tidak').prop('disabled', false);
            $('#ofi_ya').prop('disabled', false);
            $('#ofi_tidak').prop('disabled', false);
            $('#input-ke-salinan').prop('disabled', false);
            $('#btn-muatnaik').prop('disabled', false);
            $('#upload_file').prop('disabled', false);
        }
    });

    $('#tidak_dijadualkan').change(function() {
        if ($(this).is(':checked')) {
            $('input[name="tarikh_audit_dijalankan"]').prop('disabled', true);
            $('input[name="tarikh_cadangan_audit"]').prop('disabled', true);
            $('#kemaskini_audit').prop('disabled', false);
            $('#tidak_dijadualkan').prop('disabled', false);
            $('#auditor').prop('disabled', true);
            $('#ncr_ya').prop('disabled', true);
            $('#ncr_tidak').prop('disabled', true);
            $('#ofi_ya').prop('disabled', true);
            $('#ofi_tidak').prop('disabled', true);
            $('#input-ke-salinan').prop('disabled', true);
            $('#btn-muatnaik').prop('disabled', true);
            $('#upload_file').prop('disabled', true);
        }
    });

    $('#kemaskini_audit').change(function() {
        if ($(this).is(':checked')) {
            $('input[name="tarikh_audit_dijalankan"]').prop('disabled', false);
            $('input[name="tarikh_cadangan_audit"]').prop('disabled', false);
            $('#kemaskini_audit').prop('disabled', false);
            $('#tidak_dijadualkan').prop('disabled', false);
            $('#auditor').prop('disabled', false);
            $('#ncr_ya').prop('disabled', false);
            $('#ncr_tidak').prop('disabled', false);
            $('#ofi_ya').prop('disabled', false);
            $('#ofi_tidak').prop('disabled', false);
            $('#input-ke-salinan').prop('disabled', false);
            $('#btn-muatnaik').prop('disabled', false);
            $('#upload_file').prop('disabled', false);
        }
    });
</script>


@endpush