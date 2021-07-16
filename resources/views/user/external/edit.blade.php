<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
 <div class=" modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle"><span class="bold">Kemaskini Pengguna</span></h5>
            <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <?php //dd($all_status); ?>
            <input type="hidden" value="{{auth()->user()->hasRole("admin_hq")}}" id="role_check">
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
                            <input id="no_kompetensi" class="form-control readyonlyimportant" name="no_kompetensi" placeholder="" onkeypress="" readonly="" type="text" value="{{$user->entity->no_kompetensi}}">
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
                            <input id="date_kompetensi" class="form-control readyonlyimportant" name="date_kompetensi" placeholder="" onkeypress="" readonly="" type="text" @if($user->entity->date_kompetensi) value="{{date('d/m/Y', strtotime($user->entity->date_kompetensi))}}" @else value="" @endif>
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
                        <form id='form-edit' role="form" method="post" action="{{ route('user.external.form', $user->id) }}">
                    <!-- @include('components.input', [
                        'label' => 'Nama Penuh',
                        'mode' => 'required',
                        'name' => 'name',
                        'value' => $user->name
                        ]) -->

                        <div class="form-group form-group-default" style="background: #f3f3f3;">
                            <label>
                                <span id="label_name">Nama Pegawai Penggerak Projek (eKAS)</span>
                                <!-- <span style="color:red;">*</span> -->
                            </label>
                            <input id="name1" class="form-control readyonlyimportant" name="name1" placeholder="" onkeypress="" type="text" value="{{$namapenggerak}}" readonly>
                        </div>

                        <div class="form-group form-group-default required">
                            <label>
                                <span id="label_name">Nama Penggerak Projek</span>
                                <span style="color:red;">*</span>
                            </label>
                            <input id="name" class="form-control " name="name" placeholder="" onkeypress="" required="" type="text" value="{{$user->name}}">
                        </div>

                    <!-- @include('components.input', [
                        'label' => 'ID Pengguna',
                        'mode' => 'required',
                        'name' => 'username',
                        'value' => $user->username
                        ]) -->

                        <div class="form-group form-group-default required">
                            <label>
                                <span id="label_username">ID Pengguna</span>
                                <span style="color:red;">*</span>
                            </label>
                            <input id="username" class="form-control " name="username" placeholder="" onkeypress="" required="" type="text" value="{{$user->username}}">
                        </div>

                        <!-- <span style="text-transform:none !important"> -->
                    <!-- @include('components.input', [
                        'label' => 'Alamat Emel',
                        'mode' => 'required',
                        'name' => 'email',
                        'type' => 'email',
                        'value' => $user->email
                        ]) -->
                        <!--   </span> -->

                        <div class="form-group form-group-default required" style="text-transform:none !important;">
                            <label class="fade">
                                <span id="label_email">Alamat Emel</span>
                            </label>
                            <input id="email" class="form-control " name="email" placeholder="" required="" type="email" value="{{$user->email}}">
                        </div>

                        @if($user->user_has_role->where('role_id', 5)->first())
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default" >
                                    <label>
                                        <span id="label_phone">No Tel</span>
                                    </label>
                                    <input id="phone" name="phone" class="form-control" placeholder="" type="text" value="{{$user->phone}}" maxlength="11" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default" >
                                    <label>
                                        <span id="label_faks">No Faks</span>
                                    </label>
                                    <input id="faks" name="fax" class="form-control " placeholder="" type="text" value="{{$user->fax}}" maxlength="11" readonly>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default ">
                                    <label>
                                        <span id="label_gambar">Gambar</span>
                                        <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Gambar diperlukan bagi mengenalpasti pihak environmental officer"></i>  </label>
                                        <div class="fallback" id="picuser">
                                            @if($picture)
                                            {!!html_entity_decode($picture)!!}
                                            <!-- {{$picture}} -->
                                            @else
                                            <label>Tiada gambar</label>
                                            @endif
                                            <!-- <input type="file" class="dropify" name="gambar" @if(auth()->user()->picture_url)data-default-file="{{ route('profile.picture',auth()->user()->picture_url) }}" @endif data-allowed-file-extensions="jpg png jpeg" data-max-file-size="10M"/> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default ">
                                        <label>
                                            <span id="label_gambar">Upload Salinan Sijil Kompetensi</span>
                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Salinan Sijil diperlukan bagi mengenalpasti pihak environmental officer"></i>   </label>
                                            <div class="fallback" id="sijiluser">
                                                @if($sijil)
                                                <!-- {{$sijil}} -->
                                                {!!html_entity_decode($sijil)!!}
                                                @else
                                                <label>Tiada sijil</label>
                                                @endif
                                                <!-- <input type="file" class="dropify2" data-allowed-file-extensions="pdf png" name="sijil" @if(auth()->user()->picture_url)data-default-file="{{ route('profile.picture',auth()->user()->picture_url) }}" @endif data-allowed-file-extensions="jpg png jpeg" data-max-file-size="10M"/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                {{-- <div class="form-group form-group-default required" style="text-transform:none !important;background: #f3f3f3;">
                                    <label class="fade">
                                        <span id="">Pengawasan</span>
                                    </label>
                                    @foreach($jenis1 as $key => $jenis1)
                                    <input id="" class="form-control " name="" placeholder="" required="" type="text" value="{{$key+1}}. {{$jenis1}}" style="pointer-events: none; font-size: 14px !important; font-weight: normal !important; letter-spacing: 0.01em !important;" readonly>
                                    @endforeach
                                </div>  --}}


                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="div-wasan" class="form-group-default">
                                            <label class="m-t-15 control-label" style="color: #575757 !important;">Jenis Pengawasan<span style="color:red;">*</span> </label>
                                            <div class="jenisPengawasan">
                                                <div class="checkbox check-primary" id="pengawasan">
                                                    <?php
                                                    $Pengawasan = \App\MasterModel\MasterPengawasan::all();
                                            // dd($jenis);
                                                    ?>
                                                    @foreach($Pengawasan as $value)

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input @if($jenis && in_array($value->id,$jenis)) checked @endif name="pakej_pengawasan_id[]" value="{{$value->id}}" id="{{$value->id}}" type="checkbox" class="form-control pengawasanpakej_{{$value->id}}" style="position: absolute;">
                                                            <label style="color: #575757 !important;" for="{{$value->id}}">{{$value->jenis_pengawasan}}</label> 
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                </div>
                                            </div>
                                            <label id="wasanerror" style="font-size: 12px;color: #f35958;display: none;">Input jenis pengawasan wajib diisi</label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($nyah == 1)
                                <?php
                                $nyahAktif = \App\NyahAktif::where('user_id',$user->id)->orderBy('id','desc')->first();
                                ?>
                                @if(!empty($nyahAktif))
                                <div id="mel" class="form-group form-group-default">
                                    <label>
                                        <span id="label_username">Sebab NyahAktif</span><span style="color:red;">*</span>
                                        <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="cth : email@gmail.com"></i>
                                    </label>
                                    <textarea id="sebab" class="form-control " name="sebab" type="text" required title="" readonly>{{$nyahAktif->sebab}}</textarea>
                                </div>
                                @endif
                                @endif
                                

                                <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                        <label><span class="label label-light-blue">Status</span></label>
                                        <input type="hidden" value="{{ $projekID }}" name="projekID"/>
                                        <select id="edit_status_id" name="user_status_id" class="full-width autoscroll state" data-init-plugin="select2" onchange="iftiada()" required="">
                                            <option value="" selected="" disabled="">Pilih satu..</option>
                                            <option value="101" {{$user->project_has_user->status==101?'selected':''}}> Aktif </option>
                                            <option value="102" {{$user->project_has_user->status==102?'selected':''}}> Tidak Aktif </option>
                                            <option value="110" {{$user->project_has_user->status==110?'selected':''}}> Permohonan Ditolak </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div id="hidetidakaktif" class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                    <label><span>Sebab Tidak Aktif</span></label>
                                    <select id="Edit_tidak_aktif" name="sebab_tidak_aktif" class="full-width autoscroll state required" data-init-plugin="select2">
                                        <option value="0" selected>Pilih satu..</option>
                                        <option value="Berhenti"        {{ $user->sebab_tidak_aktif == 'Berhenti'       ? 'selected':'' }}>Berhenti</option>
                                        <option value="Pindah Projek"   {{ $user->sebab_tidak_aktif == 'Pindah Projek'  ? 'selected':'' }}>Pindah Projek</option>
                                        <option value="Salah Maklumat"  {{ $user->sebab_tidak_aktif == 'Salah Maklumat' ? 'selected':'' }}>Salah Maklumat</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div id="contkomen" class="form-group form-group-default required @if($user->user_status_id != 10) hide @endif" style="text-transform:none !important;">
                            <label class="fade">
                                <span id="label_email">Komen</span>
                            </label>
                            <!-- <input id="komen" class="form-control " name="komen" placeholder="" required="" type="email" value=""> -->
                            <textarea id="komen" name="komen" required style="width: 100%">@if(!is_null($user->komen)){{$user->komen}}@endif</textarea>
                        </div>

                    </form>


                    <?php
                // dd($user);
                    $user = \App\User::where('id',$user->id)->first();
                    // return $user;
                    if($user){
                      $type = \App\MakmalAkreditasi::where('emc_id',$user->entity_id)->get();
                  }
                  ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button id="simpanbtn" type="button" class="btn btn-success" onclick="submitForm('form-edit')">Hantar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    if($('#edit_status_id').val() != 102) {
        var sebabtidakaktif = document.getElementById('hidetidakaktif');
        sebabtidakaktif.classList.add("hide");
    }
    if($('#edit_status_id').val() == 110) {
        var contkomen = document.getElementById('contkomen');
        contkomen.classList.remove("hide");
    }

    var admin = $('#role_check').val();
    if(admin){
        $('input:not(.readyonlyimportant)').removeAttr('readonly');
    // $('.pengawasan').css({"pointer-events":""});
    // $('.checkbox-pengawasan').removeAttr('readonly');
    console.log('admin');
    }else{
        $('input').attr('readonly');
        console.log('non admin');
        
        // remove #contkomen from submit, kalau tak error required keluar
        var status = $('#edit_status_id').val()
        if(status != 110) {
            console.log('diable');
            $('div#contkomen textarea').prop("disabled",true);
        } else {
            console.log('enable');
            $('div#contkomen textarea').prop("disabled",false);
        }
    }

function iftiada(){
    // edit = $('#edit_status_id');
    var element = document.getElementById('edit_status_id');
    var sebabtidakaktif = document.getElementById('hidetidakaktif');
    var contkomen = document.getElementById('contkomen');
    if (element.value == 102) {
        $('#komen').val('').trigger('change');
        sebabtidakaktif.classList.remove("hide");
        contkomen.classList.add("hide");
    }else if(element.value == 101){
        $('#komen').val('').trigger('change');
        sebabtidakaktif.classList.add("hide");
        contkomen.classList.add("hide");
    }else if(element.value == 110){
        sebabtidakaktif.classList.add("hide");
        contkomen.classList.remove("hide");
    }
}

$('#edit_user_type_id').select2({
    dropdownParent: $('#edit_user_type_id').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#edit_status_id').select2({
    dropdownParent: $('#edit_status_id').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#Edit_tidak_aktif').select2({
    dropdownParent: $('#Edit_tidak_aktif').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});


$('#edit_province_office_id').select2({
    dropdownParent: $('#edit_province_office_id').parents(".modal-dialog").find('.modal-content'),
    language: 'ms',
});

$('#modal-edit').modal({
    backdrop: 'static',
    keyboard: false
});
// $('#modal-edit').modal('show');
$(".modal form").validate();

$("#form-edit").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    var tak_aktif = $('#Edit_tidak_aktif').val();
    if(tak_aktif != 0) {
        $('#komen-error').hide();
    } else {
        $('#komen-error').show();
    }

    // if(!form.valid())
    //    return;
    // document.getElementById('simpanbtn').innerText = 'Sedang diproses..';
    // document.getElementById("simpanbtn").style.pointerEvents = "none";
    // document.getElementById("simpanbtn").style.backgroundColor = "#687e95";
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
            $("#modal-edit").modal("hide");
            table.api().ajax.reload(null, false);
            if(data.message) {
                Swal.fire(data.title, data.message, data.status);
            } else {
                Swal.fire('Berjaya', 'Maklumat Telah Disimpan', 'success');
            }
        }
    });
});

// if status aktif/tidak aktif,  remove contkomen value from submit. kalau tak error ruang perlu diisi keluar
$('#edit_status_id').on('change', function() {
    var status = $('#edit_status_id').val()
    if(status == 110 || status == 102) {
        $('div#contkomen textarea').prop("disabled",false);
    } else {
        $('div#contkomen textarea').prop("disabled",true);
    }
 });

// @if($user->user_status_id)
// $("#edit_status_id").val( {{ $user->user_status_id }} ).trigger('change');
// @endif

// @if($user->user_type_id)
// $("#edit_user_type_id").val( {{ $user->user_type_id }} ).trigger('change');
// @endif

</script>
