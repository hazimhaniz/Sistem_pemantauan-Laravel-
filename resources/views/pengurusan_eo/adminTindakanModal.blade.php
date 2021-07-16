
<form method="post" action="{{ url('/pengurusan_eo/admin-list/adminTindakanModal/') }}/{{ $projekHasUserID }}">
    @csrf
    <input type="hidden" name="projekHasUserID" value="{{ $projekHasUserID }}">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="adminTindakanModalTitle"> KEMASKINI <b>PENGGUNA</b></h5>
            <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
            <button type="button" onclick="closeTindakanModal()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        <div class="modal-body m-t-20">
            <div class="form-group-attached m-b-10">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <th style="background-color: #1f3953; color: #fff !important;">Bil</th>
                                <th style="background-color: #1f3953; color: #fff !important;">Jenis Kompetensi</th>
                                <th style="background-color: #1f3953; color: #fff !important;">No Sijil Kompetensi</th>
                                <th style="background-color: #1f3953; color: #fff !important;">Tarikh Lulus Kompetensi</th>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @forelse($kompeten as $kompe)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td style="text-align: left !important;">{{$kompe->jenis_kompetensi}}</td>
                                    <td style="text-align: left !important;">{{$kompe->no_sijil}}</td>
                                    <td>{{$kompe->tarikh_sijil}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td> Tiada Maklumat Kompentesi. </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                                  <!--   <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">No. Kompetensi</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $UserEO ? $UserEO->no_kompetensi : '' }}" class="form-control form-control-lg" type="text" disabled>
                        </div> -->
                    <!--<div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Tarikh Kompetensi</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $UserEO ? date( 'd/m/Y', strtotime($UserEO->date_kompetensi)) : '' }}" class="form-control datepicker"disabled type="text">
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">NAMA PENGGERAK PROJEK (EKAS)</b></span>
                            </label>
                            <input value="{{$projek->nama_projek}}" class="form-control form-control-lg" type="text" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group-attached m-b-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">NAMA ENVIRONMENTAL OFFICER (EO)</b></span><span style="color:red;">*</span>
                            </label>
                            <?php
                            if ($UserEO) {
                                if ($UserEO->user) {
                                    $name = $UserEO->user->name;
                                } else {
                                    $name = '-';
                                }
                            } else {
                                $name = '-';
                            }
                            ?>
                            <input value="{{ $name }}" class="form-control form-control-lg" type="text" disabled>
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
                        <div class="form-group form-group-default">
                            <label>
                                <span class="label label-light-blue"><b class="text-dark">Status</b></span><span style="color:red;">*</span>
                            </label>
                            <br/>
                            <select name="status" class="select-normal full-width custom-select border border-default" required="">
                                <option value="" selected="">Sila Pilih Status</option>
                                <option value="101" {{ $projekHasUser->status == 101 ? 'selected':'' }}>AKTIF</option>
                                <option value="102" {{ $projekHasUser->status == 102 ? 'selected':'' }}>TIDAK AKTIF</option>
                                <option value="105" {{ $projekHasUser->status == 105 ? 'selected':'' }}>TIADA PENGESAHAN</option>
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
                            <input value="{{ $user ? $user->phone : '' }}" class="form-control form-control-lg" type="text" placeholder="" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">No.Faks</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $user ? $user->fax : '' }}" class="form-control form-control-lg" type="text" placeholder="" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group required form-group-default">
                            <label>
                                <span><b class="text-dark">Emel</b></span><span style="color:red;">*</span>
                            </label>
                            <input value="{{ $user ? $user->email : '' }}" class="form-control form-control-lg" type="text" placeholder="" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label style="font-size:13px; font-family: 'Montserrat'"><b>GAMBAR </b></label>
                    <a href="{{route('downlaodfile', ['id' => $UserEO->id, 'type' => 'gambar', 'projekId' => $projekHasPP->projek->id ])}}" class="btn btn-info btn-cons pull-right" style="width:100%"><i class="fa fa-download m-r-5"></i> Lihat Gambar</a></br>
                </div>
                <div class="col-md-6">
                    <label style="font-size:13px; font-family: 'Montserrat'"><b>FAIL </b></label>
                    <a href="{{route('downlaodfile', ['id' => $UserEO->id, 'type' => 'sijil', 'projekId' => $projekHasPP->projek->id])}}" class="btn btn-info btn-cons pull-right" style="width:100%"><i class="fa fa-download m-r-5"></i> Lihat Fail</a></br>
                </div>
            </div>
            <br>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="btnSubmit-bayaranfilemmodaladd" onclick="">Hantar</button>
        </div>
    </div>
</form>