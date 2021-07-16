<div class=" container-fluid container-fixed-lg bg-white">
    <div class="card card-transparent">
        <div class="card-block">
            <div class="card card-default">
                <div class="card-header separator">
                    <div class="card-title" style="font-weight: bold;font-size: 12.5px">Maklumat Land Disturbing Pollution Prevention And Mitigation Measures(LDP2M2)</div>
                </div>
                <div class="card-body">
                    <!-- <div class=" container-fluid container-fixed-lg bg-white"> -->
                        <div class="card card-transparent">
                            <div class="card-block table-responsive">
                                <table class="table table-hover table-bordered" id="tableLDP2M2">
                                    <thead>
                                    <tr>
                                        <th>Nama Dokumen LDP2M2</th>
                                        <th>Tarikh Kelulusan LDP2M2</th>
                                        <th>No Plan Diluluskan</th>
                                        <th>Dokumen</th>
                                        <!-- <th>Tindakan</th> -->
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="row p-b-10">
                <div class="col-md-12">
                    <ul class="pager wizard no-style">
                        <li class="next">
                            <button class="btn btn-success btn-cons from-left pull-right" type="button">
                                <span>Seterusnya</span>
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
        

        function editLDP2M2() {
            $("#modal-edit-LDP2M2").modal("show");
        }


            var tableLDP2M2 = $('#tableLDP2M2');

            var settingLDP2M2 = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "searchable": false,
                "ajax": "{{ route('viewLDP2M2', ['id'=>$Projek->id,'a'=>request()->a]) }}",
                "columns": [
                    { data: "nama", name: "nama", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},

                    { data: "tarikh_kelulusan", name: "tarikh_kelulusan", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "no_plan_diluluskan", name: "no_plan_diluluskan", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "dokumen", name: "dokumen", defaultContent: "-", render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    // { data: "action", name: "action", orderable: false, searchable: false},
                ],
                "columnDefs": [
                    { className: "nowrap", "targets": [ 3 ] }
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

            tableLDP2M2.dataTable(settingLDP2M2);

    </script>
@endpush