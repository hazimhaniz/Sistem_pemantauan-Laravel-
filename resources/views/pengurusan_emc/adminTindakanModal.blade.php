
<form method="post" action="{{ url('/pengurusan_emc/admin-list/adminTindakanModal/') }}/{{ $projekHasUserID }}">
    @csrf
    <input type="hidden" name="projekHasUserID" value="{{ $projekHasUserID }}">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle"> KEMASKINI <b>PENGGUNA </b></h5>
            <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body m-t-20">
            <div class="form-group-attached m-b-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Nama Syarikat</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $UserEMC ? $UserEMC->syarikat : '' }}" class="form-control form-control-lg" type="text" placeholder="" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group form-group-default">
                        <label>
                            <span><b class="text-dark">Alamat Syarikat</b></span><span style="color:red;">*</span>
                        </label>
                        <input value="{{ $UserEMC ? $UserEMC->alamatsyarikat : '' }}" class="form-control form-control-lg" name="alamat_tapak" type="text" placeholder="" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Alamat Syarikat 2</b></span>
                            </label>
                            <input value="{{ $UserEMC ? $UserEMC->alamatsyarikat1 : '' }}" class="form-control form-control-lg" name="alamat_tapak_1" type="text" placeholder="" disabled>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Alamat Syarikat 3</b></span>
                            </label>
                            <input value="{{ $UserEMC ? $UserEMC->alamatsyarikat2 : '' }}" class="form-control form-control-lg" name="alamat_tapak_1" type="text" placeholder="" disabled>
                        </div>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $UserEMC ? $UserEMC->poskod : '' }}" class="form-control form-control-lg" name="poskod" type="text" placeholder="" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $UserEMC->state ? $UserEMC->state->name : '' }}" class="form-control form-control-lg" name="poskod" type="text" placeholder="" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Daerah</b></span>
                            </label>
                            <input value="{{ $UserEMC->district ? $UserEMC->district->name : '' }}" class="form-control form-control-lg" name="poskod" type="text" placeholder="" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group-attached m-b-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">NAMA PENUH</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $user ? $user->name : '' }}" class="form-control form-control-lg" type="text" placeholder="" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">ID Pengguna</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $user ? $user->username : '' }}" class="form-control form-control-lg" type="text" placeholder="" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group required form-group-default">
                            <label>
                                <span><b class="text-dark">Emel</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $user ? $user->email : '' }}" class="form-control form-control-lg" type="text" placeholder="" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span class="label label-light-blue"><b class="text-dark">Status</b></span><span style="color:red;">*</span>
                            </label>
                            <br/>
                            <select name="status" class="select-normal full-width custom-select border border-default" required>
                                <option value="" selected="">Sila Pilih Status</option>
                                <option value="101" {{ $projekHasUser->status == 101 ? 'selected' : '' }}>AKTIF</option>
                                <option value="102" {{ $projekHasUser->status == 102 ? 'selected' : '' }}>TIDAK AKTIF</option>
                                <option value="105" 
                                    @php if(($projekHasUser->status == 105) || ($projekHasUser->status == 103))  
                                        'selected'  
                                    @endphp
                                >TIADA PENGESAHAN</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
       
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table" id="" role="grid" aria-describedby="table_info" border="0px" style="padding:5px;">
                        <thead>
                            <tr>
                                <th bgcolor="#adadad" class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Kod Makmal</th>
                                <th bgcolor="#adadad" class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Nama Makmal Akreditasi</th>
                                <th bgcolor="#adadad" class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">No Tel Makmal Akreditasi</th>
                                <th bgcolor="#adadad" class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Alamat</th>
                                <th bgcolor="#adadad" class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Skop Pengawasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($count == 0)
                           
                                <td> {{$UserEMC->kod_makmal}} </td>
                                <td>{{$UserEMC->nama_makmal}}</td>
                                <td>{{$UserEMC->no_tel_makmal}}</td>
                                <?php
                                    $address = $UserEMC->alamat_makmal;
                                    if ($UserEMC->alamat_makmal1) {
                                        $address = $address.','.$UserEMC->alamat_makmal1;
                                    }
                                    if ($UserEMC->alamat_makmal2) {
                                        $address = $address.','.$UserEMC->alamat_makmal2;
                                    }
                                ?>
                                <td>{{$address}}</td>
                                <td>
                                    <?php
                                        $pengwasananama = '';
                                        $pengwasananama = App\MasterModel\MasterPengawasan::where('id', $projek_pengawasan['pengawasan_id'])->first();
                                        if (!empty($pengwasananama)) {
                                            $pengwasananama = $pengwasananama->jenis_pengawasan;
                                        }
                                    ?>
                                    {{$pengwasananama}}
                                </td>
                            @else
                                @foreach($projek_pengawasan as $pengawasan)
                                <?php
                                    $User = App\User::where('id', $pengawasan->user_id)->first();
                                    $UserEMC = $User->entity_emc;
                                ?>
                                <tr>
                                    <td> {{$pengawasan->kod_makmal}} </td>
                                    <td> {{$pengawasan->nama_makmal}}</td>
                                    <td> {{$pengawasan->no_tel_makmal}}</td>
                                    <?php
                                        $address = $pengawasan->alamat_makmal;
                                        if ($pengawasan->alamat_makmal1) {
                                            $address = $address.','.$pengawasan->alamat_makmal1;
                                        }
                                        if ($pengawasan->alamat_makmal2) {
                                            $address = $address.','.$pengawasan->alamat_makmal2;
                                        }
                                    ?>
                                    <td>{{$address}}</td>
                                    <td>
                                     <?php
                                        $pengwasananama = '';
                                        $pengwasananama = App\MasterModel\MasterPengawasan::where('id', $pengawasan->pengawasan_id)->first();
                                        if (!empty($pengwasananama)) {
                                            $pengwasananama = $pengwasananama->jenis_pengawasan;
                                        }
                                    ?>
                                        {{$pengwasananama}}
                                    </td>
                                </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="btnSubmit-bayaranfilemmodaladd" onclick="">Hantar</button>
        </div>
    </div>
</form>