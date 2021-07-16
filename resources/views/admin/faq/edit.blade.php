<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">FAQ</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id="form-faq-edit" role="form" method="post" action="{{ route('admin.faq.form', $faq->id) }}">

                    @include('components.textarea', [
                        'name' => 'question',
                        'label' => 'Soalan',
                        'mode' => 'required',
                        'value' => $faq->question
                    ])

                    @include('components.textarea', [
                        'name' => 'answer',
                        'label' => 'Jawapan',
                        'mode' => 'required',
                        'value' => $faq->answer,
                    ])

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Kategori</span></label>
                                <select id="faq_type_id" name="faq_type_id" class="full-width autoscroll state" data-init-plugin="select2" required>
                                    <option value="" selected="">Pilih.</option>
                                    @foreach($faq_type as $index => $type)
                                    <option value="{{ $type->id }}" {{ $faq->faq_type_id == $type->id ? 'selected' : '' }} >{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="text" name="created_by_user_id" hidden="" value="{{ auth()->user()->id }}">

                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info" onclick="submitForm('form-faq-edit')"><i class="fa fa-check m-r-5"></i> Hantar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$("#modal-edit").modal("show");

$('#form-faq-edit').each(function () {
    if ($(this).data('validator'))
        $(this).data('validator').settings.ignore = ".note-editor *";
});

$(".modal form").validate();

$('#faq_type_id').select2({
    dropdownParent: $('#faq_type_id').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$("#form-faq-edit").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    $('#form-faq-edit').each(function () {
        if ($(this).data('validator'))
            $(this).data('validator').settings.ignore = ".note-editor *";
    });

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
