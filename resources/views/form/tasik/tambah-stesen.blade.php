

<div class="modal fade" id="baseAjaxModalContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

        <input type="hidden" />
        <div class="modal-content">
            <div class="modal-header">
                @if(empty($pengawasanTasik->stesen))
                <h5 class="modal-title" id="addModalTitle"> Tambah <b>STESEN TASIK</b></h5>
                @else
                <h5 class="modal-title" id="addModalTitle"> Kemaskini <b>STESEN TASIK</b></h5>
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
                                        <a id="geobutton" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a>
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
                                
                                <div class="form-group-attached m-b-10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Kategori</b></span><span style="color:red;">*</span>
                                                </label>
                                                <select id="class" name="class" class="select-normal full-width" style="border: none">
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
                               
                                <div class="form-group required form-group-default">
                                    <label class="" for="">
                                        <i class="fal fa-file fa-lg"></i>
                                        &nbsp; NAMA STESEN TASIK
                                        <span class="text-danger" style="font-size:14px">*</span>
                                    </label>
                                    <input id="stesen" value="{{ $pengawasanTasik->stesen }}" name="stesen" class="form-control form-control-lg" type="text" autocomplete="off" />
                                </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 m-t-15 control-label">Bacaan Garis Dasar
                                        </label>
                                        <div class="checkbox check-primary">
                                            <input type="checkbox" class="form-check-input" id="tasik_is_eia" onclick="displayDateEIA()"  checked />
                                            <label class="form-check-label" for="tasik_is_eia"><font color="red">*</font> Peringkat EIA</label>
                                            @if($pengawasanTasik->is_emp)
                                            <input type="checkbox" class="form-check-input" id="tasik_is_emp" onclick="displayDateEMP()" checked/>
                                            <label class="form-check-label" for="tasik_is_emp">Peringkat EMP</label>
                                            @else
                                            <input type="checkbox" class="form-check-input" id="tasik_is_emp" onclick="displayDateEMP()"/>
                                            <label class="form-check-label" for="tasik_is_emp">Peringkat EMP</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default input-group" id="show_date_eia" style="display: block;">
                                            <div class="form-input-group">
                                                <label>Tarikh Pengawasan (EIA)</label>
                                                <input class="form-control datepicker auditData" data-date-end-date="0d" id="tasik_date_eia" name="tasik_date_eia" placeholder="dd/mm/yyyy" value="{{ Carbon\Carbon::parse($pengawasanTasik->date_eia)->format('d/m/Y') }}" type="text" autocomplete="off" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @if($pengawasanTasik->is_emp)
                                    <div class="col-md-12" id="show_date_emp">
                                        @else
                                        <div class="col-md-12" id="show_date_emp" hidden>
                                            @endif
                                            <div class="form-group form-group-default input-group" style="display: block;">
                                                <div class="form-input-group">
                                                    <label>Tarikh Pengawasan (EMP)</label>
                                                    <input class="form-control datepicker auditData" data-date-end-date="0d" id="tasik_date_emp" name="tasik_date_emp" placeholder="dd/mm/yyyy" value="{{ Carbon\Carbon::parse($pengawasanTasik->date_emp)->format('d/m/Y') }}" type="text" autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12" style="overflow:auto; padding:10px; max-height:300px;">
                                    <div class="dashTitle">Maklumat Parameter</div>
                                    <label>Standard merujuk kepada National Lake Water Quality Standards</label>
                                    <table class="table" id="parameterStesenTasikTable" role="grid" aria-describedby="table_info" border="1px" >
                                        <thead>
                                            <tr role="row">
                                                <th bgcolor="#" class=" th-stesen align-top text-center" style="vertical-align:top; color:#">BIL.</th>
                                                <th bgcolor="#" class="align-top text-center" style="vertical-align:top; color:#">PARAMETER</th>
                                                <th bgcolor="#" class="align-top text-center"  style="vertical-align:top; color:#">UNIT</th>
                                                <th bgcolor="#" class="align-top text-center"  style="vertical-align:top; color:#">STANDARD</th>
                                                <th bgcolor="#" class="align-top text-center" style="vertical-align:top; color:#">DATA BASELINE (EIA)
                                                </th>
                                                <th bgcolor="#" class="text-center" style="color:#; display: none;" id="baseline_emp_tasik">DATA BASELINE (EMP)</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                @if(empty($pengawasanTasik->stesen))
                                                <td colspan="6"><b>Sila Pilih Kategori <font color="red">*</font></b></td>
                                                @else
                                                <?php $i=1; ?>
                                                @foreach($pengawasanTasik->parameters as  $key => $parameter)
                                                <tr>
                                                    <td class="align-middle text-center">{{ $i++ }}</td>
                                                    <td class="align-left">{{ $parameter->masterParameter->jenis_parameter }}
                                                        @if ($parameter->mode === 'mandatory')
                                                        <small>
                                                            <span style="color:red;">*</span>
                                                        </small>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle text-center">{{ $parameter->masterParameter->unit }}</td>
                                                    <td class="align-middle text-center">@if($parameter->masterStandard){{ ($parameter->masterStandard->parameter) }}@endif</td>
                                                    <td class="align-middle text-center"><input class="form-control" name="parameters[]" id="{{ $parameter->parameter }}" onkeypress="return verifyKey(event)" autocomplete="off" value="{{ $parameter->baselineeia }}" /></td>
                                                     <td class="align-middle text-center"><input class="form-control base_emp_tasik" name="base_emp[]" id="base{{ $parameter->parameter }}" onkeypress="return verifyKey(event)" autocomplete="off" value="{{ $parameter->baselineemp }}" /></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    @if(!empty($pengawasanTasik->docType))
                                    <div class="col-md-12" style="overflow:auto; max-height:300px; margin-top: 20px;">
                                        <br />
                                        <div class="form-group form-group-default">
                                            <label><span><b class="text-dark">GAMBAR STESEN TASIK</b></span></label>
                                            @foreach($pengawasanTasik->docType as $image)

                                             <div id="{{$image->id}}">
                                                <a target="_blank" href="{{ Storage::url($image->path) }}">
                                                    <img src = " {{ Storage::url($image->path) }} " class="img-size"/>
                                                </a>
                                                <a onclick="deleteImage('{{ $image->id }}')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> </a>
                                                
                                            </div>


                                            @endforeach
                                        </div>
                                    </div>
                                    @endif 
                                    <div class="col-md-12">
                                        <br />
                                        <div class="form-group form-group-default">
                                            <label><span><b class="text-dark">GAMBAR STESEN TASIK</b></span></label>
                                            <div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input id="gambar_stesen" name="gambar_stesen[]" type="file" multiple></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dashTitle"><span style="color:red;">*</span><b>Rujukan (NAHRIM)</b></div>
                                
                                <table class="" id="table" role="grid" aria-describedby="table_info" border="1px" style="padding:10px;">
                                    <thead>
                                        <tr role="row">
                                            <th bgcolor="#" class="align-top text-center" style="width:2%; vertical-align:top; color:#">KATEGORI</th>
                                            <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">KEGUNAAN
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($rujukan as $rujuk)
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
                    <div class="modal-footer">
                        @if(!$pengawasanTasik->stesen)
                        <button type="button" data-action="{{ route('project.tambah.stesen.tasik', $projek) }}" onclick="btnTambahStesenTasik(this)" class="btn btn-success">Simpan</button>
                        @else
                        <button type="button" data-action="{{ route('project.update.stesen.tasik', $pengawasanTasik) }}" onclick="btnUpdateStesenTasik(this)" class="btn btn-success">Kemaskini</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('form.tasik.js.tambah-stesen')
                <script type="text/javascript">
    function intialdisplay() {
        var show_date_emp = document.getElementById("show_date_emp");
         var tasik_is_emp = document.getElementById("tasik_is_emp");
        if (tasik_is_emp.checked) {
            document.getElementById("baseline_emp_tasik").style.display = "block";
            $('.base_emp_tasik').show();
        } else {
            document.getElementById("baseline_emp_tasik").style.display = "none";
            $('.base_emp_tasik').hide();
        }
    }
   
    @if(!empty($pengawasanTasik->stesen))
        intialdisplay();
    @endif
    function deleteImage(argument) {
        $.ajax({
            url: "{{ route('deletefile') }}",
            data : {
                token : argument
            },
            type: 'POST',
            success: function(response) {
                if (response.success) {
                    $('#'+response.token).hide();
                }
            },
            fail: (response) => {
               
            }
        });
    }
    </script>