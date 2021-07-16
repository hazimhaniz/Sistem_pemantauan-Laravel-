<!-- START CONTAINER FLUID -->
<div class=" container-fluid container-fixed-lg bg-white">
	<!-- START card -->
	<div class="card card-transparent">
		<div class="card-block">
			<form class="form-horizontal" role="form" autocomplete="off" method="post" action="{{ route('admin.settings') }}">

				{{--@include('components.bs.select', [
					'name' => 'DB_CONNECTION',
					'label' => 'Jenis Sambungan',
					'mode' => 'required',
					'data' => [
						'mysql' => 'mysql', 
						'mssql' => 'mssql',
						'sqllite' => 'sqllite',
					],
					'selected' => env('DB_CONNECTION')
				])--}}

				@include('components.bs.input', [
					'name' => 'DB_HOST',
					'label' => 'Hos / Alamat IP',
					'mode' => 'required',
					'class' => 'text-lowercase',
					'value' => env('DB_HOST')
				])

				@include('components.bs.input', [
					'name' => 'DB_PORT',
					'label' => 'Nombor Port',
					'mode' => 'required',
					'value' => env('DB_PORT')
				])

				@include('components.bs.input', [
					'name' => 'DB_DATABASE',
					'label' => 'Nama Database',
					'mode' => 'required',
					'class' => 'text-lowercase',
					'value' => env('DB_DATABASE')
				])

				@include('components.bs.input', [
					'name' => 'DB_USERNAME',
					'label' => 'ID Pengguna',
					'mode' => 'required',
					'class' => 'text-lowercase',
					'value' => env('DB_USERNAME')
				])

				@include('components.bs.input', [
					'name' => 'DB_PASSWORD',
					'label' => 'Kata Laluan',
					'type' => 'password',
					'mode' => 'required',
					'class' => 'text-lowercase',
					'value' => env('DB_PASSWORD')
				])

				

				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-info pull-right" type="submit">
							<i class="fa fa-check m-r-5"></i> Simpan
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- END card -->
</div>
<!-- END CONTAINER FLUID -->

