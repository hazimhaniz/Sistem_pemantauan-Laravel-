<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"><span class="bold">Kemaskini Projek</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body m-t-20">
                @if($user->user_has_role->where('role_id', 5)->first())

                    <!-- @include('components.input', [
                        'label' => 'No Kompetensi',
                        'mode' => 'readonly',
                        'name' => 'no_kompetensi',
                        'value' => $user->entity->no_kompetensi,
                    ]) -->

                    <div class="form-group form-group-default readonly" style="background: #f3f3f3;">
                        <label>
                            <span id="label_no_kompetensi">No Kompetensi</span>
                                    <span style="color:red;">*</span>
                        </label>
                        <input id="no_kompetensi" class="form-control " name="no_kompetensi" placeholder="" onkeypress="" readonly="" type="text" value="{{$user->entity->no_kompetensi}}">
                    </div>
                    
                    <!-- <a href="javascript:;" class="btn btn-info btn-sm m-t-5 pull-left"><i class="fa fa-search mr-1"></i>Semak</a><br><br> -->

                    <!-- @include('components.input', [
                        'label' => 'Tarikh Kompetensi',
                        'mode' => 'readonly',
                        'name' => 'date_kompetensi',
                        'value' => date('d/m/Y', strtotime($user->entity->date_kompetensi)),
                    ]) -->
                    <div class="form-group form-group-default readonly" style="background: #f3f3f3;">
                        <label>
                            <span id="label_date_kompetensi">Tarikh Kompetensi</span>
                                    <span style="color:red;">*</span>
                        </label>
                        <input id="date_kompetensi" class="form-control " name="date_kompetensi" placeholder="" onkeypress="" readonly="" type="text" value="{{date('d/m/Y', strtotime($user->entity->date_kompetensi))}}">
                    </div>

                @endif 

                @if($user->user_has_role->where('role_id', 6)->first())

                    @include('components.input', [
                        'label' => 'Nama Syarikat',
                        'mode' => 'readonly',
                        'name' => 'syarikat',
                        'value' => $user->entity->syarikat
                    ])

                    <!-- @include('components.input', [
                        'label' => 'Nama Makmal',
                        'mode' => 'readonly',
                        'name' => 'nama_makmal',
                        'value' => $user->entity->nama_makmal
                    ])

                    @include('components.input', [
                        'label' => 'No Telefon Makmal',
                        'mode' => 'readonly',
                        'name' => 'no_tel_makmal',
                        'value' => $user->entity->no_tel_makmal
                    ])

                    @include('components.input', [
                        'label' => 'Alamat Makmal',
                        'mode' => 'readonly',
                        'name' => 'alamat_makmal',
                        'value' => $user->entity->alamat_makmal
                    ]) -->

                    @include('components.input', [
                        'label' => 'Poskod',
                        'mode' => 'readonly',
                        'name' => 'poskod',
                        'value' => $user->entity->poskod
                    ])

                    @include('components.input', [
                        'label' => 'Negeri',
                        'mode' => 'readonly',
                        'name' => 'negeri_id',
                        'value' => optional($user->entity->state)->name
                    ])

                    @include('components.input', [
                        'label' => 'Daerah',
                        'mode' => 'readonly',
                        'name' => 'daerah_id',
                        'value' => optional($user->entity->district)->name
                    ])

                @endif 
                <form id='form-edit' role="form" method="post" action="{{ route('user.external.form2', [$user->id,$hasuser->projek_id]) }}">
                    <!-- @include('components.input', [
                        'label' => 'Nama Penuh',
                        'mode' => 'required',
                        'name' => 'name',
                        'value' => $user->name
                    ]) -->

                    <div class="form-group form-group-default required" style="background: #f3f3f3;">
                        <label>
                            <span id="label_name">Nama Penuh</span>
                                    <span style="color:red;">*</span>
                        </label>
                        <input id="name" class="form-control " name="name" placeholder="" onkeypress="" required="" type="text" value="{{$user->name}}" readonly>
                    </div>

                    <!-- @include('components.input', [
                        'label' => 'ID Pengguna',
                        'mode' => 'required',
                        'name' => 'username',
                        'value' => $user->username
                    ]) -->

                    <div class="form-group form-group-default required" style="background: #f3f3f3;">
                        <label>
                            <span id="label_username">ID Pengguna</span>
                                    <span style="color:red;">*</span>
                        </label>
                        <input id="username" class="form-control " name="username" placeholder="" onkeypress="" required="" type="text" value="{{$user->username}}" readonly>
                    </div>
                    <input type="hidden" name="projek" value="{{$hasuser->projek_id}}">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <!-- <span style="text-transform:none !important"> -->
                    <!-- @include('components.input', [
                        'label' => 'Alamat Emel',
                        'mode' => 'required',
                        'name' => 'email',
                        'type' => 'email',
                        'value' => $user->email
                    ]) -->
                  <!--   </span> -->

                  <div class="form-group form-group-default required" style="text-transform:none !important;background: #f3f3f3;">
                    <label class="fade">
                        <span id="label_email">Alamat Emel</span>
                    </label>
                    <input id="email" class="form-control " name="email" placeholder="" required="" type="email" value="{{$user->email}}" readonly>
                </div>

                @if($user->user_has_role->where('role_id', 5)->first())
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default" style="background: #f3f3f3;">
                                <label>
                                    <span id="label_phone">No Tel</span>
                                </label>
                                <input id="phone" class="form-control" placeholder="" type="text" value="{{$user->phone}}" maxlength="11" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default" style="background: #f3f3f3;">
                                <label>
                                    <span id="label_faks">No Faks</span>
                                </label>
                                <input id="faks" class="form-control " placeholder="" type="text" value="{{$user->fax}}" maxlength="11" readonly>
                            </div>
                        </div>
                    </div>
                @endif

                    <!-- @include('components.input', [
                        'label' => 'Password',
                        'info' => 'Minimum 8 characters',
                        'mode' => 'required',
                        'name' => 'password',
                        'type' => 'password',
                        'options' => 'minlength=8',
                        'placeholder' => 'Minimum 8 characters',
                    ]) -->
                    @if($user->user_has_role->where('role_id', 5)->first())
                    @else
                    <div class="form-group form-group-default required" style="text-transform:none !important;background: #f3f3f3;">
                        <label class="fade">
                            <span id="">Pengawasan</span>
                        </label>
                        @foreach($jenis1 as $key => $jenis1)
                        <input id="" class="form-control " name="" placeholder="" required="" type="text" value="{{$key+1}}. {{$jenis1}}" style="pointer-events: none; font-size: 14px !important; font-weight: normal !important; letter-spacing: 0.01em !important;" readonly>
                        @endforeach
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                <label><span>Status</span></label>
                                <select id="edit_status_id" name="user_status_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                    <option value="" selected="" disabled="">Pilih satu..</option>
                                    @foreach($all_status as $index => $status)
                                    @if($status->id == 3 || $status->id == 1 || $status->id == 5)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </form>


                <?php
                    $user = \App\User::where('id',$user->id)->first();
                    // return $user;
                    if($user){
                      $type = \App\MakmalAkreditasi::where('emc_id',$user->entity_id)->get();
                    }
                ?>
            </div>
            <div class="modal-footer">
                <button id="simpanbtn" type="button" class="btn btn-info" onclick="submitForm('form-edit')">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button> -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$('#edit_user_type_id').select2({
    dropdownParent: $('#edit_user_type_id').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#edit_status_id').select2({
    dropdownParent: $('#edit_status_id').parents(".modal-dialog").find('.modal-content'),
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
    document.getElementById('simpanbtn').innerText = 'Sedang diproses..';
    document.getElementById("simpanbtn").style.pointerEvents = "none";
    document.getElementById("simpanbtn").style.backgroundColor = "#687e95";
    document.getElementById("simpanbtn").style.borderColor = "#687e95";
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
            Swal.fire('Berjaya', 'Maklumat Telah Disimpan', 'success');
        }
    });
});

@if($user->user_status_id && $hasuser->user_flag == 1)
$("#edit_status_id").val( 1 ).trigger('change');
@endif

@if($user->user_status_id && $hasuser->user_flag == 0)
$("#edit_status_id").val( 3 ).trigger('change');
@endif

@if($user->user_type_id)
$("#edit_user_type_id").val( {{ $user->user_type_id }} ).trigger('change');
@endif

</script>
