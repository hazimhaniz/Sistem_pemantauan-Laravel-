<div class="modal-header">
    <h5 class="modal-title" id="addModalTitle"> Kemaskini Fasa</h5>
    <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body m-t-20">
    <ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist">
        {{-- <li class="nav-item ml-md-3">
            <a class="active" data-toggle="tab" href="#" data-target="#tab1kemaskinifasa" role="tab"><span>(1) Maklumat Pendaftaran Projek</span></a>
        </li> --}}
        <li class="nav-item">
            <a class="active" data-toggle="tab" href="#" data-target="#tab2kemaskinifasa" role="tab"><span>(2)Maklumat Pendaftaran EO & EMC</span></a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" id="tab1kemaskinifasa">
            <div class="form-group-attached m-b-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <span><b class="text-dark">Nama Fasa</b></span>
                                </label>
                                <input value="{{ $projekFasa->nama_pakej }}" name="nama_pakej_u" id="nama_pakej_u" class="form-control form-control-lg" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <span><b class="text-dark">Nama Kontraktor</b></span>
                                </label>
                                <input value="{{ $projekFasa->kontraktor }}" name="kontraktor_fasa_u" id="kontraktor_fasa_u" class="form-control form-control-lg" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group-attached m-b-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <span><b class="text-dark">Tarikh Awal</b></span>
                                    <i class="fa fa-calendar"></i>
                                </label>
                                <input value="{{ $projekFasa->tarikh_mula ? $projekFasa->tarikh_mula->format('d/m/Y') : '' }}" name="tarikh_mula_fasa_u" id="tarikh_mula_fasa_u" type="text" class="form-control datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <span><b class="text-dark">Tarikh Akhir</b></span>
                                    <i class="fa fa-calendar"></i>
                                </label>
                                <input value="{{ $projekFasa->tarikh_akhir ? $projekFasa->tarikh_akhir->format('d/m/Y') : '' }}" name="tarikh_akhir_fasa_u" id="tarikh_akhir_fasa_u" type="text" class="form-control datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <span><b class="text-dark">Negeri</b></span>
                                </label>
                                <select name="pakej_negeri_fasa_u" id="pakej_negeri_fasa_u" class="form-control form-control-lg">
                                    <option value=""></option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->id }}" {{ $state->id == $projekFasa->pakej_negeri ? 'selected' : '' }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group-attached m-b-10">
                <div class="row">
                    <div class="form-group form-group-default">
                        <label>
                            <span><b class="text-dark">Alamat</b></span><span style="color:red;">*</span>
                        </label>
                        <input value="{{ $projekFasa->alamat }}" name="pakej_alamat_fasa_u" id="pakej_alamat_fasa_u" class="form-control form-control-lg" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Alamat 2</b></span>
                            </label>
                            <input value="{{ $projekFasa->alamat1 }}" name="pakej_alamat1_fasa_u" id="pakej_alamat1_fasa_u" class="form-control form-control-lg" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Alamat 3</b></span>
                            </label>
                            <input value="{{ $projekFasa->alamat2 }}" name="pakej_alamat2_fasa_u" id="pakej_alamat2_fasa_u" class="form-control form-control-lg" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="dashTitle"><b>JENIS PENGAWASAN</b>.</div>
            <div class="row">
                @foreach($pengawasans as $pengawasan)
                @if(in_array($pengawasan->id, $projekPengawasanArr))
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="checkbox check-primary">
                            <input type="checkbox" name="pengawasan_tambahfasa[]" value="{{ $pengawasan->id }}" id="pengawasan_tambahfasa_{{ $pengawasan->id }}" {{ in_array($pengawasan->id, $pakejHasPengawasans->pluck('pengawasan_id')->toArray()) ? 'checked' : '' }}>
                            <label for="pengawasan_tambahfasa_{{ $pengawasan->id }}"> {{ $pengawasan->jenis_pengawasan }} </label>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <br>
            <label style="font-size:13px; font-family: 'Montserrat'">Jadual Perlaksanaan Projek</label>
            <div class="input-group file-caption-main">
                <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
                    <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>
                </div>
                <div class="input-group-btn input-group-append">
                    <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span class="hidden-xs">Muat Naik</span><input id="input-ke-salinan" name="input-ke-salinan[]" type="file" multiple=""></div>
                </div>
            </div>
            <br>
            <label style="font-size:13px; font-family: 'Montserrat'">Sertakan gambar foto yang menunjukkan status projek</label>
            <div class="input-group file-caption-main">
                <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
                    <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>
                </div>
                <div class="input-group-btn input-group-append">
                    <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span class="hidden-xs">MuatNaik</span><input id="input-ke-salinan" name="input-ke-salinan[]" type="file" multiple=""></div>
                </div>
            </div>
            
        </div>
        <div class="tab-pane active" id="tab2kemaskinifasa">
            <div class="row">
                <div class="col-md-12">
                    <table class="" id="table" role="grid" aria-describedby="table_info" style="padding:10px; width:100%">
                        <thead>
                            <tr>
                                <th class="align-top text-center" style="color:#; width:20%;">Pengawasan</th>
                                <th class="align-top text-center" style="color:#; width:20%;">Nama EO</th>
                                <th class="align-top text-center" style="color:#; width:20%;">Nama EMC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pakejHasPengawasans as $pakejHasPengawasan)
                            <tr>
                                <td>
                                    <input type="hidden" name="pengawasanAssignID[]" value="{{ $pakejHasPengawasan->pengawasan_id }}">
                                    {{ $pakejHasPengawasan->pengawasannama ? $pakejHasPengawasan->pengawasannama->jenis_pengawasan : '-' }}
                                </td>
                                <td>
                                    <select name="userEO[]" class="form-control">
                                        <option value=""></option>
                                        @foreach($userEOs as $userEO)
                                        <option value="{{ $userEO->user ? $userEO->user->id : '' }}"> {{ $userEO->user ? $userEO->user->name : '' }} </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="userEMC[]" class="form-control">
                                        <option value=""></option>
                                        @foreach($userEMCs as $userEMC)
                                        <?php
                                            $hasuser = App\ProjekPengawasan::where('projek_id', $projek->id)->where('pengawasan_id', $pakejHasPengawasan->pengawasan_id)->where('user_id', $userEMC->user->id)->first();
                                            if (empty($hasuser)) {
                                                continue;
                                            }

                                        ?>
                                            <option value="{{ $userEMC->user ? $userEMC->user->id : '' }}"> {{ $userEMC->user ? $userEMC->user->name : '' }} </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2 offset-10">
                        <br/>
                        <button type="button" class="btn btn-success" id="" onclick="submitKemaskiniFasa()"></i>Hantar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
</div>

<script>
    var submitKemaskiniFasa;
    $(document).ready(function(){
        submitKemaskiniFasa = function(){
            var projekID = "{{ $projek ? $projek->id : '' }}";
            
            var formData = new FormData;
            formData.append('projekID', projekID);
            formData.append('nama_pakej', $("#nama_pakej_u").val());
            formData.append('kontraktor_fasa', $("#kontraktor_fasa_u").val());
            formData.append('tarikh_mula_fasa', $("#tarikh_mula_fasa_u").val());
            formData.append('tarikh_akhir_fasa', $("#tarikh_akhir_fasa_u").val());
            formData.append('pakej_negeri_fasa', $("#pakej_negeri_fasa_u").val());
            formData.append('pakej_alamat_fasa', $("#pakej_alamat_fasa_u").val());
            formData.append('pakej_alamat1_fasa', $("#pakej_alamat1_fasa_u").val());
            formData.append('pakej_alamat2_fasa', $("#pakej_alamat2_fasa_u").val());
            
            var pengawasan = [];
            $.each($("input[name='pengawasan_tambahfasa[]']:checked"), function(){
                pengawasan.push($(this).val());
            });
            formData.append('pengawasan', pengawasan);

            var pengawasanAssignID = [];
            $.each($("input[name='pengawasanAssignID[]']"), function(){
                pengawasanAssignID.push($(this).val());
            });
            formData.append('pengawasanAssignID', pengawasanAssignID);

            var userEO = [];
            $.each($("select[name='userEO[]']"), function(){
                userEO.push($(this).val());
            });
            formData.append('userEO', userEO);

            var userEMC = [];
            $.each($("select[name='userEMC[]']"), function(){
                userEMC.push($(this).val());
            });
            formData.append('userEMC', userEMC);
            
            $.ajax({
                url: "{{ url('/projek/pendaftaranprojek/kemaskinifasa') }}/{{ $projekFasa->id }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                     Swal.fire('Berjaya', 'Maklumat Telah Disimpan', 'success');
                     $("#kemaskiniFasaProjekModal").modal('hide');
                    $("#projekFasaDiv").html('');
                    $("#projekFasaDiv").load("{{ url('/projek/projek_fasa') }}/{{ $projek->id }}");
                }
            });
        }
    });
</script>