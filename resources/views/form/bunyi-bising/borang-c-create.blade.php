<div class="modal fade" id="baseAjaxModalContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"> <b>BORANG C</b></h5>
                <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- {{ dump($pengawasan) }} -->
            <input type="hidden" name="stesen_id" value="{{$pengawasan->id}}" id="stesen_id">
            <div class="modal-body m-t-20">
                <div class="row">
                    <div class="col-md-12">
                        <label style="font-size:12px">ADAKAH PERSAMPELAN DIBUAT <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="" data-original-title=""></i></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="radio radio-primary">
                            <input name="sample" value="1" id="sample1" type="radio" class="hidden" required="" aria-required="true" checked>
                            <label for="sample1">YA</label><br>
                            <input name="sample" value="0" id="sample0" type="radio" class="hidden" required="" aria-required="true">
                            <label for="sample0">TIDAK</label>
                            <!-- {{-- {{ dump($pengawasan) }} --}} -->
                            {{-- <input type="text" value="{{ $stesen->tahun }}" /> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group-attached m-b-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span><b class="text-dark">Tarikh sampel dibuat</b></span>
                                            </label>
                                            <input id="tarikh_pengsampelan" class="form-control" name="tarikh_pengsampelan" value="{{ $monthlyC ?  date('d/m/Y', strtotime($monthlyC->tarikh_pengsampelan)) : '' }}" placeholder="dd/mm/yyyy" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Masa Persampelan</b></span>
                                        </label>
                                        <input class="form-control" type="time" id="masa_pengsampelan" value="{{ $monthlyC->masa_pengsampelan ?? '' }}" name="masa_pengsampelan">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Cuaca</b></span>
                                        </label>
                                        <select id="cuaca" name="cuaca" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Silih pilih satu jenis aktiviti.">
                                            <option selected disabled></option>
                                            @if(!empty($monthlyC->cuaca))
                                            <option value="Hujan" {{ ($monthlyC->cuaca == 'Hujan') ? 'selected' : '' }}>Hujan</option>
                                            <option value="Panas" {{ ($monthlyC->cuaca == 'Panas') ? 'selected' : '' }}>Panas</option>
                                            @else
                                            <option value="Hujan">Hujan</option>
                                            <option value="Panas">Panas</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if(!empty($monthlyC->gambar_pengsampelan))
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label><span><b class="text-dark">GAMBAR PERSAMPELAN</b></span></label>
                                        <?php
                                        $decodegamabar = json_decode($monthlyC->gambar_pengsampelan);
                                        ?>
                                        @foreach($decodegamabar as $gamabar)
                                        @if((pathinfo(asset('/storage/uploads/' . $gamabar))["extension"])!= "pdf")
                                        <a target="_blank" href="{{ asset('/storage/uploads/' . $gamabar) }}">
                                            <img src=" {{ asset('/storage/uploads/' . $gamabar) }} " class="img-size" />
                                        </a>
                                        @else
                                        <a target="_blank" href="{{ asset('/storage/uploads/' . $gamabar) }}">
                                            <i class="fa fa-file-pdf-o img-size" style="font-size:48px;color:red"><span style="font-size:16px;font-family:'Montserrat'" class="text-dark">&nbsp;Lihat PDF</span></i>
                                        </a>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if(!empty($monthlyC->laporan_kimia))
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label><span><b class="text-dark">LAPORAN KIMIA</b></span></label>
                                        <?php
                                        $decodelaporankimia = json_decode($monthlyC->laporan_kimia);
                                        ?>
                                        @foreach($decodelaporankimia as $laporankimia)
                                        @if((pathinfo(asset('/storage/uploads/' . $monthlyC->laporan_kimia))["extension"])!= "pdf")
                                        <a target="_blank" href="{{ asset('/storage/uploads/' . $laporankimia) }}">
                                            <img src=" {{ asset('/storage/uploads/' . $laporankimia) }} " class="img-size" />
                                        </a>
                                        @else
                                        <a target="_blank" href="{{ asset('/storage/uploads/' . $laporankimia) }}">
                                            <i class="fa fa-file-pdf-o img-size" style="font-size:48px;color:red"><span style="font-size:16px;font-family:'Montserrat'" class="text-dark">&nbsp;Lihat PDF</span></i>
                                        </a>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <input type="hidden" id="gambar_count_bunyi" name="gambar_count_bunyi" value="1">
                                    <div class="form-group form-group-default">
                                        <label><span><b class="text-dark">GAMBAR PERSAMPELAN</b></span></label>
                                        <div class="" id="addGambar">
                                            <i class="fa fa-folder-open"></i>
                                            <input id="gambar_pengsampelans" class="gambar_pengsampelans" name="gambar_pengsampelans[]" type="file" multiple="">
                                            <button type="button" class="btn btn-info btn-xs" onclick="addGambarbunyi()" style="font-size: 12.5px;">+</button>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" id="laporan_count_bunyi" name="laporan_count_bunyi" value="1">

                                    <div class="form-group form-group-default" id="addLaporanbunyi">
                                        <label><span><b class="text-dark">LAPORAN KIMIA</b></span></label>
                                        <div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input class="laporan_kimias" name="laporan_kimias[]" type="file">
                                            <button type="button" class="btn btn-info btn-xs" onclick="addLaporanbunyi()" style="font-size: 12.5px;">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span><b class="text-dark">NAMA FAIL</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" name="nama_fail" id="nama_fail" type="text" value="{{ $monthlyC->nama_fail ?? '' }}" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span><b class="text-dark">CATATAN</b></span>
                                            </label>
                                            <textarea class="form-control" rows="5" name="catatan" id="catatan">{{ $monthlyC->catatan ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="dashTitle p-l-10 p-t-10">Maklumat Parameter Baseline EIA</div>
                    <div class="col-md-12" style="overflow:auto; max-height:300px;">
                        <table class="" id="table" role="grid" aria-describedby="table_info" style="padding:10px; width:100%">
                            <thead>
                                <tr>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:5%;">BIL</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Parameter</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Unit</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Standard</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Baseline EIA</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Bacaan Cerap</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($monthlyC))
                                <?php $i = 1; ?>
                                @foreach($pengawasan->parameters as $parameter)
                                <?php
                                if (empty($parameter->baselineeia)) {
                                    continue;
                                }
                                ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $parameter->masterParameter->jenis_parameter }}</td>
                                    <td>{{ $parameter->masterParameter->unit }}</td>
                                    <td>{{ $parameter->masterParameter->standard ? $parameter->masterParameter->standard->parameter : '-' }}</td>
                                    <td>{{ $parameter->baselineeia }}</td>
                                    <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps[]" id="{{ $parameter->parameter }}" onkeypress="return verifyKey(event)" autocomplete="off" /></td>
                                </tr>
                                @endforeach
                                @else
                                <?php $i = 1; ?>
                                @foreach($pengawasan->parameters as $keyParam => $parameter)
                                <?php
                                if (empty($parameter->baselineeia)) {
                                    continue;
                                }
                                if ($monthlyC->monthlyC->bacaanCerap) {
                                    $count = count($monthlyC->monthlyC->bacaanCerap);
                                }
                                ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $parameter->masterParameter->jenis_parameter }}</td>
                                    <td>{{ $parameter->masterParameter->unit }}</td>
                                    <td>{{ $parameter->masterParameter->standard ? $parameter->masterParameter->standard->parameter : '-' }}</td>
                                    <td>{{ $parameter->baselineeia ?? '-' }}</td>
                                    <!-- <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps[]" id="{ { $parameter->id }}" autocomplete="off" /></td> -->
                                    @if ($count > 0)
                                    @foreach($monthlyC->monthlyC->bacaanCerap as $keyCerap => $value)
                                    @if($monthlyC->monthlyC->bacaanCerap)
                                    @if($keyParam == $keyCerap)
                                    <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps[]" onkeypress="return verifyKey(event)" id="{{ $value->id }}" value="{{ $value->bacaan_cerap }}" autocomplete="off" /></td>
                                    @endif
                                    @else
                                    <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps[]" onkeypress="return verifyKey(event)" id="{{ $value->id }}" autocomplete="off" /></td>
                                    @break
                                    @endif
                                    @endforeach
                                    @else
                                    <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps[]" onkeypress="return verifyKey(event)" id="{{ $parameter->id }}" autocomplete="off" /></td>
                                    @endif
                                </tr>
                                @endforeach
                                @endif
                                <input type="hidden" name="projek_id" id="projek_id" value="{{$monthlyC->monthlyC->projek_id ?? ''}}" />
                                <input type="hidden" name="stesen_id" id="stesen_id" value="{{$monthlyC->stesen_id ?? ''}}" />
                            </tbody>
                        </table>
                    </div>

                    <div class="dashTitle eim_table  p-l-10 p-t-10">Maklumat Parameter Baseline EMP</div>
                    <div class="col-md-12">

                        <table class="table eim_table" id="parameterStesenBunyiBisingTable2" role="grid" aria-describedby="table_info" border="1px" style="padding:10px;max-height:300px;">
                            <thead>
                                <tr role="row">
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:5%;">BIL</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Parameter</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Unit</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Standard</th>
                                    <th bgcolor="#" class="align-top text-center" style=" vertical-align:top; color:#">Baseline
                                    </th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Bacaan Cerap</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($monthlyC))
                                <?php $i = 1; ?>
                                @foreach($pengawasan->parameters as $parameter)
                                <?php
                                if (empty($parameter->baselineemp)) {
                                    continue;
                                }
                                ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $parameter->masterParameter->jenis_parameter }}</td>
                                    <td>{{ $parameter->masterParameter->unit }}</td>
                                    <td>{{ $parameter->masterParameter->standard ? $parameter->masterParameter->standard->parameter : '-' }}</td>
                                    <td>{{ $parameter->baselineemp }}</td>
                                    <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps2[]" id="{{ $parameter->id }}" autocomplete="off" /></td>
                                </tr>
                                @endforeach
                                @else
                                <?php $i = 1; ?>
                                @foreach($pengawasan->parameters as $keyParam => $parameter)
                                <?php
                                if (empty($parameter->baselineemp)) {
                                    continue;
                                }
                                ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $parameter->masterParameter->jenis_parameter }}</td>
                                    <td>{{ $parameter->masterParameter->unit }}</td>
                                    <td>{{ $parameter->masterParameter->standard ? $parameter->masterParameter->standard->parameter : '-' }}</td>
                                    <td>{{ $parameter->baselineeia }}</td>
                                    <td>{{ $parameter->baselineemp ? $parameter->baselineemp : '-'}}</td>
                                    <!-- <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps[]" id="{ { $parameter->id }}" autocomplete="off" /></td> -->
                                    @foreach($monthlyC->monthlyC->bacaanCerapB as $keyCerap => $value)
                                    @if($monthlyC->monthlyC->bacaanCerapB)
                                    @if($keyParam == $keyCerap)
                                    <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps[]" id="{{ $value->id }}" value="{{ $value->bacaan_cerap_b }}" autocomplete="off" /></td>
                                    @endif
                                    @else
                                    <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps[]" id="{{ $value->id }}" autocomplete="off" /></td>
                                    @break
                                    @endif
                                    @endforeach
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                    @if(!empty($pengawasanBunyiBising->docType))
                    <div class="col-md-12" style="overflow:auto; max-height:300px; margin-top: 20px;">
                        <br />
                        <div class="form-group form-group-default">
                            <label><span><b class="text-dark">GAMBAR STESEN BUNYI BISING</b></span></label>
                            @foreach($pengawasanBunyiBising->docType as $image)
                            <a target="_blank" href="{{ Storage::url($image->path) }}">
                                <img src=" {{ Storage::url($image->path) }} " class="img-size" />
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12 p-t-20">
                <ul class="pager wizard no-style pull-right">
                    <li class="submit">
                        <button type="button" data-action="{{ route('project.tambah.borang-c') }}" onclick="btnTambahBorangC(this)" class="btn btn-success">Hantar</button>
                    </li>
                </ul>
            </div>
            <br>
        </div>
    </div>
</div>

@include('form.bunyi-bising.js.borang-c-create')