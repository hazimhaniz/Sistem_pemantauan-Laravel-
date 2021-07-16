@extends('layouts.app')
@include('plugins.dropzone')
@include('plugins.datatables')
@section('content')

<style type="text/css">
    .uppercase {
        text-transform: uppercase !important;
    }
    label {text-transform: none !important;}

    .hide{
        display: none;
    }
    
</style>
<?php //dd($id); ?>
    <!-- START JUMBOTRON -->
    <div class="" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Pendaftaran Kumpulan</a></li>
                    <li class="breadcrumb-item active">Environmental Monitoring Consultant (EMC)</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <!-- START card -->
                        <div class="card card-transparent">
                            <!-- <div class="card-block p-t-0">
                                <h3 class='m-t-0'>Environmental Monitoring Consultant (EMC)</h3>
                                <p class="small hint-text m-t-5">
                                <p class="hint-text">Pengurusan pendaftaran environmental monitoring consultant perlu dilaksanakan di ruangan bawah ini.</p>
                                </p>
                            </div> -->
                        </div>
                        <!-- END card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END JUMBOTRON -->

    <!-- START CONTAINER FLUID -->
    <div class=" container-fluid container-fixed-lg bg-white">
        <!-- START card -->
        <div class="card card-transparent">

            <br>
            <div class="border p-4 m-10">
                <h6 style="font-family: 'Montserrat';text-transform: uppercase;letter-spacing: 0.06em;font-size: 13px;font-weight: 500; color: #575757"><strong>Jenis Pengawasan</strong></h6><br>
                @foreach($JenisPengawasan as $ap)
                @foreach($MasterPengawasan as $ip)
                @if($ip->id == $ap)
                 <ul>
                     <li>
                        {{$ip->jenis_pengawasan}}
                     </li>
                 </ul>
                
                @endif
                @endforeach
                @endforeach
            </div>

            <div class="card-header px-0">
                <div class="card-title">
                    <button onclick="addData()" class="btn btn-success btn-cons"><i class="fa fa-plus m-r-5"></i>Pendaftaran Baharu EMC</button>
                   
                </div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian...">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-block">
                <table class="table table-hover table-responsive" id="table" style="width: 100% !important" border="1px">
                    <thead>
                    <tr>
                        <th class="bold fit">Bil.</th>
                        <th class="bold" width="20%">Nama</th>
                        <th class="bold" width="20%">No Kad Pengenalan</th>
                        <th class="bold" width="20%">Nama Syarikat</th>
                        <!-- <th class="bold">Alamat Syarikat</th> -->
                        <!-- <th class="bold">No Faks<br>No Tel</th> -->
                        <th class="bold">Tarikh Daftar</th>
                        <th class="bold">Skop Pengawasan</th>
                        <th class="bold">Status</th>
                        <th class="bold" width="10%">Tindakan</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
      
        <!-- END card -->
    </div>
    <!-- END CONTAINER FLUID -->


    <!-- START Modal Add Data-->
    <div class="modal fade" id="modal-add"  role="dialog" aria-labelledby="addModalTitle" aria-hidden="true" style="overflow-y: auto !important;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle"><span class="bold">Pendaftaran Environmental Monitoring Consultant (EMC) </span></h5>
                    <!-- <small class="text-muted m-b-20">Sila isi ruangan di bawah bagi pendaftaran baharu environmental monitoring officer.</small> -->
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                  <form id='form-add' role="form" method="post" action="{{ route('external.pengguna.pengurusan_emc') }}">
                    <input type="hidden" id="emcid" name="emcid" value="">

                    <div id="kp" class="form-group form-group-default ">
                        <label>
                            <span id="label_name">No. Kad Pengenalan</span>
                            <span style="color:red;">*</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="No. Kad Pengenalan ini akan digunakan sebagai ID untuk log masuk ke dalam sistem"></i>  </label>
                        <input id="username" class="form-control " name="username" placeholder="Masukkan nombor kad pengenalan tanpa  '-'" required="" title="" type="text" @if($user) value="{{$user->username}}" @endif minlength="12" maxlength="12"
                    onkeypress ="return onlyNumberKey(event);" onclick="hideerror('kp')">
                        <label id="kperror" class="error" style="color: red;display: none;">Sila isi no. kad pengenalan yang sah.</label>
                    </div>

                    <div id="nama" class="form-group form-group-default ">
                    	<label>
                    		<span id="label_name">Nama</span>
                            <span style="color:red;">*</span>
                    		<i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Nama penuh environmental monitoring consultant sama seperti nama di dalam Mykad/Passport"></i>	</label>
                    	<input style="text-transform: none !important;" id="name" class="form-control " title="" name="name" placeholder="" required="" type="text" @if($user) value="{{$user->name}}" @endif  onclick="hideerror('nama')">
                    </div>

                    <div id="comname" class="form-group form-group-default ">
                        <label>
                            <span id="label_name">Nama Syarikat</span>
                            <span style="color:red;">*</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth: Syarikat Sdn Bhd"></i>  </label>
                        <input id="company_name" class="form-control " name="company_name" placeholder="" required="" type="text" @if($entity) value="{{$entity->syarikat}}" @endif  onclick="hideerror('comname')">
                    </div>

                    <div id="alacom" class="form-group form-group-default ">
                        <label>
                            <span id="label_company_address">Alamat Syarikat</span>
                            <span style="color:red;">*</span><br>
                            <!-- <span id="label_company_address">Alamat 1</span> -->
                            </label>
                            <input id="company_address" class="form-control " title="" name="company_address" placeholder="Alamat 1" required=""  onclick="hideerror('alacom')" @if($entity) value=" {{$entity->alamatsyarikat}}" @endif maxlength="250">
                            <label id="alacomerror" style="display: none;font-size: 11px;color: #f35958;">Sila isi alamat syarikat</label>
                    </div>

                    <div id="alacom" class="form-group form-group-default ">
                        <label>
                            <!-- <span id="label_company_address">Alamat 2</span> -->
                            </label>
                            <input id="company_address1" class="form-control " title="" name="company_address1" placeholder="Alamat 2"  onclick="hideerror('alacom')" @if($entity) value=" {{$entity->alamatsyarikat}}" @endif maxlength="250">
                            <label id="alacomerror" style="display: none;font-size: 11px;color: #f35958;">Sila isi alamat syarikat</label>
                    </div>

                    <div id="alacom" class="form-group form-group-default ">
                        <label>
                            <!-- <span id="label_company_address">Alamat 3</span> -->
                            </label>
                            <input id="company_address2" class="form-control " title="" name="company_address2" placeholder="Alamat 3"  onclick="hideerror('alacom')" @if($entity) value=" {{$entity->alamatsyarikat}}" @endif maxlength="250">
                            <label id="alacomerror" style="display: none;font-size: 11px;color: #f35958;">Sila isi alamat syarikat</label>
                    </div>

                    <div id="posk" class="form-group form-group-default ">
                        <label>
                            <span id="label_username">Poskod</span>
                            <span style="color:red;">*</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : 12345"></i>  </label>
                        <input id="poskod" class="form-control " title="" onkeypress ="return onlyNumberKey(event);" name="poskod" minlength="5" maxlength="5" required onkeyup="" onclick="hideerror('posk')">
                        <label id="poskerror" style="display: none;font-size: 11px;color: #f35958;">Sila isi poskod yang sah.</label>
                    </div>

                    <div id="address_id1">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="stat" class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                    <label>
                                    <span id="label_Negeri">Negeri</span>
                                    <span style="color:red;">*</span>
                                    </label>
                                    <select id="state_id1" name="state_registered" class="full-width autoscroll state" data-init-plugin="select2" required="" onchange="" onclick="hideerror('stat')">
                                    @if($entity)
                                        @foreach($state as $index => $states)
                                            @if($entity->negeri == $states->id)
                                            <option value="{{ $states->id }}" selected>{{ $states->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="" selected="" disabled="">Pilih Negeri</option>
                                    @endif
                                     @foreach($state as $index => $states)
                                        <option value="{{ $states->id }}">{{ $states->name }}</option>
                                     @endforeach
                                    </select>
                                    <label id="staterror" style="display: none;font-size: 11px;color: #f35958;">Sila isi negeri</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="dist" class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                    <label>
                                    <span id="label_Daerah">Daerah</span>
                                    <span style="color:red;">*</span>
                                    </label>
                                    <select id="district_id1" name="district_registered" class="full-width autoscroll district" data-init-plugin="select2" required="" onchange="" onclick="hideerror('dist')">
                                    </select>
                                    <label id="disterror" style="display: none;font-size: 11px;color: #f35958;">Sila isi daerah</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <div id="div-mel" class="form-group form-group-default ">
                        <label>
                            <span id="label_username">E-mel</span>
                            <span style="color:red;">*</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="cth : email@gmail.com"></i>  </label>
                        <input id="email" class="form-control " title="" name="email" @if($user) value="{{$user->email}}" @endif required type="email" onkeyup="" onclick="hideerror('div-mel')">
                        <label id="emelerror" class="error" style="color: red;display: none;">E-mel xxxxx@doe.gov.my tidak boleh di daftar sebagai pihak syarikat.</label>
                        <label id="melerror" class="error" style="color: red;display: none;">Sila pastikan e-mel dalam format yang sah.</label>
                    </div>

                    <!-- <div class="form-group form-group-default required" style="display: none">
                        <label>
                            <span id="label_username">Nama Pegawai Perhubungan</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="eg : Abu bin Ali"></i>  </label>
                        <input id="officer_name" class="form-control " name="officer_name" type="hidden" required onkeyup="">
                    </div> -->

                    <div class="row">
                        <div class="col-md-6">
                            <div id="notel" class="form-group form-group-default ">
                                <label>
                                    <span id="label_username">No. Tel</span>
                                    <span style="color:red;">*</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : 013123456"></i>  </label>
                                <input id="no_tel" class="form-control" title="" name="no_tel" type="text" @if($user) value="{{$user->phone}}" @endif required  onkeypress="return onlyNumberKey(event)" onkeyup="" minlength="10" maxlength="11" onclick="hideerror('notel')">
                                <label id="telefonerror" class="error" style="color: red;display: none;">Sila isi nombor telefon yang sah.</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="nofaks" class="form-group form-group-default ">
                                <label>
                                    <span id="label_username">No. Faks</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : 013123456"></i>  </label>
                                <input id="faks" class="form-control " name="faks" type="text" @if($user) value="{{$user->fax}}" @endif onkeypress="return onlyNumberKey(event)" onkeyup="" minlength="10" maxlength="11" onclick="hideerror('nofaks')">
                                <label id="nofakserror" class="error" style="color: red;display: none;">Sila isi nombor faks yang sah.</label>
                            </div>
                        </div>
                    </div>
                  </form>

                  <br>
                  <br>
                <h5 class="modal-title" id="addModalTitle">Maklumat Pengawasan dan Makmal Akreditasi<span class="bold"></span></h5><br>
                <button class="btn btn-success btn-cons pull-left" type="button" onclick="openmakmal()">
                        <span>+ Maklumat Makmal Akreditasi</span>
                </button><br><br>
                <p><b><a href="http://www.jsm.gov.my/accredited-organisation-directories" target="_blank">* Klik untuk ke laman web Direktori Organisasi Bertauliah (Accredited Organisation Directories) sebagai rujukan.</a></b></p>
                <form id='makmalAkreditasi' role="form" class="hide" method="post" action="{{ route('makmalAkreditasi.simpan') }}" enctype="multipart/form-data">
                    
                    <input type="hidden" id="labid" name="id" value="">

                    <div id="pengawasan" class="form-group form-group-default ">
                        <label>
                            <span id="label_location">Jenis Pengawasan</span>
                            <span style="color:red;">*</span>
                        </label>
                        <select class="form-group full-width autoscroll state" name="Pengawasan" id="Pengawasan" data-init-plugin="select2">
                            <option id="pilih" value="" selected="" disabled="">Pilih Jenis Pengawasan</option>
                            @foreach($MasterPengawasan as $MasterPengawasans)
                            @foreach($JenisPengawasan as $jenis)
                            @if($MasterPengawasans->id == $jenis)
                            <option value="{{$MasterPengawasans->id}}">{{$MasterPengawasans->jenis_pengawasan}}</option>
                            @endif
                            @endforeach
                            @endforeach
                        </select>
                        <label id="pengawasanerror" class="error" style="color: red;display: none;"></label>
                    </div>
                    <!-- 'mode' => 'hidden', -->
                    <!-- @include('components.input', [
                    'label' => 'Kod Makmal Akreditasi',
                    'name' => 'kodmakmal',
                    'id' => 'lab',
                    'mode' => 'required',
                    ]) -->
                    <div class="form-group form-group-default required">
                        <label>
                            <span id="label_kodmakmal">Kod Makmal Akreditasi</span>
                            <span style="color:red;">*</span>
                        </label>
                        <input id="kodmakmal" class="form-control " name="kodmakmal" placeholder="" onkeypress="" required="" type="text" title="" value="">
                    </div>

                    <!-- <button class="btn btn-successs btn-cons from-left pull-right" type="button" onclick="checkmakmal()">
                        <span>Kemaskini Kod Makmal Akreditasi</span>
                    </button><br><br> -->
                    
                    <!-- @include('components.input', [
                    'label' => 'Nama Makmal Akreditasi',
                    'info' => 'Cth: Makmal 1 ',
                    'name' => 'lab',
                    'id' => 'lab',
                    'mode' => 'required',
                    ]) -->

                    <div class="form-group form-group-default ">
                        <label>
                            <span id="label_lab">Nama Makmal Akreditasi</span>
                            <span style="color:red;">*</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth: Makmal 1 "></i> </label>
                        <input id="labname" class="form-control " name="labname" placeholder="" onkeypress="" required="" type="text" value="" title="" >
                    </div>

                    <!-- @include('components.input', [
                    'label' => 'No Tel Makmal Akreditasi',
                    'info' => 'Cth : 013123456',
                    'mode' => 'required',
                    'name' => 'lab_tel',
                    'id' => 'lab_tel',
                    ]) -->

                    <div class="form-group form-group-default">
                        <label class="">
                            <span id="label_lab_tel">No Tel Makmal Akreditasi</span>
                            <span style="color:red;">*</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : 013123456"></i>       
                        </label>
                        <input id="lab_tel1" class="form-control" name="lab_tel1" onkeypress="return onlyNumberKey(event)" placeholder="" title="" onkeypress="" required="" type="text" value="" minlength="10" maxlength="11">
                        <label id="lab_telerror" class="error" style="color: red;display: none;">Sila isi nombor telefon yang sah.</label>
                    </div>

                    <!-- @include('components.input', [
                    'label' => 'Alamat Makmal Akreditasi',
                    'info' => 'Alamat Makmal Akreditasi',
                    'name' => 'location',
                    'id' => 'location',
                    'mode' => 'required',
                    'value' => '',
                    ]) -->

                    <div class="form-group form-group-default ">
                        <label>
                            <span id="label_location">Alamat Makmal Akreditasi</span>
                            <span style="color:red;">*</span><br>
                            <span>Alamat 1</span>
                            <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Alamat Makmal Akreditasi"></i>   -->
                        </label>
                        <input id="location" class="form-control " name="location" placeholder="" onkeypress="" required="" type="text" title="" value="">
                    </div>

                    <div class="form-group form-group-default ">
                        <label>
                            <span>Alamat 2</span></label>
                        <input id="location" class="form-control " name="location1" placeholder="" onkeypress="" type="text" title="" value="">
                    </div>

                    <div class="form-group form-group-default ">
                        <label>
                            <span>Alamat 3</span></label>
                        <input id="location" class="form-control " name="location2" placeholder="" onkeypress="" type="text" title="" value="">
                    </div>


                    <button class="btn btn-info btn-cons pull-right" type="button" onclick="submitForm('makmalAkreditasi')">
                        <span>Simpan Maklumat Makmal</span>
                    </button><br><br>
                </form>

                <table class="table table-hover table-responsive" id="tablemakmal" style="width:100%" border="1px">
                    <thead style="width: 100% !important">
                    <tr>
                        <th width="5%" class="fit bold">Bil.</th>
                        <th width="5%" class="bold">Kod Makmal</th>
                        <th width="5%" class="bold">Nama Makmal Akreditasi</th>
                        <th width="5%" class="bold">Jenis Pengawasan</th>
                        <th class="fit bold">Tindakan</th>
                    </tr>
                    </thead>
                </table>
                <br>
                  <div class="modal-footer">
                  <button class="btn btn-info btn-cons pull-right" type="button" onclick="tutupform()">
                          <span>Simpan</span>
                      </button>
                    <button class="btn btn-danger btn-cons pull-right" type="button" onclick="batalform()">
                          <span>Tutup</span>
                      </button>
                      
                  </div>
                </div>
            </div>
        </div>
    </div>
        <!-- END Modal Add Data-->


        <!-- START MODAL ADD MAKMAL -->
    
    <div class="modal fade" id="modal-makmal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true" style="background-color: rgba(53, 71, 109, 0.3);">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle"><i class="fa fa-plus m-r-5"></i> Maklumat Makmal Akreditasi <span class="bold"></span></h5>
                    <!-- <small class="text-muted m-b-20">Sila isi ruangan di bawah bagi pendaftaran baharu environmental monitoring officer.</small> -->
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <!-- <h5 class="modal-title" id="addModalTitle">Makmal Akreditasi <span class="bold"></span></h5><br> -->
                <div class="modal-body">
                    <form id='makmalAkreditasi' role="form" method="post" action="{{ route('makmalAkreditasi.simpan') }}" enctype="multipart/form-data">
                    
                        <input type="hidden" id="labid" name="id" value="">

                        <div id="pengawasan" class="form-group form-group-default ">
                            <label>
                                <span id="label_location">Jenis Pengawasan</span>
                                <span style="color:red;">*</span>
                            </label>
                            <select class="form-group full-width autoscroll state" name="Pengawasan" id="Pengawasan" data-init-plugin="select2">
                                <option id="pilih" value="" selected="" disabled="">Pilih Jenis Pengawasan</option>
                                @foreach($MasterPengawasan as $MasterPengawasans)
                                <option value="{{$MasterPengawasans->id}}">{{$MasterPengawasans->jenis_pengawasan}}</option>
                                @endforeach
                            </select>
                            <label id="pengawasanerror" class="error" style="color: red;display: none;"></label>
                        </div>
                        <!-- 'mode' => 'hidden', -->
                        <!-- @include('components.input', [
                        'label' => 'Kod Makmal Akreditasi',
                        'name' => 'kodmakmal',
                        'id' => 'lab',
                        'mode' => 'required',
                        ]) -->
                        <div class="form-group form-group-default required">
                            <label>
                                <span id="label_kodmakmal">Kod Makmal Akreditasi</span>
                                <span style="color:red;">*</span>
                            </label>
                            <input id="kodmakmal" class="form-control " name="kodmakmal" placeholder="" onkeypress="" required="" type="text" value="">
                        </div>

                        <!-- <button class="btn btn-successs btn-cons from-left pull-right" type="button" onclick="checkmakmal()">
                            <span>Kemaskini Kod Makmal Akreditasi</span>
                        </button><br><br> -->
                        
                        <!-- @include('components.input', [
                        'label' => 'Nama Makmal Akreditasi',
                        'info' => 'Cth: Makmal 1 ',
                        'name' => 'lab',
                        'id' => 'lab',
                        'mode' => 'required',
                        ]) -->

                        <div class="form-group form-group-default ">
                            <label>
                                <span id="label_lab">Nama Makmal Akreditasi</span>
                                <span style="color:red;">*</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth: Makmal 1 "></i> </label>
                            <input id="labname" class="form-control " name="labname" placeholder="" onkeypress="" required="" type="text" value="">
                        </div>

                        <!-- @include('components.input', [
                        'label' => 'No Tel Makmal Akreditasi',
                        'info' => 'Cth : 013123456',
                        'mode' => 'required',
                        'name' => 'lab_tel',
                        'id' => 'lab_tel',
                        ]) -->

                        <div class="form-group form-group-default">
                            <label class="">
                                <span id="label_lab_tel">No Tel Makmal Akreditasi</span>
                                <span style="color:red;">*</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : 013123456"></i>       
                            </label>
                            <input id="lab_tel1" class="form-control" name="lab_tel1" onkeypress="return onlyNumberKey(event)" placeholder="" onkeypress="" required="" type="text" value="" minlength="10" maxlength="11">
                            <label id="lab_telerror" class="error" style="color: red;display: none;">Sila isi nombor telefon yang sah.</label>
                        </div>

                        <!-- @include('components.input', [
                        'label' => 'Alamat Makmal Akreditasi',
                        'info' => 'Alamat Makmal Akreditasi',
                        'name' => 'location',
                        'id' => 'location',
                        'mode' => 'required',
                        'value' => '',
                        ]) -->

                        <div class="form-group form-group-default ">
                            <label>
                                <span id="label_location">Alamat Makmal Akreditasi</span>
                                <span style="color:red;">*</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Alamat Makmal Akreditasi"></i>  </label>
                            <input id="location" class="form-control " name="location" placeholder="" onkeypress="" required="" type="text" value="">
                        </div>


                        <button class="btn btn-info btn-cons pull-right" type="button" onclick="submitForm('makmalAkreditasi')">
                            <span>Tambah</span>
                        </button>
                        <button class="btn btn-info btn-cons pull-right" type="button" onclick="tutup('modal-makmal')">
                            <span>Tutup</span>
                        </button><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <!-- END Modal Add Makmal-->

    <!-- START VIEW MODAL -->
    <div class="modal" id="modal-viewemc" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true" style="overflow-y: auto !important;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle"><span class="bold">Environmental Monitoring Consultant (EMC) </span></h5>
                    <!-- <small class="text-muted m-b-20">Sila isi ruangan di bawah bagi pendaftaran baharu environmental monitoring officer.</small> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form id='form-add' role="form" method="post" action="{{ route('external.pengguna.pengurusan_emc') }}" style="pointer-events: none;">
                    <input type="hidden" id="emcid" name="emcid" value="">
                    <div id="nama" class="form-group form-group-default ">
                        <label>
                            <span id="label_name">Nama</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Nama penuh environmental monitoring consultant sama seperti nama di dalam Mykad/Passport"></i>  </label>
                        <input id="name1" class="form-control " name="name1" placeholder="" required="" type="text" @if($user) value="{{$user->name}}" @endif  onclick="hideerror('nama')" readonly>
                    </div>

                    <div id="kp" class="form-group form-group-default ">
                        <label>
                            <span id="label_name">No. Kad Pengenalan</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="No. Kad Pengenalan ini akan digunakan sebagai ID untuk log masuk ke dalam sistem"></i>  </label>
                        <input id="username1" class="form-control " name="username1" placeholder="Masukkan nombor kad pengenalan tanpa  '-'" required="" type="text" @if($user) value="{{$user->username}}" @endif  maxlength="12"
                    onkeypress ="return onlyNumberKey(event);" onclick="hideerror('kp')" readonly>
                    </div>

                    <div id="comname" class="form-group form-group-default ">
                        <label>
                            <span id="label_name">Nama Syarikat</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth: Syarikat Sdn Bhd"></i>  </label>
                        <input id="company_name1" class="form-control " name="company_name1" placeholder="" required="" type="text" @if($entity) value="{{$entity->syarikat}}" title="" @endif  onclick="hideerror('comname')" readonly>
                    </div>

                    <div id="alacom" class="form-group form-group-default ">
                        <label>
                            <span id="label_company_address">Alamat Syarikat</span>
                            </label>
                            <textarea id="company_address1" class="form-control " name="company_address1" placeholder="" required="" style="height: 150px;"  onclick="hideerror('alacom')" readonly>@if($entity) {{$entity->alamatsyarikat}} @endif</textarea>
                            <label id="alacomerror" style="display: none;font-size: 11px;color: #f35958;">Sila isi alamat syarikat</label>
                    </div>

                    <div id="posk" class="form-group form-group-default ">
                        <label>
                            <span id="label_username">Poskod</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : 12345"></i>  </label>
                        <input id="poskod1" class="form-control " name="poskod1" maxlength="5" required onkeyup="" onclick="hideerror('posk')" readonly>
                    </div>

                    <div id="address_id1">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="comname" class="form-group form-group-default ">
                                    <label>
                                        <span id="label_name">Negeri</span>
                                        <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth: Syarikat Sdn Bhd"></i>  </label>
                                    <input id="state_id11" style="text-transform: uppercase !important;" class="form-control uppercase" name="state_id11" placeholder="" required="" type="text" @if($entity) value="{{$entity->syarikat}}" @endif  onclick="hideerror('comname')" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="comname" class="form-group form-group-default ">
                                    <label>
                                        <span id="label_name">Daerah</span>
                                        <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth: Syarikat Sdn Bhd"></i>  </label>
                                    <input id="district_id11" class="form-control " name="district_id11" placeholder="" required="" type="text" @if($entity) value="{{$entity->syarikat}}" @endif  onclick="hideerror('comname')" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="div-mel" class="form-group form-group-default ">
                        <label>
                            <span id="label_username">E-mel</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : email@gmail.com"></i>  </label>
                        <input style="text-transform: none; !important;" id="email1" class="form-control " name="email1" @if($user) value="{{$user->email}}" @endif required type="email" onkeyup="" onclick="hideerror('div-mel')" readonly>
                        <label id="emelerror" style="color: red;display: none;">E-mel xxxxx@doe.gov.my tidak boleh didaftar sebagai pihak syarikat.</label>
                    </div>

                    <!-- <div class="form-group form-group-default required" style="display: none">
                        <label>
                            <span id="label_username">Nama Pegawai Perhubungan</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : Abu bin Ali"></i>  </label>
                        <input id="officer_name" class="form-control " name="officer_name" type="hidden" required onkeyup="">
                    </div> -->

                    <div class="row">
                        <div class="col-md-6">
                            <div id="notel" class="form-group form-group-default ">
                                <label>
                                    <span id="label_username">No. Tel</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : 013123456"></i>  </label>
                                <input id="no_tel1" class="form-control" name="no_tel1" type="text" @if($user) value="{{$user->phone}}" @endif required  onkeypress="return onlyNumberKey(event)" onkeyup="" minlength="10" maxlength="11" onclick="hideerror('notel')" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="nofaks" class="form-group form-group-default ">
                                <label>
                                    <span id="label_username">No. Faks</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : 013123456"></i>  </label>
                                <input id="faks1" class="form-control " name="faks1" type="text" @if($user) value="{{$user->fax}}" @endif required onkeyup="" minlength="10" maxlength="11" onclick="hideerror('nofaks')" readonly>
                            </div>
                        </div>
                    </div>
                  </form>

                  <br>
                  <br>
                <h5 class="modal-title" id="addModalTitle">Maklumat Pengawasan dan Makmal Akreditasi<span class="bold"></span></h5><br>
                <!-- <button class="btn btn-info btn-cons pull-left" type="button" onclick="openmakmal()">
                        <span>Tambah Makmal Akreditasi</span>
                </button>-->
                <table class="table table-hover table-responsive" id="tablemakmal1" style="width: 100% !important">
                    <thead>
                    <tr>
                        <th class="bold" style="width: 10% !important">Bil.</th>
                        <th class="bold" style="width: 20% !important">Kod Makmal</th>
                        <th class="bold" style="width: 30% !important">Nama Makmal Akreditasi</th>
                        <th class="bold" style="width: 20% !important">Jenis Pengawasan</th>
                    </tr>
                    </thead>
                </table>
                <br>
                  <div class="modal-footer">
                    <!-- <button class="btn btn-danger btn-cons pull-right" type="button" onclick="batalform()">
                          <span>Batal</span>
                      </button> -->
                      <button class="btn btn-info btn-cons pull-right" type="button" data-dismiss="modal">
                          <span>OK</span>
                      </button>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END VIEW MODAL -->
@endsection
@push('js')
<script type="text/javascript">
    $('#username').bind('keypress paste', function (event) {
        // var regex = /^[a-zA-Z0-9%()#@_& -]+$/;
        // var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        // if (!regex.test(key)) {
        //     event.preventDefault();
        //     return false;
        // }

        if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
                event.preventDefault();
            }
            
    });

    $('#lab_tel1').bind('keypress paste', function (event) {
        var regex = /^[a-zA-Z0-9%()#@_& -]+$/;
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });

    var max_chars = 80;

    $('#name').keydown( function(e){
        if ($(this).val().length >= max_chars) { 
            $(this).val($(this).val().substr(0, max_chars));
        }
    });

    $('#name').keyup( function(e){
        if ($(this).val().length >= max_chars) { 
            $(this).val($(this).val().substr(0, max_chars));
        }
    });

    $('#poskod').bind('keypress paste', function (event) {
        if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
            event.preventDefault();
        }
    });

    $('#no_tel').bind('keypress paste', function (event) {
        if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
            event.preventDefault();
        }
    });

    $('#lab_tel1').bind('keypress paste', function (event) {
        if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
            event.preventDefault();
        }
    });

    $('#faks').bind('keypress paste', function (event) {
        // var regex = /^[a-zA-Z0-9%()#@_& -]+$/;
        // var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        // if (!regex.test(key)) {
        //     event.preventDefault();
        //     return false;
        // }
        if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
            event.preventDefault();
        }

    });


    $("select, input").on('focus', function() {
        var form = $("#form-add");

        // $('.error').hide();
        // MAKMAL start
        var kodmakmal = $('#kodmakmal').val();
        var labname = $('#labname').val();
        var lab_tel1 = $('#lab_tel1').val();
        var location = $('#location').val();
        var Pengawasan = $('#Pengawasan').val();

        if (Pengawasan) {
            var elementp = document.getElementById("pengawasan");
            elementp.classList.remove("has-error");
        }

        if (kodmakmal && kodmakmal.length == 0) {
            document.getElementById("kodmakmal").style.display = 'block';
            document.getElementById("kodmakmal-error").style.display = 'block';
        }

        if (labname && labname.length == 0) {
            document.getElementById("labname").style.display = 'block';
            document.getElementById("labname-error").style.display = 'block';
        }
        if (lab_tel1 && lab_tel1.length == 0) {
            document.getElementById("lab_tel1").style.display = 'block';
            document.getElementById("lab_tel1-error").style.display = 'block';
        }
        if (location && location.length == 0) {
            document.getElementById("location").style.display = 'block';
            document.getElementById("location-error").style.display = 'block';
        }
        // Makmal end

        var emel = $('#email').val();
        var n = emel.includes("doe.gov");

        if (emel.length > 0) {
            var element = document.getElementById("div-mel");
            $('#emelerror').hide();
            $('#melerror').hide();
            element.classList.remove("has-error");
            if (n == true) {
                $('#emelerror').show();
                element.classList.add("has-error");
                return false;
            } else {
                $('#emelerror').hide();
                element.classList.remove("has-error");
            }

            if (/^[a-zA-Z0-9._-+]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(emel))
            {
                return true;
            } else {
                $('#melerror').show();
                element.classList.add("has-error");
                return false;
            }
            
        }



        // var username = $('#username').val();
        var phone = $('#no_tel').val();
        var faks = $('#faks').val();
        var poskod = $('#poskod').val();

        var element1 = document.getElementById("nofaks");
        $('#nofakserror').hide();
        element1.classList.remove("has-error");
        if (faks.length > 0) {
            if (faks.length < 10) {
                $('#nofakserror').show();
                element1.classList.add("has-error");
                return false;
            }
        }

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

        var element3 = document.getElementById("no_tel");
        $('#telefonerror').hide();
        element3.classList.remove("has-error");
        if (phone.length > 0) {
            if (phone.length < 10) {
                $('#telefonerror').show();
                element3.classList.add("has-error");
                return false;
            }
        }

        var element3 = document.getElementById("lab_tel1");
        $('#lab_telerror').hide();
        element3.classList.remove("has-error");
        if (phone.length > 0) {
            if (phone.length < 10) {
                $('#lab_telerror').show();
                element3.classList.add("has-error");
                return false;
            }
        }



    });

    $("#username").on('input', function() {

        var username = $('#username').val();
        var element2 = document.getElementById("kp");
        $('#kperror').hide();
        element2.classList.remove("has-error");
        if (username.length > 0) {
            if (username.length < 10) {
                $('#kperror').show();
                element2.classList.add("has-error");
                return false;
            }
        }

        $.ajax({
            url: 'pengurusan_emc/checkemc/'+username,
            method: 'get',
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.status == 'fail') {
                    swal('Perhatian','No. kad pengenalan tidak boleh didaftarkan sebagai EMC.');
                }
                if (data.status == 'success') {

                    document.getElementById("name").value = data.userdata.name;
                    document.getElementById("username").value = data.userdata.username;
                    document.getElementById("company_name").value = data.userdata2.syarikat;
                    document.getElementById("company_address").value = data.userdata2.alamatsyarikat;
                    document.getElementById("poskod").value = data.userdata2.poskod;
                    document.getElementById("state_id1").value = data.negeri.name;
                    document.getElementById("district_id1").value = data.daerah.name;
                    document.getElementById("email").value = data.userdata.email;
                    document.getElementById("no_tel").value = data.userdata.phone;
                    document.getElementById("faks").value = data.userdata.fax;
                }
            }
        });
    });

    function openmakmal(){
        // $("#modal-makmal").modal("show");
        // $('#modal-makmal').modal({
        //     backdrop: 'static',
        //     keyboard: false
        // });
        // document.getElementById("btnaddlab").setAttribute('onclick','closemakmal()');
        var element = document.getElementById('makmalAkreditasi');
        element.classList.remove("hide");
        element.classList.add("show");
    }

    function closemakmal(){
        // $("#modal-makmal").modal("show");
        // $('#modal-makmal').modal({
        //     backdrop: 'static',
        //     keyboard: false
        // });
        // document.getElementById("btnaddlab").setAttribute('onclick','openmakmal()');
        var element = document.getElementById('makmalAkreditasi');
        element.classList.add("hide");
        element.classList.remove("show");
    }

    // function tutup(name){
    //     document.getElementById("makmalAkreditasi").reset();
    // }
function hantar(id){
    $('.cancel').removeClass('btn-default');

    $.ajax({
        url: 'pengurusan_eo/hantarpengguna/'+id+'/'+'emc',
        method: 'get',
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
            if(data.status == 'success'){
                swal.close()
                table.api().ajax.reload(null, false);
                $('.cancel').removeClass('btn-default');
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
    //     closeOnConfirm: true,
    //     closeOnCancel: false,
    //     showLoaderOnConfirm: true,
    // },
    // function(isConfirm) {
    //     if (isConfirm) {
    //     } else {
            
    //     }
    // });
}
    function viewemc(id) {
        $.ajax({
            url: 'pengurusan_emc/view_user/'+id,
            method: 'get',
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.status == 'success') {
                    // $('#modal-viewemc').show();

                    document.getElementById("name1").value = data.userdata.name;
                    document.getElementById("username1").value = data.userdata.username;
                    document.getElementById("company_name1").value = data.userdata2.syarikat;
                    document.getElementById("company_address1").value = data.userdata2.alamatsyarikat;
                    document.getElementById("poskod1").value = data.userdata2.poskod;
                    document.getElementById("state_id11").value = data.negeri.name;
                    document.getElementById("district_id11").value = data.daerah.name;
                    document.getElementById("email1").value = data.userdata.email;
                    document.getElementById("no_tel1").value = data.userdata.phone;
                    document.getElementById("faks1").value = data.userdata.fax;
                    // $("#modal-viewemc").modal("show");
                    $('#modal-viewemc').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    // document.getElementById("no_kompetensi1").value = data.userdata2.entity_eo.no_kompetensi;
                    // document.getElementById("date_kompetensi1").value = data.datekompetensi;
                    // document.getElementById("myText").value = "Johnny Bravo";
                    console.log(data.negeri);

                    var table1 = $('#tablemakmal1');
                    var settingstablemakmal = {
                        "processing": true,
                        "serverSide": true,
                        "deferRender": true,
                        "ajax": "{{ url('/pengurusan_emc/senaraimakmaldetail') }}/"+data.userdata.entity_id,
                        "columns": [
                            { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }},
                            { data: "kodmakmal", name: "kodmakmal", defaultContent: "-", render: function(data, type, row){
                                return $("<div/>").html(data).text();
                            }},
                            { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
                                return $("<div/>").html(data).text();
                            }},
                            // { data: "notel", name: "notel", defaultContent: "-", render: function(data, type, row){
                            //     return $("<div/>").html(data).text();
                            // }},
                            // { data: "address", name: "address", defaultContent: "-" },
                            { data: "pengawasan", name: "pengawasan", defaultContent: "-", render: function(data, type, row){
                                return $("<div/>").html(data).text();
                            }},
                            // { data: "action", name: "action", orderable: false, searchable: false},
                        ],
                        "columnDefs": [
                            { className: "nowrap", "targets": [ 3 ] }
                        ],
                        "sDom": "B<t><'row'<p i>>",
                        "buttons": [
                            // {
                            //     text: '<i class="fa fa-plus m-r-5"></i> Pendaftaran Baharu EO',
                            //     className: 'btn btn-success btn-cons',
                            //     action: function ( e, dt, node, config ) {
                            //         addData();
                            //     }
                            // },
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

                    table1.dataTable(settingstablemakmal);
                }
            }
        });
    }

    function addData(){
        // console.log('haiiii5');
        $.ajax({
            url: "{{ route('external.pengguna.tambah_emc') }}",
            type: 'GET',
            datatype: 'json',
            success: function(data1){
                // console.log(data1);
                $('#labid').attr('value',data1.emcid);
                $('#emcid').attr('value',data1.emcid);
                // $("#modal-add").modal("show");
                $('#modal-add').modal({
                    backdrop: 'static',
                    keyboard: false
                });

                // DATATABLE MAKMAL AKREDITASI
                var table1 = $('#tablemakmal');
                var settingstablemakmal = {
                    "processing": true,
                    "serverSide": true,
                    "deferRender": true,
                    "ajax": "{{ url('/pengurusan_emc/senaraimakmaldetail') }}/"+data1.emcid,
                    "columns": [
                        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { data: "kodmakmal", name: "kodmakmal", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        // { data: "notel", name: "notel", defaultContent: "-", render: function(data, type, row){
                        //     return $("<div/>").html(data).text();
                        // }},
                        // { data: "address", name: "address", defaultContent: "-" },
                        { data: "pengawasan", name: "pengawasan", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        { data: "action", name: "action", orderable: false, searchable: false},
                    ],
                    "columnDefs": [
                        { className: "nowrap", "targets": [ 3 ] }
                    ],
                    "sDom": "B<t><'row'<p i>>",
                    "buttons": [
                        // {
                        //     text: '<i class="fa fa-plus m-r-5"></i> Pendaftaran Baharu EO',
                        //     className: 'btn btn-success btn-cons',
                        //     action: function ( e, dt, node, config ) {
                        //         addData();
                        //     }
                        // },
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

                table1.dataTable(settingstablemakmal);
                // END DATATABLE MAKMAL AKREDITASI
            },
            error: function(xhr, ajaxOptions, thrownError){
                // console.log(thrownError);
            }
        });
    }

    function updateData(id){
        // console.log(id);
        $.ajax({
            url: "{{ route('external.pengguna.update_emc') }}",
            type: 'POST',
            data: {id:id},
            success: function(data1){
                
                // console.log(data1.masterstate);

                $('#labid').attr('value',data1.emcid);
                $('#emcid').attr('value',data1.emcid);
                $('#company_address').html(data1.entity.alamatsyarikat);

                $('#name').val(data1.user.name);
                $('#username').val(data1.user.username);
                $('#company_name').val(data1.entity.syarikat);
                $('#no_tel').val(data1.user.phone);
                $('#faks').val(data1.user.fax);
                $('#email').val(data1.user.email);
                $('#company_address').val(data1.entity.alamatsyarikat);
                $('#company_address1').val(data1.entity.alamatsyarikat1);
                $('#company_address2').val(data1.entity.alamatsyarikat2);
                // $('#daerah').val(data1.daerah);
                console.log(data1.daerah)
                // $('#negeri').val(data1.negeri);
                list = $('#state_id1');
                list.empty();
                // list1.append("<option disabled selected hidden>Pilih Daerah...</option>");
                $.each(data1.masterstate, function(key, district1) {
                    if (district1.id == data1.negeri) {
                        list.append("<option value='" + district1.id  +"' selected>" + district1.name + "</option>");
                    } else {
                        list.append("<option value='" + district1.id  +"'>" + district1.name + "</option>");
                    }
                });

                list1 = $('#district_id1');
                list1.empty();
                // list1.append("<option disabled selected hidden>Pilih Daerah...</option>");
               
                $.ajax({
                    url: "{{ url('general/state-district') }}/"+data1.negeri,
                    type: 'GET',
                    datatype: 'json',
                    success: function(data2){
                        $.each(data2, function(key, district1) {
                            if (data1.daerah == district1.district_id) {
                                console.log(district1.district_id);
                                list1.append("<option value='" + district1.district_id  +"' selected>" + district1.name + "</option>");
                            } else {
                                list1.append("<option value='" + district1.district_id  +"'>" + district1.name + "</option>");
                            }
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                        // console.log(thrownError);
                    }
                });



                // $('#state_id1').val(data1.entity.negeri_id);
                
                // $("#state_id1 option[value='"+data1.entity.negeri_id+"']").attr("selected", "selected");

                // list1 = $(this).parents('#address_id1').find('#district_id1');
                // list1.empty();
                // list1.append("<option disabled selected hidden>Pilih Daerah...</option>");
                // $.ajax({
                //     url: "{{ url('general/state-district') }}/3",
                //     type: 'GET',
                //     datatype: 'json',
                //     success: function(data1){
                //         $.each(data1, function(key, district1) {
                //             list1.append("<option value='" + district1.district_id  +"'>" + district1.name + "</option>");
                //         });
                //     },
                //     error: function(xhr, ajaxOptions, thrownError){
                //         // console.log(thrownError);
                //     }
                // });

                $('#poskod').val(data1.entity.poskod);



                // $("#modal-add").modal("show");
                $('#modal-add').modal({
                    backdrop: 'static',
                    keyboard: false
                });



                var table1 = $('#tablemakmal');
                var settingstablemakmal = {
                    "processing": true,
                    "serverSide": true,
                    "deferRender": true,
                    "ajax": "{{ url('/pengurusan_emc/senaraimakmaldetail') }}/"+data1.emcid,
                    "columns": [
                        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { data: "kodmakmal", name: "kodmakmal", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        // { data: "notel", name: "notel", defaultContent: "-", render: function(data, type, row){
                        //     return $("<div/>").html(data).text();
                        // }},
                        // { data: "address", name: "address", defaultContent: "-" },
                        { data: "pengawasan", name: "pengawasan", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        { data: "action", name: "action", orderable: false, searchable: false},
                    ],
                    "columnDefs": [
                        { className: "nowrap", "targets": [ 2 ] }
                    ],
                    "sDom": "B<t><'row'<p i>>",
                    "buttons": [
                        // {
                        //     text: '<i class="fa fa-plus m-r-5"></i> Pendaftaran Baharu EO',
                        //     className: 'btn btn-success btn-cons',
                        //     action: function ( e, dt, node, config ) {
                        //         addData();
                        //     }
                        // },
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

                table1.dataTable(settingstablemakmal);
            },
            error: function(xhr, ajaxOptions, thrownError){
                // console.log(thrownError);
            }
        });
    }

    function onlyNumberKey(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    }
//district and state
$("#address_id1 #state_id1").on('change', function() {
     console.log('siniiii');
    list1 = $(this).parents('#address_id1').find('#district_id1');
    list1.empty();
    list1.append("<option disabled selected hidden>Pilih Daerah...</option>");
   
    $.ajax({
        url: "{{ url('general/state-district') }}/"+$(this).val(),
        type: 'GET',
        datatype: 'json',
        success: function(data1){
            $.each(data1, function(key, district1) {
                district1.name = district1.name.toLowerCase()
                district1.name = district1.name.replace(/(^\w{1})|(\s{1}\w{1})/g, match => match.toUpperCase());
                list1.append("<option value='" + district1.district_id  +"'>" + district1.name + "</option>");
            });
        },
        error: function(xhr, ajaxOptions, thrownError){
            // console.log(thrownError);
        }
    });
});

// console.log('hai1');
var table = $('#table');
var settings = {
    "processing": true,
    "serverSide": true,
    "deferRender": true,
    "ajax": "{{ fullUrl() }}",
    "columns": [
        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "username", name: "username", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},

        { data: "syarikat", name: "syarikat", defaultContent: "-" },
        { data: "daftar", name: "daftar", defaultContent: "-" }, 
        { data: "pengawasan", name: "pengawasan", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},

        { data: "user_status_id", name: "user_status_id", defaultContent: "-",render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 6 ] }
    ],
    "sDom": "B<t><'row'<p i>>",
    "buttons": [
        // {
        //     text: '<i class="fa fa-plus m-r-5"></i> Pendaftaran Baharu EO',
        //     className: 'btn btn-success btn-cons',
        //     action: function ( e, dt, node, config ) {
        //         addData();
        //     }
        // },
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
        // "sSearch":          "Carian:",
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



function swalFunction(title,message,status) {
    swal({
        title: title,
        text: message,
        type: "",
        showCancelButton: false,
        confirmButtonClass: "btn-success",
        confirmButtonText: "OK",
        closeOnConfirm: true,
    },
    function(isConfirm) {
        if (isConfirm) {
            location.reload();
        }
    });
}



function deactive(id) {
    $('.cancel').removeClass('btn-default');
  swal({
            title: "",
            text: "Adakah anda pasti ?",
            type: "",
            showCancelButton: true,
            confirmButtonClass: "btn-outline green-meadow",
            cancelButtonClass: "btn-danger",
            confirmButtonText: "Tidak",
            cancelButtonText: "Ya",
            closeOnConfirm: true,
            closeOnCancel: false,
        },
        function(isConfirm) {
          if (isConfirm) {
                }else{
                        swal.close()
                        $("#modal-div").load("{{ route('pengguna') }}/deactivate/emc/"+id);
                        $('.cancel').removeClass('btn-default');
                }
            
            });
        }

function active(id) {
    $('.cancel').removeClass('btn-default');
  swal({
            title: "Aktif Pengguna",
            text: "Anda pasti ingin aktifkan pengguna ini?",
            
            showCancelButton: true,
            confirmButtonClass: "btn-outline green-meadow",
            cancelButtonClass: "btn-danger",
            confirmButtonText: "Tidak",
            cancelButtonText: "Ya",
            closeOnConfirm: true,
            closeOnCancel: false,
      },
      function(isConfirm) {
          if (isConfirm) {
          }else{
              $.ajax({
                  url: 'pengurusan_emc/activate/'+id,
                  method: 'get',
                  dataType: 'json',
                  async: true,
                  contentType: false,
                  processData: false,
                  success: function(data) {
                      swal(data.title, data.message);
                      table.api().ajax.reload(null, false);
                      $('.cancel').removeClass('btn-default');
                  }
              });
          }
       
      });
}

function makmal(id){
  $("#modal-div").load("pengurusan_emc/senaraimakmal/"+id);
  // $('#modal-add').modal({
  //       backdrop: 'static',
  //       keyboard: false
  //   });
}
// search box for table
$('#search-table').keyup(function() {
    // console.log('search');
    table.fnFilter($(this).val());
});

$("#form-add").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    var emel = $('#email').val();
    var n = emel.includes("doe.gov");

    var element = document.getElementById("div-mel");
    if (n == true) {
        $('#emelerror').show();
        element.classList.add("has-error");
        return false;
    } else {
        $('#emelerror').hide();
        element.classList.remove("has-error");
    }

    // if(!form.valid())
    //    return;

    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: new FormData(form[0]),
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
            // swal(data.title, data.message);
            
            
        }
    });
});

function hideerror(id){
    // var element = document.getElementById(id);
    // element.classList.remove("has-error");
    // $('#'+id+'-error').hide();
    // if (id == 'div-mel') {
    //     $('#melerror').hide();
    // }
    // $('#'+id+'error').hide();
    // $('#'+id+' .error').hide();
}

function batalform(){
    // $("#modal-add").load(window.location.href + " #modal-add" );
    swal({
        title: "",
        text: "Adakah anda pasti ?",
        type: "",
        showCancelButton: true,
        confirmButtonClass: "btn-outline green-meadow",
        cancelButtonClass: "btn-danger",
        confirmButtonText: "Tidak",
        cancelButtonText: "Ya",
        closeOnConfirm: true,
        closeOnCancel: false,
        showLoaderOnConfirm: true,
    },
    function(isConfirm) {
        if (isConfirm) {
            swal.close()
            $('.cancel').removeClass('btn-default');
        } else {
            $("#modal-add").modal('hide');
            document.getElementById("form-add").reset();
            document.getElementById("makmalAkreditasi").reset();
            swal.close()
            $('.cancel').removeClass('btn-default');
        }
    });
    // location.reload();
}

function tutupform(){
    $('.cancel').removeClass('btn-default');
    var form = $("#form-add");
    if(!form.valid())
           return;

    var element = document.getElementById("div-mel");
    $('#emelerror').hide();
    $('#melerror').hide();
    element.classList.remove("has-error");
    var element1 = document.getElementById("nofaks");
    $('#nofakserror').hide();
    element1.classList.remove("has-error");
    var element2 = document.getElementById("kp");
    $('#kperror').hide();
    element2.classList.remove("has-error");
    var element3 = document.getElementById("no_tel");
    $('#telefonerror').hide();
    element3.classList.remove("has-error");
    // document.getElementById("nama").classList.add("has-error");
    // document.getElementById("kp").classList.add("has-error");
    // document.getElementById("comname").classList.add("has-error");
    // document.getElementById("alacom").classList.add("has-error");
    // document.getElementById("notel").classList.add("has-error");
    // document.getElementById("nofaks").classList.add("has-error");
    // document.getElementById("div-mel").classList.add("has-error");
    // document.getElementById("stat").classList.add("has-error");
    // document.getElementById("dist").classList.add("has-error");
    // document.getElementById("posk").classList.add("has-error");

    // var element = document.getElementsByClassName("form-group");
    // console.log(element);
    // var as = element.classList.contains('has-error');
    // element.removeClass("has-error");
    $('.error').hide();

    $.ajax({
        url: "{{route('external.pengguna.submitemc')}}",
        method: "POST",
        data: new FormData(form[0]),
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data.status == 'error') {
                swal(data.title, data.message, '');
                $('.cancel').removeClass('btn-default');
            } else {
                location.reload();;
            }
            
        },
        error:function(e){
            console.log(e.responseJSON.errors);
            if (e.responseJSON.errors.company_address) {
                var element = document.getElementById("alacom");
                $('#alacomerror').show();
                element.classList.add("has-error");
            }
            if (e.responseJSON.errors.state_registered) {

                var element = document.getElementById("stat");
                $('#staterror').show();
                element.classList.add("has-error");
            }
            if (e.responseJSON.errors.district_registered) {
                var element = document.getElementById("dist");
                $('#disterror').show();
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
}

function removeuser(id) {
  $.ajax({
                url: 'pengurusan_emc/deleteemc/'+id,
                method: 'get',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                     location.reload();
                }
            });
  
    //   swal({
    //     title: "",
    //     text: "Adakah anda pasti ?",
    //     type: "",
    //     showCancelButton: true,
    //     confirmButtonClass: "btn-outline green-meadow",
    //     cancelButtonClass: "btn-danger",
    //     confirmButtonText: "Tidak",
    //     cancelButtonText: "Ya",
    //     closeOnConfirm: true,
    //     closeOnCancel: false,
    // },
    // function(isConfirm) {
    //     if (isConfirm) {
            
    //     } else {
            
    //     }
    // });
      
}

</script>

<script type="text/javascript">

    function checkmakmal(){
        window.open("about:blank", "hello", "width=900,height=500");
    }

    $("#modal-kuiri").modal("show");

    $("#makmalAkreditasi").submit(function(e) {
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
                pengawasan = data.pengawasan;
                console.log(pengawasan);
                var element = document.getElementById('makmalAkreditasi');
                swal(data.title, data.message);
                element.classList.remove("show");
                element.classList.add("hide");
                // $("#modal-makmal").modal("hide");
                // table1.api().ajax.reload(null, false);
                var option = '';
                var option_ = '';
                pengawasan.forEach(function(item){
                    option = '<option value="'+item.id+'">'+item.jenis_pengawasan+'</option>';
                    option_ = option_ + option;
                });
                $('#Pengawasan').empty().append('<option id="pilih" value="" selected="" disabled="">Pilih Jenis Pengawasan</option>'+option_);
                document.getElementById("makmalAkreditasi").reset();
                $('#Pengawasan').prop('selectedIndex', 0);
                var table1 = $('#tablemakmal');
                var settingstablemakmal = {
                    "processing": true,
                    "serverSide": true,
                    "deferRender": true,
                    "ajax": "{{ url('/pengurusan_emc/senaraimakmaldetail') }}/"+data.id,
                    "columns": [
                        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { data: "kodmakmal", name: "kodmakmal", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        // { data: "notel", name: "notel", defaultContent: "-", render: function(data, type, row){
                        //     return $("<div/>").html(data).text();
                        // }},
                        // { data: "address", name: "address", defaultContent: "-" },
                        { data: "pengawasan", name: "pengawasan", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        { data: "action", name: "action", orderable: false, searchable: false},
                    ],
                    "columnDefs": [
                        { className: "nowrap", "targets": [ 3 ] }
                    ],
                    "sDom": "B<t><'row'<p i>>",
                    "buttons": [
                        // {
                        //     text: '<i class="fa fa-plus m-r-5"></i> Pendaftaran Baharu EO',
                        //     className: 'btn btn-success btn-cons',
                        //     action: function ( e, dt, node, config ) {
                        //         addData();
                        //     }
                        // },
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

                table1.dataTable(settingstablemakmal);
            },
            error: function(data) {
                // console.log(data.responseJSON.errors.Pengawasan[0]);
                if (data.responseJSON.errors.Pengawasan) {
                    var element = document.getElementById("pengawasan");
                    element.classList.add("has-error");
                    $('#pengawasanerror').show();
                    $('#pengawasanerror').text(data.responseJSON.errors.Pengawasan[0]);
                }
            }
        });
    });

    






function remove(id) {
    $('.cancel').removeClass('btn-default');
        swal({
            title: "",
            text: "Adakah anda pasti ?",
            type: "",
            showCancelButton: true,
            confirmButtonClass: "btn-outline green-meadow",
            cancelButtonClass: "btn-danger",
            confirmButtonText: "Tidak",
            cancelButtonText: "Ya",
            closeOnConfirm: true,
            closeOnCancel: false,
        },
        function(isConfirm) {
            if (isConfirm) {
                
            } else {
                $.ajax({
                    url: 'pengurusan_emc/makmalAkreditasibuang/'+id,
                    method: 'get',
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        swal(data.title, data.message);
                        $('.cancel').removeClass('btn-default');
                        var table1 = $('#tablemakmal');
                var settingstablemakmal = {
                    "processing": true,
                    "serverSide": true,
                    "deferRender": true,
                    "ajax": "{{ url('/pengurusan_emc/senaraimakmaldetail') }}/"+data.id,
                    "columns": [
                        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { data: "kodmakmal", name: "kodmakmal", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        // { data: "notel", name: "notel", defaultContent: "-", render: function(data, type, row){
                        //     return $("<div/>").html(data).text();
                        // }},
                        // { data: "address", name: "address", defaultContent: "-" },
                        { data: "pengawasan", name: "pengawasan", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                        { data: "action", name: "action", orderable: false, searchable: false},
                    ],
                    "columnDefs": [
                        { className: "nowrap", "targets": [ 3 ] }
                    ],
                    "sDom": "B<t><'row'<p i>>",
                    "buttons": [
                        // {
                        //     text: '<i class="fa fa-plus m-r-5"></i> Pendaftaran Baharu EO',
                        //     className: 'btn btn-success btn-cons',
                        //     action: function ( e, dt, node, config ) {
                        //         addData();
                        //     }
                        // },
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

                table1.dataTable(settingstablemakmal);
                        $('.cancel').removeClass('btn-default');
                    }
                });
            }
        });
}



















        function selesai_btn(){

        }


</script>
@endpush
