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
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 m-t-15 control-label">Jenis Pengawasan<span style="color:red;">*</span> </label>
                            <!-- <div class="col-md-3"><input class="form-control numeric postcode tab5" id="surat_poskod" name="surat_poskod" aria-required="true" type="text" value="{{$ProjekDetail->surat_poskod}}" placeholder="Poskod" minlength="5" maxlength="5" required /></div> -->
                            <div class="col-md-9">
                                <div class="jenisPengawasan">
                                    <div class="checkbox check-primary">
                                       @foreach ($Pengawasan as $value)
                                       <div class="row">
                                        <div class="col-md-12">
                                            <input name="jenis_pengawasan_id[]" value="{{$value->id}}" id="{{$value->id}}" type="checkbox" class="hidden tab5 pengawasan_{{$value->id}}" aria-required="true" disabled>
                                            <label for="{{$value->id}}">{{$value->jenis_pengawasan}}</label>
                                        </div>
                                    </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="tab">
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

                                            <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                            <input type="hidden" name="jenis_pengawasan" value="1">
                                           <!--  <div class="form-group row">
                                                <label class="col-md-3 control-label">Nama Sungai</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_sungai)->nama}}" readonly>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">Bilangan Stesen
                                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countsungai}}" readonly>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tableSungai">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Stesen</th>
                                                            <th>Koordinat</th>
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

                                            <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                            <input type="hidden" name="jenis_pengawasan" value="2">
                                           <!--  <div class="form-group row">
                                                <label class="col-md-3 control-label">Nama Marin</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_marin)->nama}}" readonly>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">Bilangan Stesen
                                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countmarin}}" readonly>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tableMarin">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Stesen</th>
                                                            <th>Koordinat</th>
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

                                            <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                            <input type="hidden" name="jenis_pengawasan" value="3">
                                            <!-- <div class="form-group row">
                                                <label class="col-md-3 control-label">Nama Tasik</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_tasik)->nama}}" readonly>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">Bilangan Stesen
                                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$counttasik}}" readonly>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tableTasik">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Stesen</th>
                                                            <th>Koordinat</th>
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

                                            <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                            <input type="hidden" name="jenis_pengawasan" value="4">
                                            <!-- <div class="form-group row">
                                                <label class="col-md-3 control-label">Nama Tanah</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_tanah)->nama}}" readonly>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">Bilangan Stesen
                                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$counttanah}}" readonly>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tableTanah">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Stesen</th>
                                                            <th>Koordinat</th>
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

                                            <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                            <input type="hidden" name="jenis_pengawasan" value="5">
                                            <!-- <div class="form-group row">
                                                <label class="col-md-3 control-label">Nama Air Larian Permukaan</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_air)->nama}}" readonly>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">Bilangan Stesen
                                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countairlarian}}" readonly>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tableAir">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Stesen</th>
                                                            <th>Koordinat</th>
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

                                            <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                            <input type="hidden" name="jenis_pengawasan" value="6">
                                            <!-- <div class="form-group row">
                                                <label class="col-md-3 control-label">Nama Stesen Udara</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_udara)->nama}}" readonly>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">Bilangan Stesen
                                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countudara}}" readonly>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tableUdara">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Stesen</th>
                                                            <th>Koordinat</th>
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

                                            <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                            <input type="hidden" name="jenis_pengawasan" value="7">
                                            <!-- <div class="form-group row">
                                                <label class="col-md-3 control-label">Nama Stesen Bunyi Bising</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_bunyi)->nama}}" readonly>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">Bilangan Stesen
                                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countbunyi}}" readonly>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tableBunyi">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Stesen</th>
                                                            <th>Koordinat</th>
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

                                            <input type="hidden" name="projek_id" value="{{$Projek->id}}">
                                            <input type="hidden" name="jenis_pengawasan" value="8">
                                           <!--  <div class="form-group row">
                                                <label class="col-md-3 control-label">Nama Stesen Getaran</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="nama" id="nama" value="{{optional($stesen_getaran)->nama}}" readonly>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">Bilangan Stesen
                                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="Bilangan Stesen mengikut Syarat Pematuhan EIA"></i>
                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countgetaran}}" readonly>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tableGetaran">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Stesen</th>
                                                            <th>Koordinat</th>
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
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text" name="bilangan_stesen" id="bilangan_stesen" value="{{$countdron}}" readonly>
                                                    </div>
                                                    <!-- <div class="col-md-2" style="margin-top: 3px">
                                                     <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check addDron" type="button"><span>Simpan</span></button> -->
                                                 <!-- </div> -->
                                             </div>
                                         </form>

                                         <div class="table-responsive">
                                            <table class="table table-bordered" id="tableDron">
                                                <thead>
                                                    <tr>
                                                        <!-- <th class="fit">Bil.</th> -->
                                                        <th>Nama Stesen</th>
                                                        <th>Koordinat</th> 
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
            <!-- END BODY TAB2 -->
        </div>
        <div class="row p-b-10">
            <div class="col-md-12">
                <ul class="pager wizard no-style">
                    <li class="next">
                        <button class="btn btn-success btn-cons from-left pull-right" type="button">
                            <span>Seterusnya</span>
                        </button>
                    </li>

                    <li class="submit">
                        @if($_GET['a']==1)
                            <button href="javascript:;" onclick="peraku(1)" class="btn btn-info btn-cons from-left pull-right" type="button">
                              <span>Sahkan</span>
                            </button>
                            <button href="javascript:;" onclick="tidaklengkap(1)" class="btn btn-danger btn-cons from-left pull-right" type="button">
                              <span>Tidak Lengkap</span>
                            </button>
                        @elseif($_GET['a']==12)
                            <button href="javascript:;" onclick="peraku(1)" class="btn btn-info btn-cons from-left pull-right" type="button">
                              <span>Sahkan</span>
                            </button>
                        @else
                            <button href="javascript:;" onclick="javascript:history.back()" class="btn btn-info btn-cons from-left pull-right" type="button">
                            <span>Selesai</span>
                        </button>
                        @endif
                    </li>

                    <li class="previous">
                        <button class="btn btn-default btn-cons from-left" type="button">
                            <span>Kembali</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>

<div class="modal fade" id="modal-peraku" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle"><span class="bold">Tarikh Perlaksanaan Pelaporan</span></h5>
                    <small class="text-muted">Sila masukkan bulan dan tahun perlaksanaan pelaporan.</small>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id='form-sah-projek' role="form" method="post" action="{{ route('sahProjek') }}">

                    <input type="hidden" name="id" value="{{$Projek->id}}">
                    <div class="modal-body m-t-20">
                        <div class="form-group row control-label col-md-12">
                            <label class="col-md-3">Bulan<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                <select class="full-width autoscroll state" name="bulan" data-init-plugin="select2" required>
                                    <option value="" selected="" disabled="">Pilih Bulan</option>
                                    @foreach($master_bulan as $month)
                                    <option value="{{$month->id}}">{{$month->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row control-label col-md-12">
                            <label class="col-md-3">Tahun<span style="color:red;">*</span> </label>
                            <div class="col-md-9">
                                <select class="full-width autoscroll state" name="tahun" data-init-plugin="select2" required>
                                    <option value="" selected="" disabled="">Pilih Tahun</option>
                                    @foreach($master_tahun as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <!-- <button type="button" class="btn btn-info"  onclick="submitForm('buttonPeraku')"><i class="fa fa-check m-r-5"></i> Submit</button> -->
                    <button type="button" class="btn btn-info" onclick="submitForm('form-sah-projek')">Simpan</button>

                </div>
                </form>
            </div>
        </div>
    </div>
<div class="modal fade" id="modal-tidaklengkap" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle">Nyatakan Sebab <span class="bold">Tidak Lengkap</span></h5>
                    <small class="text-muted">Sila masukkan maklumat tidak lengkap.</small>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id='form-tidaklengkap' role="form" method="post" action="{{ route('tidaklengkapProjek') }}">
                    <input type="hidden" name="id" value="{{$Projek->id}}">
                    <div class="modal-body m-t-20">
                        <div class="form-group row control-label col-md-12">
                            <div class="col-md-12">
                                <textarea id="ulasan1" class="form-control " name="ulasan1" placeholder="" style="height: 400px;text-transform: none !important;"></textarea>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" onclick="submitForm('form-tidaklengkap')"><i class="fa fa-check m-r-5"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@push('js')
    <script type="text/javascript">
    $("#form-tidaklengkap").submit(function(e) {
       e.preventDefault();
       var form = $(this);

       if(!form.valid())
         return;

     $.ajax({
       url: form.attr('action'),
       method: form.attr('method'),
       data: new FormData(form[0]),
       dataType: 'json',
       async: true,
       contentType: false,
       processData: false,
       success: function(data) {
           swal(data.title, data.message);
           $("#modal-tidaklengkap").modal("hide");
           table.api().ajax.reload(null, false);
           location.href = '{{ route('pengesahanprojek.belumsah') }}';
       }
   });
 });
     $("#form-sah-projek").submit(function(e) {
        e.preventDefault();
        var form = $(this);

        if(!form.valid())
          return;

      $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: new FormData(form[0]),
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
            swal(data.title, data.message);
            $("#modal-peraku").modal("hide");
            table.api().ajax.reload(null, false);
            location.href = '{{ route('pengesahanprojek.belumsah') }}';
        }
    });
  });

        function peraku() {
            $("#modal-peraku").modal("show");
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function tidaklengkap() {
            $("#modal-tidaklengkap").modal("show");
        }

        function map(id) {
            $("#modal-div").load("/external/projek/map/"+id);
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function edit(id) {
            $("#modal-div").load("/pegawai/pengesahanprojek/viewStesen/"+id);
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function parameterSungai(id) {
            $("#modal-div").load("/pegawai/pengesahanprojek/viewParameter/"+id);
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        @foreach ($stesens as $key)
           $(".pengawasan_{{$key->jenis_pengawasan_id}}").prop('checked', true).trigger('change');

        @endforeach

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

        var tableSungai = $('#tableSungai');

        var settingSungai = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "searchable": false,
            "ajax": "{{ route('viewSungai', ['id'=>$Projek->id,'a'=>request()->a]) }}",
            "columns": [
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "koordinat", name: "koordinat", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 3 ] }
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
            "ajax": "{{ route('viewMarin', ['id'=>$Projek->id,'a'=>request()->a]) }}",
            "columns": [
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "koordinat", name: "koordinat", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 3 ] }
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
            "ajax": "{{ route('viewTasik', ['id'=>$Projek->id,'a'=>request()->a]) }}",
            "columns": [
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "koordinat", name: "koordinat", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 3 ] }
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
            "ajax": "{{ route('viewTanah', ['id'=>$Projek->id,'a'=>request()->a]) }}",
            "columns": [
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "koordinat", name: "koordinat", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 3 ] }
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
            "ajax": "{{ route('viewAir', ['id'=>$Projek->id,'a'=>request()->a]) }}",
            "columns": [
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "koordinat", name: "koordinat", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 3 ] }
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
            "ajax": "{{ route('viewUdara', ['id'=>$Projek->id,'a'=>request()->a]) }}",
            "columns": [
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "koordinat", name: "koordinat", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 3 ] }
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
            "ajax": "{{ route('viewBunyi', ['id'=>$Projek->id,'a'=>request()->a]) }}",
            "columns": [
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "koordinat", name: "koordinat", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 3 ] }
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
            "ajax": "{{ route('viewGetaran', ['id'=>$Projek->id,'a'=>request()->a]) }}",
            "columns": [
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "koordinat", name: "koordinat", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 3 ] }
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
            "ajax": "{{ route('viewDron', ['id'=>$Projek->id,'a'=>request()->a]) }}",
            "columns": [
                { data: "stesen", name: "stesen", defaultContent: "-", searchable: false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                { data: "koordinat", name: "koordinat", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "gambar", name: "gambar", defaultContent: "-", searchable: false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "nowrap", "targets": [ 3 ] }
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

    </script>
@endpush
