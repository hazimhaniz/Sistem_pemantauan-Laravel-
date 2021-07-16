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

.table > thead > tr > th {
	
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

.table > tbody > tr > td {
	
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
            max-width: 40% !important;
            width: 40% !important;
            margin: 0 auto !important; 
        }

.modal-lg {
            max-width: 50% !important;
            width: 50% !important;
            margin: 0 auto !important; 
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
            
            <h5><span><b class="text-dark">LAPORAN SIASATAN</b></span></h5>
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
            </div>
            <div id="table_wrapper" class="dataTables_wrapper no-footer">
                
                <div class="card card-transparent">
    
                    <table class="table" id="" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                        <thead>
                            <tr role="row">
                                <th class="align-top text-center"
                                    style="width:2%; vertical-align:top; color:#fff">Bil.</th>
                                <th class="align-top text-center"
                                    style="width:30%; vertical-align:top; color:#fff">Nama Projek </th>
                                
                                    <th class="align-top text-center"
                                    style="width:30%; vertical-align:top; color:#fff"> Penggerak Projek </th>
                                    <th class="align-top text-center"
                                    style="width:30%; vertical-align:top; color:#fff">Bulan </th>
                                <th class="align-top text-center"
                                    style="width:10%; vertical-align:top; color:#fff">Tahun</th>
                                    <th class="align-top text-center"
                                    style="width:15%; vertical-align:top; color:#fff">Status</th>
                                    <th class="align-top text-center"
                                    style="width:15%; vertical-align:top; color:#fff">Tindakan</th>
                              
                              
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-top text-center">1</td>
                                <td class="align-top text-center">SEIA REPORT FOR THE PROPOSED LANE WIDENING BETWEEN EBOR AND USJ AT NORTH-SOUTH EXPRESSWAY CENTRAL LINK (ELITE)</td>
                                <td class="align-top text-center">PROJEK LEBUHRAYA USAHASAMA BERHAD (PLUS)</td>
                                    <td class="align-top text-center">September</td>
                                    <td class="align-top text-center">2020</td>
                                    <td class="align-top text-center">Disahkan</td>
                                    <td class="align-top text-center"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#siasatan">laporan siasatan</button></td></td>
                                   
                                    
                            </tr>
                       
                            
    
    
                        </tbody>
                    </table>
                    <br>
                    {{-- <div class="row">
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
                    </div> --}}
                    
                    <br>
                </div>
    
            </div>
        </div>
		<div class="modal fade stick-up slide-right show" id="siasatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
			  <div class="modal-content">
				<div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle">A. Maklumat Am</h5>
                    <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                  </button>
                  <br>
				</div>
				<div class="modal-body">
					
                    <form id="form-tambahFasa" role="form" method="post" action="{{route('form.tambah_fasa')}}"
                    class="has-validation-callback">
                    <div id="add_message_1"></div>
                    <div class="form-group-attached m-b-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Nama Projek/Premis</span>
                                            <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Penggerak Projek:</span>
                                            <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">No Fail JAS :</span>
                                            <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Tarikh laporan EIA diluluskan :</span>
                                                <i class="fa fa-calendar"></i> </label>
                                                <input id="" class="form-control datepicker " name="" placeholder="" required="" type="" value="">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Tarikh EMP diluluskan :</span>
                                                <i class="fa fa-calendar"></i> </label>
                                                <input id="" class="form-control datepicker " name="" placeholder="" required="" type="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Jururunding EIA :</span>
                                            <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Jururunding Pengawasan Post-EIA : </span>
                                                
                                                <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Jururunding Audit Alam Sekitar :</span>
                                            <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Alamat Tapak :</span>
                                                
                                                <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Pasukan Penguatkuasa :</span>
                                            <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    
                            <br>
                            <label style="font-size:13px; font-family: 'Montserrat'">Tarikh dan Masa Siasatan :</label>
                            <div class="form-group-attached m-b-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Masa masuk</span>
                                                
                                                <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_"> Masa keluar</span>
                                            <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Wakil Pemaju Projek/Premis Yang Ditemui</span>
                                            <input class="form-control form-control-lg" name="nama_fasa" type="text"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>

                            </div>


                            </div>
                            <br>
                            <label style="font-size:14px; font-family: 'Montserrat'"><b>B. Laporan Hasil Siasatan Oleh Ketua Pasukan Penguatkuasa</b></label>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Ringkasan Hasil Siasatan oleh Pasukan Penguatkuasa</span>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <label style="font-size:14px; font-family: 'Montserrat'"><b>C. Ulasan Dan Syor Tindakan Susulan Oleh Ketua Pasukan Penguatkuasa</b></label>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_">Ulasan Dan Syor Tindakan Susulan Oleh Ketua Pasukan Penguatkuasa</span>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <label style="font-size:14px; font-family: 'Montserrat'"><b>C. Ulasan Dan Syor Tindakan Susulan Oleh Ketua Pasukan Penguatkuasa</b></label>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_"><b>Ulasan Ketua Pasukan Penguatkuasa:</b></span>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <div class="form-input-group">
                                            <label>
                                                <span id="label_"><b>Syor Tindakan Susulan</b></span>
                                                <div class="row">
                                                    <div class="col-md-3">
							
                                                        <input type="checkbox" id="citation" name="syor[]" value="1">
                                                        <label for="vehicle1"><i> Field Citation </i></label><br>
                                                    </div>
                                                    <div class="col-md-3">
							
                                                        <input type="checkbox" id="citation" name="syor[]" value="1">
                                                        <label for="vehicle1"><i> Notis Arahan</i></label><br>
                                                    </div>
                                                    <div class="col-md-3">
							
                                                        <input type="checkbox" id="citation" name="syor[]" value="1">
                                                        <label for="vehicle1"><i> Kompaun </i></label><br>
                                                    </div>
                                                    <div class="col-md-3">
							
                                                        <input type="checkbox" id="citation" name="syor[]" value="1">
                                                        <label for="vehicle1"><i> Perintah Larangan </i></label><br>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
							
                                                        <input type="checkbox" id="citation" name="syor[]" value="1">
                                                        <label for="vehicle1"><i> Tindakan Mahkamah </i></label><br>
                                                    </div>
                                                    <div class="col-md-3">
							
                                                        <input type="checkbox" id="citation" name="syor[]" value="1">
                                                        <label for="vehicle1"><i>lain-lain</i></label><br>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>
                        <div class="col-md-12" style="margin-bottom: 31px;">

					
                            <button value="" class="btn btn-primary btn-cons from-left pull-right" type="submit" id="simpan" >
            <span> Jana</span>
            </button>
        
        
        

        
        
        
        
         
        
            
        <a class="btn btn-info btn-cons from-left pull-right" href=""><i class="fa fa-print m-r-5"></i> Cetak</a>
        
        
                        
    </div>
					
				</div>
				
			  </div>
			</div>
		  </div>
     
        
        <!--- END MODAL AHLI PROJEK -->
        

            
 
        

<!-- END CONTAINER FLUID -->


@endsection