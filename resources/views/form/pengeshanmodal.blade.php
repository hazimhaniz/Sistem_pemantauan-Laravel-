<div class="row">
<div class="col-md-6">

<div class="row">
    <div class="col-md-12">
        <div class="form-group required form-group-default">
            <label class="" for="">
                <i class="fal fa-file fa-lg"></i>
                &nbsp; NAMA STESEN
                <span class="text-danger" style="font-size:14px">*</span>
            </label>
            <input readonly class="form-control form-control-lg" type="text" placeholder="" value="{{$stesen->stesen}}">
        </div>
        <div class="form-group-attached m-b-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>
                            <span><b class="text-dark">Latitud</b></span><span style="color:red;">*</span>
                        </label>
                        <input readonly class="form-control form-control-lg" type="text" placeholder="" value="{{$stesen->latitud}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>
                            <span><b class="text-dark">Longitud</b></span><span style="color:red;">*</span>
                        </label>
                        <input readonly class="form-control form-control-lg" type="text" placeholder="" value="{{$stesen->longitud}}">
                    </div>
                </div>
            </div>
            @if($stesen->jenis_pengawasan_id == 1)
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>
                            <span><b class="text-dark">Lembangan</b></span><span style="color:red;">*</span>
                        </label>
                       <input readonly class="form-control form-control-lg" type="text" placeholder="" value="{{$stesen->lembangan}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>
                            <span><b class="text-dark">Sungai</b></span><span
                                style="color:red;">*</span>
                        </label>
                        <input readonly type="text" name="" value="{{ $sungai ? $sungai->sungai_2020 : ''}}" class="form-control form-control-lg">
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label>
                            <span><b class="text-dark">Kategori</b></span><span
                                style="color:red;">*</span>
                        </label>
                        <input readonly type="text" name="" value="CLASS {{$stesen->class}}" class="form-control form-control-lg">
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-12">
                <?php 
                    $eia = $stesen->is_eia ? 'checked' : '';
                    $emp = $stesen->is_emp ? 'checked' : '';
                    
                    if ($stesen->is_emp != 1) {
                        $emp2 = 'checked';
                        $date2 ='';
                    } else {
                        $emp2 = '';
                        $date2 = date('Y-m-d', strtotime($stesen->date_emp));
                    }
                    $date = date('Y-m-d', strtotime($stesen->date_eia));
                ?>
                <div class="form-group row">
                    <label class="col-md-3 m-t-15 control-label">Bacaan Garis Dasar
                    </label>
                    <div class="checkbox check-primary">
                        <input disabled name="is_eia" value="1" id="is_eia" type="checkbox" class="hidden is_eia" aria-required="true" {{$eia}}>
                        <label for="is_eia">Peringkat EIA<span style="color:red;">*</span></label>
                        <input disabled name="is_emp" value="1" id="is_emp" type="checkbox" class="hidden is_emp" {{$emp}}>
                        <label for="is_emp">Peringkat EMP</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default input-group" id="date_eia"
                        style="display: block;">
                        <div class="form-input-group">
                            <label>Tarikh Pengawasan (EIA)</label>
                            <input readonly class="form-control" name="date_eia" type="date" value="{{$date}}" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-default input-group" id="date_eia"
                        style="display: block;">
                        <div class="form-input-group">
                            <label>Tarikh Pengawasan (EMP)</label>
                            <input readonly class="form-control" name="date_eia" type="date" value="{{$date2}}" required="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="row">
        <div class="col-md-12">
            <div class="dashTitle"><strong style="font-size: 14.5px; font-family: 'Montserrat'">MAKLUMAT PARAMETER</strong></div>
            <label style="font-family: 'Montserrat'">Standard merujuk kepada National Water Quality Standards</label>
            <table class="table" id="" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                <thead>
				<tr role="row">
                        <th bgcolor="#" class=" th-stesen align-top text-center" style="width:2%; vertical-align:top; color:#">BIL.</th>
                        <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">PARAMETER</th>
                        <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">UNIT</th>
                        <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">STANDARD<br></th>
                        <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">DATA BASELINE (EIA)</th>
                        <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">DATA BASELINE (EMP)</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($parameters)
                    @foreach($parameters as $parameter)
                        <tr>
                            <td class="align-middle text-center">{{$sno}}</td>
                            <td class="align-middle text-center">{{$parameter['name']}}<span style="color:red;">*</span></small></td>
                            <td class="align-middle text-center">{{$parameter['unit']}}</td>
                            <td class="align-middle text-center">{{$parameter['standard']}}</td>
                            <td class="align-middle text-center"><input readonly class="form-control" name="param{{$sno}}" id="param{{$sno}}" value="{{$parameter['value']}}"></td>
                            <td class="align-middle text-center"><input readonly class="form-control" name="param2{{$sno}}" id="param2{{$sno}}" value="{{$parameter['emp']}}"></td>                        </tr>
                        <?php 
                            $sno++;
                        ?>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <br>
        @if(!empty($stesen->gambar_stesen))
            <div class="col-md-12">
                <br />
                <div class="form-group form-group-default">
                    <label><span><b class="text-dark">GAMBAR STESEN</b></span></label>
                    <a target="_blank" href="{{ asset('/storage/uploads/' . $stesen->gambar_stesen) }}">
                        <img src = " {{ asset('/storage/uploads/' . $stesen->gambar_stesen) }} " class="img-size"/>
                    </a>
                </div>
            </div>
        @endif
        <!-- <div class="col-md-12">
            <div class="form-group form-group-default">
                <label><span><b class="text-dark">GAMBAR STESEN</b></span></label>
                <div tabindex="500" class=""><i class="fa fa-folder-open"></i> 
                    <input id="{{$stesen->id}}" name="input-ke-salinan[]" type="file" multiple="">
                </div>
            </div>
        </div> -->
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div><span
            style="color:red;">*</span><strong style="font-size: 14.5px; font-family: 'Montserrat'; padding-bottom:5px">Rujukan</strong></div>
        <table class="table" id="" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
            <thead>
                <tr role="row">
                    <th bgcolor="#" class="align-top text-center" style="width:2%; vertical-align:top; color:#">KELAS</th>
                    <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">KEGUNAAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle text-center"> CLASS I </td>
                    <td>
                        CONSERVATION OF NATURAL ENVIRONMENT
                        WATER SUPPLY I - PRACTICALLY NO TREATMENT NECESSARY
                        FISHERY I - VERY SENSITIVE AQUATIC SPECIES
                    </td>
                    
                </tr>
                <tr>
                    <td class="align-middle text-center"> CLASS IIA</td>
                    <td>
                        WATER SUPPLY II - CONVENTIONAL TREATMENT REQUIRED
                        FISHERY II - SENSITIVE AQUATIC SPECIES
                    </td>
                    
                </tr>
                <tr>
                    <td class="align-middle text-center">CLASS IIB</td>
                    <td>
                        RECREATIONAL ISE WITH BODY CONTACT
                    </td>
                    
                </tr>
                <tr>
                    <td class="align-middle text-center">CLASS III</td>
                    <td>
                        WATER SUPPLY III - EXTENSIVE TREATMENT REQUIRED
                        FISHERY III - COMMON, OF ECONOMIC VALUE AND TOLERANT SPECIES; LIVESTOCK DRINKING
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">CLASS IV</td>
                    <td>
                        IRRIGATION
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">CLASS V</td>
                    <td>
                        NONE OF THE ABOVE
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
&nbsp;&nbsp;
<div class="modal-footer">
    <button type="button" class="btn btn-success" onclick="submitStesen({{$stesen->id}})">Sahkan</button>
</div>
