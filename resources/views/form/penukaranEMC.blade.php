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
    #checkhide{
        display: none;
    }
  
</style>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <label>
                    <span><b class="text-dark">EMC Sedia Ada : </b></span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="checkbox">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label>Muhammad Adam </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox check-primary">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label>Muhammad Rahimie</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox check-primary">
                    <input type="checkbox" value="" id="" checked="" disabled="">
                    <label>Mohammad Safwan</label>
                </div>
            </div>
            
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
                                    <span><b class="text-dark">No.Kad Pengenalan </b></span> <span
                                        style="color:red;">*</span>
                                </label>
        
                                <input class="form-control form-control-lg" type="text" placeholder="">
                            </div>
                            
        
                        </div>
                    </div>
                    <div class="row">
                      
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Nama </b></span> <span
                                        style="color:red;">*</span>
                                </label>
        
                                <input class="form-control form-control-lg" type="text" placeholder="">
                            </div>
                            
        
                        </div>
                    </div>
        
        
                </div>
                <div class="form-group-attached m-b-10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Nama Syarikat</b></span> <span
                                        style="color:red;">*</span>
                                </label>
        
                                <input class="form-control form-control-lg" type="text" placeholder="">
                            </div>
        
                        </div>
                       
                    </div>
        
                    <div class="row">
        
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Alamat Syarikat</b></span><span
                                    style="color:red;">*</span>
                            </label>
                            <input class="form-control form-control-lg" type="text" placeholder="">
                        </div>
        
                    </div>
        
                    <div class="row">
                        <div class="col-md-12">
        
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Alamat Syarikat 2</b></span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="">
                            </div>
        
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-12">
        
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Alamat Syarikat 3</b></span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="">
                            </div>
        
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Poskod</b></span><span
                                        style="color:red;">*</span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="">
                            </div>
        
        
        
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Negeri</b></span><span
                                        style="color:red;">*</span>
                                </label>
                                <select class="form-control" onchange="changestate(1)" id="state">
                                        <option value=""></option>
                                        @foreach($states as $state)
                                        <option value="{{ $state->id }}"> {{ $state->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
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
                                <input class="form-control form-control-lg" type="text" placeholder="">
                            </div>
        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">No.Tel</b></span><span
                                        style="color:red;">*</span>
                                </label>
                                <input class="form-control form-control-lg" maxlength="12" type="text" placeholder="">
                            </div>
        
        
        
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">No Faks</b></span>
                                </label>
                                <input class="form-control form-control-lg" maxlength="9" type="text" placeholder="">
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
                                            <span><b class="text-dark">Jenis Pengawasan</b></span> <span
                                                style="color:red;">*</span>
                                        </label>
                
                                        <select id="selectrequired" class="select-normal full-width"
                                        required="" data-error-msg="Silih pilih cara penerbitan."
                                        style="border: none">
                                        <option selected=""></option>
                                        <option value="sendiri">Sendiri</option>
                                        <option value="usahasama">Usahasama</option>
                                    </select>
                                    </div>
                
                                </div>
                               
                            </div>
                
                            
                
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">KOD MAKMAL AKREDITASI</b></span><span
                                                style="color:red;">*</span>
                                        </label>
                                        <input class="form-control form-control-lg" type="text" placeholder="">
                                    </div>
                
                
                
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">No.Tel Makmal Akreditasi</b></span><span
                                                style="color:red;">*</span>
                                        </label>
                                        <input class="form-control form-control-lg" type="text" placeholder="">
                                    </div>
                
                
                                </div>
                            </div>
                
                            <div class="row">
                                <div class="col-md-12">
                
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Nama Makmal Akreditasi</b></span>
                                        </label>
                                        <input class="form-control form-control-lg" type="text" placeholder="">
                                    </div>
                
                                </div>
                            </div>
                            <div class="row">
        
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Alamat Makmal Akreditasi</b></span><span
                                            style="color:red;">*</span>
                                    </label>
                                    <input class="form-control form-control-lg" type="text" placeholder="">
                                </div>
                
                            </div>
                
                            <div class="row">
                                <div class="col-md-12">
                
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Alamat Makmal Akreditasi 2</b></span>
                                        </label>
                                        <input class="form-control form-control-lg" type="text" placeholder="">
                                    </div>
                
                                </div>
                            </div>
                
                            <div class="row">
                                <div class="col-md-12">
                
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Alamat Makmal Akreditasi 3</b></span>
                                        </label>
                                        <input class="form-control form-control-lg" type="text" placeholder="">
                                    </div>
                
                                </div>
                            </div>
                
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Poskod</b></span><span
                                                style="color:red;">*</span>
                                        </label>
                                        <input class="form-control form-control-lg" type="text" placeholder="">
                                    </div>
                
                
                
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Negeri</b></span><span
                                                style="color:red;">*</span>
                                        </label>
                                        <select name="negeri_id" class="form-control" onchange="changestate(2)" id="state2">
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
                        
        <!-- <button type="button" class="btn btn-info" onclick="submitForm('form-decision')"><i class="fa fa-check m-r-5"></i> Submit</button> -->
        <button type="button" class="btn btn-success" id="btnSubmit-bayaranfilemmodaladd" onclick=""></i>Hantar</button>

    </div>
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
</script>