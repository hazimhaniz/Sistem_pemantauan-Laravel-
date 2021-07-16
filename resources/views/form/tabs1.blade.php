

<?php

use App\MasterModel\MasterState;
use App\MasterModel\MasterDistrict;

$statelist = MasterState::all();

?>

<style>
    label {
        font-family: 'Montserrat' !important;
    }
</style>
<form id="form-sahBorangA" action="{{route('form.sahBorangA')}}" method="POST">
    @csrf
    <div class="tab-content">
        <input type="hidden" name="current_tab" id="current_tab" value="1">
        <!-- <input type="hidden" name="projekID" id="a" value="209"> -->

        <div class="tab-pane active slide-right" id="tab1_view">
            
            <div class="m-t-20">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-block">
                    <div id="alertA"></div>
                        <div class="alert alert-primary" style="font-size:14.5px; font-family: 'Montserrat'">
                            <label>
                                MAKLUMAT STATUS BAGI PROJEK YANG TERTAKLUK KEPADA EIA BAGI BULAN {{ $month }} TAHUN {{ $year }}.
                            </label>
                        </div>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group-attached m-b-10">
                                    <label>
                                        <span><b class="text-dark">MAKLUMAT PROJEK</b></span>
                                    </label>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Nama Projek</b></span> <span style="color:red;">*</span>
                                                </label>

                                                <input class="form-control form-control-lg" name="nama_projek_1" type="text" value="{{$projek->nama_projek}}" readonly>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Tapak</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" name="alamat_tapak_maklumat_projek_1" type="text" value="{{$projek->projekdetail->lokasi}}" readonly>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                                </label>
                                                <input class="form-control form-control-lg" value="{{$projek->projekdetail->surat_poskod}}" onkeyup="numOnly(this)" onblur="numOnly(this)" name="poskod_1" type="text" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                                </label>
                                                <input class="form-control form-control-lg" name="negeri_1" value="{{($projek->projekdetail->surat_state->name)}}" type="text" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Daerah</b></span>
                                                </label>
                                                <input class="form-control form-control-lg" name="daerah_1" value="{{($projek->projekdetail->surat_district->name)?$projek->projekdetail->surat_district->name:'Tiada daerah'}}" type="text" readonly>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Tarikh Awal</b></span>
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                                <input class="form-control" name="tarikh_awal_1" type="text" value="{{ date('d/m/Y',strtotime($projek->tarikh_awal)) }}" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Tarikh Akhir</b></span>
                                                    <i class="fa fa-calendar"></i></label>
                                                <input class="form-control" name="tarikh_akhir_1" required value="{{ date('d/m/Y',strtotime($projek->tarikh_akhir)) }}" type="text" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-hover table-responsive dataTable no-footer display nowrap" id="table" role="grid" aria-describedby="table_info">
                                    <thead>
                                        <tr role="row">
                                            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: 5px; color:#000">No.</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000"> Nama Laporan EMP</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Tarikh Kelulusan EMP</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Nama Jururunding</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($projekEMP as $emp)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$emp->laporan}}</td>
                                            <td>{{ $emp->tarikh_kelulusan ? $emp->tarikh_kelulusan->format('d/m/Y') : '' }}</td>
                                            <td>{{$emp->jururunding}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <table class="table table-hover table-responsive dataTable no-footer display nowrap" id="table" role="grid" aria-describedby="table_info">
                                    <thead>
                                        <tr role="row">
                                            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: 5px; color:#000">No.</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Nama Dokumen LDP2M2</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Tarikh Kelulusan LDP2M2</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">No Pelan</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Dokumen</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 1; ?>
                                        @foreach($projekLdp2m2 as $ldp2m2)
                                        <tr>

                                            <td>{{$no++}}</td>
                                            <td>{{$ldp2m2->nama}}</td>
                                            <td>{{ $emp->tarikh_kelulusan ? $emp->tarikh_kelulusan->format('d/m/Y') : '' }}</td>
                                            <td>{{$ldp2m2->no_plan_diluluskan}}</td>
                                            <td>
                                            @foreach ($ldp2m2->docType as $docLDP2M2)
                                            <a href="{{ Storage::url($docLDP2M2->path) }}" download> FAIL {{ $loop->iteration }} </a> <br/>
                                            @endforeach

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <div class="form-group-attached m-b-10">
                                    <div class="form-group row">
                                        <label for="name" id="susun" class="col-md-4 col-xs-12 control-label">
                                            <b>Pelan Susunatur :</b>
                                        </label>
                                        <div class="col-md-8 col-xs-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_projek" id="l" value="1" {{($borangA->status_susunatur==1)?'checked':''}} {{($borangA->status_id==602)?'disabled':''}}>
                                                <label>diluluskan</label>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_projek" id="bl" value="2" {{($borangA->status_susunatur==2)?'checked':''}} {{($borangA->status_id==602)?'disabled':''}}>
                                                <label>belum diluluskan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Tarikh Kelulusan</b></span>
                                                    <i class="fa fa-calendar"></i></label>
                                                <input id="tarikh_pelan_susunatur" class="form-control" name="tarikh_kelulusan_1" required type="text" autocomplete="off" value="{{($borangA->tarikh_kelulusan_susunatur)?date('d/m/Y',strtotime($borangA->tarikh_kelulusan_susunatur)):''}}" {{($borangA->status_id==602)?'disabled':''}} disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">No.Rujukan</b></span>
                                                </label>
                                                <input id="rujukan_pelan_susunatur" class="form-control form-control-lg" name="no_rujukan_1" type="text" value="{{($borangA->no_rujukan_susunatur)?$borangA->no_rujukan_susunatur:''}}" {{($borangA->status_id==602)?'readonly':''}} disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">No.Pelan</b></span>
                                                </label>
                                                <input id="no_pelan_susunatur" class="form-control form-control-lg" name="no_pelan_1" type="text" value="{{($borangA->no_pelan_susunatur)?$borangA->no_pelan_susunatur:''}}" {{($borangA->status_id==602)?'readonly':''}} disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group-attached m-b-10">
                                    <div class="form-group row">
                                        <label for="name" id="susun" class="col-md-4 control-label">
                                            <b>Pelan KerjaTanah:
                                            </b>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_kerja_tanah" id="tanah_lulus" value="1" {{($borangA->status_tanah==1)?'checked':''}} {{($borangA->status_id==602)?'disabled':''}}> <label>diluluskan</label>

                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_kerja_tanah" id="tanah_xlulus" value="2" {{($borangA->status_tanah==2)?'checked':''}} {{($borangA->status_id==602)?'disabled':''}}> <label>belum diluluskan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Tarikh Kelulusan</b></span>
                                                    <i class="fa fa-calendar"></i></label>
                                                <input class="form-control" name="tarikh_kelulusan_2" id="tarikh_kelulusan_2" required type="text" autocomplete="off" value="{{($borangA->tarikh_kelulusan_tanah)?date('d/m/Y',strtotime($borangA->tarikh_kelulusan_tanah)):''}}" {{($borangA->status_id==602)?'disabled':''}} disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">No.Rujukan</b></span>
                                                </label>
                                                <input class="form-control form-control-lg" name="no_rujukan_2" id="no_rujukan_2" type="text" value="{{($borangA->no_rujukan_tanah)?$borangA->no_rujukan_tanah:''}}" {{($borangA->status_id==602)?'readonly':''}} disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">No.Pelan</b></span>
                                                </label>
                                                <input class="form-control form-control-lg" name="no_pelan_2" id="no_pelan_2" type="text" placeholder="" value="{{($borangA->no_pelan_tanah)?$borangA->no_pelan_tanah:''}}" {{($borangA->status_id==602)?'readonly':''}} disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>

                            </div>
                            <div class="col-md-6">
                                <!-- Check this box if Registered Address and Correspondence Address are the same -->
                                <label>
                                    <span><b class="text-dark">MAKLUMAT PENGGERAK PROJEK</b></span>
                                </label>
                                <div class="form-group-attached m-b-10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Nama Pengerak Projek</b></span> <span style="color:red;">*</span>
                                                </label>
                                                <input class="form-control form-control-lg" name="nama_projek_2" value="{{ $projek->user->name }}" type="text" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Pengerak Projek</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" name="alamat_tapak_penggerak_projek_1" value="{{ $projek->projekdetail->alamat_surat }}" type="text" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Alamat Pengerak Projek 2</b></span>
                                                </label>
                                                <input class="form-control form-control-lg" name="alamat_tapak_penggerak_projek_2" value="{{ $projek->projekdetail->alamat_surat1 }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Alamat Pengerak Projek 3</b></span>
                                                </label>
                                                <input class="form-control form-control-lg" name="alamat_tapak_penggerak_projek_3" value="{{ $projek->projekdetail->alamat_surat2 }}" type="text" readonly>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                                </label>
                                                <input class="form-control form-control-lg" value="{{$projek->projekdetail->surat_poskod}}" onkeyup="numOnly(this)" onblur="numOnly(this)" name="poskod_2" type="text" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                                </label>
                                                <input class="form-control form-control-lg" name="negeri_2" value="{{$projek->projekdetail->surat_state->name}}" type="text" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Daerah</b></span>
                                                </label>
                                                <input class="form-control form-control-lg" name="daerah_2" value="{{$projek->projekdetail->surat_district->name}}" type="text" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="checkbox check-primary">
                                    <input {{($borangA->status_id==602)?'disabled':''}} name="usbu_email_checker" value="1" id="pertukaran_hak_milik" type="checkbox" class="hidden">
                                    <label for="pertukaran_hak_milik"><b>PERTUKARAN HAK MILIK PENGURUSAN</b></label>
                                </div>
                                <div id="form_pertukaran" class="form-group-attached m-b-10" style="display: none;">
                                    <div class="row">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Tapak</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input id="pertukaran_alamat" class="form-control form-control-lg" name="alamat_tapak_milik_pengurusan_1" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Alamat Tapak baris 2</b></span>
                                                </label>
                                                <input id="pertukaran_alamat" class="form-control form-control-lg" name="alamat_tapak_milik_pengurusan_2" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Alamat Tapak baris 3</b></span>
                                                </label>
                                                <input id="pertukaran_alamat" class="form-control form-control-lg" name="alamat_tapak_milik_pengurusan_3" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                                </label>
                                                <input id="pertukaran_poskod" class="form-control form-control-lg" maxlength="5" onkeyup="numOnly(this)" onblur="numOnly(this)" name="poskod_3" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                                </label>
                                                <select class="form-control" name="negeri_id" onchange="changestate()" id="state">                       
                                                <option value=""></option>
                                                 @foreach($statelist as $state)
                                                 <option value="{{ $state->id }}"> {{ $state->name }} </option>
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Daerah</b></span>
                                                </label>
                                                <select name="makmal_daerah_id" class="form-control" id="districts">
                                                <option value=""></option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">No.Tel</b></span><span style="color:red;">*</span>
                                                </label>
                                                <input id="pertukaran_no_tel" class="form-control form-control-lg" maxlength="12" onkeyup="numOnly(this)" onblur="numOnly(this)" name="no_tel_3" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">No Faks</b></span>
                                                </label>
                                                <input id="pertukaran_" class="form-control form-control-lg" onkeyup="numOnly(this)" onblur="numOnly(this)" name="no_faks_3" type="text" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label style="margin-left: 10px;margin-top: 6px; font-size:11.5px;font-family: 'Montserrat'; color:red">*Tekan
                                butang tambah
                                untuk tambah Pelan Kawalan: Hakisan dan Kelodakan (ESCP)
                            </label>
                            <button type="button" class="dt-button buttons-html5 btn btn-default btn-sm pull-right" data-toggle="modal" data-target=".bd-example-modal-lg" {{($borangA->status_id==602)?'disabled':''}}>
                                <span>
                                    <i class="fa fa-plus"></i>
                                    ESCP
                                </span>
                            </button>
                        </div>
                        <br>
                        <table class="table table-hover no-footer" id="tableescp" role="grid" aria-describedby="table_info">
                            <thead>
                                <tr role="row">
                                    <th bgcolor="#f0f0f0" class="fit align-top text-center" style="text-align:center;width: 5%; color:#000">No.</th>
                                    <th bgcolor="#f0f0f0" class="align-top text-center" style="text-align:center;width: 20%; color:#000"> Nama</th>
                                    <th bgcolor="#f0f0f0" class="align-top text-center" style="text-align:center;width: 20%; color:#000">Status</th>
                                    <th bgcolor="#f0f0f0" class="align-top text-center" style="text-align:center;width: 10%; color:#000">Tarikh Kelulusan</th>
                                    <th bgcolor="#f0f0f0" class="align-top text-center" style="text-align:center;width: 20%; color:#000">
                                        No.Rujukan
                                    </th>
                                    <th bgcolor="#f0f0f0" class="align-top text-center" style="text-align:center;width: 10%; color:#000">No
                                        Pelan
                                    </th>
                                    <th bgcolor="#f0f0f0" class="align-top text-center" style="text-align:center;width: 5%; color:#000">
                                        Tindakan
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="alert alert-primary" role="alert" style="background-color: #563D7C;color:white; font-size:11.5px; font-family: 'Montserrat'">
                                        <strong>
                                            STATUS KEMAJUAN KERJA PROJEK
                                        </strong>
                                    </div>
                                    @if(!is_null($borangA->statusKemajuan))
                                    <div class="form-check form-check-inline" style="margin-bottom:0px">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="belum dimulakan" id="belumdimulakan" type="radio" {{($borangA->status_id==602)?'disabled':''}} {{($borangA->statusKemajuan->status_kemajuan=="belum dimulakan")?'checked':''}} class="hidden">
                                            <label for="belumdimulakan">BELUM DIMULAKAN</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="kerja tanah" id="kerja_tanah" type="radio" {{($borangA->status_id==602)?'disabled':''}} {{($borangA->statusKemajuan->status_kemajuan=="kerja tanah")?'checked':''}} class="hidden">
                                            <label for="kerja_tanah">KERJA TANAH</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="pembinaan" id="pembinaan" type="radio" {{($borangA->status_id==602)?'disabled':''}} {{($borangA->statusKemajuan->status_kemajuan=="pembinaan")?'checked':''}} class="hidden">
                                            <label for="pembinaan">PEMBINAAN</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="operasi" id="operasi" type="radio" {{($borangA->status_id==602)?'disabled':''}} {{($borangA->statusKemajuan->status_kemajuan=='operasi')?'checked':''}} class="hidden">
                                            <label for="operasi">OPERASI</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="siap" id="siap" type="radio" {{($borangA->status_id==602)?'disabled':''}} {{($borangA->statusKemajuan->status_kemajuan=='siap')?'checked':''}} class="hidden">
                                            <label for="siap">SIAP</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="tangguh" id="tangguh" type="radio" {{($borangA->status_id==602)?'disabled':''}} {{($borangA->statusKemajuan->status_kemajuan=='tangguh')?'checked':''}} class="hidden">
                                            <label for="tangguh">TANGGUH</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="terbengkalai" id="terbengkalai" {{($borangA->status_id==602)?'disabled':''}} {{($borangA->statusKemajuan->status_kemajuan=='terbengkalai')?'checked':''}} type="radio" class="hidden">
                                            <label for="terbengkalai">TERBENGKALAI</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">

                                            <div class="form-group form-group-default">
                                                <div class="form-input-group">
                                                    <label>
                                                        <span id="label_">Tarikh Awal</span>
                                                        <i class="fa fa-calendar"></i>
                                                    </label>
                                                    <input class="form-control " name="tarikh_awal_4" id="tarikh_awal_4" autocomplete="off" type="text" value="{{($borangA->statusKemajuan->tarikh_awal)?date('d/m/Y',strtotime($borangA->statusKemajuan->tarikh_awal)):''}}" {{($borangA->status_id==602)?'disabled':''}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <div class="form-input-group">
                                                    <label>
                                                        <span id="label_">Tarikh AKhir</span>
                                                        <i class="fa fa-calendar"></i></label>
                                                    <input class="form-control " name="tarikh_akhir_4" id="tarikh_akhir_4" autocomplete="off" type="text" value="{{($borangA->statusKemajuan->tarikh_akhir)?date('d/m/Y',strtotime($borangA->statusKemajuan->tarikh_akhir)):''}}" {{($borangA->status_id==602)?'disabled':''}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Peratus (%)</b></span>
                                                </label>
                                                <input class="form-control form-control-lg" name="peratus_kemajuan" id="peratus_kemajuan" max="100" min="1" type="number" value="{{($borangA->statusKemajuan->peratus)?$borangA->statusKemajuan->peratus:''}}" {{($borangA->status_id==602)?'readonly':''}}>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-check form-check-inline" style="margin-bottom:0px">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="belum dimulakan" id="belumdimulakan" type="radio" class="hidden" {{($borangA->status_id==602)?'disabled':''}}>
                                            <label for="belumdimulakan">BELUM DIMULAKAN</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="kerja tanah" id="kerja_tanah" type="radio" class="hidden" {{($borangA->status_id==602)?'disabled':''}}>
                                            <label for="kerja_tanah">KERJA TANAH</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="pembinaan" id="pembinaan" type="radio" class="hidden" {{($borangA->status_id==602)?'disabled':''}}>
                                            <label for="pembinaan">PEMBINAAN</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="operasi" id="operasi" type="radio" class="hidden" {{($borangA->status_id==602)?'disabled':''}}>
                                            <label for="operasi">OPERASI</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="siap" id="siap" type="radio" class="hidden" {{($borangA->status_id==602)?'disabled':''}}>
                                            <label for="siap">SIAP</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="tangguh" id="tangguh" type="radio" class="hidden" {{($borangA->status_id==602)?'disabled':''}}>
                                            <label for="tangguh">TANGGUH</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <div class="radio radio-primary">
                                            <input name="status_kemajuan_projek" value="terbengkalai" id="terbengkalai" type="radio" class="hidden" {{($borangA->status_id==602)?'disabled':''}}>
                                            <label for="terbengkalai">TERBENGKALAI</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">

                                            <div class="form-group form-group-default">
                                                <div class="form-input-group">
                                                    <label>
                                                        <label>
                                                            <span id="label_">Tarikh Awal</span>
                                                            <i class="fa fa-calendar"></i></label>
                                                        <input class="form-control " name="tarikh_awal_4" id="tarikh_awal_4" autocomplete="off" type="text" {{($borangA->status_id==602)?'disabled':''}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <div class="form-input-group">
                                                    <label>
                                                        <span id="label_">Tarikh AKhir</span>
                                                        <i class="fa fa-calendar"></i></label>
                                                    <input class="form-control " name="tarikh_akhir_4" id="tarikh_akhir_4" autocomplete="off" type="text" {{($borangA->status_id==602)?'disabled':''}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Peratus (%)</b></span>
                                                </label>
                                                <input class="form-control form-control-lg" name="peratus_kemajuan" id="peratus_kemajuan" max="100" min="1" type="number" {{($borangA->status_id==602)?'disabled':''}}>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            @if($projek->jenis_pakej=='Berpakej')
                            <div class="col-md-12">
                                <div class="alert alert-primary" role="alert" style="background-color: #563D7C;color:white ;font-size:11.5px; font-family: 'Montserrat'">
                                    <strong>
                                        FASA
                                    </strong>
                                </div>
                                <br>
                                <table class="table table-hover table-responsive dataTable no-footer display nowrap" id="table" role="grid" aria-describedby="table_info">
                                    <thead>
                                        <tr role="row">
                                            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: 5px; color:#000">No.</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000"> Nama </th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Tarikh Mula</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Tarikh Akhir</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000"> Peratus (%)</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000"> Status Kemajuan</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Jadual</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($projekFasa as $fasa)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$fasa->nama_pakej}}</td>
                                            <td>{{ date('d-m-Y',strtotime($fasa->tarikh_mula)) }}</td>
                                            <td>{{ date('d-m-Y',strtotime($fasa->tarikh_akhir)) }}</td>
                                            <td><input type="number" class="form-control input-radius-all border border-default" name="peratus_fasa[]"></td>
                                            <td>
                                                <select id="selectrequired" class="select-normal full-width" required data-error-msg="Silih pilih cara penerbitan." name="status_kemajuan_fasa[]" style="border: none">
                                                    <option selected=""></option>
                                                    <option value="belumdimulakan">BELUM DIMULAKAN</option>
                                                    <option value="kerjatanah">KERJA TANAH</option>
                                                    <option value="pembinaan">PEMBINAAN</option>
                                                    <option value="operasi">OPERASI</option>
                                                    <option value="siap">SIAP</option>
                                                    <option value="tangguh">TANGGUH</option>
                                                    <option value="terbengkalai">TERBENGKALAI</option>
                                                </select>
                                            </td>
                                            <td>
                                                <span style="text-align:center;font-size:12px padding-bottom:5px" class="label label-lg label-light-blue label-inline">muat turun</span>
                                                <input type="hidden" name="fasa_id[]" value="{{$fasa->id}}">
                                            </td>
                                            <td><span style="text-align:center;font-size:12px padding-bottom:5px" class="label label-lg label-light-blue label-inline">muat turun</span></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                        <br><br>
                        <div class="form-group form-group-default  dim">
                            <label style="font-size:13px; font-family: 'Montserrat' ">
                                <span id="label_checkbox_declaration_in_modal">Perakuan</span>
                            </label>
                            <div class="checkbox check-primary ">
                                <input name="checkbox_declaration_in_modal_1" value="2" id="confirm_simpan" type="checkbox" {{($borangA->status_id==602)?'disabled':''}} {{($borangA->status_id==602)?'checked':''}}>
                                <label style="font-size:13px; font-family: 'Montserrat'" for="confirm_simpan">
                                    DENGAN INI SAYA MENGAKU DAN MENGESAHKAN SEMUA KENYATAAN DAN BUTIR-BUTIR YANG DIKEMUKAKAN ADALAH BENAR.
                                </label>
                            </div>
                        </div>

                        <div id="simpan_button" class="col-md-12 p-t-20" style="display: none;">
                            <ul class="pager wizard no-style">
                                <li>
                                    <input type="hidden" name="borangA_id" value="{{$borangA->id}}">
                                    <input type="hidden" name="projek_id" value="{{Request::segment(3)}}">
                                    <button class="btn btn-info btn-cons from-left pull-right" onclick="submitborangA('form-sahBorangA')" type="button">
                                        <span>Simpan</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('form.modal-tambah_escp')
</form>


@push('js')
<script type="text/javascript">

function changestate() {
        
            var id = $('#state').val();
        
            $.ajax({
            url: "{{ url('getdistricts') }}"+'/'+id + '/' + 3,
            method: "GET",
        
            success: function(response){
                 var len = response.districts.length;
                 
                $("#districts").empty();
            
                for( var i = 0; i<len; i++){
                    var id = response.districts[i]['district_id'];
                    var name = response.districts[i]['name'];
                        $("#districts").append("<option value='"+id+"'>"+name+"</option>");
                }
               
            },
            error: function(response){
            }
        });
    }
    $(document).ready(function() {
        var today = new Date();
        var today2 = new Date();
        var today3 = new Date();

        $("#tarikh_kelulusan_escp").datepicker({
            format: 'dd/mm/yyyy'
        });

        $('#tarikh_kelulusan_escp').datepicker({
            autoclose: true,
            endDate: "today",
            maxDate: today
        }).on('changeDate', function(ev) {
            $(this).datepicker('hide');
        });


        $('#tarikh_kelulusan_escp').keyup(function() {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9^-]/g, '');
            }
        });

        $('#tarikh_pelan_susunatur').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            endDate: "today",
            maxDate: today2
        }).on('changeDate', function(ev) {
            $(this).datepicker('hide');
        });


        $('#tarikh_pelan_susunatur').keyup(function() {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9^-]/g, '');
            }
        });

        $('#tarikh_kelulusan_2').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            endDate: "today",
            maxDate: today3
        }).on('changeDate', function(ev) {
            $(this).datepicker('hide');
        });


        $('#tarikh_kelulusan_2').keyup(function() {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9^-]/g, '');
            }
        });
    });

    $(function() {
        $("#peratus_kemajuan").change(function() {
            var max = parseInt($(this).attr('max'));
            var min = parseInt($(this).attr('min'));

            if ($(this).val() > max) {
                $(this).val(max);
            } else if ($(this).val() < min) {
                $(this).val(min);
            }
        });
    });

    function numOnly(selector) {
        selector.value = selector.value.replace(/[^0-9]/g, '');
    }

    $('#confirm_simpan').change(function() {
        if ($(this).is(':checked') == true) {
            $('#simpan_button').show();
        } else {
            $('#simpan_button').hide();
        }
    });

    $('#pertukaran_hak_milik').change(function() {
        if ($(this).is(':checked') == true) {
            $('#form_pertukaran').show();
        } else {
            $('#form_pertukaran').hide();
        }
    });

    $('#bl').change(function() {
        $('#tarikh_pelan_susunatur').prop('disabled', true);
        $('#rujukan_pelan_susunatur').prop('disabled', true);
        $('#no_pelan_susunatur').prop('disabled', true);
        $('#tarikh_pelan_susunatur').val('');
        $('#rujukan_pelan_susunatur').val('');
        $('#no_pelan_susunatur').val('');
    });

    $('#l').change(function() {
        $('#tarikh_pelan_susunatur').prop('disabled', false);
        $('#rujukan_pelan_susunatur').prop('disabled', false);
        $('#no_pelan_susunatur').prop('disabled', false);
    });

    $('#tanah_xlulus').change(function() {
        $('#tarikh_kelulusan_2').prop('disabled', true);
        $('#no_rujukan_2').prop('disabled', true);
        $('#no_pelan_2').prop('disabled', true);
        $('#tarikh_kelulusan_2').val('');
        $('#no_rujukan_2').val('');
        $('#no_pelan_2').val('');
    });

    $('#tanah_lulus').change(function() {
        $('#tarikh_kelulusan_2').prop('disabled', false);
        $('#no_rujukan_2').prop('disabled', false);
        $('#no_pelan_2').prop('disabled', false);
    });

    $('#belum_diluluskan_escp').change(function() {
        $('#tarikh_kelulusan_escp').prop('disabled', true);
        $('#no_rujukan_escp').prop('disabled', true);
        $('#no_pelan_escp').prop('disabled', true);
        $('#tarikh_kelulusan_escp').val('');
        $('#no_rujukan_escp').val('');
        $('#no_pelan_escp').val('');
    });

    $('#dilulukan_escp').change(function() {
        $('#tarikh_kelulusan_escp').prop('disabled', false);
        $('#no_rujukan_escp').prop('disabled', false);
        $('#no_pelan_escp').prop('disabled', false);
    });

    $('#belumdimulakan').change(function() {
        $('#tarikh_awal_4').prop('disabled', true);
        $('#tarikh_akhir_4').prop('disabled', true);
        $('#peratus_kemajuan').prop('disabled', true);
        $('#tarikh_awal_4').val('');
        $('#tarikh_akhir_4').val('');
        $('#peratus_kemajuan').val('');
    });

    $('#kerja_tanah').change(function() {
        $('#tarikh_awal_4').prop('disabled', false);
        $('#tarikh_akhir_4').prop('disabled', false);
        $('#peratus_kemajuan').prop('disabled', false);
    });

    $('#pembinaan').change(function() {
        $('#tarikh_awal_4').prop('disabled', false);
        $('#tarikh_akhir_4').prop('disabled', false);
        $('#peratus_kemajuan').prop('disabled', false);
    });

    $('#operasi').change(function() {
        $('#tarikh_awal_4').prop('disabled', false);
        $('#tarikh_akhir_4').prop('disabled', false);
        $('#peratus_kemajuan').prop('disabled', false);
    });
    $('#siap').change(function() {
        $('#tarikh_awal_4').prop('disabled', false);
        $('#tarikh_akhir_4').prop('disabled', false);
        $('#peratus_kemajuan').prop('disabled', false);
    });

    $('#tangguh').change(function() {
        $('#tarikh_awal_4').prop('disabled', false);
        $('#tarikh_akhir_4').prop('disabled', false);
        $('#peratus_kemajuan').prop('disabled', false);
    });
    $('#terbengkalai').change(function() {
        $('#tarikh_awal_4').prop('disabled', false);
        $('#tarikh_akhir_4').prop('disabled', false);
        $('#peratus_kemajuan').prop('disabled', false);
    });

    var table = $('#tableescp');
    var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "searchable": false,
        "ajax": "{{ route('form.tableescp',$borangA->id) }}",
        "columns": [{
                data: 'index',
                defaultContent: '',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: "nama",
                name: "nama",
                defaultContent: "-",
                "searchable": false,
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },
            {
                data: "status",
                name: "status",
                defaultContent: "-",
                "searchable": false,
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },
            {
                data: "tarikh_kelulusan",
                name: "tarikh_kelulusan",
                defaultContent: "-",
                "searchable": false,
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },
            {
                data: "no_rujukan",
                name: "no_rujukan",
                defaultContent: "-",
                "searchable": false,
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },

            {
                data: "no_pelan",
                name: "no_pelan",
                defaultContent: "-",
                "searchable": false,
                render: function(data, type, row) {
                    return $("<div/>").html(data).text();
                }
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            },
        ],
        "columnDefs": [{
            className: "nowrap",
            "targets": [5]
        }],
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
            "sEmptyTable": "Tiada data",
            "sInfo": "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
            "sInfoEmpty": "Paparan 0 hingga 0 dari 0 rekod",
            "sInfoFiltered": "(Ditapis dari jumlah _MAX_ rekod)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Papar _MENU_ rekod",
            "sLoadingRecords": "Diproses...",
            "sProcessing": "Sedang diproses...",
            "sSearch": "Carian:",
            "sZeroRecords": "Tiada padanan rekod yang dijumpai.",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelum",
                "sNext": "Seterusnya",
                "sLast": "Akhir"
            },
            "oAria": {
                "sSortAscending": ": diaktifkan kepada susunan lajur menaik",
                "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
            }
        },
        "iDisplayLength": 10
    };

    table.dataTable(settings);

    function submitFormEscp(form_id) {
        var form = $("#form-tambahescp");

        var formData = new FormData();
        formData.append('escp_name', $("#escp_name").val());
        formData.append('borang_id', $("#borang_id").val());
        formData.append('status_escp', $('input[name="status_escp"]:checked').val());
        formData.append('tarikh_kelulusan_escp', $("#tarikh_kelulusan_escp").val());
        formData.append('no_rujukan_escp', $("#no_rujukan_escp").val());
        formData.append('no_pelan_escp', $("#no_pelan_escp").val());

        Swal.fire({
            title: 'Adakah Anda Pasti?',
            text: 'Data akan disimpan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#038cfc',
            cancelButtonColor: '#999',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ route('form.hantarBorangESCP') }}",
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data.status == 'success'){
                            swal.fire(data.test, data.text, data.status);
                            $("#tambahescp").modal("hide");
                            table.api().ajax.reload(null, false);
                            $('#escp_name').val('');
                            $('#tarikh_kelulusan_escp').val('');
                            $('#no_rujukan_escp').val('');
                            $('#no_pelan_escp').val('');

                        } else if (!data.success && data.code == 422) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Sila Penuhkan Ruang Yang Diperlukan',
                                // text: data.message,
                                showConfirmButton: true,
                            });
                            
                            let html = ``;
                            html += `<div class="alert alert-danger alert-dismissible fade show" id="alertESCP">`;
                            html += `<button style="pull-right" type="button" class="close" data-dismiss="alert"></button>`;
                            $.each(data.message, (key, value) => {
                                html += `<strong>&bull; ${value}</strong><br />`;
                            });
                            html += `</div>`;

                            $('#alertESCP').empty().append(html);
                        } else{
                            swal.fire(data.test, data.text, data.status);
                            $("#tambahescp").modal("hide");
                            table.api().ajax.reload(null, false);
                            $('#escp_name').val('');
                            $('#tarikh_kelulusan_escp').val('');
                            $('#no_rujukan_escp').val('');
                            $('#no_pelan_escp').val('');
                        }
                    },
                    fail: (data) => {
                        Swal.fire(
                            'Ralat!',
                            'Berlaku ralat, kami mohon maaf atas kesulitan.',
                            'danger'
                        )
                    }
                });
            }
        })
    }

    function submitborangA(form_id) {

        var form = $("#form-sahBorangA");
        Swal.fire({
            title: 'Adakah Anda Pasti?',
            text: 'Data akan disimpan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#038cfc',
            cancelButtonColor: '#999',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            $.ajax({
                url: "{{ route('form.sahBorangA') }}",
                method: "POST",
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.success) {
                        Swal.fire(data.test, data.text, data.status);
                        location.reload();

                    }  else if (!data.success && data.code == 422) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Sila Penuhkan Ruang Yang Diperlukan',
                            // text: data.message,
                            showConfirmButton: true,
                        });
                        
                        let html = ``;
                        html += `<div class="alert alert-danger alert-dismissible fade show" id="alertA">`;
                        html += `<button type="button" class="close" data-dismiss="alert"></button>`;
                        $.each(data.message, (key, value) => {
                            html += `<strong>&bull; ${value}</strong><br />`;
                        });
                        html += `</div>`;
                        $(`#alertA`).empty().append(html);

                    }else{
                        swal.fire(data.test, data.text, data.status);
                        location.reload();
                    }
                },
                fail: (data) => {
                    Swal.fire(
                        'Ralat!',
                        'Berlaku ralat, kami mohon maaf atas kesulitan.',
                        'danger'
                    )
                }
            });
        })
    }

    function removeBorang(id) {
        Swal.fire({
            title: 'Adakah anda pasti?',
            text: 'Anda tidak akan dapat memulihkan data ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#fc0330',
            cancelButtonColor: '#999',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{url('/form/deleteescp')}}" + "/" + id,
                    method: "GET",
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        swal.fire(data.test, data.text, data.status);
                        table.api().ajax.reload(null, false);
                    },
                    fail: (data) => {
                        Swal.fire(
                            'Ralat!',
                            'Berlaku ralat, kami mohon maaf atas kesulitan.',
                            'danger'
                        )
                    }
                });
            }

        })

    }

    var sDate, eDate;
    var tarikh_awal_projek = $("#tarikh_awal_1").datepicker('getUTCDate');
    var tarikh_akhir_projek = $("#tarikh_akhir_1").datepicker('getUTCDate');

    $("#tarikh_awal_4").datepicker({
        format: 'dd/mm/yyyy'
    });
    $("#tarikh_akhir_4").datepicker({
        format: 'dd/mm/yyyy'
    });


    $("#tarikh_awal_4").datepicker().on('changeDate', function(e) {
        sDate = new Date($(this).datepicker('getUTCDate'));
        checkDate();
        checkdateProjek();
        checkDateprojek2()
    });

    $("#tarikh_akhir_4").datepicker().on('changeDate', function(date) {
        eDate = new Date($(this).datepicker('getUTCDate'));
        checkDate();
        checkdateProjek();
        checkDateprojek2()
    });

    function checkDate() {
        if (sDate && eDate && (eDate < sDate)) {
            swal.fire("Gagal", "Tarikh akhir hendaklah lebih dari tarikh awal.", "error");
            $("#tarikh_akhir_4").val($("#tarikh_awal_4").val());
        }
    }

    function checkdateProjek() {
        if (sDate < tarikh_awal_projek) {
            swal.fire("Gagal", "Tarikh awal status hendaklah melebihi dari tarikh awal projek.", "error");
            $("#tarikh_awal_4").val($("#tarikh_awal_1").val());
        }
    }

    function checkDateprojek2() {
        if (eDate > tarikh_akhir_projek) {
            swal.fire("Gagal", "Tarikh akhir status hendaklah tidak melebihi dari tarikh akhir projek.", "error");
            $("#tarikh_akhir_4").val($("#tarikh_akhir_1").val());
        }
    }
</script>

@endpush