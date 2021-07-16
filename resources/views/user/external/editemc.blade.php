<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"><span class="bold">Kemaskini Pengguna</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <input type="hidden" value="{{auth()->user()->hasRole("admin_hq")}}" id="role_check">
            <div class="modal-body m-t-20">
                @if($user->user_has_role->where('role_id', 5)->first())

                @include('components.input', [
                'label' => 'No Kompetensi',
                'mode' => 'readonly',
                'name' => 'no_kompetensi',
                'value' => $user->entity->no_kompetensi,
                ])


                <!-- <a href="javascript:;" class="btn btn-info btn-sm m-t-5 pull-left"><i class="fa fa-search mr-1"></i>Semak</a><br><br> -->

                @include('components.input', [
                'label' => 'Tarikh Kompetensi',
                'mode' => 'readonly',
                'name' => 'date_kompetensi',
                'value' => date('d/m/Y', strtotime($user->entity->date_kompetensi))
                ])

                @endif 


                <form id='form-edit1' role="form" method="post" action="{{ route('user.external.form', $user->id) }}">

                    @if($user->user_has_role->where('role_id', 6)->first())

                    <!-- @include('components.input', [
                        'label' => 'Nama Syarikat',
                        'mode' => 'readonly',
                        'name' => 'syarikat',
                        'value' => $user->entity->syarikat
                    ])

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
                        ]) -->

                        <div class="form-group form-group-default readonly" style="background: #f3f3f3;">
                            <label>
                                <span id="label_syarikat">Nama Syarikat</span>
                                <span style="color:red;">*</span>
                            </label>
                            <input id="syarikat" class="form-control " name="syarikat" placeholder="" onkeypress="" readonly="" type="text" value="{{strtoupper($user->entity->syarikat)}}">
                        </div>
                        <div class="form-group form-group-default readonly" style="background: #f3f3f3;">
                            <label>
                                <span id="label_syarikat">Alamat</span>
                                <span style="color:red;">*</span>
                            </label>
                            <input id="alamatsyarikat" class="form-control " name="alamatsyarikat" placeholder="" onkeypress="" readonly="" type="text" value="{{strtoupper($user->entity->alamatsyarikat)}}">
                        </div>
                        <div class="form-group form-group-default readonly" style="background: #f3f3f3;">
                            <label>
                                <span id="label_poskod">Poskod</span>
                                <span style="color:red;">*</span>
                            </label>
                            <input id="poskod" class="form-control " name="poskod" placeholder="" onkeypress="" readonly="" type="text" value="{{$user->entity->poskod}}">
                        </div>
                        <div class="form-group form-group-default readonly" style="background: #f3f3f3;">
                            <label>
                                <span id="label_negeri_id">Negeri</span>
                                <span style="color:red;">*</span>
                            </label>
                            <input id="negeri_id" class="form-control" name="negeri_id" placeholder="" onkeypress="" readonly="" type="text" value="{{strtoupper(optional($user->entity->state)->id)}}">
                        </div>
                        <div class="form-group form-group-default readonly" style="background: #f3f3f3;">
                            <label>
                                <span id="label_daerah_id">Daerah</span>
                                <span style="color:red;">*</span>
                            </label>
                            <input id="daerah_id" class="form-control " name="daerah_id" placeholder="" onkeypress="" readonly="" type="text" value="{{strtoupper(optional($user->entity_emc->district)->id)}}">
                        </div>

                        @endif 




                    <!-- @include('components.input', [
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
                        ]) -->

                        <div class="form-group form-group-default required" style="background: #f3f3f3;">
                            <label>
                                <span id="label_name">Nama Penuh</span>
                                <span style="color:red;">*</span>
                            </label>
                            <input id="name" class="form-control " name="name" placeholder="" onkeypress="" type="text" value="{{$user->name}}" readonly>
                        </div>
                        <div class="form-group form-group-default required" style="background: #f3f3f3;">
                            <label>
                                <span id="label_username">ID Pengguna</span>
                                <span style="color:red;">*</span>
                            </label>
                            <input id="username" class="form-control " name="username" placeholder="" onkeypress="" type="text" value="{{$user->username}}" readonly>
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

                        <div class="form-group form-group-default required" style="text-transform:none !important; background: #f3f3f3;">
                            <label class="fade">
                                <span id="label_email">Alamat Emel</span>
                            </label>
                            <input style="text-transform: none !important;" id="email" class="form-control " name="email" placeholder="" type="email" value="{{$user->email}}" readonly>
                        </div>

                    <!-- @include('components.input', [
                        'label' => 'Password',
                        'info' => 'Minimum 8 characters',
                        'mode' => 'required',
                        'name' => 'password',
                        'type' => 'password',
                        'options' => 'minlength=8',
                        'placeholder' => 'Minimum 8 characters',
                        ]) -->
                        <?php
                        $user = \App\User::where('id',$user->id)->first();
                    // return $user;
                        if($user){
                          $type = \App\MakmalAkreditasi::where('emc_id',$user->entity_id)->get();
                      }
                      ?>
                      <div class="col-xs-12 col-md-12 col-lg-12">
                      <table class="table table-responsive " id="tablemakmal">
                        <thead>
                            <tr>
                                <th class="bold">Kod Makmal</th>
                                <th class="bold">Nama Makmal Akreditasi</th>
                                <th class="bold">No Tel Makmal Akreditasi</th>
                                <th class="bold">Alamat Makmal Akreditasi</th>
                                <th class="bold">Skop Pengawasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($type as $types)
                            <tr>
                                <td>{{$types->kod_makmal}}</td>
                                <td>{{$types->nama_makmal}}</td>
                                <td>{{$types->no_tel_makmal}}</td>
                                <td>{{$types->alamat_makmal}}</td>
                                <td>{{$types->makmal->jenis_pengawasan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
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

                    <br>    

                <div class="row">
                        <div class="col-md-12">
                         <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                            <label><span>Status</span></label>
                            <select id="edit_status_id" name="user_status_id" class="full-width autoscroll state" data-init-plugin="select2" onchange="iftiada()" required="">
                                <option value="" selected disabled="">Pilih satu..</option>
                                @foreach($all_status as $index => $status)
                                @if($user->user_status_id = 1 && $status->id != 2  && $user->user_status_id != 10 && $status->id != 10)
                                <option value="1" {{($user->user_status_id == 1)?'':''}}>Aktif</option>
                                @endif
                                @if($user->user_status_id != 1 && $status->id = 2  && $user->user_status_id != 10 && $status->id != 10)
                                <option value="2" {{($user->user_status_id == 2)?'':''}}>Tidak Aktif</option>
                                @endif
                                <!-- tambah tiada pengesahan -->
                                @if($user->user_status_id != 1 && $status->id = 10  && $user->user_status_id != 2 && $status->id != 2)
                                <option value="10" {{($user->user_status_id == 10)?'':''}}>Permohonan Ditolak</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="hidetidakaktif" class="form-group form-group-default form-group-default-custom form-group-default-select2 required @if($user->user_status_id != 2) hide @endif">
                            <label><span>Sebab Tidak Aktif</span></label>
                            <select id="Edit_tidak_aktif" name="sebabtidakaktif" class="full-width autoscroll state" data-init-plugin="select2" required>
                                <option value="" selected>Pilih satu..</option>
                                <option value="Berhenti">Berhenti</option>
                                <option value="Pindah Projek">Pindah Projek</option>
                                <option value="Salah Maklumat">Salah Maklumat</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- <div id="sebabdisekat" style="display:none;">
                    @include('components.textarea', [
                    'name' => 'description',
                    'label' => 'Sebab Disekat',
                    'mode' => 'required',
                    'value' => ''
                    ])
                </div> -->


                
                <div id="contkomen" class="form-group form-group-default required @if($user->user_status_id != 10) hide @endif" style="text-transform:none !important;">
                        <label class="fade">
                            <span id="label_email">Komen</span>
                        </label>
                        <!-- <input id="komen" class="form-control " name="komen" placeholder="" required="" type="email" value=""> -->
                        <textarea id="komen" name="komen" required="" style="width: 100%">@if(!is_null($user->komen)){{$user->komen}}@endif</textarea>
                        </div>


            </form>

        </div>
        <div class="modal-footer">
            <button id="simpanbtn" type="button" class="btn btn-info" onclick="submitForm('form-edit1')">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">


    var admin = $('#role_check').val();
    if(admin){
        $('input').removeAttr('readonly');
    // $('.pengawasan').css({"pointer-events":""});
    // $('.checkbox-pengawasan').removeAttr('readonly');
    console.log('admin');
}else{
    $('input').attr('readonly');
    console.log('non admin');
}



// var admin_hq = '{{auth()->user()->hasRole('admin_hq')}}';
// if(admin_hq){
//     $('input').removeAttr('readonly');
//     // $('.pengawasan').css({"pointer-events":""});
//     // $('.checkbox-pengawasan').removeAttr('readonly');
// }

/*function selectstatus(){
    var e = document.getElementById("sebabtidakaktif");
    var strUser = e.options[e.selectedIndex].value;
    console.log(strUser);
    if (strUser == 4 ){
        $('#sebabdisekat').show();
    } else {
        $('#sebabdisekat').hide();
    }
}
*/

// function iftiada(){
//     // edit = $('#edit_status_id');
//     var element = document.getElementById('edit_status_id');
//     var sebabtidakaktif = document.getElementById('hidetidakaktif');
//     if (element.value == 2) {
//         sebabtidakaktif.classList.remove("hide");

//     }else if(element.value == 1){
//      sebabtidakaktif.classList.add("hide");
//  }
// }

function iftiada(){
    // edit = $('#edit_status_id');
    var element = document.getElementById('edit_status_id');
    var sebabtidakaktif = document.getElementById('hidetidakaktif');
    var contkomen = document.getElementById('contkomen');
    if (element.value == 2) {
        sebabtidakaktif.classList.remove("hide");
        contkomen.classList.add("hide");
    }else if(element.value == 1){
       sebabtidakaktif.classList.add("hide");
       contkomen.classList.add("hide");
    }else if(element.value == 10){
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

// $('#modal-edit').modal('show');
$('#modal-edit').modal({
    backdrop: 'static',
    keyboard: false
});
$(".modal form").validate();

$("#form-edit1").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    console.log('siniiiiiii2');

    // if(!form.valid())
    //    return;

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

// @if($user->user_status_id)
// $("#edit_status_id").val( {{ $user->user_status_id }} ).trigger('change');
// @endif

// @if($user->user_type_id)
// $("#edit_user_type_id").val( {{ $user->user_type_id }} ).trigger('change');
// @endif

</script>
