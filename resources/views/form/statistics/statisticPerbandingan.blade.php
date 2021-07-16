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

$projek = Projek::join('projek_detail','projek_detail.projek_id','=','projek.id')->where('projek_detail.status_id','=',500)->where('projek.status', 200)->select(['projek.id',
'projek.no_fail_jas'])->groupby('projek.id')->get();
?>

<div class="container-fluid container-fixed-lg bg-white">
    <div style="font-size:14.5px; font-family: 'Montserrat'">
        <label><b>LAPORAN STATISTIK PERBANDINGAN STESEN PENGAWASAN</b></label>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="selectrequired">
                    NO FAIL JAS
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <select id="projek_id2" class="select-normal full-width custom-select border border-default " required="" data-error-msg="Ruangan ini perlu dipilih." data-init-plugin="select2" onchange="selectProjek2(this)">
                    <option value="">select</option>
                    @foreach ($projek as $projekdata)
                    <option value="{{$projekdata->id}}">{{$projekdata->no_fail_jas}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            {{-- <div class="form-group">
                <label class="" for="selectrequired">
                    TARIKH MULA
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <div class="input-group">
                    <input type="date" class="form-control border border-default input-radius-all" id="datepicker-component">
                    <div class="input-group-addon">
                        <i class="fal fa-calendar-day"></i>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="col-md-4">
            {{-- <div class="form-group">
                <label class="" for="selectrequired">
                    TARIKH AKHIR
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <div class="input-group">
                    <input type="date" class="form-control border border-default input-radius-all" id="datepicker-component">
                    <div class="input-group-addon">
                        <i class="fal fa-calendar-day"></i>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="" for="selectrequired">
                    JENIS PENGAWASAN
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <select class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih." id="jenis_pengawasan2" data-init-plugin="select2" onchange="changePengawasan2(this)">
                    <option value="">select</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="selectrequired">
                    STESEN 1
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <select id="stesen_data1" class="select-normal stesen_data2 full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih." data-init-plugin="select2" onchange = "changeStesen2(this,'1')">
                    <option value="">Select</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="selectrequired">
                    STESEN 2
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <select id="stesen_data2" class="select-normal stesen_data2 full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih." data-init-plugin="select2" onchange = "changeStesen2(this, '2')">
                    <option value="">Select</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="selectrequired">
                    PARAMETER 1
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <select id="parameter1" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih." data-init-plugin="select2">
                    <option>select</option>
                </select>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="selectrequired">
                    PARAMETER 2
                    <span class="text-danger" style="font-size:14px">*</span>
                </label>
                <select id="parameter2" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih." data-init-plugin="select2">
                    <option>select</option>
                </select>
            </div>
        </div>
    </div>
    <br>
</div>

<div class="row">
    <div class="col-md-12" style="margin-bottom: 31px;">
        <a id="" data-toggle="tooltip" title="" class="btn btn-default btn-xs pull-right" style="" type="button" onclick="" data-original-title="Tetapkan semula"><span style="color:#fff"> <i class="fas fa-undo text-danger"></i></span></a>
        <button value="" class="btn btn-primary btn-cons from-left pull-right" id="btnsubmit2">
            <span> Jana</span>
        </button>
    </div>
    <br>
</div>
{{-- <figure class="highcharts-figure"> --}}
    {{-- <div id="statistikPerbandinganChartDiv"></div> --}}
{{-- </figure> --}}


<figure class="highcharts-figure">
        <div id="perbandinganChart1"></div>
        <br>
        <br>
        <br>
        <div id="perbandinganChart2"></div>
</figure>


<table class="table" id="table" role="grid" aria-describedby="table_info">
    <thead>
        <tr role="row">
            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Parameter</th>
            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Unit Akhir</th>
            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Standard</th>
            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Baseline EIA</th>
            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Bacaan cerap</th>
        </tr>
    </thead>
    <tbody id="perbandinganTableBody">
        {{-- <tr>
            <td>1</td>
            <td>SUNGAIss</td>
            <td>BIOCHEMICAL OXYGEN DEMAND</td>
            <td>mg/L</td>
            <td>3</td>
            <td>1</td>
            <td>2.00</td>
        </tr> --}}
    </tbody>
</table>

</div>

@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    
    function selectProjek2(elem) {
        if (elem.value == '') {
            return ;
        }
        $.ajax({
            url: "{{ url('statistik/pengawasan') }}" + '/' + elem.value,
            method: "GET",
            success: function(response) {
                if (response.success) {
                    
                    $("#jenis_pengawasan2").empty()
                    $("#jenis_pengawasan2").append("<option value=''> Select </option> ")
                    for( var i = 0; i<response.jenis_pengawasan.length; i++){
                        $("#jenis_pengawasan2").append("<option value='"+response.jenis_pengawasan[i]+"'>"+response.jenis_pengawasan[i]+"</option>");
                    }
                }
            },
            error: function(response) {
                
            }
        });
    }
    
    function changePengawasan2(elem) {
        if (elem.value == '') {
            return ;
        }
        var projek_id = $('#projek_id2').val();
        
        $.ajax({
            url: "{{ url('statistik/getstesen') }}" + '/'+projek_id,
            method: "GET",
            data : {
                pengawasan : elem.value
            },
            success: function(response) {
                $(".stesen_data2").empty()
                $(".stesen_data2").append("<option value=''> Select </option> ")
                for( var i = 0; i<response.stesenData.length; i++){
                    $(".stesen_data2").append("<option value='"+response.stesenData[i].id+"'>"+response.stesenData[i].stesen+"</option>");
                }
            },
            error: function(response) {
                
            }
        });
    }
    
    function changeStesen2(elem, id) {
        if (elem.value == '') {
            return ;
        }
        var id = id;
        $.ajax({
            url: "{{ url('statistik/getparameter') }}" + '/'+elem.value,
            method: "GET",
            data : {
                pengawasan : elem.value
            },
            success: function(response) {
                console.log(id)
                console.log(response)
                $("#parameter"+id).empty()
                $("#parameter"+id).append("<option value=''> Select </option> ")
                for( var i = 0; i<response.parameter.length; i++){
                    $("#parameter"+id).append("<option value='"+response.parameter[i].id+"'>"+response.parameter[i].name+"</option>");
                }
            },
            error: function(response) {
                
            }
        });
    }
    
    // Highcharts.chart('statistikPerbandinganChartDiv', {
    //     style: {
    //         fontFamily: 'Montserrat'
    //     },
    //     title: {
    //         text: 'LAPORAN STATISTIK DARI / HINGGA',
    //         style: {
    //             fontFamily: 'Montserrat'
    //         }
    //     },
    //     yAxis: {
    //         title: {
    //             text: 'Bacaan'
    //         }
    //     },
    //     xAxis: {
    //         accessibility: {
    //             rangeDescription: 'AMMONIOCAL NITROGREN'
    //         }
    //     },
    //     legend: {
    //         layout: 'vertical',
    //         align: 'right',
    //         verticalAlign: 'middle'
    //     },
    //     plotOptions: {
    //         series: {
    //             label: {
    //                 connectorAllowed: false
    //             },
    //             pointStart: 2010
    //         }
    //     },
    //     series: [{
    //         name: 'AMMONIOCAL NITROGREN',
    //         data: [0, 2.5, 5, 7.5, 10, 12.5, 15]
    //     }],
    //     responsive: {
    //         rules: [{
    //             condition: {
    //                 maxWidth: 500
    //             },
    //             chartOptions: {
    //                 legend: {
    //                     layout: 'horizontal',
    //                     align: 'center',
    //                     verticalAlign: 'bottom'
    //                 }
    //             }
    //         }]
    //     }
    // });
    
    $('#btnsubmit2').click(function () {
        
        var  projek_id = $('#projek_id2').val();
        var  tarikh_mula = $('#tarikh_mula').val();
        var  tarikh_akhir = $('#tarikh_akhir').val();
        var  stesen_data1 = $('#stesen_data1').val();
        var  stesen_data2 = $('#stesen_data2').val();
        var  parameter1 = $('#parameter1').val();
        var  parameter2 = $('#parameter2').val();
        var  jenis_pengawasan = $('#jenis_pengawasan2').val();

        $("#perbandinganTableBody").html('');
        
        $.ajax({
            url: "{{ url('statistik/submitstatistiksai/multiple') }}" ,
            method: "POST",
            data : {
                projek_id : projek_id,
                tarikh_mula : tarikh_mula,
                tarikh_akhir : tarikh_akhir,
                stesen_data1 : stesen_data1,
                stesen_data2 : stesen_data2,
                parameter1 :parameter1,
                parameter2 :parameter2,
                jenis_pengawasan : jenis_pengawasan
            },
            success: function(response) {
                console.log(response);
                setperbandinganChart1(response);
                setperbandinganChart2(response);
                var parameter_name = response.parameter_name;
                var standard = response.standard;
                var unit = response.unit;
                var eia = response.eia;
                var cerap = response.cerap;
                var data1 = response.data1;
                var data2 = response.data2;

                if(parameter_name.length > 0)
                {
                    for (let index = 0; index < parameter_name.length; index++) {
                        $("#perbandinganTableBody").append("<tr> <td>"+ parameter_name[index].jenis_parameter +"</td> <td>"+ unit[index].unit +"</td> <td>"+ standard[index] +"</td> <td>"+ eia[index] +"</td> <td>"+ cerap[index] +"</td> </tr>");
                    }
                }
                
            },
            error: function(response) {
            }
        });
    });


    function setperbandinganChart1(data)
    {


        var title = {
               text: data.stesen1name   
            };
            var subtitle = {
               text: ''
            };
            var xAxis = {
               categories: ['Standard', 'EIA', 'cerap']
            };
            var yAxis = {
               title: {
                  text: 'JUMLAH'
               },
               plotLines: [{
                  value: 0,
                  width: 1,
                  color: '#808080'
               }]
            };   


            var tooltip = {
               valueSuffix: ''
            }
            var legend = {
               layout: 'vertical',
               align: 'right',
               verticalAlign: 'middle',
               borderWidth: 0
            };
            var series =  [{
                  name: data.parameter1name,
                  data: data.data1,
                  //color: '#006699'
                  
               }

            ];

            var json = {};
            json.title = title;
            json.subtitle = subtitle;
            json.xAxis = xAxis;
            json.yAxis = yAxis;
            json.tooltip = tooltip;
            json.legend = legend;
            json.series = series;
			
            


        Highcharts.chart('perbandinganChart1', json);
    }

    function setperbandinganChart2(data)
    {


        var title = {
               text: data.stesen2name   
            };
            var subtitle = {
               text: ''
            };
            var xAxis = {
               categories: ['Standard', 'EIA', 'cerap']
            };
            var yAxis = {
               title: {
                  text: 'JUMLAH'
               },
               plotLines: [{
                  value: 0,
                  width: 1,
                  color: '#808080'
               }]
            };   


            var tooltip = {
               valueSuffix: ''
            }
            var legend = {
               layout: 'vertical',
               align: 'right',
               verticalAlign: 'middle',
               borderWidth: 0
            };
            var series =  [{
                  name: data.parameter2name,
                  data: data.data2,
                  color: '#006699'
                  
               }

            ];

            var json = {};
            json.title = title;
            json.subtitle = subtitle;
            json.xAxis = xAxis;
            json.yAxis = yAxis;
            json.tooltip = tooltip;
            json.legend = legend;
            json.series = series;
			
            


        Highcharts.chart('perbandinganChart2', json);
    }
    
</script>
@endpush
