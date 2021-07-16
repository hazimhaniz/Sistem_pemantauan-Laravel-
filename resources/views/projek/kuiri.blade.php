@extends('layouts.app')
@include('plugins.wizard')
@include('plugins.dropzone')

@section('content')

<div class="jumbotron" data-pages="parallax">
	<div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
		<div class="inner">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
				<li class="breadcrumb-item">Pemantauan</li>
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

		<!-- START CARD -->
		<div class="card card-transparent">
			<div class="card-block">
				<!-- <div class=" container-fluid container-fixed-lg">
					<div class="card card-transparent"> -->
						<div class="card-body">
							<!-- <div class="row">
								<div class="col-lg-12"> -->
									<div class="card card-default">

										<div class="card-header separator">
											<div class="card-title p-r-10" style="font-weight: bold;font-size: 12.5px">Senarai Kuiri</div>
										</div>
										<div class="card-body m-t-20">
											<div class=" container-fluid container-fixed-lg bg-white">
												<div class="card card-transparent">
													<div class="card-block table-responsive">
														<table class="table table-hover" id="table">
															<thead>
																<tr>
																	<th class="fit">Bil.</th>
																	<th>Nama Pegawai Jas</th>
																	<th>Tarikh</th>
																	<th>Kuiri Pegawai</th>
																	<th >Maklum Balas</th>
																	<th>Gambar</th>
																	<th >Action</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>1.</td>
																	<td>Zairin Bin Aidil</td>
																	<td>05/03/2019</td>
																	<td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</td>
																	<td></td>
																	<td><a href="{{asset('images/tapak.jpg')}}" target="_blank"><b>gambar</b></a></td>
																	<td>
																		<a onclick="editData(1)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>						
									</div>
								<!-- </div>
							</div> -->
						</div>
						<!-- start button -->
						<div class="row">
							<div class="col-md-12">
								<ul class="pager wizard no-style">
									<li class="submit">
										@if(auth()->id() == 3)
										<button onclick="submit()" class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check" id="simpan" type="button">
											<span>Simpan</span>
										</button>
										@else
										<button onclick="submit()" class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check" type="button">
											<span>Simpan</span>
										</button>
										@endif
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
					<!-- </div>
				</div> -->
			</div>
		</div>
	</div>
</div>

<!-- start Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalTitle"><span class="bold">Kuiri</span></h5>
				<!-- <small class="text-muted">Kindly fill in the fields in the form below.</small> -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-t-20">
				@include('components.textarea', [
				'label' => 'Maklum Balas',
				'info' => 'Maklum Balas',
				'mode' => 'required',
				'name' => 'bacaan',
				'type' => 'bacaan',
				'value' => '',
				])


				@include('components.bs.dropzone', [
				'name' => 'image',
				'label' => 'Fail sokongan',
				'value' => '',
				])

			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
				<button type="button" class="btn btn-info" onclick="submitUpdate()" id="submit"><i class="fa fa-check m-r-5"></i> Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- end Modal Edit -->

@endsection

@push('js')
<script type="text/javascript">
	$('#simpan').click(function(){
        swal("", "Teruskan?")
        .then((confirm) => {
            if (confirm) {
                location.href="{{route('projek.senarai')}}";
            }
        });
    });

    $('#kembali').click(function(){
		location.href="{{route('projek.senarai')}}";
		
	});

	function add() {
		$("#modal-edit2").modal("show");
	}
</script>
@endpush



