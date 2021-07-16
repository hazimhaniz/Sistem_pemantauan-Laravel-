
<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Penukaran <span class="bold">Pengguna</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id='form-edit' role="form" method="POST" action="{{ route('admin.user.internal.tukarStaf.change', $user->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>
                                <span><b class="text-dark">Nama Pegawai : {{$user->name}} </b></span>
                            </label>
                        </div>
                        <?php $no=1; ?>

                        <div class="col-md-12">
                           <table  class="table table-striped">
                               <thead>
                                   <th>#</th>
                                   <th>No Fail Jas</th>
                                   <th>status</th>
                               </thead>
                               @forelse($distribution as $disc)
                               <tbody>
                                   <tr>
                                       <td>{{$no++}}</td>
                                       <td>
                                        {{$disc->projek->no_fail_jas}}
                                        <input type="hidden" name="project[]" value="{{$disc->projek->no_fail_jas}}">
                                        <input type="hidden" name="inactive_user" value="{{$user->id}}">
                                    </td>
                                    <td>
                                        @if($disc->active ==1)
                                        Aktif
                                        @else
                                        Tidak Aktif
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            @empty
                            <tbody>
                                <td>Belum ada projek</td>
                            </tbody>
                            @endforelse

                        </table>
                    </div>

                    @if($distribution)
                    <div class="col-md-6">
                        <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                            <label><span>Status</span></label>
                            <select id="edit_status_id" name="user_status_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                <option value="" selected="" disabled="">Pilih satu..</option>
                                @foreach($all_status as $index => $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                            <label><span>Penukaran Negeri</span></label>
                            <select id="edit_roles_id" name="state" class="full-width autoscroll state" data-init-plugin="select2" required>
                                @foreach($state as $index => $state)                                    
                                <option
                                @if($state->name == $staff_state) 
                                selected
                                @endif
                                value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
 <!--                    <div class="col-md-6">
                        <label>
                            <span><b class="text-dark">Nama Pegawai : {{$user->name}} </b></span>
                        </label>
                    </div> -->
                    <div class="col-md-6">
                        <label>
                        </label>
                    </div>
                    <?php $no=1; ?>

                    <div class="col-md-12">
                       <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">

                        <label><span>Nama Pegawai {{$user->entity_staff->state->name}}</span></label>
                        <select id="nama_pegawai" name="assign_user_id" class="full-width autoscroll nama_pegawai" data-init-plugin="select2" required="">
                            <option value="" selected="" disabled="">Pilih satu..</option>
                            @foreach($user_staff_negeri as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @endif
           
        </form>
    </div>
    @if($distribution)
    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-info" onclick="submitForm('form-edit')"><i class="fa fa-check m-r-5"></i> Hantar</button>
    </div>
    @endif
</div>
</div>
</div>
<script type="text/javascript">
    var table = $('#table-edit');

    var settings = {
        "processing": true,
    // "serverSide": true,
    "deferRender": true,
    "ajax": "{{ fullUrl() }}",
    "columns": [
    { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    }},
    { data: "projek", name: "projek", defaultContent: "-", render: function(data, type, row){
        return $("<div/>").html(data).text();
    }},
    ],
    "destroy": true,
    "scrollCollapse": true,
    "oLanguage": {
        "sEmptyTable":      "Tiada data",
        "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
        "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
        "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
        "sInfoPostFix":     "",
        "sInfoThousands":   ",",
        "sLengthMenu":      "Papar _MENU_ rekod",
        "sLoadingRecords":  "Diproses...",
        "sProcessing":      "Sedang diproses...",
        "sSearch":          "Carian:",
        "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
        "oPaginate": {
         "sFirst":        "Pertama",
         "sPrevious":     "Sebelum",
         "sNext":         "Seterusnya",
         "sLast":         "Akhir"
     },
     "oAria": {
         "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
         "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
     }
 },
 "iDisplayLength": 10
};

table.dataTable(settings);


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

$('#modal-edit').modal('show');
$(".modal form").validate();

$("#form-edit").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid())
     return;

 $.ajax({
    url: "{{ route('admin.user.internal.tukarStaf.change', $user->id) }}",
    method: "POST",
    data: new FormData(form[0]),
    dataType: 'json',
    async: true,
    contentType: false,
    processData: false,
    success: function(data) {
        swal.fire(data.test, data.text, data.status);
        $("#modal-edit").modal("hide");
        location.reload();
    }
});
});

@if($user->user_status_id)
$("#edit_status_id").val( {{ $user->user_status_id }} ).trigger('change');
@endif

@if($user->entity)
@if($user->entity->section_id)
$("#edit_section_id").val( {{ (!empty($user->entity->section_id))?$user->entity->section_id:'-' }} ).trigger('change');
@endif
@endif

@if($user->entity)
@if($user->entity->province_office_id)
$("#edit_province_office_id").val( {{ $user->entity->province_office_id }} ).trigger('change');
@endif
@endif

</script>