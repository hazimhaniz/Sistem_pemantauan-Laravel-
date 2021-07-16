<style>
    label{
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
    }
    .hidden-xs{
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        
    }
    
    .btn{
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;s  
    }
    .check-icon {
    right: 15px;
    position: absolute;
    top: 30px;
    color: green;
    font-size: 10.5px;
        }
    #checkhideeop{
        display: none;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <form id="penukaranEOForm" method="POST" action="{{ url('/projek/penukaranEO') }}/{{ $projekID }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="projekID" class="projekID" value="{{ $projekID }}">
            <div class="row">
                <div class="col-md-3">
                    <label>
                        <span><b class="text-dark">EO Sedia Ada : </b></span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>
                    </label>
                </div>
            </div>
            <div class="row">
                @foreach($ProjekHasUserEOs as $ProjekHasUserEO)
                <div class="col-md-4">
                    <div class="check-primary">
                        <input type="radio" name="old_user_eo" id="old_user_eo_{{ $ProjekHasUserEO->user_id }}" value="{{ $ProjekHasUserEO->user_id }}" required>
                        <label for="old_user_eo_{{ $ProjekHasUserEO->user_id }}"> {{ $ProjekHasUserEO->user ? $ProjekHasUserEO->user->name : '' }} </label>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="form-group-attached m-b-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">No. Kad Pengenalan</b></span><span style="color:red;">*</span>
                            </label>
                            <input id="username" name="username" class="form-control form-control-lg" type="text"  minlength="12" maxlength="12" required onkeyup="checkUser2({{$projekID}})" required><i class='fa fa-check fa-2x check-icon' aria-hidden='true' id="checkhideeo"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-info btn-cons" type="button" style="float: right;" onclick="checkkompotensi({{$projekID}})">Semak NRCEP</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">No Sijil Kompetensi</b></span>
                            </label>
                            <input id="no_kompetensi" name="no_kompetensi" class="form-control form-control-lg" type="text" readonly="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Tarikh Lulus Kompetensi</b></span>
                            </label>
                            <input class="form-control" id="tarikh_sijil" name="tarikh_sijil" required type="text" value="" readonly="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group-attached m-b-10">
                <div class="form-group required form-group-default">
                    <label>
                        <span><b class="text-dark">NAMA</b></span><span style="color:red;">*</span>
                    </label>
                    <input id="nama" name="nama" class="form-control form-control-lg" type="text" required >
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">No.Tel</b></span><span style="color:red;">*</span>
                            </label>
                            <input id="no_phone" name="no_phone" maxlength="12" class="form-control form-control-lg" type="text" required>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">No.Faks</b></span><span style="color:red;">*</span>
                            </label>
                            <input id="fax" name="fax" maxlength="9" class="form-control form-control-lg" type="text" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group required form-group-default">
                            <label>
                                <span><b class="text-dark">Emel</b></span><span style="color:red;">*</span>
                            </label>
                            <input id="emel" name="emel" class="form-control form-control-lg" type="text" required>
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
                        <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span class="hidden-xs">Muat Naik..</span><input id="input-ke-salinan" name="gambar" type="file"></div>
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
                        <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span class="hidden-xs">Muat Naik..</span><input id="input-ke-salinan" name="sijil" type="file" multiple=""></div>
                    </div>
                </div> --}}
            </div>
            <br>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnSubmit-penukaranEOForm" onclick=""></i>Hantar</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function  checkUserEop(projectId) {
        var username = $('#usernameEop').val();
        if (username == '') {
            $('#checkhideeop').css('display','none')
            return false;
        }
        $.ajax({
            url: "{{ url('checkuseremc') }}"+'/'+username+'/'+projectId,
            method: "GET",
        
            success: function(response){
                  
                 if (response.success) {
                    $('#checkhideeop').css('display','block')
                    $('#nameeop').val(response.data.name)
                } else {
                    $('#checkhideeop').css('display','none')
                    $('#nameeop').val('')
                }              
            },
            error: function(response){
                console.log(response);
            }
        });

    }
</script>