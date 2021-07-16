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
    .dashTitle {
        font-family: 'Montserrat' !important;
        font-size: 12.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        
    }

    .check-icon {
    right: 15px;
    position: absolute;
    top: 30px;
    color: green;
    font-size: 10.5px;
        }
    #checkhideemcp{
        display: none;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <form id="penukaranEMCForm" method="POST" action="{{ url('/projek/penukaranEMC') }}/{{ $projekID }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="projekID" class="projekID" value="{{ $projekID }}">
            <div class="row">
                <div class="col-md-3">
                    <label>
                        <span><b class="text-dark">EMC Sedia Ada : </b></span>
                    </label>
                </div>
            </div>
            <div class="row">
                @foreach($ProjekHasUserEMCs as $ProjekHasUserEMC)
                <div class="col-md-4">
                    <div class="check-primary">
                        <input type="radio" name="old_user_emc" id="old_user_emc_{{ $ProjekHasUserEMC->user_id }}" value="{{ $ProjekHasUserEMC->user_id }}" required>
                        <label for="old_user_emc_{{ $ProjekHasUserEMC->user_id }}"> {{ $ProjekHasUserEMC->user ? $ProjekHasUserEMC->user->name : '' }} </label>
                    </div>
                </div>
                @endforeach
            </div>
            
            <br>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="dashTitle"><b>Sila isi maklumat EMC yang baru</b>.</div>
                    <br>
                    <div class="form-group-attached m-b-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">No.Kad Pengenalan </b></span> <span style="color:red;">*</span>
                                    </label>
                                    <input name="username" class="form-control form-control-lg" type="text" placeholder="" id="usernameEmcp" onkeyup="checkUserEmcp({{$projekID}})">
                                    <i class='fa fa-check fa-2x check-icon' aria-hidden='true' id="checkhideemcp"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Nama </b></span> <span style="color:red;">*</span>
                                    </label>
                                    <input name="officer_name" class="form-control form-control-lg" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-attached m-b-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Nama Syarikat</b></span> <span style="color:red;">*</span>
                                    </label>
                                    <input name="syarikat" class="form-control form-control-lg" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Alamat Syarikat</b></span><span style="color:red;">*</span>
                                </label>
                                <input name="alamatsyarikat" class="form-control form-control-lg" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Alamat Syarikat 2</b></span>
                                    </label>
                                    <input name="alamatsyarikat1" class="form-control form-control-lg" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Alamat Syarikat 3</b></span>
                                    </label>
                                    <input name="alamatsyarikat2" class="form-control form-control-lg" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                    </label>
                                    <input name="poskod" class="form-control form-control-lg" type="text" placeholder="" required onkeypress="return onlyNumberKey(event);" maxlength="5">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                    </label>
                                    <select class="form-control" name="negeri_id" onchange="changestate(1)" id="state">
                                        <option value=""></option>
                                        @foreach($states as $state)
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
                                    <select class="form-control" name="daerah_id" id="districts" >
                                        <option value=""></option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Emel</b></span>
                                    </label>
                                    <input name="email" class="form-control form-control-lg" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">No.Tel</b></span><span style="color:red;">*</span>
                                    </label>
                                    <input name="no_tel" class="form-control form-control-lg" type="text" placeholder="" required onkeypress="return onlyNumberKey(event);" maxlength="12">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">No Faks</b></span>
                                    </label>
                                    <input name="faks" class="form-control form-control-lg" maxlength="9" type="text" placeholder="" onkeypress="return onlyNumberKey(event);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="dashTitle"><b>Maklumat Pengawasan dan Akreditasi</b></div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group-attached m-b-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Jenis Pengawasan</b></span> <span style="color:red;">*</span>
                                            </label>
                                            <select name="pengawasan_id" id="pengawasan_id" class="select-normal full-width" required="" style="border: none">
                                                <option selected=""></option>
                                                @foreach($masterpengawasans as $masterpengawasan)
                                                    @if(in_array($masterpengawasan->id, $pengawasanId)) 
                                                    <option value="{{ $masterpengawasan->id }}"> {{ $masterpengawasan->jenis_pengawasan }} </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">KOD MAKMAL AKREDITASI</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" name="kod_makmal" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">No.Tel Makmal Akreditasi</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input name="no_tel_makmal" class="form-control form-control-lg" type="text" placeholder="" required onkeypress="return onlyNumberKey(event);" maxlength="12">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Nama Makmal Akreditasi</b></span>
                                            </label>
                                            <input name="nama_makmal" class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Alamat Makmal Akreditasi</b></span><span style="color:red;">*</span>
                                        </label>
                                        <input name="alamat_makmal" class="form-control form-control-lg" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Makmal Akreditasi 2</b></span>
                                            </label>
                                            <input name="alamat_makmal1" class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Makmal Akreditasi 3</b></span>
                                            </label>
                                            <input name="alamat_makmal2" class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="" required onkeypress="return onlyNumberKey(event);" maxlength="5">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                            </label>
                                            <select name="makmal_negeri_id" class="form-control" onchange="changestate(2)" id="state2">
                                                <option value=""></option>
                                                @foreach($states as $state)
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
                                            <select name="makmal_daerah_id" class="form-control" id="districts2">
                                                <option value=""></option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <br>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnSubmit-penukaranEMCForm" onclick=""></i>Hantar</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function changestate(type) {
        if (type == 1) {
            var id = $('#state').val();
        } else {
            var id = $('#state2').val();
        }
            $.ajax({
            url: "{{ url('getdistricts') }}"+'/'+id+'/'+type,
            method: "GET",
        
            success: function(response){
                 var len = response.districts.length;
                 if (response.type == 1) {
                $("#districts").empty();
            } else {
                $("#districts2").empty();

            }
                for( var i = 0; i<len; i++){
                    var id = response.districts[i]['district_id'];
                    var name = response.districts[i]['name'];
                    if (response.type == 1) {
                        $("#districts").append("<option value='"+id+"'>"+name+"</option>");
                    } else {
                        $("#districts2").append("<option value='"+id+"'>"+name+"</option>");

                    }

                }
               
            },
            error: function(response){
            }
        });
    }
    function  checkUserEmcp(projectId) {
        var username = $('#usernameEmcp').val();
        if (username == '') {
            $('#checkhideemcp').css('display','block');
            return false;
        }
        $.ajax({
            url: "{{ url('checkuseremc') }}"+'/'+username+'/'+projectId,
            method: "GET",
        
            success: function(response){
                  
                 if (response.success) {
                    $('#checkhideemcp').css('display','block');
                    $('input[name="officer_name"]').val(response.data.name)
                } else {
                    $('#checkhideemcp').css('display','none');
                    $('input[name="officer_name"]').val('');
                }              
            },
            error: function(response){
            }
        });

    }
</script>