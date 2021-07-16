@extends('layouts.app')
@include('plugins.wizard')
@include('plugins.dropzone')

@section('content')
<div class="jumbotron" data-pages="parallax">
	<div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
		<div class="inner">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
				<li class="breadcrumb-item">Projek</li>
				<li class="breadcrumb-item active">Pengawasan Air</li>
			</ol>
			<div class="row">
				<div class="col-xl-12 col-lg-12 ">
					<div class="card card-transparent">
						<div class="card-block p-t-0">
							<h3 class='m-t-0'>Pengawasan Air</h3>
							<p class="small hint-text m-t-5">
								<p class="hint-text">Maklumat Pengawasan Air</p>
								<!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> PDF</button> -->
								<!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> Excel</button> -->
								<!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-print m-r-5"></i> Cetak</button> -->
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<ul class="nav nav-tabs nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist"></ul>
<div class="tab-content">
	<div class=" container-fluid container-fixed-lg bg-white">
		<div class="card card-transparent">
			<div class="card-block">
				<div class=" container-fluid container-fixed-lg">
					<div class="card card-transparent">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="card card-default">
										<div class="card-header separator">
											<div class="card-title" style="font-weight: bold;font-size: 12.5px">Pendaftaran Pengawasan Laut</div>
										</div>
										<div class="card-body m-t-20">
											<div class="form-group row control-label col-md-12">
												<label class="col-md-4">Longitud<span style="color:red;">*</span> </label>
												<div class="col-md-8"><input class="form-control" type="text" value=""></div>
											</div>
											<div class="form-group row control-label col-md-12">
												<label class="col-md-4">Latitud<span style="color:red;">*</span> </label>
												<div class="col-md-8"><input class="form-control" type="text" value=""></div>
											</div>
											<!-- <div class="form-group row control-label col-md-12">
												<label class="col-md-4">Tarikh Pengsampelan<span style="color:red;">*</span> </label>
												<div class="col-md-8"><input class="form-control datepicker" type="text" value=""></div>
											</div>
											<div class="form-group row control-label col-md-12">
												<label class="col-md-4">Masa Pengsampelan<span style="color:red;">*</span> </label>
												<div class="col-md-8"><input class="form-control" type="text" value=""></div>
											</div>
											<div class="form-group row control-label col-md-12">
												<label class="col-md-4">Cuaca<span style="color:red;">*</span> </label>
												<div class="col-md-8">
													<select id="cuaca" name="cuaca" class="full-width autoscroll" style="border-color: rgba(0, 0, 0, 0.07);padding: 9px;min-height: 35px">
														<option value="0">-Select-</option>
														<option value="1">Hujan</option>
														<option value="2">Selepas Hujan</option>
														<option value="3">Kering</option>
													</select>
												</div>
											</div>
											<div class="form-group row control-label col-md-12">
												<label class="col-md-4">Melibatkan Bacaan Silt Curtain<span style="color:red;">*</span> </label>
												<div class="col-md-8">
													<div class="radio radio-primary">
														<input name="bacaan" value="1" id="1" type="radio" class="hidden" required="" aria-required="true">
														<label for="1">Ya</label>
														<input name="bacaan" value="0" id="0" type="radio" class="hidden" required="" aria-required="true">
														<label for="0">Tidak</label>
													</div>
												</div>
											</div>
											<div class="form-group row control-label col-md-12 hidden result">
												<label class="col-md-4">Bacaan Silt Curtain<span style="color:red;">*</span> </label>
												<div class="col-md-8"><input id="result" name="result" class="form-control" type="text" value=""></div>
											</div> -->
											<div class="form-group row control-label col-md-12">
												<label class="col-md-4">Parameter<span style="color:red;">*</span> </label>
												<a onclick="add(3)" href="javascript:;" class="btn btn-success pull-right btn-input"><i class="fa fa-plus mr-1"></i> </a>
												<table class="table table-hover" id="table2">
													<thead>
														<tr>
															<th>No.</th>
															<th>Parameter</th>
															<th>Data Baseline</th>
															<th>Standard Dirujuk</th>
															<th>Tindakan</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1.</td>
															<td>parameter 1</td>
															<td>Baseline 1</td>
															<td>Standard 1</td>
															<td>
																<a onclick="deleteData()" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i></a>
															</tr>
															<tr>
																<td>2.</td>
																<td>parameter 2</td>
																<td>Baseline 2</td>
																<td>Standard 2</td>
																<td>
																	<a onclick="deleteData()" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i></a>
																</tr>
															</tbody>
														</table>
													</div>
											<!-- <div class="form-group row control-label col-md-12">
												<label class="col-md-12" style="margin-top: 10px"> Upload Laporan Kimia<span style="color:red;">*</span></label>
												<div class="col-md-12">
													@include('components.bs.dropzone', [
													'name' => 'image',
													'label' => '',
													'value' => '',
													])
												</div>
											</div> -->									
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- start button -->
						<div class="row">
							<div class="col-md-12">
								<ul class="pager wizard no-style">
									<li class="submit">
										<button onclick="submit()" class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check" id="simpan" type="button">
											<span>Simpan</span>
										</button>
									</li>
									<li class="previous">
										<button class="btn btn-default btn-cons btn-animated from-left fa fa-angle-left" type="button" id="kembali">
											<span>Kembali</span>
										</button>
									</li>
								</ul>
							</div>
						</div>
						<!-- end button -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- START MODAL ADD 3 -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
				<!-- <small class="text-muted">Kindly fill in the fields in the form below.</small> -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-t-20">

				<div class="form-group form-group-default form-group-default-custom form-group-default-select2">
					<label><span>Parameter</span></label>
					<select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
						<option value="" selected="" disabled="">Pilih satu..</option>
						<option value="1">Parameter 1</option>
						<option value="2">Parameter 2</option>
						<option value="3">Parameter 3</option>
						<option value="4">Parameter 4</option>
					</select>
				</div>

				<div class="form-group form-group-default form-group-default-custom form-group-default-select2">
					<label><span>Data Baseline</span></label>
					<select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
						<option value="" selected="" disabled="">Pilih satu..</option>
						<option value="1">Data Baseline 1</option>
						<option value="2">Data Baseline 2</option>
						<option value="3">Data Baseline 3</option>
						<option value="4">Data Baseline 4</option>
					</select>
				</div>

                <!-- <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label><span>Standard</span></label>
                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                        <option value="" selected="" disabled="">Pilih satu..</option>
	                    <option value="1">Standard 1</option>
	                    <option value="2">Standard 2</option>
	                    <option value="3">Standard 3</option>
	                    <option value="4">Standard 4</option>
                    </select>
                </div> -->

                @include('components.input', [
                'label' => 'Standard Dirujuk',
                'info' => 'Standard Dirujuk',
                'mode' => 'required',
                'name' => 'standard',
                'type' => 'standard',
                'value' => '',
                ])

                <button type="button" class="btn btn-info" onclick="submitUpdate()" id="submit"><i class="fa fa-check m-r-5"></i> Simpan</button>
                
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
	$('#simpan').click(function(){
		swal("", "Teruskan?")
		.then((confirm) => {
			if (confirm) {
				location.href="{{route('projek.pendaftaran_projek')}}";
			}
		});
	});

	$('#kembali').click(function(){
		location.href="{{route('projek.pendaftaran_projek')}}";
		
	});

	$("input[name=bacaan]").on('change', function() {
		if( $(this).val() == 0 )
			$(".result").addClass("hidden");
		else
			$(".result").removeClass("hidden");
	});

	function add() {
		$("#modal-add").modal("show");
	}

</script>
@endpush