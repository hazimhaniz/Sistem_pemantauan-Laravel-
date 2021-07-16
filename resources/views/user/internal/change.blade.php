
<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"><span class="bold">Pertukaran Pegawai Penyiasat</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id='form-edit' role="form" method="post" action="{{ route('user.internal.change.form', $user->id) }}">
                    @include('components.input', [
                        'label' => 'Nama Penuh',
                        'mode' => 'required',
                        'name' => 'name',
                        'value' => $user->name,
                        'mode' => 'readonly'
                    ])

                    @include('components.input', [
                        'label' => 'ID Pengguna',
                        'mode' => 'required',
                        'name' => 'username',
                        'value' => $user->username,
                        'mode' => 'readonly'
                    ])

                    @include('components.input', [
                        'label' => 'ID Pengguna',
                        'mode' => 'required',
                        'name' => 'old_id',
                        'value' => $user->id,
                        'mode' => 'readonly',
                        'type' => 'hidden'
                    ])


                @if(auth()->user()->hasRole('admin_state'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>No. Fail JAS</span></label>
                                <div class="checkbox check-primary">
                                    @foreach($distribute as $keys => $values)
                                        <div class="col-md-6" style="padding-left: 7px">
                                        <input name="nofailjas_id[]" value="{{ $values->no_fail_jas }}" id="nofailjas_{{ $values->id }}" class="hidden" type="checkbox" >
                                        <label for="nofailjas_{{ $values->id }}">{{ $values->no_fail_jas }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                  
                    

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                                <label><span>Nama Pegawai</span></label>
                                <select id="edit_status_id" name="user_change_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                    <option value="" selected="" disabled="">Pilih satu..</option>
                                    @foreach($userother as $index => $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="submitForm('form-edit')">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

$('#edit_roles_id').select2({
    dropdownParent: $('#edit_roles_id').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});



$('#edit_status_id').select2({
    dropdownParent: $('#edit_status_id').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#edit_section_id').select2({
    dropdownParent: $('#edit_section_id').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#edit_province_office_id').select2({
    dropdownParent: $('#edit_province_office_id').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

// $('#modal-edit').modal('show');
$('#modal-edit').modal({
    backdrop: 'static',
    keyboard: false
});
$(".modal form").validate();

$("#form-edit").submit(function(e) {
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
            swal(data.title, data.message);
            $("#modal-edit").modal("hide");
            table.api().ajax.reload(null, false);
        }
    });
});



@if($user->user_status_id)
$("#edit_status_id").val( {{ $user->user_status_id }} ).trigger('change');
@endif





</script>
