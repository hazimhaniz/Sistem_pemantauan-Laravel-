@extends('layouts.app')
@include('plugins.dropify')
 @push('css')
<style type="text/css">
.modal-open .select2-container {
    z-index: 1039 !important;
}
</style>
@endpush
 @push('css')
<style type="text/css">
.modal-open .select2-container {
    z-index: 1039 !important;
}
</style>
@endpush

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
	<div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
		<div class="inner" style="transform: translateY(0px); opacity: 1;">
			{{ Breadcrumbs::render('profile') }}
		</div>
	</div>
</div>
<!-- END JUMBOTRON -->
<!-- START CONTAINER FLUID -->
<div class=" container-fluid container-fixed-lg">
    <!-- START card -->
    <div class="card card-transparent">
        <div class="card-block">
        	<form id='form-edit' role="form" method="post" action="{{ route('profile') }}" enctype="multipart/form-data">
	    		<div class="row">
	        		<div class="col-md-3">
	        			<input type="file" class="dropify" name="picture_url" @if(auth()->user()->picture_url) data-default-file="{{ url('/storage/uploads') }}/{{ auth()->user()->picture_url }}" @endif data-allowed-file-extensions="jpg png gif jpeg" data-max-file-size="5M"/>
	        			<a class="btn btn-default btn-block m-t-10 text-capitalize" onclick="passwordData()"><i class="fa fa-lock m-r-5"></i> Kemaskini Kata Laluan</a>
	        		</div>
	        		<div class="col-md-9 bg-white p-3">
	        			<h3 class=''>Profil Pengguna</h3>
						<p class="small hint-text m-b-20">
							Anda boleh mengemaskini profil anda melalui ruangan borang di bawah.
						</p>

	    				<div class="row">
	        				<div class="col-md-12 padding-0">
			        			@include('components.input', [
			        				'name' => 'name',
			        				'label' => 'Nama Pengguna',
			        				'mode' => 'required',
			        				'value' => auth()->user()->name
			        			])
			        		</div>
			        		<div class="col-md-12 padding-0">
			        			@include('components.input', [
			        				'name' => 'email',
			        				'label' => 'Alamat Emel',
			        				'type' => 'email',
			        				'mode' => 'required',
			        				'value' => auth()->user()->email
			        			])
			        		</div>
			        		<!-- <div class="col-md-12 padding-0">
			        			@include('components.input', [
			        				'name' => 'phone',
			        				'label' => 'No Telefon',
			        				'type' => 'phone',
			        				'value' => auth()->user()->phone
			        			])
			        		</div> -->
			        		{{-- @if(!auth()->user()->hasAnyRole(['superadmin','admin','pengguna_luar']))
			        		<div class="col-md-12 padding-0">
			        			@include('components.input', [
			        				'name' => 'designation',
			        				'label' => 'Jawatan',
			        				'value' => auth()->user()->entity->role->description,
			        				'options' => 'disabled'
			        			])
			        		</div>
			        		@elseif(auth()->user()->hasRole('pengguna_luar'))

			        		@endif --}}
			        		<?php if (auth()->user()->user_type_id == 3): ?>
                                <?php if (auth()->user()->entity->warganegara): ?>
					        		<div class="col-md-12 padding-0">
					                    @include('components.input', [
					                        'label' => 'IC Pengguna',
					                        'name' => 'no_ic',
					        				'options' => 'disabled',
					        				'value' => auth()->user()->entity_user->no_ic,
					        				'info' => 'Data Ini Tidak Boleh Diubah'
					                    ])
					        		</div>
					        		<!-- <div class="col-md-12 padding-0">
					                    @include('components.input', [
					                        'label' => 'Tarikh Lahir',
					                        'name' => 'registered_at',
					        				'options' => 'disabled',
					        				'value' => getBirthDateFromIcNumber(auth()->user()->entity_user->no_ic),
					        				'info' => 'Diambil Dari No IC'
					                    ])
					        		</div>
					        		<div class="col-md-12 padding-0">
					                    @include('components.input', [
					                        'label' => 'Umur',
					                        'name' => 'umur',
					        				'options' => 'disabled',
					        				'value' => getAgeFromIcNumber(auth()->user()->entity_user->no_ic),
					        				'info' => 'Diambil Dari No IC'
					                    ])
					        		</div>
					        		<div class="col-md-12 padding-0">
					                    @include('components.input', [
					                        'label' => 'Jantina',
					                        'name' => 'gender',
					        				'options' => 'disabled',
					        				'value' => getGenderFromIcNumber(auth()->user()->entity_user->no_ic),
					        				'info' => 'Diambil Dari No IC'
					                    ])
					        		</div>
					        		<div class="col-md-12 padding-0">
					                    @include('components.input', [
					                        'label' => 'Negeri Kelahiran',
					                        'name' => 'birth_state',
					        				'options' => 'disabled',
					        				'value' => getStateFromIcNumber(auth()->user()->entity_user->no_ic),
					        				'info' => 'Diambil Dari No IC'
					                    ])
					        		</div> -->
			        			<?php else: ?>
					        		{{-- <div class="col-md-12 padding-0">
					                    @include('components.input', [
					                        'label' => 'No Passport',
					                        'name' => 'no_passport',
					        				'options' => 'disabled',
					        				'value' => auth()->user()->entity->no_passport,
					        				'info' => 'Data Ini Tidak Boleh Diubah'
					                    ])
					        		</div>
					        		<div class="col-md-12 padding-0">
					                    @include('components.input', [
					                        'label' => 'Negara Passport Dikeluarkan',
					                        'name' => 'country_password',
					        				'options' => 'disabled',
					        				'value' => auth()->user()->entity->country,
					        				'info' => 'Data Ini Tidak Boleh Diubah'
					                    ])
					        		</div> --}}
					        	<?php endif ?>
			        		<?php endif ?>
 	        			</div>
		        		<div class="row mb-3">
							<div class="col-md-12">
								<a type="button" class="btn btn-info pull-right text-white" onclick="submitForm('form-edit')"><i class="fa fa-check mr-1"></i> Simpan</a>
							</div>
						</div>
	        		</div>
	    		</div>
			</form>
        </div>
    </div>
    <!-- END card -->
</div>
<!-- END CONTAINER FLUID -->
@endsection
 @push('modal')
<!-- Modal -->
<div class="modal fade" id="modal-handover" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Serahan <span class="bold">Tugas</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
            	<form id='form-handover' role="form" method="post" action="{{ route('profile.handover') }}">
                @include('components.input', [
                    'name' => 'new_email',
                    'label' => 'Email Setiausaha Baru',
                    'mode' => 'required',
                    'modal' => true,
                    'type' => 'email',
                ])
            	</form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info" onclick="submitForm('form-handover')"><i class="fa fa-check m-r-5"></i> Hantar</button>
            </div>
        </div>
    </div>
</div>
@endpush
 @push('js')
<script type="text/javascript">
	$('.dropify').dropify({
        messages: {
            'default': 'Muatnaik gambar profile, Hanya dalam bentuk JPEG & PNG yang dibenarkan dengan size tidak melebihi 2MB',
        }
    });
 	$("#form-edit").validate();
 	function handOver() {
		$("#modal-handover").modal("show");
		$("#form-handover").validate();
		$("#form-handover").trigger("reset");
	}
 	$("form").submit(function(e) {
	    e.preventDefault();
	    var form = $(this);
 	    if(!form.valid())
	       return;
 	    $.ajax({
	        url: form.attr('action'),
	        method: form.attr('method'),
	        data: new FormData(form[0]),
	        dataType: 'json',
	        async: true,
	        contentType: false,
	        processData: false,
	        success: function(data) {
	            // swal(data.title, data.message, data.status);
				Swal.fire('Berjaya!', 'Maklumat telah dikemaskini', 'success').then(function(){
					location.reload();
				});
				
				$("#modal-handover").modal("hide");
	        }
	    });
	});

	$('body').on('keyup','input#name',function(){

	    $(this).val( $(this).val().toUpperCase() );

	})


</script>
@endpush
