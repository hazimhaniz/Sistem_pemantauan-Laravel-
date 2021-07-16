<div class=" container-fluid container-fixed-lg bg-white">
	<div class="card card-transparent">
		<div class="card-block">
			<div class="card card-default">
				<div class="card-header separator">
					<div class="card-title" style="font-weight: bold;font-size: 12.5px">MAKLUMAT AUDIT ALAM SEKELILING</div>
				</div>
				<div class="card-body">
					<div class="form-group row control-label m-t-20">
						<label class="col-md-3 m-t-15">Status Kemajuan Kerja Projek<span style="color:red;">*</span> </label>
						<div class="col-md-9" style="z-index: 999">
							<div class="peringkatAudit">
								<select id="peringkat_audit" name="peringkat_audit" class="form-control full-width autoscroll projek1 required" data-init-plugin="select2" required>
                    <option disabled hidden selected="" value="">Sila Pilih</option>
                    @foreach($peringkatPengawasan as $value)
                    <option value="{{$value->id}}" name="peringkat_audit" required>{{ $value->name }}</option>
                    @endforeach
                </select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label m-t-15">Kekerapan Audit Alam Sekeliling<span style="color:red;">*</span> </label>
						<div class="col-md-9">
							<div class="tempohAudit">
								<div class="radio radio-primary">
									@foreach ($tempohAudit as $valueaudit)
									<input name="jenis" value="{{ $valueaudit->id }}" id="tempoh_{{ $valueaudit->id }}" type="radio" class="projek1" required="" aria-required="true"  {{$ProjekDetail->jenis == $valueaudit->id ? "checked" : ""}}>
                                    <!-- <input name="jenis" value="{{ $valueaudit->id }}" onclick="editaudit({{$ProjekDetail->projek_id}},this.value)" id="tempoh_{{ $valueaudit->id }}" type="radio" class="projek1" required="" aria-required="true"  {{$ProjekDetail->jenis == $valueaudit->id ? "checked" : ""}}> -->
									<label for="tempoh_{{ $valueaudit->id }}">{{ $valueaudit->name }}</label>
									@endforeach
								</div>
							</div>
						</div>
					</div>
                    <div class="row col-md-12">
                        <button class="btn btn-info btn-cons from-left pull-left" type="button" onclick="editaudit1({{$ProjekDetail->projek_id}})">
                            <span>Mula Tarikh Audit</span>
                        </button>
                    </div>
                    <br>
					<div class="row col-md-12">
						<span class="text-danger disclaimerAudit"></span>
						<div class="table-responsive">
							<table class="table table-bordered" id="tableAudit">
								<thead>
									<tr>
                                        <th class="fit">Bil.</th>
										<th>Tarikh Cadangan Audit Alam Sekeliling <br>
                                        <!-- <span class="text-danger bold"> Sila Masukkan Tarikh Pada Butang Kemaskini*</span> -->
                                        </th>
										<th>Tindakan</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row p-b-10">
					<div class="col-md-12">
							<ul class="pager wizard no-style">
									<li class="submit">
											<button class="btn btn-info btn-cons from-left pull-right submitProjek" type="button">
													<span>Hantar</span>
											</button>
									</li>
                                    <li class="submit">
											<button class="btn btn-info btn-cons from-left pull-right simpanProjek" type="button">
													<span>Simpan</span>
											</button>
									</li>
									<li class="previous">
											<button class="btn btn-default btn-cons from-left" type="button">
													<span>Kembali</span>
											</button>
									</li>
							</ul>
					</div>
			</div>
		</div>
	</div>
</div>


@push('js')
	<script type="text/javascript">

        

        @if($ProjekDetail->peringkat_audit)
        $("#peringkat_audit").val( {{ $ProjekDetail->peringkat_audit }} ).trigger('change');
        @endif

		$("#tab_4_{{ $ProjekDetail->peringkat_audit }}").prop('checked', true).trigger('change');
		$("#tempoh_{{ $ProjekDetail->jenis }}").prop('checked', true).trigger('change');

	function editaudit(id,frequent) {
		$("#modal-div").load("../projek/kemaskiniaudit/"+id);
	    $('.modal form').trigger("reset");
	    $('.modal form').validate();
    }

    function editaudit1(id,frequent) {
        $("#modal-div").load("../projek/kemaskiniaudit1/"+id);
        $('.modal form').trigger("reset");
        $('.modal form').validate();
    }

    var tableAudit = $('#tableAudit');

            var settingAudit = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "searchable": false,
                "ajax": "{{ route('getTarikhAudit', $Projek->id) }}",
                "columns": [
                { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                    { data: "tarikh", name: "tarikh", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "action", name: "action", orderable: false, searchable: false},
                ],
                "columnDefs": [
                    { className: "nowrap", "targets": [ 2 ] }
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
                "iDisplayLength": 15
            };

            tableAudit.dataTable(settingAudit);

	</script>
@endpush
