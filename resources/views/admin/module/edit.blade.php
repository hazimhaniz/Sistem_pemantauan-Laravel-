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
                <form id='form-edit' role="form" method="post" action="">
                    

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
