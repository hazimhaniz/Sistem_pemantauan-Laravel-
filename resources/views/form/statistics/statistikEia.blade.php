<style>

#senaraiProjekTableBody 
{

    cursor:pointer;
}

#senaraiProjekTableBody .hov:hover
{

    background-color: #b3f0ff;
}



#senaraiProjekTableBodyBulanan .hov:hover
{

    background-color: #b3f0ff;
}



#senaraiProjekTableBodyBulanan
{

    cursor:pointer;
    
}


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
        <label><b>LAPORAN STATISTIK EIA</b></label>
    </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="statistikEIA_tahun"> TAHUN <span class="text-danger" style="font-size:14px">*</span></label>
                <select id="statistikEIA_tahun" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih.">
                    @for($x = 0; $x <= 5; $x++)
                    <option value="{{ now()->year - $x }}" {{ now()->year == (now()->year - $x) ? 'selected' : '' }}> {{ now()->year - $x }} </option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="statistikEIA_bulan"> BULAN <span class="text-danger" style="font-size:14px">*</span></label>
                <select id="statistikEIA_bulan" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih.">
                    @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ now()->month == $i ? 'selected' : '' }}> {{ $i }} </option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 31px; ">
            <button id="getStatisticEIABtn" class="btn btn-primary btn-cons from-left pull-right">
                <span>Carian </span>
            </button>
        </div>
        <br>
    </div>
    
    
    <figure class="highcharts-figure">
        <div id="statisticEIAChart"></div>
        <br>
        <br>
        <br>
        <br>

        <div id="siasatanChart"></div>
    </figure>
    
    

    <table id="senaraiProjekTable" class="table table-hover table-responsive dataTable no-footer display" id="table" role="grid" aria-describedby="table_info" >
        <thead>
            <tr onclick="location.href='pengurusan_projek/laporan/siasatan';">
                <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: 5px; color:#000">Bil.</th>
                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">No Fail Jas</th>
                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 45px; color:#000">Nama Projek</th>
                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 30px; color:#000">Status Laporan EIA </th>
            </tr>
        </thead>
       
        <tbody id="senaraiProjekTableBodyBulanan" onclick="location.href='pengurusan_projek/laporan/bulanan?status=telah_disahkan';">
        <tbody id="senaraiProjekTableBody" onclick="location.href='pengurusan_projek/laporan/siasatan';">
        </tbody>
    </table>
    
    



@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    $("#getStatisticEIABtn").on('click', function(){
        
        $("#senaraiProjekTableBody").html('');

        var statistikEIA_bulan = $("#statistikEIA_bulan").val();
        var statistikEIA_tahun = $("#statistikEIA_tahun").val();
        
        $.ajax({
            url: "{{ url('/home/getStatisticEIA') }}/" + statistikEIA_tahun + "/" + statistikEIA_bulan,
            type: 'POST',
            async: true,
            dataType: "json",
            success: function (response) {
                setStatisticEIAChart(response);
                setSiasatanChart(response);
                console.log(response);

                var projekBulanans = response.projekBulanans;
                var siasatan = response.siasatan;

                $("#senaraiProjekTableBodyBulanan").empty();
                $("#senaraiProjekTableBody").empty();


                if(response.projekBulanans.length > 0)
                {
                       
                    
                    for (let index = 0; index < projekBulanans.length; index++) {
                        var count = index + 1;
                        
                        $("#senaraiProjekTableBodyBulanan").append("<tr> <td>"+ count  +"</td> <td class='hov'>  "+ projekBulanans[index].projek.no_fail_jas +"  </td> <td><span class='ow pull-left'>"+ projekBulanans[index].projek.nama_projek +"</span></td> <td>"+ 
                        projekBulanans[index].status.name  + "</td> </tr>");
                    }
                }


                if(response.siasatan.length > 0)
                {
                     var x = 0;
                    
                    for (let index = projekBulanans.length; index < projekBulanans.length + siasatan.length; index++) {
                        var count = index + 1;
                        
                        
                        $("#senaraiProjekTableBody").append("<tr > <td>"+ count  +"</td> <td class='hov'>  "+ siasatan[x].projek.no_fail_jas +"  </td> <td><span class='ow pull-left'>"+ siasatan[x].projek.nama_projek +"</span></td> <td>"+ 
                        siasatan[x].status.name + "</td> </tr>");

                        x++ ;
                    }
                }
            }
        });
    });
    
    function setStatisticEIAChart(data)
    {
        Highcharts.chart('statisticEIAChart', {
            chart: {
                type: 'bar',
                style: {
                    fontFamily: 'Montserrat'
                }
            },
            title: {
                text: 'LAPORAN BULANAN STATISTIK EIA'
            },
            xAxis: {
                categories: data.categories,
                title: {
                    text: null
                }
            },
            yAxis: {
      allowDecimals:false,
      labels: {
        style: {
          fontSize: '9px',
          width: '175px'
        }
      },
      title: {
        text: ''
      }
    },
            tooltip: {
                valueSuffix: ''
            },
            series: [{
                name: data.year,
                data: data.data
            }]
        });
    }

    function setSiasatanChart(data)
    {
        Highcharts.chart('siasatanChart', {
            chart: {
                type: 'bar',
                style: {
                    fontFamily: 'Montserrat'
                }
            },
            title: {
                text: 'LAPORAN SIASATAN EIA'
            },
            xAxis: {
                categories: data.categoriess,
                title: {
                    text: null
                }
            },
            yAxis: {
      allowDecimals:false,
      labels: {
        style: {
          fontSize: '9px',
          width: '175px'
        }
      },
      title: {
        text: ''
      }
    },
            tooltip: {
                valueSuffix: ''
            },
            series: [{
                name: data.year,
                data: data.datas
            }]
        });
    }
</script>
@endpush