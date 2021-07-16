
<style type="text/css">
    .cancel {
        background: #1f3953 !important;
        color: white;
    }

    .cancel:hover{
        color: white;
    }
</style>
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">Status Projek</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body m-t-20">
                <form id='form-audit-edit' role="form" method="post" action="{{ route('update',$jasfail->id) }}">

                <input type="hidden" name="id" value="{{$jasfail->id}}">
                @include('components.input', [
                'label' => 'No Fail JAS',
                'info' => 'No Fail JAS',
                'name' => 'nofail',
                'id' => 'nofail',
                'mode' => 'readonly',
                'value' => $jasfail->nofail,
                ])

                @include('components.input', [
                'label' => 'Nama Projek',
                'info' => 'eg: Projek A',
                'name' => 'name',
                'id' => 'name',
                'mode' => 'readonly',
                'value' => $jasfail->name,
                ])

                @include('components.input', [
                'label' => 'Status Kemajuan Kerja Projek',
                'info' => 'Status Kemajuan Kerja Projek',
                'name' => 'status1',
                'id' => 'status1',
                'mode' => 'readonly',
                'value' => strtoupper($status1),
                ])
                <input type="hidden" name="status" value="{{$status}}">
                @include('components.input', [
                'label' => 'Kod Aktiviti',
                'id' => 'aktivitikod',
                'name' => 'aktivitikod',
                'mode' => 'readonly',
                'value' => strtoupper($aktivitikod),
                ])

                @include('components.input', [
                'label' => 'Aktiviti',
                'id' => 'aktiviti',
                'name' => 'aktiviti',
                'mode' => 'readonly',
                'value' => strtoupper($aktiviti),
                ])

                <!-- <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                	<label class="control-label">Peringkat Pengawasan<span style="color:red;">*</span></label>
                	<div class="col-md-12">
                        <select id="status" name="status" class="form-control full-width autoscroll projek required" data-init-plugin="select2" required>
                        <option disabled hidden selected="" value="">Sila Pilih</option>
                        @foreach($peringkatPengawasan as $index => $value)
                        <option value="{{$value->id}}" name="status" required>{{ $value->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div> -->
                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label class="control-label"> <span class="label label-light-blue">AGIHAN TUGAS PEGAWAI PENYIASAT KEPADA</span> <span style="color:red;">*</span></label>
                    <div class="col-md-12">                            
                        <select id="penyiasat" name="penyiasat" class="form-control full-width autoscroll projek required" data-init-plugin="select2" required {{(Auth::user()->hasRole('penyiasat') || Auth::user()->hasRole('pengarah'))?'disabled':''}}>
                            <option disabled hidden selected="" value="">Sila Pilih</option>
                            @foreach($staff_states as $index => $staff_state)
                            <option value="{{$staff_state->detail_user->id}}" name="penyiasat" required>{{ $staff_state->detail_user->name." (".$staff_state->detail_user->email.")" }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label class="control-label"> <span class="label label-light-blue"> Agihan Tugas Pegawai Penyelia Kepada </span> <span style="color:red;">*</span></label>
                    <div class="col-md-12">                            
                        <select id="penyelia" name="penyelia" class="form-control full-width autoscroll projek required" data-init-plugin="select2" required {{(Auth::user()->hasRole('penyiasat') || Auth::user()->hasRole('pengarah'))?'disabled':''}}>
                            <option disabled hidden selected="" value="">Sila Pilih</option>
                            @foreach($staff_penyelia as $index => $staff_state)
                            <option value="{{$staff_state->detail_user->id}}" name="penyelia" required>{{ $staff_state->detail_user->name." (".$staff_state->detail_user->email.")" }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label class="control-label"> <span class="label label-light-blue"> Agihan Tugas Pelulus Kepada </span> <span style="color:red;">*</span></label>
                    <div class="col-md-12">                            
                        <select id="pelulus" name="pelulus" class="form-control full-width autoscroll projek required" data-init-plugin="select2" required {{(Auth::user()->hasRole('penyiasat') || Auth::user()->hasRole('pengarah'))?'disabled':''}}>
                            <option disabled hidden selected="" value="">Sila Pilih</option>
                            @foreach($staff_pelulus as $index => $staff_state)
                            <option value="{{$staff_state->detail_user->id}}" name="pelulus" required>{{ $staff_state->detail_user->name." (".$staff_state->detail_user->email.")" }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button id="btnsubmit" type="button" class="btn btn-info" onclick="submitForm('form-audit-edit')">Simpan</button>
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

$( "#tarikh_audit" ).datepicker("setDate", new Date());

$("#form-audit-edit").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid())
      return;

    @if(optional($jasfail->distribute)->assigned_to_user_id)

     $.ajax({

            url: form.attr('action'),
            method: form.attr('method'),
            data: new FormData(form[0]),
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                alert(data.message);
                $("#modal-edit").modal("hide");
                table.api().ajax.reload(null, false);
                // location.reload();
            }
            });

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
    //     // closeOnCancel: false,
    //     showLoaderOnConfirm: true,
    // },
    // function(isConfirm) {
    //     if (isConfirm) {
    //     } else {
    //         var btnsubmit = document.getElementById("btnsubmit");
    //         document.getElementById("btnsubmit").innerText = "Sedang diproses..";
    //         btnsubmit.style.pointerEvents = 'none';
    //         btnsubmit.style.backgroundColor = '#4e5861';
    //         btnsubmit.style.borderColor = '#4e5861';
           
    //     }
    // });
    @else
        var btnsubmit = document.getElementById("btnsubmit");
        document.getElementById("btnsubmit").innerText = "Sedang diproses..";
        btnsubmit.style.pointerEvents = 'none';
        btnsubmit.style.backgroundColor = '#4e5861';
        btnsubmit.style.borderColor = '#4e5861';
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: new FormData(form[0]),
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                // alert(data.message);
                $("#modal-edit").modal("hide");
                table.api().ajax.reload(null, false);
                Swal.fire('Berjaya', data.message, 'success');
            },
            error: function(data){
                Swal.fire('Berjaya', data.message, 'error');
            }
        });
    @endif
});

<?php //dd(optional($jasfail->distribute)->assigned_to_user_id); ?>
// @if($jasfail->status)
// $("#status1").val( {{ strtoupper($status1) }} ).trigger('change');
// @endif

@if(optional($jasfail->distribute)->assigned_penyelia)
$("#penyelia").val( {{ $jasfail->distribute->where('active',1)->where('no_fail_jas',$jasfail->nofail)->first()->assigned_penyelia }} ).trigger('change');
@endif

@if(optional($jasfail->distribute)->assigned_pelulus)
$("#pelulus").val( {{ $jasfail->distribute->where('active',1)->where('no_fail_jas',$jasfail->nofail)->first()->assigned_pelulus }} ).trigger('change');
@endif
@if(optional($jasfail->distribute)->assigned_to_user_id)
$("#penyiasat").val( {{ $jasfail->distribute->where('active',1)->where('no_fail_jas',$jasfail->nofail)->first()->assigned_to_user_id }} ).trigger('change');
@endif
</script>