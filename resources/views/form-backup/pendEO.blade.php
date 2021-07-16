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

    .check-icon {
        right: 15px;
        position: absolute;
        top: 30px;
        color: green;
        font-size: 10.5px;
    }


</style>
<div class="row">
    <div class="col-md-12">
        <form id="pendEOForm" method="POST" action="{{ route('projek.daftarEO') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="projekID" class="projekID" value="{{$projekID}}">
            <div class="form-group-attached m-b-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>
                                <span><b class="text-dark">No. Kad Pengenalan</b></span><span style="color:red;">*</span>
                            </label>
                            <input name="username" class="form-control form-control-lg" type="text" required onkeyup="checkUser2({{$projekID}})" id="usernameeo" required onkeypress="return onlyNumberKey(event);" minlength="12" maxlength="12" autocomplete="off">
                            <i class='fa fa-check fa-2x check-icon' aria-hidden='true' id="checkhideeot" style="display: none;"></i>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-info btn-cons" type="button" style="float: right;" onclick="checkkompotensi({{$projekID}})">Semak NRCEP</button>
                        </div>
                    </div>
                </div>
                <div class="row" id="kompetensi">
                   <!--  <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">No Sijil Kompetensi</b></span>
                            </label>
                            <input id="no_kompetensi" name="no_kompetensi" class="form-control form-control-lg" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Tarikh Lulus Kompetensi</b></span>
                            </label>
                            <input class="form-control" id="tarikh_sijil" name="tarikh_sijil" type="text" value="">
                        </div>
                    </div> -->
                    <table class='table table-responsive' role="grid" aria-describedby="table_info" border="0px" style="padding:10px;" >
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Nama</th>
                                <th>Kad Pengenalan</th>
                                <th>No Tel</th>
                                <th>Jenis Kompetensi</th>
                                <th>No Sijil Kompetensi</th>
                                <th>Tarikh Lulus Kompetensi</th>
                            </tr>
                        </thead>
                        <tbody id='kompeten'></tbody>
                    </table>

                    <div id="hidden-data">
                        
                    </div>
                </div>
            </div>
            <div class="form-group-attached m-b-10">
                <div class="form-group required form-group-default">
                    <label>
                        <span><b class="text-dark">NAMA</b></span><span style="color:red;">*</span>
                    </label>
                    <input id="nama" name="nama" class="form-control form-control-lg" type="text" required>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">No.Tel</b></span><span style="color:red;">*</span>
                            </label>
                            <input id="no_phone" name="no_phone" class="form-control form-control-lg" type="text" onkeypress="return onlyNumberKey(event);" minlength="10" maxlength="12" required>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">No.Faks</b></span><span style="color:red;">*</span>
                            </label>
                            <input id="fax" name="fax" class="form-control form-control-lg" type="text" onkeypress="return onlyNumberKey(event);" maxlength="9" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group required form-group-default">
                            <label>
                                <span><b class="text-dark">Emel</b></span><span style="color:red;">*</span>
                            </label>
                            <input id="emel" name="emel" class="form-control form-control-lg" type="email" required>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <label style="font-size:13px; font-family: 'Montserrat'"><b>GAMBAR </b></label>
                <input type="file" name="gambar_eo_file[]" class="form-control" multiple>
                {{-- <div class="input-group file-caption-main">
                    <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
                        <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>
                    </div>
                    <div class="input-group-btn input-group-append">
                        <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span class="hidden-xs">Muat Naik..</span>
                            <input type="file">
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-12">
                <br>
                <label style="font-size:13px; font-family: 'Montserrat'"><b>FAIL </b></label>
                <input type="file" name="fail_eo_file[]" class="form-control" multiple>
                {{-- <div class="input-group file-caption-main">
                    <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
                        <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>
                    </div>
                    <div class="input-group-btn input-group-append">
                        <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span class="hidden-xs">Muat Naik..</span>
                            <input type="file" multiple="">
                        </div>
                    </div>
                </div> --}}
            </div>
            <br>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnSubmit-bayaranfilemmodaladd" onclick=""></i>Hantar</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
 $(function() {

    $('#kompetensi').hide();


});
</script>
