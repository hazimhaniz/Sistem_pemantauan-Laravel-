<div class=" container-fluid container-fixed-lg bg-white">
    <!-- START card 2-->
    <div class="card card-transparent">
        <div class="card-block">
            <div class="card card-default">
                <div class="card-header separator">
                    <div class="card-title" style="font-weight: bold;font-size: 12.5px">MAKLUMAT PENGAWASAN KUALITI</div>
                </div>
                <!-- START BODY TAB2 -->
                <div class="card-body">
                    <div class="col-md-12 m-t-20">
                        <p class="hint-text m-t-5"><span style="color:red;font-weight: bold">*</span>Hanya isi maklumat pengawasan yang terlibat</p>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 m-t-15 control-label">Jenis Pengawasan<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                <div class="jenisPengawasan">
                                    <div class="checkbox check-primary">
                                       @foreach ($Pengawasan as $value)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input name="jenis_pengawasan_id[]" value="{{$value->id}}" id="{{$value->id}}" type="checkbox" class="hidden tab5 pengawasan_{{$value->id}}" aria-required="true">
                                                <label for="{{$value->id}}">{{$value->jenis_pengawasan}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-md-12" id="tab">
                        <div class="sm-m-l-5 sm-m-r-5 m-t-20">
                            <div class="card-group horizontal">

                                <!-- START SUNGAI -->
                                <div class="card card-default m-b-20" id="tab_5_1" style="display: none">
                                    <div class="card-header">
                                        <h4 style="font-family: 'Montserrat';text-transform: uppercase;letter-spacing: 0.06em;font-size: 13px;font-weight: 500; color: #575757">
                                           PROGRAM PENGAWASAN KUALITI - SUNGAI<br>
                                        <span class="text-danger disclaimerSungai"></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class=" container-fluid bg-white">
                                            <div class="card card-transparent">
                                                <div class="card-block">

                                                    <form id='sungai' role="form" method="post" action="{{ route('addsungai') }}" enctype="multipart/form-data">

                                                    <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                                    <input type="hidden" name="jenis_pengawasan" value="1">
                                                   <!--  <div class="form-group row">
                                                        <label class="col-md-3 control-label">Nama Sungai</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_sungai)->nama}}">
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Bilangan Stesen
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countsungai}}">
                                                        </div>
                                                        <div class="col-md-2" style="margin-top: 3px">
                                                           <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addSungai" type="button"><span>Simpan</span></button>
                                                        </div>
                                                    </div>
                                                    </form>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="tableSungai">
                                                            <thead>
                                                                <tr>
                                                                    <th class="fit">Bil.</th>
                                                                    <th>Nama Stesen</th>
                                                                    <th>Latitud</th>
                                                                    <th>Longitud</th>
                                                                    <th>Gambar Stesen</th>
                                                                    <th>Tindakan</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SUNGAI -->

                                <!-- START MARIN -->
                                <div class="card card-default m-b-20" id="tab_5_2" style="display: none">
                                    <div class="card-header">
                                        <h4 style="font-family: 'Montserrat';text-transform: uppercase;letter-spacing: 0.06em;font-size: 13px;font-weight: 500; color: #575757">
                                            Program Pengawasan Kualiti - Marin<br>
                                             <span class="text-danger disclaimerMarin"></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class=" container-fluid bg-white">
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <form id='marin' role="form" method="post" action="{{ route('addmarin') }}" enctype="multipart/form-data">

                                                    <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                                    <input type="hidden" name="jenis_pengawasan" value="2">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Standard Dirujuk</label>
                                                        <div class="col-md-9" style="z-index: 799">
                                                            <select id="version" name="version" data-placeholder="bulan" class="full-width autoscroll" data-init-plugin="select2" required>
                                                                <option disabled hidden selected> Sila Pilih </option>
                                                                <option value="1" {{ $version==1 ? 'selected' : ''}} > Pemakaian sebelum 2019 </option>
                                                                <option value="2" {{ $version==2 ? 'selected' : ''}} > Pemakaian selepas 2019 </option>

                                                            </select>
                                                            <!-- <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_marin)->nama}}"> -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Bilangan Stesen
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countmarin}}">
                                                            <input class="form-control" type="hidden" name="bilangan_stesen_marin" id="bilangan_stesen_marin" value="{{$countmarin}}">
                                                        </div>
                                                        <div class="col-md-2" style="margin-top: 3px">
                                                           <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addMarin" type="button"><span>Simpan</span></button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="tableMarin">
                                                            <thead>
                                                                <tr>
                                                                    <th class="fit">Bil.</th>
                                                                    <th>Nama Stesen</th>
                                                                    <th>Latitud</th>
                                                                    <th>Longitud</th>
                                                                    <th>Gambar Stesen</th>
                                                                    <th>Tindakan</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MARIN -->

                                <!-- START TASIK -->
                                <div class="card card-default m-b-20" id="tab_5_3" style="display: none">
                                    <div class="card-header">
                                        <h4 style="font-family: 'Montserrat';text-transform: uppercase;letter-spacing: 0.06em;font-size: 13px;font-weight: 500; color: #575757">
                                            PROGRAM PENGAWASAN KUALITI - TASIK<br>
                                             <span class="text-danger disclaimerTasik"></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class=" container-fluid bg-white">
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <form id='tasik' role="form" method="post" action="{{ route('addtasik') }}" enctype="multipart/form-data">

                                                    <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                                    <input type="hidden" name="jenis_pengawasan" value="3">
                                                    <!-- <div class="form-group row">
                                                        <label class="col-md-3 control-label">Nama Tasik</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_tasik)->nama}}">
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Bilangan Stesen
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$counttasik}}">
                                                        </div>
                                                        <div class="col-md-2" style="margin-top: 3px">
                                                           <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addTasik" type="button"><span>Simpan</span></button>
                                                        </div>
                                                    </div>
                                                    </form>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="tableTasik">
                                                            <thead>
                                                                <tr>
                                                                    <th class="fit">Bil.</th>
                                                                    <th>Nama Stesen</th>
                                                                    <th>Latitud</th>
                                                                    <th>Longitud</th>
                                                                    <th>Gambar Stesen</th>
                                                                    <th>Tindakan</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TASIK -->

                                <!-- START TANAH -->
                                <div class="card card-default m-b-20" id="tab_5_4" style="display: none">
                                    <div class="card-header">
                                        <h4 style="font-family: 'Montserrat';text-transform: uppercase;letter-spacing: 0.06em;font-size: 13px;font-weight: 500; color: #575757">
                                            PROGRAM PENGAWASAN KUALITI - AIR TANAH<br>
                                             <span class="text-danger disclaimerTanah"></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class=" container-fluid bg-white">
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <form id='tanah' role="form" method="post" action="{{ route('addtasik') }}" enctype="multipart/form-data">

                                                    <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                                    <input type="hidden" name="jenis_pengawasan" value="4">
                                                    <!-- <div class="form-group row">
                                                        <label class="col-md-3 control-label">Nama Tanah</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_tanah)->nama}}">
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Bilangan Stesen
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$counttanah}}">
                                                        </div>
                                                        <div class="col-md-2" style="margin-top: 3px">
                                                           <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addTanah" type="button"><span>Simpan</span></button>
                                                        </div>
                                                    </div>
                                                    </form>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="tableTanah">
                                                            <thead>
                                                                <tr>
                                                                    <th class="fit">Bil.</th>
                                                                    <th>Nama Stesen</th>
                                                                    <th>Latitud</th>
                                                                    <th>Longitud</th>
                                                                    <th>Gambar Stesen</th>
                                                                    <th>Tindakan</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TANAH -->

                                <!-- START LARIAN PERMUKAAN -->
                                <div class="card card-default m-b-20" id="tab_5_5" style="display: none">
                                    <div class="card-header">
                                        <h4 style="font-family: 'Montserrat';text-transform: uppercase;letter-spacing: 0.06em;font-size: 13px;font-weight: 500; color: #575757">
                                            PROGRAM PENGAWASAN KUALITI - AIR LARIAN PERMUKAAN<br>
                                             <span class="text-danger disclaimerAir"></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class=" container-fluid bg-white">
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <form id='air' role="form" method="post" action="{{ route('addtasik') }}" enctype="multipart/form-data">

                                                    <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                                    <input type="hidden" name="jenis_pengawasan" value="5">
                                                    <!-- <div class="form-group row">
                                                        <label class="col-md-3 control-label">Nama Air Larian Permukaan</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_air)->nama}}">
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Bilangan Stesen
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countairlarian}}">
                                                        </div>
                                                        <div class="col-md-2" style="margin-top: 3px">
                                                           <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addAir" type="button"><span>Simpan</span></button>
                                                        </div>
                                                    </div>
                                                    </form>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="tableAir">
                                                            <thead>
                                                                <tr>
                                                                    <th class="fit">Bil.</th>
                                                                    <th>Nama Stesen</th>
                                                                    <th>Latitud</th>
                                                                    <th>Longitud</th>
                                                                    <th>Gambar Stesen</th>
                                                                    <th>Tindakan</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END LARIAN PERMUKAAN -->

                                <!-- START LARIAN UDARA -->
                                <div class="card card-default m-b-20" id="tab_5_6" style="display: none">
                                    <div class="card-header">
                                        <h4 style="font-family: 'Montserrat';text-transform: uppercase;letter-spacing: 0.06em;font-size: 13px;font-weight: 500; color: #575757">
                                            PROGRAM PENGAWASAN KUALITI - UDARA<br>
                                             <span class="text-danger disclaimerUdara"></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class=" container-fluid bg-white">
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <form id='udara' role="form" method="post" action="{{ route('addUdara') }}" enctype="multipart/form-data">

                                                    <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                                    <input type="hidden" name="jenis_pengawasan" value="6">
                                                    <!-- <div class="form-group row">
                                                        <label class="col-md-3 control-label">Nama Stesen Udara</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_udara)->nama}}">
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Bilangan Stesen
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countudara}}">
                                                        </div>
                                                        <div class="col-md-2" style="margin-top: 3px">
                                                           <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addUdara" type="button"><span>Simpan</span></button>
                                                        </div>
                                                    </div>
                                                    </form>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="tableUdara">
                                                            <thead>
                                                                <tr>
                                                                    <th class="fit">Bil.</th>
                                                                    <th>Nama Stesen</th>
                                                                    <th>Latitud</th>
                                                                    <th>Longitud</th>
                                                                    <th>Gambar Stesen</th>
                                                                    <th>Tindakan</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END LARIAN UDARA -->

                                <!-- START LARIAN BUNYI -->
                                <div class="card card-default m-b-20" id="tab_5_7" style="display: none">
                                    <div class="card-header">
                                        <h4 style="font-family: 'Montserrat';text-transform: uppercase;letter-spacing: 0.06em;font-size: 13px;font-weight: 500; color: #575757">
                                            PROGRAM PENGAWASAN KUALITI - BUNYI BISING<br>
                                             <span class="text-danger disclaimerBunyi"></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class=" container-fluid bg-white">
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <form id='bunyi' role="form" method="post" action="{{ route('addBunyi') }}" enctype="multipart/form-data">

                                                    <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                                    <input type="hidden" name="jenis_pengawasan" value="7">
                                                    <!-- <div class="form-group row">
                                                        <label class="col-md-3 control-label">Nama Stesen Bunyi Bising</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_bunyi)->nama}}">
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Bilangan Stesen
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countbunyi}}">
                                                        </div>
                                                        <div class="col-md-2" style="margin-top: 3px">
                                                           <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addBunyi" type="button"><span>Simpan</span></button>
                                                        </div>
                                                    </div>
                                                    </form>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="tableBunyi">
                                                            <thead>
                                                                <tr>
                                                                    <th class="fit">Bil.</th>
                                                                    <th>Nama Stesen</th>
                                                                    <th>Latitud</th>
                                                                    <th>Longitud</th>
                                                                    <th>Gambar Stesen</th>
                                                                    <th>Tindakan</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END LARIAN BUNYI -->

                                <!-- START LARIAN GETARAN -->
                                <div class="card card-default m-b-20" id="tab_5_8" style="display: none">
                                    <div class="card-header">
                                        <h4 style="font-family: 'Montserrat';text-transform: uppercase;letter-spacing: 0.06em;font-size: 13px;font-weight: 500; color: #575757">
                                            PROGRAM PENGAWASAN - GETARAN<br>
                                             <span class="text-danger disclaimerGetaran"></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class=" container-fluid bg-white">
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <form id='getaran' role="form" method="post" action="{{ route('addGetaran') }}" enctype="multipart/form-data">

                                                    <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                                    <input type="hidden" name="jenis_pengawasan" value="8">
                                                    <!-- <div class="form-group row">
                                                        <label class="col-md-3 control-label">Nama Stesen Getaran</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_getaran)->nama}}">
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Bilangan Stesen
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countgetaran}}">
                                                        </div>
                                                        <div class="col-md-2" style="margin-top: 3px">
                                                           <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addGetaran" type="button"><span>Simpan</span></button>
                                                        </div>
                                                    </div>
                                                    </form>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="tableGetaran">
                                                            <thead>
                                                                <tr>
                                                                    <th class="fit">Bil.</th>
                                                                    <th>Nama Stesen</th>
                                                                    <th>Latitud</th>
                                                                    <th>Longitud</th>
                                                                    <th>Gambar Stesen</th>
                                                                    <th>Tindakan</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END LARIAN GETARAN -->

                                <!-- START DRON -->
                                <div class="card card-default m-b-20" id="tab_5_9" style="display: none">
                                    <div class="card-header">
                                        <h4 style="font-family: 'Montserrat';text-transform: uppercase;letter-spacing: 0.06em;font-size: 13px;font-weight: 500; color: #575757">
                                            PROGRAM PENGAWASAN MELALUI UDARA (DRON)<br>
                                             <span class="text-danger disclaimerDron"></span>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class=" container-fluid bg-white">
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <form id='dron' role="form" method="post" action="{{ route('addDron') }}" enctype="multipart/form-data">

                                                    <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                                    <input type="hidden" name="jenis_pengawasan" value="9">

                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Bilangan Stesen
                                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countdron}}">
                                                        </div>
                                                        <div class="col-md-2" style="margin-top: 3px">
                                                           <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addDron" type="button"><span>Simpan</span></button>
                                                        </div>
                                                    </div>
                                                    </form>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="tableDron">
                                                            <thead>
                                                                <tr>
                                                                    <th class="fit">Bil.</th>
                                                                    <th>Nama Stesen</th>
                                                                    <th>Latitud</th>
                                                                    <th>Longitud</th>
                                                                    <th>Gambar Stesen</th>
                                                                    <th>Tindakan</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END LARIAN DRON -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END BODY TAB2 -->
            </div>
            <div class="row p-b-10">
                <div class="col-md-12">
                    <ul class="pager wizard no-style">
                        <li class="submit">
                            <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check submitProjek" type="button">
                                <span>Simpan</span>
                            </button>
                        </li>
                        <li class="previous">
                            <button class="btn btn-default btn-cons btn-animated from-left fa fa-angle-left" type="button">
                                <span>Kembali</span>
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
        function edit(id) {
            $("#modal-div").load("../projek/kemaskinistesen/"+id);
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function edit1(id) {
            $("#modal-div").load("../projek/kemaskinistesen1/"+id+"/"+{{$Projek->id}});
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function map(id) {
            $("#modal-div").load("../projek/map/"+id);
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function remove(id) {

            $.ajax({
                url: 'buangStesen/'+id,
                method: 'delete',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal(data.title, data.message);
                    // $('#sungai').load(' #sungai');
                    // $('#marin').load(' #marin');
                    // $('#tasik').load(' #tasik');
                    // $('#tanah').load(' #tanah');
                    // $('#air').load(' #air');
                    // $('#udara').load(' #udara');
                    // $('#bunyi').load(' #bunyi');
                    // $('#getaran').load(' #getaran');
                    tableSungai.api().ajax.reload(null, false);
                    tableMarin.api().ajax.reload(null, false);
                    tableTasik.api().ajax.reload(null, false);
                    tableTanah.api().ajax.reload(null, false);
                    tableAir.api().ajax.reload(null, false);
                    tableUdara.api().ajax.reload(null, false);
                    tableBunyi.api().ajax.reload(null, false);
                    tableGetaran.api().ajax.reload(null, false);
                    tableDron.api().ajax.reload(null, false);
                }
            });

                // swal({
                //         title: "Anda pasti?",
                //         text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
                //         type: "info",
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

        $('body').on('click', '.addSungai', function(event) {
            $('form#sungai').submit();
        });

        $('body').on('submit', 'form#sungai', function() {
            // alert();
            var form = $(this);
            // alert(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'ok') {
                      swal({
                              title: "Selesai!",
                              text: "Bilangan Telah ditetapkan",
                              
                          });
                        tableSungai.api().ajax.reload(null, false);
                    }
                }
            });
            return false;
        });


            var checked_select_marin = $('#bilangan_stesen_marin').val();
            console.log(checked_select_marin);
            if(checked_select_marin!=0)
            {
                 $('#version').attr("disabled", true);
            }


        $('body').on('click', '.addMarin', function(event) {
            $('form#marin').submit();
        });

        $('body').on('submit', 'form#marin', function() {
            // alert();
            var form = $(this);
            var checkedvalue = $('#version').val();
            console.log(checkedvalue);
            if(checkedvalue>0)
            {
                // alert(form.attr('action'));
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: new FormData(form[0]),
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 'ok') {
                          swal({
                                  title: "Selesai!",
                                  text: "Bilangan Telah ditetapkan",
                                  
                              });
                            tableMarin.api().ajax.reload(null, false);

                        }
                        if(response.standard_dirujuk == 'disable')
                        {
                            $('#version').attr("disabled", true);
                        }
                        if(response.standard_dirujuk == 'enable')
                        {
                            $('#version').attr("disabled", false);
                        }
                    }
                });
                return false;
            }
            else
            {
                swal({
                      title: "",
                      text: "Sila Pilih Standard Dirujuk",
                      
                  });
                return false;

                document.getElementById('version').focus();
            }

        });

        $('body').on('click', '.addTasik', function(event) {
            $('form#tasik').submit();
        });

        $('body').on('submit', 'form#tasik', function() {
            // alert();
            var form = $(this);
            // alert(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'ok') {
                      swal({
                              title: "Selesai!",
                              text: "Bilangan Telah ditetapkan",
                              
                          });
                        tableTasik.api().ajax.reload(null, false);
                    }
                }
            });
            return false;
        });

        $('body').on('click', '.addTanah', function(event) {
            $('form#tanah').submit();
        });

        $('body').on('submit', 'form#tanah', function() {
            // alert();
            var form = $(this);
            // alert(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'ok') {
                      swal({
                              title: "Selesai!",
                              text: "Bilangan Telah ditetapkan",
                              
                          });
                        tableTanah.api().ajax.reload(null, false);
                    }
                }
            });
            return false;
        });

        $('body').on('click', '.addAir', function(event) {
            $('form#air').submit();
        });

        $('body').on('submit', 'form#air', function() {
            // alert();
            var form = $(this);
            // alert(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'ok') {
                      swal({
                              title: "Selesai!",
                              text: "Bilangan Telah ditetapkan",
                              
                          });
                        tableAir.api().ajax.reload(null, false);
                    }
                }
            });
            return false;
        });

        $('body').on('click', '.addUdara', function(event) {
            $('form#udara').submit();
        });

        $('body').on('submit', 'form#udara', function() {
            // alert();
            var form = $(this);
            // alert(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'ok') {
                      swal({
                              title: "Selesai!",
                              text: "Bilangan Telah ditetapkan",
                              
                          });
                        tableUdara.api().ajax.reload(null, false);
                    }
                }
            });
            return false;
        });

        $('body').on('click', '.addBunyi', function(event) {
            $('form#bunyi').submit();
        });

        $('body').on('submit', 'form#bunyi', function() {
            // alert();
            var form = $(this);
            // alert(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'ok') {
                      swal({
                              title: "Selesai!",
                              text: "Bilangan Telah ditetapkan",
                              
                          });
                        tableBunyi.api().ajax.reload(null, false);
                    }
                }
            });
            return false;
        });

        $('body').on('click', '.addGetaran', function(event) {
            $('form#getaran').submit();
        });

        $('body').on('submit', 'form#getaran', function() {
            // alert();
            var form = $(this);
            // alert(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'ok') {
                      swal({
                              title: "Selesai!",
                              text: "Bilangan Telah ditetapkan",
                              
                          });
                        tableGetaran.api().ajax.reload(null, false);
                    }
                }
            });
            return false;
        });

        $('body').on('click', '.addDron', function(event) {
            $('form#dron').submit();
        });

        $('body').on('submit', 'form#dron', function() {
            // alert();
            var form = $(this);
            // alert(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'ok') {
                      swal({
                              title: "Selesai!",
                              text: "Bilangan Telah ditetapkan",
                              
                          });
                        tableDron.api().ajax.reload(null, false);
                    }
                }
            });
            return false;
        });

        @foreach ($stesens as $key)
           $(".pengawasan_{{$key->jenis_pengawasan_id}}").prop('checked', true).trigger('change');

        @endforeach

        var tableSungai = $('#tableSungai');

        var settingSungai = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "searchable": false,
            "ajax": "{{ route('getSungai', $Projek->id) }}",
            "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "latitud", name: "latitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "longitud", name: "longitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 4 ] }
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

        tableSungai.dataTable(settingSungai);

        var tableMarin = $('#tableMarin');

        var settingMarin = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "searchable": false,
            "ajax": "{{ route('getMarin',$Projek->id ) }}",
            "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "latitud", name: "latitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "longitud", name: "longitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 4 ] }
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

        tableMarin.dataTable(settingMarin);

        var tableTasik = $('#tableTasik');

        var settingTasik = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "searchable": false,
            "ajax": "{{ route('getTasik',$Projek->id ) }}",
            "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "latitud", name: "latitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "longitud", name: "longitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 4 ] }
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

        tableTasik.dataTable(settingTasik);

        var tableTanah = $('#tableTanah');

        var settingTanah = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "searchable": false,
            "ajax": "{{ route('getTanah',$Projek->id ) }}",
            "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "latitud", name: "latitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "longitud", name: "longitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 4 ] }
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

        tableTanah.dataTable(settingTanah);

        var tableAir = $('#tableAir');

        var settingAir = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "searchable": false,
            "ajax": "{{ route('getAir',$Projek->id ) }}",
            "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "latitud", name: "latitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "longitud", name: "longitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 4 ] }
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

        tableAir.dataTable(settingAir);

        var tableUdara = $('#tableUdara');

        var settingUdara = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "searchable": false,
            "ajax": "{{ route('getUdara',$Projek->id ) }}",
            "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "latitud", name: "latitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "longitud", name: "longitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 4 ] }
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

        tableUdara.dataTable(settingUdara);

        var tableBunyi = $('#tableBunyi');

        var settingBunyi = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "searchable": false,
            "ajax": "{{ route('getBunyi',$Projek->id ) }}",
            "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "latitud", name: "latitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "longitud", name: "longitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 4 ] }
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

        tableBunyi.dataTable(settingBunyi);

        var tableGetaran = $('#tableGetaran');

        var settingGetaran = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "searchable": false,
            "ajax": "{{ route('getGetaran',$Projek->id ) }}",
            "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "latitud", name: "latitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "longitud", name: "longitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 4 ] }
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

        tableGetaran.dataTable(settingGetaran);

        var tableDron = $('#tableDron');

        var settingDron = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "searchable": false,
            "ajax": "{{ route('getDron',$Projek->id ) }}",
            "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "latitud", name: "latitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "longitud", name: "longitud", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 4 ] }
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

        tableDron.dataTable(settingDron);


        @foreach ($Pengawasan as $value)
        $('body').on('change','input:checkbox[name="jenis_pengawasan_id[]"]',function () {
            if ($('input[name=\'jenis_pengawasan_id[]\'][value={{$value->id}}]').prop('checked')==true) {
                document.getElementById('tab_5_{{$value->id}}').style.display = 'block';
            }else{
                document.getElementById('tab_5_{{$value->id}}').style.display = 'none';
            }
        })

        $(document).ready(function() {
            if($('.pengawasan_{{$value->id}}').prop("checked") == true) {
                document.getElementById('tab_5_{{$value->id}}').style.display = 'block';
            } else document.getElementById('tab_5_{{$value->id}}').style.display = 'none';
        });
        @endforeach

        function parameterSungai(id) {
            $("#modal-div").load("../projek/addparametersg/"+id+"/"+{{$Projek->id}});
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function parameterSungai1(id) {
            $("#modal-div").load("../projek/addparametersg1/"+id+"/"+{{$Projek->id}});
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function parameterSungai2(id) {

            $("#modal-div").load("../projek/addparametersg2/"+id+"/"+{{$Projek->id}});
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }


    </script>
@endpush
