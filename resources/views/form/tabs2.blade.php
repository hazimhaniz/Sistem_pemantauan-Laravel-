<style>
    table {
        border-collapse: separate;
        
    }
    
    th {
        background-color: #ebe8ec;
        color: #000 !important;
        border-top: none;
        border-left: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
    }
    
    label {
        font-size: 14px
    }
    
    .card {
        border: none !important;
    }
</style>

<div id="monthlyBFormDiv" class="tab-content">
    <input type="hidden" name="current_tab" id="current_tab_2" value="2">
    <div class="tab-pane active slide-right" id="tab2_view">
        <div class="m-t-20">
            <div class="card card-transparent">
                <div class="card-block">
                    <div class="alert alert-primary" style="font-size:14.5px; font-family: 'Montserrat'">
                        <label> MAKLUMAT PELAPORAN BAHAGIAN B (EIA 2-18) BAGI BULAN {{ $month }} TAHUN {{ $year }}</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="card card-default">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group-attached m-b-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default" onclick="clearAlert()">
                                                        <label>
                                                            <span><b class="text-dark">JURURUNDING LAPORAN EIA:</b></span><span style="color:red;">*</span><br>
                                                            <small style="color:red;" name="alertJuruRundingEIA" id="alertJuruRundingEIA"></small>
                                                        </label>
                                                        <input value="{{ $borangB ? $borangB->jururunding_eia : '' }}" class="formBField form-control form-control-lg" name="jurunding_eia" id="jurunding_eia" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default" onclick="clearAlert()">
                                                        <label>
                                                            <span><b class="text-dark">TARIKH LAPORAN EIA DILULUSKAN</b></span> &nbsp;
                                                            <i class="fa fa-calendar"></i><br>
                                                            <small style="color:red;" name="alertTarikhEIALulus" id="alertTarikhEIALulus"></small>
                                                        </label>
                                                        <input value="{{ $borangB ? $borangB->tarikh_kelulusan_eia : '' }}" class="formBField form-control datepicker auditData" data-date-end-date="0d" name="tarikh_laporan_eia" id="tarikh_laporan_eia" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group-attached m-b-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default" onclick="clearAlert()">
                                                        <label>
                                                            <span><b class="text-dark">JURURUNDING EIA:</b></span><span style="color:red;">*</span><br>
                                                            <small style="color:red;" name="alertJuruRundingPostEIA" id="alertJuruRundingPostEIA"></small>
                                                        </label>
                                                        <input value="{{ $borangB ? $borangB->jururunding_post_eia : '' }}" class="formBField form-control form-control-lg" name="jurunding_pengawasan_eia" id="jurunding_pengawasan_eia" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default" onclick="clearAlert()">
                                                        <label>
                                                            <span><b class="text-dark">TARIKH LAPORAN POST EIA DILULUSKAN</b></span> &nbsp;<i class="fa fa-calendar"></i><br>
                                                            <small style="color:red;" name="alertTarikhPostEIALulus" id="alertTarikhPostEIALulus"></small>
                                                        </label>
                                                        <input value="{{ $borangB ? $borangB->tarikh_kelulusan_emp : '' }}" class="formBField form-control datepicker" name="tarikh_laporan_eia_diluluskan" id="tarikh_laporan_eia_diluluskan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                 <!--                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>
                                                        <span><b class="text-dark">Syarat</b></span><span style="color:red;">*</span>
                                                        <small style="color:red;" name="alertSyarat" id="alertSyarat"></small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" onclick="clearAlert()">
                                                <input class="form-control form-control-lg" name="syarat" id="syarat" type="number" max="99" min="1" @if($borangB->status_id != 600) disabled @endif> 
                                                <input type="hidden" name="projekID" value="{{ $projek->id }}">
                                                <input type="hidden" name="year" value="{{ $year }}">
                                                <input type="hidden" name="month" value="{{ $month }}">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" id="syaratAddBtn" onclick="projekSaveSyaratNumber()" class="btn btn-primary mb-2 tambahSyarat">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <br><br>
                                <div class="col-md-12">
                                    <div id="syaratBTable"></div>
                                    <br>
                                    <div class="alert alert-success" style="padding:10px;">
                                        <div class="form-group">
                                            <label>
                                                <u>NOTA</u><br>
                                                *ULASAN PEMAJU HENDAKLAH MERANGKUMI PERKARA-PERKARA BERIKUT:-<br>
                                                (I) RINGKASAN MENGENAI LANGKAH KAWALAN YANG DICADANGKAN DI DALAM LAPORAN EIA;<br>
                                                (II) LANGKAH KAWALAN SEBENAR YANG DIAMBIL DI PERINGKAT PELAKSANAAN PROJEK. JUSTIFIKASI KE ATAS SEBARANG PINDAAN YANG DIBUAT KEPADA CADANGAN ASAL DI DALAM LAPORAN EIA DARI SUDUT KEBERKESANAN LANGKAH KAWALAN;<br>
                                                (III) GAMBAR /BUKTI-BUKTI SOKONGAN HENDAKLAH JUGA DILAMPIRKAN; DAN<br>
                                                (IV) PERUNDING DAN PEMAJU DIMINTA MEMBUAT PERBANDINGAN KE ATAS RAMALAN IMPAK/KESAN KE ATAS ALAM SEKITAR YANG DIBUAT DI DALAM LAPORAN EIA DENGAN KESAN SEBENAR PELAKSANAAN PROJEK KE ATAS ALAM SEKITAR
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 p-t-20">
                                        <ul class="pager wizard no-style">
                                            @if($borangB)
                                                @hasanyrole('eo')
                                                    @if($borangB->status_id == 600)
                                                    <li>
                                                        <button id="tindakanBorangBEO" onclick="tindakanBorangB({{ $borangB->id }}, 13)" type="button" class="btn btn-info btn-cons from-left pull-right">
                                                            <span>Hantar</span>
                                                        </button>
                                                    </li>
                                                    @endif
                                                @endhasanyrole

                                                @hasanyrole('pp')
                                                    @if($borangB->status_id == 13)
                                                    <li>
                                                        <button id="tindakanBorangBPP" onclick="tindakanBorangB({{ $borangB->id }}, 602)" type="button" class="btn btn-info btn-cons from-left pull-right">
                                                            <span>Sahkan</span>
                                                        </button>
                                                    </li>
                                                    @endif
                                                @endhasanyrole

                                            @endif
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')
<script type="text/javascript">
    function clearAlert(){
        $('#alertSyarat').text('');
        $('#alertJuruRundingEIA').text('');
        $('#alertTarikhEIALulus').text('');
        $('#alertJuruRundingPostEIA').text('');
        $('#alertTarikhPostEIALulus').text('');
    }

    function submitSyarat1(form_id) {
        var form = $('#tambahB');
        $.ajax({
            url: "{{ route('form.bSyarat') }} ",
            method: "POST",
            data: new FormData(form[0]),
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                
                alert(data.status);
                window.location = data.url;
                table.api().ajax.reload(null, false);
            }
        });
    }
    
    function submitSyarat(form_id) {
        
        var form = $('#syaratB');
        $.ajax({
            url: "{{route('form.postSyaratB')}}",
            method: "POST",
            data: new FormData(form[0]),
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                
                alert(data.status);
                window.location = data.url;
                table.api().ajax.reload(null, false);
            }
        });
    }
</script>

<script>
    var projekSaveSyaratNumber;
    var tindakanBorangB;
    $(document).ready(function(){
        $("#syaratBTable").load("{{ url('/projek/get-syarat-b/') }}/{{ $projek->id }}/{{ $year }}/{{ $month }}");
        
        projekSaveSyaratNumber = function(){
            var syarat = $("#syarat").val();
            var jurunding_eia = $("#jurunding_eia").val();
            var tarikh_laporan_eia = $("#tarikh_laporan_eia").val();
            var jurunding_pengawasan_eia = $("#jurunding_pengawasan_eia").val();
            var tarikh_laporan_eia_diluluskan = $("#tarikh_laporan_eia_diluluskan").val();

            if(syarat == '' || jurunding_eia == '' || tarikh_laporan_eia == '' || jurunding_pengawasan_eia == '' || tarikh_laporan_eia_diluluskan == ''){
                if(syarat == ''){
                    $('#alertSyarat').text('Sila isi bahagian ini');
                }if(jurunding_eia == ''){
                    $('#alertJuruRundingEIA').text('Sila isi bahagian ini');
                }if(tarikh_laporan_eia == ''){
                    $('#alertTarikhEIALulus').text('Sila isi bahagian ini');
                }if(jurunding_pengawasan_eia == ''){
                    $('#alertJuruRundingPostEIA').text('Sila isi bahagian ini');
                }if(tarikh_laporan_eia_diluluskan == ''){
                    $('#alertTarikhPostEIALulus').text('Sila isi bahagian ini');
                }
            }else{
                $('#alertSyarat').text('');
                $('#alertJuruRundingEIA').text('');
                $('#alertTarikhEIALulus').text('');
                $('#alertJuruRundingPostEIA').text('');
                $('#alertTarikhPostEIALulus').text('');
                var monthlyBID = "{{ $borangB ? $borangB->id : ''}}";
                
                var formData = new FormData;
                formData.append('syarat', syarat);
                formData.append('monthlyBID', monthlyBID);
                formData.append('jurunding_eia', jurunding_eia);
                formData.append('tarikh_laporan_eia', tarikh_laporan_eia);
                formData.append('jurunding_pengawasan_eia', jurunding_pengawasan_eia);
                formData.append('tarikh_laporan_eia_diluluskan', tarikh_laporan_eia_diluluskan);
                
                $.ajax({
                    url: "{{ url('/projek/save-syarat-number') }}",
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $("#syaratBTable").load("{{ url('/projek/get-syarat-b/') }}/{{ $projek->id }}/{{ $year }}/{{ $month }}");
                    }
                });
            }
        }
        
        tindakanBorangB = function(borangBID, nextStatus){
            console.log(borangBID);
            window.location.replace("{{ url('/projek/tindakan-syarat-b') }}/" + borangBID + "/" + nextStatus);
        }

        @if ($borangB)
            @if($borangB->status_id != 600)
                $("#syaratAddBtn").hide();
                $(".formBField").attr('disabled', true);
                // $("#monthlyBFormDiv :textarea").attr('disabled', true);
            @endif
        @endif
        
    });
</script>
@endpush