<div class="modal fade" id="baseAjaxModalContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if(empty($pengawasanDron->stesen))
                <h5 class="modal-title" id="addModalTitle"> Tambah <b>STESEN DRON</b></h5>
                @else
                <h5 class="modal-title" id="addModalTitle"> Lihat <b>STESEN DRON</b></h5>
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
                                
                                    
                               
                                <div class="form-group required form-group-default">
                                    <label class="" for="">
                                        <i class="fal fa-file fa-lg"></i>
                                        &nbsp; NAMA STESEN DRON
                                        <span class="text-danger" style="font-size:14px">*</span>
                                    </label>
                                    <input readonly id="stesen" value="{{ $pengawasanDron->stesen }}" name="stesen" class="form-control form-control-lg" type="text" autocomplete="off" />
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default input-group" id="show_date_eia" style="display: block;">
                                            <div class="form-input-group">
                                                <label>Tarikh Pemantauan</label>
                                                <input disabled class="form-control datepicker auditData" data-date-end-date="0d" id="dron_date_eia" name="dron_date_eia" placeholder="dd/mm/yyyy" value="{{ Carbon\Carbon::parse($pengawasanDron->date_eia)->format('d/m/Y') }}" type="text" autocomplete="off" />
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
                                                    <input disabled class="form-control datepicker auditData" data-date-end-date="0d" id="dron_date_emp" name="dron_date_emp" placeholder="dd/mm/yyyy" value="{{ Carbon\Carbon::parse($pengawasanDron->date_emp)->format('d/m/Y') }}" type="text" autocomplete="off" />
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
                                    <div class="dashTitle">GAMBAR LOKASI PEMANTAUAN DRON</div>
                               
                                   
                                    <br><br>
                                    <table id="parameterStesenDronTable" role="grid" aria-describedby="table_info" border="1px" style="padding:10px;">
                                        <thead>

                                            <tr>
                                                <th bgcolor="#" class=" th-stesen align-top text-center" style="width:2%; vertical-align:top; color:#">BIL.</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">GAMBAR</th>
                                                <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">CATATAN</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @if(!empty($pengawasanDron->docType))
                                             <?php
                                             $sno =1;
                                             ?>
                                                 @foreach($pengawasanDron->docType as $image)
                                                     <tr>
                                                        <td>
                                                            {{$sno}}
                                                        </td>
                                                        <td>
                                                            <a target="_blank" href="{{ Storage::url($image->path) }}">
                                                                <img src = " {{ Storage::url($image->path) }} " class="img-size"/>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <textarea name="ulasan[]" id="" class="form-control border border-default rounded" readonly style="height: 35px;">{{$image->ulasan}}</textarea>    
                                                        </td>
                                                        <?php
                                                        $sno++;
                                                        ?>
                                                        @endforeach
                                                    </tr>
                                            @else
                                                <tr>
                                                     <td class="align-middle text-center">1</td>
                                        <td>
                                        <div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input id="gambar_stesen" name="gambar_stesen[]" type="file" disabled=""></div>
                                        </td>
                                        <td>
                                        <textarea name="ulasan[]" id="" readonly class="form-control border border-default rounded" style="height: 35px;"></textarea>
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
                               
                             
                    </div>
                </div>
                @if($pengawasanDron->status == 4)
                @hasanyrole('penyiasat')
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="submitStesen({{$pengawasanDron->id}})">Sahkan</button>
                </div>
                @endhasanyrole
                @endif
                @hasanyrole('pp')
                <div class="modal-footer">
                    @if($pengawasanDron->status == 603 || $pengawasanDron->status == 606)
                    <button type="button" data-action="{{ route('project.hantar.stesen', $pengawasanDron) }}" onclick="hantarStesen(this)" class="btn btn-success" data-original-title="Sahkan"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">&nbsp;Hantar</span></button>
                    @elseif($pengawasanDron->status == 13)
                    <button type="button" data-action="{{ route('project.sahkan.stesen', $pengawasanDron) }}" onclick="hantarStesen(this)" class="btn btn-success" data-original-title="Sahkan"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">&nbsp;Sahkan</span></button>
                    @endif
                </div>
                @endhasanyrole
            </div>
        </div>
    </div>


    @include('form.dron.js.tambah-stesen')
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