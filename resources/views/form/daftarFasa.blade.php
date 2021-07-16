<style type="text/css">
    .showjenis{
        display: none;
    }
</style>

<div class="form-group-attached m-b-12">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <div class="form-input-group">
                    <label>
                        <span><b class="text-dark">Nama Fasa</b></span>
                    </label>
                    <input name="nama_pakej" id="nama_pakej" class="form-control form-control-lg" type="text" required>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <div class="form-input-group">
                    <label>
                        <span><b class="text-dark">Nama Kontraktor</b></span>
                    </label>
                    <input name="kontraktor_fasa" id="kontraktor_fasa" class="form-control form-control-lg" type="text" required>
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
                    <input name="tarikh_mula_fasa" id="tarikh_mula_fasa" type="text" class="form-control datepicker" required>
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
                    <input name="tarikh_akhir_fasa" id="tarikh_akhir_fasa" type="text" class="form-control datepicker" required>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-default">
                <div class="form-input-group">
                    <label>
                        <span><b class="text-dark">Negeri</b></span>
                    </label>
                    <select name="pakej_negeri_fasa" id="pakej_negeri_fasa" class="form-control form-control-lg" required>
                        <option value=""></option>
                        @foreach($states as $state)
                        <option value="{{ $state->id }}" >{{ $state->name }}</option>
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
            <input name="pakej_alamat_fasa" id="pakej_alamat_fasa" class="form-control form-control-lg" type="text" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default">
                <label>
                    <span><b class="text-dark">Alamat 2</b></span>
                </label>
                <input name="pakej_alamat1_fasa" id="pakej_alamat1_fasa" class="form-control form-control-lg" type="text">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default">
                <label>
                    <span><b class="text-dark">Alamat 3</b></span>
                </label>
                <input name="pakej_alamat2_fasa" id="pakej_alamat2_fasa" class="form-control form-control-lg" type="text">
            </div>
        </div>
    </div>
</div>
<br>



<br>
<div class="dashTitle showjenis2"><b>JENIS PENGAWASAN</b>.</div>
<div class="row" id="jenisData2">
    @foreach($pengawasans as $pengawasan)
        @if(in_array($pengawasan->id, $projekPengawasanArr))
        <div class="col-md-3">
            <div class="form-group">
                <div class="checkbox check-primary">
                    <input type="checkbox" name="pengawasan_tambahfasa[]" value="{{ $pengawasan->id }}" id="pengawasan_tambahfasa_{{ $pengawasan->id }}">
                    <label for="pengawasan_tambahfasa_{{ $pengawasan->id }}"> {{ $pengawasan->jenis_pengawasan }} </label>
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>
<br>

{{-- <label style="font-size:13px; font-family: 'Montserrat'">Jadual Perlaksanaan Projek</label> --}}
{{-- <div class="input-group file-caption-main">
    <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
        <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>
    </div>
    <div class="input-group-btn input-group-append">
        <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span class="hidden-xs">Muat Naik</span>
            <input type="file" id="jadual_perlaksanaan_file" name="jadual_perlaksanaan_file[]" multiple/>
        </div>
    </div>
</div> --}}
<div class="form-group form-group-default">
    <label style="font-size:13px; font-family: 'Montserrat'">Jadual Perlaksanaan Projek</label>
    <div tabindex="500" class="">
        <i class="fa fa-folder-open"></i>
        <input type="file" id="jadual_perlaksanaan_file" name="jadual_perlaksanaan_file[]" multiple>
    </div>
</div>
<br>
{{-- <label style="font-size:13px; font-family: 'Montserrat'">Sertakan gambar foto yang menunjukkan status projek</label> --}}
{{-- <div class="input-group file-caption-main">
    <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
        <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>
    </div>
    <div class="input-group-btn input-group-append">
        <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span class="hidden-xs">MuatNaik</span>
            <input type="file" id="foto_status_file" name="foto_status_file[]" multiple/>
        </div>
    </div>
</div> --}}
<div class="form-group form-group-default">
    <label style="font-size:13px; font-family: 'Montserrat'">Sertakan gambar foto yang menunjukkan status projek</label>
    <div tabindex="500" class="">
        <i class="fa fa-folder-open"></i>
        <input type="file" id="foto_status_file" name="foto_status_file[]" multiple>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-2 offset-10">
            <br/>
            <button type="button" class="btn btn-success" id="" onclick="submitTambahFasa()"></i>Hantar</button>
        </div>
    </div>
</div>

<script>
    var submitTambahFasa;
    $(document).ready(function(){


        submitTambahFasa = function(){
            var projekID = "{{ $projek ? $projek->id : '' }}";
            
            var formData = new FormData;
            formData.append('projekID', projekID);
            formData.append('nama_pakej', $("#nama_pakej").val());
            formData.append('kontraktor_fasa', $("#kontraktor_fasa").val());
            formData.append('tarikh_mula_fasa', $("#tarikh_mula_fasa").val());
            formData.append('tarikh_akhir_fasa', $("#tarikh_akhir_fasa").val());
            formData.append('pakej_negeri_fasa', $("#pakej_negeri_fasa").val());
            formData.append('pakej_alamat_fasa', $("#pakej_alamat_fasa").val());
            formData.append('pakej_alamat1_fasa', $("#pakej_alamat1_fasa").val());
            formData.append('pakej_alamat2_fasa', $("#pakej_alamat2_fasa").val());
            
            
            var pengawasan = [];
            $.each($("input[name='pengawasan_tambahfasa[]']:checked"), function(){
                pengawasan.push($(this).val());
            });
            formData.append('pengawasan', pengawasan);
            
            for (var x = 0; x < $('#jadual_perlaksanaan_file')[0].files.length; x++) {
                formData.append("jadual_perlaksanaan_file[]", $('#jadual_perlaksanaan_file')[0].files[x]);
            }

            for (var x = 0; x < $('#foto_status_file')[0].files.length; x++) {
                formData.append("foto_status_file[]", $('#foto_status_file')[0].files[x]);
            }

            $.ajax({
                url: "{{ url('/projek/pendaftaranprojek/tambahfasa') }}/{{ $projek ? $projek->id : '' }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $("#projekFasaDiv").html('');
                    $("#tambahFasaModal").modal('hide');
                    $("#projekFasaDiv").load("{{ url('/projek/projek_fasa') }}/{{ $projek->id }}");
                    Swal.fire('Berjaya', 'Maklumat Telah Disimpan', 'success');
                },
                error: function(response){
                    Swal.fire('Gagal', 'Maklumat Gagal Disimpan', 'error');
                }
            });
        }
    });
</script>