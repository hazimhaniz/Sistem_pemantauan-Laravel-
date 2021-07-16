        <style>
            .bg-complete {
                background-color: #8ac926 !important;
            }

            .bg-danger {
                background-color: #ff595e !important;
            }

            .bg-pending {
                background-color: #939393 !important;
            }

            .bg-success {
                background-color: #8ac926 !important;
            }

            .rounded {
                //border-radius:.25rem!important
            }

            p,
            a,
            .font-montserrat,
            .bold {

                /* color: #fff; */
            }

            a:hover {

                color: #fff;
            }

            .rounded {
                //width:500px;
                //height:300px;
                //background:lightGrey; 
                border-radius: 10px 10px 10px 10px;
                //overflow:hidden;
            }

            .font-montserrat {

                font-size: 14px !important;
            }

            .hide {
                display: none;
            }

            .dash-baha {
                background-color: #ffffff;
                color: #923535;
                border-color: #923535;
            }

            .dash {
                background-image: none;
                box-shadow: none;
                text-shadow: none;
                padding: 9px 19px 9px 15px;
                border-radius: 3px;
                font-size: 13px;
                border-width: 0;
                -webkit-transition: all 0.2s linear 0s;
                transition: all 0.2s linear 0s;
            }

            .dash-baha {
                color: #721c24;
                background-color: #ffffff;
                border-color: #f5c6cb;
            }

            .baha {
                position: relative;
                padding: 5px 1.25rem;
                margin-bottom: 3px;
                border: 1px solid transparent;
                border-radius: .25rem;
            }

            .indi-label {
                pointer-events: none;
                border: 2px solid white;
                width: 92px;
            }

            .indi-stat {
                width: 46%;
                pointer-events: none;
            }

            h3 {
                font-size: 17px !important;
            }

            .div {
                text-align: center;
            }

            .font-size-lg {
                font-size: 14px;
            }



            .label.label-darkblue-gradient-1 {
                color: #fff;
                background-color: #131c32;
                font-size: 8.5px !important;
            }

            .label.label-darkblue-gradient-2 {
                color: #fff;
                background-color: #041b3b;
                font-size: 8.5px !important;
            }

            .label.label-darkblue-gradient-3 {
                color: #fff;
                background-color: #303b58;
                font-size: 8.5px !important;
            }

            .label.label-darkblue-gradient-4 {
                color: #fff;
                background-color: #565d77;
                font-size: 8.5px !important;
            }

            .label.label-darkblue-gradient-5 {
                color: #fff;
                background-color: #7e8398;
                font-size: 8.5px !important;
            }

            .label.label-darkblue-gradient-6 {
                color: #fff;
                background-color: #a8abb9;
                font-size: 8.5px !important;
            }

            .label.label-darkblue-gradient-7 {
                color: #fff;
                background-color: #d3d4db;
                font-size: 8.5px !important;
            }

            .label.label-light-grey {
                color: #3F4254;
                background-color: #EBEDF3;
                font-size: 8.5px !important;
            }

            .label.label-light-blue {
                color: #3699FF;
                background-color: #E1F0FF;
                font-size: 8.5px !important;
            }

            .label.label-light-purple {
                color: #8950FC;
                background-color: #EEE5FF;
                font-size: 8.5px !important;
            }

            .label.label-light-warning {
                color: #FFA800;
                background-color: #FFF4DE;
                font-size: 8.5px !important;
            }

            .label.label-light-success {
                color: #1BC5BD;
                background-color: #C9F7F5;
                font-size: 8.5px !important;
            }

            .label.label-light-danger {
                color: #F64E60;
                background-color: #FFE2E5;
                font-size: 8.5px !important;
            }

            .label.label-invisible {
                color: #ffff;
                background-color: #ffff;
                font-size: 8.5px !important;
            }




            #hideTabs {
                display: block;
            }

            label {
                font-family: 'Montserrat' !important;
                font-size: 10.5px !important;
            }
        </style>
        <?php
        $startYear = date("Y", strtotime($projek->tarikh_awal));
        $endYear =  date("Y", strtotime($projek->tarikh_akhir));
        $diffYears = abs($startYear - $endYear);

        $startMonth = date("m", strtotime($projek->tarikh_awal));
        $endMonth =  date("m", strtotime($projek->tarikh_akhir));
        $diffMonths = abs($endMonth - $startMonth);
        $showFasa = $projek->jenis_pakej;
        $rrow  = count($jenispengawasan);
        ?>
        <div class="row">
            <input type="hidden" name="projekId" value="{{$projek->id}}" id="projekId">
            <div class="col-md-3">
                <div class="form-group field-pbaruform-datafilem required">
                    <div class="dashTitle1" style="margin-bottom: 5px;"><b>TAHUN {{ $year }}-{{ $month }}</b></div>

                    <select id="selectYear" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Silih pilih satu jenis aktiviti." onchange="selectYear()">

                        <option selected=""></option>
                        <option value="{{$startYear}}" {{ $startYear== $year ? 'selected' : '' }}>{{$startYear}}</option>
                        @for($i =1 ;$i <= $diffYears ;$i++) <option value="{{$startYear+1}}" {{ $startYear+1 == $year ? 'selected' : '' }}> {{$startYear+1}} </option>
                        @endfor

                    </select>
                    <div class="help-block"></div>

                    <label style="color: red;"><b>SILA PILIH TAHUN DAN BULAN</b></label>
                </div>
            </div>
            <div class="col-md-3"></div>

            <div class="col-md-6 table-responsive">
                @if($projek->jenis_pakej==0)
                <table class="table tableSummaryFRP table-responsive dataTable no-footer display nowrap" id="" role="grid" aria-describedby="table_info">
                    <thead>
                        <tr>
                            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width:; background-color:#005221 !important; color:#fff !important;">ITEM</th>
                            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width:; background-color:#005221 !important; color:#fff !important;">JENIS PENGAWASAN</th>
                            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: ; background-color:#5e8965 !important; color:#fff !important;"> STATUS</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(A)EIA 1-18</div>
                            </td>
                            <td>
                                <div style="text-align:center;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td style="text-align:center;">
                                <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-inline {{ $borangA ? $borangA->status->badge : '' }}">{{ $borangA ? $borangA->status->name : '-' }}</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(B)EIA 2-18</div>
                            </td>
                            <td>
                                <div style="text-align:center;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td style="text-align:center;">
                                <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-inline {{ $borangB ? $borangB->status->badge : '' }}">{{ $borangB ? $borangB->status->name : '-' }}</span>

                            </td>

                        </tr>
                        <tr>
                            <td rowspan="{{$rrow+1}}">
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(C)PENGAWASAN</div>
                            </td>

                        </tr>
                        @foreach ($jenispengawasan as $key => $pengawasan)
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">{{ 
                                    implode(' ', array_slice(explode(' ', $pengawasan['name']), 0, 5)) }}
                                </div>
                            </td>
                            <td style="text-align:center;">
                                <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-inline {{ $pengawasan['badge']?$pengawasan['badge']:'default' }}">{{ $pengawasan['status']?$pengawasan['status']:'-' }}</span>
                            </td>
                        </tr>
                        @endforeach
                        
                        
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(D)BMP'S</div>
                            </td>
                            <td>
                                <div style="text-align:center;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td style="text-align:center;">
                                <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-inline {{ $borangD ? $borangD->status->badge : '' }}">{{ $borangD ? $borangD->status->name : '-' }}</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(E)AUDIT</div>
                            </td>
                            <td>
                                <div style="text-align:center;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td style="text-align:center;">
                                <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-inline {{ $borangE ? $borangE->status->badge : '' }}">{{ $borangE ? $borangE->status->name : '-' }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(F)PERLAKSANAAN EMT</div>
                            </td>
                            <td>
                                <div style="text-align:center;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td style="text-align:center;">
                                <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-inline {{ $borangF ? $borangF->status->badge : '' }}">{{ $borangF ? $borangF->status->name : '-' }}</span>
                            </td>

                        </tr>
                        
                        @hasanyrole('pp')
                        @if($projekBulanan)
                        @if($projekBulanan->status == 504)
                        <tr>
                            <td style="text-align:center;">
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">Tindakan Selanjutnya</div>
                            </td>
                            <td rowspan="2">
                                <div style="padding-bottom: 10px;"> <a href="{{ url('/projek/hantar-laporan-bulanan') }}/{{ $projek->id }}/{{ $year }}/{{ $month }}" class="btn btn-xs btn-success">HANTAR LAPORAN BULANAN</a></div>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr> -->
                        @endif
                        @endif
                        @endhasanyrole

                    </tbody>

                </table>
                <br>
                @elseif($projek->jenis_pakej==1)
                <table class="table tableSummaryFRP table-responsive dataTable no-footer display nowrap" id="" role="grid" aria-describedby="table_info">
                    <thead>
                        <tr>
                            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width:; background-color:#1b4425  !important; color:#fff !important;">ITEM</th>
                            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: ; background-color:#005221!important; color:#fff !important;"> LAPORAN</th>
                            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: ; background-color:#0f9143!important; color:#fff !important;"> PENGAWASAN</th>
                            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: ; background-color:#5e8965 !important; color:#fff !important;"> STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(A)EIA 1-18</div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">SIASATAN</div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td style="text-align:center;">
                                <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-light-blue label-inline">DRAF</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(E&F)Audit & Perlaksanaan EMT</div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">SIASATAN</div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td style="text-align:center;">
                                <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-light-blue label-inline">DRAF</span>
                            </td>

                        </tr>

                        <tr>
                            <td rowspan="3">
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">FASA 1</div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(B)EIA-2-18 </div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td style="text-align:center;">
                                <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-light-blue label-inline">DRAF</span>
                            </td>


                        </tr>
                        <tr>
                            <td rowspan="3">
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(C)PENGAWASAN</div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">SUNGAI</div>
                            </td>
                            <td> <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-light-blue label-inline">DRAF</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">MARIN</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">TASIK</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(D)BMP's</div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td> <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-light-blue label-inline">DRAF</span></td>
                        </tr>
                        <tr>
                            <td rowspan="3">
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">FASA 2</div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(B)EIA-2-18 </div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td style="text-align:center;">
                                <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-light-blue label-inline">DRAF</span>
                            </td>

                        </tr>
                        <tr>
                            <td rowspan="3">
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(C)PENGAWASAN</div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">SUNGAI</div>
                            </td>
                            <td> <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-light-blue label-inline">DRAF</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">MARIN</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">AIR TANAH</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px">(D)BMP's</div>
                            </td>
                            <td>
                                <div style="text-align:left;font-size:10.5px; padding-bottom:5px"></div>
                            </td>
                            <td> <span style="text-align:center;font-size:12px padding-bottom:5px" class=" label label-lg label-light-blue label-inline">DRAF</span></td>
                        </tr>


                    </tbody>

                </table>
                @endif
            </div>


            <div class="col-md-12">
                <div class="dashTitle1">&nbsp; <i class="fa fa-line-chart" aria-hidden="true"></i> BULAN </div>

                <div id="showdates"></div>
                &nbsp;&nbsp;
            </div>
        </div>

        @if($projek->jenis_pakej)
        @include('form.berfasa',['proejk' => $projek, 'year' => $year, 'month' => $month, 'logdata' => $logdata])
        @else
        @include('form.noberfasa',['proejk' => $projek,'year' => $year, 'month' => $month, 'logdata' => $logdata])
        @endif

        <script type="text/javascript">
            function selectYear() {
                var year = $('#selectYear').val()
                var projekId = $('#projekId').val()
                let data = {
                    'month': "{{ $month }}"
                }

                $.ajax({
                    url: "{{ url('projek/getmonths') }}" + '/' + year + '/' + projekId,
                    method: "GET",
                    data: data,
                    success: function(response) {
                        console.log(response);
                        $("#showdates").html(response);
                        // $('#hideTabs').show(); 
                    },
                    error: function(response) {

                    }
                });
            }

            function showtab(month) {

                $('#hideTabs').show();
                var year = $('#selectYear').val()
                var projekId = $('#projekId').val()
                $.ajax({
                    url: "{{ url('projek/savemonths') }}" + '/' + month + '/' + year + '/' + projekId,
                    method: "GET",
                    success: function(response) {
                        window.location.replace("{{ url('/projek/form') }}/" + projekId + "/" + year + "/" + month);
                        $('#hideTabs').show();
                    },
                    error: function(response) {

                    }
                });
            }
        </script>
        <script>
            $(document).ready(function() {
                @if($year)
                selectYear();
                @endif
            });
        </script>
        <script>

        </script>