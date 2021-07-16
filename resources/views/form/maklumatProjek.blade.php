<style>
    label {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
    }
    
    .hidden-xs {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        
    }
    
    .btn {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        s
    }
    
    .dashTitle {
        font-family: 'Montserrat' !important;
        font-size: 12.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        
    }
    
    th {
        background-color: #ebe8ec;
        color: #000 !important;
        //border-top: none;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
        //border-left: none !important;
        padding: 4px;
    }
    
    td {
        //background-color: #ebe8ec;
        color: #000 !important;
        //border-top: none !important;
        //border-bottom: none !important;
        //border-top: 1px solid #E7E7E7;
        //border-left: 1px solid #E7E7E7;
        //border-bottom: none !important;
        //border-left: none !important;
        //border-right: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        //font-weight: 500 !important;
        padding: 4px;
        text-align: center !important;
    }
    .modal-lg1 {
        max-width: 50% !important;
        width: 50% !important;
        margin: 0 auto !important; 
    }
    
</style>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="dashTitle"><b>MAKLUMAT PENDAFTARAN PROJEK</b></div>
                <br>
                <div class="form-group-attached m-b-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">No.Fail JAS</b></span><span style="color:red;">*</span>
                                </label>
                                <input value="{{ $projek ? $projek->no_fail_jas : '-' }}" class="form-control form-control-lg" type="text" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Nama Penggerak Projek</b></span><span style="color:red;">*</span>
                                </label>
                                <input value="{{ $userPP ? $userPP->user->name : '' }}" class="form-control form-control-lg" type="text" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Nama Projek</b></span> <span style="color:red;">*</span>
                                </label>
                                <textarea class="form-control form-control-lg" rows="3" disabled style="min-height: 70px">{{ $projek ? $projek->nama_projek : '-' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Syarikat Penggerak Projek</b></span> <span style="color:red;">*</span>
                                </label>
                                <input value="{{ $jasDetail ? $jasDetail->nama_penggerak : '-' }}" class="form-control form-control-lg" type="text" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Lokasi Projek</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $projekDetail ? $projekDetail->lokasi : '-' }}" class="form-control form-control-lg" type="text" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Lokasi Projek 2</b></span>
                                </label>
                                <input value="{{ $projekDetail ? $projekDetail->lokasi1 : '-' }}" class="form-control form-control-lg" type="text" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Lokasi Projek 3</b></span>
                                </label>
                                <input value="{{ $projekDetail ? $projekDetail->lokasi2 : '-' }}" class="form-control form-control-lg" type="text" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                </label>
                                <input value="{{ $projekDetail ? $projekDetail->poskod : '-' }}" class="form-control form-control-lg" onkeypress="return onlyNumberKey(event);" type="text" maxlength="5" disabled>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Daerah</b></span>
                                </label>
                                <input value="{{ $projekDetail ? $projekDetail->district ? $projekDetail->district->name : '-' : '-' }}" class="form-control form-control-lg" type="text" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                </label>
                                <input value="{{ $projekDetail ? $projekDetail->state ? $projekDetail->state->name : '-' : '-' }}" class="form-control form-control-lg" type="text" disabled>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Daerah</b></span>
                                </label>
                                <input value="{{ $projekDetail ? $projekDetail->district ? $projekDetail->district->name : '-' : '-' }}" class="form-control form-control-lg" type="text" disabled>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label style="color: #3699FF;">
                                     Tarikh Mula
                                     &nbsp; <i class="fa fa-calendar"></i><span style="color:red;">*</span>
                                 </label>
                                 <input id="tarikh_awal" name="tarikh_awal" value="{{ $projek->tarikh_awal ? $projek->tarikh_awal->format('d/m/Y') : '' }}" class="form-control datepicker" required>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label style="color: #3699FF;">Tarikh Akhir 
                                    &nbsp; <i class="fa fa-calendar"></i><span style="color:red;">*</span>
                                </label>
                                <input id="tarikh_akhir" name="tarikh_akhir" value="{{ $projek->tarikh_akhir ? $projek->tarikh_akhir->format('d/m/Y') : '' }}" class="form-control datepicker" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="dashTitle"><b>Alamat Surat Menyurat</b>.</div>
            <br>
            <div class="form-group-attached m-b-10">
                <div class="row">
                    <div class="form-group form-group-default">
                        <label>
                            <span><b class="text-dark">Alamat</b></span><span style="color:red;">*</span>
                        </label>
                        <input value="{{ $projekDetail ? $projekDetail->alamat_surat : '-' }}" name="alamat_surat" id="alamat_surat" class="form-control form-control-lg" type="text" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Alamat 2</b></span>
                            </label>
                            <input value="{{ $projekDetail ? $projekDetail->alamat_surat1 : '-' }}" name="alamat_surat1" id="alamat_surat1" class="form-control form-control-lg" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Alamat 3</b></span>
                            </label>
                            <input value="{{ $projekDetail ? $projekDetail->alamat_surat2 : '-' }}" name="alamat_surat2" id="alamat_surat2" class="form-control form-control-lg" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $projekDetail ? $projekDetail->surat_poskod : '-' }}" name="surat_poskod" id="surat_poskod" class="form-control form-control-lg" type="text" onkeypress="return onlyNumberKey(event);" maxlength="5" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                            </label>
                            <select name="surat_negeri" id="surat_negeri" class="form-control form-control-lg" required>
                                <option></option>
                                @foreach($states as $state)
                                <option value="{{ $state->id }}" {{ $projekDetail ? $projekDetail->surat_negeri == $state->id ? 'selected' : '' : ''}}>{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Daerah</b></span>
                            </label>
                            <select name="surat_daerah" id="surat_daerah" class="form-control form-control-lg">
                                <option value=""></option>
                                @foreach($districts as $district)
                                <option value="{{ $district->id }}" stateID="{{ $district->state_id }}" {{ $projekDetail ? $projekDetail->surat_daerah == $district->id ? 'selected' : '' : ''}}>{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="dashTitle"><b>AHLI PROJEK</b></div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div id="senaraiAhliProjekDiv"></div>
                    <br>
                    <div class="form-group-attached m-b-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Laporan Pematuhan EIA</b></span>
                                    </label>
                                    <select name="pematuhanEIA" id="pematuhanEIA" class="form-control" disabled>
                                        <option value=""></option>
                                        @foreach($pematuhans as $pematuhan)
                                        <option value="{{ $pematuhan->id }}" {{ $pematuhan->id == $projek->pematuhan_eia || $pematuhan->id == 5 ? 'selected' : '' }}>{{ $pematuhan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" id="susun" class="col-md-4 control-label">
                            <b>Jenis Pakej :</b>
                        </label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenisPakej" id="jenisPakej_1" value="1" {{ $projek->jenis_pakej == '1' ? 'checked' : '' }}> <label for="jenisPakej_1">Berpakej</label>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenisPakej" id="jenisPakej_2" value="0" {{ $projek->jenis_pakej == '0' ? 'checked' : '' }}> <label for="jenisPakej_2">Tidak Berpakej</label>
                            </div>
                        </div>
                    </div>
                    <div class="row TidakBerpakejDiv">
                        <div class="col-md-12">
                            <div class="alert alert-primary" role="alert" style="background-color: #563D7C;color:white ;font-size:11.5px; font-family: 'Montserrat'">
                                <strong> TIDAK BERFASA </strong>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row TidakBerpakejDiv">
                        <div class="col-md-6">
                            <label>
                                <span><b class="text-dark">JENIS PENGAWASAN</b></span>
                            </label>
                        </div>    
                    </div>
                    <div class="row TidakBerpakejDiv">
                        @foreach($pengawasans as $pengawasan)
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="check-primary">
                                    <input type="checkbox" value="{{ $pengawasan->id }}" id="pengawasan_{{ $pengawasan->id }}" {{ in_array($pengawasan->id, $projekPengawasanArr) ? 'checked' : '' }} disabled>
                                    <label for="pengawasan_{{ $pengawasan->id }}">{{ $pengawasan->jenis_pengawasan }}</label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row BerpakejDiv tambahFasa">
                        <div class="col-md-12">
                            <button type="button" class="dt-button buttons-html5 btn btn-default btn-sm pull-right" data-toggle="modal" data-target=".bd-example-modal-lg1">
                                <span> <i class="fa fa-plus"></i> FASA</span>
                            </button>
                        </div>
                    </div>
                    @include('projek.tambah_fasa_projek_modal')
                    <div id="kemaskini_fasa_projek_modal">

                    </div>
                    <div id="kemaskiniFasaProjekModal" class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg1">
                            <div id="kemaskiniFasaProjekModalContent" class="modal-content">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row BerpakejDiv">
                        <div class="col-md-12">
                            <div class="alert alert-primary" role="alert" style="background-color: #563D7C;color:white ;font-size:11.5px; font-family: 'Montserrat'">
                                <strong> FASA </strong>
                            </div>
                            <br>
                            <div class="alert alert-danger">

                                <label>
                                    <b>Sila tekan butang kemaskini untuk mendaftar EO & EMC</b>
                                </label>

                            </div>
                            <br>
                            <div id="projekFasaDiv"></div>
                        </div>
                    </div>
                    <div class="col-md-12 p-t-20">
                        <ul class="pager wizard no-style">
                            <li class="submit">
                                <button onclick="submitTabMaklumatProjek()" class="btn btn-info btn-cons from-left pull-right blink" id="simpan" type="button">
                                    <span>Simpan</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>

<script>
    var submitTabMaklumatProjek;
    var kemaskiniFasa;
    $(document).ready(function(){
        $("#senaraiAhliProjekDiv").load("{{ url('/projek/senarai_ahli') }}/{{ $projek->id }}");
        $("#projekFasaDiv").load("{{ url('/projek/projek_fasa') }}/{{ $projek->id }}");

        $(".BerpakejDiv").hide();
        $(".TidakBerpakejDiv").hide();
        
        submitTabMaklumatProjek = function(){
            var projekID = "{{ $projek ? $projek->id : '' }}";
            
            var formData = new FormData;
            formData.append('projekID', projekID);
            formData.append('tarikh_awal', $("#tarikh_awal").val());
            formData.append('tarikh_akhir', $("#tarikh_akhir").val());
            formData.append('alamat_surat', $("#alamat_surat").val());
            formData.append('alamat_surat1', $("#alamat_surat1").val());
            formData.append('alamat_surat2', $("#alamat_surat2").val());
            formData.append('surat_poskod', $("#surat_poskod").val());
            formData.append('surat_negeri', $("#surat_negeri").val());
            formData.append('surat_daerah', $("#surat_daerah").val());
            formData.append('pematuhanEIA', $("#pematuhanEIA").val());
            formData.append('jenisPakej', $("input[name='jenisPakej']:checked").val());
            
            $.ajax({
                url: "{{ url('/projek/pendaftaranprojek/maklumatprojek') }}/{{ $projek ? $projek->id : '' }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success == false) {
                        Swal.fire('Gagal', response.message, 'error');
                        // Swal.fire('Gagal', 'Maklumat Gagal Disimpan, Sila isi ruangan mandatori', 'error');
                    } 
                    else{
                        Swal.fire('Berjaya', 'Maklumat Telah Disimpan', 'success');
                        $("#tabBtnDaftar2").prop('disabled', false);
                        $("#tabBtnSyarat").prop('disabled', false);
                        $("#tabBtnDaftar3").prop('disabled', false);
                    }
                }
            });
        }

        $("input[name='jenisPakej']").on('change', function(){
            var jenisPakej = $(this).val();
            if(jenisPakej == "1")
            {
                $(".BerpakejDiv").show();
                $(".TidakBerpakejDiv").hide();
            }
            else if(jenisPakej == "0"){
                $(".BerpakejDiv").hide();
                $(".TidakBerpakejDiv").show();
            }
        });

        $("input[name='jenisPakej']:checked").trigger('change');

        kemaskiniFasa = function (projekFasaID)
        {
            $("#kemaskiniFasaProjekModalContent").load("{{ url('/projek/pendaftaranprojek/kemaskinifasa') }}/" + projekFasaID);
            $("#kemaskiniFasaProjekModal").modal('show');
        }

        $("#surat_negeri").on('change', function(){
            $("#surat_daerah").val('');
            $("#surat_daerah option").hide();
            var surat_negeri = $(this).val();
            $("#surat_daerah option[stateID='"+ surat_negeri +"']").show();
        });
        
    });

    function selectUser() {
        var userId = $('#user_emc').val();
        if (userId != '') {
            $('.showjenis').css('display','block');
        } else {
            $('.showjenis').css('display','none');
            return;
        }
        var projekID = "{{ $projek ? $projek->id : '' }}";
        var formData = new FormData;
        formData.append('projekID', projekID);
        formData.append('userId', userId);

        $.ajax({
            url: "{{ url('/projek/pendaftaranprojek/getuserdata') }}",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {

                var jenisData = $("#jenisData");
                jenisData.empty();
                $.each(response.data, function(i, order){

                    jenisData.append('<div class="col-md-3"><div class="form-group"><div class="checkbox check-primary"><input type="checkbox" name="pengawasan_tambahfasa[]" value='+response.data[i].id+' id="pengawasan_tambahfasa_'+response.data[i].id+'"><label for="pengawasan_tambahfasa_'+response.data[i].id+'"> '+response.data[i].jenis_pengawasan+' </label></div></div></div>')
                });    
            }
        });
    }

    function onlyNumberKey(evt) {       
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
          return false; 
      return true; 
  }
</script>

