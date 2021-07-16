@extends('layouts.modal')

<style type="text/css">
    .text-center{
        text-align: center !important;
    }
</style>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
				<small class="text-muted">{{$stesen->namaProgram->standard_dirujuk}}</small>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <?php  //dd($schedule);?>
            <form id='form-parameter-edit' role="form" method="post" action="{{ route('projek.updateparametersg2') }}">
            <div class="modal-body m-t-20">
                <div class="card card-default m-b-20">
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$stesen->id}}">
                        <input type="hidden" name="type" value="{{$type}}">
                        <input type="hidden" name="jenis_pengawasan_id" value="{{$stesen->jenis_pengawasan_id}}">
                        @if($stesen->class)
                        @include('components.input', [
                        'label' => 'Kelas',
                        'info' => 'Kelas',
                        'name' => 'class',
                        'id' => 'class',
                        'mode' => 'readonly',
                        'value' => $stesen->class,
                        ])
                        @endif


                        @if($stesen->date_eia)
                        <div class="form-group form-group-default input-group">
                            <div class="form-input-group">
                                <label>Tarikh Pengawasan (EIA)</label>
                                <input class="form-control"  name="date_eia" type="date" value="{{ $stesen->date_eia}}" readonly>
                            </div>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                        @endif
                        @if($stesen->is_emp==1)
                        @if($stesen->date_emp)
                        <div class="form-group form-group-default input-group">
                            <div class="form-input-group">
                                <label>Tarikh Pengawasan (EMP)</label>
                                <input class="form-control"  name="date_emp" type="date" value="{{$stesen->date_emp}}" readonly>
                            </div>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                         @endif
                        @endif
                        @if($parameters->count() < 1)
                        <!-- <div class="alert alert-warning">
                            Sila <strong>Kemaskini Stesen</strong> Terlebih Dahulu.
                        </div> -->
                        @endif
                        @if($stesen->jenis_pengawasan_id == 7)
                        <div style="overflow-y: auto !important;max-height: 700px !important">
                            @if($schedule == 1)
                            <input class="form-control" type="hidden" id="schedule" name="schedule" value="1">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Receiving Land Use Category</th>
                                        <th>Unit</th>
                                        <th>Day Time<br>07.00am-10.00pm</th>
                                        <th>Night Time<br>10.am-07.00pm</th>
                                        <th class="text-center">Baseline<br>Day Time<br>07.00am-10.00pm</th>
                                        <th class="text-center">Baseline<br>Night Time<br>10.am-07.00pm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php //dd($parameterbunyi); ?>
                                    <tr>
                                        <td><strong>Noise Sensitive Areas,Low Density Residential,Institutional (School,Hospital), Worship Areas</strong></td>
                                        <td>dBA</td>
                                        <td>50</td>
                                        <td>40</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'noise'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 1" type="text" id="baselineempnoiseday" name="baselinedaynoise" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempnoise',1)"></td>
                                        <td><input class="form-control 1" type="text" id="baselineempnoisenight" name="baselinenightnoise" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempnoise',1)"></td>
                                        @endforeach 
                                    </tr>
                                    <tr>
                                        <td><strong>Suburban Residential (Medium Density) Areas, Public Spaces, Parks, Recreational Areas.</strong></td>
                                        <td>dBA</td>
                                        <td>55</td>
                                        <td>45</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'suburban'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 1" type="text" id="baselineempsuburbanday" name="baselinedaysuburrban" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempsuburban',1)"></td>
                                        <td><input class="form-control 1" type="text" id="baselineempsuburbannight" name="baselinenightsuburrban" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempsuburban',1)"></td>
                                        @endforeach 
                                    </tr>
                                    <tr>
                                        <td><strong>Urban Residential (High Density) Areas, Designated Mixed Development Areas (Residential - Commercial).</strong></td>
                                        <td>dBA</td>
                                        <td>60</td>
                                        <td>50</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'urban'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 1" type="text" id="baselineempurbanday" name="baselinedayurban" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempurban',1)"></td>
                                        <td><input class="form-control 1" type="text" id="baselineempurbannight" name="baselinenighturban" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempurban',1)"></td>
                                        @endforeach 
                                    </tr>
                                    <tr>
                                        <td><strong>Commercial Business Zones</strong></td>
                                        <td>dBA</td>
                                        <td>65</td>
                                        <td>55</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'commercial'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 1" type="text" id="baselineempcommercialday" name="baselinedaycommercial" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommercial',1)"></td>
                                        <td><input class="form-control 1" type="text" id="baselineempcommercialnight" name="baselinenightcommercial" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommercial',1)"></td>
                                        @endforeach 
                                    </tr>
                                    <tr>
                                        <td><strong>Designated Industrial Zones</strong></td>
                                        <td>dBA</td>
                                        <td>70</td>
                                        <td>60</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'industry'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 1" type="text" id="baselineempindustryday" name="baselinedayindustrial" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',1)"></td>
                                        <td><input class="form-control 1" type="text" id="baselineempindustrynight" name="baselinenightindustrial" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',1)"></td>
                                        @endforeach 
                                    </tr>
                                </tbody>
                            </table>
                            @endif

                            @if($schedule == 2)
                            <input class="form-control" type="hidden" id="schedule" name="schedule" value="2">
                            <table class="table table-bordered" @if(auth()->user()->entity_type != 'App\UserEMC') style="pointer-events:none;" @endif>
                                <thead>
                                    <tr>
                                        <th>Receiving Land Use Category</th>
                                        <th>Unit</th>
                                        <th>Day Time<br>07.00am-10.00pm</th>
                                        <th>Night Time<br>10.am-07.00pm</th>
                                        <th class="text-center">Baseline<br>Day Time<br>07.00am-10.00pm</th>
                                        <th class="text-center">Baseline<br>Night Time<br>10.am-07.00pm</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    <tr>
                                        <td><strong>Noise Sensitive Areas, Low Density Residential</strong></td>
                                        <td>dBA</td>
                                        <td>L90 + 10 </td>
                                        <td>L90 + 5 </td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'noise'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 2" type="text" id="baselineempnoiseday" name="baselinedaynoise" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempnoise',2)"></td>
                                        <td><input class="form-control 2" type="text" id="baselineempnoisenight" name="baselinenightnoise" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempnoise',2)"></td>
                                        @endforeach 
                                    </tr>
                                    <tr>
                                        <td><strong>Suburban and Urban Residential Areas</strong></td>
                                        <td>dBA</td>
                                        <td>L90 + 10 </td>
                                        <td>L90 + 10 </td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'suburban'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 2" type="text" id="baselineempsuburbanday" name="baselinedaysuburrban" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempsuburban',2)"></td>
                                        <td><input class="form-control 2" type="text" id="baselineempsuburbannight" name="baselinenightsuburrban" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempsuburban',2)"></td>
                                        @endforeach 
                                    </tr>
                                    <tr>
                                        <td><strong>Commercial, Business</strong></td>
                                        <td>dBA</td>
                                        <td>L90 + 10</td>
                                        <td>L90 + 10 </td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'commercial'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 2" type="text" id="baselineempcommercialday" name="baselinedaycommercial" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommercial',2)"></td>
                                        <td><input class="form-control 2" type="text" id="baselineempcommercialnight" name="baselinenightcommercial" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommercial',2)"></td>
                                        @endforeach 
                                    </tr>
                                    <tr>
                                        <td><strong>Industrial</strong></td>
                                        <td>dBA</td>
                                        <td>L90 + 10 </td>
                                        <td>L90 + 10</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'industry'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 2" type="text" id="baselineempindustryday" name="baselinedayindustrial" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',2)"></td>
                                        <td><input class="form-control 2" type="text" id="baselineempindustrynight" name="baselinenightindustrial" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',2)"></td>
                                        @endforeach 
                                    </tr>
                                </tbody>
                            </table>
                            @endif

                            @if($schedule == 3)
                            <input class="form-control" type="hidden" id="schedule" name="schedule" value="3">
                            <table class="table table-bordered" @if(auth()->user()->entity_type != 'App\UserEMC') style="pointer-events:none;" @endif>
                                <thead>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Existing Levels </th>
                                        <th class="text-center"> New Desirable Levels</th>
                                        <th class="text-center">Maximum Permissible Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($parameterbunyi as $bunyi)
                                    <?php //dd($bunyi); ?>
                                    <tr>
                                        <td>dBA</td>
                                        <td><input class="form-control" type="text" id="baselineempexistlvl" name="existlvl" value="{{$bunyi->baseline_exist_lvl}}" onkeypress ="return onlyNumberKey(event);"></td>
                                        <td><input class="form-control" type="text" id="baselineempnewlvl" name="newlvl" value="{{$bunyi->baseline_new_lvl}}" onkeypress ="return onlyNumberKey(event);"></td>
                                        <td><input class="form-control" type="text" id="baselineempmaxlvl" name="maxlvl" value="{{$bunyi->baseline_max_lvl}}" onkeypress ="return onlyNumberKey(event);"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif

                            @if($schedule == 4)
                            <input class="form-control" type="hidden" id="schedule" name="schedule" value="4">
                            <table class="table table-bordered" @if(auth()->user()->entity_type != 'App\UserEMC') style="pointer-events:none;" @endif>
                                <thead>
                                    <tr>
                                        <th>Receiving Land Use Category</th>
                                        <th>Unit</th>
                                        <th>Day Time<br>07.00am-10.00pm</th>
                                        <th>Night Time<br>10.am-07.00pm</th>
                                        <th class="text-center">Baseline<br>Day Time<br>07.00am-10.00pm</th>
                                        <th class="text-center">Baseline<br>Night Time<br>10.am-07.00pm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Noise Sensitive Areas Low Density Residential Areas</strong></td>
                                        <td>dBA</td>
                                        <td>55</td>
                                        <td>50</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'noise'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 4" type="numbernumber" id="baselineempnoiseday" name="baselinedaynoise" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempnoise',4)"></td>
                                        <td><input class="form-control 4" type="numbernumber" id="baselineempnoisenight" name="baselinenightnoise" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempnoise',4)"></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td><strong>Suburban Residential (Medium Density)</strong></td>
                                        <td>dBA</td>
                                        <td>60</td>
                                        <td>55</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'suburban'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 4" type="text" id="baselineempsuburbanday" name="baselinedaysuburrban" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempsuburban',4)"></td>
                                        <td><input class="form-control 4" type="text" id="baselineempsuburbannight" name="baselinenightsuburrban" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempsuburban',4)"></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td><strong>Urban Residential (High Density)</strong></td>
                                        <td>dBA</td>
                                        <td>65</td>
                                        <td>60</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'urban'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 4" type="text" id="baselineempurbanday" name="baselinedayurban" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempurban',4)"></td>
                                        <td><input class="form-control 4" type="text" id="baselineempurbannight" name="baselinenighturban" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempurban',4)"></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td><strong>Commercial, Business</strong></td>
                                        <td>dBA</td>
                                        <td>70</td>
                                        <td>60</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'commercial'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 4" type="text" id="baselineempcommercialday" name="baselinedaycommercial" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommercial',4)"></td>
                                        <td><input class="form-control 4" type="text" id="baselineempcommercialnight" name="baselinenightcommercial" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommercial',4)"></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td><strong>Industrial</strong></td>
                                        <td>dBA</td>
                                        <td>75</td>
                                        <td>65</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'industry'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 4" type="text" id="baselineempindustryday" name="baselinedayindustrial" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',4)"></td>
                                        <td><input class="form-control 4" type="text" id="baselineempindustrynight" name="baselinenightindustrial" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',4)"></td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            @endif

                            @if($schedule == 5)
                            <input class="form-control" type="hidden" id="schedule" name="schedule" value="5">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Receiving Land Use Category</th>
                                        <th>Unit</th>
                                        <th>Day Time<br>07.00am-10.00pm</th>
                                        <th>Night Time<br>10.am-07.00pm</th>
                                        <th>Max<br>Day & Night</th>
                                        <th class="text-center">Baseline<br>Day Time<br>07.00am-10.00pm</th>
                                        <th class="text-center">Baseline<br>Night Time<br>10.am-07.00pm</th>
                                        <th class="text-center">Baseline<br>Max<br>Day & Night</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Noise Sensitive Areas Low Density Residential Areas</strong></td>
                                        <td>dBA</td>
                                        <td>60</td>
                                        <td>50</td>
                                        <td>75</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        $data3 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'noise'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                                $data3 = 'value='.$bunyi->baselinemax;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                                $data3 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 5" type="text" id="baselineempnoiseday" name="baselinedaynoise" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempnoise',5)"></td>
                                        <td><input class="form-control 5" type="text" id="baselineempnoisenight" name="baselinenightnoise" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempnoise',5)"></td>
                                        <td><input class="form-control 5" type="text" id="baselineempnoisemax" name="baselinemaxnoise" {{$data3}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempnoise',5)"></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td><strong>Suburban and Urban Residential Areas</strong></td>
                                        <td>dBA</td>
                                        <td>65</td>
                                        <td>60</td>
                                        <td>80</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        $data3 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'suburban'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                                $data3 = 'value='.$bunyi->baselinemax;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                                $data3 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 5" type="text" id="baselineempsuburbanday" name="baselinedaysuburrban" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempsuburban',5)"></td>
                                        <td><input class="form-control 5" type="text" id="baselineempsuburbannight" name="baselinenightsuburrban" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempsuburban',5)"></td>
                                        <td><input class="form-control 5" type="text" id="baselineempsuburbanmax" name="baselinemaxsuburrban" {{$data3}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempsuburban',5)"></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td><strong>Commercial, Business</strong></td>
                                        <td>dBA</td>
                                        <td>70</td>
                                        <td>65</td>
                                        <td>80</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        $data3 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'commercial'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                                $data3 = 'value='.$bunyi->baselinemax;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                                $data3 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 5" type="text" id="baselineempcommercialday" name="baselinedaycommercial" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommercial',5)"></td>
                                        <td><input class="form-control 5" type="text" id="baselineempcommercialnight" name="baselinenightcommercial" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommercial',5)"></td>
                                        <td><input class="form-control 5" type="text" id="baselineempcommercialmax" name="baselinemaxcommercial" {{$data3}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommercial',5)"></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td><strong>Industrial</strong></td>
                                        <td>dBA</td>
                                        <td>75</td>
                                        <td>65</td>
                                        <td>NA</td>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        $data1 = '';
                                        $data2 = '';
                                        $data3 = '';
                                        if(!is_numeric($bunyi->category)) {
                                            if($bunyi->category == 'industry'){
                                                $data1 = 'value='.$bunyi->baselineday;
                                                $data2 = 'value='.$bunyi->baselinenight;
                                                $data3 = 'value='.$bunyi->baselinemax;
                                            }else{
                                                $data1 = 'readonly';
                                                $data2 = 'readonly';
                                                $data3 = 'readonly';
                                            }
                                        }
                                        ?>
                                        <td><input class="form-control 5" type="text" id="baselineempindustryday" name="baselinedayindustrial" {{$data1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',5)"></td>
                                        <td><input class="form-control 5" type="text" id="baselineempindustrynight" name="baselinenightindustrial" {{$data2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',5)"></td>
                                        <td><input class="form-control 5" type="text" id="baselineempindustrymax" name="baselinemaxindustrial" {{$data3}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',5)"></td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            @endif

                            @if($schedule == 6)
                            <?php //dd($parameterbunyi); ?>
                            <input class="form-control" type="hidden" id="schedule" name="schedule" value="6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Receiving Land Use Category</th>
                                        <th>Unit</th>
                                        <th>Noise Parameter</th>
                                        <th style="text-align: center !important;">Day Time<br>07.00am-07.00pm</th>
                                        <th style="text-align: center !important;">Evening<br>07.00pm-10.00pm</th>
                                        <th style="text-align: center !important;">Night Time<br>10.00pm-07.00am</th>
                                        <th class="text-center" style="text-align: center !important;">Baseline<br>Day Time<br>07.00am-07.00pm</th>
                                        <th class="text-center" style="text-align: center !important;">Baseline<br>Evening<br>07.00pm-10.00pm</th>
                                        <th class="text-center" style="text-align: center !important;">Baseline<br>Night Time<br>10.00pm-07.00am</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="3"><strong>Residential (Note 2 **)</strong></td>
                                        <td rowspan="3">dBA</td>
                                        <td>L90</td>
                                        <td>60</td>
                                        <td>55</td>
                                        <td></td>
                                        <?php
                                            if (count($parameterbunyi) == 0) {
                                                $dataa1 = '';
                                                $dataa2 = '';
                                                $dataa3 = '';
                                            }
                                        ?>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        if(!is_numeric($bunyi->category) && $bunyi->category == 'residential' && $bunyi->noise_parameter == 'L90') {
                                            $dataa1 = '';
                                            $dataa2 = '';
                                            $dataa3 = '';
                                            if (!is_null($bunyi->baselineday) && !is_null($bunyi->baselineevening) && !is_null($bunyi->baselinenight)) {
                                                $dataa1 = 'value='.$bunyi->baselineday;
                                                $dataa2 = 'value='.$bunyi->baselineevening;
                                                $dataa3 = 'value='.$bunyi->baselinenight;
                                                break;
                                            }
                                        }else{
                                                $dataa1 = '';
                                                $dataa2 = '';
                                                $dataa3 = '';
                                            }
                                        ?>
                                        @endforeach
                                        <td><input class="form-control 6" type="text" id="baselineempresidentday1" name="baselinedayresidentl90" onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempresident',6)" {{$dataa1}}></td>
                                        <td><input class="form-control 6" type="text" id="baselineempresidentevening1" name="baselineeveningresidentl90"  onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempresident',6)" {{$dataa2}}></td>
                                        <td><input class="form-control 6" type="text" id="baselineempresidentnight1" name="baselinenightresidentl90"  onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempresident',6)" {{$dataa3}}></td>
                                    </tr>
                                    <tr>
                                        <td>L10</td>
                                        <td>75</td>
                                        <td>70</td>
                                        <td></td>
                                        <?php
                                            if (count($parameterbunyi) == 0) {
                                                $dataf1 = '';
                                                $dataf2 = '';
                                                $dataf3 = '';
                                            }
                                        ?>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        if(!is_numeric($bunyi->category) && $bunyi->category == 'residential' && $bunyi->noise_parameter == 'L10') {
                                            $dataf1 = '';
                                            $dataf2 = '';
                                            $dataf3 = '';
                                            if (!is_null($bunyi->baselineday) && !is_null($bunyi->baselineevening) && !is_null($bunyi->baselinenight)) {
                                                $dataf1 = 'value='.$bunyi->baselineday;
                                                $dataf2 = 'value='.$bunyi->baselineevening;
                                                $dataf3 = 'value='.$bunyi->baselinenight;
                                                break;
                                            }
                                        }else{
                                                $dataf1 = '';
                                                $dataf2 = '';
                                                $dataf3 = '';
                                            }
                                        ?>
                                        @endforeach
                                        <td><input class="form-control 6" type="text" id="baselineempresidentday2" name="baselinedayresidentl10" {{$dataf1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempresident',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempresidentevening2" name="baselineeveningresidentl10" {{$dataf2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempresident',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempresidentnight2" name="baselinenightresidentl10" {{$dataf3}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempresident',6)"></td>
                                    </tr>
                                    <tr>
                                        <td>Lmax</td>
                                        <td>90</td>
                                        <td>85</td>
                                        <td></td>
                                        <?php
                                            if (count($parameterbunyi) == 0) {
                                                $datag1 = '';
                                                $datag2 = '';
                                                $datag3 = '';
                                            }
                                        ?>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        if(!is_numeric($bunyi->category) && $bunyi->category == 'residential' && $bunyi->noise_parameter == 'Lmax') {
                                            $datag1 = '';
                                            $datag2 = '';
                                            $datag3 = '';
                                            if (!is_null($bunyi->baselineday) && !is_null($bunyi->baselineevening) && !is_null($bunyi->baselinenight)) {
                                                $datag1 = 'value='.$bunyi->baselineday;
                                                $datag2 = 'value='.$bunyi->baselineevening;
                                                $datag3 = 'value='.$bunyi->baselinenight;
                                                break;
                                            }
                                        }else{
                                                $datag1 = '';
                                                $datag2 = '';
                                                $datag3 = '';
                                            }
                                        ?>
                                        @endforeach
                                        <td><input class="form-control 6" type="text" id="baselineempresidentday3" name="baselinedayresidentlmax" {{$datag1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempresident',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempresidentevening3" name="baselineeveningresidentlmax"  {{$datag2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempresident',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempresidentnight3" name="baselinenightresidentlmax" {{$datag3}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempresident',6)"></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2"><strong>Commercial (Note 2 **)</strong></td>
                                        <td rowspan="2">dBA</td>
                                        <td>L90</td>
                                        <td>65</td>
                                        <td>60</td>
                                        <td>NA</td>
                                        <?php
                                            if (count($parameterbunyi) == 0) {
                                                $datab1 = '';
                                                $datab2 = '';
                                                $datab3 = '';
                                            }
                                        ?>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        if(!is_numeric($bunyi->category) && $bunyi->category == 'commercial') {
                                            $datab1 = '';
                                            $datab2 = '';
                                            $datab3 = '';
                                            if ($bunyi->noise_parameter == 'L90') {
                                            // if (!is_null($bunyi->baselineday) && !is_null($bunyi->baselineevening) && !is_null($bunyi->baselinenight)) {
                                                // dd('sini');
                                                $datab1 = 'value='.$bunyi->baselineday;
                                                $datab2 = 'value='.$bunyi->baselineevening;
                                                $datab3 = 'value='.$bunyi->baselinenight;
                                                break;
                                            }
                                        }else{
                                                $datab1 = 'readonly';
                                                $datab2 = 'readonly';
                                                $datab3 = 'readonly';
                                            }
                                        ?>
                                        @endforeach
                                        <?php //dd($datab1);?>
                                        <td><input class="form-control 6" type="text" id="baselineempcommerceday1" name="baselinedaycommerciall90" {{$datab1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommerce',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempcommerceevening1" name="baselineeveningcommerciall90" {{$datab2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommerce',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempcommercenight1" name="baselinenightcommerciall90"  {{$datab3}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommerce',6)"></td>
                                    </tr>
                                    <tr>
                                        <td>L10</td>
                                        <td>75</td>
                                        <td>70</td>
                                        <td>NA</td>
                                        <?php
                                            if (count($parameterbunyi) == 0) {
                                                $datac1 = '';
                                                $datac2 = '';
                                                $datac3 = '';
                                            }
                                        ?>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        if(!is_numeric($bunyi->category) && $bunyi->category == 'commercial') {
                                            $datac1 = '';
                                            $datac2 = '';
                                            $datac3 = '';
                                            if ($bunyi->noise_parameter == 'L10') {
                                            // if (!is_null($bunyi->baselineday) && !is_null($bunyi->baselineevening) && !is_null($bunyi->baselinenight)) {
                                                $datac1 = 'value='.$bunyi->baselineday;
                                                $datac2 = 'value='.$bunyi->baselineevening;
                                                $datac3 = 'value='.$bunyi->baselinenight;
                                                break;
                                            }
                                        }else{
                                                $datac1 = 'readonly';
                                                $datac2 = 'readonly';
                                                $datac3 = 'readonly';
                                            }
                                        ?>
                                        @endforeach
                                        <td><input class="form-control 6" type="text" id="baselineempcommerceday2" name="baselinedaycommerciall10" {{$datac1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommerce',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempcommerceevening2" name="baselineeveningcommerciall10" {{$datac2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommerce',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempcommercenight2" name="baselinenightcommerciall10"  {{$datac3}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempcommerce',6)"></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2"><strong>Industrial</strong></td>
                                        <td rowspan="2">dBA</td>
                                        <td>L90</td>
                                        <td>70</td>
                                        <td>NA</td>
                                        <td>NA</td>
                                        <?php
                                            if (count($parameterbunyi) == 0) {
                                                $datad1 = '';
                                                $datad2 = '';
                                                $datad3 = '';
                                            }
                                        ?>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        if(!is_numeric($bunyi->category) && $bunyi->category == 'industry' && $bunyi->noise_parameter == 'L90') {
                                            $datad1 = '';
                                            $datad2 = '';
                                            $datad3 = '';
                                            if (!is_null($bunyi->baselineday) && !is_null($bunyi->baselineevening) && !is_null($bunyi->baselinenight)) {
                                                $datad1 = 'value='.$bunyi->baselineday;
                                                $datad2 = 'value='.$bunyi->baselineevening;
                                                $datad3 = 'value='.$bunyi->baselinenight;
                                                break;
                                            }
                                        }else{
                                            $datad1 = 'readonly';
                                            $datad2 = 'readonly';
                                            $datad3 = 'readonly';
                                        }
                                        ?>
                                        @endforeach
                                        <td><input class="form-control 6" type="text" id="baselineempindustryday1" name="baselinedayindustryl90" {{$datad1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempindustryevening1" name="baselineeveningindustryl90" {{$datad2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempindustrynight1" name="baselinenightindustryl90" {{$datad3}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',6)"></td>
                                    </tr>
                                    <tr>
                                        <td>L10</td>
                                        <td>80</td>
                                        <td>NA</td>
                                        <td>NA</td>
                                        <?php
                                            if (count($parameterbunyi) == 0) {
                                                $datae1 = '';
                                                $datae2 = '';
                                                $datae3 = '';
                                            }
                                        ?>
                                        @foreach($parameterbunyi as $bunyi)
                                        <?php
                                        if(!is_numeric($bunyi->category) && $bunyi->category == 'industry' && $bunyi->noise_parameter == 'L10') {
                                            $datae1 = '';
                                            $datae2 = '';
                                            $datae3 = '';
                                            if (!is_null($bunyi->baselineday) && !is_null($bunyi->baselineevening) && !is_null($bunyi->baselinenight)) {
                                                $datae1 = 'value='.$bunyi->baselineday;
                                                $datae2 = 'value='.$bunyi->baselineevening;
                                                $datae3 = 'value='.$bunyi->baselinenight;
                                                break;
                                            }
                                        }else{
                                                $datae1 = 'readonly';
                                                $datae2 = 'readonly';
                                                $datae3 = 'readonly';
                                            }
                                        ?>
                                        @endforeach
                                        <td><input class="form-control 6" type="text" id="baselineempindustryday2" name="baselinedayindustryl10" {{$datae1}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',6)"></td>
                                        <td><input class="form-control 6" type="text" id="baselineempindustryevening2" name="baselineeveningindustryl10" {{$datae2}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',6)"></td>
                                        <td><input class="form-control 6" type="number" id="baselineempindustrynight2" name="baselinenightindustryl10" {{$datae3}} onkeypress ="return onlyNumberKey(event);" oninput="inputdata('baselineempindustry',6)"></td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>
                        @else
                        <div style="overflow-y: auto !important;max-height: 700px !important">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="fit">Bil</th>
                                    <th>Parameter</th>
                                    <th>Unit</th>
                                    <th>Kelas</th>
                                    <th width="20%">Standard/Kelas <span class="text-bold"><b>@if($stesen->class)[{{$stesen->class}}]@endif</b></span></th>
                                    <th>Data Baseline (EIA)</th>
                                    @if($stesen->is_emp==1)
                                    <th>Data Baseline (EMP)</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @if($parameters)
                                    @foreach($parameters as $parameter)
                                    <tr>
                                        <td>
                                            {{$no++}}
                                        </td>
                                        <td>
                                           {{optional($parameter->jenisparameter)->jenis_parameter}}
                                           @if($parameter->mode=='mandatory')<span style="color:red;">*</span>@endif
                                        </td>
                                        <td>
                                            @if(in_array(optional($parameter->jenisparameter)->unit,['','-']))

                                            @else
                                            <span style="text-transform:none !important">{{optional($parameter->jenisparameter)->unit}}</span>
                                            @endif
                                        </td>
                                        <td>

                                            @if(optional($parameter->jenisstandard)->class=="")
                                                <strong>Racun Perosak</strong>
                                            @else
                                                <strong>{{optional($parameter->jenisstandard)->class}}</strong>
                                            @endif
                                        </td>
                                        <td>
                                            @if($pengawasan_id == 8)
                                                {{$parameter->standard}}
                                            @else
                                                {{optional($parameter->jenisstandard)->parameter}}
                                            @endif
                                        </td>
                                        <td>
                                            <input type="hidden" name="parameter_id{{$parameter->parameter}}" id="parameter_id{{$parameter->parameter}}" value="{{$parameter->parameter}}">
                                            @if($pengawasan_id != 8)
                                            <input type="hidden" name="standard_id{{$parameter->standard}}" id="standard_id{{$parameter->standard}}" value="{{$parameter->standard}}">
                                            @endif
                                            <!-- <input class="form-control" type="text" id="baselineeia{{$parameter->standard}}" name="baselineeia{{$parameter->standard}}" value="{{$parameter->baselineeia}}" @if($parameter->mode=='mandatory') required @endif> -->
                                            {{$parameter->baselineeia}}
                                        </td>
                                        @if($stesen->is_emp==1)
                                        <td>
                                            <input class="form-control" type="text" id="baselineemp{{$parameter->standard}}" name="baselineemp{{$parameter->standard}}" value="{{$parameter->baselineemp}}" @if($parameter->mode=='mandatory') required @endif>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                @else
                                    @empty(!$parameters)
                                    <tr>
                                   <td valign="top" colspan="4" class="dataTables_empty"> <div class="alert alert-warning">
                                <strong>Sorry!</strong> No Product Found.
                            </div></td>
                                </tr>

                            @endempty
                                <tr>
                                   <td valign="top" colspan="4" class="dataTables_empty"> <span class="text-danger">Sila Pilih Kelas Pada Kemaskini Stesen</span></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- </div> -->
                @if(auth()->user()->entity_type == 'App\UserEMC')
                <button type="button" class="btn btn-info pull-right" onclick="submitForm('form-parameter-edit')" style="margin-right: 10px;"> Simpan</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Batal</button>
                @else
                <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Selesai</button>
                @endif
               <!-- <div class="table-responsive">
               <table class="table table-bordered" id="tableParameterSungai">
               	<thead>
               		<tr>
               			<th>Parameter</th>
               			<th>Standard</th>
               			<th>Baseline</th>
               			<th>Tindakan</th>
               		</tr>
               	</thead>
               </table>
               </div> -->
            </div>
            <div class="modal-footer">

            </div>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">
// $("#modal-edit").modal("show");
$('#modal-edit').modal({
    backdrop: 'static',
    keyboard: false
});
$('.modal form').trigger("reset");
$(".modal form").validate();

function onlyNumberKey(evt) { 
            
    // Only ASCII charactar in that range allowed 
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
    if ( ASCIICode != 46 && ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
        return false; 
    return true; 
}

$('input').bind('paste', function (event) {
    // var regex = /^[a-zA-Z1-100%()#@_& -]+$/;
    // var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    // if (!regex.test(key)) {
    //     event.preventDefault();
    //     return false;
    // }
    if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
        event.preventDefault();
    }

});


$('body').on('change','input:checkbox[name="jenis_pengawasan_id1[]"]',function () {
    if ($('input[name=\'jenis_pengawasan_id1[]\'][value=1]').prop('checked')==true) {
        document.getElementById('1').style.display = 'block';
    }else{
        document.getElementById('1').style.display = 'none';
    }

    if ($('input[name=\'jenis_pengawasan_id1[]\'][value=2]').prop('checked')==true) {
        document.getElementById('2').style.display = 'block';
    }else{
        document.getElementById('2').style.display = 'none';
    }
})

$("#form-parameter-edit").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid()){
        swal('Perhatian', 'Maklumat tidak lengkap.');
      return;
    }

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
            $("#modal-edit").modal("hide");
            $('#form-parameter-edit')[0].reset();
            $("select.select2").select2('data', {}); // clear out values selected
            $("select.select2").select2({ allowClear: true }); // re-init to show default status
            //document.getElementById("select2-standard-container").value= " Sila Pilih ";
            //var dropDown2 = document.getElementById("standard");
            //console.log(dropDown);
            //console.log(dropDown2);

            // tableParameterSungai.api().ajax.reload(null, false);
        }
    });
});

function inputdata(id,name) {
    if (name == 1) {
        $('.1').attr('readonly','readonly');
        $("#"+id+"night").prop('readonly', false);
        $("#"+id+"day").prop('readonly', false);

        if ($("#"+id+"night").val() == '' && $("#"+id+"day").val() == '') {
            $(".1").prop('readonly', false);
        }
    } else if(name == 2){
        console.log('2');
        $('.2').attr('readonly','readonly');
        $("#"+id+"night").prop('readonly', false);
        $("#"+id+"day").prop('readonly', false);

        if ($("#"+id+"night").val() == '' && $("#"+id+"day").val() == '') {
            $(".2").prop('readonly', false);
        }

    } else if(name == 4){
        console.log('4');
        $('.4').attr('readonly','readonly');
        $("#"+id+"night").prop('readonly', false);
        $("#"+id+"day").prop('readonly', false);

        if ($("#"+id+"night").val() == '' && $("#"+id+"day").val() == '') {
            $(".4").prop('readonly', false);
        }
    } else if(name == 5){
        console.log('5');
        $('.5').attr('readonly','readonly');
        $("#"+id+"night").prop('readonly', false);
        $("#"+id+"day").prop('readonly', false);
        $("#"+id+"max").prop('readonly', false);

        if ($("#"+id+"night").val() == '' && $("#"+id+"day").val() == '' && $("#"+id+"max").val() == '') {
            $(".5").prop('readonly', false);
        }
    } else if(name == 6){
        console.log('6');
        $('.6').attr('readonly','readonly');
        $("#"+id+"night1").prop('readonly', false);
        $("#"+id+"evening1").prop('readonly', false);
        $("#"+id+"day1").prop('readonly', false);
        $("#"+id+"night2").prop('readonly', false);
        $("#"+id+"evening2").prop('readonly', false);
        $("#"+id+"day2").prop('readonly', false);
        $("#"+id+"night3").prop('readonly', false);
        $("#"+id+"evening3").prop('readonly', false);
        $("#"+id+"day3").prop('readonly', false);

        // console.log( $("#"+id+"night2").val()+'-'+ $("#"+id+"evening2").val()+'-'+ $("#"+id+"day2").val());
        if ($("#"+id+"night1").val() == '' && $("#"+id+"evening1").val() == '' && $("#"+id+"day1").val() == '' && $("#"+id+"night2").val() == '' && $("#"+id+"evening2").val() == '' && $("#"+id+"day2").val() == '' && ($("#"+id+"night3").val() == '' && $("#"+id+"evening3").val() == '' && $("#"+id+"day3").val() == '' || $("#"+id+"night3").val() == undefined && $("#"+id+"evening3").val() == undefined && $("#"+id+"day3").val() == undefined) ) {
            $(".6").prop('readonly', false);
        }
        
    }
}

function openinputdata(id,name) {
    if (name == 1) {
        $('.1').attr('readonly','readonly');
        $("#"+id+"night").prop('readonly', false);
        $("#"+id+"day").prop('readonly', false);
    } else if(name == 2){
        console.log('2');
        $('.2').attr('readonly','readonly');
        $("#"+id+"night").prop('readonly', false);
        $("#"+id+"day").prop('readonly', false);
    } else if(name == 4){
        console.log('4');
        $('.4').attr('readonly','readonly');
        $("#"+id+"night").prop('readonly', false);
        $("#"+id+"day").prop('readonly', false);
    } else if(name == 5){
        console.log('5');
        $('.5').attr('readonly','readonly');
        $("#"+id+"night").prop('readonly', false);
        $("#"+id+"day").prop('readonly', false);
        $("#"+id+"max").prop('readonly', false);
    } else if(name == 6){
        console.log('6');
        $('.6').attr('readonly','readonly');
        $("#"+id+"night1").prop('readonly', false);
        $("#"+id+"evening1").prop('readonly', false);
        $("#"+id+"day1").prop('readonly', false);
        $("#"+id+"night2").prop('readonly', false);
        $("#"+id+"evening2").prop('readonly', false);
        $("#"+id+"day2").prop('readonly', false);
        $("#"+id+"night3").prop('readonly', false);
        $("#"+id+"evening3").prop('readonly', false);
        $("#"+id+"day3").prop('readonly', false);
    }
}


</script>
