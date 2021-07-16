<style type="text/css">
    table {
        width: 100%;
    }

    tr {
        height: 30px;
    }

    th ,td {
        padding: 5px 3px 5px 7px;
        font-size: 12px !important;
        /*text-align: center;*/
    }
    td {
        border: 1px solid #b5b5b4 ;
    }
    th {
        border-right: 1px solid white ;
    }
</style>
<div class=" container-fluid container-fixed-lg bg-white">
    <div class="card card-transparent">
        <div class="card-block">
            <div class="card card-default">
                <div class="card-header separator">
                    <div class="card-title" style="font-weight: bold;font-size: 12.5px">MAKLUMAT PENDAFTARAN PROJEK</div>
                </div>
                <div class="card-body p-t-20">

                    <input class="projek" type="hidden" name="id" value="{{$ProjekDetail->id}}">

                        <div class="form-group row control-label">
                            <label class="col-md-3">No Fail JAS<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek" name="no_fail_jas" id="no_fail_jas" type="text" value="{{strtoupper($Projek->no_fail_jas)}}" readonly></div>
                        </div>

                        <div class="form-group row control-label">
                            <label class="col-md-3">Nama Projek<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><textarea class="form-control projek" name="nama_projek" id="nama_projek" type="text" style="height: auto;" readonly>{{$Projek->nama_projek}}</textarea></div>
                        </div>

                        <div class="form-group row control-label">
                            <label class="col-md-3">Syarikat Penggerak Projek<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek" name="penggerak_projek" id="penggerak_projek" type="text" value="{{strtoupper(optional($Projek->jasfail->jasdetail)->nama_penggerak)}}" readonly></div>
                        </div>

                         <div class="form-group row control-label">
                            <label class="col-md-3">Nama Penggerak Projek<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek" name="penggerak_projek" id="penggerak_projek" type="text" value="{{$Projek->user->name}}" readonly></div>
                        </div>
                        <hr>
                        <div class="form-group row control-label">
                            <label class="col-md-3">Lokasi<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek" name="lokasi" id="lokasi" type="text" value="{{strtoupper($ProjekDetail->lokasi)}}" readonly>
                            <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;" name="lokasi1" id="lokasi1" type="text" value="{{$ProjekDetail->lokasi1}}" readonly>
                            <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;" name="lokasi2" id="lokasi2" type="text" value="{{$ProjekDetail->lokasi2}}" readonly>
                            </div>
                        </div>
                        <div class="address22">
                            <div class="form-group row control-label">
                                <label class="col-md-3">Poskod<span style="color:red;">*</span> </label>
                                <div class="col-md-3"><input class="form-control numeric postcode projek" name="poskod" aria-required="true" type="text" value="{{$ProjekDetail->poskod}}" required placeholder="Poskod" minlength="5" maxlength="5" readonly></div>
                            </div>
                            <div class="form-group row control-label">
                                <label class="col-md-3">Bandar<span style="color:red;">*</span> </label>
                                <div class="col-md-3"><input class="form-control numeric bandar projek" name="bandar" aria-required="true" type="text" value="{{$ProjekDetail->bandar}}" required placeholder="Bandar" maxlength="20" readonly></div>
                            </div>
                            <div class="form-group row control-label">
                                <label class="col-md-3">Negeri<span style="color:red;">*</span> </label>
                                <div class="col-md-3">
                                    <input class="form-control projek" name="negeri" aria-required="true" type="text" value="{{strtoupper(optional($ProjekDetail->state)->name)}}" required placeholder="Negeri" minlength="5" maxlength="5" readonly>
                                </div>
                                <label class="col-md-3">Daerah<span style="color:red;">*</span> </label>
                                <div class="col-md-3">
                                    <input class="form-control projek" name="negeri" aria-required="true" type="text" value="{{strtoupper(optional($Projek->jasfail->jasdetail)->daerah)}}" required placeholder="Daerah" minlength="5" maxlength="5" readonly>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row control-label">
                            <label class="col-md-3">Alamat Surat-Menyurat<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek" name="alamat_surat" id="alamat_surat" type="text" value="{{strtoupper($ProjekDetail->alamat_surat)}}" required readonly>
                            <input class="form-control projek blackink" name="lokasi1" id="lokasi1" type="text" value="{{$ProjekDetail->alamat_surat1}}" readonly>
                            <input class="form-control projek blackink" name="lokasi2" id="lokasi2" type="text" value="{{$ProjekDetail->alamat_surat2}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Poskod<span style="color:red;">*</span> </label>
                            <div class="col-md-3"><input class="form-control numeric postcode projek" id="surat_poskod" name="surat_poskod" aria-required="true" type="text" value="{{$ProjekDetail->surat_poskod}}" placeholder="Poskod" minlength="5" maxlength="5" required readonly/></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Bandar<span style="color:red;">*</span> </label>
                            <div class="col-md-3"><input class="form-control numeric postcode projek" id="bandar_poskod" name="bandar_poskod" aria-required="true" type="text" value="{{strtoupper(optional($ProjekDetail->city)->name)}}" placeholder="Bandar" maxlength="20" required readonly/></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Negeri<span style="color:red;">*</span> </label>
                            <div class="col-md-3">
                                <input class="form-control projek" name="surat_negeri" aria-required="true" type="text" value="{{strtoupper(optional($ProjekDetail->surat_state)->name)}}" required placeholder="Negeri" minlength="5" maxlength="5" readonly>
                            </div>
                            <label class="col-md-3 control-label">Daerah<span style="color:red;">*</span> </label>
                            <div class="col-md-3">
                                <input class="form-control projek" name="surat_daerah" aria-required="true" type="text" value="{{strtoupper(optional($ProjekDetail->surat_district)->name)}}" required placeholder="Daerah" minlength="5" maxlength="5" readonly>
                            </div>
                        </div>
                        <hr>
                        <!-- <div class="form-group row control-label">
                            <label class="col-md-3">Environmental Officer<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek" name="eo" id="eo" type="text" value="{{optional($detailEO)->name}}" readonly></div>
                        </div> -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Environmental Officer<span style="color:red;">*</span></label>
                            <div class="col-md-9" style="z-index: 0 !important">
                                <div class="aktivitiVal">
                                    <table width="70%">
                                        <thead>
                                            <tr>
                                                <th width="4%">Bil.</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($detailEO)
                                            @foreach($detailEO as $key => $detailEOs)
                                            @if($detailEOs->name)
                                            <tr>
                                                <td style="text-align: center;">{{$key + 1}}.</td>
                                                <td>{{$detailEOs->name}}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Environmental Monitoring Consultant<span style="color:red;">*</span></label>
                            <div class="col-md-9" style="z-index: 0 !important">
                                <div class="aktivitiVal">
                                    <table width="70%">
                                        <thead>
                                            <tr>
                                                <th width="4%">Bil.</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($detailEMC)
                                            @foreach($detailEMC as $key => $detailEMCs)
                                            @if($detailEMCs->name)
                                            <tr>
                                                <td style="text-align: center;">{{$key + 1}}.</td>
                                                <td>{{$detailEMCs->name}}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group row control-label">
                            <label class="col-md-3">Environmental Monitoring Consultant<span style="color:red;">*</span> </label>
                            <div class="col-md-9"><input class="form-control projek" name="emc" id="emc" type="text" value="{{optional($detailEMC)->name}}" readonly></div>
                        </div> -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Aktiviti<span style="color:red;">*</span></label>
                            <div class="col-md-9" style="z-index: 0 !important">
                                <div class="aktivitiVal">
                                    <table width="70%">
                                        <thead>
                                            <tr>
                                                <th width="4%">Bil.</th>
                                                <th>Kod</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($aktiviti as $key => $aktivitis)
                                            <tr>
                                                <td style="text-align: center;">{{$key + 1}}.</td>
                                                <td>{{$aktivitis['id']}}</td>
                                                <td>{{$aktivitis['nama']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row " id="other_aktiviti">
                            <label class="col-md-3 control-label">Nyatakan<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                <input class="form-control projek" name="other_aktiviti" id="other_aktiviti" type="text" value="{{$ProjekDetail->other_aktiviti}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row control-label">
                            <label class="col-md-3 m-t-15">Laporan Pematuhan EIA<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                <div class="laporaneiaVal">
                                    <input class="form-control projek" name="aktiviti" aria-required="true" type="text" value="{{strtoupper(optional($ProjekDetail->pematuhan_eia)->name)}}" required placeholder="Negeri" minlength="5" maxlength="5" readonly>
                                    <!-- <div class="radio radio-primary">
                                        @foreach($pematuhaneia as $index => $pematuhan)
                                        <input name="laporaneia" value="{{$pematuhan->id}}" id="laporaneia_{{$pematuhan->id}}" type="radio" class="projek" required aria-required="true" {{$ProjekDetail->laporaneia == $pematuhan->id ? "checked" : ""}} disabled>
                                        <label for="laporaneia_{{$pematuhan->id}}">{{ $pematuhan->name }}</label>
                                        @endforeach
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group row control-label">
                            <label class="col-md-3">Jenis Projek<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                <div class="jenisprojekVal">
                                    <div class="radio radio-primary">
                                        @foreach($jenisProjek as $index => $jenis)
                                        <input name="jenis_projek" value="{{$jenis->id}}" id="jenis_{{$jenis->id}}" type="radio" class="projek" aria-required="true" onclick="PakejyesnoCheck();" onchange="PakejyesnoCheck();" {{$ProjekDetail->jenis_projek == $jenis->id ? "checked" : ""}} disabled>
                                        <label for="jenis_{{$jenis->id}}">{{$jenis->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            $kontraktor = '';
                            $negeris = '-';
                            $alamat = '';
                            $tarikhmula = '';
                            $tarikhakhir = '';
                        if($ProjekPakej == null){
                            $kontraktor = '';
                            $negeris = '-';
                            $alamat = '';
                            $tarikhmula = '';
                            $tarikhakhir = '';
                        } else {
                            $kontraktor = $ProjekPakej->kontraktor;
                            $negeri = $ProjekPakej->pakej_negeri;
                            foreach ($states as $key => $value) {
                                if ($value->id == $negeri) {
                                    $negeris = $value->name;
                                }
                            }
                            // dd($ProjekPakej->pakej_negeri);
                            $alamat = $ProjekPakej->alamat;
                            $tarikhmula = date("d/m/Y", strtotime($ProjekPakej->tarikh_mula));
                            $tarikhakhir = date("d/m/Y", strtotime($ProjekPakej->tarikh_akhir));
                        }?>
                        <div @if($ProjekDetail->jenis_projek == 1) @else style="display: none;" @endif id="tidakpakej_content">
                            <hr>

                            <div class="form-group row control-label">
                                <label class="col-md-3 m-t-15">Nama Kontraktor<span style="color:red;">*</span> </label>
                                <div class="col-md-9">
                                    <div class="laporaneiaVal">
                                        <input class="form-control projek" name="aktiviti" aria-required="true" type="text" value="{{$kontraktor}}" required placeholder="Negeri" minlength="5" maxlength="5" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row control-label">
                                <label class="col-md-3 m-t-15">Negeri<span style="color:red;">*</span> </label>
                                <div class="col-md-9">
                                    <div class="laporaneiaVal">
                                        <input class="form-control projek" name="aktiviti" aria-required="true" type="text" value="{{$negeris}}" required placeholder="Negeri" minlength="5" maxlength="5" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row control-label">
                                <label class="col-md-3 m-t-15">Alamat<span style="color:red;">*</span> </label>
                                <div class="col-md-9">
                                    <div class="laporaneiaVal">
                                        <input class="form-control projek" name="aktiviti" aria-required="true" type="text" value="{{$alamat}}" required placeholder="Negeri" minlength="5" maxlength="5" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row control-label">
                                <label class="col-md-3 m-t-15">Tarikh Mula<span style="color:red;">*</span> </label>
                                <div class="col-md-9">
                                    <div class="laporaneiaVal">
                                        <input class="form-control projek" name="aktiviti" aria-required="true" type="text" value="{{$tarikhmula}}" required placeholder="Negeri" minlength="5" maxlength="5" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row control-label">
                                <label class="col-md-3 m-t-15">Tarikh Akhir<span style="color:red;">*</span> </label>
                                <div class="col-md-9">
                                    <div class="laporaneiaVal">
                                        <input class="form-control projek" name="aktiviti" aria-required="true" type="text" value="{{$tarikhakhir}}" required placeholder="Negeri" minlength="5" maxlength="5" readonly>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered m-b-10" id="tabletidakPakej">
                                    <thead>
                                    <tr>
                                        <th class="fit">Bil.</th>
                                        <th width="60%">Maklumat Pakej</th>
                                        <th class="bold">Tindakan</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div style="display: none;" id="pakej_content">
                             <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered m-b-10" id="tablePakej">
                                    <thead>
                                    <tr>
                                        <th>Nama Pakej</th>
                                        <th>Nama Kontraktor</th>
                                        <th class="bold">Negeri</th>
                                        <th>Alamat</th>
                                        <th class="bold">Tarikh Mula</th>
                                        <th class="bold">Tarikh Tamat</th>
                                        <th class="bold">Tindakan</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div style="display: none;" id="fasa_content">
                        <hr>

                            <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Bilangan Fasa</label>
                                <div class="col-md-9">
                                    <input class="form-control projek" type="text" name="bilangan_fasa" id="bilangan_fasa" value="{{$countFasa}}" readonly>
                                </div>
                                <!-- <div class="col-md-2" style="margin-top: 3px">
                                   <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addFasa" type="button"><span>Simpan</span></button>
                               </div> -->
                           </div>

                            <div class="table-responsive">
                                <table class="table table-bordered m-b-10" id="tableFasa">
                                    <thead>
                                    <tr>
                                        <th class="fit">Bil.</th>
                                        <th>Maklumat Fasa</th>
                                        <!-- <th class="bold">Tindakan</th> -->
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row p-b-10">
                <div class="col-md-12">
                    <ul class="pager wizard no-style">
                        <li class="next">
                            <button class="btn btn-success btn-cons from-left pull-right" type="button">
                                <span>Seterusnya</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            if($('#jenis_2').prop("checked") == true) {
                document.getElementById('pakej_content').style.display = 'block';
            } else document.getElementById('pakej_content').style.display = 'none';

            if($('#jenis_3').prop("checked") == true) {
                document.getElementById('fasa_content').style.display = 'block';
            } else document.getElementById('fasa_content').style.display = 'none';
        });
        function PakejyesnoCheck() {
            if (document.getElementById('jenis_2').checked) {
                document.getElementById('pakej_content').style.display = 'block';
            }
            else document.getElementById('pakej_content').style.display = 'none';

            if (document.getElementById('jenis_3').checked) {
                document.getElementById('fasa_content').style.display = 'block';
            }
            else document.getElementById('fasa_content').style.display = 'none';
        }

            var table = $('#tablePakej');

            var settings = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "searchable": false,
                "ajax": "{{ fullUrl() }}",
                "columns": [
                    { data: "nama_pakej", name: "nama_pakej", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},

                    { data: "kontraktor", name: "kontraktor", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "negeri", name: "negeri", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "alamat", name: "alamat", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "tarikh_mula", name: "tarikh_mula", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "tarikh_akhir", name: "tarikh_akhir", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "action", name: "action", orderable: false, searchable: false},
                ],
                "columnDefs": [
                    { className: "nowrap", "targets": [ 5 ] }
                ],
                "sDom": "B<t><'row'<p i>>",
                "buttons": [
        	{
				text: '<i class="fa fa-print text-info"></i>',
				extend: 'print',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-excel text-success"></i>',
				extend: 'excelHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-pdf text-danger"></i>',
				extend: 'pdfHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
                ],
                "destroy": true,
                "scrollCollapse": true,
                "oLanguage": {
                    "sEmptyTable":      "Tiada data",
                    "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
                    "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
                    "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
                    "sInfoPostFix":     "",
                    "sInfoThousands":   ",",
                    "sLengthMenu":      "Papar _MENU_ rekod",
                    "sLoadingRecords":  "Diproses...",
                    "sProcessing":      "Sedang diproses...",
                    "sSearch":          "Carian:",
                    "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
                    "oPaginate": {
                        "sFirst":        "Pertama",
                        "sPrevious":     "Sebelum",
                        "sNext":         "Seterusnya",
                        "sLast":         "Akhir"
                    },
                    "oAria": {
                        "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
                        "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
                    }
                },
                "iDisplayLength": 10
            };

            table.dataTable(settings);


            var tableFasa = $('#tableFasa');

            var settingsFasa = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "searchable": false,
                "ajax": "{{ route('getFasa', $Projek->id) }}",
                "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "nama_fasa", name: "nama_fasa", defaultContent: "-", "searchable": false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                // { data: "action", name: "action", orderable: false, searchable: false},
                ],
                "columnDefs": [
                    { className: "nowrap", "targets": [ 1 ] }
                ],
                "sDom": "B<t><'row'<p i>>",
                "buttons": [
        	{
				text: '<i class="fa fa-print text-info"></i>',
				extend: 'print',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-excel text-success"></i>',
				extend: 'excelHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-pdf text-danger"></i>',
				extend: 'pdfHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
                ],
                "destroy": true,
                "scrollCollapse": true,
                "oLanguage": {
                    "sEmptyTable":      "Tiada data",
                    "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
                    "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
                    "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
                    "sInfoPostFix":     "",
                    "sInfoThousands":   ",",
                    "sLengthMenu":      "Papar _MENU_ rekod",
                    "sLoadingRecords":  "Diproses...",
                    "sProcessing":      "Sedang diproses...",
                    "sSearch":          "Carian:",
                    "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
                    "oPaginate": {
                        "sFirst":        "Pertama",
                        "sPrevious":     "Sebelum",
                        "sNext":         "Seterusnya",
                        "sLast":         "Akhir"
                    },
                    "oAria": {
                        "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
                        "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
                    }
                },
                "iDisplayLength": 10
            };

            tableFasa.dataTable(settingsFasa);

        $('#aktiviti').on('change', function() {
            var val = this.value;
            if(val==22){
                $('#other_aktiviti').show();
            }else{
                $('#other_aktiviti').hide();
            }
        });

        function pengawasan(id) {
            // $("#modal-div").load("../../../external/projek/pakej_pengawasan/"+id);
            $("#modal-div").load("{{ url('/projek/pakej_pengawasan/') }}/"+id);
          
        }

        if ($("#aktiviti option:selected").val() == 22) {
            $('#other_aktiviti').show();
        }else{
            $('#other_aktiviti').hide();
        }

$.fn.dataTable.ext.errMode = 'throw';
var tabletidakPakej = $('#tabletidakPakej');

            var settingstidakPakej = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "searchable": false,
                "ajax": "{{ route('getTidakPakej', $Projek->id) }}",
                "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "nama_fasa", name: "nama_fasa", defaultContent: "-", "searchable": false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
                ],
                "columnDefs": [
                    { className: "nowrap", "targets": [ 2 ] }
                ],
                "sDom": "B<t><'row'<p i>>",
                "buttons": [
        	{
				text: '<i class="fa fa-print text-info"></i>',
				extend: 'print',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-excel text-success"></i>',
				extend: 'excelHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-pdf text-danger"></i>',
				extend: 'pdfHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
                ],
                "destroy": true,
                "scrollCollapse": true,
                "oLanguage": {
                    "sEmptyTable":      "Tiada data",
                    "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
                    "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
                    "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
                    "sInfoPostFix":     "",
                    "sInfoThousands":   ",",
                    "sLengthMenu":      "Papar _MENU_ rekod",
                    "sLoadingRecords":  "Diproses...",
                    "sProcessing":      "Sedang diproses...",
                    "sSearch":          "Carian:",
                    "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
                    "oPaginate": {
                        "sFirst":        "Pertama",
                        "sPrevious":     "Sebelum",
                        "sNext":         "Seterusnya",
                        "sLast":         "Akhir"
                    },
                    "oAria": {
                        "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
                        "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
                    }
                },
                "iDisplayLength": 10
            };

            tabletidakPakej.dataTable(settingstidakPakej);
    </script>
@endpush
