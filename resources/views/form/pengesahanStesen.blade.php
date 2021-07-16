@extends('layouts.app')
@include('plugins.chartjs')




@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <div class="row">
                <ol class="breadcrumb col-md-4 p-l-15">
                    <li class="breadcrumb-item active"><a>@lang('sidebar.home')</a></li>
                </ol>
                
            </div>
            <!-- END BREADCRUMB -->
        </div>
        <div class="row p-b-30">

            <?php
                // setlocale(LC_TIME, "ms", "my_MS", "ms_MY");
                $logins = auth()->user()->logs()->where('activity_type_id', 7)->orderBy('created_at', 'desc');
                $last_login = $logins->count() > 1 ? $logins->skip(1)->first() : null;
            ?>
    
        	<div class="col-md-12">
        		<div class="card card-transparent">
        			<div class="card-block">
        				<h3>Selamat Datang, <span class="semi-bold">{{ auth()->user()->name }}</span></h3>
        				@if($last_login)
                        <p>Last login date is at {{ strftime("%e %B %Y", strtotime($last_login->created_at)) }}.</p>
                        @endif
        			</div>
        		</div>
        	</div>

    	</div>
	</div>
</div>
<!-- END JUMBOTRON -->

<!-- START CONTAINER FLUID -->
<?php
	$months = [
	'01' => 'JAN',
	'02' => 'FEB',
	'03' => 'MAC',
	'04' => 'APR',
	'05' => 'MEI',
	'06' => 'JUN',
	'07' => 'JUL',
	'08' => 'OGOS',
	'09' => 'SEP',
	'10' => 'OKT',
	'11' => 'NOV',
	'12' => 'DIS'
	];
?>
<div class=" container-fluid container-fixed-lg bg-white m-t-20">
             <form class="p-t-10" id="form-search" role="form" autocomplete="off" method="post" action="{{ fullUrl() }}" novalidate>
	<br>
	<div class="row">
		<div class="col-md-2">
			<div class="form-group">
				<label class="" for="selectrequiredm">
					<i class="fal fa-hourglass-start fa-lg"></i>
					&nbsp; Bulan
					<span class="text-danger" style="font-size:14px"></span>
				</label>
				<select id="selectrequiredm" name="month" class="select-normal full-width custom-select border border-default"
					required="" data-error-msg="Silih pilih butiran perniagaan.">

					<option selected=""></option>
					@foreach($months as $key => $month)
						<option value="{{$key}}">{{$month}}</option>
					@endforeach
						
				</select>
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">
				<label class="" for="selectrequired">
					<i class="fal fa-hourglass-start fa-lg"></i>
					&nbsp; Tahun
					<span class="text-danger" style="font-size:14px"></span>
				</label>
				<select id="selectrequired" name="year" class="select-normal full-width custom-select border border-default"
					required="" data-error-msg="Silih pilih butiran perniagaan.">

					<option selected=""></option>
					<option value="">2020</option>
					<option value="">2019</option>
					<option value="">2018</option>
					<option value="">2017</option>
				</select>
			</div>
		</div>
	<!-- 	<div class="col-md-2">
			<div class="form-group">
				<label class="" for="selectrequired">
					<i class="fal fa-flag-alt fa-lg"></i>
					&nbsp; Status
					<span class="text-danger" style="font-size:14px"></span>
				</label>
				<select id="selectrequired" class="select-normal full-width custom-select border border-default"
					required="" data-error-msg="Silih pilih butiran perniagaan.">

					<option selected=""></option>
					<option value="">Belum Diluluskan</option>
					<option value="">Dalam Semakan</option>
					<option value="">Telah Diluluskan</option>
				</select>
			</div>
		</div> -->
		<div class="col-md-2">
			<div class="form-group">
				<label class="" for="">
					<span style="color:#fff">.</span>
				</label>
				<br>
				<!--
		 <a type="button" class="btn btn-sm btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Cari</a>
		 -->
		 		 <button class="btn btn-info" type="submit"><i class="fa fa-search m-r-5"></i> CARI</button>
                                    <button class="btn btn-default" onclick="resetFilterForm()">Reset</button>

				<!-- <a href="#" class=" btn btn-info btn-sm" type="button">
					<i class="fal fa-search-plus fa-lg"></i> &nbsp; CARI
				</a> -->
			</div>
		</div>
	</div>
</form>
	<div id="table_wrapper" class="dataTables_wrapper no-footer">
		<div class="dt-buttons">
			<button class="dt-button buttons-print btn btn-default btn-sm" tabindex="0" aria-controls="table"
				type="button" style="margin-top:3%"><span><i class="fa fa-print m-r-5"></i> Cetak</span></button>
			<button class="dt-button buttons-excel buttons-html5 btn btn-default btn-sm" tabindex="0"
				aria-controls="table" type="button" style="margin-top:3%"><span><i class="fa fa-download m-r-5"></i>
					Excel</span></button>
			<button class="dt-button buttons-pdf buttons-html5 btn btn-default btn-sm" tabindex="0"
				aria-controls="table" type="button" style="margin-top:3%"><span><i class="fa fa-download m-r-5"></i>
					PDF</span></button>

		</div>
		<br>
		<div class="card card-transparent">

			@include('form.petunjuk')
			
			<table class="table" id="tabledeclaration" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
				<thead>
					<tr role="row">
						<th bgcolor="#E7E7E7" class="align-top text-center"
							style="width:2%; vertical-align:top; color:#fff">Bil.</th>
						
						<th bgcolor="#E7E7E7" class="align-top text-center"
							style="width:20%; vertical-align:top; color:#fff">Nama</th>
						<th bgcolor="#E7E7E7" class="align-top text-center"
							style="width:10%; vertical-align:top; color:#fff">Latitude</th>
						<th bgcolor="#E7E7E7" class="align-top text-center"
							style="width:10%; vertical-align:top; color:#fff">Longitude</th>
						<th bgcolor="#E7E7E7" class="align-top text-center"
							style="width:10%; vertical-align:top; color:#fff">Tarikh Pengawasan (EIA)</th>
							<th bgcolor="#E7E7E7" class="align-top text-center"
							style="width:10%; vertical-align:top; color:#fff">Lembangan</th>
						<th bgcolor="#E7E7E7" class="align-top text-center"
							style="width:15%; vertical-align:top; color:#fff">Status</th>
						<th bgcolor="#E7E7E7" class="align-top text-center"
							style="width:15%; vertical-align:top; color:#fff">Tindakan</th>
					</tr>
				</thead>
		
			</table>
			
		</div>
		{{-- <button type="button" id="btnSave" class="btn btn-info float-save" onclick=""><i class="fa fa-check m-r-5"></i>Kuiri</button> --}}
	</div>
	<div class="modal fade" id="pengeshanModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalTitle"> Tambah <b>STESEN</b></h5>
                        <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body m-t-20" id="modalContent">
                 	</div>
                    
                </div>
            </div>
        </div>

    </div>
</div>
        

<!-- END CONTAINER FLUID -->


@endsection


@push('js')
<script>
 function  submitStesen(id) {
  	 	Swal.showLoading();
        $.ajax({
        type: "POST",
        url:  "{{ url('pengesahan_stesen') }}"+'/savestesen/'+id,
        success: function(data) {
			if(data.success) {
				Swal.fire(
					'Success',
					'Berjaya Disimpan!',
					'success'
				).then(() => {
					window.location.reload();
				});
			}
        },
        error: function() {
            alert('Ralat');
        }
    })
    } 

     submitStesen = (id) => {
        confirmCreate(id).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
                    onOpen: function() {
                        Swal.showLoading();
                         $.ajax({
					        type: "POST",
					        url:  "{{ url('pengesahan_stesen') }}"+'/savestesen/'+id,
					        success: function(data) {
								if(data.success) {
									Swal.fire(
										'Success',
										'Berjaya Disimpan!',
										'success'
									).then(() => {
										window.location.reload();
									});
								}
					        },
					        error: function() {
					            Swal.fire(
										'Fail',
										'failed to save!',
										'error'
									)
					        }
					    })
					}
                });
            }
        });
    }


$("#btn_view").click(function () {		
	$("#modal_view").modal("show");
});

$("#btn_view_2").click(function () {		
	$("#modal_view_2").modal("show");
});
</script>

<script src="{{ asset('sng-dashboard/highcharts.js') }}" type="text/javascript"></script> 
<script src="{{ asset('sng-dashboard/highcharts-more.js') }}" type="text/javascript"></script>
	
<script type="text/javascript">

</script>
@endpush

@push('js')

<script>
    $('#btnSearch').click(function () {
        swal({
            title: "Do you want to search?",
            text: "Searching in progress...",
            icon: "warning",
            buttons: [
                'No, please ignore!',
                'Yes, just do it!'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {
                swal({
                    title: 'Send!',
                    text: 'Data has been send!',
                    icon: 'success'
                }).then(function () {
                    //form.submit(); // <--- submit form programmatically
					window.location = "./home";
                });
            } else {
                swal("Return", "No data send", "error");
            }
        })
    })

function  viewStation(id) {
	
	 $.ajax({
        type: "GET",
        url:  "{{ url('pengesahan_stesen') }}"+'/pengesahanmodal/'+id,
        success: function(data) {
            $("#modalContent").html(data);    
            $('#pengeshanModal').modal('show');
        },
        error: function() {
            alert('Not OKay');
        }
    })
}
  var tableListDeclaration = $('#tabledeclaration');

    var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": "{{ fullUrl() }}",
        "columns": [
            { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            { data: "name", name: "name", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},    
            { data: "latitude", name: "latitude", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }}, 
             { data: "longitude", name: "longitude", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }}, 
              { data: "tarikh_pengawasan", name: "tarikh_pengawasan", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},    
            { data: "lembangan", name: "lembangan", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }}, 
            { data: "status", name: "status", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }}, 
            { data: "action", name: "action", orderable: false, searchable: false},
 
            
        ],
        "columnDefs": [
            { className: "nowrap", "targets": [ 7 ] }
        ],
        "sDom": "<t><'row'<p i>>",
        "buttons": [
        ],
        "destroy": true,
        "scrollCollapse": true,
        "oLanguage": {
            "sEmptyTable":      "No result",
            "sInfo":            "Showing _START_ to _END_ from _TOTAL_ record",
            "sInfoEmpty":       "Showing 0 record",
            "sInfoFiltered":    "(Filtered from total _MAX_ record)",
            "sInfoPostFix":     "",
            "sInfoThousands":   ",",
            "sLengthMenu":      "Show _MENU_ record",
            "sLoadingRecords":  "Processed...",
            "sProcessing":      "Processing...",
            "sSearch":          "Searching:",
           "sZeroRecords":      "No record matches found.",
           "oPaginate": {
               "sFirst":        "First",
               "sPrevious":     "Previous",
               "sNext":         "Next",
               "sLast":         "Last"
           },
           "oAria": {
               "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
               "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
           }
        },
        "iDisplayLength": 10
    };

    tableListDeclaration.dataTable(settings);
    
    // search box for table
    $('#search-table').keyup(function() {
        tableListDeclaration.fnFilter($(this).val());
    });

    $('body').on('submit','#form-search',function(e){

    e.preventDefault();

    var form = $("#form-search");

    var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": form.attr('action')+"?"+form.serialize(),
        "columns": [
           { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
          	{ data: "name", name: "name", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},    
            { data: "latitude", name: "latitude", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }}, 
             { data: "longitude", name: "longitude", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }}, 
              { data: "tarikh_pengawasan", name: "tarikh_pengawasan", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},    
            
     
            { data: "sungai", name: "sungai", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }}, 
            { data: "status", name: "status", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }}, 
            { data: "action", name: "action", orderable: false, searchable: false},
 
            
        ],
        "columnDefs": [{
            className: "nowrap",
            "targets": [7]
        }],
    "sDom": "<t><'row'<p i>>",
    "buttons": [
        {
            text: 'PERMOHONAN TERAKHIR DIPROSES - <b>SKB/2019/1</b>',
            extend: 'print',
            className: 'btn btn-default btn-sm',
            exportOptions: {
                columns: ':visible:not(.nowrap)'
            }
        },
    ],
    "destroy": true,
    "scrollCollapse": true,
    "oLanguage": {
        "sEmptyTable":      "No result",
        "sInfo":            "Showing _START_ to _END_ from _TOTAL_ record",
        "sInfoEmpty":       "Showing 0 record",
        "sInfoFiltered":    "(Filtered from total _MAX_ record)",
        "sInfoPostFix":     "",
        "sInfoThousands":   ",",
        "sLengthMenu":      "Show _MENU_ record",
        "sLoadingRecords":  "Processed...",
        "sProcessing":      "Processing...",
        "sSearch":          "Searching:",
       "sZeroRecords":      "No record matches found.",
       "oPaginate": {
           "sFirst":        "First",
           "sPrevious":     "Previous",
           "sNext":         "Next",
           "sLast":         "Last"
       },
       "oAria": {
           "sSortAscending":  ": activated to ascending column order",
           "sSortDescending": ": activated to descending column order"
       }
    },
    "iDisplayLength": 20
};

tableListDeclaration.dataTable(settings);

})
function resetFilterForm() {
    $('#form-search')[0].reset();
    $("#form-search").trigger("reset");
    $('#form-search select#application_type').select2().val("A").trigger("change");
}
</script>

@endpush
