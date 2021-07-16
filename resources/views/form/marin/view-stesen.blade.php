<div class="modal fade" id="baseAjaxModalContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if(empty($pengawasanMarin->stesen))
                <h5 class="modal-title" id="addModalTitle"> Lihat <b>STESEN MARIN</b></h5>
                @else
                <h5 class="modal-title" id="addModalTitle"> Lihat <b>STESEN MARIN</b></h5>
                @endif
                <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <div id="alert"></div>
                <input type="hidden" id="yearAddStesen" name="year" value="{{ request()->year }}" />
                <input type="hidden" id="monthAddStesen" name="month" value="{{ request()->month }}" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a hidden id="geobutton" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a>
                                    </div>
                                </div>
                                <div class="form-group-attached m-b-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Latitude</b></span><span style="color:red;">*</span>
                                                </label>
                                                <input class="form-control form-control-lg" value="{{ $pengawasanMarin->latitud }}" type="text" id="latitude" name="latitude" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Longitude</b></span><span style="color:red;">*</span>
                                                </label>
                                                <input class="form-control form-control-lg" value="{{ $pengawasanMarin->longitud }}" type="text" id="longitude" name="longitude" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Kelas</b></span><span style="color:red;">*</span>
                                                </label>
                                                <select disabled id="class" name="class" class="select-normal full-width" style="border: none" onchange="displayR()">
                                                    <option selected disabled>Sila Pilih Kelas</option>
                                                    <option value="1" {{ $pengawasanMarin->class == '1' ? 'selected':'' }}>CLASS 1</option>
                                                    <option value="2" {{ $pengawasanMarin->class == '2' ? 'selected':'' }}>CLASS 2</option>
                                                    <option value="3" {{ $pengawasanMarin->class == '3' ? 'selected':'' }}>CLASS 3</option>
                                                    <option value="E1" {{ $pengawasanMarin->class == 'E1' ? 'selected':'' }}>CLASS E1</option>
                                                    <option value="E2" {{ $pengawasanMarin->class == 'E2' ? 'selected':'' }}>CLASS E2</option>
                                                    <option value="E3" {{ $pengawasanMarin->class == 'E3' ? 'selected':'' }}>CLASS E3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label><b><span style="color:red;">Sila Pilih Jika Projek Berdekatan Dengan Kawasan Rekreasi (Kelas R)
                                                    </span></b></label>
                                            <div class="form-group form-check-inline">
                                                <?php
                                                    if ($pengawasanMarin->is_near) {
                                                        $yah = 'checked';
                                                        $tidak = '';
                                                        $display = 'block';
                                                    } else {
                                                        $display = 'none';
                                                        $yah = '';
                                                        $tidak ='checked';
                                                    }
                                                    if($pengawasanMarin->sentuhan == 'Sentuhan Prima') {
                                                        $prima = 'checked';
                                                        $sekunder = '';
                                                    } else {
                                                        $prima = '';
                                                        $sekunder = 'checked';
                                                    }
                                                ?>
                                                <div class="radio radio-primary">
                                                    <input name="projek_berdekatan" value="1" id="yes_berdekatanno" type="radio" class="hidden is_prima" disabled {{$yah}}>
                                                    <label for="yes_berdekatanno">YA</label>
                                                    <input name="projek_berdekatan" value="2" id="no_berdekatan" type="radio" class="hidden is_sekunder" disabled {{$tidak}}>
                                                    <label for="no_berdekatan">tidak</label>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group form-check-inline" style="display: {{$display}}">
                                                <label><b><span style="color:red;">SILA PILIH SENTUHAN YANG BERKAITAN
                                                        </span></b></label>

                                                <div class="radio radio-primary">
                                                    <input name="sentuhan" value="Sentuhan Prima" id="is_prima" type="radio" class="hidden is_prima" disabled  {{$prima}}>
                                                    <label for="is_prima">PRIMA</label>
                                                    <input name="sentuhan" value="Sentuhan Sekunder" id="is_sekunder" type="radio" class="hidden is_sekunder" disabled {{$sekunder}}>
                                                    <label for="is_sekunder">SEKUNDER</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

    
                                <!-- <div class="form-group-attached m-b-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Latitude</b></span><span style="color:red;">*</span>
                                                </label>
                                                <input class="form-control form-control-lg" value="{{ $pengawasanMarin->latitud }}" type="text" id="latitude" name="latitude" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Longitude</b></span><span style="color:red;">*</span>
                                                </label>
                                                <input class="form-control form-control-lg" value="{{ $pengawasanMarin->longitud }}" type="text" id="longitude" name="longitude" readonly>
                                            </div>
                                        </div>
                                    </div>
                                     -->
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Kelas</b></span><span style="color:red;">*</span>
                                                </label>
                                                <select disabled id="class" name="class" class="select-normal full-width" style="border: none" onchange="displayR()">
                                                    <option selected disabled>Sila Pilih Kelas</option>
                                                    <option value="1" {{ $pengawasanMarin->class == '1' ? 'selected':'' }}>CLASS 1</option>
                                                    <option value="2" {{ $pengawasanMarin->class == '2' ? 'selected':'' }}>CLASS 2</option>
                                                    <option value="3" {{ $pengawasanMarin->class == '3' ? 'selected':'' }}>CLASS 3</option>
                                                    <option value="E" {{ $pengawasanMarin->class == 'E' ? 'selected':'' }}>CLASS E</option>
                                                    <option value="R" {{ $pengawasanMarin->class == 'R' ? 'selected':'' }}>CLASS R</option>
                                                    <option value="V" {{ $pengawasanMarin->class == 'V' ? 'selected':'' }}>CLASS V</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-12" id="kelas_R" hidden>
                                        <div class="form-group row">
                                            <label><b>Sila Pilih Jika Projek Berdekatan Dengan Kawasan Rekreasi (Kelas R)</b></label>
                                            <div class="radio radio-primary">
                                                <input disabled name="prima_sekunder" value="1" id="is_prima" type="radio" class="hidden is_prima" checked>
                                                <label for="is_prima">Sentuhan Prima</label>
                                                <input disabled name="prima_sekunder" value="2" id="is_sekunder" type="radio" class="hidden is_sekunder">
                                                <label for="is_sekunder">Sentuhan Sekunder</label>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="form-group required form-group-default">
                                                <label class="" for="">
                                                    <i class="fal fa-file fa-lg"></i>
                                                    &nbsp; NAMA STESEN MARIN
                                                    <span class="text-danger" style="font-size:14px">*</span>
                                                </label>
                                                <input readonly id="stesen" value="{{ $pengawasanMarin->stesen }}" name="stesen" class="form-control form-control-lg" type="text" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-3 m-t-15 control-label">Bacaan Garis Dasar</label>
                                                <div class="checkbox check-primary">
                                                    <input disabled type="checkbox" class="form-check-input" id="marin_is_eia" onclick="displayDateEIA()" checked />
                                                    <label class="form-check-label" for="marin_is_eia">
                                                        <font color="red">*</font> Peringkat EIA
                                                    </label>
                                                    @if($pengawasanMarin->is_emp)
                                                    <input disabled type="checkbox" class="form-check-input" id="marin_is_emp" onclick="displayDateEMP()" checked />
                                                    <label class="form-check-label" for="marin_is_emp">Peringkat EMP</label>
                                                    @else
                                                    <input disabled type="checkbox" class="form-check-input" id="marin_is_emp" onclick="displayDateEMP()" />
                                                    <label class="form-check-label" for="marin_is_emp">Peringkat EMP</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12" id="show_date_eia">
                                                <div class="form-group form-group-default input-group" style="display: block;">
                                                    <div class="form-input-group">
                                                        <label>Tarikh Pengawasan (EIA)</label>
                                                        <input disabled class="form-control datepicker auditData" data-date-end-date="0d" id="marin_date_eia" name="marin_date_eia" placeholder="dd/mm/yyyy" value="{{ Carbon\Carbon::parse($pengawasanMarin->date_eia)->format('d/m/Y') }}" type="text" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @if($pengawasanMarin->is_emp)
                                            <div class="col-md-12" id="show_date_emp">
                                                @else
                                                <div class="col-md-12" id="show_date_emp" hidden>
                                                    @endif
                                                    <div class="form-group form-group-default input-group" style="display: block;">
                                                        <div class="form-input-group">
                                                            <label>Tarikh Pengawasan (EMP)</label>
                                                            <input disabled class="form-control datepicker auditData" data-date-end-date="0d" id="marin_date_emp" name="marin_date_emp" placeholder="dd/mm/yyyy" value="{{ Carbon\Carbon::parse($pengawasanMarin->date_emp)->format('d/m/Y') }}" type="text" autocomplete="off" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        <br>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12" style="overflow:auto; max-height:300px;" style="display: {{$display}}">
                                    <div class="dashTitle">Maklumat Parameter</div>
                                    <label>Standard merujuk kepada Standard Kualiti Air Marin</label>
                                    <table class="" id="parameterStesenMarinTable" role="grid" aria-describedby="table_info" border="1px" style="padding:10px;">
                                        <thead>
                                            <tr role="row">
                                                <th bgcolor="#" class="th-stesen align-top text-center" style="width:2%; vertical-align:top; color:#">BIL.</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">PARAMETER</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">UNIT</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">STANDARD<br></th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">DATA BASELINE (EIA)</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">DATA BASELINE(EMP)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(empty($pengawasanMarin->stesen))
                                            <td colspan="6"><b>Sila Pilih Kelas <font color="red">*</font></b></td>
                                            @else
                                            <?php $i=1; ?>
                                            @foreach($pengawasanMarin->parameters as $key => $parameter)
                                            <?php
                                            if (empty($parameter->baselineeia)) {
                                                continue;
                                            }
                                            ?>
                                            <tr>
                                                <td class="align-middle text-center">{{ $i++ }}</td>
                                                <td class="align-middle text-center">{{ $parameter->masterParameter->jenis_parameter }}
                                                    @if ($parameter->mode === 'mandatory')
                                                    <small>
                                                        <span style="color:red;">*</span>
                                                    </small>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">{{ $parameter->masterParameter->unit }}</td>
                                                <td class="align-middle text-center">@if($parameter->masterStandard){{ ($parameter->masterStandard->parameter) }}@endif</td>
                                                <td class="align-middle text-center"><input disabled class="form-control" name="parameters[]" id="{{ $parameter->id }}" autocomplete="off" value="{{ $parameter->baselineeia }}" /></td>
                                               <td class="align-middle text-center"><input disabled class="form-control" name="base_emp[]" id="base{{ $parameter->id }}" autocomplete="off" value="{{ $parameter->baselineemp }}" /></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12" style="overflow:auto; max-height:300px;">
                                    <div class="dashTitle">Maklumat Parameter Kelas R </div>
                                    <label>Standard merujuk kepada Standard Kualiti Air Marin</label>
                                    <table class="" id="parameterStesenMarinTable" role="grid" aria-describedby="table_info" border="1px" style="padding:10px;">
                                        <thead>
                                            <tr role="row">
                                                <th bgcolor="#" class="th-stesen align-top text-center" style="width:2%; vertical-align:top; color:#">BIL.</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">PARAMETER</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">UNIT</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">STANDARD<br></th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">DATA BASELINE (EIA)</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">DATA BASELINE(EMP)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(empty($pengawasanMarin->stesen))
                                            <td colspan="6"><b>Sila Pilih Kelas <font color="red">*</font></b></td>
                                            @else
                                            {{ $i=1 }}
                                            @foreach($pengawasanMarin->parametersNear as $key => $parameter)
                                             <?php
                                            if (empty($parameter->baselineeia)) {
                                                continue;
                                            }
                                            ?>
                                            <tr>
                                                <td class="align-middle text-center">{{ $i++ }}</td>
                                                <td class="align-middle text-center">{{ $parameter->masterParameter->jenis_parameter }}
                                                    @if ($parameter->mode === 'mandatory')
                                                    <small>
                                                        <span style="color:red;">*</span>
                                                    </small>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">{{ $parameter->masterParameter->unit }}</td>
                                                <td class="align-middle text-center">@if($parameter->masterStandard){{ ($parameter->masterStandard->parameter) }}@endif</td>
                                                <td class="align-middle text-center"><input disabled class="form-control" name="parameters[]" id="{{ $parameter->id }}" autocomplete="off" value="{{ $parameter->baselineeia }}" /></td>
                                                <td class="align-middle text-center"><input disabled class="form-control" name="base_emp[]" id="base{{ $parameter->id }}" autocomplete="off" value="{{ $parameter->baselineemp }}" /></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                @if(!empty($pengawasanMarin->docType))
                                <div class="col-md-12" style="overflow:auto; max-height:300px;">
                                    <br />
                                    <div class="form-group form-group-default">
                                        <label><span><b class="text-dark">GAMBAR STESEN MARIN</b></span></label>
                                        @foreach($pengawasanMarin->docType as $image)
                                        <a target="_blank" href="{{ Storage::url($image->path) }}">
                                            <img src=" {{ Storage::url($image->path) }} " class="img-size" />
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <!-- <div class="col-md-12">
                                <br />
                                <div class="form-group form-group-default">
                                    <label><span><b class="text-dark">GAMBAR STESEN</b></span></label>
                                    <div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input id="gambar_stesen" name="gambar_stesen[]" type="file"></div>
                                </div>
                            </div> -->
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashTitle"><span style="color:red;">*</span><b>Rujukan Standard Kualiti Air Marin</b></div>
                            <table class="" id="table" role="grid" aria-describedby="table_info" border="1px" style="padding:10px;">
                                <thead>
                                    <tr role="row">
                                        <th bgcolor="#" class="align-top text-center" style="width:2%; vertical-align:top; color:#">KELAS</th>
                                        <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">KEGUNAAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($kelasrujukan as $rujuk)
                                            <tr>
                                                <td class="align-middle text-center"> {{ $rujuk->class }}</td>
                                                <td class="ow pull-left">
                                                    {{ $rujuk->kegunaan }}
                                               </td>
                                           </tr>
                                           @empty
                                           <tr>
                                            <td class="align-middle text-center" colspan="2">Tiada Maklumat</td>
                                        </tr>
                                        @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 @if($pengawasanMarin->status == 4)
                        @hasanyrole('penyiasat')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="submitStesen({{$pengawasanMarin->id}})">Sahkan</button>
                        </div>
                        @endhasanyrole
                        @endif
                @hasanyrole('pp')
                <div class="modal-footer">
                    @if($pengawasanMarin->status == 603 || $pengawasanMarin->status == 606)
                    <button type="button" data-action="{{ route('project.hantar.stesen', $pengawasanMarin) }}" onclick="hantarStesen(this)" class="btn btn-success" data-original-title="Sahkan"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">&nbsp;Hantar</span></button>
                    @elseif($pengawasanMarin->status == 13)
                    <button type="button" data-action="{{ route('project.sahkan.stesen', $pengawasanMarin) }}" onclick="hantarStesen(this)" class="btn btn-success" data-original-title="Sahkan"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">&nbsp;Sahkan</span></button>
                    @endif
                </div>
                @endhasanyrole
            </div>
        </div>
    </div>

    @include('form.marin.js.tambah-stesen')
     <script>
    function submitStesen(id) {
        Swal.showLoading();
        $.ajax({
            type: "POST",
            url: "{{ url('pengesahan_stesen') }}" + '/savestesen/' + id,
            success: function(data) {
                if (data.success) {
                    Swal.fire(
                        'Berjaya!',
                        'Berjaya Disimpan!',
                        'success'
                    ).then(() => {
                        window.location.reload();
                    });
                }
            },
            error: function() {
                alert('Ralat');
            }
        })
    }

    submitStesen = (id) => {
        confirmCreate(id).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
                    onOpen: function() {
                        Swal.showLoading();
                        $.ajax({
                            type: "POST",
                            url: "{{ url('pengesahan_stesen') }}" + '/savestesen/' + id,
                            success: function(data) {
                                if (data.success) {
                                    Swal.fire(
                                        'Berjaya!',
                                        'Berjaya Disimpan!',
                                        'success'
                                    ).then(() => {
                                        window.location.reload();
                                    });
                                }
                            },
                            error: function() {
                                Swal.fire(
                                    'Fail',
                                    'failed to save!',
                                    'error'
                                )
                            }
                        })
                    }
                });
            }
        });
    }


    $("#btn_view").click(function() {
        $("#modal_view").modal("show");
    });

    $("#btn_view_2").click(function() {
        $("#modal_view_2").modal("show");
    });
</script>