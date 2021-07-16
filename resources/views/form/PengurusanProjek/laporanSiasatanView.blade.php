<div class="modal fade stick-up slide-right show" id="siasatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-left: 17px;">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">A. Maklumat Am</h5>
                <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <br>
            </div>
            <div class="modal-body">
                <div class="form-group-attached m-b-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Nama Projek/Premis</span>
                                        <textarea class="form-control form-control-lg" style="min-height: 50px" disabled>{{ $projek ? $projek->nama_projek : '' }}</textarea>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Penggerak Projek:</span>
                                        <input value="{{ $projekBulanan->projek ? $projekBulanan->projek->user ? $projekBulanan->projek->user->name : '' : '' }}" class="form-control form-control-lg" type="text" disabled>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">No Fail JAS :</span>
                                        <input value="{{ $projek ? $projek->no_fail_jas : '' }}" class="form-control form-control-lg" type="text" disabled>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Tarikh laporan EIA diluluskan :</span>
                                        <i class="fa fa-calendar"></i>
                                    </label>
                                    <input value="{{ $borangB ? $borangB->tarikh_kelulusan_eia : '' }}" class="form-control " disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Tarikh EMP diluluskan :</span>
                                        <i class="fa fa-calendar"></i>
                                    </label>
                                    <input value="{{ $projekEMP ? $projekEMP->tarikh_kelulusan ? $projekEMP->tarikh_kelulusan->format('d/m/Y') : '' : '' }}" class="form-control datepicker" disabled >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Jururunding EIA :</span>
                                        <input value="{{ $borangB ? $borangB->jururunding_eia : '' }}" class="form-control form-control-lg" type="text" disabled>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Jururunding Pengawasan Post-EIA : </span>
                                        <input value="{{ $borangB ? $borangB->jururunding_post_eia : '' }}" class="form-control form-control-lg" type="text" disabled>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Jururunding Audit Alam Sekitar :</span>
                                        <input value="{{ $borangE ? $borangE->audit : '' }}" class="form-control form-control-lg" type="text" disabled>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Alamat Tapak :</span>
                                        <textarea class="form-control form-control-lg" style="min-height: 100px" disabled>{{ $projekDetail ? $projekDetail->lokasi : '' }}</textarea>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Pasukan Penguatkuasa :</span>
                                        <ul>
                                            <li> {{ $distribution ? $distribution->assignstaffpenyelia ? $distribution->assignstaffpenyelia->name : '' : '' }} </li>
                                            <li> {{ $distribution ? $distribution->assignstaffpelulus ? $distribution->assignstaffpelulus->name : '' : '' }} </li>
                                            <li> {{ $distribution ? $distribution->assignstaff ? $distribution->assignstaff->name : '' : '' }} </li>
                                        </ul>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <label style="font-size:13px; font-family: 'Montserrat'">Tarikh dan Masa Siasatan :</label>
                <div class="form-group-attached m-b-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Masa masuk</span>
                                        <input id="in_datetime" value="{{ $laporanFinal ? $laporanFinal->in_datetime ? $laporanFinal->in_datetime->format('d/m/Y h:i a') : now()->format('d/m/Y h:i a') : now()->format('d/m/Y h:i a') }}" class="form-control form-control-lg" type="text" disabled>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label"> Masa keluar</span>
                                        <input value="{{ $laporanFinal ? $laporanFinal->out_datetime ? $laporanFinal->out_datetime->format('d/m/Y h:i a') : '' : '' }}" class="form-control form-control-lg" type="text" disabled>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span id="label">Nama Penggerak PP</span>
                                        <input id="wakil_pemaju" value="{{ $laporanFinal ? $laporanFinal->wakil_pemaju : '' }}" {{ Auth::user()->hasRole('penyiasat') && $laporanFinal->status == '508' ? '' : 'disabled' }} class="form-control form-control-lg" type="text">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @if(in_array($laporanFinal->status, [508, 6, 9, 19]))
                <br>
                <label style="font-size:14px; font-family: 'Montserrat'"><b>B. Laporan Hasil Siasatan Oleh Ketua Pasukan Penguatkuasa</b></label>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <span id="label">Ringkasan Hasil Siasatan oleh Pasukan Penguatkuasa</span>
                                    <textarea id="penyiasat_comment" class="form-control" style="min-height: 50px" rows="3" {{ Auth::user()->hasRole('penyiasat') && $laporanFinal->status == '508' ? '' : 'disabled' }}>{{ $laporanFinal->penyiasat_comment }}</textarea>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                @if(in_array($laporanFinal->status, [6, 9, 19]))
                <br>
                <label style="font-size:14px; font-family: 'Montserrat'"><b>C. Ulasan Dan Syor Tindakan Susulan Oleh Ketua Pasukan Penguatkuasa</b></label>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <span id="label">Ulasan Dan Syor Tindakan Susulan Oleh Ketua Pasukan Penguatkuasa</span>
                                    <textarea id="penyelia_comment" class="form-control" style="min-height: 50px" rows="3" {{ Auth::user()->hasRole('penyelia') && $laporanFinal->status == '6' ? '' : 'disabled' }}>{{ $laporanFinal->penyelia_comment }}</textarea>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                @if(in_array($laporanFinal->status, [9, 19]))
                <br>
                <label style="font-size:14px; font-family: 'Montserrat'"><b>D. Ulasan Dan Syor Tindakan Susulan Oleh Ketua Pasukan Penguatkuasa</b></label>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <span id="label"><b>Ulasan Ketua Pasukan Penguatkuasa:</b></span>
                                    <textarea id="pengarah_comment" class="form-control" style="min-height: 50px" rows="3" {{ Auth::user()->hasRole('pengarah') && $laporanFinal->status == '9' ? '' : 'disabled' }}>{{ $laporanFinal->pengarah_comment }}</textarea>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <span id="label"><b>Syor Tindakan Susulan</b></span>
                                <div class="row" style="padding-left: 20px">
                                    <div class="col-md-3 form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="syor_1" name="syor" value="1" {{ Auth::user()->hasRole('pengarah') && $laporanFinal->status == '9' ? '' : 'disabled' }} >
                                        <label for="syor_1"> Field Citation </label>
                                    </div>
                                    <div class="col-md-3 form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="syor_2" name="syor" value="2" {{ Auth::user()->hasRole('pengarah') && $laporanFinal->status == '9' ? '' : 'disabled' }} >
                                        <label for="syor_2"> Notis Arahan </label>
                                    </div>
                                    <div class="col-md-3 form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="syor_3" name="syor" value="3" {{ Auth::user()->hasRole('pengarah') && $laporanFinal->status == '9' ? '' : 'disabled' }} >
                                        <label for="syor_3"> Kompaun </label>
                                    </div>
                                    <div class="col-md-3 form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="syor_4" name="syor" value="4" {{ Auth::user()->hasRole('pengarah') && $laporanFinal->status == '9' ? '' : 'disabled' }} >
                                        <label for="syor_4"> Perintah Larangan </label>
                                    </div>
                                    <div class="col-md-3 form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="syor_5" name="syor" value="5" {{ Auth::user()->hasRole('pengarah') && $laporanFinal->status == '9' ? '' : 'disabled' }} >
                                        <label for="syor_5"> Tindakan Mahkamah </label>
                                    </div>
                                    <div class="col-md-3 form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="syor_6" name="syor" value="6" {{ Auth::user()->hasRole('pengarah') && $laporanFinal->status == '9' ? '' : 'disabled' }} >
                                        <label for="syor_6"> lain-lain </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-md-12" style="margin-bottom: 31px;">
                    @hasanyrole('penyiasat')
                    @if(in_array($laporanFinal->status, [508]))
                    <input type="button" onclick="sahkanLaporan({{ $projekBulanan->id }}, 'penyiasat')" class="btn btn-info btn-cons from-left pull-right" value="JANA" />
                    @endif
                    @endhasanyrole
                    @hasanyrole('penyelia')
                    @if(in_array($laporanFinal->status, [6]))
                    <input type="button" onclick="sahkanLaporan({{ $projekBulanan->id }}, 'penyelia')" class="btn btn-info btn-cons from-left pull-right" value="SAHKAN" />
                    @endif
                    @endhasanyrole
                    @hasanyrole('pengarah')
                    @if(in_array($laporanFinal->status, [9]))
                    <input type="button" onclick="sahkanLaporan({{ $projekBulanan->id }}, 'pengarah')" class="btn btn-info btn-cons from-left pull-right" value="LULUS" />
                    @endif
                    @endhasanyrole
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#siasatanModal").modal('show');

    var syorArr = {!! $laporanFinal->syor !!};

    for (var i = 0; i < syorArr.length; i++)
    {
        console.log(syorArr[i]);
        $("#syor_" + syorArr[i]).attr('checked', true);
    }
    
    function sahkanLaporan(projekBulananID, dataRole)
    {
        console.log(projekBulananID, dataRole);
        var isValid = true;
        
        var formData = new FormData;
        formData.append('projekBulananID', projekBulananID);
        formData.append('dataRole', dataRole);
        
        if(dataRole == 'penyiasat')
        {
            var penyiasat_comment = $("#penyiasat_comment").val();
            if(penyiasat_comment.length == 0)
            {
                Swal.fire('Gagal', 'Sila isi Ringkasan Hasil Siasatan', 'error');
                isValid = false;
            }

            formData.append('penyiasat_comment', penyiasat_comment);
            formData.append('in_datetime', $("#in_datetime").val());
            formData.append('wakil_pemaju', $("#wakil_pemaju").val());
        }
        
        if(dataRole == 'penyelia')
        {
            var penyelia_comment = $("#penyelia_comment").val();
            if(penyelia_comment.length == 0)
            {
                Swal.fire('Gagal', 'Sila isi Ulasan Dan Syor Tindakan Susulan', 'error');
                isValid = false;
            }

            formData.append('penyelia_comment', penyelia_comment);
        }
        
        if(dataRole == 'pengarah')
        {
            var pengarah_comment = $("#pengarah_comment").val();
            if(pengarah_comment.length == 0)
            {
                Swal.fire('Gagal', 'Sila isi Ulasan', 'error');
                isValid = false;
            }

            formData.append('pengarah_comment', pengarah_comment);
            $("input[name='syor']:checked").each(function(){
                formData.append('syor[]', $(this).val());
            });
        }

        if(isValid)
        {
            $.ajax({
                url: "{{ url('/pengurusan_projek/laporan/siasatan-sahkan') }}",
                method: "POST",
                data: formData,
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $("#siasatanModal").modal('hide');
                    Swal.fire('Berjaya', 'Maklumat berjaya disimpan', 'success');
                    table.api().ajax.reload(null, false);
                },
                error: function(response){
                    console.log(response);
                }
            });
        }
        
    }
</script>