    @extends('layouts.app')
    @include('plugins.dropify')
    @include('plugins.datatables')

    @section('content')

<style>
.readonly{
    pointer-events:none;
    background-color: #f1f1f1;
}

.grey{
    background-color: #ededed;
}


.sweet-alert {
    border: 1px solid #e7e7e7 !important;
}
</style>
    <!-- START JUMBOTRON -->
    <div class="" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Pendaftaran Kumpulan</a></li>
                    <li class="breadcrumb-item active">Environmental Officer (EO)</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <!-- START card -->
                        <div class="card card-transparent">
                            <div class="card-block p-t-0">
                                <!-- <h3 class='m-t-0'>Environmental Officer (EO)</h3>
                                <p class="small hint-text m-t-5"> -->
                                    <!-- <p class="hint-text">Pengurusan pendaftaran environmental officer perlu dilaksanakan di ruangan bawah ini.</p> -->
                                <!--  <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> PDF</button> -->
                                    <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> Excel</button> -->
                                    <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-print m-r-5"></i> Cetak</button> -->
                                </p>
                            </div>
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
            <div class="card-header px-0  search-on-button">
                <div class="card-title">
                    <button onclick="addData()" class="btn btn-success btn-cons"><i class="fa fa-plus m-r-5"></i>Pendaftaran Baharu EO</button>
                </div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian...">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-block ">
                <table class="table table-hover table-responsive" style="width: 100% !important" id="table" border="1px">
                    <thead>
                        <tr>
                            <th class="bold fit">Bil.</th>
                            <th class="bold" width="20%">Nama</th>
                            <th class="bold" width="20%">No Kad Pengenalan</th>
                            <th class="bold">No Sijil Kompetensi</th>
                            <th class="bold">Tarikh Daftar</th>
                            <!-- <th class="bold">Tarikh Lulus Kompetensi</th> -->
                            <!-- <th class="bold">E-Mel<br>No Tel<br>No Faks</th>
                            <th class="bold">Status</th> -->
                            <th class="bold">status</th>
                            <th class="bold" width="10%">Tindakan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- END card -->
    </div>
    <!-- END CONTAINER FLUID -->
    <!-- <a data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#"> -->

    <!-- START Modal Add Data-->
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle"><span class="bold">Pendaftaran Environmental Officer (EO)</span></h5>
                    <!-- <small class="text-muted m-b-20">Sila isi ruangan di bawah bagi pendaftaran baharu environmental officer.</small> -->
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <form id='form-add' role="form" method="post" action="{{ route('external.pengguna.pengurusan_eo') }}">
                    <div class="alert alert-warning" role="alert" id="wujud" style="display: none;">
                        <strong>Berjaya: </strong>No Sijil Kompetensi telah digunakan dalam sistem LDP2M2
                    </div>
                    <div id="wujudbaru" style="display: none;">
                        <div class="alert alert-success" role="alert">
                            <strong>Berjaya: </strong>No Sijil Kompetensi wujud dalam data NCREP Jabatan Alam Sekitar
                        </div>
                        <div class="card card-default">
                            <div class="card-header  separator">
                                <div class="card-title">Maklumat EO dari NCREP
                                </div>
                            </div><br>
                            <div class="card-body">
                                <table class="tg">
                                    <tr>
                                        <td width='50%'><strong>No Sijil Kompetensi: </strong></td>
                                        <td><div id="no_sijil"></div></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tarikh Lulus Kompetensi: </strong></td>
                                        <td><div id="tarikh_sijil"></div></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama : </strong></td>
                                        <td><div id="nama_eo"></div></td>
                                    </tr>
                                    <tr>
                                        <td><strong>No Kad Pengenalan : </strong></td>
                                        <td><div id="ic_eo"></div></td>
                                    </tr>
                                    <tr>
                                        <td> <strong>No Tel: </strong></td>
                                        <td><div id="phone_eo"></div></td>
                                    </tr>
                                    <tr>
                                        <td><strong>E-Mel: </strong></td>
                                        <td><div id="email_eo"></div></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="alert alert-danger" role="alert" id="tidakwujud" style="display: none;">
                        <!-- <strong>Tidak Berjaya: </strong> -->
                        No Sijil Kompetensi tidak wujud dalam data NCREP Jabatan Alam Sekitar
                    </div>
                    <!-- <div class="alert alert-danger" role="alert" id="server" style="display: none;">
                        <strong>Tidak Berjaya: </strong>Integrasi Bersama AD tidak Berjaya
                    </div>
                    <div class="alert alert-danger" role="alert" id="wujud" >
                        <strong>Tidak Berjaya: </strong>Data telah wujud dalam sistem LDP2M2
                    </div> -->
                    <input type="hidden" name="kemaskini" id="kemaskini" value="0">
                    <div id="kp" class="form-group form-group-default" aria-required="true">
                        <label>
                            <span id="label_username">No. Kad Pengenalan</span>
                            <span style="color:red;">*</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="No. Kad Pengenalan ini akan digunakan sebagai ID untuk log masuk ke dalam sistem"></i>
                        </label>
                        <input id="username" class="form-control " name="username" placeholder="Masukkan nombor kad pengenalan tanpa  '-'" oninput="return onlyNumberKey(event);" onkeyup="checkkompotensi()" onkeypress="return onlyNumberKey(event);" minlength="12" maxlength="12"  type="text" value="" aria-required="true" onclick="hideerror('kp')"  title="" required="">
                        <label id="kperror" class="error" style="color: red;display: none;">Sila isi no. kad pengenalan yang sah.</label>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="sijilkom" class="form-group form-group-default grey">
                                <label>
                                    <span id="label_no_kompetensi">No Sijil Kompetensi</span>
                                </label>
                                <input id="no_kompetensi" class="form-control " name="no_kompetensi" placeholder=""  type="text" value="" onclick="hideerror('sijilkom')" readonly="">
                                <label id="sijilkomerror" style="color: red;display: none;">Sila isi Sijil Kompetensi</label>
                            </div>
                        </div>
                    </div>

                    <div id="datekom" class="form-group form-group-default input-group grey">
                        <div class="form-input-group">
                            <label>
                                <span id="label_date_kompetensi">Tarikh Lulus Kompetensi</span>
                            </label>
                            <input id="date_kompetensi" class="form-control" name="date_kompetensi" placeholder="" type="text" value="" onclick="hideerror('datekom');" readonly="">
                            <!-- <input id="date_kompetensi" class="form-control datepicker " name="date_kompetensi" placeholder="" type="text" value="" onclick="hideerror('datekom');" readonly=""> -->
                            <!-- <input id="date_kompetensi" class="form-control datepicker " name="date_kompetensi" placeholder="" type="text" value="" onchange="checkdatecompet()" onclick="hideerror('datekom');"> -->
                        </div>
                        <!-- <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div> -->
                        <label id="datekomerror" style="color: red;display: none;">Sila isi tarikh kompetensi</label>
                        <label id="datecheckerror" style="color: red;display: none;">Pastikan tarikh tidak melebihi atau sama tarikh hari ini.</label>
                    </div>


                    <!-- <div id="failno" class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                        <label>
                        <span id="label_Negeri">No. Fail JAS</span>
                        <span style="color:red;">*</span>
                        </label>
                        <select id="failjas" name="failjas" class="full-width autoscroll" data-init-plugin="select2" required="" onchange="" onclick="hideerror('stat')">
                            <option value="" selected="" disabled="">Pilih No. Fail JAS</option>
                        @foreach($failjasno as $index => $no)
                            <option value="{{ $index }}">{{ $no }}</option>
                        @endforeach
                        </select>
                        <label id="failnoerror" class="error" style="display: none;">Input no. fail JAS wajib diisi.</label>
                    </div> -->


                    <div id="namas" class="form-group form-group-default">
                        <label>
                            <span id="label_name">Nama</span>
                        <span style="color:red;">*</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Nama penuh environmental officer sama seperti nama di dalam Mykad/Passport"></i>	</label>
                        <input style="text-transform: none !important;" id="name" class="form-control " name="name" placeholder="" title="" type="text" value="" maxlength="100"  onclick="hideerrornamas('namas')" required="">
                        <label id="namaserror" class="error" style="color: red;display: none;">Sila isi nama.</label>
                    </div>

                        <!-- @include('components.input', [
                        'label' => 'No Kad Pengenalan',
                        'info' => 'No Kad Pengenalan ini akan digunakan sebagai ID untuk log masuk ke dalam sistem',
                        'name' => 'username',
                        'id' => 'username',
                        'mode' => 'required',
                        'onkeypress' => 'return onlyNumberKey(event)',
                        'maxlength' => '12',
                        'placeholder' => "Masukkan nombor kad pengenalan tanpa  '-'",
                        ]) -->

                        <div class="row">
                            <div class="col-md-6">
                                <!-- @include('components.input', [
                                'label' => 'No Tel',
                                'name' => 'phone',
                                'id' => 'phone',
                                'type' => 'text',
                                'onkeypress' => 'return onlyNumberKey(event)',
                                ]) -->
                                <div id="telefon" class="form-group form-group-default">
                                    <label>
                                        <span id="label_phone">No Tel</span>
                                                <span style="color:red;">*</span>
                                    </label>
                                    <input id="phone" class="form-control" title="" name="phone" placeholder="" onkeypress="return onlyNumberKey(event)" type="text" value="" minlength="10" maxlength="11" onclick="hideerror('telefon')" required="">
                                    <label id="telefonerror" class="error" style="color: red;display: none;">Sila isi nombor telefon yang sah.</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- @include('components.input', [
                                'label' => 'No Faks',
                                'name' => 'faks',
                                'id' => 'faks',
                                'type' => 'text',
                                'onkeypress' => 'return onlyNumberKey(event)',
                                ]) -->
                                <div id="nofaks" class="form-group form-group-default">
                                    <label>
                                        <span id="label_faks">No Faks</span>
                                                
                                    </label>
                                    <input id="faks" class="form-control " name="faks" placeholder="" onkeypress="return onlyNumberKey(event)" type="text" value="" minlength="10" maxlength="11" onclick="hideerror('nofaks')">
                                    <label id="nofakserror" class="error" style="color: red;display: none;">Sila isi nombor faks yang sah.</label>
                                </div>
                            </div>
                        </div>

                        <div id="mel" class="form-group form-group-default">
                            <label>
                                <span id="label_username">E-Mel</span><span style="color:red;">*</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="cth : email@gmail.com"></i>
                            </label>
                            <input style="text-transform: none; !important;" id="email" class="form-control " name="email" type="email" onclick="hideerror('mel')"  title="" required>
                            <label id="emelerror" style="color: red;display: none;text-transform: none !important;">E-mel xxxxx@doe.gov.my tidak boleh didaftar sebagai pihak syarikat.</label>
                            <label id="melerror" class="error" style="color: red;display: none;">Sila pastikan e-mel dalam format yang sah.</label>
                            <label id="melisierror" class="error" style="color: red;display: none;">Sila isi e-mel .</label>
                        </div>
                        <div class="row" id="buttonhide">
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-cons btn-animated from-left pull-right fa fa-pencil-0" onclick="kemaskinidocument(1)" type="button">
                                    <span>Kemaskini Gambar</span>
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-cons btn-animated from-left pull-right fa fa-pencil-0" onclick="kemaskinidocument(2)" type="button">
                                    <span>Kemaskini Sijil</span>
                                </button>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group form-group-default " id="gambarform">
                                <label>
                                    <span id="label_gambar">Gambar</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Gambar diperlukan bagi mengenalpasti pihak environmental officer"></i>	</label>
                                    <div class="fallback">
                                    <input type="file" class="dropify" name="gambar" title="" data-allowed-file-extensions="jpg png jpeg" data-max-file-size="10M" />
                                    </div>
                            </div>
                            <div class="form-group form-group-default " id="gambaruploaded">
                                <label>
                                    <span id="label_gambar">Gambar</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Gambar diperlukan bagi mengenalpasti pihak environmental officer"></i>  </label>
                                    <div class="fallback" id="picuser">
                                    <!-- <input type="file" class="dropify" name="gambar" @if(auth()->user()->picture_url)data-default-file="{{ route('profile.picture',auth()->user()->picture_url) }}" @endif data-allowed-file-extensions="jpg png jpeg" data-max-file-size="10M"/> -->
                                    </div>
                            </div>

                            </div>
                            <div class="col-md-6">
                            <div class="form-group form-group-default " id="documentform">
                                <label>
                                    <span id="label_gambar">Upload Salinan Sijil Kompetensi</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Salinan Sijil diperlukan bagi mengenalpasti pihak environmental officer"></i>	</label>
                                    <div class="fallback" style="height: 200px;">
                                    <input 
                                        type="file" 
                                        id="sijil_id"
                                        name="sijil[]" 
                                        class="{{--dropify2--}}" 
                                        {{-- data-allowed-file-extensions="pdf png" --}}
                                        title="" 
                                        {{-- data-max-file-size="2M" --}}
                                        onclick="hideerror('documentform')" 
                                        multiple
                                        @if(auth()->user()->picture_url)data-default-file="{{ route('profile.picture',auth()->user()->picture_url) }}" 
                                        @endif 
                                        />
                                    <label id="sijilerror" style="color: red;display: none;">Hanya 3 sijil sahaja dibenarkan upload.</label>
                                    </div>
                            </div>

                            <div class="form-group form-group-default" id="documentuploaded">
                                <label>
                                    <span id="label_gambar">Upload Salinan Sijil Kompetensi</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Salinan Sijil diperlukan bagi mengenalpasti pihak environmental officer"></i>   </label>
                                        <div class="fallback" id="sijiluser" style="height: 200px;">
                                        <input type="file" class="{{--dropify2--}}" data-allowed-file-extensions="pdf png" name="sijil[]" @if(auth()->user()->picture_url)data-default-file="{{ route('profile.picture',auth()->user()->picture_url) }}" @endif data-allowed-file-extensions="jpg png jpeg" data-max-file-size="10M"/> -->
                                        </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info btn-cons from-left pull-right" type="button" onclick="submitForm('form-add')">
                        <span>Simpan</span>
                    </button>
                    <button class="btn btn-danger btn-cons from-left pull-right" onclick="batalform()" type="button">
                        <span>Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Add Data-->


    <!-- START Modal view Data-->
    <div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle"><span class="bold">Maklumat Environmental Officer (EO)</span></h5>
                    <!-- <small class="text-muted m-b-20">Sila isi ruangan di bawah bagi pendaftaran baharu environmental officer.</small> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='form-add' role="form" method="post" action="{{ route('external.pengguna.pengurusan_eo') }}">
                    <!-- </div> -->
                    <div id="wujudbaru" style="display: none;">
                        <div class="alert alert-success" role="alert">
                        <strong>Berjaya: </strong>No Sijil Kompetensi wujud dalam data NCREP Jabatan Alam Sekitar
                        </div>
                        <div class="card card-default">
                        <div class="card-header  separator">
                            <div class="card-title">Maklumat EO dari NCREP
                            </div>
                        </div><br>
                        <div class="card-body">
                            <table class="tg">
                            <tr>
                                <td width='50%'><strong>No Sijil Kompetensi: </strong></td>
                                <td><div id="no_sijil"></div></td>
                            </tr>
                            <tr>
                                <td><strong>Tarikh Lulus Kompetensi: </strong></td>
                                <td><div id="tarikh_sijil"></div></td>
                            </tr>
                            <tr>
                                <td><strong>Nama : </strong></td>
                                <td><div id="nama_eo"></div></td>
                            </tr>
                            <tr>
                                <td><strong>No Kad Pengenalan : </strong></td>
                                <td><div id="ic_eo"></div></td>
                            </tr>
                            <tr>
                                <td> <strong>No Tel: </strong></td>
                                <td><div id="phone_eo"></div></td>
                            </tr>
                            <tr>
                                <td><strong>E-Mel: </strong></td>
                                <td><div id="email_eo"></div></td>
                            </tr>
                            </table>
                        </div>
                    </div>

                    </div>
                    <div class="alert alert-danger" role="alert" id="tidakwujud" style="display: none;">
                        <!-- <strong>Tidak Berjaya: </strong> -->
                        No Sijil Kompetensi tidak wujud dalam data NCREP Jabatan Alam Sekitar
                    </div>
                    <!-- <div class="alert alert-danger" role="alert" id="server" style="display: none;">
                        <strong>Tidak Berjaya: </strong>Integrasi Bersama AD tidak Berjaya
                    </div>
                    <div class="alert alert-danger" role="alert" id="wujud" >
                        <strong>Tidak Berjaya: </strong>Data telah wujud dalam sistem LDP2M2
                    </div> -->
                    <div class="form-group form-group-default" aria-required="true" style="background: #f3f3f3;pointer-events: none;">
                            <label>
                                <span id="label_username">No. Kad Pengenalan</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="No. Kad Pengenalan ini akan digunakan sebagai ID untuk log masuk ke dalam sistem"></i>
                            </label>
                            <input id="username1" class="form-control " placeholder="Masukkan nombor kad pengenalan tanpa  '-'"  maxlength="12"  type="text" value="" aria-required="true">
                        </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default" style="background: #f3f3f3;">
                            <label>
                                <span id="label_no_kompetensi">No Sijil Kompetensi</span>
                                    </label>
                            <input id="no_kompetensi1" class="form-control " placeholder=""  type="text" value="">
                        </div>
                    </div>
                    </div>
                        <!-- @include('components.date', [
                        'label' => 'Tarikh Lulus Kompetensi',
                        'mode' => 'required',
                        'name' => 'date_kompetensi',
                        'id' => 'date_kompetensi',
                        ]) -->
                        <div class="form-group form-group-default input-group" style="background: #f3f3f3;pointer-events: none;">
                            <div class="form-input-group">
                                <label>
                                    <span id="label_date_kompetensi">Tarikh Lulus Kompetensi</span>
                                            </label>
                                <input id="date_kompetensi1" class="form-control datepicker " placeholder=""  type="text" value="">
                            </div>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>

                    <div class="form-group form-group-default" style="background: #f3f3f3;pointer-events: none;">
                        <label>
                            <span id="label_name">Nama</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Nama penuh environmental officer sama seperti nama di dalam Mykad/Passport"></i>    </label>
                        <input id="name1" class="form-control " placeholder=""  type="text" value="">
                    </div>

                        <!-- @include('components.input', [
                        'label' => 'No Kad Pengenalan',
                        'info' => 'No Kad Pengenalan ini akan digunakan sebagai ID untuk log masuk ke dalam sistem',
                        'name' => 'username',
                        'id' => 'username',
                        'mode' => 'required',
                        'onkeypress' => 'return onlyNumberKey(event)',
                        'maxlength' => '12',
                        'placeholder' => "Masukkan nombor kad pengenalan tanpa  '-'",
                        ]) -->

                        <div class="row" style="pointer-events: none;">
                            <div class="col-md-6">
                                <!-- @include('components.input', [
                                'label' => 'No Tel',
                                'name' => 'phone',
                                'id' => 'phone',
                                'type' => 'text',
                                'onkeypress' => 'return onlyNumberKey(event)',
                                ]) -->
                                <div class="form-group form-group-default" style="background: #f3f3f3;">
                                    <label>
                                        <span id="label_phone">No Tel</span>
                                    </label>
                                    <input id="phone1" class="form-control" placeholder="" onkeypress="return onlyNumberKey(event)" type="text" value="" maxlength="11">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- @include('components.input', [
                                'label' => 'No Faks',
                                'name' => 'faks',
                                'id' => 'faks',
                                'type' => 'text',
                                'onkeypress' => 'return onlyNumberKey(event)',
                                ]) -->
                                <div class="form-group form-group-default" style="background: #f3f3f3;">
                                    <label>
                                        <span id="label_faks">No Faks</span>
                                    </label>
                                    <input id="faks1" class="form-control " placeholder="" onkeypress="return onlyNumberKey(event)" type="text" value="" maxlength="11">
                                </div>
                            </div>
                        </div>

                        <div id="mel" class="form-group form-group-default" style="background: #f3f3f3;pointer-events: none;">
                            <label>
                                <span id="label_username">E-mel</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="cth : email@gmail.com"></i>  </label>
                            <input style="text-transform: none !important;" id="email1" class="form-control " type="email">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group form-group-default ">
                                <label>
                                    <span id="label_gambar">Gambar</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Gambar diperlukan bagi mengenalpasti pihak environmental officer"></i>  </label>
                                    <div class="fallback" id="picuser2">
                                    <!-- <input type="file" class="dropify" name="gambar" @if(auth()->user()->picture_url)data-default-file="{{ route('profile.picture',auth()->user()->picture_url) }}" @endif data-allowed-file-extensions="jpg png jpeg" data-max-file-size="10M"/> -->
                                    </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group form-group-default ">
                                <label>
                                    <span id="label_gambar">Upload Salinan Sijil Kompetensi</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Salinan Sijil diperlukan bagi mengenalpasti pihak environmental officer"></i>   </label>
                                    <div class="fallback" id="sijiluser2">
                                    <!-- <input type="file" class="dropify2" data-allowed-file-extensions="pdf png" name="sijil" @if(auth()->user()->picture_url)data-default-file="{{ route('profile.picture',auth()->user()->picture_url) }}" @endif data-allowed-file-extensions="jpg png jpeg" data-max-file-size="10M"/> -->
                                    </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check" data-dismiss="modal" type="button">
                        <span>OK</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Add Data-->

            @endsection

    @push('js')
    <script type="text/javascript">
$('#modal-add').on('hidden.bs.modal', function () {
    location.reload();
});

// $("#modal-add").on("hidden", function () {
//   alert('dwdwdw');
// });
$('#buttonhide').hide();
$('#gambaruploaded').hide();
$('#documentuploaded').hide();

function kemaskinidocument(id){
    if(id == 1) {
        $('#gambarform').show();  
    }
    if(id == 2) {
        $('#documentform').show();  
    }
}

function hantar(id){

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
        closeOnCancel: true,
        showLoaderOnConfirm: true,
    },
    function(isConfirm) {
        if (isConfirm) {
        } else {
            $.ajax({
                url: 'pengurusan_eo/hantarpengguna/'+id+'/'+'eo',
                method: 'get',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data.status == 'success'){
                        table.api().ajax.reload(null, false);
                    }
                }
            });
        }
    });
}

$("#form-add").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid())
           return;

    $('#emelerror').hide();
    $('#datecheckerror').hide();
    var sijilkom = document.getElementById("datekom");
    sijilkom.classList.remove("has-error");


    var elementnamas = document.getElementById("namas");
    elementnamas.classList.remove("has-error");
    var element = document.getElementById("mel");
    $('#emelerror').hide();
    $('#melisierror').hide();
    $('#melerror').hide();
    element.classList.remove("has-error");
    var element1 = document.getElementById("nofaks");
    $('#nofakserror').hide();
    element1.classList.remove("has-error");
    var element2 = document.getElementById("kp");
    $('#kperror').hide();
    element2.classList.remove("has-error");
    var element3 = document.getElementById("telefon");
    $('#telefonerror').hide();
    element3.classList.remove("has-error");
    var element4 = document.getElementById("documentform");
    $('#sijilerror').hide();
    element4.classList.remove("has-error");

    var error = 0;
    var emel = $('#email').val();
        var n = emel.includes("doe.gov");

        if (emel.length > 0) {
            $('#mel>label.error').hide();
            var element = document.getElementById("mel");
            $('#emelerror').hide();
            $('#melerror').hide();
            element.classList.remove("has-error");

            if (n == true) {
                $('#emelerror').show();
                element.classList.add("has-error");
                error = 1;
            } else {
                $('#emelerror').hide();
                element.classList.remove("has-error");
            }

            // if (/^[a-zA-Z0-9._-+]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(emel))
            var reg = "^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$";
            // if (reg.test(emel))
            // {
            //     return true;
            // } else {
            //     $('#melerror').show();
            //     element.classList.add("has-error");
            //     return false;
            // }

        } else if(emel.length == 0){
            $('#melisierror').show();
            element.classList.add("has-error");
        }



        var username = $('#username').val();
        // var failjas = $('#failjas').val();
        // var e = document.getElementById("failjas");
        // var failjas = e.options[e.selectedIndex].text;
        var phone = $('#phone').val();
        var sijil = $('#sijil').val();
        var name = $('#name').val();
        console.log(name.length);
        var element1 = document.getElementById("namas");
        $('#namaserror').hide();
        element1.classList.remove("has-error");
        // if (name.length > 0) {
            if (name.length == 0) {
                $('#namaserror').show();
                element1.classList.add("has-error");
                error = 1;
            } else {
                $('#namaserror').hide();
                element1.classList.remove("has-error");
            }
        // }

        var element2 = document.getElementById("kp");
        // if (username.length > 0) {
            if (username.length == 0) {
                $('#kperror').show();
                element2.classList.add("has-error");
                error = 1;
            } else {
                $('#kperror').hide();
                element2.classList.remove("has-error");
                $('#kp>label.error').hide();
            }
        // }

        var element3 = document.getElementById("telefon");
        // if (phone.length > 0) {
            if (phone.length == 0) {
                $('#telefonerror').show();
                element3.classList.add("has-error");
                error = 1;
            } else {
                $('#telefonerror').hide();
                element3.classList.remove("has-error");
                $('#telefon>label.error').hide();
            }
        // }

        var element4 = document.getElementById("documentform");
        var sijilID = document.getElementById("sijil_id");
        var sijil_sijil = sijilID.files;
        // if (phone.length > 0) {
            console.log("jumlah sijil" + String(sijil_sijil.length));
            if (sijil_sijil.length > 3) {
                $('#sijilerror').show();
                element4.classList.add("has-error");
                error = 1;
            } else {
                $('#sijilerror').hide();
                element4.classList.remove("has-error");
                $('#sijil>label.error').hide();
            }
        // }
        if (error == 1) {
            return false;
        }

    // return false;
    swal({
        title:"",
        text: "Adakah anda pasti ?",
        // type: "",
        showCancelButton: true,
        confirmButtonClass: "btn-outline green-meadow",
        cancelButtonClass: "btn-danger",
        confirmButtonText: "Tidak",
        cancelButtonText: "Ya",
        closeOnConfirm: true,
        closeOnCancel: true,
        showLoaderOnConfirm: true,
    },
        function(isConfirm) {
        if (isConfirm) {
           
        }else {
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
                    if(data.status == 'success'){
                        location.reload();
                    }
                   
                  
                },
                error: function(e) {
                    alert(e);
                    // console.log(e.responseJSON.errors.failjas);
                    // if (e.responseJSON.errors.failjas) {
                    //     // console.log('css in js');
                    //     // document.getElementById("failno").style.backgroundColor = 'background-color: rgba(243, 89, 88, 0.1) !important;'
                    //     var sijilkom = document.getElementById("failno");
                    //     sijilkom.classList.add("has-error");
                    //     $('#failnoerror').show();
                    // }
                }
            });
        }
    });
});
    

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
        function onlyNumberKey(evt) { 
            
            // Only ASCII charactar in that range allowed 
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
                return false; 
            return true; 
        }

        $('#username').bind('paste', function (event) {
            // var regex = /^[a-zA-Z%()#@_& -]+$/;
            // var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            // if (!regex.test(key)) {
            //     event.preventDefault();
            //     return false;
            // }
            if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
                event.preventDefault();
            }

        });

        $('#phone').bind('paste', function (event) {
            if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
                event.preventDefault();
            }
        });

        $('#faks').bind('paste', function (event) {
            if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
                event.preventDefault();
            }
        });

        // function checkdatecompet(){
        //     console.log('change date competent');
        //     var date = $('#date_kompetensi').datepicker( "getDate" );
        //     var GivenDate = '2018-02-22';
        //     var CurrentDate = new Date();
        //     GivenDate = new Date(GivenDate);

        //     if(date > CurrentDate){
        //         alert('Given date is greater than the current date.');
        //     }else{
        //         alert('Given date is not greater than the current date.');
        //     }
        // }

        // $("#date_kompetensi").datepicker({
        //     dateFormat: "dd-mm-yy"
        //     ,minDate: 0
        // }).change(function() {
        //     var date1 =   $('#date_kompetensi').datepicker('getDate');
        //     var today = new Date();
        //     var dd = today.getDate();

        //     var mm = today.getMonth()+1; 
        //     var yyyy = today.getFullYear();
        //     if(dd<10) 
        //     {
        //         dd='0'+dd;
        //     } 

        //     if(mm<10) 
        //     {
        //         mm='0'+mm;
        //     } 

        //     todays = dd+'-'+mm+'-'+yyyy;

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

        //     dates = dd1+'-'+mm1+'-'+yyyy1;


        //     console.log(todays);
        //     console.log(dates+ ' '+ 'select date');
        //     if(dates >= todays){
        //         $('#datecheckerror').show();
        //         // $('#datekomerror').show();
        //         var sijilkom = document.getElementById("datekom");
        //         sijilkom.classList.add("has-error");
        //     }else{
        //         $('#datecheckerror').hide();
        //         var sijilkom = document.getElementById("datekom");
        //         sijilkom.classList.remove("has-error");
        //         // alert('Given date is not greater than the current date.');
        //     }
        // });

        document.addEventListener("DOMContentLoaded", function() {
        var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity("This field cannot be left blank");
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })

   
    function checkkompotensi()
    {
      var username = document.getElementById('username').value;
      if (username.length == 12) {
          var url = "{{ route('kompetensi.index',['username' => ":username"]) }}";
          url = url.replace('%3Ausername', username);
          // console.log(url);
          var urlString = url.replace(/&amp;/g, '&');
          // console.log(urlString);
          $.ajax({
              url: urlString,
              type: 'get',
              success: function(response) {
                console.log(response.result.data[0]);
                    if (response.result.recordsTotal == 1) {
                        // $('#wujud').show();
                        $('#wujudbaru').show();
                        $('#tidakwujud').hide();
                        $('#hantar').hide();
                        document.getElementById("no_sijil").innerHTML = response.result.data[0].no_sijil_kompetensi;
                        document.getElementById("tarikh_sijil").innerHTML = response.result.data[0].tarikh_sijil;
                        document.getElementById("nama_eo").innerHTML = response.result.data[0].nama;
                        document.getElementById("ic_eo").innerHTML = response.result.data[0].no_kp;
                        nophone = response.result.data[0].no_phone;
                        document.getElementById("phone_eo").innerHTML = nophone.split("-").join("");
                        document.getElementById("email_eo").innerHTML = response.result.data[0].emel;
                        // document.getElementById("no_sijil").value = response.result.data[0];
                        document.getElementById("no_kompetensi").value = response.result.data[0].no_sijil_kompetensi;
                        document.getElementById("name").value = response.result.data[0].nama;
                        document.getElementById("date_kompetensi").value = response.result.data[0].tarikh_sijil;
                        nophone = response.result.data[0].no_phone;
                        document.getElementById("phone").value = nophone.split("-").join("");
                        document.getElementById("email").value = response.result.data[0].emel;
                    }if (response.result.recordsTotal == 0) {
                        $('#wujud').hide();
                        $('#wujudbaru').hide();
                        $('#tidakwujud').show();
                        // $('#form-add')[0].reset();
                        $('#hantar').hide();

                        // document.getElementById("no_sijil").innerHTML = '';
                        // document.getElementById("tarikh_sijil").innerHTML = '';
                        // document.getElementById("nama_eo").innerHTML = '';
                        // document.getElementById("ic_eo").innerHTML = '';
                        // document.getElementById("phone_eo").innerHTML = '';
                        // document.getElementById("email_eo").innerHTML = '';
                        // document.getElementById("no_kompetensi").value = '';
                        // document.getElementById("name").value = '';
                        // document.getElementById("date_kompetensi").value = '';
                        // document.getElementById("phone").value = '';
                        // document.getElementById("email").value = '';
                    }
                    // if (response.result == 'wujudbaru') {
                    //     $('#wujudbaru').show();
                    //     $('#wujud').hide();
                    //     $('#tidakwujud').hide();
                    //     $('#hantar').show();
                    //     document.getElementById("no_sijil").innerHTML = response.no_sijil;
                    //     document.getElementById("tarikh_sijil").innerHTML = response.tarikh_sijil;
                    //     document.getElementById("nama_eo").innerHTML = response.nama_eo;
                    //     document.getElementById("ic_eo").innerHTML = response.ic_eo;
                    //     document.getElementById("phone_eo").innerHTML = response.phone_eo;
                    //     document.getElementById("email_eo").innerHTML = response.email_eo;
                    //     document.getElementById("no_sijil").value = response.no_sijil;
                    //     document.getElementById("tarikh_sijil").value = response.tarikh_sijil;
                    //     document.getElementById("nama_eo").value = response.nama_eo;
                    //     document.getElementById("ic_eo").value = response.ic_eo;
                    //     document.getElementById("phone_eo").value = response.phone_eo;
                    //     document.getElementById("email_eo").value = response.email_eo;
                    // }
              }
          });

      }
    }

    $('.dropify').dropify({
        messages: {
            'default': 'Muat Naik Gambar Dengan Size Tidak Melebihi 5MB. Hanya fail jenis .jpg, png, dan jpeg sahaja dibenarkan.',
            'replace': '',
            'remove':  'Padam',
            'error':   'Ooops, permasalah dihadapi.'
        }
    });

    $('.dropify2').dropify({
        messages: {
            'default': 'Muat Naik Salinan Sijil Kompetensi Dengan Size Tidak Melebihi 5MB. Hanya fail jenis .pdf dan .png sahaja dibenarkan.',
            'replace': '',
            'remove':  'Padam',
            'error':   'Ooops, permasalah dihadapi.'
        }
    });
    $('.dropify').dropify({});
    var table = $('#table');
    console.log('no.change1');

    
    var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": "{{ fullUrl() }}",
        "columns": [
            { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            { data: "eo_name", name: "eo_name", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "username", name: "username", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},

            { data: "kompetensi_no", name: "kompetensi_no", defaultContent: "-", searchable: false },

            { data: "date_kompetensi", name: "date_kompetensi", defaultContent: "-" },

            // { data: "entity_eo.date_kompetensi", name: "entity_eo.date_kompetensi", defaultContent: "-", searchable: false },

            { data: "user_status_id", name: "user_status_id", defaultContent: "-",render: function(data, type, row){
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
                text: '<i class="fa fa-plus m-r-5"></i> Pendaftaran Baharu EO',
                className: 'btn btn-success btn-cons',
                action: function ( e, dt, node, config ) {
                    // addData();
                }
            },
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

    $("input").on('focus', function() {
        console.log('change23');
        // $('.error').hide();
        var form = $("#form-add");

        var emel = $('#email').val();
        var n = emel.includes("doe.gov");

        if (emel.length > 0) {
            $('#mel>label.error').hide();
            var element = document.getElementById("mel");
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

            // if (/^[a-zA-Z0-9._-+]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(emel))
            var reg = "^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$";
            // if (reg.test(emel))
            // {
            //     return true;
            // } else {
            //     $('#melerror').show();
            //     element.classList.add("has-error");
            //     return false;
            // }

        }



        // var username = $('#username').val();
        // // var failjas = $('#failjas').val();
        // // var e = document.getElementById("failjas");
        // // var failjas = e.options[e.selectedIndex].text;
        // var phone = $('#phone').val();
        // var faks = $('#faks').val();

        // var element1 = document.getElementById("nofaks");
        // $('#nofakserror').hide();
        // element1.classList.remove("has-error");
        // if (faks.length > 0) {
        //     if (faks.length < 10) {
        //         $('#nofakserror').show();
        //         element1.classList.add("has-error");
        //         return false;
        //     } else {
        //         $('#nofakserror').hide();
        //         element1.classList.remove("has-error");
        //     }
        // }

        // var element2 = document.getElementById("kp");
        // if (username.length > 0) {
        //     if (username.length < 10) {
        //         $('#kperror').show();
        //         element2.classList.add("has-error");
        //         return false;
        //     } else {
        //         $('#kperror').hide();
        //         element2.classList.remove("has-error");
        //         $('#kp>label.error').hide();
        //     }
        // }

        // var element3 = document.getElementById("telefon");
        // if (phone.length > 0) {
        //     if (phone.length < 10) {
        //         $('#telefonerror').show();
        //         element3.classList.add("has-error");
        //         return false;
        //     } else {
        //         $('#telefonerror').hide();
        //         element3.classList.remove("has-error");
        //         $('#telefon>label.error').hide();
        //     }
        // }

    });

    $("select").on('change', function() {
        
   
    });

    // search box for table
    $('#search-table').keyup(function() {
        console.log('search');
        table.fnFilter($(this).val());
    });


    function deactive(id) {
        
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
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
            }else{
                swal.close()
                $("#modal-div").load("{{ route('pengguna') }}/deactivate/eo/"+id);

                // $.ajax({
                //     url: 'pengurusan_eo/deactivate/'+id,
                //     method: 'get',
                //     dataType: 'json',
                //     async: true,
                //     contentType: false,
                //     processData: false,
                //     success: function(data) {
                //         swal(data.title, data.message);
                //         table.api().ajax.reload(null, false);
                //     }
                // });
            }
        });
    }

    function active(id) {
    swal({
            title: "",
            text: "Anda pasti ingin aktifkan pengguna ini?",
            
            showCancelButton: true,
            confirmButtonClass: "btn-outline green-meadow",
            cancelButtonClass: "btn-danger",
            confirmButtonText: "Tidak",
            cancelButtonText: "Ya",
            closeOnConfirm: true,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'pengurusan_eo/activate/'+id,
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
            }
        });
    }



function remove(id) {

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
            closeOnCancel: true,
        },
        function(isConfirm) {
            if (isConfirm) {
                
            } else {
                $.ajax({
                    url: 'pengurusan_eo/delete/'+id,
                    method: 'get',
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                         location.reload();
                    }
                });
            }
        });
}

function komen(id) {

                $.ajax({
                    url: 'pengurusan_eo/komen/'+id,
                    method: 'get',
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                         location.reload();
                    }
                });
}


    function view(id) {
        $.ajax({
            url: 'pengurusan_eo/view_user/'+id,
            method: 'get',
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.status == 'success') {
                    // $('#modal-view').show();
                    $("#modal-view").modal("show");
                    document.getElementById("name1").value = data.userdata.name;
                    document.getElementById("username1").value = data.userdata.username;
                    document.getElementById("phone1").value = data.userdata.phone;
                    document.getElementById("faks1").value = data.userdata.fax;
                    document.getElementById("email1").value = data.userdata.email;
                    document.getElementById("no_kompetensi1").value = data.userdata2.entity_eo.no_kompetensi;
                    document.getElementById("date_kompetensi1").value = data.datekompetensi;
                    // document.getElementById("date_kompetensi1").value = data.datekompetensi;
                    if(data.pic == ''){
                        pic = '<label>Tiada gambar</label>';
                    } else {
                        pic = data.pic;
                    }

                    if(data.sijil == ''){
                        sijil = '<label>Tiada fail</label>';
                    } else {
                        sijil = data.sijil;
                    }
                    $('#picuser2').empty().append(pic);
                    $('#sijiluser2').empty().append(sijil);
                    $('#gambaruploaded').show();
                    $('#documentuploaded').show();
                    $('#gambarform').hide();
                    $('#documentform').hide();
                    // $('#modal-add').modal({backdrop: 'static', keyboard: false})  

                    // document.getElementById("myText").value = "Johnny Bravo";
                    console.log(data.userdata2);
                }
            }
        });
    }

    function edit(id) {
        $.ajax({
            url: 'pengurusan_eo/view_user/'+id,
            method: 'get',
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.status == 'success') {
                    // $('#modal-view').show();
                    $("#modal-add").modal("show");
                    document.getElementById("name").value = data.userdata.name;
                    document.getElementById("username").value = data.userdata.username;
                    document.getElementById("phone").value = data.userdata.phone;
                    document.getElementById("faks").value = data.userdata.fax;
                    document.getElementById("email").value = data.userdata.email;
                    document.getElementById("no_kompetensi").value = data.userdata2.entity_eo.no_kompetensi;
                    document.getElementById("date_kompetensi").value = data.datekompetensi;
                    document.getElementById("kemaskini").value = 1;
                    // $('#dropify1').attr('data-default-file', '/test');
                    $('#buttonhide').show();
                    $('#gambaruploaded').show();
                    $('#documentuploaded').show();
                    $('#gambarform').hide();
                    $('#documentform').hide();
                    if(data.pic == ''){
                        pic = '<label>Tiada gambar</label>';
                    } else {
                        pic = data.pic;
                    }

                    if(data.sijil == ''){
                        sijil = '<label>Tiada fail</label>';
                    } else {
                        sijil = data.sijil;
                    }
                    $('#picuser').empty().append(pic);
                    $('#sijiluser').empty().append(sijil);
                    // $('#modal-add').modal({backdrop: 'static', keyboard: false})  

                    console.log(data.userdata2);
                }
            }
        });
    }

    // function update(id){
    //     $.ajax({
    //         url: 'pengurusan_eo/view_user/'+id,
    //         method: 'get',
    //         dataType: 'json',
    //         async: true,
    //         contentType: false,
    //         processData: false,
    //         success: function(data) {
    //             if (data.status == 'success') {
    //                 // $('#modal-view').show();
    //                 $("#modal-add").modal("show");
    //                 document.getElementById("name1").value = data.userdata.name;
    //                 document.getElementById("username1").value = data.userdata.username;
    //                 document.getElementById("phone1").value = data.userdata.phone;
    //                 document.getElementById("faks1").value = data.userdata.fax;
    //                 document.getElementById("email1").value = data.userdata.email;
    //                 document.getElementById("no_kompetensi1").value = data.userdata2.entity_eo.no_kompetensi;
    //                 document.getElementById("date_kompetensi1").value = data.datekompetensi;
    //                 // document.getElementById("date_kompetensi1").value = data.datekompetensi;
    //                 if(data.pic == ''){
    //                     pic = '<label>Tiada gambar</label>';
    //                 } else {
    //                     pic = data.pic;
    //                 }

    //                 if(data.sijil == ''){
    //                     sijil = '<label>Tiada fail</label>';
    //                 } else {
    //                     sijil = data.sijil;
    //                 }
    //                 $('#picuser').empty().append(pic);
    //                 $('#sijiluser').empty().append(sijil);
    //                 // document.getElementById("myText").value = "Johnny Bravo";
    //                 console.log(data.userdata2);
    //             }
    //         }
    //     });
    // }
    // $("#modal-add").on("hidden", function () {
    //     document.getElementById("form-add").reset();
    // });
    // $("#myModal").on("hidden.bs.modal", function () {
    //     // put your default event here
    // });
    // $('#modal-add').on('hidden.bs.modal', function (e) {
    //     document.getElementById("form-add").reset();
    // })
    // function send(id){
    //     $.ajax({
    //         url: 'pengurusan_eo/view_user/'+id,
    //         method: 'get',
    //         dataType: 'json',
    //         async: true,
    //         contentType: false,
    //         processData: false,
    //         success: function(data) {
    //             if (data.status == 'success') {
    //                 // $('#modal-view').show();
    //                 $("#modal-add").modal("show");
    //                 document.getElementById("name1").value = data.userdata.name;
    //                 document.getElementById("username1").value = data.userdata.username;
    //                 document.getElementById("phone1").value = data.userdata.phone;
    //                 document.getElementById("faks1").value = data.userdata.fax;
    //                 document.getElementById("email1").value = data.userdata.email;
    //                 document.getElementById("no_kompetensi1").value = data.userdata2.entity_eo.no_kompetensi;
    //                 document.getElementById("date_kompetensi1").value = data.datekompetensi;
    //                 // document.getElementById("date_kompetensi1").value = data.datekompetensi;
    //                 if(data.pic == ''){
    //                     pic = '<label>Tiada gambar</label>';
    //                 } else {
    //                     pic = data.pic;
    //                 }

    //                 if(data.sijil == ''){
    //                     sijil = '<label>Tiada fail</label>';
    //                 } else {
    //                     sijil = data.sijil;
    //                 }
    //                 $('#picuser').empty().append(pic);
    //                 $('#sijiluser').empty().append(sijil);
    //                 // document.getElementById("myText").value = "Johnny Bravo";
    //                 console.log(data.userdata2);
    //             }
    //         }
    //     });
    // }

    function batalform(){

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
            closeOnCancel: true,
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
            if (isConfirm) {
                $('#emelerror').hide();
                $('#datecheckerror').hide();
                var sijilkom = document.getElementById("datekom");
                sijilkom.classList.remove("has-error");


                var elementnamas = document.getElementById("namas");
                elementnamas.classList.remove("has-error");
                var element = document.getElementById("mel");
                $('#emelerror').hide();
                $('#namaserror').hide();
                $('#melisierror').hide();
                $('#melerror').hide();
                element.classList.remove("has-error");
                var element1 = document.getElementById("nofaks");
                $('#nofakserror').hide();
                element1.classList.remove("has-error");
                var element2 = document.getElementById("kp");
                $('#kperror').hide();
                element2.classList.remove("has-error");
                var element3 = document.getElementById("telefon");
                $('#telefonerror').hide();
                element3.classList.remove("has-error");
                var element4 = document.getElementById("documentform");
                $('#sijilerror').hide();
                element4.classList.remove("has-error");

                swal.close()
            } else {
                $("#modal-add").modal('hide');
                document.getElementById("form-add").reset();
                $('.dropify-clear').click();
                // document.getElementById("makmalAkreditasi").reset();
                $('#emelerror').hide();
                $('#datecheckerror').hide();
                var sijilkom = document.getElementById("datekom");
                sijilkom.classList.remove("has-error");


                var elementnamas = document.getElementById("namas");
                elementnamas.classList.remove("has-error");
                var element = document.getElementById("mel");
                $('#emelerror').hide();
                $('#namaserror').hide();
                $('#melisierror').hide();
                $('#melerror').hide();
                element.classList.remove("has-error");
                var element1 = document.getElementById("nofaks");
                $('#nofakserror').hide();
                element1.classList.remove("has-error");
                var element2 = document.getElementById("kp");
                $('#kperror').hide();
                element2.classList.remove("has-error");
                var element3 = document.getElementById("telefon");
                $('#telefonerror').hide();
                element3.classList.remove("has-error");
                var element4 = document.getElementById("documentform");
                $('#sijilerror').hide();
                element4.classList.remove("has-error");
                swal.close()
                location.reload();
            }
        });
    }

    function hideerror(id){$('#sijilerror').hide();
        // var element = document.getElementById(id);
        // element.classList.remove("has-error");
        // $('#'+id+'error').hide();
        // $('#'+id+' .error').hide();
    }

    // function hideerrornamas(id){
    //     var element = document.getElementById(id);
    //     element.classList.remove("has-error");
    //     $('#'+id+'error').hide();
    //     $('#'+id+' .error').hide();
    // }

    // function checkdate(){
    //     var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
    //     var element = $('#date_kompetensi').val();
    //     console.log(element + ' '+ utc);
    //     var element1 = document.getElementById('#datekom');
    //     if(element >= utc){
    //         $('#datecheckerror').show();
    //         element1.classList.add("has-error");
    //         return false;
    //     } else {
    //         $('#datecheckerror').hide();
    //         element1.classList.remove("has-error");
    //     }
    // }

    </script>
    @endpush
