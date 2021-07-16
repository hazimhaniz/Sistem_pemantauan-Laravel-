<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">Flow</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id='form-edit' role="form" method="post" action="{{ route('admin.flow.form', $flow->id) }}">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                <label><span>Module</span></label>
                                <input type="hidden" name="module_id" id="module_id" value="{{ $flow->module_id }}">
                                <label>
                                    <span id="module_name" style="font-size:14px">{{ $flow->module->name }}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Aturan</span></label>
                                <select id="sequence" name="sequence" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    @foreach($all_sequence as $index => $sequence)
                                    <option value="{{ $sequence }}" {{ $sequence == $flow->sequence ? 'selected' : '' }} >{{ $sequence }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Peranan Sekarang</span></label>
                                <select id="cur_role" name="cur_role" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    @foreach($all_role as $index => $role)
                                    <option value="{{ $role->id }}" {{ $role->id == $flow->cur_role ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @include('components.textarea', [
                                'name' => 'case',
                                'label' => 'Catatan',
                                'value' => $flow->case
                            ])
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                <label><span>Kes</span></label>
                                <select id="case_type" name="case_type" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="" disabled="">Pilih.</option>
                                    @foreach($all_case_type as $index => $case)
                                    <option value="{{ $case->id }}" {{ $case->id == $flow->case_type ? 'selected' : '' }}>{{ $case->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Boleh Kuiri</span></label>
                                <select id="is_query" name="is_query" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    <option value="1" {{ $flow->is_query ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ $flow->is_query ? '' : 'selected' }}>Tak</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Boleh Ulasan Dan Syor</span></label>
                                <select id="is_recommend" name="is_recommend" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    <option value="1" {{ $flow->is_recommend ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ $flow->is_recommend ? '' : 'selected' }}>Tak</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info" onclick="submitForm('form-edit')"><i class="fa fa-check m-r-5"></i> Hantar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$('#modal-edit').modal('show');
$(".modal form").validate();

$('#sequence').select2({
    dropdownParent: $('#sequence').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#cur_role').select2({
    dropdownParent: $('#cur_role').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#case_type').select2({
    dropdownParent: $('#case_type').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#is_query').select2({
    dropdownParent: $('#is_query').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#is_recommend').select2({
    dropdownParent: $('#is_recommend').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

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
            swal(data.title, data.message, data.status);
            $("#modal-edit").modal("hide");
            table.api().ajax.reload(null, false);
        }
    });
});
</script>
