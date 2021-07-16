


<!-- START AIR -->
<div class="card card-default p-b-20" id="air" style="display: none;">
	<div class="card-header separator m-b-10">
		<div class="card-title p-L-10" style="font-weight: bold;font-size: 12.5px">Air</div>
	</div>
	<div class="col-md-12">
		<!-- start Sungai -->
		<div class="card card-default" id="sungai" style="display: none;">
			<div class="card-header separator">
				<div class="card-title p-r-10" style="font-weight: bold;font-size: 12.5px">Sungai</div>
				<a href="{{ route('projek.sungai') }}" class="btn btn-success"><i class="fa fa-plus center"></i></a>
			</div>
			<div class="card-body m-t-20">
				<div class=" container-fluid container-fixed-lg bg-white">
					<div class="card card-transparent">
						<div class="card-block">
							<div class="form-group row control-label ">
								<label class="col-md-3">Nama Sungai</label>
								<div class="col-md-9"><input class="form-control" type="text" value="Sungai Rajang" disabled></div>
							</div>
							<table class="table table-hover" id="table">
								<thead>
									<tr>
										<th class="fit">Bil.</th>
										<th>Nama Station</th>
										<th>Longitud</th>
										<th>Latitud</th>
										<th>Tindakan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>w1</td>
										<td>41°24'12.2"N </td>
										<td>2°10'26.5"E</td>
										<td>    
											<a onclick="parameter(4)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i>Parameter</a>
										</td>
									</tr>                            
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Sungai -->

		<!-- Start Laut -->
		<div class="card card-default" id="laut" style="display: none;">
			<div class="card-header separator">
				<div class="card-title p-r-10" style="font-weight: bold;font-size: 12.5px">Laut</div>
				<a href="{{ route('projek.laut') }}" class="btn btn-success"><i class="fa fa-plus center"></i></a>
			</div>
			<div class="card-body m-t-20">
				<div class=" container-fluid container-fixed-lg bg-white">
					<div class="card card-transparent">
						<div class="card-block">
							<table class="table table-hover" id="table">
								<thead>
									<tr>
										<th class="fit">Bil.</th>
										<th>Longitud</th>
										<th>Latitud</th>
										<th>Tindakan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>41°24'12.2"N </td>
										<td>2°10'26.5"E</td>
										<td>
											<a onclick="parameter(4)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i>Parameter</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Laut -->

		<!-- Start Tasik -->
		<div class="card card-default" id="tasik" style="display: none;">
			<div class="card-header separator">
				<div class="card-title p-r-10" style="font-weight: bold;font-size: 12.5px">Tasik</div>
				<a href="{{ route('projek.tasik') }}" class="btn btn-success"><i class="fa fa-plus center"></i></a>
			</div>
			<div class="card-body m-t-20">
				<div class=" container-fluid container-fixed-lg bg-white">
					<div class="card card-transparent">
						<div class="card-block">
							<table class="table table-hover" id="table">
								<thead>
									<tr>
										<th class="fit">Bil.</th>
										<th>Nama Station</th>
										<th>Longitud</th>
										<th>Latitud</th>
										<th>Tindakan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>w1</td>
										<td>41°24'12.2"N </td>
										<td>2°10'26.5"E</td>
										<td>    
											<a onclick="parameter(4)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i>Parameter</a>
										</td>
									</tr>                            
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Tasik -->

		<!-- Start Air Tanah -->
		<div class="card card-default" id="tanah" style="display: none;">
			<div class="card-header separator">
				<div class="card-title p-r-10" style="font-weight: bold;font-size: 12.5px">Air Tanah</div>
				<a href="{{ route('projek.tanah') }}" class="btn btn-success"><i class="fa fa-plus center"></i></a>
			</div>
			<div class="card-body m-t-20">
				<div class=" container-fluid container-fixed-lg bg-white">
					<div class="card card-transparent">
						<div class="card-block">
							<table class="table table-hover" id="table">
								<thead>
									<tr>
										<th class="fit">Bil.</th>
										<th>Nama Station</th>
										<th>Longitud</th>
										<th>Latitud</th>
										<th>Tindakan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>w1</td>
										<td>41°24'12.2"N </td>
										<td>2°10'26.5"E</td>
										<td>    
											<a onclick="parameter(4)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i>Parameter</a>
										</td>
									</tr>                            
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Air Tanah -->
	</div>
</div>
<!-- END AIR -->

<!-- START UDARA -->
<div class="card card-default" id="udara" style="display: none;">
	<div class="card-header separator">
		<div class="card-title p-r-10" style="font-weight: bold;font-size: 12.5px">Udara</div>
		<a href="{{ route('projek.udara') }}" class="btn btn-success"><i class="fa fa-plus center"></i></a>
	</div>
	<div class="card-body m-t-20">
		<div class=" container-fluid container-fixed-lg bg-white">
			<div class="card card-transparent">
				<div class="card-block">
					<table class="table table-hover" id="table">
						<thead>
							<tr>
								<th class="fit">Bil.</th>
								<th>Nama Station</th>
								<th>Longitud</th>
								<th>Latitud</th>
								<th>Tindakan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1.</td>
								<td>w1</td>
								<td>41°24'12.2"N </td>
								<td>2°10'26.5"E</td>
								<td>    
									<a onclick="parameter(4)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i>Parameter</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END UDARA -->

<!-- START BUNYI BISING -->
<div class="card card-default" id="bunyi" style="display: none;">
	<div class="card-header separator">
		<div class="card-title p-r-10" style="font-weight: bold;font-size: 12.5px">Bunyi Bising</div>
		<a href="{{ route('projek.bunyi') }}" class="btn btn-success"><i class="fa fa-plus center"></i></a>
	</div>
	<div class="card-body m-t-20">
		<div class=" container-fluid container-fixed-lg bg-white">
			<div class="card card-transparent">
				<div class="card-block">
					<table class="table table-hover" id="table2">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Station</th>
								<th>Longitud</th>
								<th>Latitud</th>
								<th>Tindakan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1.</td>
								<td>w1</td>
								<td>41°24'12.2"N </td>
								<td>2°10'26.5"E</td>
								<td>    
									<a onclick="parameter(4)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i>Parameter</a>
								</td>
							</tr>
							<tr>
								<td>2.</td>
								<td>w2</td>
								<td>41°24'12.2"N </td>
								<td>2°10'26.5"E</td>
								<td>
									<a onclick="parameter(4)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i>Parameter</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END BUNYI BISING -->

<!-- START VIBRATION -->
<div class="card card-default" id="getaran" style="display: none;">
	<div class="card-header separator">
		<div class="card-title p-r-10" style="font-weight: bold;font-size: 12.5px">Vibration</div>
		<a href="{{ route('projek.vibration') }}" class="btn btn-success"><i class="fa fa-plus center"></i></a>
	</div>
	<div class="card-body m-t-20">
		<div class=" container-fluid container-fixed-lg bg-white">
			<div class="card card-transparent">
				<div class="card-block">
					<table class="table table-hover" id="table2">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Station</th>
								<th>Longitud</th>
								<th>Latitud</th>
								<th>Tindakan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1.</td>
								<td>w1</td>
								<td>41°24'12.2"N </td>
								<td>2°10'26.5"E</td>
								<td>    
									<a onclick="parameter(4)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i>Parameter</a>
								</td>
							</tr>
							<tr>
								<td>2.</td>
								<td>w2</td>
								<td>41°24'12.2"N </td>
								<td>2°10'26.5"E</td>
								<td>
									<a onclick="parameter(4)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i>Parameter</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END VIBRATION -->