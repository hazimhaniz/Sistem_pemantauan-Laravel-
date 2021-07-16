
<div class="modal fade" id="baseAjaxModalContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if(empty($pengawasanDron->stesen))
                <h5 class="modal-title" id="addModalTitle"> Tambah <b>STESEN DRON</b></h5>
                @else
                <h5 class="modal-title" id="addModalTitle"> Kemaskini <b>STESEN DRON</b></h5>
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
                                            <input class="form-control form-control-lg" value="{{ $pengawasanDron->latitud }}" id="latitude" name="latitude" type="text" autocomplete="off" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Longitude</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" value="{{ $pengawasanDron->longitud }}" type="text" id="longitude" name="longitude" autocomplete="off" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div hidden class="form-group-attached m-b-10">
                                    <div hidden class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Kelas</b></span><span style="color:red;">*</span>
                                                </label>
                                                <select id="class" name="class" class="select-normal full-width" style="border: none">
                                                    <option selected disabled>Sila Pilih Kelas</option>
                                                    <option value="I" {{ $pengawasanDron->class == 'I' ? 'selected':'' }}>CLASS I</option>
                                                    <option value="IIA" {{ $pengawasanDron->class == 'IIA' ? 'selected':'' }}>CLASS IIA</option>
                                                    <option value="IIB" {{ $pengawasanDron->class == 'IIB' ? 'selected':'' }}>CLASS IIB</option>
                                                    <option value="III" {{ $pengawasanDron->class == 'III' ? 'selected':'' }}>CLASS III</option>
                                                    <option value="IV" {{ $pengawasanDron->class == 'IV' ? 'selected':'' }}>CLASS IV</option>
                                                    <option value="V" {{ $pengawasanDron->class == 'V' ? 'selected':'' }}>CLASS V</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required form-group-default">
                                    <label class="" for="">
                                        <i class="fal fa-file fa-lg"></i>
                                        &nbsp; NAMA STESEN DRON
                                        <span class="text-danger" style="font-size:14px">*</span>
                                    </label>
                                    <input id="stesen" value="{{ $pengawasanDron->stesen }}" name="stesen" class="form-control form-control-lg" type="text" autocomplete="off" />
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default input-group" id="show_date_eia" style="display: block;">
                                            <div class="form-input-group">
                                                <label>Tarikh Pemantauan Dron</label>
                                                <input class="form-control datepicker auditData" data-date-end-date="0d" id="dron_date_eia" name="dron_date_eia" placeholder="dd/mm/yyyy" value="{{ Carbon\Carbon::parse($pengawasanDron->date_eia)->format('d/m/Y') }}" type="text" autocomplete="off" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    @if($pengawasanDron->is_emp)
                                    <div class="col-md-12" id="show_date_emp">
                                        @else
                                        <div class="col-md-12" id="show_date_emp" hidden>
                                            @endif
                                            <div class="form-group form-group-default input-group" style="display: block;" >
                                                <div class="form-input-group">
                                                    <label>Tarikh Pengawasan (EMP)</label>
                                                    <input class="form-control datepicker auditData" data-date-end-date="0d" id="dron_date_emp" name="dron_date_emp" placeholder="dd/mm/yyyy" value="{{ Carbon\Carbon::parse($pengawasanDron->date_emp)->format('d/m/Y') }}" type="text" autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <input type="hidden" id="gambar_count" name="gambar_count" value="1">
                                <div class="col-md-12" style="overflow:auto; max-height:300px;">
                                    <div class="dashTitle">GAMBAR LOKASI PEMANTAUAN DRON</div>
                                    <button type="button" class="btn btn-info btn-xs pull-right" onclick="addGambar()" style="font-size: 12.5px;">+</button>
                                    
                                   
                                    <br><br>
                                    <table id="parameterStesenDronTable" role="grid" aria-describedby="table_info" border="1px" style="padding:10px;">
                                        <thead>
                                            <tr>
                                              
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">GAMBAR</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">CATATAN</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addGambar">
                                            <tr>
                                                @if(!empty($pengawasanDron->docType))
                                             
                                                 @foreach($pengawasanDron->docType as $image)
                                                     <tr>    
                                                        <td>
                                                            <a target="_blank" href="{{ Storage::url($image->path) }}">
                                                                <img src = " {{ Storage::url($image->path) }} " class="img-size"/>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <textarea name="ulasan[]" id="" class="form-control border border-default rounded"  style="height: 35px;">{{$image->ulasan}}</textarea>    
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                      
                                                        @endforeach
                                                    </tr>
                                            
                                        <td>
                                        <div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input id="gambar_stesen" name="gambar_stesen[]" type="file"></div>
                                        </td>
                                        <td>
                                        <textarea name="ulasan[]" id="" class="form-control border border-default rounded" style="height: 35px;"></textarea>
                                        </td>
                                    </tr>
                                              @endif

                                        </tbody>
                                    </table>
                                <!-- <div class="col-md-12">
                                    <br />
                                    <div class="form-group form-group-default">
                                        <label><span><b class="text-dark">GAMBAR STESEN</b></span></label>
                                        <div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input id="gambar_stesen" name="gambar_stesen[]" type="file"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                        @if(!$pengawasanDron->stesen)
                        <button type="button" data-action="{{ route('project.tambah.stesen.dron', $projek) }}" onclick="btnTambahStesenDron(this)" class="btn btn-success">Simpan</button>
                        @else
                        <button type="button" data-action="{{ route('project.update.stesen.dron', $pengawasanDron) }}" onclick="btnUpdateStesenDron(this)" class="btn btn-success">Kemaskini</button>
                        @endif
                    </div>
                    </div>
                  
                   
                </div>
            </div>
        </div>


        @include('form.dron.js.tambah-stesen')
       