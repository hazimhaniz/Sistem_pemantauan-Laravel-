<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">Template</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id='form-edit' role="form" method="post" action="{{ route('admin.quicktemplate.form', $quicktemplate->id) }}">
                    @include('components.input', [
                        'name' => 'system_name',
                        'label' => 'Nama Sistem',
                        'mode' => 'required',
                        'value' => $quicktemplate->system_name
                    ]) 

                    @include('components.input', [
                        'name' => 'copyright',
                        'label' => 'Hak Milik Terpelihara',
                        'mode' => 'required',
                        'value' => $quicktemplate->copyright
                    ])

                    @include('components.textarea', [
                        'name' => 'description',
                        'label' => 'Keterangan',
                        'mode' => 'required',
                        'value' => $quicktemplate->description
                    ])

                    @include('components.radio', [
                        'name' => 'color_theme',
                        'label' => 'Tema Color',
                        'mode' => 'required',
                        'data' => ['blue'=>'BIRU','yellow'=>'KUNING','green'=>'HIJAU'],
                        'selected' => $quicktemplate->color_theme
                    ])

                    @include('components.radio', [
                        'name' => 'default',
                        'label' => 'Set Default',
                        'mode' => 'required',
                        'data' => [1=>'YA',0=>'TIDAK'],
                        'selected' => $quicktemplate->default,
                        'id'=> '2'
                    ])

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label id="label_copyright" for="copyright" class="col-md-12 control-label">Logo Sistem <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <?php if (file_exists(public_path('images/'.$quicktemplate->logo_header))): ?>
                                <input type="file" class="dropify" name="logo_header" data-default-file="{{ asset('images/'.$quicktemplate->logo_header) }}" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M" data-show-remove="false"/>
                            <?php else: ?>
                                <input type="file" class="dropify" name="logo_header" data-default-file="{{ asset('storage/'.$quicktemplate->logo_header) }}" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M" data-show-remove="false"/>
                            <?php endif ?>
                        </div>            
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label id="label_copyright" for="copyright" class="col-md-12 control-label">Background Paparan Log Masuk <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <?php if (file_exists(public_path('images/'.$quicktemplate->background_login_page))): ?>
                                <input type="file" class="dropify" name="background_login_page" data-default-file="{{ asset('images/'.$quicktemplate->background_login_page) }}" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M" data-show-remove="false"/>
                            <?php else: ?>
                                <input type="file" class="dropify" name="background_login_page" data-default-file="{{ asset('storage/'.$quicktemplate->background_login_page) }}" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M" data-show-remove="false"/>
                            <?php endif ?>
                        </div>            
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label id="label_copyright" for="copyright" class="col-md-12 control-label">Favicon <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <?php if (file_exists(public_path('images/'.$quicktemplate->favicon))): ?>
                                <input type="file" class="dropify" name="favicon" data-default-file="{{ asset('images/'.$quicktemplate->favicon) }}" data-allowed-file-extensions="jpg png gif jpeg ico" data-max-file-size="5M" data-show-remove="false"/>
                            <?php else: ?>
                                <input type="file" class="dropify" name="favicon" data-default-file="{{ asset('storage/'.$quicktemplate->favicon) }}" data-allowed-file-extensions="jpg png gif jpeg ico" data-max-file-size="5M" data-show-remove="false"/>
                            <?php endif ?>
                        </div>            
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info" onclick="submitForm('form-edit')"><i class="fa fa-check m-r-5"></i> Kemaskini</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$('.dropify').dropify({
    data-default-file: 'http://localhost/ekonsular_dev/public/storage/uploads/appeal/2019/November/20191110/D-R-2019-37/1-DOKUMEN RAYUAN A.pdf',
});

$("#form-edit").validate();
function handOver() {
    $("#modal-handover").modal("show");
    $("#form-handover").validate();
    $("#form-handover").trigger("reset");
}

$('#modal-edit').modal('show');
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
            swal(data.title, data.message, data.status);
            $("#modal-edit").modal("hide");
            table.api().ajax.reload(null, false);
        }
    });
});

</script>
