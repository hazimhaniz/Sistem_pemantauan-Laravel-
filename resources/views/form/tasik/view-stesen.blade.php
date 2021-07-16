<div class="modal fade" id="baseAjaxModalContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        
        @if(empty($pengawasanTasik->stesen))
        <form action="{{ route('project.tambah.stesen.tasik', $projek) }}" method="POST">
            @else  
            <form action="{{ route('project.update.stesen.tasik', $pengawasanTasik) }}" method="POST">
                @endif 
                @csrf
                
                <input type="hidden" />
                <div class="modal-content">
                    <div class="modal-header">
                        @if(empty($pengawasanTasik->stesen))
                        <h5 class="modal-title" id="addModalTitle"> Lihat <b>STESEN TASIK</b></h5>
                        @else
                        <h5 class="modal-title" id="addModalTitle"> Lihat <b>STESEN TASIK</b></h5>
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
                                                        <input class="form-control form-control-lg" value="{{ $pengawasanTasik->latitud }}" id="latitude" name="latitude" type="text" autocomplete="off" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>
                                                            <span><b class="text-dark">Longitude</b></span><span style="color:red;">*</span>
                                                        </label>
                                                        <input class="form-control form-control-lg" value="{{ $pengawasanTasik->longitud }}" type="text" id="longitude" name="longitude" autocomplete="off" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group required form-group-default">
                                                <label class="" for="">
                                                    <i class="fal fa-file fa-lg"></i>
                                                    &nbsp; NAMA STESEN TASIK
                                                    <span class="text-danger" style="font-size:14px">*</span>
                                                </label>
                                                <input readonly id="stesen" value="{{ $pengawasanTasik->stesen }}" name="stesen" class="form-control form-control-lg" type="text" autocomplete="off" />
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>
                                                            <span><b class="text-dark">Kategori</b></span><span style="color:red;">*</span>
                                                        </label>
                                                        <select disabled id="class" name="class" class="select-normal full-width" required="" data-error-msg="Silih pilih cara penerbitan." style="border: none">
                                                            <option selected disabled>Sila Pilih Kategori</option>
                                                          <option selected disabled>Sila Pilih Kategori</option>
                                                            <option value="A" {{ $pengawasanTasik->class == 'A' ? 'selected':'' }}>KATEGORI A</option>
                                                            <option value="B" {{ $pengawasanTasik->class == 'B' ? 'selected':'' }}>KATEGORI B</option>
                                                            <option value="C" {{ $pengawasanTasik->class == 'C' ? 'selected':'' }}>KATEGORI C</option>
                                                            <option value="D" {{ $pengawasanTasik->class == 'D' ? 'selected':'' }}>KATEGORI D</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-3 m-t-15 control-label">Bacaan Garis Dasar
                                                </label>
                                                <div class="checkbox check-primary">
                                                    <input disabled type="checkbox" class="form-check-input" id="tasik_is_eia" onclick="displayDateEIA()" checked/>
                                                    <label class="form-check-label" for="tasik_is_eia"><font color="red">*</font> Peringkat EIA</label>
                                                    @if($pengawasanTasik->is_emp)
                                                    <input disabled type="checkbox" class="form-check-input" id="tasik_is_emp" onclick="displayDateEMP()" checked/>
                                                    <label class="form-check-label" for="tasik_is_emp">Peringkat EMP</label>
                                                    @else
                                                    <input disabled type="checkbox" class="form-check-input" id="tasik_is_emp" onclick="displayDateEMP()"/>
                                                    <label class="form-check-label" for="tasik_is_emp">Peringkat EMP</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="col-md-12" id="show_date_eia">
                                                <div class="form-group form-group-default input-group" style="display: block;" >
                                                    <div class="form-input-group">
                                                        <label>Tarikh Pengawasan (EIA)</label>
                                                        <input disabled class="form-control datepicker auditData" data-date-end-date="0d" id="tasik_date_eia" name="tasik_date_eia" placeholder="dd/mm/yyyy" value="{{ Carbon\Carbon::parse($pengawasanTasik->date_eia)->format('d/m/Y') }}" type="text" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" >
                                            @if($pengawasanTasik->is_emp)
                                            <div class="col-md-12" id="show_date_emp">
                                                @else
                                                <div class="col-md-12" id="show_date_emp" hidden>
                                                    @endif
                                                    <div class="form-group form-group-default input-group" style="display: block;" >
                                                        <div class="form-input-group">
                                                            <label>Tarikh Pengawasan (EMP)</label>
                                                            <input disabled class="form-control datepicker auditData" data-date-end-date="0d" id="tasik_date_emp" name="tasik_date_emp" placeholder="dd/mm/yyyy" value="{{ Carbon\Carbon::parse($pengawasanTasik->date_emp)->format('d/m/Y') }}" type="text" autocomplete="off" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12" style="overflow:auto; max-height:300px;">
                                            <div class="dashTitle">Maklumat Parameter</div>
                                            <label>Standard merujuk kepada National Lake Water Quality Standard</label>
                                            <table class="table" id="parameterStesenTasikTable" role="grid" aria-describedby="table_info" border="1px" style="padding:10px;">
                                                <thead>
                                                    <tr role="row">
                                                        <th bgcolor="#" class=" th-stesen align-top text-center" style=" vertical-align:top; color:#">BIL.</th>
                                                        <th bgcolor="#" class="align-top text-center" style=" vertical-align:top; color:#">PARAMETER</th>
                                                        <th bgcolor="#" class="align-top text-center" style=" vertical-align:top; color:#">UNIT</th>
                                                        <th bgcolor="#" class="align-top text-center" style=" vertical-align:top; color:#">STANDARD<br></th>
                                                        <th bgcolor="#" class="align-top text-center" style=" vertical-align:top; color:#">DATA BASELINE(EIA)</th>
                                                        <th bgcolor="#" class="align-top text-center" style=" vertical-align:top; color:#">DATA BASELINE(EMP)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(empty($pengawasanTasik->stesen))
                                                    <td colspan="5"><b>Sila Pilih Kelas <font color="red">*</font></b></td>
                                                    @else
                                                    <?php $i=1; ?>
                                                    @foreach($pengawasanTasik->parameters as  $key => $parameter)
                                                    <?php 
                                                    if (empty($parameter->baselineeia)){
                                                        continue;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td class="align-middle text-center">{{ $i++ }}</td>
                                                        <td class="align-left text-left">{{ $parameter->masterParameter->jenis_parameter }}
                                                            @if ($parameter->mode === 'mandatory')
                                                            <small>
                                                                <span style="color:red;">*</span>
                                                            </small>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle text-center">{{ $parameter->masterParameter->unit }}</td>
                                                        <td class="align-middle text-center">@if($parameter->masterStandard){{ ($parameter->masterStandard->parameter) }}@endif</td>
                                                        <td class="align-middle text-center"><input readonly class="form-control" name="parameters[]" id="{{ $parameter->id }}" autocomplete="off" value="{{ $parameter->baselineeia }}" /></td>
                                                        <td class="align-middle text-center"><input readonly class="form-control" name="base_emp[]" id="base{{ $parameter->id }}" autocomplete="off" value="{{ $parameter->baselineemp ? $parameter->baselineemp : '-'  }}" /></td>
                                                    </tr>

                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        @if(!empty($pengawasanTasik->docType))
                                        <div class="col-md-12" style="overflow:auto; max-height:300px;">
                                            <br />
                                            <div class="form-group form-group-default">
                                                <label><span><b class="text-dark">GAMBAR STESEN TASIK</b></span></label>
                                                @foreach($pengawasanTasik->docType as $image)
                                                <a target="_blank" href="{{ Storage::url($image->path) }}">
                                                    <img src = " {{ Storage::url($image->path) }} " class="img-size"/>
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                <!-- <div class="col-md-12">
                                    <br />
                                    <div class="form-group form-group-default">
                                        <label><span><b class="text-dark">GAMBAR STESEN</b></span></label>
                                        <div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input id="gambar_stesen" name="gambar_stesen[]" type="file">
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashTitle"><span style="color:red;">*</span><b>Rujukan (NAHRIM)</b></div>
                           
                            <table class="" id="kelasStesenTasikTable" role="grid" aria-describedby="table_info" border="1px" style="padding:10px;">
                                <thead>
                                    <tr role="row">
                                        <th bgcolor="#" class="align-top text-center" style="width:2%; vertical-align:top; color:#">KATEGORI</th>
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
                                            <td colspan="2">Tiada Maklumat</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if($pengawasanTasik->status == 4)
                        @hasanyrole('penyiasat')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="submitStesen({{$pengawasanTasik->id}})">Sahkan</button>
                        </div>
                        @endhasanyrole
                        @endif
                    @hasanyrole('pp')
                    <div class="modal-footer">
                        @if($pengawasanTasik->status == 603 || $pengawasanTasik->status == 606)
                        <button type="button" data-action="{{ route('project.hantar.stesen', $pengawasanTasik) }}" onclick="hantarStesen(this)" class="btn btn-success" data-original-title="Sahkan"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">&nbsp;Hantar</span></button>
                        @elseif($pengawasanTasik->status == 13)
                        <button type="button" data-action="{{ route('project.sahkan.stesen', $pengawasanTasik) }}" onclick="hantarStesen(this)" class="btn btn-success" data-original-title="Sahkan"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">&nbsp;Sahkan</span></button>
                        @endif
                    </div>
                    @endhasanyrole
                </div>
            </form>
        </div>
    </div>

    @include('form.tasik.js.tambah-stesen')

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