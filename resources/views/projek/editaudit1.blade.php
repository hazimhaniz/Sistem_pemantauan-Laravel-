@include('layouts.modal')

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Tarikh Cadangan Audit Alam Sekeliling</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body m-t-20">
                <form id='form-audit-edit' role="form" method="post" action="{{ route('projek.updatemaklumataudit1') }}">

                <input type="hidden" name="id" value="{{$audit->projek_id}}">
                <input type="hidden" name="frequent" value="{{$frequent}}"><br><br>
                    <div class="form-group row control-label col-md-12">

                        <label class="col-md-3">Bulan<span style="color:red;">*</span> </label>
                          <div class="col-md-3">
                            <div id="bulan_container">
                            <select class="full-width autoscroll state" name="bulan" id="bulan" data-init-plugin="select2">
                              <option value="" selected="" disabled="">Pilih Bulan</option>
                              @foreach($master_bulan as $month)
                              <option value="{{$month->id}}" @if($audit->tarikh_audit && (date('m', strtotime($audit->tarikh_audit)) == sprintf("%02d", $month->id))) selected="" @endif>{{$month->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <label class="col-md-3">Tahun<span style="color:red;">*</span> </label>
                        <div class="col-md-3">
                            <div id="tahun_container">
                          <select class="full-width autoscroll state" name="tahun" id="tahun" data-init-plugin="select2">
                            <option value="" selected="" disabled="">Pilih Tahun</option>
                            @foreach($master_tahun as $year)
                            <option value="{{$year}}" @if(date('Y', strtotime($audit->tarikh_audit)) == $year) selected="" @endif>{{$year}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="submitForm('form-audit-edit')">Simpan</button>
                <button class="btn btn-danger" data-dismiss="modal" type="button">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
// $("#modal-edit").modal("show");
$('#modal-edit').modal({
    backdrop: 'static',
    keyboard: false
});
$('.modal form').trigger("reset");
$(".modal form").validate();

// $( "#tarikh_audit" ).datepicker("setDate", new Date());

$("#form-audit-edit").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid())
      return;

    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: new FormData(form[0]),
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
            swal(data.title, data.message, '');
            $("#modal-edit").modal("hide");
            tableAudit.api().ajax.reload(null, false);
        }
    });
});
</script>
