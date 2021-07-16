<style>
    label {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
    }

    .hidden-xs {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;

    }

    .btn {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        s
    }

    .dashTitle {
        font-family: 'Montserrat' !important;
        font-size: 12.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;

    }

    th {
        background-color: #ebe8ec;
        color: #000 !important;
        //border-top: none;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
        //border-left: none !important;
        padding: 4px;
    }

    td {
        //background-color: #ebe8ec;
        color: #000 !important;
        //border-top: none !important;
        //border-bottom: none !important;
        //border-top: 1px solid #E7E7E7;
        //border-left: 1px solid #E7E7E7;
        //border-bottom: none !important;
        //border-left: none !important;
        //border-right: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        //font-weight: 500 !important;
        padding: 4px;
        text-align: center !important;
    }
    .modal-lg1 {
            max-width: 50% !important;
            width: 50% !important;
            margin: 0 auto !important; 
        }
        
</style>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="dashTitle"><b>Maklumat Pendaftaran Projek</b>.</div>
                <br>
                <div class="form-group-attached m-b-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">No.Fail JAS</b></span><span style="color:red;">*</span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{$Projek->no_fail_jas}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Nama Penggerak Projek</b></span><span
                                        style="color:red;">*</span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{$Projek->user->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Nama Projek</b></span> <span style="color:red;">*</span>
                                </label>

                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{ $Projek->nama_projek }}">
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Syarikat Penggerak Projek</b></span> <span
                                        style="color:red;">*</span>
                                </label>

                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{$Projek->jasfail->jasdetail->nama_penggerak}}">
                            </div>

                        </div>

                    </div>
                    <div class="row">

                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Lokasi Projek</b></span><span style="color:red;">*</span>
                            </label>
                            <input class="form-control form-control-lg" type="text" placeholder="" value="{{$ProjekDetail->lokasi}}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Lokasi Projek 2</b></span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{$ProjekDetail->lokasi1}}">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Lokasi Projek 3</b></span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{$ProjekDetail->lokasi2}}">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{$ProjekDetail->poskod}}">
                            </div>



                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{strtoupper(optional($ProjekDetail->state)->name)}}">
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Daerah</b></span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{optional($jasdetail)->daerah}}">
                            </div>

                        </div>
                    </div>
                
                </div>
                <br>
                <div class="dashTitle"><b>Alamat Surat Menyurat</b>.</div>
                <br>
                <div class="form-group-attached m-b-10">
                    <div class="row">

                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Alamat</b></span><span style="color:red;">*</span>
                            </label>
                            <input class="form-control form-control-lg" type="text" placeholder="" value="{{$ProjekDetail->alamat_surat}}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Alamat 2</b></span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{$ProjekDetail->alamat_surat1}}">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Alamat 3</b></span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{$ProjekDetail->alamat_surat2}}">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="" value="{{$ProjekDetail->surat_poskod}}">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <label class="col-md-3 control-label">Negeri<span style="color:red;">*</span> </label>
                            <div style="z-index: 0 !important">
                                <div class="jenisN">
                                    <select id="surat_negeri" name="surat_negeri" class="form-control autoscroll state projek1" data-init-plugin="select2" required>
                                        <option value="" selected="" disabled="">Pilih Negeri</option>
                                        @foreach($states as $index => $state)
                                        <option value="{{ $state->id }}">{{ strtoupper($state->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group form-group-default">
                                <label class="col-md-3 control-label">Daerah<span style="color:red;">*</span> </label>
                            <div style="z-index: 0 !important">
                                <select id="surat_daerah" name="surat_daerah" class="form-control autoscroll district projek1" data-init-plugin="select2" required>
                                </select>
                            </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span><b class="text-dark">Tarikh Awal</b></span>
                                        <i class="fa fa-calendar"></i> </label>
                                    <input id="" class="form-control datepicker " name="" placeholder="" required="" type="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span><b class="text-dark">Tarikh Akhir</b></span>
                                        <i class="fa fa-calendar"></i></label>
                                    <input id="" class="form-control datepicker " name="" placeholder="" required="" type="" value="">
                                </div>
                            </div>
                        </div>
                        
                
                    </div>
                </div>
               
            </div>
            <div class="col-md-6">
                <div class="dashTitle"><b>Ahli Projek</b></div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="" id="table" role="grid" aria-describedby="table_info"  style="padding:10px; width:100%">
                            <!--
                            <table class="table-dashboard" id="" style="width:100%">
                            -->
                                <thead>
                                    <tr>
                                        <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Peranan</th>
                                        <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Nama</th>
                                        <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Status</th>
                                        <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Fasa</th>
                                        <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Pengawasan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td rowspan="5">Pengawai EO</td>
                                        
                                        <td>Roziah</td>
                                        <td><span class="label label-lg label-light-danger label-inline">Tidak Aktif</span></td>
                                        <td>2</td>
                                        <td>-</td>
                
                                    </tr>
                                    <tr>
                                        
                                        <td>Halimah</td>
                                        <td><span class="label label-lg label-light-danger label-inline">Tidak Aktif</span></td>
                                        <td>2</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Zainab</td>
                                        <td><span class="label label-lg label-light-danger label-inline">Tidak Aktif</span></td>
                                        <td>2</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Zairul</td>
                                        <td><span class="label label-lg label-light-danger label-inline">Tidak Aktif</span></td>
                                        <td>2</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Haryati</td>
                                        <td><span class="label label-lg label-light-blue label-inline">Aktif</span></td>
                                        <td>2</td>
                                        <td>-</td>
                                    </tr>
                                    
                                    <tr>
                                        <td rowspan="4">Pengawai EMC</td>
                                        <td>Anas</td>
                                        <td><span class="label label-lg label-light-blue label-inline">Aktif</span></td>
                                        
                                        <td>2</td>
                                        <td>MARIN</td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Bukhari</td>
                                        <td><span class="label label-lg label-light-warning label-inline">Penukaran EMC</span></td>
                                        <td>1</td>
                                        <td>SUNGAI</td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Raziq</td>
                                        <td><span class="label label-lg label-light-blue label-inline">Aktif</span></td>
                                        <td>2</td>
                                        <td>DRON</td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Danial</td>
                                        <td><span class="label label-lg label-light-blue label-inline">Aktif</span></td>
                                        <td>1</td>
                                        <td>TASIK</td>
                                    </tr>
                                   
                                    
                                   
                                    
                                    
                
                                    
                
                                    
                                </tbody>
                        </table>
                        <br>
                        <div class="form-group-attached m-b-10">
                            <div class="row">
                                <div class="col-md-12 laporaneiaVal">

                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Laporan Pematuhan EIA</b></span>
                                        </label>
                                        
                                            <select id="laporaneia" name="laporaneia" class="form-control full-width autoscroll projek required" data-init-plugin="select2" required>
                                                <option disabled hidden selected="" value="">Sila Pilih</option>
                                                @foreach($pematuhaneia as $index => $pematuhan)
                                                @if($ProjekDetail->laporaneia == $pematuhan->id)
                                                <option value="{{$pematuhan->id}}" name="laporaneia" required selected="">{{ $pematuhan->name }}</option>
                                                @else
                                                <option value="{{$pematuhan->id}}" name="laporaneia" required>{{ $pematuhan->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                       
                                        <input class="form-control form-control-lg" type="text" placeholder="">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group row control-label">
                            <label class="col-md-3">Jenis Projek<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                <div class="jenisprojekVal">
                                    <div class="radio radio-primary">
                                        @foreach($jenisProjek as $index => $jenis)
                                        <input name="jenis_projek" value="{{$jenis->id}}" id="jenis_{{$jenis->id}}" type="radio" class="projek1" aria-required="true" onclick="PakejyesnoCheck();" onchange="PakejyesnoCheck();" {{$ProjekDetail->jenis_projek == $jenis->id ? "checked" : ""}}>
                                        <label for="jenis_{{$jenis->id}}">{{$jenis->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <span><b class="text-dark">JENIS PENGAWASAN</b></span>
                                </label>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="checkbox check-primary">
                                        <input type="checkbox" value="1" id="sungai">
                                        <label for="sungai">SUNGAI</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="checkbox check-primary">
                                        <input type="checkbox" value="2" id="marin">
                                        <label for="marin">MARIN</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="checkbox check-primary">
                                        <input type="checkbox" value="3" id="air">
                                        <label for="air">AIR TANAH</label>
                                    </div>
                                </div>
                            </div>
                             
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="checkbox check-primary">
                                        <input type="checkbox" value="4" id="dron">
                                        <label for="dron">DRON</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="checkbox check-primary">
                                        <input type="checkbox" value="5" id="kolam">
                                        <label for="kolam">KOLAM</label>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="checkbox check-primary">
                                        <input type="checkbox" value="6" id="getaran">
                                        <label for="getaran">GETARAN</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="checkbox check-primary">
                                        <input type="checkbox" value="7" id="udara">
                                        <label for="udara">UDARA</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="checkbox check-primary">
                                        <input type="checkbox" value="8" id="bunyi">
                                        <label for="bunyi">BUNYI BISING</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="dt-button buttons-html5 btn btn-default btn-sm pull-right"
                                data-toggle="modal" data-target=".bd-example-modal-lg2"><span> <i
                                        class="fa fa-plus"></i>
                                    FASA</span></button>
                                    <div class="form-group row control-label col-md-12">
                               <!--  <button type="button" onclick="addPakej()" class="btn btn-info btn-cons"><i class="fa fa-plus m-r-5"></i>Pendaftaran Pakej</button> -->
                                <span class="text-danger disclaimerPakej"></span>
                            </div>


                            <!-- START MODAL PAKEJ -->
                            <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg2">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalTitle"><span class="bold">Maklumat Pakej / Fasa</span></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body m-t-20">
                                            <form id='pakej' role="form" method="post" action="{{ route('pakej') }}">
                                                @include('components.input', [
                                                'label' => 'Nama Pakej',
                                                'info' => 'eg: Pakej A',
                                                'name' => 'nama_pakej',
                                                'mode' => 'required',
                                                ])

                                                        @include('components.input', [
                                                'label' => 'Nama Kontraktor',
                                                'info' => 'eg: Ali bin Abu',
                                                'name' => 'kontraktor',
                                                'mode' => 'required',
                                                ])

                                                <div id="selectnegeri" class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                                    <label class="col-md-3">Negeri<span style="color:red;">*</span> </label>
                                                    <select id="pakej_negeri" name="pakej_negeri" data-placeholder="" class="full-width autoscroll select2-hidden-accessible form-control" data-init-plugin="select2" tabindex="-1" aria-hidden="true" required="">
                                                     <option value="" selected="" disabled="">Pilih Negeri</option>
                                                     @foreach($states as $index => $state)
                                                     <option value="{{ $state->id }}">{{ strtoupper($state->name) }}</option>
                                                     @endforeach
                                                    </select>
                                                    <label id="selectnegerierror" class="error" style="display: none;">Input negeri wajib diisi.</label>
                                                </div>
                                                <!-- @include('components.select', [
                                                'name' => 'negeri',
                                                'label' => 'Negeri',
                                                'data' => [
                                                'Johor' => 'Johor',
                                                'Kedah' => 'Kedah',
                                                'Kelantan' => 'Kelantan',
                                                'Melaka' => 'Melaka',
                                                'Negeri Sembilan' => 'Negeri Sembilan'
                                                ],
                                                ]) -->
                                                <div class="form-group form-group-default required">
                                                    <label>
                                                        <span id="label_alamat">Alamat</span>
                                                        <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Alamat"></i>        
                                                    </label>
                                                    <input id="alamat" class="form-control " name="alamat" placeholder="Alamat baris 1" onkeypress="" required="" type="text" maxlength="100" value="">

                                                </div>

                                                <div class="form-group form-group-default">
                                                    <input id="alamat1" class="form-control " name="alamat1" placeholder="Alamat baris 2" onkeypress="" maxlength="100" type="text" value="">

                                                </div>

                                                <div class="form-group form-group-default">
                                                    <input id="alamat2" class="form-control " name="alamat2" placeholder="Alamat baris 3" onkeypress="" maxlength="100" type="text" value="">
                                                </div>

                                                <!-- @include('components.input', [
                                                  'label' => 'Alamat',
                                                  'info' => 'Alamat',
                                                  'name' => 'alamat',
                                                  'mode' => 'required',
                                                  ])

                                                  @include('components.input', [
                                                  'label' => 'Alamat',
                                                  'info' => 'Alamat',
                                                  'name' => 'alamat1',
                                                  'mode' => 'required',
                                                  ])

                                                  @include('components.input', [
                                                  'label' => 'Alamat',
                                                  'info' => 'Alamat',
                                                  'name' => 'alamat1',
                                                  'mode' => 'required',
                                                  ]) -->

                                                        <!-- @include('components.date', [
                                                'label' => 'Tarikh Mula',
                                                'info' => 'Tarikh Mula',
                                                'name' => 'tarikh_mula',
                                                'mode' => 'required',
                                                ]) -->

                                                <div id="tarikh_mulaer" class="form-group form-group-default input-group required" aria-required="true">
                                                    <div class="form-input-group">
                                                        <label class="">
                                                            <span id="label_tarikh_mula">Tarikh Mula</span>
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Tarikh Mula"></i>       
                                                        </label>
                                                        <input id="tarikh_mula" class="form-control" name="tarikh_mula" onchange="testt2()" placeholder="" type="date" value="">
                                                    </div>
                                                    <!-- <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div> -->
                                                </div>

                                                <!-- @include('components.date', [
                                                  'label' => 'Tarikh Tamat',
                                                  'info' => 'Tarikh Tamat',
                                                  'name' => 'tarikh_akhir',
                                                  'mode' => 'required',
                                                  ]) -->
                                                <div id="tarikh_akhirer" class="form-group form-group-default input-group required" aria-required="true">
                                                    <div class="form-input-group">
                                                        <label>
                                                            <span id="label_tarikh_akhir">Tarikh Tamat</span>
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Tarikh Tamat"></i>      </label>
                                                        <input id="tarikh_akhir" class="form-control" name="tarikh_akhir" onchange="testt2()" placeholder="" type="date" value="">
                                                        <!-- <input id="tarikh_akhir" class="form-control datepicker" name="tarikh_akhir" onchange="testt2()" placeholder="" type="text" value=""> -->
                                                    </div>
                                                    <!-- <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div> -->
                                                </div>
                                                <label id="tarikh_mulaerror" class="error" style="display: none;">Input tarikh mula tidak boleh lebih dari tarikh akhir.</label>
                                            </form>
                                            
                                            <button class="btn btn-info btn-cons from-left pull-right" onclick="submitForm('pakej')" type="button">
                                                <span>Simpan</span>
                                            </button>
                                            <button class="btn btn-danger btn-cons from-left pull-right daftar_ldp2m2" onclick="$('.dropify-clear').click();" data-dismiss="modal" type="button">
                                                <span>Tutup</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END MODAL PAKEJ -->

                            <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg1">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalTitle"> Tambah Fasa</h5>
                                            <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    <form id='pakej' role="form" method="post" action="{{ route('pakej') }}">
                                        <div class="modal-body m-t-20">
                                            <div class="form-group-attached m-b-12">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                           
                                                           @include('components.input', [
                                                                'label' => 'Nama Fasa',
                                                                'name' => 'nama_pakej',
                                                                'mode' => 'required',
                                                                ])
                                                    
                                                        </div>
                                                        <div class="col-md-6">
                                                            @include('components.input', [
                                                                'label' => 'Nama Kontraktor',
                                                                'name' => 'kontraktor',
                                                                'mode' => 'required',
                                                                ])
                                                        </div>
                                                      </div>

                                            </div>
                                            <br>
                                            
                                                <div class="form-group-attached m-b-12">


                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <div class="form-input-group">
                                                                    <label>
                                                                        <span id="label_tarikh_mula">Tarikh Mula</span>
                                                                        <i class="fa fa-calendar"></i> </label>
                                                                    <input id="tarikh_mula" class="form-control datepicker "
                                                                        name="tarikh_mula" onchange="testt2()" placeholder="" required="" type=""
                                                                        value="">
                                                                </div>
                                                            </div>
                                                         
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <div class="form-input-group">
                                                                    <label>
                                                                        <span id="label_">Tarikh AKhir</span>
                                                                        <i class="fa fa-calendar"></i></label>
                                                                  <input id="tarikh_akhir" class="form-control datepicker" name="tarikh_akhir" onchange="testt2()" placeholder="" type="" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                             <div id="selectnegeri" class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                                                <label class="col-md-3">Negeri<span style="color:red;">*</span> </label>
                                                                <select id="pakej_negeri" name="pakej_negeri" data-placeholder="" class="full-width autoscroll select2-hidden-accessible form-control" data-init-plugin="select2" tabindex="-1" aria-hidden="true" required="">
                                                                 <option value="" selected="" disabled="">Pilih Negeri</option>
                                                                 @foreach($states as $index => $state)
                                                                 <option value="{{ $state->id }}">{{ strtoupper($state->name) }}</option>
                                                                 @endforeach
                                                                </select>
                                                                <label id="selectnegerierror" class="error" style="display: none;">Input negeri wajib diisi.</label>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                </div>

                                                <div class="form-group-attached m-b-10">
                    
                    
                    



                                                    <div class="row">
                                
                                                        <div class="form-group form-group-default">
                                                            <label>
                                                                <span><b class="text-dark">Alamat 1</b></span><span style="color:red;">*</span>
                                                            </label>
                                                             <input id="alamat" class="form-control " name="alamat" placeholder="Alamat baris 1" onkeypress="" required="" type="text" maxlength="100" value="">
                                                        </div>
                                
                                                    </div>
                                
                                                    <div class="row">
                                                        <div class="col-md-12">
                                
                                                            <div class="form-group form-group-default">
                                                                <label>
                                                                    <span><b class="text-dark">Alamat 2</b></span>
                                                                </label>
                                                                 <input id="alamat1" class="form-control " name="alamat1" placeholder="Alamat baris 2" onkeypress="" maxlength="100" type="text" value="">
                                                            </div>
                                
                                                        </div>
                                                    </div>
                                
                                                    <div class="row">
                                                        <div class="col-md-12">
                                
                                                            <div class="form-group form-group-default">
                                                                <label>
                                                                    <span><b class="text-dark">Alamat 3</b></span>
                                                                </label>
                                                                 <input id="alamat2" class="form-control " name="alamat2" placeholder="Alamat baris 3" onkeypress="" maxlength="100" type="text" value="">
                                                            </div>
                                
                                                        </div>
                                                    </div>
                                
                                                    
                                
                                                </div>
                                                <br>
                                                <label style="font-size:13px; font-family: 'Montserrat'">Jadual
                                                    Perlaksanaan
                                                    Projek</label>
                                                <div class="input-group file-caption-main">
                                                    <div class="file-caption form-control  kv-fileinput-caption icon-visible"
                                                        tabindex="500">
                                                        <span class="file-caption-icon"><i
                                                                class="fa fa-file kv-caption-icon"></i> </span>

                                                    </div>
                                                    <div class="input-group-btn input-group-append">

                                                        <div tabindex="500" class="btn btn-primary btn-file"><i
                                                                class="fa fa-folder-open"></i> <span
                                                                class="hidden-xs">Muat Naik</span><input
                                                                id="input-ke-salinan" name="input-ke-salinan[]"
                                                                type="file" multiple=""></div>
                                                    </div>
                                                </div>
                                                <br>
                                                <label style="font-size:13px; font-family: 'Montserrat'">Sertakan gambar
                                                    foto yang menunjukkan status projek</label>
                                                <div class="input-group file-caption-main">
                                                    <div class="file-caption form-control  kv-fileinput-caption icon-visible"
                                                        tabindex="500">
                                                        <span class="file-caption-icon"><i
                                                                class="fa fa-file kv-caption-icon"></i> </span>

                                                    </div>
                                                    <div class="input-group-btn input-group-append">

                                                        <div tabindex="500" class="btn btn-primary btn-file"><i
                                                                class="fa fa-folder-open"></i> <span
                                                </div>
                                                <div class="tab-pane disable" id="tab2pe">
                                                    @include('form.penukaran')
                                                </div>
                                                
                                                
                            
                                            </div>
                                        </div>
                                    </form>
                                        <div class="modal-footer">
                                            
                                            <!-- <button type="button" class="btn btn-info" onclick="submitForm('form-decision')"><i class="fa fa-check m-r-5"></i> Submit</button> -->
                                            <button type="button" class="btn btn-success"
                                                id="" onclick=""></i>Hantar</button>

                                        </div>
                                    </div>
                                        
                        </div>
                                    
                                  
                        <div>

                        </div>
                    
                    </div>
                    <br>
                            <div class="col-md-12">
                                <div class="alert alert-primary" role="alert"
                                    style="background-color: #563D7C;color:white ;font-size:11.5px; font-family: 'Montserrat'">
                                    <strong>
    
                                        FASA
                                    </strong>
    
                                </div>
                                <br>
                                
                              <table class="table table-hover table-responsive dataTable no-footer display nowrap"
                                id="table" role="grid" aria-describedby="table_info" >
                                <thead>
                                    <tr role="row">
                                        <th bgcolor="#f0f0f0" class="fit align-top text-left"
                                            style="width: 5px; color:#000">No.
                                        </th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000"> Nama
                                        </th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">Tarikh Mula
                                        </th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">Tarikh
                                            Akhir</th>
                                        
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 10px; color:#000">Dokumen</th>
                                        
                                            <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">
                                            Tindakan</th>

                                        <!-- <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php if($ProjekPakej == null){
                                            $kontraktor = '';
                                            $negeri = 0;
                                            $alamat = '';
                                            $alamat1 = '';
                                            $alamat2 = '';
                                            $tarikh_mula = '';
                                            $tarikh_akhir = '';
                                        } else {
                                            $kontraktor = $ProjekPakej->kontraktor;
                                            $negeri = $ProjekPakej->pakej_negeri;
                                            $alamat = $ProjekPakej->alamat;
                                            $alamat1 = $ProjekPakej->alamat1;
                                            $alamat2 = $ProjekPakej->alamat2;
                                            $tarikh_mula = $ProjekPakej->tarikh_mula;
                                            $tarikh_akhir = $ProjekPakej->tarikh_akhir;
                                        }
                                        //dd($negeri);
                                        ?>
                                        <!-- <td>1</td>
                                        <td>Fasa 1</td>
                                        <td>93621285</td>
                                        <td>93621285</td>
                                        
                                       
                                        <td><span style="text-align:center;font-size:12px padding-bottom:5px"" class="
                                                label label-lg label-light-blue label-inline">muat turun</span></td>
                                       <td>
                                                    <a data-toggle="tooltip" title="" class="btn btn-default btn-xs" style="" type="button" onclick=""><span style="color:#fff"> <i class="fas fa-edit text-warning"></i></span>
                                                    </a>
                                                    <a data-toggle="tooltip" title="" class="btn btn-default btn-xs" style="" type="button" onclick=""><span style="color:#fff"> <i class="far fa-save text-success"></i></span>
                                                    </a>
                                                </td> -->


                                    </tr>
                                </tbody>
                              </table>

                            </div>
                            <div class="col-md-12 p-t-20">
                                <ul class="pager wizard no-style">
                                    <li class="submit">
                                        <button onclick="submitForm('form-add')"
                                            class="btn btn-info btn-cons from-left pull-right" id="simpan" type="button">
                                            <span>Simpan</span>
                                        </button>
                                        <button onclick="submitForm('form-add')"
                                            class="btn btn-success btn-cons from-left pull-right " id="simpan" type="button">
                                            <span>Hantar</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</div>
@push('js')

    <script type="text/javascript">

        // $("#tarikh_akhir").datepicker({
        //     dateFormat: "dd-mm-yy"
        //     ,minDate: 0
        // }).change(function() {
        //     console.log('deetct');
        //     var date1 = $('#tarikh_mula').datepicker('getDate');
        //     var date2 = $('#tarikh_akhir').datepicker('getDate');

        //     // date mula
        //     var givenDate = new Date(date1);

        //     var dd1 = givenDate.getDate();

        //     var mm1 = givenDate.getMonth()+1; 
        //     var yyyy1 = givenDate.getFullYear();
        //     if(dd1<10) 
        //     {
        //         dd1='0'+dd1;
        //     } 

        //     if(mm1<10) 
        //     {
        //         mm1='0'+mm1;
        //     } 

        //     dates = yyyy1+ '-'+ mm1 + '-' + dd1;

        //     // date akhir
        //     var givenDate2 = new Date(date2);

        //     var dd2 = givenDate2.getDate();

        //     var mm2 = givenDate2.getMonth()+1; 
        //     var yyyy2 = givenDate2.getFullYear();
        //     if(dd2<10) 
        //     {
        //         dd2='0'+dd2;
        //     } 

        //     if(mm2<10) 
        //     {
        //         mm2='0'+mm2;
        //     } 

        //     dates2 = yyyy2+ '-'+ mm2 + '-' + dd2;

        //     g1 = new Date(dates);
        //     g2 = new Date(dates2);
        //     if(g2.getTime() >= g1.getTime()){
        //         $('#datecheckerror').show();
        //         var sijilkom = document.getElementById("tarikh_mulaer");
        //         sijilkom.classList.add("has-error");
        //     }else{
        //         $('#datecheckerror').hide();
        //         var sijilkom = document.getElementById("tarikh_akhirer");
        //         sijilkom.classList.remove("has-error");
        //     }
        // });

        $("select, input").on('focus', function() {
            // var form = $("#form-add");

            // $('.error').hide();
            // MAKMAL start
            // var kodmakmal = $('#kodmakmal').val();
            // var labname = $('#labname').val();
            // var lab_tel1 = $('#lab_tel1').val();
            // var location = $('#location').val();
            // var Pengawasan = $('#Pengawasan').val();

            // if (Pengawasan) {
            //     var elementp = document.getElementById("pengawasan");
            //     elementp.classList.remove("has-error");
            // }

            // if (kodmakmal && kodmakmal.length == 0) {
            //     document.getElementById("kodmakmal").style.display = 'block';
            //     document.getElementById("kodmakmal-error").style.display = 'block';
            // }

            // if (labname && labname.length == 0) {
            //     document.getElementById("labname").style.display = 'block';
            //     document.getElementById("labname-error").style.display = 'block';
            // }
            // if (lab_tel1 && lab_tel1.length == 0) {
            //     document.getElementById("lab_tel1").style.display = 'block';
            //     document.getElementById("lab_tel1-error").style.display = 'block';
            // }
            // if (location && location.length == 0) {
            //     document.getElementById("location").style.display = 'block';
            //     document.getElementById("location-error").style.display = 'block';
            // }
            // Makmal end

            // var emel = $('#email').val();
            // var n = emel.includes("doe.gov");

            // if (emel.length > 0) {
            //     var element = document.getElementById("div-mel");
            //     $('#emelerror').hide();
            //     $('#melerror').hide();
            //     element.classList.remove("has-error");
            //     if (n == true) {
            //         $('#emelerror').show();
            //         element.classList.add("has-error");
            //         return false;
            //     } else {
            //         $('#emelerror').hide();
            //         element.classList.remove("has-error");
            //     }

            //     if (/^[a-zA-Z0-9._-+]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(emel))
            //     {
            //         return true;
            //     } else {
            //         $('#melerror').show();
            //         element.classList.add("has-error");
            //         return false;
            //     }
                
            // }



            // var username = $('#username').val();
            // var phone = $('#no_tel').val();
            // var faks = $('#faks').val();
            var poskod = $('#surat_poskod').val();

            // var element1 = document.getElementById("nofaks");
            // $('#nofakserror').hide();
            // element1.classList.remove("has-error");
            // if (faks.length > 0) {
            //     if (faks.length < 10) {
            //         $('#nofakserror').show();
            //         element1.classList.add("has-error");
            //         return false;
            //     }
            // }

            var elementposkod = document.getElementById("posk");
            $('#poskerror').hide();
            elementposkod.classList.remove("has-error");
            if (poskod.length > 0) {
                if (poskod.length < 5) {
                    $('#poskerror').show();
                    elementposkod.classList.add("has-error");
                    return false;
                }
            }

            // var element2 = document.getElementById("kp");
            // $('#kperror').hide();
            // element2.classList.remove("has-error");
            // if (username.length > 0) {
            //     if (username.length < 10) {
            //         $('#kperror').show();
            //         element2.classList.add("has-error");
            //         return false;
            //     }
            // }

            // var element3 = document.getElementById("no_tel");
            // $('#telefonerror').hide();
            // element3.classList.remove("has-error");
            // if (phone.length > 0) {
            //     if (phone.length < 10) {
            //         $('#telefonerror').show();
            //         element3.classList.add("has-error");
            //         return false;
            //     }
            // }

            // var element3 = document.getElementById("lab_tel1");
            // $('#lab_telerror').hide();
            // element3.classList.remove("has-error");
            // if (phone.length > 0) {
            //     if (phone.length < 10) {
            //         $('#lab_telerror').show();
            //         element3.classList.add("has-error");
            //         return false;
            //     }
            // }



        });

        function groupaktiviti(id){
            data = $('#groupaktivitidata').val();
            if(data == 0){
                // console.log('id');
                data = [];
            } else {
                // console.log('id1');
                data = [data];
            }
            // console.log(id);
            // console.log(data);
            data.push(id);
            document.getElementById("groupaktivitidata").value = data;
        }

        function testt(){
            console.log('testing');
            tarikh_mula = $('#tarikh_mula').val();
            tarikh_akhir = $('#tarikh_akhir').val();
            if(tarikh_mula >= tarikh_akhir){
                $('#datecheckerror').show();
                var sijilkom = document.getElementById("tarikh_mulaer");
                sijilkom.classList.add("has-error");
            }else{
                $('#datecheckerror').hide();
                var sijilkom = document.getElementById("tarikh_akhirer");
                sijilkom.classList.remove("has-error");
            }
        }

        function testt2(){
            console.log('testing');
            // tarikh_mula = $('#tarikh_mula').val();
            // tarikh_akhir = $('#tarikh_akhir').val();
            // console.log(tarikh_mula);
            // if(tarikh_mula >= tarikh_akhir){
            //     $('#datecheckerror').show();
            //     var sijilkom = document.getElementById("datekom1");
            //     sijilkom.classList.add("has-error");
            // }else{
            //     $('#datecheckerror').hide();
            //     var sijilkom = document.getElementById("datekom1");
            //     sijilkom.classList.remove("has-error");
            // }
            var form = $('#pakej');
            var data = new FormData(form[0]);
            var mula = new Date(data.get("tarikh_mula"));

            var akhir = new Date(data.get("tarikh_akhir"));

            console.log(mula);
            if(akhir && mula){
                if (mula.getTime() >= akhir.getTime()) {
                    var element = document.getElementById("tarikh_mulaer");
                    $('#tarikh_mulaerror').show();
                    element.classList.add("has-error");

                    var element1 = document.getElementById("tarikh_akhirer");
                    element1.classList.add("has-error");
                } else {
                    var element = document.getElementById("tarikh_mulaer");
                    $('#tarikh_mulaerror').hide();
                    element.classList.remove("has-error");

                    var element1 = document.getElementById("tarikh_akhirer");
                    element1.classList.remove("has-error");
                }
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if($('#jenis_2').prop("checked") == true) {
                document.getElementById('pakej_content').style.display = 'block';
            } else document.getElementById('pakej_content').style.display = 'none';

            if($('#jenis_1').prop("checked") == true) {
                document.getElementById('tidakpakej_content').style.display = 'block';
                // $("#modal-add-no-pakej").modal("show");
                $('#modal-add-no-pakej').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else document.getElementById('tidakpakej_content').style.display = 'none';
        });
        function PakejyesnoCheck() {
            if (document.getElementById('jenis_2').checked) {
                document.getElementById('pakej_content').style.display = 'block';
            }
            else document.getElementById('pakej_content').style.display = 'none';

            if (document.getElementById('jenis_1').checked) {
                document.getElementById('tidakpakej_content').style.display = 'block';
            }
            else document.getElementById('tidakpakej_content').style.display = 'none';
        }

        function addPakej() {
            // $("#modal-add-pakej").modal("show");
            $('#modal-add-pakej').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function editfasa(id) {
            $("#modal-div").load("../projek/kemaskinifasa/"+id);
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function removefasa(id) {

            $.ajax({
                url: 'buangFasa/'+id,
                method: 'get',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal(data.title, data.message);
                    tableFasa.api().ajax.reload(null, false);
                }
            });
                // swal({
                //         title: "",
                //         text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
                //         type: "",
                //         showCancelButton: true,
                //         confirmButtonClass: "btn-outline green-meadow",
                //         cancelButtonClass: "btn-danger",
                //         confirmButtonText: "Ya",
                //         cancelButtonText: "Tidak",
                //         closeOnConfirm: true,
                //         closeOnCancel: true,
                //         showLoaderOnConfirm: true
                //     },
                //     function(isConfirm) {
                //         if (isConfirm) {
                            
                //         }
                //     });
            }

        // $(function() {
            $("#pakej").submit(function(e) {
                e.preventDefault();
                var form = $(this);

                if(!form.valid())
                    return;

                var data = new FormData(form[0]);
                var mula = new Date(data.get("tarikh_mula"));
                var akhir = new Date(data.get("tarikh_akhir"));
                if (mula.getTime() > akhir.getTime()) {
                    var element = document.getElementById("tarikh_mulaer");
                    $('#tarikh_mulaerror').show();
                    element.classList.add("has-error");

                    var element1 = document.getElementById("tarikh_akhirer");
                    element1.classList.add("has-error");
                }
                // return false;
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: new FormData(form[0]),
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        state = data.state;
                        states = '';
                        states_ = '';
                        state.forEach(function(item){
                            states = '<option value="'+item.id+'">'+item.name+'</option>';
                            states_ = states_ + states;
                        });
                        // console.log(states_);
                        $('#pakej_negeri').empty().append('<option value="" selected="" disabled="">Pilih Negeri</option>'+states_);
                        $("#modal-add-pakej").modal("hide");
                        swal(data.title, data.message);
                        table.api().ajax.reload(null, false);
                    },
                    error: function(e){
                        console.log(e.responseJSON.errors.pakej_negeri);
                        if (!e.responseJSON.errors.pakej_negeri) {
                            var element = document.getElementById("selectnegeri");
                            $('#selectnegerierror').show();
                            element.classList.add("has-error");
                        }
                    }
                });
                // swal({
                //     title: "",
                //     text: "Adakah anda pasti ?",
                //     type: "",
                //     showCancelButton: true,
                //     confirmButtonClass: "btn-outline green-meadow",
                //     cancelButtonClass: "btn-danger",
                //     confirmButtonText: "Tidak",
                //     cancelButtonText: "Ya",
                //     // closeOnConfirm: true,
                //     // closeOnCancel: false,
                //     showLoaderOnConfirm: true,
                // },
                // function(isConfirm) {
                //     if (isConfirm) {
                //         swal.close()
                //     } else {
                        
                //     }
                // });
            });

            // console.log('{{ fullUrl() }}' + '   haiiiiiiiiiiiiiiiiiiiiiiiiiiii');
            var table = $('#tablePakej');

            var settings = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "searchable": false,
                "ajax": "{{ route('projek.daftar_projek') }}",
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
                    // { data: "alamat", name: "alamat", defaultContent: "-", "searchable": false, render: function(data, type, row){
                    //         return $("<div/>").html(data).text();
                    //     }},
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
            <?php //dd($ProjekDetail->jenis_projek); ?>
        // if($('#jenis_1').prop("checked") == true) {
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

        // }
            // var tableFasa = $('#tableFasa');

   //          var settingsFasa = {
   //              "processing": true,
   //              "serverSide": true,
   //              "deferRender": true,
   //              "searchable": false,
   //              "ajax": "{{ route('getFasa', $Projek->id) }}",
   //              "columns": [
   //              { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
   //                  return meta.row + meta.settings._iDisplayStart + 1;
   //              }},
   //              { data: "nama_fasa", name: "nama_fasa", defaultContent: "-", "searchable": false, render: function(data, type, row){
   //                  return $("<div/>").html(data).text();
   //              }},
   //              { data: "action", name: "action", orderable: false, searchable: false},
   //              ],
   //              "columnDefs": [
   //                  { className: "nowrap", "targets": [ 2 ] }
   //              ],
   //              "sDom": "B<t><'row'<p i>>",
   //              "buttons": [
   //                  {
   //                      text: '<i class="fa fa-print m-r-5"></i> Cetak',
   //                      extend: 'print',
   //                      className: 'btn btn-default btn-sm',
   //                      exportOptions: {
   //                          columns: ':visible:not(.nowrap)'
   //                      }
   //                  },
   //                  {
   //                      text: '<i class="fa fa-download m-r-5"></i> Excel',
   //                      extend: 'excelHtml5',
   //                      className: 'btn btn-default btn-sm',
   //                      exportOptions: {
   //                          columns: ':visible:not(.nowrap)'
   //                      }
   //                  },
   //                  {
   //                      text: '<i class="fa fa-download m-r-5"></i> PDF',
   //                      extend: 'pdfHtml5',
   //                      className: 'btn btn-default btn-sm',
   //                      exportOptions: {
   //                          columns: ':visible:not(.nowrap)'
   //                      }
   //                  },
   //              ],
   //              "destroy": true,
   //              "scrollCollapse": true,
   //              "oLanguage": {
   //                  "sEmptyTable":      "Tiada data",
   //                  "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
   //                  "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
   //                  "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
   //                  "sInfoPostFix":     "",
   //                  "sInfoThousands":   ",",
   //                  "sLengthMenu":      "Papar _MENU_ rekod",
   //                  "sLoadingRecords":  "Diproses...",
   //                  "sProcessing":      "Sedang diproses...",
   //                  "sSearch":          "Carian:",
   //                  "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
   //                  "oPaginate": {
   //                      "sFirst":        "Pertama",
   //                      "sPrevious":     "Sebelum",
   //                      "sNext":         "Seterusnya",
   //                      "sLast":         "Akhir"
   //                  },
   //                  "oAria": {
   //                      "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
   //                      "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
   //                  }
   //              },
   //              "iDisplayLength": 10
   //          };

   //          tableFasa.dataTable(settingsFasa);

            function removepakej(id) {

                $.ajax({
                    url: 'buangpakej/'+id,
                    method: 'get',
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        swal(data.title, data.message);
                        table.api().ajax.reload(null, false);
                    }
                });

                // swal({
                //         title: "",
                //         text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
                //         type: "",
                //         showCancelButton: true,
                //         confirmButtonClass: "btn-outline green-meadow",
                //         cancelButtonClass: "btn-danger",
                //         confirmButtonText: "Ya",
                //         cancelButtonText: "Tidak",
                //         closeOnConfirm: true,
                //         closeOnCancel: true,
                //         showLoaderOnConfirm: true
                //     },
                //     function(isConfirm) {
                //         if (isConfirm) {
                            
                //         }
                //     });
            }

            function pengawasan(id) {
                $("#modal-div").load("pakej_pengawasan/"+id);
            }
        // });

        $(".address .postcode").on('change', function() {
            console.log('here');
            parent = $(this).parents('.address');
            $.ajax({
                url: "{{ url('general/postcode-state') }}/"+$(this).val(),
                type: 'GET',
                datatype: 'json',
                success: function(data){
                    console.log(data.state.id);
                    parent.find('.state').val(data.state.id).trigger('change');
                    setTimeout(function() {
                        parent.find('.district').val(data.id).trigger('change');
                    }, 1000);

                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError);
                }
            });
        });

        $(".address .state").on('change', function() {
            list = $(this).parents('.address').find('.district');
            list.empty();
            list.append("<option disabled selected hidden value=''>Pilih Daerah...</option>");

            $.ajax({
                url: "{{ url('general/state-district') }}/"+$(this).val(),
                type: 'GET',
                datatype: 'json',
                success: function(data){
                    $.each(data, function(key, district) {
                        list.append("<option value='" + district.district_id +"'>" + district.name + "</option>");
                    });
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError);
                }
            });

            list2 = $(this).parents('.address').find('.bandar');
            list2.empty();
            list2.append("<option disabled selected hidden value=''>Pilih Bandar...</option>");

            $.ajax({
                url: "{{ url('general/state-city') }}/"+$(this).val(),
                type: 'GET',
                datatype: 'json',
                success: function(data){
                    $.each(data, function(key, district) {
                        list2.append("<option value='" + district.id +"'>" + district.name + "</option>");
                    });
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError);
                }
            });
        });

        $("#laporaneia").on('change', function() {
            $('#laporaneia').parents('div.form-group').removeClass('has-error');
        });

        $(".address .state").on('change', function() {
            $('.jenisN').parents('div.form-group').removeClass('has-error');
        });

        function checkeoemc(){
            $('form#projek').submit();
            // $.ajax({
            //     url: "{{ route('pakejeoemc') }}",
            //     method: 'post',
            //     data: {id:'{{$ProjekDetail->projek_id}}'},
            //     success: function(data) {
            //         if (data.error == 'error') {
            //             swal(data.title, data.message);
            //         } else {
            //             console.log('ada data');
            //         }
            //     }
            // });
        }

        function edit(id){
            $.ajax({
                url: "editpakej/"+id,
                method: 'get',
                success: function(data) {
                    console.log(data.projekPakej);
                }
            });
        }

        // $(".address1 .postcode1").on('change', function() {
        //     console.log('here');
        //     parent = $(this).parents('.address1');
        //     $.ajax({
        //         url: "{{ url('general/postcode-state') }}/"+$(this).val(),
        //         type: 'GET',
        //         datatype: 'json',
        //         success: function(data){
        //             parent.find('.state1').val(data.state.id).trigger('change');
        //             setTimeout(function() {
        //                 parent.find('.district1').val(data.id).trigger('change');
        //             }, 1000);

        //         },
        //         error: function(xhr, ajaxOptions, thrownError){
        //             console.log(thrownError);
        //         }
        //     });
        // });

        // $(".address1 .state1").on('change', function() {
        //     list = $(this).parents('.address1').find('.district1');
        //     list.empty();
        //     list.append("<option disabled selected hidden>Pilih Daerah...</option>");

        //     $.ajax({
        //         url: "{{ url('general/state-district') }}/"+$(this).val(),
        //         type: 'GET',
        //         datatype: 'json',
        //         success: function(data){
        //             $.each(data, function(key, district) {
        //                 list.append("<optionnvalue='" + district.id +"'>" + district.name + "</option>");
        //             });
        //         },
        //         error: function(xhr, ajaxOptions, thrownError){
        //             console.log(thrownError);
        //         }
        //     });
        // });

        // @if($ProjekDetail->negeri)
        // $("#negeri").val( {{ $ProjekDetail->negeri }} ).trigger('change');
        // @endif

        // @if($ProjekDetail->daerah)
        // // setTimeout(function() {
        //     $("#daerah").val( {{ $ProjekDetail->daerah }} ).trigger('change');
        // // }, 1000);
        // @endif

        @if($ProjekDetail->surat_negeri)
        $("#surat_negeri").val( {{ $ProjekDetail->surat_negeri }} ).trigger('change');
        @endif

        @if($ProjekDetail->surat_daerah)
        // setTimeout(function() {
            $("#surat_daerah").val( {{ $ProjekDetail->surat_daerah }} ).trigger('change');
        // }, 1000);
        @endif

        // @if($ProjekDetail->aktiviti)
        // $("#aktiviti").val( {{ $ProjekDetail->aktiviti }} ).trigger('change');
        // @endif

        @if($ProjekDetail->laporaneia)
        $("#laporaneia").val( {{ $ProjekDetail->laporaneia }} ).trigger('change');
        @endif

        @if($ProjekDetail->surat_bandar)
        $("#surat_bandar").val( {{ $ProjekDetail->surat_bandar }} ).trigger('change');
        @endif

        // $('#aktiviti').on('change', function() {
        //     var val = this.value;
        //   // alert( this.value );
        //     if(val==22){
        //         // document.getElementById('other_aktiviti').style.display = 'block';
        //         $('#other_aktiviti').show();
        //     }else{
        //         $('#other_aktiviti').hide();
        //     }
        // });

        // if ($("#aktiviti option:selected").val() == 22) {
        //     $('#other_aktiviti').show();
        // }else{
        //     $('#other_aktiviti').hide();
        // }

        // $("#laporaneia_{{ $ProjekDetail->laporaneia }}").prop('checked', true).trigger('change');

        // $("#jenis_{{ $ProjekDetail->jenis_projek }}").prop('checked', true).trigger('change');

    </script>
@endpush
