@extends('layouts.modal')
<style type="text/css">
	.pakejcss .active{
		background-color: white !important;
		/*box-shadow: 0px 4px 5px #aaaaaa;*/
		z-index: 10;
		font-weight: 900;
	    font-size: 17px;
	    color: black !important;
	}
	.pakejcss1 .active{
		background-color: white !important;
		/*box-shadow: 0px 4px 5px #aaaaaa;*/
		/*z-index: 10;*/
	}
	.table-responsive {
	    overflow-x: unset !important;
	}
</style>
<div class="modal fade" id="modal-add-pengawasan" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1002px !important;width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"> <span class="bold">Maklumat EO Dan EMC</span></h5>
                <!-- <small class="text-muted">Kindly fill in the fields in the form below.</small> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
								<form id='formpengawasan' role="form" method="post" action="{{ route('jenis_pakej') }}">
									@include('components.input', [
										'label' => 'Nama Pakej',
										'info' => 'eg: Pakej A',
										'name' => 'myPakej',
										'mode' => 'hidden',
										'value' => $myPakej,
										])
									<div class="form-group form-group-default required">
										<label class="m-t-15 control-label">Jenis Pengawasan<span style="color:red;">*</span> </label>
										 <div class="jenisPengawasan">
												<div class="checkbox check-primary">
													 @foreach($Pengawasan as $value)
													 <div class="row">
															<div class="col-md-12">
																 <input name="pakej_pengawasan_id[]" value="{{$value->id}}" id="{{$value->id}}" type="checkbox"class="hidden pengawasanpakej_{{$value->id}}" onclick="jenis_pengawasan()">
																 <label for="{{$value->id}}">{{$value->jenis_pengawasan}}</label>
															</div>
													 </div>
													 @endforeach
												</div>
										 </div>
									</div>
								</form>
								@if($projek->status == 1)
								<div class="alert alert-danger" role="alert">
								<i class="fa fa-exclamation" aria-hidden="true"></i> Sila pilih EO dan EMC yang bertanggungjawab bagi setiap Jenis Pengawasan
								</div>
								@endif
								<div class="card-group horizontal" id="accordion" role="tablist" aria-multiselectable="true" >
									<br><h3><span class="bold">Sila pilih EO untuk Fasa ini.</span></h3>
									<div id="_container">
										 <div class="card card-default m-b-0" >
												<div class="card-header " role="tab" id="heading">
													 <h4 class="">
													 </h4>
												</div>
												<div id="" class="" role="tabcard" aria-labelledby="heading" style="">
													 <div class="card-body">
														 <div class="col-md-12">
															<div class="card card-transparent flex-row">
																	<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white" id="tab-3">
																			<li class="nav-item pakejcss">
																					<a href="#" class="active" data-toggle="tab" data-target="#tabEO" style="border: 1px solid #c2c2c2;border-radius: 6px;background-color: #dadada;">EO</a>
																			</li>
																	</ul>
																	<div class="tab-content bg-white pakejcss1" >
																			<div class="tab-pane active" id="tabEO">
																				<div class="form-group row control-label col-md-12">
																					 <div class="col-md-12">
 														 									@if($projek->status == 1)
																						 <form id='formpengawasaneofasa' role="form" method="post" action="{{ route('jenis_pakej_eo') }}">
																							 @include('components.input', [
															 										'label' => 'Nama Pakej',
															 										'info' => 'eg: Pakej A',
															 										'name' => 'myPakej',
															 										'mode' => 'hidden',
															 										'value' => $myPakej,
														 										])

																							<select class="full-width autoscroll state formeeofasa" name="eo" id="eo" data-init-plugin="select2">
																								<option value="" selected="" disabled="">Sila pilih EO</option>
																								@foreach($EOuser as $EOuserS)
																								<option value="{{$EOuserS->id}}">{{$EOuserS->name}}</option>
																								@endforeach
																							</select>
																						</form>
																							@endif
																					</div>
																				</div>
																				<div class="table-responsive">
																						<table class="table table-bordered" style="width:100%" id="eotable{{$myPakej}}">
																								<thead>
																										<tr>
																											<th class="bold">Bil</th>
																											<th class="bold" width="30%">Nama</th>
																											<th class="bold">No Kad Pengenalan
																											<th>Tarikh Daftar</th>
																											<th class="bold">No Sijil Kompetensi</th>
																											<th>status</th>
																											<th class="bold">Tindakan</th>
																										</tr>
																								</thead>
																						</table>
																				</div>
																			</div>
																	</div>
															</div>
														</div>
													 </div>
												</div>
										 </div>
										 {{-- {!!dd($EMCuser);!!} --}}
									 </div><br><br>
									<h3><span class="bold">Sila pilih EMC bagi setiap pengawasan.</span></h3>
									@foreach($Pengawasan as $Pengawasans)
									<div id="{{$Pengawasans->id}}_container" style="display:none;">
										 <div class="card card-default m-b-0" >
												<div class="card-header " role="tab" id="heading{{$Pengawasans->id}}">
													 <h4 class="">
															<!-- <a data-toggle="" data-parent="#accordion" href="#collapse{{$Pengawasans->id}}" aria-expanded="true" aria-controls="collapse{{$Pengawasans->id}}" class="collapsed">
															{{$Pengawasans->jenis_pengawasan}}
															</a> -->
															<h3><span class="bold">{{$Pengawasans->jenis_pengawasan}}</span></h3>
													 </h4>
												</div>
												<div id="collapse{{$Pengawasans->id}}" class="" role="tabcard" aria-labelledby="heading{{$Pengawasans->id}}" style="">
													 <div class="card-body">
														 <div class="col-md-12">
															<div class="card card-transparent flex-row">
																	<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white" id="tab-3">
																			<!-- <li class="nav-item pakejcss">
																					<a href="#" class="active" data-toggle="tab" data-target="#tabEO{{$Pengawasans->id}}" style="border: 1px solid #c2c2c2;border-radius: 6px;background-color: #dadada;">EO</a>
																			</li> -->
																			<li class="nav-item pakejcss">
																					<a href="#" class="active" data-toggle="tab" data-target="#tabEMC{{$Pengawasans->id}}" style="border: 1px solid #c2c2c2;border-radius: 6px;background-color: #dadada;">EMC</a>
																			</li>
																	</ul>
																	<div class="tab-content bg-white pakejcss1" >
																			<div class="tab-pane active" id="tabEMC{{$Pengawasans->id}}">
																				<div class="form-group row control-label col-md-12">
																					 <div class="col-md-12">
 														 									@if($projek->status == 1)
																						 <form id='formpengawasanemc{{$Pengawasans->id}}{{$myPakej}}' role="form" method="post" action="{{ route('jenis_pakej_emc') }}">
																							 @include('components.input', [
														 										'label' => 'Nama Pakej',
														 										'info' => 'eg: Pakej A',
														 										'name' => 'myPakej',
														 										'mode' => 'hidden',
														 										'value' => $myPakej,
														 										])

																							 @include('components.input', [
 														 										'label' => 'Nama Pakej',
 														 										'info' => 'eg: Pakej A',
 														 										'name' => 'pengawasan_id',
 														 										'mode' => 'hidden',
 														 										'value' => $Pengawasans->id,
 														 										])
																							 <select class="full-width autoscroll state formeemc{{$Pengawasans->id}}{{$myPakej}}" name="emc" id="emc" data-init-plugin="select2">
																								 <option value="" selected="" disabled="">Sila pilih EMC</option>
																								 @foreach($EMCuser as $EMCuserS)
																								 @if($EMCuserS['pengawasan_item'])
																								 @if(in_array($Pengawasans->id,$EMCuserS['pengawasan_item']->toArray()))
																								 <option value="{{$EMCuserS['id']}}">{{$EMCuserS['name']}}</option>
																								 @endif
																								 @endif
																								 @endforeach
																							 </select>
																						 </form>
																							@endif
																				 	</div>
																			 	</div>
																			 <div class="table-responsive">
																					 <table class="table table-bordered" style="width:100%" id="emctable{{$Pengawasans->id}}{{$myPakej}}">
																							 <thead>
																									 <tr>
																										 <th class="bold">Bil.</th>
																										 <th class="bold">Nama</th>
																										 <th class="bold">No Kad Pengenalan <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="No kad pengenalan akan digunakan sebagai ID untuk log masuk ke dalam sistem"></i>--></th>
																										 <th>Nama Syarikat</th>
																										 <th class="bold">No Faks<br>No Tel</th>
																										 <th class="bold">Status</th>
																										 <th class="bold">Tindakan</th>
																									 </tr>
																							 </thead>
																					 </table>
																			 </div>
																			</div>
																	</div>
															</div>
														</div>
													 </div>
												</div>
										 </div>
									 </div>
									 @endforeach
								</div>
								@if(auth()->user()->entity_type == 'App\UserStaff' || $projek->status != 1)
						            <button class="btn btn-info pull-right" style="width: 13%;margin-right: 15px;margin-bottom: 20px;margin-top: 20px;" type="button" data-dismiss="modal"><span>Selesai</span></button>
								@else
									<!-- <button class="btn btn-info pull-right" style="width: 13%;margin-right: 26px;margin-bottom: 20px;margin-top: 20px;" type="button" data-dismiss="modal"><span>Simpan</span></button> -->
									<button class="btn btn-info pull-right" style="width: 13%;margin-right: 15px;margin-bottom: 20px;margin-top: 20px;" type="button" onclick="checkupDataP({{$myPakej}})"><span>Simpan</span></button>
						            <button class="btn btn-danger pull-right" style="width: 13%;margin-right: 26px;margin-bottom: 20px;margin-top: 20px;" type="button" data-dismiss="modal"><span>Tutup</span></button>
						           
								@endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(".formeeofasa").change(function() {
		console.log('sini123');
		$('form#formpengawasaneofasa').submit();
	});

	$('body').on('submit', 'form#formpengawasaneofasa', function() {
		var form = $(this);
		console.log('sini456');
		// alert(form.attr('action'));
		$.ajax({
				url: form.attr('action'),
				method: form.attr('method'),
				data: new FormData(form[0]),
				dataType: 'json',
				async: true,
				contentType: false,
				processData: false,
				success: function(response) {
					eotable{{$myPakej}}.api().ajax.reload(null, false);
				}
		});
		return false;
	});

	    var eotable{{$myPakej}} = $('#eotable{{$myPakej}}');
    // var eotable{{$value->id}}{{$myPakej}} = $('#eotable{{$value->id}}{{$myPakej}}');
		var id= "{{$myPakej}}";
    <?php
      $routetableeo = "eotable";
     ?>
		 var url = "{{route($routetableeo,['id'=>"+id+"])}}";

		 url = url.replace("%2Bid%2B",id);
		 var urlString = url.replace(/&amp;/g, '&');
		 console.log(urlString);
    // var eosetting{{$value->id}}{{$myPakej}} = {
    var eosetting{{$myPakej}} = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "searchable": false,
        "ajax": urlString,
				"columns": [
		        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
		            return meta.row + meta.settings._iDisplayStart + 1;
		        }},
		        { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
		            return $("<div/>").html(data).text();
		        }},
		        { data: "username", name: "username", defaultContent: "-", render: function(data, type, row){
		            return $("<div/>").html(data).text();
		        }},

		        { data: "created_at", name: "created_at", defaultContent: "-" },

		        { data: "entity_eo.no_kompetensi", name: "entity_eo.no_kompetensi", defaultContent: "-", searchable: false },

		        { data: "status.name", name: "status.name", defaultContent: "-",render: function(data, type, row){
		            return $("<div/>").html(data).text();
		        }},
		        { data: "action", name: "action", orderable: false, searchable: false},
		    ],
        "columnDefs": [
            { className: "nowrap", "targets": [ 4 ] }
        ],
        "sDom": "B<t><'row'<p i>>",
        "buttons": [
			{
				text: '<i class="fa fa-print text-info"></i>',
				extend: 'print',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-excel text-success"></i>',
				extend: 'excelHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-pdf text-danger"></i>',
				extend: 'pdfHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
        ],
        "destroy": true,
        "scrollCollapse": true,
        "oLanguage": {
            "sEmptyTable":      "Tiada data",
            "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
            "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
            "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
            "sInfoPostFix":     "",
            "sInfoThousands":   ",",
            "sLengthMenu":      "Papar _MENU_ rekod",
            "sLoadingRecords":  "Diproses...",
            "sProcessing":      "Sedang diproses...",
            "sSearch":          "Carian:",
            "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
            "oPaginate": {
                "sFirst":        "Pertama",
                "sPrevious":     "Sebelum",
                "sNext":         "Seterusnya",
                "sLast":         "Akhir"
            },
            "oAria": {
                "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
                "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
            }
        },
        "iDisplayLength": 10
    };

    eotable{{$myPakej}}.dataTable(eosetting{{$myPakej}});
</script>
<script type="text/javascript">
		// $('#modal-add-pengawasan').modal('show');
		$('#modal-add-pengawasan').modal({
            backdrop: 'static',
            keyboard: false
        });
		@foreach ($PakejHasPengawasan as $key)
			 $(".pengawasanpakej_{{$key->pengawasan_id}}").prop('checked', true).trigger('change');
		@endforeach
		@foreach ($Pengawasan as $value)
		$('body').on('change','input:checkbox[name="pakej_pengawasan_id[]"]',function () {
				if ($('input[name=\'pakej_pengawasan_id[]\'][value={{$value->id}}]').prop('checked')==true) {
						document.getElementById('{{$value->id}}_container').style.display = 'block';
				}else{
						document.getElementById('{{$value->id}}_container').style.display = 'none';
				}
		})

		$(document).ready(function() {
				if($('.pengawasanpakej_{{$value->id}}').prop("checked") == true) {
						document.getElementById('{{$value->id}}_container').style.display = 'block';
				} else {
          document.getElementById('{{$value->id}}_container').style.display = 'none';
        }
		});

		$(".formeemc{{$value->id}}{{$myPakej}}").change(function() {
			$('form#formpengawasanemc{{$value->id}}{{$myPakej}}').submit();
		});

		$('body').on('submit', 'form#formpengawasanemc{{$value->id}}{{$myPakej}}', function() {
    		var form = $(this);
    		// alert(form.attr('action'));
    		$.ajax({
    				url: form.attr('action'),
    				method: form.attr('method'),
    				data: new FormData(form[0]),
    				dataType: 'json',
    				async: true,
    				contentType: false,
    				processData: false,
    				success: function(response) {
    					emctable{{$value->id}}{{$myPakej}}.api().ajax.reload(null, false);
    				}
    		});
    		return false;
    });


	function checkupDataP(id){
		$.ajax({
			url: 'checkupeoemc/'+id,
			method: 'get',
			dataType: 'json',
	        async: true,
	        contentType: false,
	        processData: false,
			success: function(response) {
				if(response.status1 == 'error'){
					swal(response.title, response.message, response.status);
				} else {
					$('#modal-add-pengawasan').modal('hide');
				}
			}
		});
	}


		var emctable{{$value->id}}{{$myPakej}} = $('#emctable{{$value->id}}{{$myPakej}}');
		var id= "{{$myPakej}}";
    <?php
      $routetableemc = "emctable".$value->id;
     ?>
		 var url = "{{route($routetableemc,['id'=>"+id+"])}}";

		 url = url.replace("%2Bid%2B",id);
		 var urlString = url.replace(/&amp;/g, '&');

    var emcsetting{{$value->id}}{{$myPakej}} = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "searchable": false,
        "ajax": urlString,
				"columns": [
					{ data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
					}},
					{ data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
							return $("<div/>").html(data).text();
					}},
					{ data: "username", name: "username", defaultContent: "-", render: function(data, type, row){
							return $("<div/>").html(data).text();
					}},

					{ data: "syarikat", name: "syarikat", defaultContent: "-" },

					{ data: "detail", name: "detail", defaultContent: "-", render: function(data, type, row){
							return $("<div/>").html(data).text();
					}},

					{ data: "status.name", name: "status.name", defaultContent: "-",render: function(data, type, row){
							return $("<div/>").html(data).text();
					}},
					{ data: "action", name: "action", orderable: false, searchable: false},
		    ],
        "columnDefs": [
            { className: "nowrap", "targets": [ 4 ] }
        ],
        "sDom": "B<t><'row'<p i>>",
        "buttons": [
			{
				text: '<i class="fa fa-print text-info"></i>',
				extend: 'print',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-excel text-success"></i>',
				extend: 'excelHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-pdf text-danger"></i>',
				extend: 'pdfHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
        ],
        "destroy": true,
        "scrollCollapse": true,
        "oLanguage": {
            "sEmptyTable":      "Tiada data",
            "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
            "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
            "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
            "sInfoPostFix":     "",
            "sInfoThousands":   ",",
            "sLengthMenu":      "Papar _MENU_ rekod",
            "sLoadingRecords":  "Diproses...",
            "sProcessing":      "Sedang diproses...",
            "sSearch":          "Carian:",
            "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
            "oPaginate": {
                "sFirst":        "Pertama",
                "sPrevious":     "Sebelum",
                "sNext":         "Seterusnya",
                "sLast":         "Akhir"
            },
            "oAria": {
                "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
                "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
            }
        },
        "iDisplayLength": 10
    };

    emctable{{$value->id}}{{$myPakej}}.dataTable(emcsetting{{$value->id}}{{$myPakej}});
		@endforeach

    function removeeo(id){
      $.ajax({
          url: "usereo/delete/" + id,
          method: 'get',
          dataType: 'json',
          async: true,
          contentType: false,
          processData: false,
          success: function(data) {
            @foreach ($Pengawasan as $value)
              eotable{{$myPakej}}.api().ajax.reload(null, false);
            @endforeach
          }
      });
    }

    function removeemc(id){
      $.ajax({
          url: "useremc/delete/" + id,
          method: 'get',
          dataType: 'json',
          async: true,
          contentType: false,
          processData: false,
          success: function(data) {
            @foreach ($Pengawasan as $value)
              emctable{{$value->id}}{{$myPakej}}.api().ajax.reload(null, false);
            @endforeach
          }
      });
    }

    function jenis_pengawasan(){
    	$('form#formpengawasan').submit();
    }

    $('body').on('submit', 'form#formpengawasan', function() {
    		var form = $(this);
    		// alert(form.attr('action'));
    		$.ajax({
    				url: form.attr('action'),
    				method: form.attr('method'),
    				data: new FormData(form[0]),
    				dataType: 'json',
    				async: true,
    				contentType: false,
    				processData: false,
    				success: function(response) {
    					// alert('dwdwdw');
    				}
    		});
    		return false;
    });

</script>
