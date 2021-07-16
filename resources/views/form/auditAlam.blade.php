<style>
    label {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
    }

    .hidden-xs {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;

    }

    .btn {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        s
    }

    .dashTitle {
        font-family: 'Montserrat' !important;
        font-size: 12.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;

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
        text-align: center !important;
    }

    .modal-lg1 {
        max-width: 50% !important;
        width: 50% !important;
        margin: 0 auto !important;
    }

    .title1 {
        font-weight: 500 !important;
        font-size: 14.5px !important;
        font-family: 'Montserrat' !important;
    }

</style>


    <div id="add_message_1"></div>
    <div class="row">
    <div id="alertHantar"></div>
    <div class="col-md-12">
        <div class="title1"><b>MAKLUMAT AUDIT ALAM SEKELILING</b></div>
        <br class="formAudit">
        <div class="dashTitle formAudit"><b>Status Kemajuan</b> <span style="color:red;">*</span> </div>
        <div class="row formAudit">
            @foreach($peringkatPengawasans as $peringkatPengawasan)
            <div class="col-md-3">
                <div class="form-group">
                    <div class="check-primary">
                        <input type="radio" name="peringkatPengawasan" value="{{ $peringkatPengawasan->id }}" id="peringkatPengawasan_{{ $peringkatPengawasan->id }}" class="auditData">
                        <label for="peringkatPengawasan_{{ $peringkatPengawasan->id }}"> {{ $peringkatPengawasan->name }} </label>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <div class="dashTitle formAudit"><b>Tempoh Audit Alam Sekeliling</b> <span style="color:red;">*</span> </div>

        <div class="row formAudit">
            @foreach($tempohAudits as $tempohAudit)
            <div class="col-md-3">
                <div class="form-group">
                    <div class="check-primary">
                        <input type="radio" name="tempohAudit" value="{{ $tempohAudit->id }}" id="tempohAudit_{{ $tempohAudit->id }}" class="auditData">
                        <label for="tempohAudit_{{ $tempohAudit->id }}"> {{ $tempohAudit->name }} </label>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="form-group-attached m-b-12 formAudit">
            <div class="row">
                <div class="col-md-12">
                  <!--   <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">Tarikh Cadangan Audit &nbsp; <i class="fa fa-calendar"></i> </b></span><span style="color:red;">*</span>
                            </label>
                            <input name="tarikh_cadangan_audit" class="form-control datepicker auditData" data-date-start-date="{{ $projek->tarikh_awal ? $projek->tarikh_awal->format('d/m/Y') : '' }}" data-date-end-date="{{ $projek->tarikh_akhir ? $projek->tarikh_akhir->format('d/m/Y') : '' }}" required>
                        </div>
                    </div> -->
                </div>

            </div>

        </div>

        <!--  <div class="row newdate">
            <div  class="col-md-3">

                <label><b>Tarikh Perlaksanaan Laporan : </b></label>
                <input id="effective_date" name="effective_date" type="date" class="form-control datepicker" >
            </div>
        </div> -->

        <label class="formAudit" style="color: red;"><b>Penjadualan Audit tidak boleh dibuat di dalam bulan yang sama</b></label>
        <br>
        <div class="dashTitle"><b>Jadual Audit</b>.</div>

        <div id="projekAuditTable"></div>

        <div class="col-md-12 p-t-20">
            <ul class="pager wizard no-style">
                <li class="submit">
                    <a onclick="hantar()" class="btn btn-success btn-cons from-left pull-right">
                        <span>Hantar</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>

<div class="modal fade" id="editAudit" tabindex="-1" role="dialog" aria-labelledby="editAuditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editAuditLabel">Kemaskini Audit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">Tarikh Cadangan Audit </b></span><span style="color:red;">*</span>
                            </label>
                            <input id="tarikh_cadangan_audit_edit" name="tarikh_cadangan_audit_edit" class="form-control datepicker" required>
                        </div>
                    </div>
                </div>
<!--                 <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">No. Rujukan </b></span><span style="color:red;">*</span>
                            </label>
                            <input id="no_rujukan_audit_edit" name="no_rujukan_audit_edit" class="form-control" required>
                        </div>
                    </div>
                </div> -->

            </div>
            <input type="hidden" id="projekAuditID" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" onclick="saveEditAudit()" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>

<script>
    $( document ).ready(function() {
    $('#effective_date').removeAttr("disabled")

});

    var tambahMaklumatAudit;
    var editAudit;
    var saveEditAudit;
    $(document).ready(function(){
        $("#projekAuditTable").load("{{ url('/projek/pendaftaranprojek/senarai_audit/') }}/{{ $projek->id }}");

        tambahMaklumatAudit = function()
        {
            var peringkatPengawasan = $("input[name='peringkatPengawasan']:checked").val();
            var tempohAudit = $("input[name='tempohAudit']:checked").val();
            //var tarikh_cadangan_audit = $("input[name='tarikh_cadangan_audit']").val();

            if(peringkatPengawasan && tempohAudit)
            {
                var formData = new FormData;

                formData.append('peringkatPengawasan', peringkatPengawasan);
                formData.append('tempohAudit', tempohAudit);
                //formData.append('tarikh_cadangan_audit', tarikh_cadangan_audit);

                $.ajax({
                    url: "{{ url('/projek/pendaftaranprojek/tambah_audit') }}/{{ $projek ? $projek->id : '' }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    async: false,
                    success: function(response) {
                        $("#projekAuditTable").load("{{ url('/projek/pendaftaranprojek/senarai_audit/') }}/{{ $projek->id }}");
                    }
                });
            }
        }

        $(".auditData").on('change', function(){
            tambahMaklumatAudit();
        });

        editAudit = function(projekAuditID, currentDate, currentNoRuj)
        {
            console.log(projekAuditID);
            $("#projekAuditID").val(projekAuditID);
            $("#tarikh_cadangan_audit_edit").val(currentDate);
            $("#no_rujukan_audit_edit").val(currentNoRuj);
            $("#editAudit").modal('show');
        }

        saveEditAudit = function()
        {
            var tarikh_cadangan_audit_edit = $("#tarikh_cadangan_audit_edit").val();
            var no_rujukan_audit_edit = $("#no_rujukan_audit_edit").val();
            var projekAuditID = $("#projekAuditID").val();

            if(tarikh_cadangan_audit_edit)
            {
                var formData = new FormData;
                formData.append('tarikh_cadangan_audit_edit', tarikh_cadangan_audit_edit);
                formData.append('no_rujukan_audit_edit', no_rujukan_audit_edit);
                $.ajax({
                    url: "{{ url('/projek/pendaftaranprojek/edit_audit') }}/" + projekAuditID,
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $("#projekAuditTable").load("{{ url('/projek/pendaftaranprojek/senarai_audit/') }}/{{ $projek->id }}");
                        $("#editAudit").modal('hide');
                        if(response.success)
                        {
                            Swal.fire('Berjaya', 'Maklumat Telah Dikemaskini', 'success');
                        }
                        else{
                            if (response.message ) {
                                Swal.fire('Gagal', response.message, 'error');
                            } else {
                                Swal.fire('Gagal', 'Maklumat Gagal Dikemaskini', 'error');
                            }
                        }
                    }
                });
            }
        }
    });

    function hantar() {
        $.ajax({
            url: "{{ url('/projek/pendaftaranprojek/hantar/') }}/{{ $projek->id }}",
            method: "GET",
            // data: formData,
            // contentType: false,
            // processData: false,
            success: function(response) {
                if(response.success == false) {
                    let html = ``;
                    html += `<div class="alert alert-danger alert-dismissible fade show" id="alertESCP">`;
                    html += `<button style="pull-right" type="button" class="close" data-dismiss="alert"></button>`;
                    $.each(response.message, (key, value) => {
                        html += `<strong>&bull; ${value}</strong><br />`;
                    });
                    html += `</div>`;
                    $('#alertHantar').empty().append(html);

                } else {
                    Swal.fire('Berjaya', 'Maklumat Telah Berjaya Disimpan', 'success')
                    .then(() => { window.location.href = "{{ route('home') }}"; });
                }
            }
        });
    }


</script>
