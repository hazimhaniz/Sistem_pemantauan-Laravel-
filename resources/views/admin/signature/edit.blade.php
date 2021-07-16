@include('plugins.dropify')
<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">Tandatangan</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id="form-signature-edit" role="form" method="post" action="{{ route('admin.signature.form', $signature->id) }}">

                    @include('components.bs.input', [
                        'name' => 'name',
                        'label' => 'Nama Di Tandatangan',
                        'mode' => 'required',
                        'value' => $signature->name
                    ])

                    @include('components.bs.input', [
                        'name' => 'role_bm',
                        'label' => 'Peranan Di Tandatangan',
                        'mode' => 'required',
                        'value' => $signature->role_bm
                    ])

                    <div class="form-group row">
                        <label for="user_id" class="col-md-3 control-label">
                            Pemunya Tandatangan
                        </label>
                        <div class="col-md-9">
                            <select id="user_id" name="user_id" data-placeholder="Pilihan" class="full-width autoscroll" data-init-plugin="select2" required>
                                <option selected>Pilih satu..</option>
                                @foreach($user as $index => $value)
                                <option value="{{ $value->user->id }}" {{ $value->user->id == $signature->user_id ? 'selected' : '' }} >{{ $value->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status_insert" class="col-md-3 control-label">
                            Status <span style="color:red;">*</span></label>
                        </label>
                        <div class="col-md-9">
                            <select id="status" name="status" data-placeholder="Pilihan" class="full-width autoscroll" data-init-plugin="select2" required>
                                <option disabled hidden selected>Pilih satu..</option>
                                <option value=1 {{ $signature->status == 1 ? 'selected' : '' }}>Aktif</option>
                                <option value=0 {{ $signature->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label id="label_copyright" for="copyright" class="col-md-12 control-label">Gambar <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                                <input type="file" class="dropify" name="picture" data-default-file="{{ asset('storage/'.$signature->picture) }}" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M"/>
                        </div>            
                    </div>

                    <input type="text" name="created_by_user_id" hidden="" value="{{ auth()->user()->id }}">

                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info" onclick="submitForm('form-signature-edit')"><i class="fa fa-check m-r-5"></i> Hantar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$('.dropify').dropify();

$("#modal-edit").modal("show");

$(".modal form").validate();

$('#user_id').select2({
    dropdownParent: $('#user_id').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#status').select2({
    dropdownParent: $('#status').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$("#form-signature-edit").submit(function(e) {
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
            swal(data.title, data.message, data.status);
            $("#modal-edit").modal("hide");
            table.api().ajax.reload(null, false);
        }
    });
});
</script>
