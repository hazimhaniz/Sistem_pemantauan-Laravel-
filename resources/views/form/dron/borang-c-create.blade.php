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
                                                <span><b class="text-dark">Tarikh pemantauan dibuat</b></span>
                                            </label>
                                            <input id="tarikh_pengsampelan" class="form-control" name="tarikh_pengsampelan" value="{{ $monthlyC ?  date('d/m/Y', strtotime($monthlyC->tarikh_pengsampelan)) : '' }}" placeholder="dd/mm/yyyy" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Masa Pemantauan</b></span>
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
                                    <input type="hidden" id="gambar_count_dron" name="gambar_count_dron" value="1">
                                    <div class="form-group form-group-default">
                                        <label><span><b class="text-dark">GAMBAR PERSAMPELAN</b></span></label>
                                        <div class="" id="addGambar">
                                            <i class="fa fa-folder-open"></i>
                                            <input id="gambar_pengsampelans" class="gambar_pengsampelans" name="gambar_pengsampelans[]" type="file" multiple="">
                                            <button type="button" class="btn btn-info btn-xs" onclick="addGambardron()" style="font-size: 12.5px;margin-left:4px;">+</button>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" id="laporan_count_dron" name="laporan_count_dron" value="1">

                                    <div class="form-group form-group-default" id="addLaporandron">
                                        <label><span><b class="text-dark">LAPORAN KIMIA</b></span></label>
                                        <div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input class="laporan_kimias" name="laporan_kimias[]" type="file">
                                            <button type="button" class="btn btn-info btn-xs" onclick="addLaporandron()" style="font-size: 12.5px;margin-left:4px;">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
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
                <br>

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

@include('form.dron.js.borang-c-create')