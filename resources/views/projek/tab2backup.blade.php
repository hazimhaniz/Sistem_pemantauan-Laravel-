<div class=" container-fluid container-fixed-lg bg-white">
	<div class="card card-transparent">
		<div class="card-block">
			<div class="card card-default">
				<div class="card-header separator">
					<div class="card-title" style="font-weight: bold;font-size: 12.5px">Maklumat Environmental Management Plan (EMP)</div>
				</div>
				<div class="card-body">
					<!-- <div class=" container-fluid container-fixed-lg bg-white"> -->
						<div class="card card-transparent">
							<div class="card-block table-responsive">
								<div class="form-group row control-label m-t-20">
									<div class="col-md-9"><button type="button" onclick="addEMP()" class="btn btn-success">Tambah<i class="fa fa-plus m-l-5"></i></button></div>
                                    <span>Klik untuk tambah maklumat Environmental Management Plan (EMP).</span>
								</div>
                                <span class="text-danger disclaimerEmp"></span>
								<table class="table table-bordered" id="tableEMP">
									<thead>
									<tr>
                    <th>Nama Laporan EMP</th>
                    <th>Tarikh Kelulusan EMP</th>
										<th>Nama Jururunding</th>
										<th>No Rujukan</th>
										<th>Tindakan</th>
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
							<button class="btn btn-success btn-cons pull-right" type="button">
								<span>Seterusnya</span>
							</button>
						</li>
						<li class="previous">
							<button class="btn btn-default btn-cons" type="button">
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
        $(function(){
            var dtToday = new Date();
            dtToday.setDate(dtToday.getDate() );
            
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var maxDate = year + '-' + month + '-' + day;
            $('#tarikh_kelulusan').attr('max', maxDate);
        });

        // $("#tarikh_kelulusan").datepicker({
        //     dateFormat: "dd-mm-yy"
        //     ,minDate: 0
        // }).change(function() {
        //     var date1 = $('#tarikh_kelulusan').datepicker('getDate');
        //     var today = new Date();
        //     var dd = today.getDate();

        //     var mm = today.getMonth()+1; 
        //     var yyyy = today.getFullYear();
        //     if(dd<10) 
        //     {
        //         dd='0'+dd;
        //     } 

        //     if(mm<10) 
        //     {
        //         mm='0'+mm;
        //     } 

        //     todays = yyyy + '-'+ mm + '-' + dd;

        //     var givenDate = new Date(date1);

        //     var dd1 = givenDate.getDate();

        //     var mm1 = givenDate.getMonth()+1; 
        //     var yyyy1 = givenDate.getFullYear();
        //     if(dd1<10) 
        //     {
        //         dd1='0'+dd1;
        //     } 

        //     if(mm1<10) 
        //     {
        //         mm1='0'+mm1;
        //     } 

        //     dates = yyyy1+ '-'+ mm1 + '-' + dd1;


        //     console.log(todays);
        //     console.log(dates+ ' '+ 'select date');
        //     g1 = new Date(todays);
        //     g2 = new Date(dates);
        //     console.log(g1);
        //     console.log(g2);
        //     if(g2.getTime() >= g1.getTime()){
        //         $('#datecheckemperror').show();
        //         // $('#datekomerror').show();
        //         var sijilkom = document.getElementById("datekom");
        //         sijilkom.classList.add("has-error");
        //     }else{
        //         $('#datecheckemperror').hide();
        //         var sijilkom = document.getElementById("datekom");
        //         sijilkom.classList.remove("has-error");
        //         // alert('Given date is not greater than the current date.');
        //     }
        // });

        function addEMP() {
            // $("#modal-add-EMP").modal("show");
            $('#modal-add-EMP').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function editEMP() {
            // $("#modal-edit-EMP").modal("show");
            $('#modal-edit-EMP').modal({
                backdrop: 'static',
                keyboard: false
            });

        }

        // $(function(){
            $("#EMP").submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var data = new FormData(form[0]);
                var tarikh = new Date(data.get("tarikh_kelulusan"));
                var today = new Date();

                if(tarikh.getTime() >= today.getTime()){
                    $('#datecheckemperror').show();
                    // $('#datekomerror').show();
                    var sijilkom = document.getElementById("datekom");
                    sijilkom.classList.add("has-error");
                }else{
                    $('#datecheckemperror').hide();
                    var sijilkom = document.getElementById("datekom");
                    sijilkom.classList.remove("has-error");
                    // alert('Given date is not greater than the current date.');
                }

                if (today <= tarikh) {
                    swal('Perhatian','Pastikan Tarikh Kelulusan tidak melebihi tarikh hari ini.');
                    return false;
                }
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
                "ajax": "{{ route('getEMP', $Projek->id) }}",
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
										{ data: "no_rujukan", name: "no_rujukan", defaultContent: "-", "searchable": false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},
                    { data: "action", name: "action", orderable: false, searchable: false},
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

            tableEMP.dataTable(settingEMP);
		// });

        function removeEmp(id) {

            $.ajax({
                url: 'buangemp/'+id,
                method: 'get',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal(data.title, data.message);
                    tableEMP.api().ajax.reload(null, false);
                }
            });

                // swal({
                //         title: "",
                //         text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
                //         type: "",
                //         showCancelButton: true,
                //         confirmButtonClass: "btn-outline green-meadow",
                //         cancelButtonClass: "btn-danger",
                //         confirmButtonText: "Ya",
                //         cancelButtonText: "Tidak",
                //         closeOnConfirm: true,
                //         closeOnCancel: true,
                //         showLoaderOnConfirm: true
                //     },
                //     function(isConfirm) {
                //         if (isConfirm) {
                            
                //         }
                //     });
            }
	</script>
@endpush
