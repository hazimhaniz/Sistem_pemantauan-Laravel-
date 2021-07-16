<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">Menu</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id="form-menu-edit" role="form" method="post" action="{{ route('admin.menu.form', $menu->id) }}">
                    @include('components.input', [
                        'name' => 'name',
                        'label' => 'Nama',
                        'mode' => 'required',
                        'value' => $menu->name
                    ])

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Aturan</span></label>
                                <select id="sequence" name="sequence" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    @foreach($all_sequence as $index => $sequence)
                                    <option value="{{ $sequence }}" {{ $sequence == $menu->sequence ? 'selected' : '' }} >{{ $sequence }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Parent</span></label>
                                <select id="parent" name="parent" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    @foreach($menu_list as $index => $menuparent)
                                    <option value="{{ $menuparent->id }}" {{ $menuparent->id == $menu->parent ? 'selected' : '' }} >{{ $menuparent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Link</span></label>
                                <select id="link" name="link" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    @foreach($link_list as $index => $link)
                                    <option value="{{ $link }}" {{ $link == $menu->link ? 'selected' : '' }} >{{ $link }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                <label><span>Symbol</span></label>
                                <select id="symbol" name="symbol" class="full-width autoscroll state select2-icon" data-init-plugin="select2" >
                                    <option value="" selected="">Pilih.</option>
                                    @foreach($symbol_list as $index => $symbol)
                                    <option value="{{ $symbol }}" {{ $symbol == $menu->symbol ? 'selected' : '' }} data-icon="{{ $symbol }}" >{{ $symbol }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                <label><span>Icon</span></label>
                                <select name="symbol" class="full-width autoscroll state select2-icon p-t-10 p-b-10" data-init-plugin="select2">
                                    <option value="" selected="">Pilih.</option>
                                    <@foreach($symbol_list as $index => $symbol)
                                    <option value="{{ $symbol }}" {{ $symbol == $menu->symbol ? 'selected' : '' }} data-icon="{{ $symbol }}" > {{ mb_convert_encoding($unicode[$index], 'UTF-8', 'HTML-ENTITIES') }} {{ $symbol }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info" onclick="submitForm('form-menu-edit')"><i class="fa fa-check m-r-5"></i> Hantar</button>
            </div>
        </div>
    </div>
</div>

<style type="text/css">

select {
  font-family: fontAwesome
}

</style>

<script type="text/javascript">
$("#modal-edit").modal("show");
$(".modal form").validate();

function formatText (icon) {
    return $('<span><i class="' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
};

$('#sequence').select2({
    dropdownParent: $('#sequence').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#parent').select2({
    dropdownParent: $('#parent').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#link').select2({
    dropdownParent: $('#link').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#symbol').select2({
    dropdownParent: $('#symbol').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$("#form-menu-edit").submit(function(e) {
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
            // table.api().ajax.reload(null, false);
            location.reload();
        }
    });
});
</script>
