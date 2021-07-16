@extends('layouts.app')
@include('plugins.chartjs')
@include('plugins.datatables')




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
	<div class="row">
		<div class="col-md-5">
		<h4><span><b class="text-page">PENGURUSAN STESEN</b></span></h4>
			@if(Request::get('status')=='')
			<h5><span><b class="text-dark">SENARAI STESEN</b></span></h5>
			@elseif(Request::get('status')=='telah_sah')
			<h5><span><b class="text-dark">SENARAI STESEN YANG TELAH DISAHKAN</b></span></h5>
			@endif
		 </div>
    </div>
    @include('form.petunjuk')
<br>
	<div id="table_wrapper" class="dataTables_wrapper no-footer">
		<div class="card card-transparent">
			<table class="table" id="senaraiStesenTable" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
				<thead>
					<tr role="row">
						<th bgcolor="#E7E7E7" class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Bil.</th>
						<th bgcolor="#E7E7E7" class="align-top text-center" style="width:15%; vertical-align:top; color:#fff">No. Fail JAS</th>
						<th bgcolor="#E7E7E7" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Pengawasan</th>
						<th bgcolor="#E7E7E7" class="align-top text-center" style="width:20%; vertical-align:top; color:#fff">Nama</th>
						<th bgcolor="#E7E7E7" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Latitude</th>
						<th bgcolor="#E7E7E7" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Longitude</th>
						{{-- <th bgcolor="#E7E7E7" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Tarikh Pengawasan (EIA)</th> --}}
						<th bgcolor="#E7E7E7" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Lembangan</th>
						<th bgcolor="#E7E7E7" class="align-top text-center" style="width:15%; vertical-align:top; color:#fff">Status</th>
						<th bgcolor="#E7E7E7" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">Tindakan</th>
					</tr>
				</thead>
		
			</table>
			
		</div>
		{{-- <button type="button" id="btnSave" class="btn btn-info float-save" onclick=""><i class="fa fa-check m-r-5"></i>Kuiri</button> --}}
	</div>
	
                    <div class="modal-body m-t-20" id="modalContent">
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
					'Berjaya!',
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
										'Berjaya!',
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
                    title: 'Dihantar!',
                    text: 'Data telah dihantar!',
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

function  viewStation(id, pengawasan)  {
    var nama = 'sungai';
	if (pengawasan == 1) {
        nama = 'sungai';
    } else if(pengawasan == 2) {
        nama = 'marin';
    } else if(pengawasan == 3) {
        nama = 'tasik';
    } else if(pengawasan == 4) {
        nama = 'air-tanah';
    }else if(pengawasan == 5) {
        nama = 'kolam';
    }else if(pengawasan == 6) {
        nama = 'udara';
    }else if(pengawasan == 7) {
        nama = 'bunyi-bising';
    }else if(pengawasan == 8) {
        nama = 'getaran';
    } else {
        nama = 'dron';
    }
    // url:  "{{ url('pengesahan_stesen') }}"+'/pengesahanmodal/'+id,
	 $.ajax({
        type: "GET",
        url:  "{{ url('projek') }}"+'/view-stesen/'+nama+'/'+id,
        success: function(data) {
            $("#modalContent").html(data);    
            $('#pengeshanModal').modal('show');
            $('.modal').modal('show')
        },
        error: function() {
            alert('Not OKay');
        }
    })
}
  var tableListDeclaration = $('#senaraiStesenTable');

    var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": "{{ fullUrl() }}",
        "columns": [
            { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
			{ data: "no_fail_jas", name: "no_fail_jas", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
			{ data: "pengawasan", name: "pengawasan", render: function(data, type, row){
                return $("<div/>").html(data).text();
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
            //   { data: "tarikh_pengawasan", name: "tarikh_pengawasan", render: function(data, type, row){
            //     return $("<div/>").html(data).text();
            // }},    
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
        "sDom": "<'pull-right p-b-10 m-r-20'B> <'pull-left m-t-20 m-l-15'f> <t> <'row'<p i>>",
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
            "sSearchPlaceholder": "Carian...",
            "sEmptyTable":      "No result",
            "sInfo":            "Showing _START_ to _END_ from _TOTAL_ record",
            "sInfoEmpty":       "Showing 0 record",
            "sInfoFiltered":    "(Filtered from total _MAX_ record)",
            "sInfoPostFix":     "",
            "sInfoThousands":   ",",
            "sLengthMenu":      "Show _MENU_ record",
            "sLoadingRecords":  "Processed...",
            "sProcessing":      "Processing...",
            "sSearch":          "",
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
	"sDom": "B<'pull-left'f><t><'row'<p i>>",
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
        "sSearch":          "",
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
