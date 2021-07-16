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

.modal-open .select2-container {
	z-index: unset !important;
}

/****************** Card Standard Size ******************/	
.card-counter {
	box-shadow: 2px 2px 10px #DADADA;
	padding: 20px 10px;
	background-color: #fff;
	height: 100px;
	border-radius: 5px;
	transition: .3s linear all;
}

.card-counter:hover {
	box-shadow: 4px 4px 20px #DADADA;
	transition: .3s linear all;
}

.card-counter i {
	font-size: 4em;
	opacity: 0.2;
}

.card-counter .count-numbers {
	position: absolute;
	right: 35px;
	top: 20px;
	font-size: 28px;
	display: block;
}

.card-counter .count-name {
	position: absolute;
	right: 35px;
	top: 65px;
	font-style: italic;
	text-transform: capitalize;
	opacity: 0.5;
	display: block;
	font-size: 12px;
}

.smallcard-sng.card-counter.active {
	background-color: #1f3953;
	color: #FFF;
}

.smallcard-sng.card-counter.unactive {
	background-color: #b9d3e8;
	color: #FFF;
}
/****************** End Card Standard Size ******************/

/****************** Card Small Size ******************/	
.card-counter-small {
	box-shadow: 2px 2px 10px #DADADA;
	padding: 20px 10px;
	background-color: #fff;
	height: 100px;
	border-radius: 5px;
	transition: .3s linear all;
}

.card-counter-small:hover {
	box-shadow: 4px 4px 20px #DADADA;
	transition: .3s linear all;
}

.card-counter-small i {
	font-size: 1.5em;
	opacity: 0.2;
}

.card-counter-small .count-numbers-small {
	position: absolute;
	right: 30px;
	top: 15px;
	font-size: 20px;
	display: block;
}

.card-counter-small .count-name-small {
	position: absolute;
	right: 35px;
	top: 55px;
	font-style: italic;
	text-transform: capitalize;
	opacity: 0.5;
	display: block;
	font-size: 12px;
}

.smallcard-sng.card-counter-small.active {
	background-color: #1f3953;
	color: #FFF;
}

.smallcard-sng.card-counter-small.unactive {
	background-color: #b9d3e8;
	color: #FFF;
}
/****************** End Card Small Size ******************/
	
.grafico {
	min-width: 310px;
	max-width: 400px;
	height: 280px;
	margin: 0 auto
}

.grafico1 {
	min-width: 310px;
	max-width: 400px;
	width: 500px;
	height: 280px;
	margin: 0 auto
}

.main-header {
	font-size: x-large;
	color: #888;
	font-family: Verdana;
	margin-bottom: 20px;
}

.destaque {
	color: #f88;
	font-weight: bolder;
}

.highcharts-tooltip h3 {
	margin: 0.3em 0;
}


.nav-tabs-blue.nav-tabs-fillup > li > a:after {
	background: none repeat scroll 0 0 #006c80;
	border: 1px solid #006c80;
}


.tableSummaryStatus > thead > tr > th {
	
	//background-color: #ebe8ec;
	background-color: #ffff;
	color: #000 !important;
	
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

.tableSummaryStatus > tbody > tr > td {
	
	border-top: none !important;
	border-left: none !important;
	border-right: none !important;
	border-bottom: none !important;
	
	font-family: 'Montserrat' !important;
	font-size: 10.5px !important;
	letter-spacing: 0.06em !important;
	/* text-transform: uppercase !important; */
	font-weight: 500 !important;
	padding: 0px !important;
	margin-left: 0px !important;
	margin-right: 0px !important;
	
	//text-align: center !important;
	
}

.tableSummaryFRP > thead > tr > th {
	
	//background-color: #ebe8ec;
	background-color: #ffff;
	color: #000 !important;
	
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

.tableSummaryFRP > tbody > tr > td {
	
	border-top: none !important;
	border-left: none !important;
	border-right: none !important;
	border-bottom: none !important;
	
	font-family: 'Montserrat' !important;
	font-size: 10.5px !important;
	letter-spacing: 0.06em !important;
	/* text-transform: uppercase !important; */
	font-weight: 500 !important;
	padding: 0px !important;
	margin-left: 0px !important;
	margin-right: 0px !important;
	
	//text-align: center !important;
	
}


.tableSummaryAppStatus > thead > tr > th {
	
	//background-color: #ebe8ec;
	//background-color: #ffff;
	//color: #000 !important;
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

.tableSummaryAppStatus > tbody > tr > td {
	
	border-top: none !important;
	border-left: none !important;
	border-right: none !important;
	border-bottom: none !important;
	
	font-family: 'Montserrat' !important;
	font-size: 10.5px !important;
	letter-spacing: 0.06em !important;
	/* text-transform: uppercase !important; */
	font-weight: 500 !important;
	padding: 4px !important;
	margin-left: 0px !important;
	margin-right: 0px !important;
	
	//text-align: center !important;
	
}


table {
	border-collapse:separate;
	border:solid #DDDDDD 1px;
	border-radius:6px;
	-moz-border-radius:6px;
}

td:first-child, th:first-child {
	border-left: none;
}


.FRPprofile {
	
	font-family: 'Montserrat' !important;
	font-size: 10.5px !important;
	letter-spacing: 0.06em !important;
	/* text-transform: uppercase !important; */
	font-weight: 500 !important;
}

.FRPprofilebtn {
	
	font-family: 'Montserrat' !important;
	font-size: 9.5px !important;
	letter-spacing: 0.06em !important;
	/* text-transform: uppercase !important; */
	font-weight: 500 !important;
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

.label-status-count {	
	font-size: 13px !important;
}

.label-status-count-invisible {	
	font-size: 13px !important;
	color: #ffff !important;
}

.label-status-count-total {	
	font-size: 22px !important;
	font-weight: 300 !important;
}

.text-info {
    color: #ab70a6 !important;
}
.modal-lg {
            max-width: 60% !important;
            width: 60% !important;
            margin: 0 auto !important; 
        }
		.nav-tabs-blue.nav-tabs-fillup>li>a:after {
            background: none repeat scroll 0 0 #006c80;
            border: 1px solid #006c80;
        }
  
</style>
@endpush

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <div class="row">
                <ol class="breadcrumb col-md-4 p-l-15">
                    <li class="breadcrumb-item active"><a>@lang('sidebar.home')</a></li>
                </ol>
                
            </div>
            <!-- END BREADCRUMB -->
        </div>
        <div class="row p-b-30">

            <?php
                // setlocale(LC_TIME, "ms", "my_MS", "ms_MY");
                $logins = auth()->user()->logs()->where('activity_type_id', 7)->orderBy('created_at', 'desc');
                $last_login = $logins->count() > 1 ? $logins->skip(1)->first() : null;
            ?>
    
        	<div class="col-md-12">
        		<div class="card card-transparent">
        			<div class="card-block">
        				<h3>Selamat Datang, <span class="semi-bold">{{ auth()->user()->name }}</span></h3>
        				@if($last_login)
                        <p>Last login date is at {{ strftime("%e %B %Y", strtotime($last_login->created_at)) }}.</p>
                        @endif
        			</div>
        		</div>
        	</div>

    	</div>
	</div>
</div>
<!-- END JUMBOTRON -->

<!-- START CONTAINER FLUID -->

    <!-- START card -->
    <!-- <div class="card card-transparent"> -->
        <div class=" container-fluid container-fixed-lg bg-white m-t-20">
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="" for="">
                            <i class="fal fa-search fa-lg"></i>
                            &nbsp; Carian
                            <span class="text-danger" style="font-size:14px"></span>
                        </label>
                        <input type="text" id="" class="form-control input-radius-all border border-default" name="" value="">
                        <div class="help-block"></div>
                    </div>
                </div>
    
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="" for="selectrequired">
                            <i class="fal fa-hourglass-start fa-lg"></i>
                            &nbsp; TAHUN
                            <span class="text-danger" style="font-size:14px"></span>
                        </label>
                        <select id="selectrequired" class="select-normal full-width custom-select border border-default"
                            required="" data-error-msg="Silih pilih butiran perniagaan.">
    
                            <option selected=""></option>
                            <option value="">2020</option>
                            <option value="">2019</option>
                            <option value="">2018</option>
                            <option value="">2017</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="" for="selectrequired">
                            <i class="fal fa-flag-alt fa-lg"></i>
                            &nbsp; Status
                            <span class="text-danger" style="font-size:14px"></span>
                        </label>
                        <select id="selectrequired" class="select-normal full-width custom-select border border-default"
                            required="" data-error-msg="Silih pilih butiran perniagaan.">
    
                            <option selected=""></option>
                            <option value="">Belum Diluluskan</option>
                            <option value="">Dalam Semakan</option>
                            <option value="">Telah Diluluskan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="" for="">
                            <span style="color:#fff">.</span>
                        </label>
                        <br>
                        <!--
                 <a type="button" class="btn btn-sm btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Cari</a>
                 -->
    
                        <a href="#" class=" btn btn-info btn-sm" type="button">
                            <i class="fal fa-search-plus fa-lg"></i> &nbsp; CARI
                        </a>
                    </div>
                </div>
            </div>
            <div id="table_wrapper" class="dataTables_wrapper no-footer">
                <div class="dt-buttons">
                    <button class="dt-button buttons-print btn btn-default btn-sm" tabindex="0" aria-controls="table"
                        type="button" style="margin-top:3%"><span><i class="fa fa-print m-r-5"></i> Cetak</span></button>
                    <button class="dt-button buttons-excel buttons-html5 btn btn-default btn-sm" tabindex="0"
                        aria-controls="table" type="button" style="margin-top:3%"><span><i class="fa fa-download m-r-5"></i>
                            Excel</span></button>
                    <button class="dt-button buttons-pdf buttons-html5 btn btn-default btn-sm" tabindex="0"
                        aria-controls="table" type="button" style="margin-top:3%"><span><i class="fa fa-download m-r-5"></i>
                            PDF</span></button>
    
                </div>
                <br>
                <div class="card card-transparent">
    
                    <table class="table" id="" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                        <thead>
                            <tr role="row">
                                <th bgcolor="#206575" class="align-top text-center"
                                    style="width:2%; vertical-align:top; color:#fff">Bil.</th>
                                <th bgcolor="#206575" class="align-top text-center"
                                    style="width:15%; vertical-align:top; color:#fff">Ahli Projek</th>
                                <th bgcolor="#206575" class="align-top text-center"
                                    style="width:10%; vertical-align:top; color:#fff">No Fail Jas</th>
                                <th bgcolor="#206575" class="align-top text-center"
                                    style="width:30%; vertical-align:top; color:#fff">Nama & Maklumat Projek </th>
                                <th bgcolor="#206575" class="align-top text-center"
                                    style="width:10%; vertical-align:top; color:#fff">Status Laporan</th>
                                <th bgcolor="#206575" class="align-top text-center"
                                    style="width:10%; vertical-align:top; color:#fff">Status Projek</th>
                                <th bgcolor="#206575" class="align-top text-center"
                                    style="width:15%; vertical-align:top; color:#fff">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-top text-center">1</td>
                                <td class="align-top text-left">
                                    
                                    <button type="button" class="dt-button buttons-html5 btn btn-default btn-xs m-t-5" data-toggle="modal"
                                        data-target="#penguatkuasa">
                                        <i class="fa fa-user-plus text-success"></i> Ahli Projek
                                    </button>
                                    {{-- <a class="dt-button buttons-html5 btn btn-default btn-xs m-t-5" tabindex="-1" aria-controls="table" type="button" onclick="" style="" data-toggle="modal" id="" data-target="#penguatkuasaanmodaladdpegawai"><span>
                                         <i class="fa fa-user-plus"></i> </span></a> --}}
                                </td>
                                <td class="align-top text-center">No. Fail Jas: (B)B50/013/500/01</td>
                                <td class="align-top text-center"> SEIA REPORT FOR THE PROPOSED LANE WIDENING BETWEEN EBOR AND
                                    USJ AT NORTH-SOUTH EXPRESSWAY CENTRAL LINK (ELITE)</td>
                                <td class="align-top text-center"><span
                                        style="text-align:center;font-size:16px; padding-bottom:5px"
                                        class="label label-lg label-light-success label-inline">DISAHKAN</span></td>
                                <td class="align-top text-center"><span
                                        style="text-align:center;font-size:16px; padding-bottom:5px "
                                        class="label label-lg label-light-danger label-inline blink">KUIRI</span></td>
    
    
                                <td class="align-top text-center">
                                    <button type="button" class="dt-button  btn btn-default btn-sm m-t-10" data-toggle="modal"
                                        data-target="#" >
										<i class="far fa-eye text-info"></i> Laporan Bulanan&nbsp;
									</button>
									<button type="button" class="dt-button  btn btn-default btn-sm m-t-10" data-toggle="modal"
                                        data-target="#">
                                        <i class="far fa-eye text-info"></i></i> Laporan Hujan &nbsp;&nbsp;&nbsp;&nbsp;
									</button>
									<button type="button" class="dt-button  btn btn-default btn-sm m-t-10" data-toggle="modal"
                                        data-target="#">
                                        <i class="far fa-eye text-info"></i></i> Laporan Siasatan
                                    </button>
    
    
                                </td>
                            </tr>
    
    
    
                        </tbody>
                    </table>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="d-flex justify-content-center">
                                <button class="btn btn-sm btn-default" onclick=""> 1 </button> &nbsp; &nbsp;
                                <button class="btn btn-sm btn-default" onclick=""> 2 </button> &nbsp; &nbsp;
                                <button class="btn btn-sm btn-default" onclick=""> 3 </button> &nbsp; &nbsp;
                                <button class="btn btn-sm btn-default" onclick=""> 4 </button> &nbsp; &nbsp;
                                <button class="btn btn-sm btn-default" onclick=""> 5 </button> &nbsp; &nbsp;
                                <button class="btn btn-sm btn-default" onclick=""> 6 </button> &nbsp; &nbsp;
                                <button class="btn btn-sm btn-default" onclick=""> 7 </button> &nbsp; &nbsp;
                                <button class="btn btn-sm btn-default" onclick=""> Akhir </button>
                            </span>
                        </div>
                    </div>
                    <br>
                </div>
    
            </div>
        </div>
    
        <!-- Modal Ahli Projek -->
        
        <!--- END MODAL AHLI PROJEK -->
        <!-- Modal Ahli Projek -->
        <div class="modal fade stick-up slide-right show " id="penguatkuasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class=" modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addModalTitle"> Tambah <b>Ahli Projek</b></h5>
                        <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
					</div>
					<div class="modal-body m-t-20">
						<ul id="tabs-sng-profil" class="nav nav-tabs nav-tabs blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist">
							<li class="nav-item ml-md-3">
								<a class="active" data-toggle="tab" href="#" data-target="#tab1" role="tab" onclick=""><span> SENARAI AHLI PROJEK</span></a>
							</li>
							<li class="nav-item">
								<a class="" data-toggle="tab" href="#" data-target="#tab2" role="tab" onclick=""><span>(2) PENUKARAN EO</span></a>
							</li>
							<li class="nav-item">
								<a class="" data-toggle="tab" href="#" data-target="#tab3" role="tab" onclick=""><span>(3) PENUKARAN EMC</span></a>
							</li>
							<li class="nav-item">
								<a class="" data-toggle="tab" href="#" data-target="#tab4" role="tab" onclick=""><span>(4) PENDAFTARAN EO</span></a>
							</li>
							<li class="nav-item">
								<a class="" data-toggle="tab" href="#" data-target="#tab5" role="tab" onclick=""><span>(5) PENDAFTARAN EMC</span></a>
							</li>
							
						</ul>
						
						<div class="tab-content">
						
							<div class="tab-pane active" id="tab1">
								@include('form.senaraiAhliProjek')
							</div>
							<div class="tab-pane disable" id="tab2">
								@include('form.daftarEO')
							</div>
							<div class="tab-pane disable" id="tab3">
								@include('form.penukaranEMC')
							</div>
							<div class="tab-pane disable" id="tab4">
								@include('form.pendEO')
							</div>
							<div class="tab-pane disable" id="tab5">
								@include('form.pendEMC')
							</div>
							

					    </div>
					<br>
					
					
                       
				</div>
			</div>
		</div>
            
 
        

<!-- END CONTAINER FLUID -->


@endsection


@push('js')

<script src="{{ asset('sng-dashboard/highcharts.js') }}" type="text/javascript"></script> 
<script src="{{ asset('sng-dashboard/highcharts-more.js') }}" type="text/javascript"></script>
	
<script type="text/javascript">

</script>
@endpush

@push('js')

<script>
    $('#btnSearch').click(function () {
        swal({
            title: "Do you want to search?",
            text: "Searching in progress...",
            icon: "warning",
            buttons: [
                'No, please ignore!',
                'Yes, just do it!'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {
                swal({
                    title: 'Send!',
                    text: 'Data has been send!',
                    icon: 'success'
                }).then(function () {
                    //form.submit(); // <--- submit form programmatically
					window.location = "./home";
                });
            } else {
                swal("Return", "No data send", "error");
            }
        })
    })
   
	
	$(function() {
		var myChart = Highcharts.chart('graph_audit', {
			chart: {
				type: 'bar',
				//backgroundColor: '#efeff6'
				style: {
					fontFamily: 'Montserrat'
				}
			},
			title: {
				text: 'Audit',
				style: {
					//color: '#efefef'
				}
			},
			legend: {
			style: {
					//color: '#efefef'
				},
				itemStyle: {
					//color: '#efefef'
				},
				itemHoverStyle: {
					color: 'grey'
				}
			},
			exporting: {
				buttons: {
				contextButton: {
					symbolStroke: '#efefef',
					theme: {
					fill: 'grey'
					}
				}
			}
			},
			xAxis: {
			categories: ['Module'],
				labels: {
					style: {
					//color: '#efefef'
					}
				}
			},
			yAxis: {
			title: {
				text: 'Count',
				style: {
				//color: '#efefef'
				}
			},
			labels: {
				style: {
				//color: '#efefef'
				}
			},
			type: 'logarithmic'
			},
			series: [{
				name: 'Submitted',
				data: [5],
				//color: '#4f4217'
				color: '#f3c13a'
			},
			{
				name: 'Paid',
				data: [2],
				//color: '#a2871f'
				color: '#ffdfa0'
			}
			]
		});
	});
	
	
	$(function() {
		var myChart = Highcharts.chart('graph_payment', {
			chart: {
				type: 'bar',
				//backgroundColor: '#efeff6'
				style: {
					fontFamily: 'Montserrat'
				}
			},
			title: {
				text: 'Payment',
				style: {
					//color: '#efefef'
				}
			},
			legend: {
			style: {
					//color: '#efefef'
				},
				itemStyle: {
					//color: '#efefef'
				},
				itemHoverStyle: {
					color: 'grey'
				}
			},
			exporting: {
				buttons: {
				contextButton: {
					symbolStroke: '#efefef',
					theme: {
					fill: 'grey'
					}
				}
			}
			},
			xAxis: {
			categories: ['Status'],
				labels: {
					style: {
					//color: '#efefef'
					}
				}
			},
			yAxis: {
			title: {
				text: 'Count',
				style: {
				//color: '#efefef'
				}
			},
			labels: {
				style: {
				//color: '#efefef'
				}
			},
			type: 'logarithmic'
			},
			series: [{
				name: 'Tax',
				data: [5],
				//color: '#4f4217'
				color: '#c1c1c1'
			},
			{
				name: 'Penalty',
				data: [2],
				//color: '#a2871f'
				color: '#cdcdcd'
			},
			{
				name: 'Overpaid',
				data: [4],
				//color: '#cfac1f'
				color: '#d9d9d9'
			}
			]
		});
	});
	
	$(function() {
		var myChart = Highcharts.chart('graph_refund', {
			chart: {
				type: 'bar',
				//backgroundColor: '#efeff6'
				style: {
					fontFamily: 'Montserrat'
				}
			},
			title: {
				text: 'Refund',
				style: {
					//color: '#efefef'
				}
			},
			legend: {
			style: {
					//color: '#efefef'
				},
				itemStyle: {
					//color: '#efefef'
				},
				itemHoverStyle: {
					color: 'grey'
				}
			},
			exporting: {
				buttons: {
				contextButton: {
					symbolStroke: '#efefef',
					theme: {
					fill: 'grey'
					}
				}
			}
			},
			xAxis: {
			categories: ['Status'],
				labels: {
					style: {
					//color: '#efefef'
					}
				}
			},
			yAxis: {
			title: {
				text: 'Count',
				style: {
				//color: '#efefef'
				}
			},
			labels: {
				style: {
				//color: '#efefef'
				}
			},
			type: 'logarithmic'
			},
			series: [{
				name: 'Approved',
				data: [5],
				//color: '#4f4217'
				color: '#c1c1c1'
			},
			{
				name: 'Pending',
				data: [2],
				//color: '#a2871f'
				color: '#cdcdcd'
			},
			{
				name: 'Overpaid',
				data: [4],
				//color: '#cfac1f'
				color: '#d9d9d9'
			}
			]
		});
	});
	
    $(function() {
        var myChart = Highcharts.chart('graph_debt', {
            chart: {
                type: 'bar',
                //backgroundColor: '#efeff6'
                style: {
                    fontFamily: 'Montserrat'
                }
            },
            title: {
                text: 'Debt',
                style: {
                    //color: '#efefef'
                }
            },
            legend: {
            style: {
                    //color: '#efefef'
                },
                itemStyle: {
                    //color: '#efefef'
                },
                itemHoverStyle: {
                    color: 'grey'
                }
            },
            exporting: {
                buttons: {
                contextButton: {
                    symbolStroke: '#efefef',
                    theme: {
                    fill: 'grey'
                    }
                }
            }
            },
            xAxis: {
            categories: ['Status'],
                labels: {
                    style: {
                    //color: '#efefef'
                    }
                }
            },
            yAxis: {
            title: {
                text: 'Count',
                style: {
                //color: '#efefef'
                }
            },
            labels: {
                style: {
                //color: '#efefef'
                }
            },
            type: 'logarithmic'
            },
            series: [{
                name: 'Paid',
                data: [5],
                //color: '#4f4217'
                color: '#fa6e79'
            },
            {
                name: 'BOD',
                data: [2],
                //color: '#a2871f'
                color: '#ffb9ba'
            },
            ]
        });
	});

</script>

@endpush
