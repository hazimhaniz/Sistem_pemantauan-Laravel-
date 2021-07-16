@push('modal')

<!-- START MODAL PAKEJ -->
<div class="modal fade" id="modal-add-pakej" role="dialog" aria-labelledby="addModalTitle" aria-hidden="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalTitle"><span class="bold">Maklumat Pakej / Fasa</span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-t-20">
				<form id='pakej' role="form" method="post" action="{{ route('pakej') }}">
					@include('components.input', [
                    'label' => 'Nama Pakej',
                    'info' => 'eg: Pakej A',
                    'name' => 'nama_pakej',
                    'mode' => 'required',
                    ])

        					@include('components.input', [
                    'label' => 'Nama Kontraktor',
                    'info' => 'eg: Ali bin Abu',
                    'name' => 'kontraktor',
                    'mode' => 'required',
                    ])

                    <div id="selectnegeri" class="form-group form-group-default form-group-default-custom form-group-default-select2">
                        <label class="col-md-3">Negeri<span style="color:red;">*</span> </label>
                        <select id="pakej_negeri" name="pakej_negeri" data-placeholder="" class="full-width autoscroll select2-hidden-accessible form-control" data-init-plugin="select2" tabindex="-1" aria-hidden="true" required="">
                         <option value="" selected="" disabled="">Pilih Negeri</option>
                         @foreach($states as $index => $state)
                         <option value="{{ $state->id }}">{{ strtoupper($state->name) }}</option>
                         @endforeach
                        </select>
                        <label id="selectnegerierror" class="error" style="display: none;">Input negeri wajib diisi.</label>
                 	</div>
					<!-- @include('components.select', [
                    'name' => 'negeri',
                    'label' => 'Negeri',
                    'data' => [
                    'Johor' => 'Johor',
                    'Kedah' => 'Kedah',
                    'Kelantan' => 'Kelantan',
                    'Melaka' => 'Melaka',
                    'Negeri Sembilan' => 'Negeri Sembilan'
                    ],
                    ]) -->
                    <div class="form-group form-group-default required">
                        <label>
                            <span id="label_alamat">Alamat</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Alamat"></i>        
                        </label>
                        <input id="alamat" class="form-control " name="alamat" placeholder="Alamat baris 1" onkeypress="" required="" type="text" maxlength="100" value="">

                    </div>

                    <div class="form-group form-group-default">
                        <input id="alamat1" class="form-control " name="alamat1" placeholder="Alamat baris 2" onkeypress="" maxlength="100" type="text" value="">

                    </div>

                    <div class="form-group form-group-default">
                        <input id="alamat2" class="form-control " name="alamat2" placeholder="Alamat baris 3" onkeypress="" maxlength="100" type="text" value="">
                    </div>

					<!-- @include('components.input', [
        	          'label' => 'Alamat',
        	          'info' => 'Alamat',
        	          'name' => 'alamat',
        	          'mode' => 'required',
        	          ])

                      @include('components.input', [
                      'label' => 'Alamat',
                      'info' => 'Alamat',
                      'name' => 'alamat1',
                      'mode' => 'required',
                      ])

                      @include('components.input', [
                      'label' => 'Alamat',
                      'info' => 'Alamat',
                      'name' => 'alamat1',
                      'mode' => 'required',
                      ]) -->

        					<!-- @include('components.date', [
                    'label' => 'Tarikh Mula',
                    'info' => 'Tarikh Mula',
                    'name' => 'tarikh_mula',
                    'mode' => 'required',
                    ]) -->

                    <div id="tarikh_mulaer" class="form-group form-group-default input-group required" aria-required="true">
                        <div class="form-input-group">
                            <label class="">
                                <span id="label_tarikh_mula">Tarikh Mula</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Tarikh Mula"></i>       </label>
                            <input id="tarikh_mula" class="form-control" name="tarikh_mula" onchange="testt2()" placeholder="" type="date" value="">
                        </div>
                        <!-- <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div> -->
                    </div>

					<!-- @include('components.date', [
        	          'label' => 'Tarikh Tamat',
        	          'info' => 'Tarikh Tamat',
        	          'name' => 'tarikh_akhir',
        	          'mode' => 'required',
        	          ]) -->
                    <div id="tarikh_akhirer" class="form-group form-group-default input-group required" aria-required="true">
                        <div class="form-input-group">
                            <label>
                                <span id="label_tarikh_akhir">Tarikh Tamat</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Tarikh Tamat"></i>      </label>
                            <input id="tarikh_akhir" class="form-control" name="tarikh_akhir" onchange="testt2()" placeholder="" type="date" value="">
                            <!-- <input id="tarikh_akhir" class="form-control datepicker" name="tarikh_akhir" onchange="testt2()" placeholder="" type="text" value=""> -->
                        </div>
                        <!-- <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div> -->
                    </div>
                    <label id="tarikh_mulaerror" class="error" style="display: none;">Input tarikh mula tidak boleh lebih dari tarikh akhir.</label>
    			</form>
                
				<button class="btn btn-info btn-cons from-left pull-right" onclick="submitForm('pakej')" type="button">
					<span>Simpan 1</span>
                </button>
                <button class="btn btn-danger btn-cons from-left pull-right daftar_ldp2m2" onclick="$('.dropify-clear').click();" data-dismiss="modal" type="button">
                    <span>Tutup</span>
                </button>
			</div>
		</div>
	</div>
</div>
<!-- END MODAL PAKEJ -->

<!-- START MODAL PAKEJ -->

<!-- END MODAL PAKEJ -->

<!-- START Modal ADD EMP -->
<div class="modal fade" id="modal-add-EMP" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"><span class="bold">Tambah Maklumat EMP</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body p-t-10">
                <form id='EMP' role="form" method="post" action="{{ route('EMP') }}">
                <!-- @include('components.date', [
                'label' => 'Tarikh Kelulusan EMP',
                'info' => 'Tarikh Kelulusan EMP',
                'name' => 'tarikh_kelulusan',
                'id' => 'tarikh_kelulusan',
                'value' => '',
                'mode' => 'required',
                ]) -->

                <div id="datekom" class="form-group form-group-default input-group required">
                    <div class="form-input-group">
                        <label>
                            <span id="label_tarikh_kelulusan" style="color: #575757 !important;">Tarikh Kelulusan EMP</span>
                            <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Tarikh Kelulusan EMP"></i> --></label>
                        <input  style="color: #575757 !important;" id="tarikh_kelulusan" class="form-control" name="tarikh_kelulusan" placeholder="Sila masukkan Tarikh Kelulusan EMP" required="" type="date" value="" oninput="checkdateemp()">
                        <!-- <input  style="color: #575757 !important;" id="tarikh_kelulusan" class="form-control" name="tarikh_kelulusan" placeholder="Sila masukkan Tarikh Kelulusan EMP" required="" onblur="checkdate()" type="date" value=""> -->
                    </div>
                    <!-- <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div> -->
                    <label id="datecheckemperror" style="color: red;display: none;">Pastikan tarikh tidak melebihi atau sama tarikh hari ini.</label>
                </div>

                <div class="form-group form-group-default required">
                    <label>
                        <span id="label_laporan">Nama Laporan EMP</span>
                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Nama Laporan EMP"></i> -->      <span style="color:red;">*</span>
                    </label>
                    <input id="laporan" class="form-control " name="laporan" placeholder="" onkeypress="" required="" type="text" maxlength="300" value="">
                </div>

                <div class="form-group form-group-default required">
                    <label>
                        <span id="label_jururunding">Nama Jururunding</span>
                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Nama Jururunding"></i> -->      <span style="color:red;">*</span>
                    </label>
                    <input id="jururunding" class="form-control " name="jururunding" placeholder="" onkeypress="" maxlength="150" required="" type="text" value="">
                </div>

                <div class="form-group form-group-default required">
                    <label>
                        <span id="label_No_Rujukan">No Rujukan</span>
                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="No Rujukan"></i> -->        <span style="color:red;">*</span>
                    </label>
                    <input id="No_Rujukan" class="form-control " name="No_Rujukan" placeholder="" maxlength="100" onkeypress="" required="" type="text" value="">
                </div>
                <!-- @include('components.input', [
                'label' => 'Nama Laporan EMP',
                'info' => 'Nama Laporan EMP',
                'name' => 'laporan',
                'id' => 'laporan',
                'value' => '',
                'mode' => 'required',
                ])

                @include('components.input', [
                'label' => 'Nama Jururunding',
                'info' => 'Nama Jururunding',
                'name' => 'jururunding',
                'id' => 'jururunding',
                'value' => '',
                'mode' => 'required',
                ])

								@include('components.input', [
                'label' => 'No Rujukan',
                'info' => 'No Rujukan',
                'name' => 'No_Rujukan',
                'value' => '',
				'mode' => 'required',
                ]) -->
                </form>
            </div>

            <div class="modal-footer">
                <button onclick="submitForm('EMP')" class="btn btn-info btn-cons from-left pull-right daftar_emp" type="button">
                    <span>Simpan 2</span>
                </button>
                <button class="btn btn-danger btn-cons from-left pull-right daftar_ldp2m2" onclick="$('.dropify-clear').click();" data-dismiss="modal" type="button">
                    <span>Tutup</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD EMP -->

<!-- START Modal EDIT EMP -->
<div class="modal fade" id="modal-edit-EMP" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">Maklumat EMP</span></h5>
                <!-- <small class="text-muted">Kindly fill in the fields in the form below.</small> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body p-t-10">
                @include('components.date', [
                'label' => 'Tarikh Kelulusan EMP',
                'info' => 'Tarikh Kelulusan EMP',
                'name' => 'tarikh_emp',
                'value' => '27/05/2019',
                ])

                @include('components.input', [
                'label' => 'Nama Laporan EMP',
                'info' => 'Nama Laporan EMP',
                'name' => 'nama_emp',
                'value' => 'Laporan 1',
                ])

                @include('components.input', [
                'label' => 'Nama Jururunding',
                'info' => 'Nama Jururunding',
                'name' => 'consultant_emp',
                'value' => 'Juruunding 1',
                ])



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="submitForm('EMP')"><!-- <i class="fa fa-check m-r-5"></i> --> Simpan 3</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL EDIT EMP -->

<!-- START Modal ADD LDP2M2 -->
<div class="modal fade" id="modal-add-LDP2M2" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"><span class="bold">Tambah Maklumat LDP2M2</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-t-10">
                <form id='LDP2M2' role="form" method="post" action="{{ route('LDP2M2') }}">
                <!-- @include('components.input', [
                'label' => 'Nama Dokumen LDP2M2',
                'info' => 'Nama Dokumen LDP2M2',
                'name' => 'nama',
                'id' => 'nama',
                'mode' => 'required',
                'value' => '',
                ]) -->

                <div class="form-group form-group-default required">
                    <label>
                        <span id="label_nama">Nama Dokumen LDP2M2</span>
                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Nama Dokumen LDP2M2"></i>        -->
                        <span style="color:red;">*</span>
                    </label>
                    <input id="nama" class="form-control " name="nama" placeholder="" onkeypress="" required="" type="text" value="" maxlength="150">
                </div>

                <div id="datekomldp" class="form-group form-group-default input-group required">
                    <div class="form-input-group">
                        <label class="fade">
                            <span id="label_tarikh_kelulusan">Tarikh Kelulusan LDP2M2</span>
                            <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Tarikh Kelulusan LDP2M2"></i>        -->
                        </label>
                        <input id="tarikh_kelulusanldp" class="form-control" name="tarikh_kelulusan" placeholder="" required="" type="date" value="" oninput="checkdateldp()">
                        <!-- <input id="tarikh_kelulusanldp" class="form-control datepicker" name="tarikh_kelulusan" placeholder="" required="" type="text" value="" readonly=""> -->
                    </div>
                    <!-- <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div> -->
                    <label id="datecheckldperror" style="color: red;display: none;">Pastikan tarikh tidak melebihi atau sama tarikh hari ini.</label>
                </div>

                <div class="form-group form-group-default required">
                    <label>
                        <span id="label_no_plan_diluluskan">No Rujukan</span>
                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="No Rujukan"></i>         -->
                        <span style="color:red;">*</span>
                    </label>
                    <input id="no_plan_diluluskan" class="form-control " name="no_plan_diluluskan" placeholder="" onkeypress="" required="" type="text" value="" maxlength="150">
                </div>

                <!-- @include('components.date', [
                'label' => 'Tarikh Kelulusan LDP2M2',
                'info' => 'Tarikh Kelulusan LDP2M2',
                'name' => 'tarikh_kelulusan',
                'id' => 'tarikh_kelulusan',
                'mode' => 'required',
                ])

                @include('components.input', [
                'label' => 'No Rujukan',
                'info' => 'No Rujukan',
                'name' => 'no_plan_diluluskan',
                'id' => 'no_plan_diluluskan',
                'mode' => 'required',
                ]) -->

                    <div class="form-group form-group-default">
                        <label>Dokumen</label>
                        <input type="file" class="dropify ldp2m2" id="dokumen" name="dokumen" data-allowed-file-extensions="pdf" data-max-file-size="10M"/>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button onclick="submitForm('LDP2M2')" class="btn btn-info btn-cons from-left pull-right daftar_ldp2m2" type="button">
                    <span>Simpan 4</span>
                </button>
                <button class="btn btn-danger btn-cons from-left pull-right daftar_ldp2m2" onclick="$('.dropify-clear').click();" data-dismiss="modal" type="button">
                    <span>Tutup</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD LDP2M2 -->

<!-- START Modal EDIT LDP2M2 -->
<div class="modal fade" id="modal-edit-LDP2M2" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">Maklumat LDP2M2</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body p-t-10">
                @include('components.input', [
                'label' => 'Nama Dokumen LDP2M2',
                'info' => 'Nama Dokumen LDP2M2',
                'name' => 'nama_ldp',
                'type' => '',
                'value' => 'LDP2M2 1',
                ])

                @include('components.date', [
                'label' => 'Tarikh Kelulusan LDP2M2',
                'info' => 'Tarikh Kelulusan LDP2M2',
                'name' => 'date_ldp',
                'type' => '',
                'value' => '23/05/2019',
                ])

                @include('components.input', [
                'label' => 'No Plan Diluluskan',
                'info' => 'No Plan Diluluskan',
                'name' => 'no_plan_ldp',
                'type' => '',
                'value' => '123',
                ])

                @include('components.dropzone', [
                'label' => 'Dokumen',
                'info' => 'Dokumen berkaitan',
                'name' => 'gambar_ldp2m2',
                'id' => 'gambar_ldp2m2',
                ])
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="submitAdd()"><!-- <i class="fa fa-check m-r-5"></i> --> Simpan 5</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL EDIT LDP2M2 -->

<!-- START MODAL PARAMETER SUNGAI -->
<div class="modal fade" id="modal-parameter-sungai" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
				<small class="text-muted">Standard merujuk kepada National Water Quality Standards</small>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row control-label col-md-12 p-t-20">
					<table class="table table-bordered">
						<thead>
							<tr>
                                <th>Parameter</th>
								<th>Data Baseline</th>
								<th>Standard Dirujuk</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Parameter 1</td>
								<td><input class="form-control" type="text"/></td>
								<td>
                                    <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                        <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                            <option value="0" selected disabled>Pilih</option>
                                            <option value="1">Kelas 1 - 12</option>
                                            <option value="2">Kelas 2 - 13</option>
                                        </select>
                                    </div>
                                </td>
								</tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-cons from-left pull-right" type="button">
                    <span>Simpan 6</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PARAMETER SUNGAI -->

<!-- START MODAL PARAMETER MARIN -->
<div class="modal fade" id="modal-parameter-marin" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label><span>Standard Dirujuk</span></label>
                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                        <option value="1" selected>Marine Water Quality Criteria And Standards</option>
                        <option value="2">Standard Kualiti Air Marin Malaysia</option>
                    </select>
                </div>
                <div class="form-group row control-label col-md-12 p-t-20">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Data Baseline</th>
                            <th>Standard Dirujuk</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Parameter 1</td>
                            <td><input class="form-control" type="text"/></td>
                            <td>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                        <option value="0" selected disabled>Pilih</option>
                                        <option value="1">Kelas 1 - 12</option>
                                        <option value="2">Kelas 2 - 13</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-cons from-left pull-right" type="button">
                    <span>Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PARAMETER MARIN-->

<!-- START MODAL PARAMETER TASIK -->
<div class="modal fade" id="modal-parameter-tasik" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
                <small class="text-muted">Standard merujuk kepada National Lake Water Quality Criteria And Standards</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row control-label col-md-12 p-t-20">
                    <table class="table table-bordered" id="table2">
                        <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Data Baseline</th>
                            <th>Standard Dirujuk</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Parameter 1</td>
                            <td><input class="form-control" type="text"/></td>
                            <td>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                        <option value="0" selected disabled>Pilih</option>
                                        <option value="1">Kelas 1 - 12</option>
                                        <option value="2">Kelas 2 - 13</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-cons from-left pull-right" type="button">
                    <span>Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PARAMETER TASIK-->

<!-- START MODAL PARAMETER AIR TANAH -->
<div class="modal fade" id="modal-parameter-tanah" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
                <small class="text-muted">Standard merujuk kepada Indeks Kualiti Air Tanah (IKAT)</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row control-label col-md-12 p-t-20">
                    <table class="table table-bordered" id="table2">
                        <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Data Baseline</th>
                            <th>Standard Dirujuk</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Parameter 1</td>
                            <td><input class="form-control" type="text"/></td>
                            <td>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                        <option value="0" selected disabled>Pilih</option>
                                        <option value="1">Kelas 1 - 12</option>
                                        <option value="2">Kelas 2 - 13</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-cons from-left pull-right" type="button">
                    <span>Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PARAMETER AIR TANAH -->

<!-- START MODAL PARAMETER AIR LARIAN PERMUKAAN -->
<div class="modal fade" id="modal-parameter-permukaan" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row control-label col-md-12 p-t-20">
                    <table class="table table-bordered" id="table2">
                        <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Data Baseline</th>
                            <th>Standard Dirujuk</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Parameter 1</td>
                            <td><input class="form-control" type="text"/></td>
                            <td>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                        <option value="0" selected disabled>Pilih</option>
                                        <option value="1">Kelas 1 - 12</option>
                                        <option value="2">Kelas 2 - 13</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-cons from-left pull-right" type="button">
                    <span>Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PARAMETER AIR LARIAN PERMUKAAN -->

<!-- START MODAL PARAMETER UDARA -->
<div class="modal fade" id="modal-parameter-udara" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
                <small class="text-muted">Standard merujuk kepada Standard Kualiti Udara Ambien</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row control-label col-md-12 p-t-20">
                    <table class="table table-bordered" id="table2">
                        <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Purata Masa</th>
                            <th>Data Baseline</th>
                            <th>Standard Dirujuk</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td rowspan="2">Parameter 1</td>
                            <td>1 Tahun</td>
                            <td><input class="form-control" type="text"/></td>
                            <td>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                        <option value="0" selected disabled>Pilih</option>
                                        <option value="1">Kelas 1 - 12</option>
                                        <option value="2">Kelas 2 - 13</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>24 Jam</td>
                            <td><input class="form-control" type="text"/></td>
                            <td>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                        <option value="0" selected disabled>Pilih</option>
                                        <option value="1">Kelas 1 - 12</option>
                                        <option value="2">Kelas 2 - 13</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-cons from-left pull-right" type="button">
                    <span>Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PARAMETER UDARA -->

<!-- START MODAL PARAMETER BUNYI BISING -->
<div class="modal fade" id="modal-parameter-bunyi" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
                <small class="text-muted">Standard merujuk kepada Schedule Of Permissible Sound Levels </small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label><span>Jadual Standard Dirujuk</span></label>
                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                        <option value="schedule_1" selected>Schedule 1 - Maximum Permissible Sound Level (LAeq) By Receiving Land Use For Planning And New Development</option>
                        <option value="schedule_2">Schedule 2 - Maximum Permissible Sound Level (LAeq) Of New Development (Roads, Rail, Industrial) In Areas of Existing High Environmental Noise Climate</option>
                        <option value="schedule_3">Schedule 3 - Maximum Permissible Sound Level (LAeq) To Be Maintained At The Existing Noise Climate</option>
                        <option value="schedule_4">Schedule 4 - Limiting Sound Level (LAeq) From Road Traffic (For Proposed New Roads And/Or Redevelopment Of Existing Roads)</option>
                        <option value="schedule_5">Schedule 5 - Limiting Sound Level (LAeq) From Railways Including Transits (For New Development And Re-Alignments)</option>
                        <option value="schedule_6">Schedule 6 - Maximum Permissible Sound Level (Percentile LN and LMax) Of Construction, Maintenance And Demolition Work By Receiving Land Use</option>
                    </select>
                </div>
                <div class="form-group row control-label col-md-12 p-t-20">
                    <table class="table table-bordered" id="table2">
                        <thead>
                        <tr>
                            <th rowspan="2">Parameter</th>
                            <th colspan="2">Data Baseline</th>
                            <th colspan="2">Standard Dirujuk</th>
                        </tr>
                        <tr>
                            <th width="20%">Hari</th>
                            <th width="20%">Malam</th>
                            <th width="20%">Hari</th>
                            <th width="20%">Malam</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Parameter 1</td>
                            <td><input class="form-control" type="text"/></td>
                            <td><input class="form-control" type="text"/></td>
                            <td>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                        <option value="0" selected disabled>Pilih</option>
                                        <option value="1">Kelas 1 - 12</option>
                                        <option value="2">Kelas 2 - 13</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                        <option value="0" selected disabled>Pilih</option>
                                        <option value="1">Kelas 1 - 12</option>
                                        <option value="2">Kelas 2 - 13</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Parameter 2</td>
                            <td><input class="form-control" type="text"/></td>
                            <td><input class="form-control" type="text"/></td>
                            <td>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                        <option value="0" selected disabled>Pilih</option>
                                        <option value="1">Kelas 1 - 12</option>
                                        <option value="2">Kelas 2 - 13</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <select id="state_id" name="state_id" class="full-width autoscroll state" data-init-plugin="select2" required="">
                                        <option value="0" selected disabled>Pilih</option>
                                        <option value="1">Kelas 1 - 12</option>
                                        <option value="2">Kelas 2 - 13</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-angle-right" type="button">
                    <span>Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PARAMETER BUNYI BISING -->

<!-- START MODAL PARAMETER GETARAN -->
<div class="modal fade" id="modal-parameter-getaran" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
                <small class="text-muted">Standard merujuk kepada Schedule 1: Recommended Limits For Damage Risk In Buildings From Steady State Vibration</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row control-label col-md-12 p-t-20">
                    <table class="table table-bordered" id="table2">
                        <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Data Baseline</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Vertical Vibration Peak Velocity V<sub>max</sub>, mm/s (0 to Peak) (10 -100 Hz)</td>
                            <td><input class="form-control" type="text"/></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-angle-right" type="button">
                    <span>Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endpush

@push('js')
<script type="text/javascript">

</script>
@endpush
