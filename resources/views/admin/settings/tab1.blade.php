<!-- START CONTAINER FLUID -->
<div class=" container-fluid container-fixed-lg bg-white">
	<!-- START card -->
	<div class="card card-transparent">
		<div class="card-block">
			<form class="form-tab1" id="formtab1" role="form" autocomplete="off" method="post" action="{{ route('admin.settings.save') }}">

				@include('components.bs.input', [
					'name' => 'system_name',
					'label' => 'Nama Aplikasi Web',
					'mode' => 'required',
					'value' => config('global')['system_name']
				])

				@include('components.bs.input', [
					'name' => 'copyright',
					'label' => 'Hakcipta Terpelihara',
					'mode' => 'required',
					'value' => config('global')['copyright']
				])

				@include('components.bs.input', [
					'name' => 'system_admin_email',
					'label' => 'Emel Pentadbir Sistem',
					'mode' => 'required',
					'value' => config('global')['system_admin_email']
				])

				<?php if (env('APP_ENV') == false): ?>

				@include('components.bs.radio', [
					'name' => 'APP_ENV',
					'label' => 'Jenis Aplikasi',
					'info' => 'Sila guna mod PRODUCTION jika sistem sedang LIVE dan digunakan oleh pengguna luar. Mod DEVELOPMENT hanya boleh digunakan semasa menyelenggara sistem sahaja.',
					'mode' => 'required',
					'data' => [
						'local' => 'Development', 
						'production' => 'Production',
					],
					'selected' => env('APP_ENV')
				])

				@include('components.bs.radio', [
					'name' => 'APP_DEBUG',
					'label' => 'Mod Debug',
					'info' => 'Mod DEBUG akan membenarkan pentadbir/administrator untuk melihat log masalah yang sedang dihadapi dengan lebih terperinci.',
					'mode' => 'required',
					'data' => [
						'true' => 'Aktif', 
						'false' => 'Tidak Aktif',
					],
					'selected' => env('APP_ENV') ? 'true' : 'false'
				])

				{{--@include('components.bs.input', [
					'name' => 'APP_URL',
					'label' => 'URL',
					'mode' => 'required',
					'class' => 'text-lowercase',
					'value' => env('APP_URL')
				])--}}

				<?php endif ?>

                <div class="form-group row">
                	<div class="col-md-3">
                		<label id="label_copyright" for="copyright" class="col-md-12 control-label">Logo Sistem <span style="color:red;">*</span></label>
                	</div>
                    <div class="col-md-3">
                    	<?php if (file_exists(public_path('images/'.config('global')['logo_header']))): ?>
	                        <input type="file" class="dropify" name="logo_header" data-default-file="{{ asset('images/'.config('global')['logo_header']) }}" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M" data-show-remove="false"/>
                    	<?php else: ?>
	                        <input type="file" class="dropify" name="logo_header" data-default-file="{{ asset('storage/'.config('global')['logo_header']) }}" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M" data-show-remove="false"/>
	                    <?php endif ?>
                    </div>            
                </div>

                <div class="form-group row">
                	<div class="col-md-3">
                		<label id="label_copyright" for="copyright" class="col-md-12 control-label">Background Paparan Log Masuk <span style="color:red;">*</span></label>
                	</div>
                    <div class="col-md-3">
                    	<?php if (file_exists(public_path('images/'.config('global')['background_login_page']))): ?>
	                        <input type="file" class="dropify" name="background_login_page" data-default-file="{{ asset('images/'.config('global')['background_login_page']) }}" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M" data-show-remove="false"/>
                    	<?php else: ?>
	                        <input type="file" class="dropify" name="background_login_page" data-default-file="{{ asset('storage/'.config('global')['background_login_page']) }}" data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M" data-show-remove="false"/>
	                    <?php endif ?>
                    </div>            
                </div>

                <div class="form-group row">
                	<div class="col-md-3">
                		<label id="label_copyright" for="copyright" class="col-md-12 control-label">favicon <span style="color:red;">*</span></label>
                	</div>
                    <div class="col-md-3">
                    	<?php if (file_exists(public_path(config('global')['favicon']))): ?>
	                        <input type="file" class="dropify" name="favicon" data-default-file="{{ asset(config('global')['favicon']) }}" data-allowed-file-extensions="jpg png gif jpeg ico" data-max-file-size="5M" />
                    	<?php else: ?>
	                        <input type="file" class="dropify" name="favicon" data-default-file="{{ asset('storage/'.config('global')['favicon']) }}" data-allowed-file-extensions="jpg png gif jpeg ico" data-max-file-size="5M" />
	                    <?php endif ?>
                    </div>            
                </div>

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

@push('js')

<script>

$('body').on('change','input[name="color_theme"]',function(){

	var selected = $(this).val();
	if (selected=='blue') {
		$('#color1').val('info');
		$('#color2').val('#5ec0cb');
		$('#color3').val('#2d8fbd');
		$('#color4').val('#1f3953');
		$('#color5').val('#1e5377');
		$('#color6').val('#1f3953');
	}
	if (selected=='yellow') {
		$('#color1').val('warning');
		$('#color2').val('#FFCD05');
		$('#color3').val('#FFCD05');
		$('#color4').val('#ffc107');
		$('#color5').val('#FFCD05');
		$('#color6').val('#FF9600');
	}
	if (selected=='green') {
		$('#color1').val('success');
		$('#color2').val('#78a03f');
		$('#color3').val('#78a03f');
		$('#color4').val('#a4cd39');
		$('#color5').val('#78a03f');
		$('#color6').val('#7da33f');
	}

})

</script>

@endpush

