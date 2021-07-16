@extends('layouts.app')
@include('plugins.chartjs')

@push('css')
<style type="text/css">
	.widget-9 {
	    height: unset !important;
	    padding-bottom: 20px;
	    padding-top: 20px;
	}

	.text-black {
		color: #000 !important;
	}

	x-small {
		font-size: medium !important;
	}
</style>
@endpush

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner" style="transform: translateY(0px); opacity: 1;">
            {{ Breadcrumbs::render('monitoring') }}
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Paparan Pemantauan</h3>
                            <p class="small hint-text m-t-5">
                                Pemantauan semua borang / permohonan boleh dilakukan melalui paparan di bawah.
                            </p>
                        </div>
                    </div>
                    <!-- END card -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->

<!-- START CONTAINER FLUID -->
<div class=" container-fluid container-fixed-lg">
    <div class="row">
    	<div class="col-md-12" id="module">
    		<div class="widget-12 card no-border widget-loader-circle no-margin padding-30">
    			<div class="card-block">
    				<div class="row">
                        <div class="col-sm-4">
                            <hr class="d-sm-block d-md-none">
                            <div class="widget-12-search">
                                <h4 class="pull-left">Jenis
                                    <span class="bold">Borang/Permohonan</span>
                                </h4>
                                <br>
                                <p class="small hint-text m-t-5">
                                    Sila pilih mana-mana jenis borang/permohonan di bawah untuk memaparkan graf statistik.
                                </p>
                                <div class="clearfix"></div>
                                <div style="max-height: 600px !important; overflow-y: auto;">
                                    <div class="alert-menu alert alert-warning clickable" name="goodconduct">
                                        <p class="mr-3 no-padding">Pendaftaran Sijil Kelakuan Baik</p>
                                    </div>
                                    <div class="alert-menu alert {{ $table == 'formb' ? 'alert-info' : 'alert-warning' }} clickable" name="waiver">
                                        <p class="mr-3 no-padding">Pendaftaran Sijil Pelepasan Keluar Negeri (Waiver)</p>
                                    </div>
                                    <div class="alert-menu alert alert-warning clickable" name="regabroad">
                                        <p class="mr-3 no-padding">Pendaftaran Rakyat Malaysia di Luar Negara</p>
                                    </div>
                                    <div class="alert-menu alert alert-warning clickable" name="malaysian">
                                        <p class="mr-3 no-padding">Bantuan Konsular Rakyat Malaysia di Luar Negara</p>
                                    </div>
                                    <div class="alert-menu alert alert-warning clickable" name="foreigner">
                                        <p class="mr-3 no-padding">Bantuan Konsular Rakyat Asing di Malaysia</p>
                                    </div>
                                    <div class="alert-menu alert alert-warning clickable" name="missingpassport">
                                        <p class="mr-3 no-padding">Merekod Aduan Kehilangan Pasport</p>
                                    </div>
                                    <div class="alert-menu alert alert-warning clickable" name="documentcertification">
                                        <p class="mr-3 no-padding">Merekod Perkhidmatan Pengesahan Dokumen</p>
                                    </div>
                                    <div class="alert-menu alert alert-warning clickable" name="courtdocument">
                                        <p class="mr-3 no-padding">Merekod Maklumat Penghantaran Dokumen Mahkamah</p>
                                    </div>
                                    <div class="alert-menu alert alert-warning clickable" name="signspecimen">
                                        <p class="mr-3 no-padding">Merekod Specimen Tanda Tangan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
    					<div class="col-sm-8">
    						<div class="p-l-5">
    							<h4 class="pull-left m-t-5 m-b-5">Paparan <span class="bold">Graf</span></h4>
    							<div class="clearfix"></div>
    							<canvas id="myChart" width="400" height="300"></canvas>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<!-- END CONTAINER FLUID -->
@endsection

@push('js')
<script type="text/javascript">

$(".alert-menu").on('click', function() {
	window.location.replace("{{ route('monitoring') }}?module="+$(this).attr('name'));
});

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @foreach($results as $index => $result)
            <?php
                if($index > 4)
                    break;
            ?>
            "{{ $result->year }}",
            @endforeach
        ],
    	fill: 'start',
        datasets: [{
            label: '# Selesai',
            data: [
                @foreach($results as $index => $result)
                <?php
                    if($index > 4)
                        break;
                ?>
                {{ $result->completed }},
                @endforeach
            ],
            borderWidth: 1,
            backgroundColor: 'rgba(19,149,186,0.5)'
        },{
            label: '# Dalam Proses',
            data: [
                @foreach($results as $index => $result)
                <?php
                    if($index > 4)
                        break;
                ?>
                {{ $result->pending }},
                @endforeach
            ],
            borderWidth: 1,
            backgroundColor: 'rgba(241,108,32,.5)'
        }]
    },
    options: {
        tooltips: {
            mode: 'label',
            callbacks: {
                label: function(tooltipItem, data) {
                    var corporation = data.datasets[tooltipItem.datasetIndex].label;
                    var valor = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];

                    // Loop through all datasets to get the actual total of the index
                    var total = 0;
                    for (var i = 0; i < data.datasets.length; i++)
                        total += data.datasets[i].data[tooltipItem.index];

                    // If it is not the last dataset, you display it as you usually do
                    if (tooltipItem.datasetIndex != data.datasets.length - 1) {
                        return corporation + " : " + valor;
                    } else { // .. else, you display the dataset and the total, using an array
                        return [corporation + " : " + valor, "# Jumlah : " + total];
                    }
                }
            }
        },
        scales: {
            xAxes: [{
                stacked: true,
            }],
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                stacked: true,
            }]
        }
    }
});

$(".type-list").scrollbar();
</script>
@endpush
