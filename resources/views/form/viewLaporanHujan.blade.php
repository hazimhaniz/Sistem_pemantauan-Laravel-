
<style type="text/css">
	.modal-lg {
		max-width: 80% !important;
		width: 80% !important;
		margin: 0 auto !important;
	}
</style>
<div class="modal fade right" id="baseAjaxModalContent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-transparent">
							<div class="form-group-attached">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<div class="form-input-group">
												<label>
													<label>Tarikh Hujan</label>

												</label>
												<input name="" class="form-control datepicker tarikh_hujan" maxDate="{{$month}}" minDate="{{$month}}" maxYear="$year" minYear="$year" value="{{($laporan_hujan)?date('d/m/Y',strtotime($laporan_hujan->tarikh)):''}}" disabled>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<div class="form-input-group">
												<label>
													<label>Masa Hujan</label>                                    
												</label>
												<input name="" type="time" value="{{($laporan_hujan)?$laporan_hujan->masa:''}}" class="form-control masa" disabled>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>
												<span><b class="text-dark">Tempoh hujan (jam)</b></span>
											</label>
											<input type="number" name="" min="1" class="form-control tempoh_hujan" value="{{($laporan_hujan)?$laporan_hujan->tempoh:1}}" disabled>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group form-group-default">
											<label>
												<span><b class="text-dark">Bacaan hujan melebihi 12.5mm</b></span>
											</label>
											<input type="number" name="" min="12.5" class="form-control bacaan_hujan" value="12.5" step=".01" value="{{($laporan_hujan)?$laporan_hujan->bacaan:'12.5'}}" disabled>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="dashTitle">&nbsp;</i>Pemantauan Best Practices Management(BMPs)</div>
										<br>
										<div class="row">
											<div class="col-md-3 ">
												<a href="#" id="elementHujan1" class="btn btn-primaryred  btn-sm btn-block"> Elemen Pemeriksaan</></a>
											</div>

											<div class="col-md-3 ">
												<a href="#" id="hakisanHujan2" class=" btn btn-primaryred btn-sm btn-block"> Kawalan Hakisan</a>
											</div>

											<div class="col-md-3 ">
												<a href="#" id="kawalanHujan3" class=" btn btn-primaryred btn-sm btn-block"> Kawalan Lain-lain </a>
											</div>

											<div class="col-md-3 ">
												<a href="#" id="sedimenHujan5" class="btn btn-primaryred btn-sm btn-block"> Kawalan Sedimen</a>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-3 ">
												<a href="#" id="permukaanHujan4" class="btn btn-primaryred btn-sm btn-block">Kawalan Air Larian Permukaan</a>
											</div>
											<div class="col-md-3">
												<!-- biar je kosong / kuiri : kalau tak kosong jadi apa? hahaha -->
											</div>
										</div>
									</div>
								</div>
								<br>
								
								<div class="row">
									<div id="rootwizard" class="hujanElemen">
										<!-- Nav tabs -->
										@include('form.hujan.accessTabHujan')
									</div>
									<div id="rootwizard" class="hujanElemen1">
										<!-- Nav tabs -->
										@include('form.hujan.kawalanHakisan')
									</div>
									<div id="rootwizard" class="hujanElemen2">
										<!-- Nav tabs -->
										@include('form.hujan.kawalanLain')
									</div>
									<div id="rootwizard" class="hujanElemen3">
										<!-- Nav tabs -->
										@include('form.hujan.kawalanAir')
									</div>
									<div id="rootwizard" class="hujanElemen4">
										<!-- Nav tabs -->
										@include('form.hujan.kawalanSedimen')
									</div>
									<br>
									<div class="col-md-12 p-t-20">
										<ul class="pager wizard no-style">
											@if($laporan_hujan)
											@hasanyrole('eo')
											@if($laporan_hujan->status_id == 600)
											<li>
												<button id="tindakanBorangDEO" onclick="tindakanHujan({{ $laporan_hujan->id }}, 13)" type="button" class="btn btn-success btn-cons from-left pull-right">
													<span>Hantar</span>
												</button>
											</li>
											@endif
											@endhasanyrole

											@hasanyrole('pp')
											@if($laporan_hujan->status_id == 13)
											<li>
												<button id="tindakanBorangDPP" onclick="tindakanHujan({{ $laporan_hujan->id }}, 602)" type="button" class="btn btn-success btn-cons from-left pull-right">
													<span>Sahkan</span>
												</button>
											</li>
											@endif
											@endhasanyrole

											@hasanyrole('pp')
											@if($laporan_hujan->status_id == 602)
											<li>
												<button id="tindakanBorangDPP" onclick="tindakanHujan({{ $laporan_hujan->id }}, 602)" type="button" class="btn btn-success btn-cons from-left pull-right" disabled>
													<span>Sahkan</span>
												</button>
											</li>
											@endif
											@endhasanyrole
											@endif
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	$(".hujanElemen").hide();
	$(".hujanElemen1").hide();
	$(".hujanElemen2").hide();
	$(".hujanElemen3").hide();
	$(".hujanElemen4").hide();

	$("#elementHujan1").click(function () {
		$(".hujanElemen").show();
		$(".hujanElemen1").hide();
		$(".hujanElemen2").hide();
		$(".hujanElemen3").hide();
		$(".hujanElemen4").hide();
	});

	$("#hakisanHujan2").click(function () {
		$(".hujanElemen").hide();
		$(".hujanElemen1").show();
		$(".hujanElemen2").hide();
		$(".hujanElemen3").hide();
		$(".hujanElemen4").hide();
	});

	$("#kawalanHujan3").click(function () {
		$(".hujanElemen").hide();
		$(".hujanElemen1").hide();
		$(".hujanElemen2").show();
		$(".hujanElemen3").hide();
		$(".hujanElemen4").hide();
	});

	$("#permukaanHujan4").click(function () {
		$(".hujanElemen").hide();
		$(".hujanElemen1").hide();
		$(".hujanElemen2").hide();
		$(".hujanElemen3").show();
		$(".hujanElemen4").hide();
	});

	$("#sedimenHujan5").click(function () {
		$(".hujanElemen").hide();
		$(".hujanElemen1").hide();
		$(".hujanElemen2").hide();
		$(".hujanElemen3").hide();
		$(".hujanElemen4").show();
	});


</script>
