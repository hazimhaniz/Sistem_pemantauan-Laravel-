<form id='daftar_fasa' role="form" method="post" action="{{ route('projek.fasa') }}">
    {{ csrf_field() }}
    <div class="form-group-attached m-b-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <div class="form-input-group">
                        <label>
                            <span><b class="text-dark">Nama Fasa</b></span>
                        </label>
                        <input class="form-control form-control-lg" type="text" placeholder="" name="nama_pakej">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <div class="form-input-group">
                        <label>
                            <span><b class="text-dark">Nama Kontraktor</b></span>
                        </label>
                        <input class="form-control form-control-lg" type="text" placeholder="" name="kontraktor">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>

    <div class="form-group-attached m-b-12">
        <div class="row">
            <div class="col-md-4">

                <div id="tarikh_mula_fasa" class="form-group form-group-default">
                    <div class="form-input-group">
                        <label>
                            <span><b class="text-dark">Tarikh Awal</b></span>
                            <i class="fa fa-calendar"></i> </label>
                            <input id="tarikh_mula_fasa" class="form-control datepicker " name="tarikh_mula_fasa" placeholder=""  onchange="testt2()" type="" value="">
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">Tarikh Akhir</b></span>
                                <i class="fa fa-calendar"></i></label>
                                <input id="tarikh_akhir_fasa" class="form-control datepicker " name="tarikh_akhir_fasa" onchange="testt2()" placeholder="" type="" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <label>Negeri<span style="color:red;">*</span> </label>
                                    <select name="negeri" data-placeholder="" class="full-width autoscroll form-control" style="width: 100%">
                                       <option value="" selected="" disabled="">Pilih Negeri</option>
                                       @foreach($states as $ss)
                                       <option value="{{ $ss->id }}">{{ strtoupper($ss->name) }}</option>
                                       @endforeach
                                   </select>
                               </div>
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
                    <input id="alamat" class="form-control " name="alamat" placeholder="Alamat baris 1" onkeypress=""  type="text" maxlength="100" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="form-group form-group-default">
                        <label>
                            <span><b class="text-dark">Alamat 2</b></span>
                        </label>
                        <input id="alamat1" class="form-control " name="alamat1" placeholder="Alamat baris 2" onkeypress="" maxlength="100" type="text" value="">

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="form-group form-group-default">
                        <label>
                            <span><b class="text-dark">Alamat 3</b></span>
                        </label>
                        <input id="alamat2" class="form-control " name="alamat2" placeholder="Alamat baris 3" onkeypress="" maxlength="100" type="text" value="">
                    </div>

                </div>
            </div>
        </div>
        <br>
        <div class="dashTitle"><b>JENIS PENGAWASAN</b>.</div>

        <div class="row">
           @foreach ($Pengawasan as $senaraipengawasan)
           <div class="col-md-3">
            <div class="form-group">
                <div class="checkbox check-primary">
                    <input type="checkbox" value="{{$senaraipengawasan->id}}" id="{{$senaraipengawasan->id}}" name="pengawasan[]">
                    <label for="{{$senaraipengawasan->id}}">
                        @if($senaraipengawasan->id=='5')
                        Kolam
                        @endif
                        @if($senaraipengawasan->id!='5')
                        {{$senaraipengawasan->jenis_pengawasan}}
                        @endif

                    </label>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <label style="font-size:13px; font-family: 'Montserrat'">Jadual Perlaksanaan Projek</label>
    <div class="input-group file-caption-main">
        <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
            <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>

        </div>
        <div class="input-group-btn input-group-append">

            <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span
                class="hidden-xs">Muat Naik</span><input id="input-ke-salinan" name="input-ke-salinan[]" type="file"
                multiple="">
            </div>
        </div>
    </div>
    <br>
    <label style="font-size:13px; font-family: 'Montserrat'">Sertakan gambar
    foto yang menunjukkan status projek</label>
    <div class="input-group file-caption-main">
        <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
            <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>

        </div>
        <div class="input-group-btn input-group-append">

            <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span
                class="hidden-xs">MuatNaik</span><input id="input-ke-salinan" name="input-ke-salinan[]" type="file"
                multiple="">
            </div>
        </div>
    </div>
    <br>

    <div>
        <button class="btn btn-info btn-cons from-left pull-right"  type="submit">
            <span>Simpan</span>
        </button>

        <button class="btn btn-danger btn-cons from-left pull-right daftar_ldp2m2" onclick="$('.dropify-clear').click();" data-dismiss="modal" type="submit">
            <span>Tutup</span>
        </button>
    </div>
</form>








