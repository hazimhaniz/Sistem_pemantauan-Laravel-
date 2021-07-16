<style type="text/css">
    table {
        width: 100%;
    }

    tr {
        height: 30px;
    }

    th ,td {
        padding: 5px 3px 5px 7px;
        font-size: 12px !important;
        /*text-align: center;*/
    }
    td {
        border: 1px solid #b5b5b4 ;
    }
    th {
        border-right: 1px solid white ;
    }
    .modal-dialog {
        max-width: 100% !important;
        width: 68% !important;
    }

    .blackink {
        color: rgba(0, 0, 0, 0.75) !important;
    }

    .has-error .select2-selection {
        border-color: rgb(255, 5, 0) !important;
    }
</style>
<div class=" container-fluid container-fixed-lg bg-white">
    <div class="card card-transparent">
        <div class="card-block">
            <div class="card card-default">
                <div class="card-header separator">
                    <div class="card-title" style="font-weight: bold;font-size: 12.5px">MAKLUMAT PENDAFTARAN PROJEK</div>
                </div>
                <div class="card-body p-t-20">

                    <input class="projek" type="hidden" name="id" value="{{$ProjekDetail->id}}">

                        <div class="form-group row control-label">
                            <label class="col-md-3">No Fail JAS<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek blackink" name="no_fail_jas" id="no_fail_jas" type="text" value="{{$Projek->no_fail_jas}}" style="color: rgba(0, 0, 0, 0.75) !important;" readonly></div>
                        </div>

                        <div class="form-group row control-label">
                            <label class="col-md-3">Nama Projek<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><textarea class="form-control projek blackink" name="nama_projek" id="nama_projek" type="text" style="height: auto;color: rgba(0, 0, 0, 0.75) !important;" readonly>{{$Projek->nama_projek}}</textarea></div>
                        </div>

                        <div class="form-group row control-label">
                            <label class="col-md-3">Syarikat Penggerak Projek<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek blackink" name="penggerak_projek" id="penggerak_projek" type="text" value="{{$Projek->jasfail->jasdetail->nama_penggerak}}" style="color: rgba(0, 0, 0, 0.75) !important;" readonly></div>
                        </div>
                        <div class="form-group row control-label">
                            <label class="col-md-3">Nama Penggerak Projek<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek blackink" name="penggerak_projek" id="penggerak_projek" type="text" value="{{$Projek->user->name}}" style="color: rgba(0, 0, 0, 0.75) !important;" readonly></div>
                        </div>
                        <hr>
                        <div class="form-group row control-label">
                            <label class="col-md-3">Lokasi<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;" name="lokasi" id="lokasi" type="text" value="{{$ProjekDetail->lokasi}}" readonly>
                                <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;" name="lokasi1" id="lokasi1" type="text" value="{{$ProjekDetail->lokasi1}}" readonly>
                                <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;" name="lokasi2" id="lokasi2" type="text" value="{{$ProjekDetail->lokasi2}}" readonly>
                            </div>
                        </div>
                        <div class="address22">
                            <div class="form-group row control-label">
                                <label class="col-md-3">Poskod<span style="color:red;">*</span> </label>
                                <div class="col-md-3"><input class="form-control numeric postcode projek blackink" name="poskod" aria-required="true" type="text" value="{{$ProjekDetail->poskod}}" style="color: rgba(0, 0, 0, 0.75) !important;" required placeholder="Poskod" minlength="5" maxlength="5" readonly></div>
                            </div>
                            <div class="form-group row control-label">
                                <label class="col-md-3">Negeri<span style="color:red;">*</span> </label>
                                <div class="col-md-3">

                                    <input class="form-control projek blackink" name="negeri" aria-required="true" type="text" value="{{strtoupper(optional($ProjekDetail->state)->name)}}" style="color: rgba(0, 0, 0, 0.75) !important;" required placeholder="Negeri" minlength="5" maxlength="5" readonly>
                                    <!-- <select id="negeri" name="negeri" class="form-control autoscroll state projek" data-init-plugin="select2" required="" >
                                        <option value="" selected="" disabled="">Pilih Negeri</option>
                                        @foreach($states as $index => $state)
                                        <option value="{{ $state->id }}">{{ strtoupper($state->name) }}</option>
                                        @endforeach
                                    </select> -->
                                </div>
                                <label class="col-md-3">Daerah<span style="color:red;">*</span> </label>
                                <div class="col-md-3">
                                    <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;" name="negeri" aria-required="true" type="text" value="{{optional($jasdetail)->daerah}}" required placeholder="Daerah" minlength="5" maxlength="5" readonly>
                                    <!-- <select id="daerah" name="daerah" class="form-control autoscroll district projek" data-init-plugin="select2" required="" >
                                    </select> -->
                                </div>
                            </div>
                            <div class="form-group row control-label">
                                <label class="col-md-3">Bandar<span style="color:red;">*</span> </label>
                                <div class="col-md-3">
                                    <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;" name="bandar" aria-required="true" type="text" value="{{$ProjekDetail->bandar}}" required placeholder="Bandar" minlength="5" maxlength="5" readonly>
                                    <!-- <select id="daerah" name="daerah" class="form-control autoscroll district projek" data-init-plugin="select2" required="" >
                                    </select> -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row control-label">
                            <label class="col-md-3">Alamat Surat-Menyurat<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                <!-- onkeyup="this.value = this.value.toUpperCase();" -->
                                <input class="form-control projek1" name="alamat_surat" id="alamat_surat" type="text" value="{{$ProjekDetail->alamat_surat}}"  maxlength="100" required>
                                <input class="form-control projek1" name="alamat_surat1" id="alamat_surat1" type="text" value="{{$ProjekDetail->alamat_surat1}}"  maxlength="100">
                                <input class="form-control projek1" name="alamat_surat2" id="alamat_surat2" type="text" value="{{$ProjekDetail->alamat_surat2}}"  maxlength="100">
                            </div>
                        </div>
                        <div class="address">
                            <div id="posk" class="form-group row">
                                <label class="col-md-3 control-label">Poskod<span style="color:red;">*</span> </label>
                                <div class="col-md-3"><input class="form-control numeric postcode projek1" id="surat_poskod" name="surat_poskod" aria-required="true" type="text" value="{{$ProjekDetail->surat_poskod}}" placeholder="Poskod" minlength="5" maxlength="5" required/>
                                <label id="poskerror" style="display: none;font-size: 11px;color: #f35958;">Sila isi poskod yang sah.</label>
                                </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 control-label">Negeri<span style="color:red;">*</span> </label>
                            <div class="col-md-3" style="z-index: 0 !important">
                                <div class="jenisN">
                                    <select id="surat_negeri" name="surat_negeri" class="form-control autoscroll state projek1" data-init-plugin="select2" required>
                                        <option value="" selected="" disabled="">Pilih Negeri</option>
                                        @foreach($states as $index => $state)
                                        <option value="{{ $state->id }}">{{ strtoupper($state->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-md-3 control-label">Daerah<span style="color:red;">*</span> </label>
                            <div class="col-md-3" style="z-index: 0 !important">
                                <select id="surat_daerah" name="surat_daerah" class="form-control autoscroll district projek1" data-init-plugin="select2" required>
                                </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 control-label">Bandar<span style="color:red;">*</span> </label>
                            <div class="col-md-3" style="z-index: 0 !important">
                                <select id="surat_bandar" name="surat_bandar" class="form-control autoscroll bandar projek1" data-init-plugin="select2" required>
                                </select>
                            </div>
                            <!-- <label class="col-md-3 control-label">Bandar<span style="color:red;">*</span> </label>
                            <div class="col-md-3" style="z-index: 0 !important">
                                <div class="jenisN">
                                    <select id="surat_bandar" name="surat_bandar" class="form-control autoscroll projek1" data-init-plugin="select2" required>
                                        @if(is_null($ProjekDetail->surat_bandar))
                                            <option value="" selected="" disabled="">Pilih Bandar</option>
                                        @else
                                            <option value="" disabled="">Pilih Bandar</option>
                                        @endif
                                        @foreach($city as $index => $state)
                                        @if($ProjekDetail->surat_bandar == $state->kod_bandar)
                                            <option value="{{ $state->kod_bandar }}" selected="">{{ strtoupper($state->name) }}</option>
                                        @else
                                            <option value="{{ $state->kod_bandar }}">{{ strtoupper($state->name) }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->
                          </div>
                        </div>
                        <hr>
                        <!-- <div class="form-group row control-label">
                            <label class="col-md-3">Environmental Officer<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                @foreach($detailEO as $detailEOs)
                                <input class="form-control projek" name="eo" id="eo" type="text" value="{{optional($detailEOs)->name}}" readonly>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row control-label">
                            <label class="col-md-3">Environmental Monitoring Consultant<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                @foreach($detailEMC as $detailEMCs)
                                <input class="form-control projek" name="emc" id="emc" type="text" value="{{optional($detailEMCs)->name}}" readonly>
                                @endforeach
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Environmental Officer<span style="color:red;">*</span></label>
                            <div class="col-md-9" style="z-index: 0 !important">
                                <div class="aktivitiVal">
                                    <table width="70%">
                                        <thead>
                                            <tr>
                                                <th width="4%">Bil.</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($detailEO)
                                            @foreach($detailEO as $key => $detailEOs)
                                            @if($detailEOs->name)
                                            <tr>
                                                <td style="text-align: center;">{{$key + 1}}.</td>
                                                <td>{{$detailEOs->name}}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Environmental Monitoring Consultant<span style="color:red;">*</span></label>
                            <div class="col-md-9" style="z-index: 0 !important">
                                <div class="aktivitiVal">
                                    <table width="70%">
                                        <thead>
                                            <tr>
                                                <th width="4%">Bil.</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($detailEMC)
                                            @foreach($detailEMC as $key => $detailEMCs)
                                            @if($detailEMCs->name)
                                            <tr>
                                                <td style="text-align: center;">{{$key + 1}}.</td>
                                                <td>{{$detailEMCs->name}}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Aktiviti<span style="color:red;">*</span></label>
                            <div class="col-md-9" style="z-index: 0 !important">
                                <div class="aktivitiVal">
                                    <table width="70%">
                                        <thead>
                                            <tr>
                                                <th width="4%">Bil.</th>
                                                <th>Kod</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($aktiviti as $key => $aktivitis)
                                            <tr>
                                                <td style="text-align: center;">{{$key + 1}}.</td>
                                                <td>{{$aktivitis['id']}}</td>
                                                <td>{{$aktivitis['nama']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row " id="other_aktiviti" style="display: none">
                            <label class="col-md-3 control-label">Nyatakan<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek" name="other_aktiviti" id="other_aktiviti" type="text" value="{{$ProjekDetail->other_aktiviti}}"></div>
                        </div>

                    <div class="form-group row control-label">
                        <label class="col-md-3 m-t-15">Laporan Pematuhan EIA<span style="color:red;">*</span> </label>
                        <div class="col-md-9" style="z-index: 0 !important">
                            <div class="laporaneiaVal">
                                <select id="laporaneia" name="laporaneia" class="form-control full-width autoscroll projek required" data-init-plugin="select2" required>
                                    <option disabled hidden selected="" value="">Sila Pilih</option>
                                    @foreach($pematuhaneia as $index => $pematuhan)
                                    @if($ProjekDetail->laporaneia == $pematuhan->id)
                                    <option value="{{$pematuhan->id}}" name="laporaneia" required selected="">{{ $pematuhan->name }}</option>
                                    @else
                                    <option value="{{$pematuhan->id}}" name="laporaneia" required>{{ $pematuhan->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <!-- <div class="radio radio-primary">
                                    @foreach($pematuhaneia as $index => $pematuhan)
                                    <input name="laporaneia" value="{{$pematuhan->id}}" id="laporaneia_{{$pematuhan->id}}" type="radio" class="projek" required aria-required="true" {{$ProjekDetail->laporaneia == $pematuhan->id ? "checked" : ""}}>
                                    <label for="laporaneia_{{$pematuhan->id}}">{{ $pematuhan->name }}</label>
                                    @endforeach
                                </div> -->
                            </div>
                        </div>
                    </div>

                        <div class="form-group row control-label">
                            <label class="col-md-3">Jenis Projek<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                <div class="jenisprojekVal">
                                    <div class="radio radio-primary">
                                        @foreach($jenisProjek as $index => $jenis)
                                        <input name="jenis_projek" value="{{$jenis->id}}" id="jenis_{{$jenis->id}}" type="radio" class="projek1" aria-required="true" onclick="PakejyesnoCheck();" onchange="PakejyesnoCheck();" {{$ProjekDetail->jenis_projek == $jenis->id ? "checked" : ""}}>
                                        <label for="jenis_{{$jenis->id}}">{{$jenis->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;" id="pakej_content">
                        <hr>
                            <div class="form-group row control-label col-md-12">
                                <button type="button" onclick="addPakej()" class="btn btn-info btn-cons"><i class="fa fa-plus m-r-5"></i>Pendaftaran Pakej</button>
                                <span class="text-danger disclaimerPakej"></span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered m-b-10" id="tablePakej">
                                    <thead>
                                    <tr>
                                        <th>Nama Pakej</th>
                                        <th>Nama Kontraktor</th>
                                        <th class="bold">Negeri</th>
                                        <!-- <th>Alamat</th> -->
                                        <th class="bold">Tarikh Mula</th>
                                        <th class="bold">Tarikh Tamat</th>
                                        <th class="bold">Tindakan</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <?php if($ProjekPakej == null){
                            $kontraktor = '';
                            $negeri = 0;
                            $alamat = '';
                            $alamat1 = '';
                            $alamat2 = '';
                            $tarikh_mula = '';
                            $tarikh_akhir = '';
                        } else {
                            $kontraktor = $ProjekPakej->kontraktor;
                            $negeri = $ProjekPakej->pakej_negeri;
                            $alamat = $ProjekPakej->alamat;
                            $alamat1 = $ProjekPakej->alamat1;
                            $alamat2 = $ProjekPakej->alamat2;
                            $tarikh_mula = $ProjekPakej->tarikh_mula;
                            $tarikh_akhir = $ProjekPakej->tarikh_akhir;
                        }
                        
                        ?>
                        <div style="display: none;" id="tidakpakej_content">
                            <hr>
                            <input type="hidden" name="nama_pakej" id="nama_pakej" value="Tidak Berpakej / Tidak Berfasa">
                            <!-- <div class="form-group row control-label" style="z-index: 0 !important">
                            @include('components.input', [
                                'label' => 'Nama Kontraktor',
                                'info' => 'eg: Ali bin Abu',
                                'name' => 'kontraktor',
                                'value' => $kontraktor,
                                'class' => 'projek',
                                'mode' => 'required',
                            ])
                            </div> -->

                            <div class="form-group row control-label">
                                <label class="col-md-3">Nama Kontraktor<span style="color:red;">*</span> </label>
                                <div class="col-md-9"><input class="form-control projek1" placeholder="Sila isi nama kontraktor" name="kontraktor" id="kontraktor" type="text" value="{{$kontraktor}}"></div>
                            </div>

                            <div id="pakej_negeri1" class="form-group row">
                                <label class="col-md-3 control-label">Negeri<span style="color:red;">*</span> </label>
                                <div class="col-md-9" style="z-index: 0 !important">
                                    <div class="">
                                        <select id="pakej_negeri1" name="pakej_negeri" class="form-control autoscroll projek1" data-init-plugin="select2" style="width: 100% !important" required>
                                        @if($negeri != 0)
                                            @foreach($states as $index1 => $state1)
                                                @if($state1->id == $negeri)
                                                <option value="{{$negeri}}" selected="" disabled="">{{ strtoupper($state1->name) }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="" selected="" disabled="">Pilih Negeri</option>
                                        @endif
                                        @foreach($states as $index => $state)
                                            <option value="{{ $state->id }}">{{ strtoupper($state->name) }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <label id="datecheckerror" style="color: red;display: none;margin-left: 26%;">Pastikan tarikh mula tidak melebihi atau sama dengan tarikh akhir.</label>
                                </div>
                            </div>

                            <!-- <div class="form-group row control-label">
                                <label class="col-md-3">Negeri<span style="color:red;">*</span> </label>
                                <div class="col-md-9">
                                    <select id="pakej_negeri" name="pakej_negeri" data-placeholder="" class="full-width autoscroll select2-hidden-accessible" data-init-plugin="select2" tabindex="-1" aria-hidden="true" required="">
                                        @if($negeri != 0)
                                            @foreach($states as $index => $state)
                                                @if($state->id == $negeri)
                                                <option value="{{$ProjekDetail->pakej_negeri}}" selected="" disabled="">{{ strtoupper($state->name) }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="" selected="" disabled="">Pilih Negeri</option>
                                        @endif
                                        @foreach($states as $index => $state)
                                            <option value="{{ $state->id }}">{{ strtoupper($state->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->

                            <!-- <div class="form-group form-group-default form-group-default-custom form-group-default-select2" style="z-index: 0 !important">
                                <label class="col-md-3">  Negeri<span style="color:red;">*</span> </label>
                                <select id="pakej_negeri" name="pakej_negeri" data-placeholder="" class="full-width autoscroll select2-hidden-accessible" data-init-plugin="select2" tabindex="-1" aria-hidden="true" required="">
                                    @if($negeri != 0)
                                        @foreach($states as $index => $state)
                                            @if($state->id == $negeri)
                                            <option value="{{$ProjekDetail->pakej_negeri}}" selected="" disabled="">{{ strtoupper($state->name) }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="" selected="" disabled="">Pilih Negeri</option>
                                    @endif
                                    @foreach($states as $index => $state)
                                        <option value="{{ $state->id }}">{{ strtoupper($state->name) }}</option>
                                    @endforeach
                                </select>
                            </div> -->
                            <div class="form-group row control-label">
                                <label class="col-md-3">Alamat<span style="color:red;">*</span> </label>
                                <div class="col-md-9"><input class="form-control projek1" name="alamat" placeholder="Sila isi alamat" id="alamat" type="text" maxlength="100" value="{{$alamat}}"></div>
                            </div>
                            <div class="form-group row control-label">
                                <label class="col-md-3"></label>
                                <div class="col-md-9"><input class="form-control projek1" name="alamat1" placeholder="Sila isi alamat" id="alamat1" type="text" maxlength="100" value="{{$alamat1}}"></div>
                            </div>
                            <div class="form-group row control-label">
                                <label class="col-md-3"></label>
                                <div class="col-md-9"><input class="form-control projek1" name="alamat2" placeholder="Sila isi alamat" id="alamat2" type="text" maxlength="100" value="{{$alamat2}}"></div>
                            </div>

                            <div id="datekom1" class="form-group row control-label">
                                <label class="col-md-3">Tarikh Mula<span style="color:red;">*</span> </label>
                                <div class="col-md-9"><input id="tarikh_mula" class="form-control projek1" name="tarikh_mula" placeholder="" type="date" value="{{$tarikh_mula}}" onchange="testt()"></div>
                            </div>

                            <div id="datekom2" class="form-group row control-label">
                                <label class="col-md-3">Tarikh Tamat<span style="color:red;">*</span> </label>
                                <div class="col-md-9"><input id="tarikh_akhir" class="form-control projek1" name="tarikh_akhir" placeholder="" type="date" value="{{$tarikh_akhir}}" onchange="testt()"></div>
                            </div>
                            <label id="datecheckerror" style="color: red;display: none;margin-left: 26%;">Pastikan tarikh mula tidak melebihi atau sama dengan tarikh akhir.</label>

                            <!-- <div id="datekom" class="form-group row control-label">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label_date_kompetensi">Tarikh Tamat</span>
                                    </label>
                                    <input id="tarikh_akhir" class="form-control datepicker " name="tarikh_akhir" placeholder="" type="text" value="{{$tarikh_akhir}}" onchange="checkdatecompet()" onclick="hideerror('datekom');">
                                </div>
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            <label id="datekomerror" style="color: red;display: none;">Sila isi tarikh kompetensi</label>
                            <label id="datecheckerror" style="color: red;display: none;">Pastikan tarikh tidak melebihi atau sama tarikh hari ini.</label>
                            </div> -->

                            <!-- <div class="form-group row control-label" style="z-index: 0 !important"> -->
                            <!-- @include('components.textarea', [
                                'label' => 'Alamat',
                                'info' => 'Alamat',
                                'name' => 'alamat',
                                'class' => 'projek',
                                'value' => $alamat,
                                'mode' => 'required',
                            ]) -->
                            <!-- @include('components.date', [
                                'label' => 'Tarikh Mula',
                                'info' => 'Tarikh Mula',
                                'name' => 'tarikh_mula',
                                'mode' => 'required',
                            ])

                            @include('components.date', [
                                'label' => 'Tarikh Tamat',
                                'info' => 'Tarikh Tamat',
                                'name' => 'tarikh_akhir',
                                'mode' => 'required',
                              ]) -->
                            <!-- </div> -->
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered m-b-10" id="tabletidakPakej">
                                    <thead>
                                    <tr>
                                        <th class="fit">Bil.</th>
                                        <th width="60%">Maklumat Pakej</th>
                                        <th class="bold">Tindakan</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div style="display: none;" id="fasa_content">
                        <hr>

                            <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Bilangan Fasa</label>
                                <div class="col-md-7">
                                    <input class="form-control projek" type="text" name="bilangan_fasa" id="bilangan_fasa" value="{{$countFasa}}">
                                </div>
                                <!-- <div class="col-md-2" style="margin-top: 3px">
                                   <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addFasa" type="button"><span>Simpan</span></button>
                               </div> -->
                           </div>

                            <div class="table-responsive">
                                <table class="table table-bordered m-b-10" id="tableFasa">
                                    <thead>
                                    <tr>
                                        <th class="fit">Bil.</th>
                                        <th>Maklumat Fasa</th>
                                        <th class="bold">Tindakan</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row p-b-10">
                <div class="col-md-12">
                    <ul class="pager wizard no-style">
                        <li class="next">
                            <button class="btn btn-success btn-cons pull-right savetab1" type="button" id="savetab1" style="animation: none !important;">
                            <!-- <button class="btn btn-success btn-cons from-left pull-right savetab1" type="submit" id="savetab1" onclick="savetab1()"> -->
                                <span>Seterusnya1</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')

    <script type="text/javascript">

        // $("#tarikh_akhir").datepicker({
        //     dateFormat: "dd-mm-yy"
        //     ,minDate: 0
        // }).change(function() {
        //     console.log('deetct');
        //     var date1 = $('#tarikh_mula').datepicker('getDate');
        //     var date2 = $('#tarikh_akhir').datepicker('getDate');

        //     // date mula
        //     var givenDate = new Date(date1);

        //     var dd1 = givenDate.getDate();

        //     var mm1 = givenDate.getMonth()+1; 
        //     var yyyy1 = givenDate.getFullYear();
        //     if(dd1<10) 
        //     {
        //         dd1='0'+dd1;
        //     } 

        //     if(mm1<10) 
        //     {
        //         mm1='0'+mm1;
        //     } 

        //     dates = yyyy1+ '-'+ mm1 + '-' + dd1;

        //     // date akhir
        //     var givenDate2 = new Date(date2);

        //     var dd2 = givenDate2.getDate();

        //     var mm2 = givenDate2.getMonth()+1; 
        //     var yyyy2 = givenDate2.getFullYear();
        //     if(dd2<10) 
        //     {
        //         dd2='0'+dd2;
        //     } 

        //     if(mm2<10) 
        //     {
        //         mm2='0'+mm2;
        //     } 

        //     dates2 = yyyy2+ '-'+ mm2 + '-' + dd2;

        //     g1 = new Date(dates);
        //     g2 = new Date(dates2);
        //     if(g2.getTime() >= g1.getTime()){
        //         $('#datecheckerror').show();
        //         var sijilkom = document.getElementById("tarikh_mulaer");
        //         sijilkom.classList.add("has-error");
        //     }else{
        //         $('#datecheckerror').hide();
        //         var sijilkom = document.getElementById("tarikh_akhirer");
        //         sijilkom.classList.remove("has-error");
        //     }
        // });

        $("select, input").on('focus', function() {
            // var form = $("#form-add");

            // $('.error').hide();
            // MAKMAL start
            // var kodmakmal = $('#kodmakmal').val();
            // var labname = $('#labname').val();
            // var lab_tel1 = $('#lab_tel1').val();
            // var location = $('#location').val();
            // var Pengawasan = $('#Pengawasan').val();

            // if (Pengawasan) {
            //     var elementp = document.getElementById("pengawasan");
            //     elementp.classList.remove("has-error");
            // }

            // if (kodmakmal && kodmakmal.length == 0) {
            //     document.getElementById("kodmakmal").style.display = 'block';
            //     document.getElementById("kodmakmal-error").style.display = 'block';
            // }

            // if (labname && labname.length == 0) {
            //     document.getElementById("labname").style.display = 'block';
            //     document.getElementById("labname-error").style.display = 'block';
            // }
            // if (lab_tel1 && lab_tel1.length == 0) {
            //     document.getElementById("lab_tel1").style.display = 'block';
            //     document.getElementById("lab_tel1-error").style.display = 'block';
            // }
            // if (location && location.length == 0) {
            //     document.getElementById("location").style.display = 'block';
            //     document.getElementById("location-error").style.display = 'block';
            // }
            // Makmal end

            // var emel = $('#email').val();
            // var n = emel.includes("doe.gov");

            // if (emel.length > 0) {
            //     var element = document.getElementById("div-mel");
            //     $('#emelerror').hide();
            //     $('#melerror').hide();
            //     element.classList.remove("has-error");
            //     if (n == true) {
            //         $('#emelerror').show();
            //         element.classList.add("has-error");
            //         return false;
            //     } else {
            //         $('#emelerror').hide();
            //         element.classList.remove("has-error");
            //     }

            //     if (/^[a-zA-Z0-9._-+]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(emel))
            //     {
            //         return true;
            //     } else {
            //         $('#melerror').show();
            //         element.classList.add("has-error");
            //         return false;
            //     }
                
            // }



            // var username = $('#username').val();
            // var phone = $('#no_tel').val();
            // var faks = $('#faks').val();
            var poskod = $('#surat_poskod').val();

            // var element1 = document.getElementById("nofaks");
            // $('#nofakserror').hide();
            // element1.classList.remove("has-error");
            // if (faks.length > 0) {
            //     if (faks.length < 10) {
            //         $('#nofakserror').show();
            //         element1.classList.add("has-error");
            //         return false;
            //     }
            // }

            var elementposkod = document.getElementById("posk");
            $('#poskerror').hide();
            elementposkod.classList.remove("has-error");
            if (poskod.length > 0) {
                if (poskod.length < 5) {
                    $('#poskerror').show();
                    elementposkod.classList.add("has-error");
                    return false;
                }
            }

            // var element2 = document.getElementById("kp");
            // $('#kperror').hide();
            // element2.classList.remove("has-error");
            // if (username.length > 0) {
            //     if (username.length < 10) {
            //         $('#kperror').show();
            //         element2.classList.add("has-error");
            //         return false;
            //     }
            // }

            // var element3 = document.getElementById("no_tel");
            // $('#telefonerror').hide();
            // element3.classList.remove("has-error");
            // if (phone.length > 0) {
            //     if (phone.length < 10) {
            //         $('#telefonerror').show();
            //         element3.classList.add("has-error");
            //         return false;
            //     }
            // }

            // var element3 = document.getElementById("lab_tel1");
            // $('#lab_telerror').hide();
            // element3.classList.remove("has-error");
            // if (phone.length > 0) {
            //     if (phone.length < 10) {
            //         $('#lab_telerror').show();
            //         element3.classList.add("has-error");
            //         return false;
            //     }
            // }



        });

        function groupaktiviti(id){
            data = $('#groupaktivitidata').val();
            if(data == 0){
                // console.log('id');
                data = [];
            } else {
                // console.log('id1');
                data = [data];
            }
            // console.log(id);
            // console.log(data);
            data.push(id);
            document.getElementById("groupaktivitidata").value = data;
        }

        function testt(){
            console.log('testing');
            tarikh_mula = $('#tarikh_mula').val();
            tarikh_akhir = $('#tarikh_akhir').val();
            if(tarikh_mula >= tarikh_akhir){
                $('#datecheckerror').show();
                var sijilkom = document.getElementById("tarikh_mulaer");
                sijilkom.classList.add("has-error");
            }else{
                $('#datecheckerror').hide();
                var sijilkom = document.getElementById("tarikh_akhirer");
                sijilkom.classList.remove("has-error");
            }
        }

        function testt2(){
            console.log('testing');
            // tarikh_mula = $('#tarikh_mula').val();
            // tarikh_akhir = $('#tarikh_akhir').val();
            // console.log(tarikh_mula);
            // if(tarikh_mula >= tarikh_akhir){
            //     $('#datecheckerror').show();
            //     var sijilkom = document.getElementById("datekom1");
            //     sijilkom.classList.add("has-error");
            // }else{
            //     $('#datecheckerror').hide();
            //     var sijilkom = document.getElementById("datekom1");
            //     sijilkom.classList.remove("has-error");
            // }
            var form = $('#pakej');
            var data = new FormData(form[0]);
            var mula = new Date(data.get("tarikh_mula"));

            var akhir = new Date(data.get("tarikh_akhir"));

            console.log(mula);
            if(akhir && mula){
                if (mula.getTime() >= akhir.getTime()) {
                    var element = document.getElementById("tarikh_mulaer");
                    $('#tarikh_mulaerror').show();
                    element.classList.add("has-error");

                    var element1 = document.getElementById("tarikh_akhirer");
                    element1.classList.add("has-error");
                } else {
                    var element = document.getElementById("tarikh_mulaer");
                    $('#tarikh_mulaerror').hide();
                    element.classList.remove("has-error");

                    var element1 = document.getElementById("tarikh_akhirer");
                    element1.classList.remove("has-error");
                }
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if($('#jenis_2').prop("checked") == true) {
                document.getElementById('pakej_content').style.display = 'block';
            } else document.getElementById('pakej_content').style.display = 'none';

            if($('#jenis_1').prop("checked") == true) {
                document.getElementById('tidakpakej_content').style.display = 'block';
                // $("#modal-add-no-pakej").modal("show");
                $('#modal-add-no-pakej').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else document.getElementById('tidakpakej_content').style.display = 'none';
        });
        function PakejyesnoCheck() {
            if (document.getElementById('jenis_2').checked) {
                document.getElementById('pakej_content').style.display = 'block';
            }
            else document.getElementById('pakej_content').style.display = 'none';

            if (document.getElementById('jenis_1').checked) {
                document.getElementById('tidakpakej_content').style.display = 'block';
            }
            else document.getElementById('tidakpakej_content').style.display = 'none';
        }

        function addPakej() {
            // $("#modal-add-pakej").modal("show");
            $('#modal-add-pakej').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function editfasa(id) {
            $("#modal-div").load("../projek/kemaskinifasa/"+id);
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function removefasa(id) {

            $.ajax({
                url: 'buangFasa/'+id,
                method: 'get',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal(data.title, data.message);
                    tableFasa.api().ajax.reload(null, false);
                }
            });
                // swal({
                //         title: "",
                //         text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
                //         type: "",
                //         showCancelButton: true,
                //         confirmButtonClass: "btn-outline green-meadow",
                //         cancelButtonClass: "btn-danger",
                //         confirmButtonText: "Ya",
                //         cancelButtonText: "Tidak",
                //         closeOnConfirm: true,
                //         closeOnCancel: true,
                //         showLoaderOnConfirm: true
                //     },
                //     function(isConfirm) {
                //         if (isConfirm) {
                            
                //         }
                //     });
            }

        // $(function() {
            $("#pakej").submit(function(e) {
                e.preventDefault();
                var form = $(this);

                if(!form.valid())
                    return;

                var data = new FormData(form[0]);
                var mula = new Date(data.get("tarikh_mula"));
                var akhir = new Date(data.get("tarikh_akhir"));
                if (mula.getTime() > akhir.getTime()) {
                    var element = document.getElementById("tarikh_mulaer");
                    $('#tarikh_mulaerror').show();
                    element.classList.add("has-error");

                    var element1 = document.getElementById("tarikh_akhirer");
                    element1.classList.add("has-error");
                }
                // return false;
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: new FormData(form[0]),
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        state = data.state;
                        states = '';
                        states_ = '';
                        state.forEach(function(item){
                            states = '<option value="'+item.id+'">'+item.name+'</option>';
                            states_ = states_ + states;
                        });
                        // console.log(states_);
                        $('#pakej_negeri').empty().append('<option value="" selected="" disabled="">Pilih Negeri</option>'+states_);
                        $("#modal-add-pakej").modal("hide");
                        swal(data.title, data.message);
                        table.api().ajax.reload(null, false);
                    },
                    error: function(e){
                        console.log(e.responseJSON.errors.pakej_negeri);
                        if (!e.responseJSON.errors.pakej_negeri) {
                            var element = document.getElementById("selectnegeri");
                            $('#selectnegerierror').show();
                            element.classList.add("has-error");
                        }
                    }
                });
                // swal({
                //     title: "",
                //     text: "Adakah anda pasti ?",
                //     type: "",
                //     showCancelButton: true,
                //     confirmButtonClass: "btn-outline green-meadow",
                //     cancelButtonClass: "btn-danger",
                //     confirmButtonText: "Tidak",
                //     cancelButtonText: "Ya",
                //     // closeOnConfirm: true,
                //     // closeOnCancel: false,
                //     showLoaderOnConfirm: true,
                // },
                // function(isConfirm) {
                //     if (isConfirm) {
                //         swal.close()
                //     } else {
                        
                //     }
                // });
            });

            // console.log('{{ fullUrl() }}' + '   haiiiiiiiiiiiiiiiiiiiiiiiiiiii');
            var table = $('#tablePakej');

            var settings = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "searchable": false,
                "ajax": "{{ route('projek.daftar_projek') }}",
                "columns": [
                    { data: "nama_pakej", name: "nama_pakej", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},

                    { data: "kontraktor", name: "kontraktor", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "negeri", name: "negeri", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    // { data: "alamat", name: "alamat", defaultContent: "-", "searchable": false, render: function(data, type, row){
                    //         return $("<div/>").html(data).text();
                    //     }},
                    { data: "tarikh_mula", name: "tarikh_mula", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "tarikh_akhir", name: "tarikh_akhir", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "action", name: "action", orderable: false, searchable: false},
                ],
                "columnDefs": [
                    { className: "nowrap", "targets": [ 5 ] }
                ],
                "sDom": "B<t><'row'<p i>>",
                "buttons": [
                        {
                        text: '<i class="fa fa-print text-info"></i>',
                        extend: 'print',
                        className: 'btn btn-default btn-sm',
                        exportOptions: {
                            columns: ':visible:not(.nowrap)'
                        }
                    },
                    {
                        text: '<i class="fas fa-file-excel text-success"></i>',
                        extend: 'excelHtml5',
                        className: 'btn btn-default btn-sm',
                        exportOptions: {
                            columns: ':visible:not(.nowrap)'
                        }
                    },
                    {
                        text: '<i class="fas fa-file-pdf text-danger"></i>',
                        extend: 'pdfHtml5',
                        className: 'btn btn-default btn-sm',
                        exportOptions: {
                            columns: ':visible:not(.nowrap)'
                        }
                    },
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
            <?php //dd($ProjekDetail->jenis_projek); ?>
        // if($('#jenis_1').prop("checked") == true) {
            $.fn.dataTable.ext.errMode = 'throw';
            var tabletidakPakej = $('#tabletidakPakej');

            var settingstidakPakej = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "searchable": false,
                "ajax": "{{ route('getTidakPakej', $Projek->id) }}",
                "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "nama_fasa", name: "nama_fasa", defaultContent: "-", "searchable": false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
                ],
                "columnDefs": [
                    { className: "nowrap", "targets": [ 2 ] }
                ],
                "sDom": "B<t><'row'<p i>>",
                "buttons": [
                    {
                        text: '<i class="fa fa-print text-info"></i>',
                        extend: 'print',
                        className: 'btn btn-default btn-sm',
                        exportOptions: {
                            columns: ':visible:not(.nowrap)'
                        }
                    },
                    {
                        text: '<i class="fas fa-file-excel text-success"></i>',
                        extend: 'excelHtml5',
                        className: 'btn btn-default btn-sm',
                        exportOptions: {
                            columns: ':visible:not(.nowrap)'
                        }
                    },
                    {
                        text: '<i class="fas fa-file-pdf text-danger"></i>',
                        extend: 'pdfHtml5',
                        className: 'btn btn-default btn-sm',
                        exportOptions: {
                            columns: ':visible:not(.nowrap)'
                        }
                    },
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

            tabletidakPakej.dataTable(settingstidakPakej);

        // }
            // var tableFasa = $('#tableFasa');

   //          var settingsFasa = {
   //              "processing": true,
   //              "serverSide": true,
   //              "deferRender": true,
   //              "searchable": false,
   //              "ajax": "{{ route('getFasa', $Projek->id) }}",
   //              "columns": [
   //              { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
   //                  return meta.row + meta.settings._iDisplayStart + 1;
   //              }},
   //              { data: "nama_fasa", name: "nama_fasa", defaultContent: "-", "searchable": false, render: function(data, type, row){
   //                  return $("<div/>").html(data).text();
   //              }},
   //              { data: "action", name: "action", orderable: false, searchable: false},
   //              ],
   //              "columnDefs": [
   //                  { className: "nowrap", "targets": [ 2 ] }
   //              ],
   //              "sDom": "B<t><'row'<p i>>",
   //              "buttons": [
   //                  {
   //                      text: '<i class="fa fa-print m-r-5"></i> Cetak',
   //                      extend: 'print',
   //                      className: 'btn btn-default btn-sm',
   //                      exportOptions: {
   //                          columns: ':visible:not(.nowrap)'
   //                      }
   //                  },
   //                  {
   //                      text: '<i class="fa fa-download m-r-5"></i> Excel',
   //                      extend: 'excelHtml5',
   //                      className: 'btn btn-default btn-sm',
   //                      exportOptions: {
   //                          columns: ':visible:not(.nowrap)'
   //                      }
   //                  },
   //                  {
   //                      text: '<i class="fa fa-download m-r-5"></i> PDF',
   //                      extend: 'pdfHtml5',
   //                      className: 'btn btn-default btn-sm',
   //                      exportOptions: {
   //                          columns: ':visible:not(.nowrap)'
   //                      }
   //                  },
   //              ],
   //              "destroy": true,
   //              "scrollCollapse": true,
   //              "oLanguage": {
   //                  "sEmptyTable":      "Tiada data",
   //                  "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
   //                  "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
   //                  "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
   //                  "sInfoPostFix":     "",
   //                  "sInfoThousands":   ",",
   //                  "sLengthMenu":      "Papar _MENU_ rekod",
   //                  "sLoadingRecords":  "Diproses...",
   //                  "sProcessing":      "Sedang diproses...",
   //                  "sSearch":          "Carian:",
   //                  "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
   //                  "oPaginate": {
   //                      "sFirst":        "Pertama",
   //                      "sPrevious":     "Sebelum",
   //                      "sNext":         "Seterusnya",
   //                      "sLast":         "Akhir"
   //                  },
   //                  "oAria": {
   //                      "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
   //                      "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
   //                  }
   //              },
   //              "iDisplayLength": 10
   //          };

   //          tableFasa.dataTable(settingsFasa);

            function removepakej(id) {

                $.ajax({
                    url: 'buangpakej/'+id,
                    method: 'get',
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        swal(data.title, data.message);
                        table.api().ajax.reload(null, false);
                    }
                });

                // swal({
                //         title: "",
                //         text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
                //         type: "",
                //         showCancelButton: true,
                //         confirmButtonClass: "btn-outline green-meadow",
                //         cancelButtonClass: "btn-danger",
                //         confirmButtonText: "Ya",
                //         cancelButtonText: "Tidak",
                //         closeOnConfirm: true,
                //         closeOnCancel: true,
                //         showLoaderOnConfirm: true
                //     },
                //     function(isConfirm) {
                //         if (isConfirm) {
                            
                //         }
                //     });
            }

            function pengawasan(id) {
                $("#modal-div").load("pakej_pengawasan/"+id);
            }
        // });

        $(".address .postcode").on('change', function() {
            console.log('here');
            parent = $(this).parents('.address');
            $.ajax({
                url: "{{ url('general/postcode-state') }}/"+$(this).val(),
                type: 'GET',
                datatype: 'json',
                success: function(data){
                    console.log(data.state.id);
                    parent.find('.state').val(data.state.id).trigger('change');
                    setTimeout(function() {
                        parent.find('.district').val(data.id).trigger('change');
                    }, 1000);

                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError);
                }
            });
        });

        $(".address .state").on('change', function() {
            list = $(this).parents('.address').find('.district');
            list.empty();
            list.append("<option disabled selected hidden value=''>Pilih Daerah...</option>");

            $.ajax({
                url: "{{ url('general/state-district') }}/"+$(this).val(),
                type: 'GET',
                datatype: 'json',
                success: function(data){
                    $.each(data, function(key, district) {
                        list.append("<option value='" + district.district_id +"'>" + district.name + "</option>");
                    });
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError);
                }
            });

            list2 = $(this).parents('.address').find('.bandar');
            list2.empty();
            list2.append("<option disabled selected hidden value=''>Pilih Bandar...</option>");

            $.ajax({
                url: "{{ url('general/state-city') }}/"+$(this).val(),
                type: 'GET',
                datatype: 'json',
                success: function(data){
                    $.each(data, function(key, district) {
                        list2.append("<option value='" + district.id +"'>" + district.name + "</option>");
                    });
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError);
                }
            });
        });

        $("#laporaneia").on('change', function() {
            $('#laporaneia').parents('div.form-group').removeClass('has-error');
        });

        $(".address .state").on('change', function() {
            $('.jenisN').parents('div.form-group').removeClass('has-error');
        });

        function checkeoemc(){
            $('form#projek').submit();
            // $.ajax({
            //     url: "{{ route('pakejeoemc') }}",
            //     method: 'post',
            //     data: {id:'{{$ProjekDetail->projek_id}}'},
            //     success: function(data) {
            //         if (data.error == 'error') {
            //             swal(data.title, data.message);
            //         } else {
            //             console.log('ada data');
            //         }
            //     }
            // });
        }

        function edit(id){
            $.ajax({
                url: "editpakej/"+id,
                method: 'get',
                success: function(data) {
                    console.log(data.projekPakej);
                }
            });
        }

        // $(".address1 .postcode1").on('change', function() {
        //     console.log('here');
        //     parent = $(this).parents('.address1');
        //     $.ajax({
        //         url: "{{ url('general/postcode-state') }}/"+$(this).val(),
        //         type: 'GET',
        //         datatype: 'json',
        //         success: function(data){
        //             parent.find('.state1').val(data.state.id).trigger('change');
        //             setTimeout(function() {
        //                 parent.find('.district1').val(data.id).trigger('change');
        //             }, 1000);

        //         },
        //         error: function(xhr, ajaxOptions, thrownError){
        //             console.log(thrownError);
        //         }
        //     });
        // });

        // $(".address1 .state1").on('change', function() {
        //     list = $(this).parents('.address1').find('.district1');
        //     list.empty();
        //     list.append("<option disabled selected hidden>Pilih Daerah...</option>");

        //     $.ajax({
        //         url: "{{ url('general/state-district') }}/"+$(this).val(),
        //         type: 'GET',
        //         datatype: 'json',
        //         success: function(data){
        //             $.each(data, function(key, district) {
        //                 list.append("<optionnvalue='" + district.id +"'>" + district.name + "</option>");
        //             });
        //         },
        //         error: function(xhr, ajaxOptions, thrownError){
        //             console.log(thrownError);
        //         }
        //     });
        // });

        // @if($ProjekDetail->negeri)
        // $("#negeri").val( {{ $ProjekDetail->negeri }} ).trigger('change');
        // @endif

        // @if($ProjekDetail->daerah)
        // // setTimeout(function() {
        //     $("#daerah").val( {{ $ProjekDetail->daerah }} ).trigger('change');
        // // }, 1000);
        // @endif

        @if($ProjekDetail->surat_negeri)
        $("#surat_negeri").val( {{ $ProjekDetail->surat_negeri }} ).trigger('change');
        @endif

        @if($ProjekDetail->surat_daerah)
        // setTimeout(function() {
            $("#surat_daerah").val( {{ $ProjekDetail->surat_daerah }} ).trigger('change');
        // }, 1000);
        @endif

        // @if($ProjekDetail->aktiviti)
        // $("#aktiviti").val( {{ $ProjekDetail->aktiviti }} ).trigger('change');
        // @endif

        @if($ProjekDetail->laporaneia)
        $("#laporaneia").val( {{ $ProjekDetail->laporaneia }} ).trigger('change');
        @endif

        @if($ProjekDetail->surat_bandar)
        $("#surat_bandar").val( {{ $ProjekDetail->surat_bandar }} ).trigger('change');
        @endif

        // $('#aktiviti').on('change', function() {
        //     var val = this.value;
        //   // alert( this.value );
        //     if(val==22){
        //         // document.getElementById('other_aktiviti').style.display = 'block';
        //         $('#other_aktiviti').show();
        //     }else{
        //         $('#other_aktiviti').hide();
        //     }
        // });

        // if ($("#aktiviti option:selected").val() == 22) {
        //     $('#other_aktiviti').show();
        // }else{
        //     $('#other_aktiviti').hide();
        // }

        // $("#laporaneia_{{ $ProjekDetail->laporaneia }}").prop('checked', true).trigger('change');

        // $("#jenis_{{ $ProjekDetail->jenis_projek }}").prop('checked', true).trigger('change');

    </script>
@endpush
