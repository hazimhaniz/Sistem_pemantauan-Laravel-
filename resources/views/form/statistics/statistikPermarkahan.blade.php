<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }
    
    #container {
        height: 400px;
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
    
    .custom-select {
        font-family: 'Montserrat' !important;
        font-size: 11.5px !important;
    }
</style>

<div class="container-fluid container-fixed-lg bg-white">
    <div style="font-size:14.5px; font-family: 'Montserrat'">
        <label><b>LAPORAN PEMARKAHAN</b></label>
    </div>

    </div>    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="laporanPemarkahan_tahun"> TAHUN <span class="text-danger" style="font-size:14px">*</span></label>
                <select id="laporanPemarkahan_tahun" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih.">
                    @for($x = 0; $x <= 5; $x++)
                    <option value="{{ now()->year - $x }}" {{ now()->year == (now()->year - $x) ? 'selected' : '' }}> {{ now()->year - $x }} </option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="laporanPemarkahan_bulan_from"> DARIPADA BULAN <span class="text-danger" style="font-size:14px">*</span></label>
                <select id="laporanPemarkahan_bulan_from" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih.">
                    @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ now()->month == $i ? 'selected' : '' }}> {{ $i }} </option>
                    @endfor
                </select>

                <label class="" for="laporanPemarkahan_bulan_to"> HINGGA BULAN <span class="text-danger" style="font-size:14px">*</span></label>
                <select id="laporanPemarkahan_bulan_to" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih.">
                    @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ now()->month == $i ? 'selected' : '' }}> {{ $i }} </option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 31px;">
            <button id="getLaporanPemarkahanBtn" class="btn btn-primary btn-cons from-left pull-right">
                <span>Carian</span>
            </button>
        </div>
        <br>
    </div>
    <figure class="highcharts-figure">
        <div id="pemarkahanChart"></div>
    </figure>
    
    <table id="senaraiProjekTablePemarkahan" class="table table-hover table-responsive dataTable no-footer display" id="table" role="grid" aria-describedby="table_info">
        <thead>
            <tr>
                <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: 5px; color:#000">Bil.</th>
                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">No Fail Jas</th>
                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 45px; color:#000">Nama Projek</th>
                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 30px; color:#000">Markah</th>
            </tr>
        </thead>
        <tbody id="senaraiProjekTablePemarkahanBody">
        </tbody>
    </table>
    


@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    $("#getLaporanPemarkahanBtn").on('click', function(){
        
        $("#senaraiProjekTablePemarkahanBody").html('');

        var laporanPemarkahan_bulan_from = $("#laporanPemarkahan_bulan_from").val();
        var laporanPemarkahan_bulan_to = $("#laporanPemarkahan_bulan_to").val();
        var laporanPemarkahan_tahun = $("#laporanPemarkahan_tahun").val();
        
        $.ajax({
            url: "{{ url('/home/getLaporanPemarkahan') }}/" + laporanPemarkahan_tahun + "/" + laporanPemarkahan_bulan_from + "/" + laporanPemarkahan_bulan_to,
            type: 'POST',
            async: true,
            dataType: "json",
            success: function (response) {
                setpemarkahanChart(response);
                console.log(response);
                var laporanPermakahans = response.laporanPermakahans;
                if(response.laporanPermakahans.length > 0)
                {
                    for (let index = 0; index < laporanPermakahans.length; index++) {
                        var count = index + 1;
                        $("#senaraiProjekTablePemarkahanBody").append("<tr> <td>"+ count  +"</td> <td>"+ laporanPermakahans[index].projek.no_fail_jas +"</td> <td> <span class='ow pull-left'> "+ laporanPermakahans[index].projek.nama_projek +" </span> </td> <td>"+ laporanPermakahans[index].total +"</td> </tr>");
                    }
                }
            }
        });
    });
    
    function setpemarkahanChart(data)
    {


        var title = {
               text: 'STATISTIK PEMARKAHAN '   
            };
            var subtitle = {
               text: ''
            };
            var xAxis = {
               categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                  'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
                  name: 'patuh',
                  data: data.patuh,
                  color: '#5cb85c'
                  
               }, 
               {
                  name: 'tidak patuh',
                  data: data.tidakPatuh,
                  color: '#d9534f'
               }, 

               {
                  name: 'patuh sebahagian',
                  data: data.patuhSebahagian,
                  color: '#f0ad4e'
               }, 

            ];

            var json = {};
            json.title = title;
            json.subtitle = subtitle;
            json.xAxis = xAxis;
            json.yAxis = yAxis;
            json.tooltip = tooltip;
            json.legend = legend;
            json.series = series;
            


        Highcharts.chart('pemarkahanChart', json);
    }
</script>
@endpush