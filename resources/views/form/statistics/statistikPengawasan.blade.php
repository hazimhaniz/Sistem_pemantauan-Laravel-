<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
    }
    
    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }
    
    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }
    
    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }
    
    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }
    
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
    
    table {
        border-collapse: separate;
        border: solid #DDDDDD 1px;
        border-radius: 6px;
        -moz-border-radius: 6px;
    }
    
    .table>thead>tr>th {
        
        background-color: #E7E7E7 !important;
        
        color: #000 !important;
        //color: #eeee !important;
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        //border-bottom: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 4px !important;
        text-align: center !important;
        
    }
    
    .table>tbody>tr>td {
        
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 0px !important;
        margin-right: 0px !important;
        text-align: center !important;
        
        
    }
    
    .custom-select {
        font-family: 'Montserrat' !important;
        font-size: 11.5px !important;
    }
</style>
<?php
use App\Projek;
use App\ProjekBulananStatus;
use App\ProjekDetail;

$projek = Projek::join('projek_detail','projek_detail.projek_id','=','projek.id')->where('projek_detail.status_id','=',500)->where('projek.status', 200)->select(['projek.id', 'projek.no_fail_jas'])->groupby('projek.id')->get();
?>

<div class="container-fluid container-lg bg-white">
    <div style="font-size:14.5px; font-family: 'Montserrat'">
        <label><b>LAPORAN CERAPAN STESEN PENGAWASAN</b></label>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="selectrequired">
                    NO FAIL JAS
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <select id="projek_id" class="select-normal full-width custom-select border border-default " required="" data-error-msg="Ruangan ini perlu dipilih." data-init-plugin="select2" onchange="selectProjek(this)">
                    <option value=""></option>
                    @foreach ($projek as $projekdata)
                    <option value="{{$projekdata->id}}">{{$projekdata->no_fail_jas}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="pengawasan_tahun"> TAHUN <span class="text-danger" style="font-size:14px">*</span></label>
                <select id="pengawasan_tahun" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih.">
                @for($x = 0; $x <= 5; $x++)
                    <option value="{{ now()->year - $x }}" {{ now()->year == (now()->year - $x) ? 'selected' : '' }}> {{ now()->year - $x }} </option>
                    @endfor
                </select>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="pengawasan_bulan"> BULAN <span class="text-danger" style="font-size:14px">*</span></label>
                <select id="pengawasan_bulan" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih.">
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ now()->month == $i ? 'selected' : '' }}> {{ $i }} </option>
                    @endfor
                </select>
            </div>
        </div>

        {{-- <div class="col-md-4">
            <div class="form-group">
                <label class="" for="selectrequired">
                    TARIKH MULA
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <div class="input-group">
                    <input type="date" class="form-control border border-default input-radius-all" id="tarikh_mula">
                    <div class="input-group-addon">
                        <i class="fal fa-calendar-day"></i>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-md-4">
            <div class="form-group">
                <label class="" for="selectrequired">
                    TARIKH AKHIR
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <div class="input-group">
                    <input type="date" class="form-control border border-default input-radius-all" id="tarikh_akhir">
                    <div class="input-group-addon">
                        <i class="fal fa-calendar-day"></i>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="selectrequired">
                    JENIS PENGAWASAN
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <select class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih." id="jenis_pengawasan" data-init-plugin="select2" onchange="changePengawasan(this)">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="selectrequired">
                    STESEN
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <select id="stesen_data" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih." data-init-plugin="select2" onchange = "changeStesen(this)">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="selectrequired">
                    PARAMETER
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <select id="parameter" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih." data-init-plugin="select2">
                    <option value=""></option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 31px;">
            <a id="" data-toggle="tooltip" title="" class="btn btn-default btn-xs pull-right" style="" type="button" onclick="" data-original-title="Tetapkan semula"><span style="color:#fff"> <i class="fas fa-undo text-danger"></i></span></a>
            <button value="" class="btn btn-primary btn-cons from-left pull-right" id="btnsubmit">
                <span>Jana</span>
            </button>
        </div>
        <br>
    </div>
    <figure class="highcharts-figure">
        <div id="statistikPengawasanChart"></div>
    </figure>
</div>

@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
    function selectProjek(elem) {
        if (elem.value == '') {
            return ;
        }
        $.ajax({
            url: "{{ url('statistik/pengawasan') }}" + '/' + elem.value,
            method: "GET",
            success: function(response) {
                if (response.success) {
                    
                    $("#jenis_pengawasan").empty();
                    $("#jenis_pengawasan").append("<option value=''> Select </option> ");
                    for( var i = 0; i<response.jenis_pengawasan.length; i++){
                        $("#jenis_pengawasan").append("<option value='"+response.jenis_pengawasan[i]+"'>"+response.jenis_pengawasan[i]+"</option>");
                    }
                }
            },
            error: function(response) {
                
            }
        });
    }

    function changePengawasan(elem) {
        if (elem.value == '') {
            return ;
        }
        var projek_id = $('#projek_id').val();
        
        $.ajax({
            url: "{{ url('statistik/getstesen') }}" + '/'+projek_id,
            method: "GET",
            data : {
                pengawasan : elem.value
            },
            success: function(response) {
                $("#stesen_data").empty()
                $("#stesen_data").append("<option value=''> Select </option> ");
                for( var i = 0; i<response.stesenData.length; i++){
                    $("#stesen_data").append("<option value='"+response.stesenData[i].id+"'>"+response.stesenData[i].stesen+" "+ response.stesenData[i].tahun +"-"+ response.stesenData[i].bulan +"</option>");
                }
            },
            error: function(response) {
                
            }
        });
    }

    function changeStesen(elem) {
        if (elem.value == '') {
            return ;
        }
        $.ajax({
            url: "{{ url('statistik/getparameter') }}" + '/'+elem.value,
            method: "GET",
            data : {
                pengawasan : elem.value
            },
            success: function(response) {
                $("#parameter").empty()
                $("#parameter").append("<option value=''> Select </option>");
                for( var i = 0; i<response.parameter.length; i++){
                    $("#parameter").append("<option value='"+response.parameter[i].id+"'>"+response.parameter[i].name+"</option>");
                }
            },
            error: function(response) {
                
            }
        });
    }
    
    $('#btnsubmit').click(function () {
        
        var  projek_id = $('#projek_id').val();
        var  tarikh_mula = $('#tarikh_mula').val();
        var  tarikh_akhir = $('#tarikh_akhir').val();
        var  stesen_data = $('#stesen_data').val();
        var  parameter = $('#parameter').val();
        var  jenis_pengawasan = $('#jenis_pengawasan').val();
        var  tahun_pengawasan = $('#pengawasan_tahun').val();
        var  bulan_pengawasan = $('#pengawasan_bulan').val();
        
        $.ajax({
            url: "{{ url('statistik/submitstatistik/single') }}",
            method: "POST",
            data : {
                projek_id : projek_id,
                tarikh_mula : tarikh_mula,
                tarikh_akhir : tarikh_akhir,
                stesen_data : stesen_data,
                parameter :parameter,
                jenis_pengawasan : jenis_pengawasan,
                tahun_pengawasan : tahun_pengawasan,
                bulan_pengawasan : bulan_pengawasan
            
            },
            success: function(response) {
                highcharts(response);
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
    
    function highcharts(data) {

        Highcharts.chart('statistikPengawasanChart', {
            chart: {
                type: 'line',
                style: {
                    fontFamily: 'Montserrat'
                }
            },
            title: {
                text: data.title
            },
            xAxis: {
                categories: data.categories,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ''
            },
            series: [{
                name: 'Bacaan Cerap',
                data: data.data_cerap
            },
            {
                name: 'Baseline EIA',
                data: data.data_baselineeia
            },
            {
                name: 'Baseline EMP',
                data: data.data_baselineemp
            },

            {
                name: 'standard',
                data: data.data_standard
            }
            ]
        });
    }
    
</script>
@endpush