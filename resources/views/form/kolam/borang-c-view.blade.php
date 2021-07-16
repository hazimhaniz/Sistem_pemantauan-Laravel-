<div class="modal fade" id="baseAjaxModalContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if((auth()->user()->hasRole('pp')) && ($monthlyC->monthlyC->status_id == 13))
                <h5 class="modal-title" id="addModalTitle"> Sahkan <b> BORANG C</b></h5>
                @else
                <h5 class="modal-title" id="addModalTitle"> Lihat <b> BORANG C</b></h5>
                @endif
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
                            <input disabled name="sample" value="1" id="sample1" type="radio" class="hidden" required="" aria-required="true" checked>
                            <label for="sample1">YA</label><br>
                            <input disabled name="sample" value="0" id="sample0" type="radio" class="hidden" required="" aria-required="true">
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
                                            <input disabled id="tarikh_pengsampelan" class="form-control" name="tarikh_pengsampelan" value="{{ date('d/m/Y', strtotime($monthlyC->tarikh_pengsampelan)) ?? '' }}" placeholder="dd/mm/yyyy"  type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Masa Persampelan</b></span>
                                        </label>
                                        <input disabled class="form-control" type="time" id="masa_pengsampelan" value="{{ $monthlyC->masa_pengsampelan ?? '' }}" name="masa_pengsampelan">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Cuaca</b></span>
                                        </label>
                                        <select disabled id="cuaca" name="cuaca" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Silih pilih satu jenis aktiviti.">
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
                                                <img src = " {{ asset('/storage/uploads/' . $gamabar) }} " class="img-size"/>
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
                                                <img src = " {{ asset('/storage/uploads/' . $laporankimia) }} " class="img-size"/>
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
                                <!-- <divdiv class="form-group form-group-default">
                                        <label><span><b class="text-dark">GAMBAR PERSAMPELAN</b></span></label>
                                        <div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input id="gambar_pengsampelans" name="gambar_pengsampelans[]" type="file" multiple=""></div>
                                    </divdiv>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label><span><b class="text-dark">LAPORAN KIMIA</b></span></label>
                                        <div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input id="laporan_kimias" name="laporan_kimias[]" type="file" multiple=""></div>
                                    </div>
                                </div class="col-md-6">
                                    <> -->
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span><b class="text-dark">CATATAN</b></span>
                                            </label>
                                            <textarea disabled class="form-control" rows="5" name="catatan" id="catatan" >{{ $monthlyC->catatan ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                <div class="col-md-12">
                    <table class="table" id="table" role="grid" aria-describedby="table_info" style="padding:10px; width:100%;max-height:300px;">
                            <thead>
                                <tr>
                                <th class="align-top text-center" bgcolor="#" style="color:#;">BIL</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#;">Parameter</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#;">Unit</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#;">Standard</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#;">Baseline EIA</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#;">Baseline EMP</th>
                                    <th class="align-top text-center" bgcolor="#" style="color:#; ">Bacaan Cerap</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($monthlyC))
                                <?php $i = 1; ?>
                                @foreach($pengawasan->parameters as $parameter)
                                <?php
                                    if (empty($parameter->baselineeia) && empty($parameter->baselineemp) ){
                                        continue;
                                    }
                                ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $parameter->masterParameter->jenis_parameter }}</td>
                                    <td>{{ $parameter->masterParameter->unit }}</td>
                                     <td>{{ $parameter->masterParameter->standard ? $parameter->masterParameter->standard->parameter : '-' }}</td>
                                    <td>{{ $parameter->baselineeia }}</td>
                                    <td>{{ $parameter->baselineemp }}</td>
                                    <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps[]" id="{{ $parameter->id }}" autocomplete="off" /></td>
                                </tr>
                                @endforeach
                                @else
                                <?php $i = 1; ?>
                                @foreach($pengawasan->parameters as $keyParam => $parameter)
                                <?php
                                    if (empty($parameter->baselineeia) && empty($parameter->baselineemp) ){
                                        continue;
                                    }
                                ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $parameter->masterParameter->jenis_parameter }}</td>
                                    <td>{{ $parameter->masterParameter->unit }}</td>
                                     <td>{{ $parameter->masterParameter->standard ? $parameter->masterParameter->standard->parameter : '-' }}</td>
                                    <td>{{ $parameter->baselineeia }}</td>
                                    <td>{{ $parameter->baselineemp }}</td>
                                    <!-- <td class="align-middle text-center"><input class="form-control" name="bacaan_ceraps[]" id="{ { $parameter->id }}" autocomplete="off" /></td> -->
                                    @foreach($monthlyC->monthlyC->bacaanCerap as $keyCerap => $value)
                                        @if($keyParam == $keyCerap)
                                        <td class="align-middle text-center"><input readonly class="form-control" name="bacaan_ceraps[]" id="{{ $value->id }}" value="{{ $value->bacaan_cerap }}" autocomplete="off" /></td>
                                        @endif
                                    @endforeach
                                </tr>
                                @endforeach
                                @endif
                                <input type="hidden" name="projek_id" id="projek_id" value="{{$monthlyC->monthlyC->projek_id ?? ''}}" />
                                <input type="hidden" name="stesen_id" id="stesen_id" value="{{$monthlyC->stesen_id ?? ''}}" />
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <ul class="pager wizard no-style">
                    <li class="submit">
                    @if((auth()->user()->hasRole('pp')) && ($monthlyC->monthlyC->status_id == 13))
                    <button data-action="{{ route('project.semak.borang-c', $monthlyC->monthlyC->id) }}" class="btn btn-success" type="button" onclick="semakBorangC(this)" data-original-title="Sahkan">
                        <span style="color:white;">SAHKAN</span>
                    </button>
                    @elseif((auth()->user()->hasRole('eo')) && ($monthlyC->monthlyC->status_id == 11))
                    <button data-action="{{ route('project.semak.borang-c', $monthlyC->monthlyC->id) }}" class="btn btn-success" type="button" onclick="semakBorangC(this)" data-original-title="Sahkan">
                        <span style="color:white;">SEMAK</span>
                    </button>
                    @endif
                    </li>
                </ul>
            </div>
            <br>
        </div>
    </div>
</div>

@include('form.kolam.js.borang-c-create')