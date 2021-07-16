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
			
			<div class="col-md-12">
				<div class="card card-transparent">
					<div class="card-block">
						<h3>Selamat Datang, <span class="semi-bold">{{ auth()->user()->name }}</span></h3>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- END JUMBOTRON -->

<!-- START CONTAINER FLUID -->

<!-- START card -->
<div class=" container-fluid container-fixed-lg bg-white m-t-20">
	<div class="modal-body m-t-20">
		<ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist">
			<li class="nav-item ml-md-3">
				<a id="tabBtnDaftar1" class="active" data-toggle="tab" data-target="#daftarTab1" role="tab"><span>(1) MAKLUMAT PROJEK</span></a>
			</li>
			<li class="nav-item">
				<a id="tabBtnDaftar2" class="" data-toggle="tab" data-target="#daftarTab2" role="tab"><span>(2) EMP & LDP2M2</span></a>
			</li>
			<li class="nav-item">
				<a id="tabBtnSyarat" class="" data-toggle="tab" data-target="#daftarTab4" role="tab"><span>(3) Pendaftaran Syarat EIA</span></a>
			</li>
			<li class="nav-item">
				<a id="tabBtnDaftar3" class="" data-toggle="tab" data-target="#daftarTab3" role="tab"><span>(4) AUDIT ALAM SEKELILING</span></a>
			</li>

		</ul>
		
		<div class="tab-content">
			<div class="tab-pane active" id="daftarTab1">
				@include('form.maklumatProjek')
			</div>
			<div class="tab-pane disable" id="daftarTab2">
				@include('form.EmpLdp2m2')
			</div>
			<div class="tab-pane disable" id="daftarTab4">
				@include('form.pendSyaratEIA')
			</div>
			<div class="tab-pane disable" id="daftarTab3">
				@include('form.auditAlam')
			</div>

		</div>
	</div>
</div>

<!-- END CONTAINER FLUID -->

@endsection

@push('js')
<script>
	$(document).ready(function(){
		$("#tabBtnDaftar2").prop('disabled', true);
		$("#tabBtnSyarat").prop('disabled', true);
		$("#tabBtnDaftar3").prop('disabled', true);

		@if(Session::has('pendaftaranprojek_tab'))
		$("#tabBtnDaftar2").prop('disabled', false);
		$("#tabBtnSyarat").prop('disabled', false);
		$("#tabBtnDaftar3").prop('disabled', false);
		$("#{{ Session::get('pendaftaranprojek_tab') }}").trigger('click');
		@endif
	});
</script>
@endpush