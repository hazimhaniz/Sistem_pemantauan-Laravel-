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
                        <input id="name" class="form-control " name="name" placeholder="" title="" type="text" value="" maxlength="100" onkeyup="this.value = this.value.toUpperCase();" onclick="hideerrornamas('namas')" required="">
                        <label id="namaserror" style="color: red;display: none;">Sila isi nama</label>
                    </div>
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
                            <input id="email" class="form-control " name="email" type="email" onclick="hideerror('mel')"  title="" required>
                            <label id="emelerror" style="color: red;display: none;text-transform: none !important;">E-mel xxxxx@doe.gov.my tidak boleh didaftar sebagai pihak syarikat.</label>
                            <label id="melerror" class="error" style="color: red;display: none;">Sila pastikan e-mel dalam format yang sah.</label>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group form-group-default ">
                                <label>
                                    <span id="label_gambar">Gambar</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Gambar diperlukan bagi mengenalpasti pihak environmental officer"></i>	</label>
                                    <div class="fallback">
                                    <input type="file" class="dropify" name="gambar"  title="" @if(auth()->user()->picture_url)data-default-file="{{ route('profile.picture',auth()->user()->picture_url) }}" @endif data-allowed-file-extensions="jpg png jpeg" data-max-file-size="10M"/>
                                    </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group form-group-default ">
                                <label>
                                    <span id="label_gambar">Upload Salinan Sijil Kompetensi</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Salinan Sijil diperlukan bagi mengenalpasti pihak environmental officer"></i>	</label>
                                    <div class="fallback">
                                    <input type="file" class="dropify2" data-allowed-file-extensions="pdf png"  title="" name="sijil" @if(auth()->user()->picture_url)data-default-file="{{ route('profile.picture',auth()->user()->picture_url) }}" @endif data-allowed-file-extensions="jpg png jpeg" data-max-file-size="10M"/>
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
                        <span>Batal</span>
                    </button>
                </div>
            </div>
        </div>
    </div>