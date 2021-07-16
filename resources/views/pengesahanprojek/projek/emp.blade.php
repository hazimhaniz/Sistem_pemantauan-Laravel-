<div class=" container-fluid container-fixed-lg bg-white">
    <div class="card card-transparent">
        <div class="card-block">
            <div class="card card-default">
                <div class="card-header separator">
                    <div class="card-title" style="font-weight: bold;font-size: 12.5px">Maklumat Environmental Management Plan(EMP)</div>
                </div>
                <div class="card-body">
                    <!-- <div class=" container-fluid container-fixed-lg bg-white"> -->
                        <div class="card card-transparent">
                            <div class="card-block table-responsive">
                                <table class="table table-bordered" id="tableEMP">
                                    <thead>
                                    <tr>
                                        <th>Nama Laporan EMP</th>
                                        <th>Tarikh Kelulusan EMP</th>
                                        <th>Nama Jururunding</th>
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
        function addEMP() {
            $("#modal-add-EMP").modal("show");
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function editEMP() {
            $("#modal-edit-EMP").modal("show");
        }

        // $(function(){
            $("#EMP").submit(function(e) {
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
                        $("#modal-add-EMP").modal("hide");
                        swal(data.title, data.message);
                        tableEMP.api().ajax.reload(null, false);
                    }
                });
            });

            var tableEMP = $('#tableEMP');

            var settingEMP = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "searchable": false,
                "ajax": "{{ route('viewEMP', ['id'=>$Projek->id,'a'=>request()->a]) }}",
                "columns": [
                    { data: "laporan", name: "laporan", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "tarikh_kelulusan", name: "tarikh_kelulusan", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "jururunding", name: "jururunding", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    // { data: "action", name: "action", orderable: false, searchable: false},
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
                "iDisplayLength": 10
            };

            tableEMP.dataTable(settingEMP);
        // });

        function removeEmp(id) {

                swal({
                        title: "Anda pasti?",
                        text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonClass: "btn-outline green-meadow",
                        cancelButtonClass: "btn-danger",
                        confirmButtonText: "Ya",
                        cancelButtonText: "Tidak",
                        closeOnConfirm: true,
                        closeOnCancel: true,
                        showLoaderOnConfirm: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: 'buangemp/'+id,
                                method: 'delete',
                                dataType: 'json',
                                async: true,
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    swal(data.title, data.message);
                                    tableEMP.api().ajax.reload(null, false);
                                }
                            });
                        }
                    });
            }
    </script>
@endpush