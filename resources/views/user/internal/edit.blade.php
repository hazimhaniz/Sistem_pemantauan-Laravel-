
<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">Pengguna</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id='form-edit' role="form" method="post" action="{{ route('user.internal.form', $user->id) }}">
                    @include('components.input', [
                        'label' => 'Nama Penuh',
                        'mode' => 'required',
                        'name' => 'name',
                        'value' => $user->name
                    ])

                    @include('components.input', [
                        'label' => 'ID Pengguna',
                        'mode' => 'required',
                        'name' => 'username',
                        'value' => $user->username
                    ])

                    <!-- @include('components.input', [
                        'label' => 'Alamat Emel',
                        'mode' => 'required',
                        'name' => 'email',
                        'type' => 'email',
                        'value' => $user->email
                    ]) -->

                    <div class="form-group form-group-default required" style="text-transform:none !important">
                        <label class="fade">
                            <span id="label_email">Alamat Emel</span>
                        </label>
                        <input id="email" class="form-control " name="email" placeholder="" required="" type="email" value="{{$user->email}}">
                    </div>

                    <!-- @include('components.input', [
                        'label' => 'Password',
                        'info' => 'Minimum 8 characters',
                        'name' => 'password',
                        'type' => 'password',
                        'options' => 'minlength=8',
                        'placeholder' => 'Minimum 8 characters',
                    ]) -->

                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Negeri</span></label>
                                <select id="edit_state_id" name="user_state_id" class="full-width autoscroll state" data-init-plugin="select2" >
                                    <option value="" selected="" disabled="">Pilih satu..</option>
                                    @foreach($all_state as $index => $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> -->

                @if(!auth()->user()->hasRole('admin_state'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                <label><span>Negeri</span></label>
                                <div class="checkbox check-primary">
                                    @foreach($all_state as $index => $state)
                                        @foreach($user_state as $index => $user_states)
                                        @if($user_states->state_id == $state->id)
                                        <div class="col-md-6" style="padding-left: 7px">
                                        <input name="user_state_id[]" value="{{ $state->id }}" id="state_edit_{{ $state->id }}" class="hidden" type="checkbox" {{$user_states->state_id == $state->id ? "checked" : ""}} >
                                        <label for="state_edit_{{ $state->id }}">{{ $state->name }}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    @endforeach
                                    @foreach($all_state as $index => $state)
                                        @foreach($not_user_state as $index => $not_user_states)
                                        @if($not_user_states->id == $state->id)
                                        <div class="col-md-6" style="padding-left: 7px">
                                        <input name="user_state_id[]" value="{{ $state->id }}" id="state_edit_{{ $state->id }}" class="hidden" type="checkbox" >
                                        <label for="state_edit_{{ $state->id }}">{{ $state->name }}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                  
                    

                    <div class="row">
                        <div class="col-md-12">
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
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                <label><span>Peranan</span></label>
                                <select id="edit_roles_id" name="roles[]" class="full-width autoscroll state" data-init-plugin="select2" required="" multiple="">
                                    @foreach($roles as $index => $role)
                                    @if($role->name != 'superadmin' && $role->name != 'staff' && $role->id > 6)
                                    <option
                                    @foreach($staff_roles as $staff_role)
                                    @if($role->name == $staff_role)
                                        selected
                                    @endif
                                    @endforeach
                                    <?php $roles = $role->description; ?>
                                    value="{{ $role->name }}">{{ $roles }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                 <!--    @component('components.label', [
                        'name' => 'permissions',
                        'label' => 'Senarai Tugasan Daripada Peranan',
                        'value' => '',
                        'info' => 'Senarai ini tidak boleh dibuang dari kemaskini pengguna, hanya boleh dibuang dari pengurusan peranan'
                    ])
                    <div class="checkbox check-primary">
                        <div class="row">
                            @foreach($staff_permision_via_roles as $index => $permission)
                            <div class="col-md-6" style="padding-left: 7px">
                                <input name="permissions[]" value="{{ $permission->name }}" id="permission_edit_{{ $permission->id }}" class="hidden" type="checkbox" disabled @if($user->hasAllPermissions($permission->name)) checked @endif >
                                <label for="permission_edit_{{ $permission->id }}">{{ $permission->description }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endcomponent -->

                    <!-- @component('components.label', [
                        'name' => 'permissions',
                        'label' => 'Tugasan Mengikut Pengguna',
                        'value' => ''
                    ])
                    <div class="checkbox check-primary">
                        <div class="row">
                            @foreach($permissions as $index => $permission)
                            <div class="col-md-6" style="padding-left: 7px">
                                <input name="permissions[]" value="{{ $permission->name }}" id="permission_edit_{{ $permission->id }}" class="hidden" type="checkbox" @if($user->hasAllPermissions($permission->name)) checked @endif >
                                <label for="permission_edit_{{ $permission->id }}">{{ $permission->description }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endcomponent
 -->
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
